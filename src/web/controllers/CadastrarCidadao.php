<?php

namespace CadastroNis\web\controllers;

use CadastroNis\web\shared\RenderizadorHtml;
use CadastroNis\web\shared\WebControllerInterface;

class CadastrarCidadao extends RenderizadorHtml implements WebControllerInterface
{
    public function exibirView()
    {
        echo $this->renderizarView('cadastrar-cidadao.php');
    }
}
