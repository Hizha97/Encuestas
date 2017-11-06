<?php
/**
 * Created by PhpStorm.
 * Usuario: antonio
 * Date: 05/11/2017
 * Time: 20:54
 */

class OneToMany extends MultipleSelectField
{
    public $className;

    public function __construct($name, $verbose_name, $originClassName, $className , $value = '', $required = true)
    {
        $this->className = $className;
        parent::__construct($name, $verbose_name, $value, $required);
    }

    public function render()
    {
        (new MultipleSelectField($this->name, $this->verbose_name, $this->value, $this->required))->render();
    }
}