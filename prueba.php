<?php
/**
 * Created by PhpStorm.
 * Usuario: antonio
 * Date: 03/11/2017
 * Time: 21:45
 */
require_once("Models/models.php");
require_once ("Foo/VistaDetallePregunta.php");

echo '<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">';
echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">';
echo '<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>';
echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>';

echo '<script>$( document ).ready(function() {';
echo ' $(\'.datepicker\').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: true, // Creates a dropdown of 15 years to control year,
    today: \'Today\',
    clear: \'Clear\',
    close: \'Ok\',
    closeOnSelect: false, // Close upon selecting a date
    format: \'dd/mm/yyyy\',
    formatSubmit: \'dd/mm/yyyy\',
    hiddenName: true
  });';

echo '$(document).ready(function() {',
"$('select').material_select();",
"$(\"select[required]\").css({position: \"absolute\", display: \"inline\", height: 0, padding: 0, width: 0, opacity: 0});",
'});';
echo '  $(\'.chips\').material_chip();';


echo '});</script>';

$classStr = $_POST['formModelClass__internal'];
$initial = $_POST;

unset($initial['formModelClass__internal']);
unset($initial['action']);

$model = new $classStr($initial);
$model->save();
/*
$detallevista = new VistaDetallePregunta($model);

$detallevista->render();*/