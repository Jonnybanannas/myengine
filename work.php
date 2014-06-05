<?php
spl_autoload_register(function($file){
	include $file.".php";
});


$beta = "car";
$alpha = new $beta;
$b = "goCar";
$alpha->$b();
