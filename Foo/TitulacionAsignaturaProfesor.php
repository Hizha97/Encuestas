<?php
/**
 * Created by PhpStorm.
 * Usuario: isa
 * Date: 5/11/17
 * Time: 21:06
 */
require_once (__DIR__."/../Models/models.php");
require_once (__DIR__."/../Fields/fields.php");

class TitulacionAsignaturaProfesor extends Model
{
    public $titulacion;
    public $asignatura;
    public $profesor;

    public function __construct($initial = array())
    {
        $this->titulacion = new CharField('titulacion', 'Titulacion');
        $this->asignatura = new CharField('asignatura', 'Asignatura');
        $this->profesor = new CharField('profesor', 'Profesor');
        parent::__construct($initial);
    }

    public function __toString()
    {
        return sprintf("%s | %s | %s", $this->titulacion->getValue(), $this->asignatura->getValue(), $this->profesor->getValue());
    }
}