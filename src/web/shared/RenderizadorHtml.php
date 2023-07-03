<?php

namespace CadastroNis\web\shared;

class RenderizadorHtml
{
    public function renderizarView(string $nomeDaView)
    {
        ob_start();

        require __DIR__ . '/../views/' . $nomeDaView;

        $html = ob_get_clean();

        return $html;
    }
}
