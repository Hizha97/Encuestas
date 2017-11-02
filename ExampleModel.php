<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 30/10/2017
 * Time: 22:00
 */

require_once ('Fields/DateField.php');
require_once('Fields/CharField.php');
require_once ('Fields/PasswordField.php');
require_once ('Fields/CheckboxField.php');
require_once('Fields/RadioButton.php');
require_once ('Fields/SwitchField.php');
require_once ('Fields/ChoiceField.php');
require_once ('Fields/MultipleSelectField.php');
require_once ('Fields/SelectField.php');

class ExampleModel
{
    public static $texto;
    public static $password;
    public static $campoAdicional;
    public static $checkbox;
    public static $switch;
    public static $choice;
    public static $multipleselect;
    public static $select;

}


ExampleModel::$campoAdicional = new DateField("fecha", "fecha", "Fecha", "10-05-1997");
ExampleModel::$texto = new CharField("texto1", "Texto", "texto", "adfad");
ExampleModel::$password = new PasswordField("contraseña", "Contraseña", "password", "adf");
ExampleModel::$checkbox = new CheckboxField("check1","check", "Check si antonio es un xulo", 1);
ExampleModel::$switch = new SwitchField("Switch", "switch", "1", "off", "on");
ExampleModel::$choice = new ChoiceField("form1","Sexo", array("Hombre", "Mujer", "Otros"), 1);
ExampleModel::$multipleselect = new MultipleSelectField("Sexo", array("Hombre", "Mujer", "Otros"), array(1,2));
ExampleModel::$select = new SelectField("Sexo", array("Hombre", "Mujer", "Otros"), 1);