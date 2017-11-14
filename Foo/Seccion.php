<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 10/11/17
 * Time: 20:17
 */
require_once(__DIR__ . "/../Models/models.php");
require_once(__DIR__ . "/../Fields/fields.php");

class Seccion extends Model
{
    public $titulo;
    public $preguntas;

    /**
     * Seccion constructor.
     */
    public function __construct($initial = array())
    {
        $this->titulo = new CharField("titulo", "Titulo");
        $this->preguntas = new OneToMany("preguntas", "Preguntas", "Pregunta");
        parent::__construct($initial);
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return sprintf("%s (%s)", $this->titulo->getValue(), $this->id);
    }
}