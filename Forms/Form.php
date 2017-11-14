<?php
/**
 * Created by PhpStorm.
 * Usuario: antonio
 * Date: 03/11/2017
 * Time: 19:19
 */

require_once(__DIR__ . "/../RenderTrait.php");
require_once(__DIR__ . "/../DatabaseConnection.php");
require_once(__DIR__ . "/../Models/models.php");
require_once(__DIR__ . '/../ArrangementUtilities/arrangementUtilities.php');

class Form
{
    use RenderTrait;
    public $model;
    public $initial;
    public $action;
    public $method;
    private $modelClass;
    private $success_url;

    /**
     * FormView constructor.
     * @param $fields
     * @param $action
     * @param $method
     */
    public function __construct($initial, $action, $method, $modelClass, $success_url)
    {
        $this->initial = $initial;
        $this->action = $action;
        $this->method = $method;
        $this->modelClass = $modelClass;
        $this->model = new $modelClass($initial);
        $this->success_url = $success_url;
    }

    public function render()
    {
        $this->db = $GLOBALS['db'];
        echo sprintf('<form id="%s" method="%s" action="%s">', $this->id = uniqid("Form_", true), $this->method, $this->action);
        echo sprintf("<input type='hidden' value='%s' name='modelClass'>", $this->modelClass);
        echo sprintf("<input type='hidden' value='%s' name='success_url'>", $this->success_url);
        echo sprintf("<input type='hidden' value='%s' name='id'>", $this->model->id);

        $this->layout()->render();

        echo "<div class='row' style='margin-top:20px;'>";
        echo '<a class="btn waves-effect waves-light" style="margin-right:20px;" onclick="history.back()">Volver</a>';
        echo sprintf('<button class="btn waves-effect waves-light" type="submit" name="action" id="%s">Enviar
        <i class="material-icons right">send</i>
        </button>', hash("sha256", spl_object_hash($this)) . "Action");


        echo "</div></form>";

    }

    public function layout()
    {
        // Default behaviour
        return Layout(...$this->model->get_context_data());

    }


}