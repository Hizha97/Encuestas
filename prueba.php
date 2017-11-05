<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 03/11/2017
 * Time: 21:45
 */
require_once("Models/models.php");
require_once ("Foo/VistaDetallePregunta.php");

echo '<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">';
echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">';
echo '<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>';
echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>';

$classStr = $_POST['formModelClass__internal'];
$initial = $_POST;

unset($initial['formModelClass__internal']);
unset($initial['action']);

$model = new $classStr($initial);

$detallevista = new VistaDetallePregunta($model);

$detallevista->render();