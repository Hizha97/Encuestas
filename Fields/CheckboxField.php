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
        echo "<p>";
        echo sprintf("<input type='%s' id='%s'>", "checkbox", $this->id);
        echo sprintf("<label for='%s'> %s </label>", $this->id, $this->verbose_name);
        echo '</p>';
    }
}