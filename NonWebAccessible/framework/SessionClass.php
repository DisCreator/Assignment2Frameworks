<?php
namespace Quwius\Framework;

class SessionClass{
	protected $access = ['profile'=>['tester@comp3170.com', 'bobcat@comp3170.com']];

	public static function create(){
		session_start();
	}
	public function destroy(){
		session_destroy();
	}
	public function add($name, $value){
		$_SESSION[$name] = $value;
	}
	public function remove($name){
		unset($_SESSION[$name]);
	}
	public function getSession($name){
		if(isset($_SESSION[$name])){
			return $_SESSION[$name];
		}
		return null;
	}
	public function accessible($user, $page){
		if (in_array($user, $this->access[$page])){
			return true;
		}
		return false;
	}
}
?>