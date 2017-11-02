<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 30/10/2017
 * Time: 17:49
 */

require_once ("RenderTrait.php");
include_once ("DatabaseConnection.php");
require_once ("ExampleModel.php");

class FormView
{
    use RenderTrait;
    public $db;
    public $model = ExampleModel::class;
    public $fields;
    public $action;
    public $method;
    public $additionalClasses;
    /**
     * FormView constructor.
     * @param $fields
     * @param $labels
     * @param $db
     * @param $model
     * @param $action
     * @param $method
     */
    public function __construct($fields, $action, $method, $additionalClasses="")
    {
        $this->fields = $fields;
        $this->action = $action;
        $this->method = $method;
        $this->db = $GLOBALS['db'];
        $this->additionalClasses = $additionalClasses;
    }

    public function render()
    {
        echo sprintf('<form class="%s">', $this->additionalClasses);
        (new $this->model)->layout()->render();
        echo "</form>";
    }
}