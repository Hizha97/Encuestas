<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 14/11/17
 * Time: 0:50
 */

require_once(__DIR__ . '/Models/models.php');
require_once(__DIR__ . '/Pages/pages.php');
$tipoDeEncuesta = $_POST['id'];

$respuestas = array();

foreach ($_POST as $key => $value)
    if (strstr($key, 'pFilter_') != FALSE) {
        $keyExploded = explode('_', $key);
        $idPregunta = $keyExploded[1];
        $respuestas[$idPregunta] = $value;
    }

$queryBase = "SELECT * FROM respuestas WHERE tipoencuesta=?";
$query = $queryBase;
$finalQuery = $query;

$respFilteredId = array();
$params = array($tipoDeEncuesta);
foreach ($respuestas as $idPregunta => $filtroResp) {
    $db = $GLOBALS['db'];
    $stmt = null;
    $tipoDePregunta = Pregunta::get($idPregunta)->tipo->getValue();
    if ($tipoDePregunta != "TextAreaField") {
        if (is_array($filtroResp) and count($filtroResp) > 1) {
            $query = $query . sprintf(" AND (pregunta=? AND find_in_set(respuesta, ?))");
            array_push($params, $idPregunta);
            array_push($params, implode(',', $filtroResp));
        } else {
            $query = $query . sprintf(" AND (pregunta=? AND respuesta=?)");
            array_push($params, $idPregunta);
            if (is_array($filtroResp))
                array_push($params, $filtroResp[0]);
            else
                array_push($params, $filtroResp);
        }
    } else {
        $query = $query . sprintf(" AND (pregunta=? ");
        array_push($params, $idPregunta);

        foreach (explode(';', $filtroResp) as $filtro) {
            $query = $query . sprintf(" OR respuesta like ?");
            array_push($params, '%' . $filtro . '%');
        }
        $query = $query . ")";

    }
    if (end($respuestas) != $filtroResp) {
        array_push($params, $tipoDeEncuesta);
        $query = $query . ' INTERSECT ' . $queryBase;
    }

}

$stmt = $db->prepare($query);
$stmt->execute($params);

foreach ($stmt->fetchAll() as $result) {
    if (array_search($result['encuesta'], $respFilteredId) == false)
        array_push($respFilteredId, $result['encuesta']);
}

$page = new EstadisticasPFilterPage($tipoDeEncuesta, $respFilteredId);
$page->render();