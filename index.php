<?php
/**
 * Created by PhpStorm.
 * Usuario: antonio
 * Date: 30/10/2017
 * Time: 17:46
 */

require_once (__DIR__ . '/Pages/pages.php');
require_once (__DIR__ . '/Models/models.php');
include 'token.php';


if(isset($_COOKIE['token']) && checkToken())
{
    $pagina = new MenuPage;
    $pagina->render();
}
else
    deleteToken();


//$pagina->render();

?>




