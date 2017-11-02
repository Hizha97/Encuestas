<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 30/10/2017
 * Time: 21:14
 */

class __Row
{
    use RenderTrait;
    private $fields;

    public function __construct($fields)
    {
        $this->fields = $fields;
    }

    public function render()
    {
        echo "<div class='row'>";
        foreach($this->fields as $field)
            $field->render();
        echo '</div>';
    }
}

function Row(...$fields)
{
    return new __Row($fields);
}