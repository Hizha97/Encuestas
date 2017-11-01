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

class ExampleModel
{
    public static $texto;
    public static $password;
    public static $campoAdicional;
    public static $checkbox;/*
    public static $radio;
    public static $switch;*/
}


ExampleModel::$campoAdicional = new DateField("fecha1", "Fecha", "fecha", "", "col s6");
ExampleModel::$texto = new TextField("texto1", "Texto", "texto", "", "col s6");
ExampleModel::$password = new PasswordField("contraseña", "Contraseña", "password", "", "col s6");
ExampleModel::$checkbox = new CheckboxField("check1", "Check si antonio es un xulo", "checkbox", "", "col s6");
/*ExampleModel::$radio = new RadioField("Radio", "radio", "", "col s6");
ExampleModel::$switch = new SwitchField("Switch", "switch", "", "col s6");*/
