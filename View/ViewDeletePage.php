<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 11/11/2017
 * Time: 2:44
 */
require_once(__DIR__ . "/../Models/models.php");
include __DIR__  . '/../token.php';

if(isset($_COOKIE['token']) && checkToken())
{
    $modelClass = $_POST['modelClass'];
    $pk = $_POST['pk'];
    $success_url = $_POST['success_url'];
    ($modelClass)::delete($pk);

    header('Location: ' . $success_url);
}
else
    deleteToken();
