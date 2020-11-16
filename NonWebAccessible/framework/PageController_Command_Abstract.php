<?php
namespace Quwius\Framework;

abstract class PageController_Command_Abstract implements Command_Interface
{
	/*
	The view object that the controller will call  on to
	display data on the registered HTML page
	*/
	protected $view = null;

	/*
	The model object that the controller will call  on to
	manipulate
	*/
	protected $model = null;

	/*
	The abstract method that has to be implemented
	in order to create the model for the controller
	*/
	abstract protected function makeModel() :Observable_Model;
	
	/*
	The abstract method that has to be implemented for
	each controller in order for it to have a view
	*/
	abstract protected function makeView():View;
	/*
	The method used to execute the controller
	*/
	abstract public function run();
	abstract function execute(CommandContext $context): bool;

}

?>