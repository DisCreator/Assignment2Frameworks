<?php
namespace Quwius\Framework;
abstract class FrontController_Abstract{
	//Store the request handler object
	protected $reqHandler = null;

	//invokes the controller
	abstract public static function run();

	//initializes the controller with a framework
	abstract protected function init();

	//Data passed to the front controller from GET or POST methods 
	//checked and passed 
	abstract protected function handleReq();
}