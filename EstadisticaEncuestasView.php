<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 13/11/17
 * Time: 18:57
 */

require_once(__DIR__ . '/Pages/pages.php');


require_once(__DIR__ . '/token.php');

if (isset($_COOKIE['token']) && checkToken()) {
    $page = new EstadisticasMasterPage('TipoEncuesta');

    $page->render();
} else {
    deleteToken();
}