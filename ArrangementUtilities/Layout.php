<?php
/**
 * Created by PhpStorm.
 * Usuario: antonio
 * Date: 02/11/2017
 * Time: 3:38
 */

require_once ('RenderTrait.php');

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
        foreach($this->renderables as $renderable) {
            if (method_exists($renderable, "render"))
                $renderable->render();
        }
    }


}

function Layout(...$renderables)
{
    return new __Layout($renderables);
}