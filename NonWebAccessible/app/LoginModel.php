<?php
use Quwius\Framework\Observable_Model;

 class LoginModel extends Observable_Model{
 	public function findAll(): array{
 		return [];
 	}
 	public function findRecord(string $id): array{
 		//get the user
 		$users = $this->loadData(DATA_DIR. '/users.json');
 		$user = $users['users'];
 		foreach ($user as $key => $value) {
 			if($value['email']==$id)
 				$user[] =$value;
 		}
 		return $user;
 	}
 }


/*array(2) { 
	[0]=> array(3) { ["name"]=> string(9) "Test User" ["email"]=> string(19) "tester@comp3170.com" ["password"]=> string(12) "Testpassw0rd" } 
	[1]=> array(3) { ["name"]=> string(7) "Bob Cat" ["email"]=> string(19) "bobcat@comp3170.com" ["password"]=> string(12) "boblovescats" } }*/