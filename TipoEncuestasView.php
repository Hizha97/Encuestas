<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 11/11/2017
 * Time: 15:54
 */
require_once (__DIR__ . '/Pages/pages.php');
include 'token.php';

if(checkToken() && isset($_COOKIE['token']))
{
    $pagina = new MasterPage("TipoEncuesta");
    $pagina->render();
}
else
    deleteToken();