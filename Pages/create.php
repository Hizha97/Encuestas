<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 10/11/17
 * Time: 23:31
 */
require_once ("../Models/models.php");

$classStr = $_POST['formModelClass__internal'];
$initial = $_POST;


unset($initial['formModelClass__internal']);
unset($initial['action']);

$model = new $classStr($initial);

$model->save();