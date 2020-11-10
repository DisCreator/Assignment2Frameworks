<?php
namespace Quwius\Framework;

interface Observable_Interface {
	public function attach (Observer_Interface $obs);
	public function detach (Observer_Interface $obs);
	public function notify ();
}

?>