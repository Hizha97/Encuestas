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
        echo sprintf("<div class='%s %s'>", 'input-field', $this->styleClasses);
        echo sprintf("<input type='%s' id='%s'>", "text", $this->id);
        echo sprintf("<label for='%s'> %s </label>", $this->id, $this->verbose_name);
        echo '</div>';
    }
}