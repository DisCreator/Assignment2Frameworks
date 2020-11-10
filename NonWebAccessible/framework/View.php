<?php
namespace Quwius\Framework;

class View implements Observer_Interface{
	
	private $tpl ='';
	private $data =  [];

	public function setTemplate(string $filename){
		if(empty($filename)){
 			trigger_error('<b> View error:</b> No template file given', E_USER_ERROR);
 		}
 		if(!file_exists($filename)){
 			trigger_error('<b> View error:</b> File '. $filename . 'does not exist.
 							Cannot bind the template', E_USER_ERROR);
 		}
		$this->tpl = $filename;
	}

	public function addVar(string $name, $value){
		$this->data[$name] = $value;
	}

	public function display(){
		extract($this->data);
 		require $this->tpl;
	}

	public function update(Observable_Model $obs){
		$rec = $obs->getData();
		foreach ($rec as $k=>$r) {
			$this->addVar($k,$r);
		}
		$this->display();

	}







}