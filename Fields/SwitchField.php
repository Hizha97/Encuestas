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

    public function __construct($id, $verbose_name, $value = '', $styleClasses = '', $label1, $label2)
    {
        parent::__construct($id, $verbose_name, $value, $styleClasses);
        $this->label1 = $label1;
        $this->label2 = $label2;
    }


    public  function render()
    {
        echo sprintf("<div class='switch'>");
        echo sprintf("<label> %s <input type='%s'> <span class='%s'></span> %s </label>", $this->label1, "checkbox", "lever", $this->label2);
        echo "</div>";
    }
}