<?php
/**
 * Created by PhpStorm.
 * Usuario: antonio
 * Date: 30/10/2017
 * Time: 17:46
 */

require_once ('MyPage.php');
require_once ('Models/models.php');
require_once ('Forms/forms.php');
require_once ('Pages/pages.php');

$pagina = new CreatePage('Form', 'Pregunta');


$pagina->render();

?>




