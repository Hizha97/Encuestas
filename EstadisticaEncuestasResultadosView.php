<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 14/11/17
 * Time: 3:48
 */

require_once (__DIR__ . '/DatabaseConnection.php');
require_once (__DIR__ . '/Models/models.php');
require_once (__DIR__ . '/Pages/pages.php');

$preguntas = array();
$encuestas = array();

foreach($_POST as $key => $value) {
    if (strstr($key, 'encuesta_') != FALSE) {
        $keyExploded = explode('_', $key);
        $idEncuesta = $keyExploded[1];
        array_push($encuestas, $idEncuesta);
    }
    if (strstr($key, 'pregunta_') != FALSE) {
        $keyExploded = explode('_', $key);
        $idPregunta = $keyExploded[1];
        array_push($preguntas, $idPregunta);
    }
}


$baseQuery = "SELECT * FROM respuestas WHERE encuesta=? AND pregunta IN(";
$query = $baseQuery;
$params = array();

foreach($encuestas as $encuestaId)
{
    array_push($params, $encuestaId);
    foreach($preguntas as $preguntaId) {
        $query = $query . sprintf("?, ");
        array_push($params, $preguntaId);
    }
    $query = substr($query, 0, -2) . ")";

    if(end($encuestas) != $encuestaId)
        $query = $query . ' UNION ' . $baseQuery;
}
$db = $GLOBALS['db'];
$stmt = $db->prepare($query);
$stmt->execute($params);


$respuestas = array();
foreach($stmt->fetchAll() as $result)
{
    array_push($respuestas, new Respuesta($result));
}

$page = new MasterPageProvidedModels($respuestas);

$page->render();