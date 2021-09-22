<?php declare(strict_types=1);


namespace App;


class Route
{
    public $uri;
    public $method;
    public $action;
    public $middleware;

    public function __construct($url, $action, $middleware = [])
    {
        $this->url = $url;
        $this->action = $action;
        $this->middleware = $middleware;
    }

}