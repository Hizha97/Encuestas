<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 11/11/2017
 * Time: 15:54
 */
require_once(__DIR__ . '/Pages/pages.php');
include(__DIR__ . '/token.php');

if (isset($_COOKIE['token']) && checkToken()) {
    $pagina = new MasterPage("Seccion");
    $pagina->render();
} else
    deleteToken();