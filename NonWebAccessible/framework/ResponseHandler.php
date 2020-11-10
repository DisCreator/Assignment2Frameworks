<?php
namespace Quwius\Framework;

class ResponseHandler implements ResponseHandler_Interface{
	protected $body = [];
	public function __construct (ResponseHeader $head, ResponseState $state, ResponseLogger $log ){
		$this->body['header'] = $head;
		$this->body['state'] = $state;
		$this->body['log'] = $log;
	}
	public function getHeader(): ResponseHandler{
		return clone $this->body['header'];
	}
	public function getState(): ResponseState{
		return clone $this->body['state'];
	}
	public function getLogger(): ResponseLogger{
		return clone $this->body['log'];
	}
}