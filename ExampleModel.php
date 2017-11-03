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
require_once ('ArrangementUtilities/Row.php');
require_once ('ArrangementUtilities/Col.php');
require_once('ArrangementUtilities/Layout.php');
require_once('Model/Model.php');

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
        $this->texto = new CharField( "texto", "Texto");
        $this->password = new PasswordField("password", "password");
        $this->checkbox = new CheckboxField("checkbox", "Check si antonio es un xulo");
        $this->switch = new SwitchField("switch", "off", "on");
        $this->choice = new ChoiceField("choice", array("Hombre", "Mujer", "Otros"));
        $this->multipleselect = new MultipleSelectField("multipleselect", "Elija el sexo", array("Hombre", "Mujer", "Otros"));
        $this->select = new SelectField("select", array("Hombre", "Mujer", "Otros"));
        parent::__construct($initial);
    }

    public function layout()
    {
        return Layout(Row(Col($this->texto, "s3 l12"),
                          Col($this->password, "s3 l12")),
                      $this->campoAdicional,
                      Row(Col($this->checkbox, "s8"), Col($this->switch, "s4")),
                      Row($this->multipleselect),
                      Row($this->select));
    }
}


