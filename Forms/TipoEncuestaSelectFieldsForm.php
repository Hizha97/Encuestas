<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 13/11/17
 * Time: 20:17
 */

class TipoEncuestaSelectFieldsForm extends Form
{
    public function layout()
    {
        $v = $this->model;
        $preguntas = array();

        foreach($v->secciones->getValue()['ids'] as $seccionId)
        {
            $seccion = Seccion::get($seccionId);
            foreach($seccion->preguntas->getValue()['ids'] as $preguntaId)
            {
                $pregunta = Pregunta::get($preguntaId);
                $checkbox = new CheckboxField('pregunta_'.$preguntaId, $pregunta->__toString(), "", false);
                array_push($preguntas, $checkbox);
            }
        }

        return Layout(...$preguntas);

    }
}