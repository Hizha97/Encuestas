<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 31/10/17
 * Time: 9:14
 */

require_once ('Field.php');

class DateField extends Field
{

    public function render()
    {
        $requiredParameter = "";

        $this->preInputField();
        if($this->required)
            $requiredParameter = "required";

        echo sprintf("<input type='%s' class='%s' id='%s' name='%s' %s>", "text", "datepicker", $this->id, $this->name, $requiredParameter);
        echo sprintf("<label for='%s'> %s </label>", $this->id, $this->verbose_name);

        if($this->value !== '')
            echo '<script type="text/javascript">',
            sprintf('$(\'document\').ready(function(){var picker = $(\'#%s\').pickadate().pickadate(\'picker\');', $this->id),
            sprintf("picker.set('select', '%s');});", $this->value),
            '</script>';

        $this->postInputField();
    }
}

