<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 13/11/2017
 * Time: 3:11
 */


require_once(__DIR__ . '/Pages/pages.php');
require_once(__DIR__ . '/token.php');

if (isset($_COOKIE['token']) && checkToken()) {

    $pagina = new MasterPage("Usuario");
    $pagina->render();
} else
    deleteToken();