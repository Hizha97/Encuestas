<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 13/11/2017
 * Time: 3:08
 */

require_once (__DIR__ . '/Pages/pages.php');
include 'token.php';

if(isset($_COOKIE['token']) && checkToken())
{

    $pagina = new MasterPage("TitulacionAsignaturaProfesor");
    $pagina->render();
}
else
    deleteToken();