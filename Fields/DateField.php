<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 31/10/17
 * Time: 9:14
 */

require_once ('Field.php');

class DateField extends Field
{


    public function render()
    {
        echo sprintf("<div class='%s %s'>", 'input-field', $this->styleClasses);
        echo sprintf("<input type='%s' class='%s' name='%s' id='%s'>", "text", "datepicker", $this->name, $this->id);
        echo sprintf("<label for='%s'> %s </label>", $this->name, $this->verbose_name);
        echo '</div>';
    }
}