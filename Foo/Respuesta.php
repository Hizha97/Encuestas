<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 13/11/2017
 * Time: 0:59
 */

require_once (__DIR__."/../Models/Model.php");
require_once (__DIR__."/../Fields/fields.php");

class Respuesta extends Model
{
    public $respuesta;
    public $pregunta;
    public $encuesta;

    public function __construct($initial = array())
    {
        $this->respuesta = new CharField('respuesta', 'Respuesta');
        $this->pregunta = new ForeignKey('pregunta', 'Pregunta relacionada', 'Pregunta');
        $this->encuesta = new ForeignKey('encuesta', 'Encuesta relacionada', 'Encuesta');
        parent::__construct($initial);
    }

    public function __toString()
    {
        return sprintf("%s (%s)", $this->respuesta->getValue(), $this->id);
    }

}