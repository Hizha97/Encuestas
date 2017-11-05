<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 02/11/2017
 * Time: 3:14
 */

class Model
{
    public $initial;

    public function __construct($initial)
    {
        $this->initial = $initial;
        $this->set_initial_data();
    }

    public function set_initial_data()
    {
        $classAttributes = get_object_vars($this);

        foreach($classAttributes as $attribute => &$value)
        {
            if (array_key_exists($attribute, $this->initial) and !is_null($value))
                $value->setValue($this->initial[$attribute]);
        }
    }

    public function get_context_data(){
        $attr = array_values(get_object_vars($this));

        return $attr;
    }

}