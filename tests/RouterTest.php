<?php


use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{
    const ROUTE_SWITCH__DIR__ = 'C:\Users\Lok\Desktop\Pizzaria\app';

    public function testHomepage()
    {
        $router = new \Pizzaria\App\Router();
        $this->assertEquals(self::ROUTE_SWITCH__DIR__ . '/../view/homepage/index.html', $router->run(''));
    }

    public function testErrorPage()
    {
        $router = new \Pizzaria\App\Router();
        $this->assertEquals(self::ROUTE_SWITCH__DIR__ . '/../view/errorPage/index.html', $router->run('notExistingRoute'));
    }

    public function testPathToView()
    {
        $router = new \Pizzaria\App\Router();
        $this->assertEquals(self::ROUTE_SWITCH__DIR__ . '/../view/teste/index.html', $router->pathToView('teste'));
    }
}
