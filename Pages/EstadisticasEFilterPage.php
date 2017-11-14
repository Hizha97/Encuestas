<?php
/**
 * Created by PhpStorm.
 * User: antonio
 * Date: 14/11/17
 * Time: 0:00
 */

class EstadisticasEFilterPage extends MenuPage
{
    public $tipoencuesta;
    public $preguntas;

    public function __construct($tipoencuesta, $preguntas = array())
    {
        $this->tipoencuesta = $tipoencuesta;
        $this->preguntas = $preguntas;
    }

    public function body()
    {
        parent::body();
        $logicalSelector = null;
        echo '<div class="container">';
        echo sprintf("<h2 class='teal-text lighten-2'> Filtro para las encuestas del tipo: %s</h2>", $this->tipoencuesta->titulo->getValue());

        echo sprintf('<form id="%s" method="%s" action="%s">', $this->id = uniqid("Form_", true), "POST", "EstadisticasPFilterView.php");
        echo sprintf("<input type='hidden' value='%s' name='modelClass'>", "TipoEncuesta");
        echo sprintf("<input type='hidden' value='%s' name='success_url'>", "");
        echo sprintf("<input type='hidden' value='%s' name='id'>", $this->tipoencuesta->id);


        foreach ($this->preguntas as $pregunta) {

            $tipoPregunta = $pregunta->tipo->getValue();
            $renderable = null;
            switch ($tipoPregunta) {
                case "ChoiceField":
                case "SelectField":
                    $dictValues = array();
                    $tipo = $tipoPregunta;

                    if ($tipo === 'MultipleSelectField' or $tipo === 'SelectField') {
                        if ($pregunta->esRelacionado->getValue() == "Si") {
                            $relatedClassName = $pregunta->posiblesRespuestas->getValue();
                            $modelosRelacionados = ($relatedClassName)::getAll();
                            foreach ($modelosRelacionados as $posibleRespuesta)
                                $dictValues[$posibleRespuesta->id] = $posibleRespuesta->__toString();
                        } else
                            foreach (explode(';', $pregunta->posiblesRespuestas->getValue()) as $posibleRespuesta)
                                $dictValues[$posibleRespuesta] = $posibleRespuesta;
                    }
                    $renderable = new MultipleSelectField("pFilter_" . $pregunta->id, $pregunta->__toString(), $dictValues);
                    break;
                case "TextAreaField":
                    $renderable = new CharField("pFilter_" . $pregunta->id, "Cadenas que pueden contener el texto, separadas por punto y coma");
                    break;
            }

            $renderable->render();

        }
        echo "<div class='row' style='margin-top:20px;'>";
        echo '<a class="btn waves-effect waves-light" style="margin-right:20px;" onclick="history.back()">Volver</a>';
        echo sprintf('<button class="btn waves-effect waves-light" type="submit" name="action" id="%s">Enviar
        <i class="material-icons right">send</i>
        </button>', hash("sha256", spl_object_hash($this)) . "Action");
        echo '</div></div>';


    }
}