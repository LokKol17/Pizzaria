<?php

namespace Pizzaria\App;

class Router extends RouteSwitch
{
    public function run(string $requestUri): string
    {
        $route = $requestUri;

        if ($route === '') {
            return $this->homepage();
        } else {
            return $this->$route();
        }
    }
}