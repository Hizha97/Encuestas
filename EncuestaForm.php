<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 11/11/2017
 * Time: 18:35
 */

require_once("Forms/Form.php");
require_once(__DIR__ . '/Models/models.php');
require_once(__DIR__ . '/Foo/VistaDetallePregunta.php');

class EncuestaForm extends Form
{

    public function layout()
    {
        $v = $this->model;

        $renderables = array();

        $nuevaEncuesta = new Encuesta(array("fecha_inicio" => date("Y-m-d H:i:s"), "tipoencuesta" => $this->model->id));
        $nuevaEncuesta->save();
        array_push($renderables, new StringToRenderable(sprintf("<input type='hidden' value='%s' name='idEncuesta'>", $nuevaEncuesta->id)));

        $tituloEncuesta = new StringToRenderable(sprintf("<h1> %s </h1>", $v->titulo->getValue()));
        //array_push($renderables, $tituloEncuesta);

        foreach ($v->secciones->getValue()['ids'] as $seccionId) {
            $seccion = Seccion::get($seccionId);
            $tituloSeccion = new StringToRenderable(sprintf("<h3 class='teal-text lighten-2'> %s </h3>", $seccion->titulo->getValue()));
            array_push($renderables, $tituloSeccion);

            foreach ($seccion->preguntas->getValue()['ids'] as $preguntaId) {
                $pregunta = Pregunta::get($preguntaId);
                array_push($renderables, Row(new VistaDetallePregunta($pregunta)));
            }
        }
        return Layout(...$renderables);
    }
}