<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 31/10/17
 * Time: 10:29
 */

class CheckboxField extends Field
{

    public function render()
    {
        $requiredParameter = "";

        echo "<p>";
        if($this->required)
            $requiredParameter = "required";

        $format = "<input type='%s' id='%s' %s name='%s' %s>";

        if($this->value === '')
            $str = sprintf($format, "checkbox", $this->id, "", $this->name, $requiredParameter);
        else
            $str = sprintf($format, "checkbox", $this->id, "checked='checked'", $this->name, $requiredParameter);
        echo $str;
        echo sprintf("<label for='%s'> %s </label>", $this->id, $this->verbose_name);
        echo '</p>';
    }
}