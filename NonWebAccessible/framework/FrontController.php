<?php
namespace Quwius\Framework;
class FrontController extends FrontController_Abstract{
	
	public static function run(){
		$controller = new FrontController();
 		$controller->init();
 		$controller->handleReq();
	}

	//Method to initialize helper objects
	protected function init(){

	}

	protected function handleReq(){
		$request = $_POST;
		$handler = RequestHandlerFactory::getRequestHandler($request['request']);
		$context = new CommandContext();
		if($handler->execute($context)===false){
		}
	}
}
