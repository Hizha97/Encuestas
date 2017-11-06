<?php
/**
 * Created by PhpStorm.
 * Usuario: antonio
 * Date: 05/11/2017
 * Time: 20:52
 */

require_once ('fields.php');

class ForeignKey extends Field
{
    public $className;

    public function __construct($name, $verbose_name, $className , $value = '', $required = true)
    {
        $this->className = $className;
        parent::__construct($name, $verbose_name, $value, $required);
    }

    public function render()
    {
        $choices = array();
        foreach ($this->className::getAll() as $obj)
            $choices[$obj->id] = $obj->__toString();

        (new SelectField($this->name, $this->verbose_name, $choices, $this->value, $this->required))->render();
    }

}