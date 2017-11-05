<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 31/10/17
 * Time: 13:27
 */

class RadioButton
{
    public $id;
    public $name;
    public $verbose_name;
    public $selected;

    /**
     * RadioButton constructor.
     * @param $id
     * @param $name
     * @param $verbose_name
     * @param $selected
     */
    public function __construct($name, $verbose_name, $selected)
    {
        $this->id = hash("sha256", spl_object_hash($this));
        $this->name = $name;
        $this->verbose_name = $verbose_name;
        $this->selected = $selected;
    }

    public function render()
    {
        echo "<p>";
        if($this->selected == false)
            echo sprintf("<input type='%s' id='%s' name='%s' required  />", "radio", $this->id, $this->name);
        else
            echo sprintf("<input type='%s' id='%s' name='%s' checked='checked' required/>", "radio", $this->id, $this->name);

        echo sprintf("<label for='%s'> %s </label>", $this->id, $this->verbose_name);
        echo '</p>';
    }
}