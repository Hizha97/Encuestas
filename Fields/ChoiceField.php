<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 1/11/17
 * Time: 18:57
 */

class ChoiceField extends Field
{
    protected $choices;

    public function __construct($name, $choices, $value = '')
    {
        parent::__construct($name, $name, $value);
        $this->choices = $choices;
    }

    public  function render()
    {
        echo sprintf('<div id=%s>', $this->id);

       foreach($this->choices as $index => $choice)
       {
           $r = new RadioButton($this->name, $choice, $index === $this->value);
           $r->render();
       }

       echo '</div>';
    }
}