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
        $this->preInputField();
        echo sprintf("<input type='%s' id='%s' name='%s' value='%s'>", "text", $this->id, $this->name, $this->value);
        echo sprintf("<label for='%s' > %s </label>", $this->id, $this->verbose_name, strtolower($this->verbose_name));
        $this->postInputField();
    }
}