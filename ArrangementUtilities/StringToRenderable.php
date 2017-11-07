<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 7/11/17
 * Time: 9:18
 */

class StringToRenderable
{
    public $toRender;

    /**
     * Renderable constructor.
     * @param $toRender
     */
    public function __construct($toRender)
    {
        $this->toRender = $toRender;
    }


    public function render()
    {
        echo $this->toRender;
    }
}