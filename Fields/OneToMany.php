<?php
/**
 * Created by PhpStorm.
 * Usuario: antonio
 * Date: 05/11/2017
 * Time: 20:54
 */

class OneToMany extends Field
{
    public $className;

    public function __construct($name, $verbose_name, $className, $value = array(''), $required = true)
    {
        $this->className = $className;
        parent::__construct($name, $verbose_name, $value, $required);
    }

    public function render()
    {
        $choices = array();
        foreach ($this->className::getAll() as $obj)
            $choices[$obj->id] = $obj->__toString();

        (new MultipleSelectField($this->name, $this->verbose_name, $choices, $this->value, $this->required))->render();
    }
}