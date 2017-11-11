<?php
/**
 * Created by PhpStorm.
 * Usuario: antonio
 * Date: 30/10/2017
 * Time: 17:46
 */

require_once (__DIR__ . '/Pages/pages.php');
require_once (__DIR__ . '/Models/models.php');
//$pagina = new MyPage;

$pagina = new MenuPage;
$pagina->render();
//$pagina->render();

?>




