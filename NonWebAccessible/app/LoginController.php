<?php
class LoginController extends Abstract_Controller{
	protected $errors = [];

	public function run(){
		//Create the view object
		$v = new View();
		$v->setTemplate(TPL_DIR . '/login.tpl.php');

		//set the model and view object
		$this->setModel(new LoginModel());
		$this->setView($v);

		$this->model->attach($this->view);

		

		if(!empty($_POST)){
			
			$user = $this->model->getRecord($_POST['email']);

			//check to see user is in database
			if( in_array( $_POST['email'],array_column($user, 'email') ) && in_array( $_POST['pass'],array_column($user, 'password') )){

				SessionClass::create();
				$session = new SessionClass();
				$session->add('user', $_POST['email']);


				header('Location: profile.php');

			}else{
				$this->errors['Credentials'] = 'Invalid email or password combination';
				$v->addVar('errors',$this->errors);
			}
		}

		$this->model->notify();
				
	}
	
}

/*array(1) { 
	[1]=> array(4) { 
		["id"]=> int(1) 
		["name"]=> string(9) "Test User" 
		["email"]=> string(19) "tester@comp3170.com" 
		["password"]=> string(12) "Testpassw0rd" } }*/