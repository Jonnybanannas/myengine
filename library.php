<?php
	$filename = "library.txt";
	$opendata = unserialize(file_get_contents($filename));
	if (empty($opendata)){
				$opendata = array();
			}
	class A{
		
		public $name;
		public $author;
		public $pages;
		public $description;
		public $library;
		public $temp;

		public function addbook($filename,$opendata){
			
			$this->library = $opendata;
			$this->library[] = array('name' => $_GET['name'], 'author' => $_GET['author'],'pages' => $_GET['pages'], 'description' => $_GET['description']);
			file_put_contents($filename, serialize($this->library));

		}
		public $data;
		public function showbook($filename){
			$this->data = unserialize(file_get_contents($filename));
			print_r($this->data);
			// foreach ($this->data as $key => $value) {
			// 	print_r($key);
			// }
		}
	}
	$objLibrary = new A();
	if ($_GET){
		if(!empty($_GET['name']) && !empty($_GET['author']) && !empty($_GET['pages'])&& !empty($_GET['description'])){
			$objLibrary->addbook($filename,$opendata);

		}
	}
	
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>[ Library ]</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
	<script src="js/jquery/jquery-2.0.3.js"></script>
	<script src='js/bootstrap.min.js'></script>
	<script src="js/main.js"></script>
</head>
<body>
<h2 class='page-header'>Добавить в библиотеку:</h2>
		<div class='col-sm-12'>
			<form action='library.php' method='get'>			
				<div class='form-group '>
					<label>Название</label>
					<div class="input-group col-sm-6">				
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-link"></span>
						</span>
						<input name='name' require class="form-control" placeholder="Название">
					</div>
				</div>
				<div class='form-group '>
					<label>Автор</label>
					<div class="input-group col-sm-6">				
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-link"></span>
						</span>
						<input name='author' require class="form-control" placeholder="Автор">
					</div>
				</div>
				<div class='form-group '>
					<label>Количество страниц</label>
					<div class="input-group col-sm-6">				
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-link"></span>
						</span>
						<input name='pages' require class="form-control" placeholder="Количество страниц">
					</div>
				</div>
				<div class='form-group'>
					<label>Описание</label>
					<div class="input-group col-sm-6">				
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-list-alt"></span>
						</span>
						<input name='description' require class="form-control" placeholder="Описание">
					</div>
				</div>
				<div class="form-group">	
					<button type="submit" class="btn btn-success" name="butt">Добавить</button>
				</div>
			</form>
		</div>
		<pre>
			<?php
	$objLibrary->showbook($filename);
	?>
		</pre>	
	</div>
</body>
</html>