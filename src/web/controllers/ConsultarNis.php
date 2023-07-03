<?php

namespace CadastroNis\web\controllers;

use CadastroNis\web\shared\RenderizadorHtml;
use CadastroNis\web\shared\WebControllerInterface;

class ConsultarNis extends RenderizadorHtml implements WebControllerInterface
{
    public function exibirView()
    {
        echo $this->renderizarView('consultar-nis.php');
    }
}
