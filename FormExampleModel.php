<?php
/**
 * Created by PhpStorm.
 * User: antonio
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
        return Layout(Row(Col($v->texto, "s3 l12"),
            Col($v->password, "s3 l12")),
            $v->campoAdicional,
            Row(Col($v->checkbox, "s8"), Col($v->switch, "s4")),
            Row($v->multipleselect),
            Row($v->select));
    }
}