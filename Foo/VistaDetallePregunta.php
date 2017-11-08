<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 5/11/17
 * Time: 21:39
 */


require_once ('RenderTrait.php');
require_once ('ArrangementUtilities/arrangementUtilities.php');

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
        switch ($this->model->tipo->getValue())
        {
            case "CharField":
                $renderable = new CharField($this->model->id , $this->model->abrev->getValue());
                break;
            case "CheckboxField":
                $renderable = new CheckboxField($this->model->id, $this->model->posiblesResp->getValue());
                break;
            case "ChoiceField":
                $renderable = new ChoiceField($this->model->id, explode("," , $this->model->posiblesResp->getValue()));
                break;
            case "MultipleSelectField":
                $renderable = new MultipleSelectField($this->model->id, $this->model->abrev->getValue(), $this->model->posiblesResp->getValue());
                break;
        }
        echo '<form>';
        $render = Col(Layout(new StringToRenderable($this->model->pregunta->getValue()), $renderable), "s12");
        $render->render();
        echo '</form>';
    }


}