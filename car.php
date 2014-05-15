<?php 
	class car{
		protected $wheel;
		protected $color;
		protected $type;
		static $mystatic = "sdasdasd";
		 public function  __call($name,$arg){
			echo "call".$name."<br>";
			var_dump($arg);
		 }
	}
?>