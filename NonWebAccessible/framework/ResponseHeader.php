<?php
namespace Quwius\Framework;

class ResponseHeader extends Response_Abstract{

	public function addEntries(array $entries):bool{
		return false;
	}

	public function showEntries(int $begin, int $end):string{
		return '';
	}

	public function showEntry(int $i): string{
		return '';
	}
}