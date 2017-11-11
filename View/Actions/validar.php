<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 11/11/17
 * Time: 18:49
 */
require_once(__DIR__."/../../DatabaseConnection.php");

$db = $GLOBALS['db'];

$usuario = $_POST['usuario'];
$password = $_POST['password'];

$sql = "SELECT count(*) FROM usuarios WHERE usuario= ? AND password = ?";

$result = $db->prepare($sql);
$result->execute(array($usuario,$password));


if($result->fetchColumn() == 1)
    header('Location: ' . BASE_URL . '/../../../' . $_POST["success_url"]);

else
    header("Location: {$_SERVER["HTTP_REFERER"]}");