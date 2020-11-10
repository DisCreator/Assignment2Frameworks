<?php
namespace Quwius\Framework;

class RequestHandlerFactory implements RequestHandlerFactory_Interface{
	public static function getRequestHandler(string $request='default') : PageController_Command_Abstract{
		if (preg_match('/\W/', $request)){
			throw new \Excepetion("illegal characters in request");
		}
		class = __NAMESPACE__ . "\\handlers\\" . ucfirst(strtolower($request)) . '_Page_Controller';
		if(!class_exists($class)){
			throw new \Excepetion("No request handler class '$class' located");
		}
		$cmd = new $class();
		return $cmd;
	}

}