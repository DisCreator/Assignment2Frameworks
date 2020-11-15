<?php
namespace Quwius\Framework;
class RequestHandlerFactory implements RequestHandlerFactory_Interface{
	public static function getRequestHandler(string $request='index') : PageController_Command_Abstract{
		if (preg_match('/\W/', $request)){
			throw new \Excepetion("illegal characters in request");
		}
		$class = "Apps\\handlers\\" . UCFirst(strtolower($request)) . 'Controller';
		if(!class_exists($class)){
			throw new \Excepetion("No request handler class '$class' located");
		}
		$cmd = new $class();
		return $cmd;
	}

}