<?php
namespace Quwius\Framework;

interface Command_Interface{
	public function execute(CommandContext $context):bool;
}