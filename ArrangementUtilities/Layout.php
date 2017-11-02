<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 02/11/2017
 * Time: 3:38
 */

class __Layout
{
    use RenderTrait;
    private $renderables;

    /**
     * Layout constructor.
     * @param $renderables
     */
    public function __construct($renderables)
    {
        $this->renderables = $renderables;
    }

    public function render()
    {
        foreach($this->renderables as $renderable)
            $renderable->render();
    }


}

function Layout(...$renderables)
{
    return new __Layout($renderables);
}