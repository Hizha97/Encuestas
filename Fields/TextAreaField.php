<?php
/**
 * Created by PhpStorm.
 * Usuario: isa
 * Date: 31/10/17
 * Time: 9:26
 */

require_once(__DIR__ . '/Field.php');

class TextAreaField extends Field
{
    public function render()
    {
        $requiredParameter = "";

        $this->preInputField();
        if ($this->required)
            $requiredParameter = "required";

        echo sprintf("<textarea id='%s' name='%s' style='min-height:100px;' class='materialize-textarea' value='%s' %s></textarea>", $this->id, $this->name, $this->value, $requiredParameter);
        echo sprintf("<label for='%s' > %s </label>", $this->id, $this->verbose_name);
        $this->postInputField();
    }
}