<?php
/**
 * Created by PhpStorm.
 * Usuario: antonio
 * Date: 02/11/2017
 * Time: 3:14
 */

class Model
{
    public $id;
    public $initial;

    public function __construct($initial)
    {
        $this->id = uniqid("Model_" , true);
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

    static public function getAll()
    {

        $query = "SELECT * FROM " . strtolower(get_called_class()) .'s;';
        $db = $GLOBALS['db'];

        $stmt = $db->prepare($query);
        $stmt->execute();

        $className = get_called_class();
        $ret = array();
        foreach ($stmt->fetchAll() as $result)
        {
            $retClass = new $className($result);
            $retClass->id = $result['id'];
            array_push($ret, $retClass);
        }

        return $ret;
    }

    static public function get($pk){
        $query = "SELECT * FROM " . strtolower(get_called_class()) .'s' . ' WHERE id = ?;';
        $db = $GLOBALS['db'];

        $stmt = $db->prepare($query);
        $stmt->execute(array($pk));

        $result = $stmt->fetch();
        $className = static::class;
        $retClass = new $className($result);
        $retClass->id = $result['id'];
        return $retClass;
    }

}
