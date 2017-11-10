<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 10/11/17
 * Time: 23:27
 */

require_once ('../RenderTrait.php');

class MasterView
{
    use RenderTrait;

    public $modelClass;

    public function __construct($modelClass)
    {
        $this->modelClass = $modelClass;
    }

    public function render()
    {
        $models
        echo '<table>';


        echo '</table>';
    }
}