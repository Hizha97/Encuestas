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
    public $form_class = ExampleModel::class;
    public $initial;
    public $action;
    public $method;
    /**
     * FormView constructor.
     * @param $fields
     * @param $action
     * @param $method
     */
    public function __construct($initial, $action, $method)
    {
        $this->initial = $initial;
        $this->action = $action;
        $this->method = $method;
    }

    public function render()
    {
        $this->db = $GLOBALS['db'];
        echo sprintf('<form id="%s">', spl_object_hash($this));
        (new $this->form_class($this->initial))->layout()->render();
        echo "</form>";
    }
}