<?php

namespace Pizzaria\App;

class RenderHtml
{
    public static function getHtmlContents(string $pathToView): false|string
    {
        return file_get_contents($pathToView);
    }
}