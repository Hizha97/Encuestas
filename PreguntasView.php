<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 11/11/2017
 * Time: 15:54
 */
require_once(__DIR__ . '/Pages/pages.php');
require_once(__DIR__ . '/token.php');

if (isset($_COOKIE['token']) && checkToken()) {
    $pagina = new MasterPage("Pregunta");
    $pagina->render();
} else
    deleteToken();