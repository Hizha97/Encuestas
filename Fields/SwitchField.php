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

    public  function render()
    {
        echo sprintf("<div class='switch'>");
        echo sprintf("<label> %s <input type='%s'> <span class='%s'></span> %s </label>", this->$label1, "checkbox", "lever", this->label2);
        echo "</div>";
    }
}