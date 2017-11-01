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
    protected $styleClasses;

    /**
     * Field constructor.
     * @param $id
     * @param $verbose_name
     * @param $value
     * @param $styleClasses
     */
    public function __construct($id, $verbose_name, $value = '', $styleClasses = '')
    {
        $this->id = $id;
        $this->verbose_name = $verbose_name;
        $this->value = $value;
        $this->styleClasses = $styleClasses;
    }


    public abstract function render();/*
    {

        switch ($this->type)
        {
            case "range":
                break;
            case "switch":
        }

        echo "<label for='" . $this->name . "'>" . $this->verbose_name . "</label>";
    }*/


}