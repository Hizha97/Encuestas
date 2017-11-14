<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 14/11/17
 * Time: 3:24
 */

class EstadisticasPFilterPage extends MenuPage
{
    public $pkTipoEncuesta;
    public $encuestasId;
    public function __construct($pkTipoEncuesta, $encuestasId)
    {
        $this->pkTipoEncuesta = $pkTipoEncuesta;
        $this->encuestasId = $encuestasId;
    }

    public function body()
    {
        parent::body();
        $tipoencuesta = TipoEncuesta::get($this->pkTipoEncuesta);

        $form = new TipoEncuestasSelectFieldsForResultsForm($tipoencuesta->initial, BASE_URL . '/EstadisticaEncuestasResultadosView.php', "POST", "TipoEncuesta", "#", $this->encuestasId);
        echo '<div class = "container">';
        echo sprintf("<h2 class='teal-text lighten-2'> Campos de seleccion sobre el filtro:</h2>");
        echo sprintf("<p>Seleccione los campos que desee:</p>");

        $form->render();
        echo '</div>';
    }
}