<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 13/11/17
 * Time: 19:19
 */
require_once (__DIR__."/../Models/Model.php");
require_once (__DIR__."/../Fields/fields.php");

class Token extends Model
{
    public $numero_token;
    public $hora_inicio;
    public $expiration_time;
    public $usuario;


    public function __construct($initial = array())
    {
        $this->numero_token = new IntegerField('numero_token', 'Numero Token', uniqid("token_", true));
        $this->hora_inicio = new CharField('token', 'Token', date("Y-m-d H:i:s"));
        $this->expiration_time = new IntegerField('expiration_time', 'Expiration Time', 1800);
        $this->usuario = new ForeignKey('usuario', 'Usuario', 'Usuario');
        parent::__construct($initial);
    }

    public function expirated()
    {
        $horaActual = date("Y-m-d H:i:s");
        $horaActual->sub(DateInterval::createFromDateString( 'PT' . $this->expiration_time->getValue() .  'S'));

        return ($horaActual >= $this->expiration_time);

    }

}