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
        echo sprintf("<div class='%s %s'>", 'input-field', $this->styleClasses);
        echo sprintf("<input type='%s' name='%s' id='%s'>", "password", $this->name, $this->id);
        echo "<label for='" . $this->name . "'>" . $this->verbose_name . "</label>";
        echo '</div>';
    }
}