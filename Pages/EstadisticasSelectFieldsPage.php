<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 13/11/17
 * Time: 21:08
 */

class EstadisticasSelectFieldsPage extends MenuPage
{
    public $pkTipoEncuesta;

    public function __construct($pkTipoEncuesta)
    {
        $this->pkTipoEncuesta = $pkTipoEncuesta;
    }

    public function body()
    {
        parent::body();
        $tipoencuesta = TipoEncuesta::get($this->pkTipoEncuesta);

        $form = new TipoEncuestaSelectFieldsForm($tipoencuesta->initial, BASE_URL . '/EstadisticasFilterView.php', "POST", "TipoEncuesta", "#");
        echo '<div class = "container">';
        echo sprintf("<h2 class='teal-text lighten-2'> Campos de filtro</h2>");
        echo sprintf("<p>Seleccione los campos por los que desee filtrar:</p>");

        $form->render();
        echo '</div>';
    }
}