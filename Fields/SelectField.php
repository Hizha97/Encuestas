<?php
/**
 * Created by PhpStorm.
 * Usuario: antonio
 * Date: 01/11/2017
 * Time: 23:40
 */

require_once(__DIR__ . '/Field.php');

class SelectField extends Field
{
    protected $choices;

    public function __construct($name, $verbose_name, $choices, $value = '', $required = true)
    {
        if (is_string($choices))
            $choices = explode(';', $choices);
        parent::__construct($name, $verbose_name, $value, $required);
        $this->choices = $choices;
    }

    public function render()
    {
        $this->preInputField();
        $requiredParameter = "";
        if ($this->required)
            $requiredParameter = "required";

        echo sprintf('<select name="%s" %s>', $this->name, $requiredParameter);
        echo "<option value=\"\" disabled selected aria-selected='true' onautocomplete='off'>Seleccionar...</option>";
        foreach ($this->choices as $index => $choice)
            if (strcmp($index, $this->value) == 0)
                echo sprintf("<option value='%s' selected aria-selected='true' autocomplete='off'> %s</option>", $index, $choice);
            else
                echo sprintf("<option value='%s'> %s</option>", $index, $choice);

        echo '</select>';
        echo sprintf("<label>%s</label>", $this->verbose_name);
        $this->postInputField();
    }

    public function getChoices()
    {
        return $this->choices;
    }

}