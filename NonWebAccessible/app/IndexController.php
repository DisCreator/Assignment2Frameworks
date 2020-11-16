<?php
namespace Apps\handlers;
use Quwius\Framework\CommandContext;
use Quwius\Framework\PageController_Command_Abstract;
use Quwius\Framework\View;
use Quwius\Framework\Observable_Model;

class IndexController extends PageController_Command_Abstract
{
	private $data = null;

	protected function makeModel(): Observable_Model{
		return new \IndexModel();
	}

	protected function makeView(): View{
		$view = new View();
		$view->setTemplate(TPL_DIR . '/index.tpl.php');
		return $view;
	}


	public function run()
	{
		//set the model and view object
		$this->model= $this->makeModel();
		$this->view= $this->makeView();

		/*if(isset($_GET['controller'])){
			if($_GET['controller'] == 'Courses')
				$this->view->setTemplate(TPL_DIR . '/courses.tpl.php');
			if($_GET['controller'] == 'Streams')
				$v->setTemplate(TPL_DIR . '/streams.tpl.php');
			if($_GET['controller'] == 'AboutUs')
				$v->setTemplate(TPL_DIR . '/index.tpl.php');
			if($_GET['controller'] == 'Login')
				$v->setTemplate(TPL_DIR . '/login.tpl.php');
			if($_GET['controller'] == 'SignUp')
				$v->setTemplate(TPL_DIR . '/signup.tpl.php');
		}*/

		$this->model->attach($this->view);
		//get data 
		$data = $this->model->findAll();

		//send updated data
		$this->model->updateData($data);

		//contact the observers
		$this->model->notify();

	}

	public function execute(CommandContext $context):bool{
		$this->data = $context;
		$this->run();
		return true;
	}
}