<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 11/11/2017
 * Time: 3:05
 */

require_once (__DIR__.'/Pages/pages.php');


$modelClass = $_POST['modelClass'];
$success_url = $_POST['success_url'];
$form_class = $_POST['form_class'];
$page = new CreatePage($form_class, $modelClass, $success_url);
$page->render();

