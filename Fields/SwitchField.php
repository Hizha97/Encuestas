<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 31/10/17
 * Time: 13:38
 */

class SwitchField extends Field
{
    protected $label1;
    protected $label2;

    public function __construct($name, $label1, $label2, $value = '')
    {
        parent::__construct($name, "", $value);
        $this->label1 = $label1;
        $this->label2 = $label2;
    }


    public  function render()
    {
        echo sprintf("<div class='switch'>");

        $format = "<label> %s <input type='%s' %s name='%s'> <span class='%s'></span> %s </label>";

        if($this->value === '')
            $str = sprintf($format , $this->label1, "checkbox", "", $this->name, "lever", $this->label2);
        else
            $str = sprintf($format, $this->label1, "checkbox", "checked='checked'", $this->name, "lever", $this->label2);

        echo $str;
        echo "</div>";
    }
}