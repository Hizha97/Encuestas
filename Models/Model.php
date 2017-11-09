<?php
/**
 * Created by PhpStorm.
 * Usuario: antonio
 * Date: 02/11/2017
 * Time: 3:14
 */
require_once ("Fields/fields.php");
require_once ("Models/models.php");
require_once ("DatabaseConnection.php");
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
            var_dump($this->initial);
            if (array_key_exists($attribute, $this->initial) and !is_null($value))
                if(method_exists($value, "setValue"))
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

    public function save(){
        $query = "INSERT INTO " . strtolower(get_called_class()) .'s' . " (id,";
        $values = " VALUES (NULL, ";

        $params = array();
        foreach(get_object_vars($this) as $attribute => $value)
            if(is_subclass_of($value, "Field") and get_class($value) != 'OneToMany')
            {
                $query = $query . $attribute . ', ';
                $values = $values . ' ?,';
                $val = $value->getValue();

                if(is_array($val))
                    $val = implode(';', $val);

                array_push($params, $val);
            }
        $query = substr($query, 0, -2) . ")";
        $values = substr($values, 0, -1) . ");";

        $finalQuery = $query . $values;
        // hacer el insert
        $db = $GLOBALS['db'];

        $stmt = $db->prepare($finalQuery);
        $stmt->execute($params);

        $lastId = $db->lastInsertId();

/*
        foreach(get_object_vars($this) as $attribute => $value)
        {
            if(get_class($value) == 'OneToMany')
            {
                $dest = $value->className;
                $labIdOr = 'id'+get_called_class();
                $labIdDest = 'id'+$dest;
                $finalQuery = sprint("INSERT INTO %s(%s, %s) VALUES(?, ?);", get_called_class() . '_' . $dest, $labIdOr, $labIdDest);
                $stmt = $db->prepare($finalQuery);
                foreach(explode(';', $value->getValue()) as $ids)
                    $stmt->execute(array($lastId, $ids));
            }
        }

        print_r($stmt->errorInfo());
        echo "<br>";
        print_r($db->lastInsertId());*/
        // mirar los onetomany

    }



}
