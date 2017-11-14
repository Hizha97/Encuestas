<?php
/**
 * Created by PhpStorm.
 * Usuario: isa
 * Date: 31/10/17
 * Time: 13:38
 */

require_once(__DIR__ . '/Field.php');

class SwitchField extends Field
{
    protected $choices;

    public function __construct($name, $choices, $value = '')
    {
        if (is_string($choices))
            $choices = explode(';', $choices);
        parent::__construct($name, "", $value);
        $this->choices = $choices;
    }


    public function render()
    {
        echo sprintf("<div class='switch'>");
        $format = "<label> %s <input type='%s' %s name='%s'> <span class='%s'></span> %s </label>";

        if ($this->value === '')
            $str = sprintf($format, $this->choices[0], "checkbox", "", $this->name, "lever", $this->choices[1]);
        else
            $str = sprintf($format, $this->choices[0], "checkbox", "checked='checked'", $this->name, "lever", $this->choices[1]);

        echo $str;
        echo "</div>";
    }
}