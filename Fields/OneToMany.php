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

    public function __construct($name, $verbose_name, $className, $values = array(), $ordering = array(), $required = true)
    {
        $this->className = $className;
        parent::__construct($name, $verbose_name, $values, $required);
    }

    public function render()
    {
        $choices = array();
        foreach ($this->className::getAll() as $obj)
            $choices[$obj->id] = $obj->__toString();

        (new MultipleSelectField($name . '[]', $this->verbose_name, $choices, $this->values, $this->required))->render();

        $render = Col(Layout(new StringToRenderable($this->model->pregunta->getValue()), $renderable), "s12");


        $orderingStr = "Si quieres definir un orden, introduce aquí los IDs separados por ; , en el orden en el que quieres que aparezcan los objetos";

        $ordering = (new CharField($name . '[]', "Ordenacion(separe los campos por ;)", ))
    }
}