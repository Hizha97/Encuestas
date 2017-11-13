<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 13/11/2017
 * Time: 1:02
 */

require_once (__DIR__."/../Models/Model.php");
require_once (__DIR__."/../Fields/fields.php");

class Encuesta extends Model
{
    public $fecha_inicio;
    public $fecha_fin;
    public $tipoencuesta;

    public function __construct($initial = array())
    {
        $this->fecha_inicio = new CharField("fecha_inicio", "Fecha de inicio de la encuesta");
        $this->fecha_fin = new CharField("fecha_inicio", "Fecha de inicio de la encuesta");
        $this->tipoencuesta = new ForeignKey("tipoencuesta", "Tipo de la encuesta", "TipoEncuesta");
        parent::__construct($initial);
    }

    public function __toString()
    {
        return sprintf("%s (%s)", $this->tipoencuesta->getValue(), $this->id);
    }

}