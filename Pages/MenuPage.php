<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 10/11/17
 * Time: 20:54
 */

require_once(__DIR__ . '/BasePage.php');
require_once(__DIR__ . '/../settings.php');

class MenuPage extends BasePage
{
    public function body()
    {
        // TODO: Implement body() method.
        $navbar = new Navbar("Encuestas", array(BASE_URL . "/TipoEncuestasView.php" => "Tipos de encuesta",
            BASE_URL . "/SeccionesView.php " => "Secciones",
            BASE_URL . "/PreguntasView.php" => "Preguntas",
            BASE_URL . "/TitulacionAsignaturaProfesorView.php" => "Titulaciones | Asignaturas | Profesores",
            BASE_URL . "/UsuariosView.php" => "Usuarios",
            BASE_URL . "/EstadisticaEncuestasView.php" => "Estadisticas"));
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