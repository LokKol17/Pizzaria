<?php

class RenderizaHtml
{
    public function renderiza($nome, $dados = [])
    {
        $html = file_get_contents(__DIR__ . '/../public/' . $nome . '.html');
        require $html;
    }
}