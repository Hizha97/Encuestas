<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 11/11/2017
 * Time: 18:33
 */

require_once(__DIR__ . '/RellenarEncuestaView.php');


if(array_key_exists('p', $_GET)) {
    $pkTipoEncuesta = $_GET['p'];

    $page = new RellenarEncuestaView($pkTipoEncuesta);

    $page->render();
}
else {
    echo sprintf("<h1> La página solicitada no existe </h1>");
}