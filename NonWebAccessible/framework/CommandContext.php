<?php
namespace Quwius\Framework;

class CommandContext extends CommandContext_Abstract{
	public function add(string $key, $val){
		$this->data[$key] = $val;
	}

	public function get(string $key){
		if(isset($this->data[$key])){
			return $this->data[$key];
		}
		return null;
	}

	public function getErrors(): array{
		return $this->errors;
	}

	protected function setError($error){
		
	}

}