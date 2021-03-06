<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 11/11/17
 * Time: 18:49
 */
require_once(__DIR__."/../../DatabaseConnection.php");
require_once(__DIR__."/../../Models/models.php");

$db = $GLOBALS['db'];

$usuario = $_POST['usuario'];
$password = hash("sha256", $_POST['password']);

$sql = "SELECT count(*) FROM usuarios WHERE usuario= ? AND password = ?";

$result = $db->prepare($sql);
$result->execute(array($usuario,$password));

if($result->fetchColumn() == 1)
{
    $token = new Token;
    $token->save();
    if(isset($_COOKIE['token']))
        unset($_COOKIE['token']);

    setcookie("token", $token->numero_token->getValue(), time() + 1800, '/');
    header('Location: ' . $_POST["success_url"]);
}

else
    header("Location: {$_SERVER["HTTP_REFERER"]}");