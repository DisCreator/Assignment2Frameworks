<?php
namespace Apps\handlers;
use Quwius\Framework\CommandContext;
use Quwius\Framework\PageController_Command_Abstract;
use Quwius\Framework\View;
use Quwius\Framework\Observable_Model;
use Quwius\Framework\SessionClass;
class ProfileController extends PageController_Command_Abstract
{
	protected function makeModel(): Observable_Model{
		return new \ProfileModel();
	}

	protected function makeView(): View{
		$view = new View();
		$view->setTemplate(TPL_DIR . '/profile.tpl.php');
		return $view;
	}
	public function run()
	{
		SessionClass::create();

		$session = new SessionClass();

		//set the model and view object
		$this->model= $this->makeModel();
		$this->view= $this->makeView();

		$this->model->attach($this->view);

		//checks to see if the user can access the page
		$user = $session->getSession('user');

		if($session->accessible($user,'profile')){
			//get data 
			$data = $this->model->findAll();

			//send updated data
			$this->model->updateData($data);

			//contact the observers
			$this->model->notify();
		}else{
			$this->view->setTemplate(TPL_DIR. '/login.tpl.php');
			$this->view->display();
		}

	}
}