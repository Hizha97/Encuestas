<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 13/11/2017
 * Time: 0:41
 */

require_once (__DIR__ . '/Models/models.php');

print_r($_POST);

$tipoDeEncuesta = $_POST['id'];
$encuestaPk = $_POST['idEncuesta'];

$encuesta = Encuesta::get($encuestaPk);
$encuesta->fecha_fin->setValue(date("Y-m-d H:i:s"));
$encuesta->update();
//$respuestas = array();

foreach($_POST as $key => $value)
    if(strstr($key, 'pregunta_') != FALSE)
    {
        $keyExploded = explode('_', $key);
        $idPregunta = $keyExploded[1];
        $val = $value;
        if(is_array($value))
            $val = implode(";", $value);
        $respuestaNueva = new Respuesta(array("pregunta" => $idPregunta, "respuesta" => $val, "encuesta" => $encuestaPk, "tipoencuesta" => $tipoDeEncuesta));
        $respuestaNueva->save();
    }