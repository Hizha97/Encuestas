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

if(isset($_COOKIE["token"]))
{
    $pagina = new MenuPage;
    $pagina->render();
}
else

    header("Location:  " . BASE_URL . "/LoginView.php");


//$pagina->render();

?>




