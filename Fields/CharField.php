<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 31/10/17
 * Time: 9:26
 */

require_once ('Field.php');

class CharField extends Field
{
    public function render()
    {
        $requiredParameter = "";

        $this->preInputField();
        if($this->required)
            $requiredParameter = "required";

        echo sprintf("<input type='%s' id='%s' name='%s' value='%s' %s>", "text", $this->id, $this->name, $this->value, $requiredParameter);
        echo sprintf("<label for='%s' > %s </label>", $this->id, $this->verbose_name);
        $this->postInputField();
    }
}