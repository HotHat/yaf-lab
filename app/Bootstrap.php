<?php

use Yaf\Loader;
use Yaf\Registry;
use Yaf\Application;
use Yaf\Dispatcher;
use Yaf\Bootstrap_Abstract;
use App\MyRoute;

class Bootstrap extends Bootstrap_Abstract{
    public function _initLoader(Dispatcher $dispatcher)
    {
        Loader::import(APPLICATION_PATH . '/vendor/autoload.php');
    }

    public function _initConfig() {
		$arrConfig = Application::app()->getConfig();
		Registry::set('config', $arrConfig);
	}

	public function _initPlugin(Dispatcher $dispatcher) {
		$objSamplePlugin = new SamplePlugin();
		$dispatcher->registerPlugin($objSamplePlugin);
	}

	public function _initRoute(Dispatcher $dispatcher) {
        // TODO: 这里加载所有的route

		$route = new MyRoute();
		$route->addMap('hello', 'IndexController@hello')
              ->addMap('my-hello', 'HelloController@world');

        $dispatcher->getRouter()->addRoute('my-route', $route);
	}
	
	public function _initView(Dispatcher $dispatcher){
		
	}



}
