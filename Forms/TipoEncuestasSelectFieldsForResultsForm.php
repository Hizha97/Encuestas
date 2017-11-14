<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 14/11/17
 * Time: 3:26
 */

class TipoEncuestasSelectFieldsForResultsForm extends Form
{

    public $encuestasId;

    public function __construct($initial, $action, $method, $modelClass, $success_url, $encuestasId)
    {
        $this->encuestasId = $encuestasId;
        parent::__construct($initial, $action, $method, $modelClass, $success_url);
    }


    public function layout()
    {
        $v = $this->model;
        $preguntas = array();
        foreach ($this->encuestasId as $id)
            array_push($preguntas, new StringToRenderable(sprintf("<input type='hidden' value='%s' name='%s'>", $id, "encuesta_" . $id)));

        foreach ($v->secciones->getValue()['ids'] as $seccionId) {
            $seccion = Seccion::get($seccionId);
            foreach ($seccion->preguntas->getValue()['ids'] as $preguntaId) {
                $pregunta = Pregunta::get($preguntaId);
                $checkbox = new CheckboxField('pregunta_' . $preguntaId, $pregunta->__toString(), "", false);
                array_push($preguntas, $checkbox);
            }
        }

        return Layout(...$preguntas);

    }
}