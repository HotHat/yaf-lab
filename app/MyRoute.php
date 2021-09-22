<?php declare(strict_types=1);

namespace App;

use Yaf\Route_Interface;
use Yaf\Request_Abstract;

class MyRoute implements Route_Interface
{

    private $routeMap;


    public function addMap($uri, $action) {
        $this->routeMap[$uri] = $action;

        return $this;
    }


    public function assemble(array $info, array $query = null): string {

        return '?r=hello_world';
    }

    public function route($request): bool {
        echo 'custom route for yaf', "\n";

        // $uri = $this->
        // print_r($request);
        // echo '=================';
        // print_r($request->getBaseUri());
        // echo '**************';
        // print_r($request->getRequestUri());

        foreach ($this->routeMap as $uri => $action) {
            if (trim($request->getRequestUri(), '/') == $uri) {
                [$controller, $action] = explode('@', $action);
                $request->controller = str_replace('Controller', '', $controller);
                $request->action = $action;
            }
        }

        // print_r(trim($request->getRequestUri(), '/'));
        // print_r($request);
       // TODO: 这里可以写个中间件

        $result = array_reduce($ttt, function($carry, $item) {
            return function($param) use ($carry, $item) {
                $item($param, $carry);
            };

        }, function($item) {  // fun001
            echo 'destination';
            echo $item, PHP_EOL;
        });



        return true;
    }

}