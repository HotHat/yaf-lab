<?php
use Yaf\Dispatcher;
use Yaf\Controller_Abstract;

class HelloController extends Controller_Abstract {

	public function worldAction() {

		echo 'hello, world';
		exit(0);
	}

}
