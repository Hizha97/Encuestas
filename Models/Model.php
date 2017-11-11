<?php
/**
 * Created by PhpStorm.
 * Usuario: antonio
 * Date: 02/11/2017
 * Time: 3:14
 */
require_once (__DIR__."/../Fields/fields.php");
require_once ("models.php");
require_once (__DIR__."/../DatabaseConnection.php");

class Model
{
    public $id;
    public $initial;

    public function __construct($initial = array())
    {
        $this->id = uniqid("Model_" , true);
        $this->initial = $initial;
        $this->set_initial_data($initial);
    }

    public function set_initial_data($initial)
    {
        $this->initial = $initial;
        $classAttributes = get_object_vars($this);

        foreach($classAttributes as $attribute => &$value)
        {
            if (array_key_exists($attribute, $initial) and !is_null($value))
                if(method_exists($value, "setValue"))
                    $value->setValue($initial[$attribute]);
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
            $retClass = new $className;

            $className = static::class;
            $retClass = new $className;

            foreach(get_object_vars($retClass) as $attribute => $value)
            {
                if (is_object($value) && get_class($value) == "OneToMany")
                    $result[$attribute] = get_called_class()::get_related($result['id'], $value->className);
            }

            $retClass->set_initial_data($result);
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
        $retClass = new $className;

        foreach(get_object_vars($retClass) as $attribute => $value)
        {
            if (is_object($value) && get_class($value) == "OneToMany")
                $result[$attribute] = get_called_class()::get_related($result['id'], $value->className);
        }
        $retClass->set_initial_data($result);
        $retClass->id = $result['id'];
        return $retClass;
    }

    static public function get_related($pk , $class)
    {
        $calledClass = strtolower(get_called_class()) .'s';
        $destinyClass = strtolower($class) . 's';
        $table = $calledClass . '_' . $destinyClass;

        $query = "SELECT * FROM " .  $table .' WHERE id' . get_called_class() . '=?;';
        $db = $GLOBALS['db'];
        $stmt = $db->prepare($query);
        $stmt->execute(array($pk));

        $relatedIds = array();
        $relatedOrd = array();
        foreach ($stmt->fetchAll() as $result)
        {
            array_push($relatedIds, $result['id' . strtolower($class)]);
            if($result['ordering'] != null)
                array_push($relatedOrd, $result['ordering']);
        }

        return array('ids' => $relatedIds, 'ord' => implode(';', $relatedOrd));

    }

    static public function delete($pk){
        $query = "DELETE FROM " . strtolower(get_called_class()) .'s' . ' WHERE id = ?;';
        $db = $GLOBALS['db'];
        $stmt = $db->prepare($query);
        $stmt->execute(array($pk));
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


        foreach(get_object_vars($this) as $attribute => $value)
        {
            if(is_object($value))
                if(get_class($value) == 'OneToMany')
                {
                    $dest = strtolower($value->className);
                    $labIdOr = "id".get_called_class();
                    $labIdDest = "id". $dest;
                    $finalQuery = sprintf("INSERT INTO %s(%s, %s, %s) VALUES(?, ?, ?);", strtolower(get_called_class()) . 's_' . $dest.'s', $labIdOr, $labIdDest, 'ordering');
                    $stmt = $db->prepare($finalQuery);
                    foreach($value->getValue()['ids'] as $ids) {
                        if(strlen($value->getValue()['ord']) != 0)
                            $stmt->execute(array($lastId, $ids, array_search($ids, explode(';', $value->getValue()['ord'])) + 1));
                        else
                            $stmt->execute(array($lastId, $ids, NULL));

                    }
                }
        }

        // mirar los onetomany

    }



}
