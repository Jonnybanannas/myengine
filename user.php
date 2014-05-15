<?php
class user extends car{
	private $model;
	
	public function __construct($wheel, $color, $type, $model){
		$this->wheel = $wheel;
		$this->color = $color;
		$this->type = $type;
		$this->model = $model;
	}

	public function getcar(){
		echo "wheel: ".$this->wheel."<br>"."color: ".$this->color."<br>"."type: ".$this->type."<br>"."model: ".$this->model;
	}
	
}
?>