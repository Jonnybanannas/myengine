<?php
	class A{
		public function __toString(){
			return "Это был объект";
		}
			
	}
	$a = new A();
	echo $a;
?>