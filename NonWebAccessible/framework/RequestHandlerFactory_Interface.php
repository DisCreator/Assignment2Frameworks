<?php
namespace Quwius\Framework;

interface RequestHandlerFactory_Interface{
	public static function getRequestHandler(string $request='default') : PageController_Command_Abstract;
}