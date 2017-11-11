<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 10/11/17
 * Time: 20:54
 */

require_once (__DIR__.'/AbstractPage.php');

class MenuPage extends AbstractPage
{

    public function head()
    {
        // TODO: Implement head() method.
        echo '<meta charset="utf-8">';
        echo '<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">';
        echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">';
        echo '<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>';
        echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>';
    }

    public function beforeBodyScripts()
    {
        // TODO: Implement beforeBodyScripts() method.
        echo '$( document ).ready(function() {';
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


        echo '});';
    }

    public function body()
    {
        // TODO: Implement body() method.
        $navbar = new Navbar("Encuestas", array("TipoEncuestasView.php" => "Tipos de encuesta", "SeccionesView.php " => "Secciones", "PreguntasView.php" => "Preguntas"));
        $navbar->render();
    }

    public function afterBodyScripts()
    {
        // TODO: Implement afterBodyScripts() method.
        echo '$(document).ready(function() {',
        '$(".button-collapse").sideNav();',
        '});';
    }
}