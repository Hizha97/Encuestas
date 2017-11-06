<?php
/**
 * Created by PhpStorm.
 * Usuario: antonio
 * Date: 03/11/2017
 * Time: 20:50
 */
require_once("Forms/Form.php");
require_once("Models/models.php");

class FormExampleModel extends Form
{
    public function layout()
    {
        $v = $this->model;
        return Layout(Row(Col($v->texto, "s12 l6"),
            Col($v->password, "s12 l6")),
            $v->campoAdicional,
            Row(Col($v->checkbox, "s12 l6"), Col($v->switch, "s12 l6")),
            Row(Col($v->multipleselect, "s12 l6"), Col($v->select, "s12 l6")));
    }
}