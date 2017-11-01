<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 31/10/17
 * Time: 13:27
 */

class RadioField extends Field
{
    protected $name;

    public function __construct($id, $verbose_name, $name, $value = '', $styleClasses = '')
    {
        parent::__construct($id, $verbose_name, $value, $styleClasses);
        $this->name = $name;
    }


    public function render()
    {
        echo "<p>";
        echo sprintf("<input type='%s' id='%s' name='%s' />", "radio", $this->id, $this->name);
        echo sprintf("<label for='%s'> %s </label>", $this->id, $this->verbose_name);
        echo '</p>';
    }
}