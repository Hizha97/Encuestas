<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 10/11/17
 * Time: 20:17
 */

class TipoEncuesta extends Model
{
    public $titulo;
    public $fecha_inicio;
    public $fecha_fin;
    public $secciones;

    public function __construct($initial = array())
    {
        $this->titulo = new CharField('titulo', 'Pregunta');
        $this->fecha_inicio = new DateField("fecha_inicio", "Fecha de inicio de la encuesta");
        $this->fecha_fin = new DateField("fecha_fin", "Fecha de fin de la encuesta");
        $this->secciones = new OneToMany("secciones", "Secciones relacionadas", "Seccion");
        parent::__construct($initial);
    }

}