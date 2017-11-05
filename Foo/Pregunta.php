<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 5/11/17
 * Time: 21:18
 */
require_once ("Models/Model.php");

class Pregunta extends Model
{
    public $pregunta;
    public $posiblesResp;
    public $tipo;
    public $abrev;

    public function __construct($initial)
    {
        $this->pregunta = new CharField('pregunta', 'Pregunta');
        $this->posiblesResp = new CharField('posiblesResp', 'Posibles Respuestas(dejar vacío si no procede)', '', false);
        $this->tipo = new SelectField('tipo', 'Tipo de pregunta', array('CharField', 'CheckboxField',
                                        'ChoiceField', 'DateField',
                                        'MultipleSelectField', 'SelectField', 'SwitchField'));
        $this->abrev = new CharField('abrev', 'Abreviatura de la pregunta');
        parent::__construct($initial);
    }


}