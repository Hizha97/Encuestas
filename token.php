<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 13/11/17
 * Time: 23:33
 */
require_once(__DIR__ . "/DatabaseConnection.php");

function checkToken()
{
    $db = $GLOBALS['db'];
    $sql = "SELECT numero_token FROM tokens";
    $result = $db->query($sql);
    foreach($result->fetchAll() as $token)
        if ($token['numero_token'] == $_COOKIE['token'])
            return true;
    return false;
}

function deleteToken()
{
    unset($_COOKIE['token']);
    $db = $GLOBALS['db'];
    $sql = "DELETE FROM tokens WHERE TIMESTAMPDIFF(SECOND, hora_inicio, NOW()) <= expiration_time";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    header("Location:  " . BASE_URL . "/LoginView.php");
}