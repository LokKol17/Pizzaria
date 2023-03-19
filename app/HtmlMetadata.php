<?php

namespace Pizzaria\App;

use DOMDocument;
use DOMException;

class HtmlMetadata
{
    private DOMDocument $html;
    private string $routeName;

    public function __construct(string $html, string $routeName)
    {
        libxml_use_internal_errors(true);
        $this->html = new DOMDocument();
        $this->html->loadHTML($html);
        libxml_use_internal_errors(false);
        $this->routeName = $routeName;
    }

    /**
     * @throws DOMException
     */
    public function renderCss(): DOMDocument
    {
        $head = $this->html->getElementsByTagName('head')->item(0);
        $cssFiles = $this->getCssFiles();

        if (!$cssFiles) {
            return $this->html;
        }

        foreach ($cssFiles as $cssFile) {
            $link = $this->html->createElement('link');
            $link->setAttribute('rel', 'stylesheet');
            $link->setAttribute('href', $this->pathToCssAssets() . $cssFile);
            $head->appendChild($link);
        }

        return $this->html;
    }

    private function pathToCssAssets(bool $fromActualDirectory = false): string
    {
        if (is_dir(__DIR__ . "/../public/assets/$this->routeName/css/") === false) {
            $this->routeName = 'errorPage';
        }

        if ($fromActualDirectory) {
            return __DIR__ . "/../public/assets/$this->routeName/css/";
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