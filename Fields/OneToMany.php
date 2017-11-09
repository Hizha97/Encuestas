<?php
/**
 * Created by PhpStorm.
 * Usuario: antonio
 * Date: 05/11/2017
 * Time: 20:54
 */

class OneToMany extends Field
{
    public $className;

    public function __construct($name, $verbose_name, $className, $value = array(), $required = true)
    {
        if(count($value) == 0)
            $value = array('ids' => array(), 'ord' => '');
        $this->className = $className;
        parent::__construct($name, $verbose_name, $value, $required);
    }

    public function render()
    {
        $choices = array();
        foreach ($this->className::getAll() as $obj)
            $choices[$obj->id] = $obj->__toString();


        $this->preInputField();
        $requiredParameter = "";
        if($this->required)
            $requiredParameter = "required";
        echo sprintf('<select name="%s[ids][]" multiple %s>', $this->name,$requiredParameter);

        echo "<option value=\"\">seleccionar...</option>";
        foreach($choices as $index => $choice)
            if(in_array($index, $this->value['ids']))
                echo sprintf("<option value='%s' selected> %s</option>", $index, $choice);
            else
                echo sprintf("<option value='%s'> %s</option>", $index, $choice);

        echo '</select>';
        echo sprintf("<label>%s</label>", $this->verbose_name);
        $this->postInputField();

        (new CharField($this->name . '[ord]', "Ordenacion(separe los campos por ;)", $this->value['ord'], false))->render();
    }
}