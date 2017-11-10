<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 10/11/17
 * Time: 20:59
 */
require_once ('Pages/pages.php');
require_once ('Forms/forms.php');
class CreatePage extends MenuPage
{
    public $formClass;
    public $modelClass;

    /**
     * CreatePage constructor.
     * @param $model
     */
    public function __construct($formClass, $modelClass)
    {
        $this->formClass = $formClass;
        $this->modelClass = $modelClass;

    }


    public function body()
    {
        parent::body(); // TODO: Change the autogenerated stub

        echo "<div class = 'container'>";
        echo sprintf("<h2 class='teal-text lighten-2'> Crear %s </h2>", $this->modelClass);
        $form = new $this->formClass(array(), 'create.php', 'POST', $this->modelClass);
        $form->render();
        echo"</div>";


    }

}