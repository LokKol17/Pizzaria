<?php

namespace Pizzaria\App;

use DOMDocument;

class HtmlMetadata
{
    private DOMDocument $html;
    private string $routeName;

    const ASSETS_PATH = __DIR__ . '/../public/assets/';

    public function __construct(string $html, string $routeName)
    {
        libxml_use_internal_errors(true);
        $this->html = new DOMDocument();
        $this->html->loadHTML($html);
        libxml_use_internal_errors(false);
        $this->routeName = $routeName;
    }

    public function renderCss(): DOMDocument
    {
        $head = $this->html->getElementsByTagName('head')->item(0);
        $cssFiles = $this->getCssFiles();

        if (!$cssFiles) {
            return $this->html;
        }

        $this->putCssFilesInHead($cssFiles, $head);
        return $this->html;
    }

    private function putCssFilesInHead(array $cssFiles, &$head): void
    {
        foreach ($cssFiles as $cssFile) {
            $link = $this->html->createElement('link');
            $link->setAttribute('rel', 'stylesheet');
            $link->setAttribute('href', $this->pathToCssAssets() . $cssFile);
            $head->appendChild($link);
        }
    }

    private function pathToCssAssets(bool $fromActualDirectory = false): string
    {
        if (is_dir(self::ASSETS_PATH . "$this->routeName/css/") === false) {
            $this->routeName = 'errorPage';
        }

        if ($fromActualDirectory) {
            return self::ASSETS_PATH . "$this->routeName/css/";
        }
        return "/assets/$this->routeName/css/";
    }

    private function getCssFiles(): array|false
    {
        if (is_dir($this->pathToCssAssets(true)) === false) {
            return false;
        }

        $cssFiles = scandir($this->pathToCssAssets(true));

        if (!$cssFiles) {
            return false;
        }
        return array_diff($cssFiles, ['.', '..']);
    }
}