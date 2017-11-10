<?php
/**
 * Created by PhpStorm.
 * Usuario: antonio
 * Date: 30/10/2017
 * Time: 19:16
 */

require_once(__DIR__."/../RenderTrait.php");


abstract class Field
{
    protected $id;
    protected $verbose_name;
    protected $value;
    protected $name;
    protected $required;

    /**
     * Field constructor.
     * @param $id
     * @param $verbose_name
     * @param $value
     * @param $styleClasses
     */
    public function __construct($name, $verbose_name, $value = '', $required = true)
    {
        $this->id = uniqid("Field_" , true);
        $this->name = $name;
        $this->verbose_name = $verbose_name;
        $this->value = $value;
        $this->required = $required;
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

    public function getValue()
    {
        return $this->value;
    }
}