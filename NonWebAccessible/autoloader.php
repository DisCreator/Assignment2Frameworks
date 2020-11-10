<?php
spl_autoload_register(function($class_name){
	$arr = explode("\\", $class_name);
	$classname = $arr[count($arr)-1];
	if(!defined('APP_DIR')){
		define ('APP_DIR',ROOT_DIR.'/app');
		define ('FRAMEWORK_DIR',ROOT_DIR.'/framework');
		define ('DATA_DIR',ROOT_DIR.'/data');
	}
	if (file_exists(APP_DIR.'/'.$classname.'.php')){
		require APP_DIR .'/'. $classname.'.php';
	}
	elseif(file_exists(FRAMEWORK_DIR.'/'.$classname.'.php')){
		require FRAMEWORK_DIR .'/'. $classname.'.php';
	}
	elseif(file_exists(TPL_DIR.'/'.$classname)){
		require TPL_DIR .'/'. $classname;
	}
	elseif(file_exists(DATA_DIR .'/'.$classname.'.php')){
		require DATA_DIR .'/'. $classname.'.php';
	}
	else{
		trigger_error('Cannot find class/interface/abstract class: '. $class_name, E_USER_WARNING);
		debug_print_backtrace();
	}
});

?>