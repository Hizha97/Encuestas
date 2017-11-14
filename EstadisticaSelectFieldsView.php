<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 13/11/17
 * Time: 20:04
 */

require_once(__DIR__ . "/Forms/forms.php");
require_once(__DIR__ . "/Pages/pages.php");
include(__DIR__ . '/token.php');

if (isset($_COOKIE['token']) && checkToken()) {


    $pk = $_POST['pk'];

    $page = new EstadisticasSelectFieldsPage($pk);
    $page->render();
} else {
    deleteToken();
}