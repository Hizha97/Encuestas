<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 12/11/17
 * Time: 0:11
 */

class PaginaLogin extends BasePage
{
    public function body()
    {
        $login = new Form(array(),BASE_URL . '/View/Actions/validar.php','POST', 'Usuario', 'index.php');
        $login->render();
    }


    /*echo '<div class = "container">';
    $page->render();
    echo "</div>";*/
}