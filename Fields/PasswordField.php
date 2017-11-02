<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 31/10/17
 * Time: 9:56
 */

class PasswordField extends Field
{
    public function render()
    {
        $this->preInputField();
        echo sprintf("<input type='%s' id='%s' name='%s' value='%s'>", "password", $this->id, $this->name, $this->value);
        echo sprintf("<label for='%s'> %s </label>", $this->id, $this->verbose_name);
        $this->postInputField();
    }
}