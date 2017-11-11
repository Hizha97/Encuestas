<?php
/**
 * Created by PhpStorm.
 * User: isa
 * Date: 10/11/17
 * Time: 20:59
 */
require_once (__DIR__.'/../Pages/pages.php');
require_once (__DIR__.'/../Forms/forms.php');
class CreatePage extends MenuPage
{
    public $formClass;
    public $modelClass;
    public $success_url;
    /**
     * CreatePage constructor.
     * @param $model
     */
    public function __construct($formClass, $modelClass, $success_url)
    {
        $this->formClass = $formClass;
        $this->modelClass = $modelClass;
        $this->success_url = $success_url;
    }


    public function body()
    {
        parent::body(); // TODO: Change the autogenerated stub

        echo "<div class = 'container'>";
        echo sprintf("<h2 class='teal-text lighten-2'> Crear %s </h2>", $this->modelClass);
        $form = new $this->formClass(array(), 'Actions/create.php', 'POST', $this->modelClass, $this->success_url);
        $form->render();
        echo"</div>";


    }

}