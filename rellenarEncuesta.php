<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 11/11/2017
 * Time: 18:33
 */

require_once(__DIR__ . '/RellenarEncuestaView.php');

$pkTipoEncuesta = $_GET['p'];


$page = new RellenarEncuestaView($pkTipoEncuesta);

echo '<div class = "container">';
$page->render();
echo '</div>';