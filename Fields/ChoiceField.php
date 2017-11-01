<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 1/11/17
 * Time: 18:57
 */

class ChoiceField extends Field
{
    protected $name;
    protected $choices;

    public function __construct($name, $choices, $value = '', $styleClasses = '')
    {
        parent::__construct($name, $name, $value, $styleClasses);
        $this->name = $name;
        $this->choices = $choices;
    }

    public  function render()
    {
       foreach($this->choices as $choice)
       {
           $r = new RadioField($choice, $choice, $this->name, $this->value, $this->styleClasses);
           $r->render();
       }
    }
}