<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 5/11/17
 * Time: 21:39
 */


require_once (__DIR__.'/../RenderTrait.php');
require_once (__DIR__.'/../ArrangementUtilities/arrangementUtilities.php');

class VistaDetallePregunta
{
    use RenderTrait;
    public $model;

    /**
     * VistaDetallePregunta constructor.
     * @param $model
     */
    public function __construct($model)
    {
        $this->model = $model;
    }

    public function render()
    {
        $renderable = null;

        $dictValues = array();
        $tipo = $this->model->tipo->getValue();

        if($tipo === 'MultipleSelectField' or $tipo === 'SelectField')
        {
            if($this->model->esRelacionado->getValue() == "Si")
            {
                $relatedClassName = $this->model->posiblesRespuestas->getValue();
                $modelosRelacionados = ($relatedClassName)::getAll();
                foreach ($modelosRelacionados as  $posibleRespuesta)
                    $dictValues[$posibleRespuesta->id] = $posibleRespuesta->__toString();
            }
            else
                foreach (explode(';',$this->model->posiblesRespuestas->getValue()) as  $posibleRespuesta)
                    $dictValues[$posibleRespuesta] = $posibleRespuesta;
        }


        $nameAttributeOfPregunta = "pregunta_" . $this->model->id;
        switch ($tipo)
        {
            case "CharField":
                $renderable = new CharField($nameAttributeOfPregunta , $this->model->abrev->getValue());
                break;
            case "CheckboxField":
                $renderable = new CheckboxField($nameAttributeOfPregunta, $this->model->posiblesRespuestas->getValue());
                break;
            case "ChoiceField":
                $renderable = new ChoiceField($nameAttributeOfPregunta, $this->model->posiblesRespuestas->getValue());
                break;
            case "MultipleSelectField":
                $renderable = new MultipleSelectField($nameAttributeOfPregunta, $this->model->abrev->getValue(), $dictValues);
                break;
            case "SelectField":
                $renderable = new SelectField($nameAttributeOfPregunta, $this->model->abrev->getValue(), $dictValues);
                break;
            case "SwitchField":
                $renderable = new SwitchField($nameAttributeOfPregunta, $this->model->posiblesRespuestas->getValue());
                break;
            case "DateField":
                $renderable = new DateField($nameAttributeOfPregunta, $this->model->abrev->getValue());
                break;
            case "TextAreaField":
                $renderable = new TextAreaField($nameAttributeOfPregunta, $this->model->abrev->getValue());
                break;
        }
        $render = Col(Layout(new StringToRenderable($this->model->pregunta->getValue()), $renderable), "s12");
        $render->render();
    }


}