<?php
/**
 * Created by PhpStorm.
 * Usuario: antonio
 * Date: 30/10/2017
 * Time: 22:00
 */

require_once("Fields/fields.php");

class ExampleModel extends Model
{
    public $texto;
    public $password;
    public $campoAdicional;
    public $checkbox;
    public $switch;
    public $choice;
    public $multipleselect;
    public $select;

    public function __construct($initial)
    {
        $this->campoAdicional = new DateField("campoAdicional", "Fecha");
        $this->texto = new CharField( "texto", "Texto", '', false);
        $this->password = new PasswordField("password", "password");
        $this->checkbox = new CheckboxField("checkbox", "Check si antonio es un xulo");
        $this->switch = new SwitchField("switch", "off", "on");
        $this->choice = new ChoiceField("choice", array("Hombre", "Mujer", "Otros"));
        $this->multipleselect = new MultipleSelectField("multipleselect", "Elija el sexo", array("Hombre", "Mujer", "Otros"));
        $this->select = new SelectField("select", 'Select', array("Hombre", "Mujer", "Otros"));
        parent::__construct($initial);
    }
}


