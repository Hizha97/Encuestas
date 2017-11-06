<?php
/**
 * Created by PhpStorm.
 * Usuario: antonio
 * Date: 02/11/2017
 * Time: 3:11
 */

class __Col
{
    use RenderTrait;
    private $renderable;
    private $styles;

    /**
     * Col constructor.
     * @param $renderable
     * @param $styles
     */

    public function __construct($renderable, $styles)
    {
        $this->renderable = $renderable;
        $this->styles = $styles;
    }

    public function render()
    {
        echo sprintf("<div class='col %s'>", $this->styles);
        $this->renderable->render();
        echo '</div>';
    }
}

function Col($renderable, $styles)
{
    return new __Col($renderable, $styles);
}