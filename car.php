<?php 
	class car{
		protected $wheel;
		protected $color;
		protected $type;
		// static $mystatic = "sdasdasd";
		 // public function  __call($name,$arg){
			// if(count($arg) < 2){
			// 	if (gettype($arg[0]) == "integer"){
			// 		echo "<br>blue";
			// 	}elseif(gettype($arg[0]) == "string"){
			// 		echo "<br>mafaka";
			// 	}
			// }else{
			// 	echo "<br>string";
			// }
		 // }
		function __set($name,$value){
			echo "Setting $name in $value";
		}

		function __get($name){
			echo "recivig $name";
		}
	}
?>