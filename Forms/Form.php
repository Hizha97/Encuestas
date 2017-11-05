<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 03/11/2017
 * Time: 19:19
 */

require_once("RenderTrait.php");
require_once("DatabaseConnection.php");
require_once ("Models/models.php");
require_once('ArrangementUtilities/arrangementUtilities.php');
class Form
{
    use RenderTrait;
    public $model;
    public $initial;
    public $action;
    public $method;
    /**
     * FormView constructor.
     * @param $fields
     * @param $action
     * @param $method
     */
    public function __construct($initial, $action, $method, $modelClass)
    {
        $this->initial = $initial;
        $this->action = $action;
        $this->method = $method;
        $this->model = new $modelClass($initial);
    }

    public function render()
    {
        $this->db = $GLOBALS['db'];
        echo sprintf('<form id="%s" method="%s" action="%s">', hash("sha256", spl_object_hash($this)), $this->method, $this->action);
        $this->layout()->render();

        echo sprintf('<button class="btn waves-effect waves-light" type="submit" name="action" id="%s">Enviar
        <i class="material-icons right">send</i>
        </button>',  hash("sha256", spl_object_hash($this)) . "Action");

        echo "</form>";
    }

    public function layout()
    {
        // Default behaviour
        return Layout(...$this->model->get_context_data());

    }


}