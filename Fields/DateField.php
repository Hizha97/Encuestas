<?php
/**
 * Created by PhpStorm.
 * Usuario: isa
 * Date: 31/10/17
 * Time: 9:14
 */

require_once(__DIR__ . '/Field.php');

class DateField extends Field
{

    public function render()
    {
        $requiredParameter = "";

        $this->preInputField();
        if ($this->required)
            $requiredParameter = "required";

        echo sprintf("<input type='%s' class='%s' id='%s' name='%s' data-value='%s' %s>", "text", "datepicker", $this->id, $this->name, $this->value, $requiredParameter);
        echo sprintf("<label for='%s'> %s </label>", $this->id, $this->verbose_name);

        $this->postInputField();
    }
}

