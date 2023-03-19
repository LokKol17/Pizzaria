<?php

namespace Pizzaria\App;

abstract class RouteSwitch
{
    protected function homepage(): string
    {
        return $this->pathToView('homepage');
    }


    public function __call(string $name, array $arguments)
    {
        return $this->pathToView('errorPage');
    }

    private function pathToView($view): string
    {
        return __DIR__ . '/../view/' . $view . '/index.html';
    }
}