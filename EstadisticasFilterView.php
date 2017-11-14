<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 13/11/17
 * Time: 23:42
 */

require_once(__DIR__ . '/Models/models.php');
require_once(__DIR__ . '/Pages/pages.php');


$tipoDeEncuesta = $_POST['id'];

$preguntas = array();

foreach ($_POST as $key => $value)
    if (strstr($key, 'pregunta_') != FALSE) {
        $keyExploded = explode('_', $key);
        $idPregunta = $keyExploded[1];
        $val = $value;
        array_push($preguntas, Pregunta::get($idPregunta));
    }

$page = new EstadisticasEFilterPage(TipoEncuesta::get($tipoDeEncuesta), $preguntas);
$page->render();