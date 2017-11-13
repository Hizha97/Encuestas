<?php
/**
 * Created by PhpStorm.
 * Usuario: isa
 * Date: 1/11/17
 * Time: 18:57
 */

require_once (__DIR__ . '/Field.php');

class ChoiceField extends Field
{
    protected $choices;

    public function __construct($name, $choices, $value = '')
    {
        if(is_string($choices))
            $choices = explode(';', $choices);
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

    public function getChoices(){
        return $this->choices;
    }
}