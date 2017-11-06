<?php
/**
 * Created by PhpStorm.
 * Usuario: isa
 * Date: 5/11/17
 * Time: 21:06
 */
require_once ("Models/Model.php");

class TitulacionAsignaturaProfesor extends Model
{
    public $titulacion;
    public $asignatura;
    public $profesor;

    public function __construct($initial)
    {
        $this->titulacion = new CharField('titulacion', 'Titulacion');
        $this->asignatura = new CharField('asignatura', 'Asignatura');
        $this->profesor = new CharField('profesor', 'Profesor');
        parent::__construct($initial);
    }

}