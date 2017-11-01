<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 30/10/2017
 * Time: 22:00
 */

require_once ('Fields/DateField.php');
require_once ('Fields/TextField.php');
require_once ('Fields/PasswordField.php');
require_once ('Fields/CheckboxField.php');
require_once ('Fields/RadioField.php');
require_once ('Fields/SwitchField.php');
require_once ('Fields/ChoiceField.php');


class ExampleModel
{
    public static $texto;
    public static $password;
    public static $campoAdicional;
    public static $checkbox;
    public static $radio1;
    public static $radio2;
    public static $radio3;
    public static $switch;
    public static $choice;
}


ExampleModel::$campoAdicional = new DateField("fecha1", "Fecha", "fecha", "", "col s6");
ExampleModel::$texto = new TextField("texto1", "Texto", "texto", "", "col s6");
ExampleModel::$password = new PasswordField("contraseña", "Contraseña", "password", "", "col s6");
ExampleModel::$checkbox = new CheckboxField("check1", "Check si antonio es un xulo", "checkbox", "", "col s6");
ExampleModel::$radio1 = new RadioField("Radio1", "radio1", "grupo1", "col s6");
ExampleModel::$radio2 = new RadioField("Radio2", "radio2", "grupo1", "col s6");
ExampleModel::$radio3 = new RadioField("Radio3", "radio3", "grupo1", "col s6");
ExampleModel::$switch = new SwitchField("Switch", "switch", "", "col s6", "on", "off");
ExampleModel::$choice = new ChoiceField("Sexo", array("Hombre", "Mujer", "Otros"), '', '');