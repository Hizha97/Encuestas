<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 30/10/2017
 * Time: 17:46
 */
require_once ("FormView.php");
echo '  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">';
echo '      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>';
echo '  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>';
echo '  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>';

$initial = array('campoAdicional' => "10-05-1996");

$form = new FormView($initial,"","");

echo '<div class="container">';
$form->render();
echo '</div>';

echo '<script>';

echo ' $(\'.datepicker\').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: true, // Creates a dropdown of 15 years to control year,
    today: \'Today\',
    clear: \'Clear\',
    close: \'Ok\',
    closeOnSelect: false // Close upon selecting a date,
  });';

echo '$(document).ready(function() {',
"$('select').material_select();",
'});';
echo '  $(\'.chips\').material_chip();';
echo '</script>';
?>



