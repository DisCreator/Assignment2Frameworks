<?php

class ProfileController extends Abstract_Controller
{
	public function run()
	{
		SessionClass::create();

		$session = new SessionClass();
		
		//Create the view object
		$v = new View();
		$v->setTemplate(TPL_DIR . '/profile.tpl.php');

		//set the model and view object
		$this->setModel(new ProfileModel());
		$this->setView($v);

		$this->model->attach($this->view);

		//checks to see if the user can access the page
		$user = $session->getSession('user');

		if($session->accessible($user,'profile')){
			//get data 
			$data = $this->model->getAll();

			//send updated data
			$this->model->updateData($data);

			//contact the observers
			$this->model->notify();
		}else{
			$v->setTemplate(TPL_DIR. '/login.tpl.php');
			$v->display();
		}

	}
}