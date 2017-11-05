<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 5/11/17
 * Time: 20:51
 */

require_once ("Models/models.php");
require_once ("Fields/fields.php");
class User extends Model
{
    public $username;
    public $password;

    public function __construct($initial)
    {
        $this->username = new CharField('username','Nombre de usuario');
        $this->password = new PasswordField('password','Contraseña');
        parent::__construct($initial);
    }


}