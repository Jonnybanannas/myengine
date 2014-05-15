<?php

spl_autoload_register(function($file){
	include $file.".php";
});
$newcar = new user('yokogama','yellow','sedan','bmw_m5');
$newcar->getcar();

echo "<br>".car::$mystatic;

$c = new car();
$c->getcar("jfjfjj",array('asdad','asdad','asdasda'));
?>