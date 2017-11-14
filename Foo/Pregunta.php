<?php
/**
 * Created by PhpStorm.
 * Usuario: isa
 * Date: 5/11/17
 * Time: 21:18
 */
require_once(__DIR__ . "/../Models/Model.php");
require_once(__DIR__ . "/../Fields/fields.php");

class Pregunta extends Model
{
    public $pregunta;
    public $posiblesRespuestas;
    public $tipo;
    public $abrev;
    public $esRelacionado;

    public function __construct($initial = array())
    {
        $this->pregunta = new CharField('pregunta', 'Pregunta');
        $this->posiblesRespuestas = new CharField('posiblesRespuestas', 'Posibles Respuestas(dejar vacío si no procede)', '', false);
        $this->esRelacionado = new SelectField("esRelacionado", "La respuesta es una tabla", array("No" => "No", "Si" => "Si"), "No");

        $this->tipo = new SelectField('tipo', 'Tipo de pregunta', array('CharField' => 'Campo Texto',
            'CheckboxField' => 'Casilla de marcado',
            'ChoiceField' => "Radios de selección", 'DateField' => 'Fecha',
            'MultipleSelectField' => 'Selección multiple', 'SelectField' => 'Campo de selección',
            'SwitchField' => 'Switch', "TextAreaField" => "Texto libre"));
        $this->abrev = new CharField('abrev', 'Abreviatura de la pregunta');
        parent::__construct($initial);
    }

    public function __toString()
    {
        return sprintf("%s (%s)", $this->abrev->getValue(), $this->id);
    }

}