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

    public function __construct($name, $choices, $value)
    {
        parent::__construct(0, $name, $name, $value);
        $this->choices = $choices;
    }

    public  function render()
    {
        $this->preInputField();
        echo sprintf('<select name="%s">', $this->name);

        foreach($this->choices as $index => $choice)
            if($index === $this->value)
                echo sprintf("<option value='%s' selected> %s</option>", $index, $choice);
            else
                echo sprintf("<option value='%s'> %s</option>", $index, $choice);

        echo '</select>';
        echo sprintf("<label>%s</label>", $this->verbose_name);
        $this->postInputField();
    }
}