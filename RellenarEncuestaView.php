<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 11/11/2017
 * Time: 19:09
 */

require_once (__DIR__ . '/Pages/pages.php');
require_once (__DIR__ . '/Models/models.php');
require_once (__DIR__ . '/EncuestaForm.php');
class RellenarEncuestaView extends BasePage
{
    public $pk;

    public function __construct($pk)
    {
        $this->pk = $pk;
    }

    public function body()
    {


        $tipoencuesta = TipoEncuesta::get($this->pk);

        echo '<div class="navbar-fixed">';
        echo '<nav>';
        echo '<div class="nav-wrapper">';
        echo sprintf('<a href="#!" class="brand-logo center">%s</a>', $tipoencuesta->titulo->getValue());
        echo '<ul></ul>';
        echo '</div>';
        echo '</nav>';
        echo '</div>';

        $encuesta = new EncuestaForm($tipoencuesta->initial, "#", "POST", "TipoEncuesta", "");
        echo '<div class = "container">';

        $encuesta->render();
        echo '</div>';
    }
}