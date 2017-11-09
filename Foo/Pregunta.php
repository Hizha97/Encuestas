<?php
/**
 * Created by PhpStorm.
 * Usuario: isa
 * Date: 5/11/17
 * Time: 21:18
 */
require_once ("Models/Model.php");
require_once ("Fields/fields.php");

class Pregunta extends Model
{
    public $pregunta;
    public $posiblesRespuestas;
    public $tipo;
    public $abrev;

    public function __construct($initial = array())
    {
        $this->pregunta = new CharField('pregunta', 'Pregunta');
        $this->posiblesRespuestas = new CharField('posiblesRespuestas', 'Posibles Respuestas(dejar vacío si no procede)', '', false);
        $this->tipo = new SelectField('tipo', 'Tipo de pregunta', array('CharField' => 'Campo Texto',
                                                                                          'CheckboxField' => 'Casilla de marcado' ,
                                        'ChoiceField' => "Radios de selección", 'DateField' => 'Fecha',
                                        'MultipleSelectField' => 'Selección multiple', 'SelectField' => 'Campo de selección',
                                        'SwitchField' => 'Switch'));
        $this->abrev = new CharField('abrev', 'Abreviatura de la pregunta');
        $this->pro = new OneToMany("pro", "Usuario", "Usuario", array(), false);
        parent::__construct($initial);
    }


}