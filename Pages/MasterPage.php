<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 10/11/17
 * Time: 23:27
 */

require_once (__DIR__.'/../Pages/pages.php');

class MasterPage extends MenuPage
{

    public $modelClass;

    public function __construct($modelClass)
    {
        $this->modelClass = $modelClass;
    }

    public function body()
    {
        parent::body();

        echo '<div class = "container">';
        $models = ($this->modelClass)::getAll();

        echo sprintf("<h2 class='teal-text lighten-2'> Lista de %s </h2>", $this->modelClass);

        if (count($models) == 0)
        {
            echo sprintf("<p class='teal-text lighten-2 flow-text' style='font-weight: 100;'> No hay registros todavia. </p>", $this->modelClass);
        }
        else
        {

            echo '<table><thead>';
            echo '<tr>';
            foreach (get_object_vars($models[0]) as $attr => $value)
                if(is_subclass_of($value, "Field") and get_class($value) != 'OneToMany')
                {
                    echo '<th>';
                    echo $value->getVerboseName();
                    echo '</th>';
                }
            echo '<th></th><th></th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';
            foreach($models as $model)
            {
                echo '<tr>';
                foreach (get_object_vars($model) as $attr => $value)
                    if(is_subclass_of($value, "Field") and get_class($value) != 'OneToMany')
                    {
                        echo '<td>';
                        echo $value->getValue();
                        echo '</td>';
                    }
                echo sprintf('<td><form action="%s" method="POST">', "View/ViewUpdatePage.php");
                echo sprintf("<input type='hidden' value='%s' name='modelClass'>", $this->modelClass);
                echo sprintf("<input type='hidden' value='%s' name='pk'>", $model->id);
                echo sprintf("<input type='hidden' value='%s' name='success_url'>", $_SERVER['REQUEST_URI']);
                echo sprintf("<input type='hidden' value='%s' name='form_class'>", 'Form');
                echo sprintf('<button class="btn waves-effect waves-light" type="submit" name="action">%s</button>', "Editar");
                echo '</form></td>';

                echo sprintf('<td><form action="%s" method="POST">', "View/ViewDeletePage.php");
                echo sprintf("<input type='hidden' value='%s' name='modelClass'>", $this->modelClass);
                echo sprintf("<input type='hidden' value='%s' name='pk'>", $model->id);
                echo sprintf("<input type='hidden' value='%s' name='success_url'>", $_SERVER['REQUEST_URI']);
                echo sprintf('<button class="btn waves-effect waves-light" type="submit" name="action">%s</button>', "Eliminar");
                echo '</form></td>';
                echo '</tr>';
            }
            echo '</tbody>';

            echo '</table>';
        }

        echo sprintf('<td><form action="%s" method="POST">', "View/ViewCreatePage.php");
        echo sprintf("<input type='hidden' value='%s' name='modelClass'>", $this->modelClass);
        echo sprintf("<input type='hidden' value='%s' name='success_url'>", $_SERVER['REQUEST_URI']);
        echo sprintf("<input type='hidden' value='%s' name='form_class'>", 'Form');
        echo '<button type="submit" class="btn-floating btn-large waves-effect waves-light red right"><i class="material-icons">add</i></button>';
        echo '</form>';

        echo '</div>';
    }
}