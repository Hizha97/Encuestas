<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 01/11/2017
 * Time: 23:40
 */

class SelectField extends Field
{
    protected $choices;

    public function __construct($name, $verbose_name, $choices, $value = '', $required = true)
    {
        parent::__construct($name, $verbose_name, $value, $required);
        $this->choices = $choices;
    }

    public  function render()
    {
        $this->preInputField();
        $requiredParameter = "";
        if($this->required)
            $requiredParameter = "required";

        echo sprintf('<select name="%s" %s>', $this->name, $requiredParameter);
        echo "<option value=\"\">Select one...</option>";
        foreach($this->choices as $index => $choice)
            if($choice === $this->value)
                echo sprintf("<option value='%s' selected> %s</option>", $choice, $choice);
            else
                echo sprintf("<option value='%s'> %s</option>", $choice, $choice);

        echo '</select>';
        echo sprintf("<label>%s</label>", $this->verbose_name);
        $this->postInputField();
    }
}