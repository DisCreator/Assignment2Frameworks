<?php
namespace Apps\handlers;
use Quwius\Framework\CommandContext;
use Quwius\Framework\PageController_Command_Abstract;
use Quwius\Framework\View;
use Quwius\Framework\Observable_Model;
use Quwius\Framework\SessionClass;
class LoginController extends PageController_Command_Abstract{
	protected $errors = [];
	protected function makeModel(): Observable_Model{
		return new \LoginModel();
	}

	protected function makeView(): View{
		$view = new View();
		$view->setTemplate(TPL_DIR . '/login.tpl.php');
		return $view;
	}

	public function run(){
		//set the model and view object
		$this->model= $this->makeModel();
		$this->view= $this->makeView();

		$this->model->attach($this->view);

		if(!empty($_POST)){
			
			$user = $this->model->findRecord($_POST['email']);

			//check to see user is in database
			if( in_array( $_POST['email'],array_column($user, 'email') ) && in_array( $_POST['pass'],array_column($user, 'password') )){

				SessionClass::create();
				$session = new SessionClass();
				$session->add('user', $_POST['email']);

				$this->view->setTemplate(TPL_DIR . '/profile.tpl.php')();	
				$this->model = 	new \ProfileModel();	
				$this->model->attach($this->view);
				$this->view->display();

			}else{
				$this->errors['Credentials'] = 'Invalid email or password combination';
				$this->view->addVar('errors',$this->errors);
				$this->view->setTemplate(TPL_DIR . '/profile.tpl.php')();	

				$this->view->display();

			}
		}
		$this->model->notify();
				
	}
	public function execute(CommandContext $context):bool{
		$this->data = $context;
		$this->run();
		return true;
	}
}
