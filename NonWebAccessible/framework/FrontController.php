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
		$context = new CommandContext();
		$data = $context->get('get');
		if(isset($request)){
			$request = $data['controller'];
			$handler = RequestHandlerFactory::getRequestHandler($request);
		}else{
			$handler = RequestHandlerFactory::getRequestHandler();
		}

		if($handler->execute($context)===false){
			
		}
	}
}
