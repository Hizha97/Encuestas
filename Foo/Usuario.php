<?php
/**
 * Created by PhpStorm.
 * Usuario: isa
 * Date: 5/11/17
 * Time: 20:51
 */

require_once(__DIR__ . "/../Models/models.php");
require_once(__DIR__ . "/../Fields/fields.php");

class Usuario extends Model
{
    public $usuario;
    public $password;

    public function __construct($initial = array())
    {
        $this->usuario = new CharField('usuario', 'Nombre de usuario');
        $this->password = new PasswordField('password', 'Contraseña');
        parent::__construct($initial);
    }

    public function __toString()
    {
        return sprintf("%s (%s)", $this->usuario->getValue(), $this->id);
    }

}