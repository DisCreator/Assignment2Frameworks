<?php
namespace Quwius\Framework;

interface ResponseHandler_Interface{
	public function getHeader():ResponseHeader;
	public function getState():ResponseState;
	public function getLogger():ResponseLogger;
}