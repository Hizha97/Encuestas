<?php
/**
 * Created by PhpStorm.
 * Usuario: antonio
 * Date: 05/11/2017
 * Time: 13:10
 */

require_once(__DIR__."/../RenderTrait.php");

abstract class AbstractPage
{
    use RenderTrait;

    abstract public function head();
    abstract public function beforeBodyScripts();
    abstract public function body();
    abstract public function afterBodyScripts();

    public function render()
    {
        echo '<!DOCTYPE html>';
        echo '<html>';
        echo '<head>';
        $this->head();
        echo '</head>';
        echo '<script>';
        $this->beforeBodyScripts();
        echo '</script>';
        echo '<body>';
        $this->body();
        echo '</body>';
        echo '<script>';
        $this->afterBodyScripts();
        echo '</script>';
        echo '</html>';
    }
}

