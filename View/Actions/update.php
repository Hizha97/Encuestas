<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 11/11/2017
 * Time: 14:33
 */

require_once(__DIR__."/../../Models/models.php");

$modelClass = $_POST['modelClass'];
$success_url = $_POST['success_url'];

$initial = $_POST;

unset($initial['modelClass']);
unset($initial['action']);
unset($initial['success_url']);

if(isset($initial['password']))
    $initial['password'] = hash("sha256", $initial['password']);

$model = new $modelClass($initial);



$model->update();

header('Location: ' . $_POST['success_url']);

