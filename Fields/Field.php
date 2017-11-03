<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 30/10/2017
 * Time: 19:16
 */

require_once("RenderTrait.php");


abstract class Field
{
    protected $id;
    protected $verbose_name;
    protected $value;
    protected $name;

    /**
     * Field constructor.
     * @param $id
     * @param $verbose_name
     * @param $value
     * @param $styleClasses
     */
    public function __construct($id, $name, $verbose_name, $value = '')
    {
        $this->id = $id;
        $this->name = $name;
        $this->verbose_name = $verbose_name;
        $this->value = $value;
    }


    public abstract function render();

    protected function preInputField()
    {
        echo sprintf("<div class='%s'>", 'input-field');
    }

    protected function postInputField()
    {
        echo '</div>';
    }

    public function setValue($value)
    {
        $this->value = $value;
    }
}