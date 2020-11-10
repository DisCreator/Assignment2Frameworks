<?php
namespace Quwius\Framework;

trait Insert_Trait{
	/*
	Takes data as name/calue pairs in an array where the name is 
	the associative array index e.g data['foo'] = 'bar'
	*/
	abstract public function insert(array $values);
}