<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 30/10/2017
 * Time: 17:46
 */
require_once ("FormView.php");
echo '  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">';


$form = new FormView("","","", "col s12");

echo '<div class="container">';
echo "<div class='row'>";
$form->render();
echo '</div></div>';
echo '      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>';
echo '  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>';


echo ' <script>$(\'.datepicker\').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    today: \'Today\',
    clear: \'Clear\',
    close: \'Ok\',
    closeOnSelect: false // Close upon selecting a date,
  });</script>';
?>


