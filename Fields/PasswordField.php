<?php
/**
 * Created by PhpStorm.
 * Usuario: isa
 * Date: 31/10/17
 * Time: 9:56
 */

require_once (__DIR__ . '/Field.php');

class PasswordField extends Field
{
    public function render()
    {
        $requiredParameter = "";

        $this->preInputField();
        if($this->required)
            $requiredParameter = "required";

        echo sprintf("<input type='%s' id='%s' name='%s' value='%s' %s>", "password", $this->id, $this->name, $this->value, $requiredParameter);
        echo sprintf("<label for='%s'> %s </label>", $this->id, $this->verbose_name);
        $this->postInputField();
    }
}