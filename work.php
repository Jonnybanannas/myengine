<?php

spl_autoload_register(function($file){
	include $file.".php";
});
$newcar = new user('yokogama','yellow','sedan','bmw_m5');
$newcar->getcar();

// echo "<br>".car::$mystatic;

$car = new car();
$car->wheely = "mafaka";

class Base{
	public function sayHello(){
		echo "Hello";
	}
}

trait say{
	public function sayHello(){
		Base::sayHello();
		echo "World";
	}
}

class mySay extends Base{
	use say;

}
echo "<br>";
echo "<pre>";
$m = new mySay();
$m->sayHello();

echo "</pre>";

class user{
	static $i = "0";
	
	public function __construct(){
		$ii = self::$i;
	}
	public function __clone(){

	}
}


$a = new user();
$b = new user();
$c = new user();

?>