<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 11/11/2017
 * Time: 14:01
 */

require_once(__DIR__ . '/../Pages/pages.php');


$modelClass = $_POST['modelClass'];
$form_class = $_POST['form_class'];
$pk = $_POST['pk'];
$success_url = $_POST['success_url'];

$page = new UpdatePage($form_class, $modelClass, $pk, $success_url);
$page->render();
