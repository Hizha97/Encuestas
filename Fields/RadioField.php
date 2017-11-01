<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 31/10/17
 * Time: 13:27
 */

class RadioField extends Field
{

    public function render()
    {
        echo "<p>";
        echo "<input type='radio' id='" . $this->name . "' />";
        echo "<label for='" . $this->name . "'>" . $this->verbose_name . "</label>";
        echo '</p>';
    }
}