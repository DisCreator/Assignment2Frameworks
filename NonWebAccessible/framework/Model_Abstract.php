<?php
namespace Quwius\Framework;

abstract class Model_Abstract{
	protected $json = [];

	abstract public function findAll():array;

	abstract public function findRecord(string $id): array;
	
	public static function makeConnection(){
		$host = "localhost";
		$user = "root";
		$pass = "";
		$db = "mooc";

		// Create connection
		$conn = mysqli_connect($host, $user, $pass, $db);

		// Check connection
		if (!$conn) {
		  die("Connection failed: " . mysqli_connect_error());
		}
		return $conn;

	}
}