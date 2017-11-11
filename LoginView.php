<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 11/11/17
 * Time: 18:11
 */
require_once (__DIR__ . '/Pages/pages.php');
require_once(__DIR__ . '/PaginaLogin.php');


$pagina = new PaginaLogin();

echo '<div class = "container">';
echo '<h2 class="teal-text lighten-2">Login</h2>';
echo '<br>';
$pagina->render();
echo '</div>';