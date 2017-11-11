<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 11/11/2017
 * Time: 18:33
 */

require_once(__DIR__ . '/EncuestaForm.php');

$pkTipoEncuesta = $_GET['p'];

$tipoencuesta = TipoEncuesta::get($pkTipoEncuesta);

$encuesta = new EncuestaForm($tipoencuesta->initial, "#", "POST", "TipoEncuesta", "");
$encuesta->render();