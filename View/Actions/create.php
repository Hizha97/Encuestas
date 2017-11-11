<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 10/11/17
 * Time: 23:31
 */



require_once(__DIR__."/../../Models/models.php");

$modelClass = $_POST['modelClass'];
$success_url = $_POST['success_url'];

$initial = $_POST;

unset($initial['modelClass']);
unset($initial['action']);
unset($initial['success_url']);

$model = new $modelClass($initial);

$model->save();

header('Location: ' . $_POST['success_url']);

