<?php

require 'autoloader.php';
require 'config.php';

$controller = new IndexController();
$controller->run();