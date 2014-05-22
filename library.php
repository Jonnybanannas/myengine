<?php
	spl_autoload_register(function($file){
	include $file.".php";
	});

	$filename = "library.txt";
	$library = unserialize(file_get_contents($filename));
	print_r($library);
	if (empty($library)){
		$library = array();
	}
	
	if ($_GET){
		if(!empty($_GET['name']) && !empty($_GET['author']) && !empty($_GET['pages'])&& !empty($_GET['description'])&& !empty($_GET['price'])){
			$book = new classa($_GET['name'],$_GET['author'],$_GET['pages'],$_GET['description'],$_GET['price']);
			array_push($library,$book);
			file_put_contents($filename, serialize($library));
		}
	}
	$data = unserialize(file_get_contents($filename));
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
				<div class='form-group '>
					<label>Цена</label>
					<div class="input-group col-sm-6">				
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-link"></span>
						</span>
						<input name='price' require class="form-control" placeholder="Цена">
					</div>
				</div>
				<div class="form-group">	
					<button type="submit" class="btn btn-success" name="butt">Добавить</button>
				</div>
				
			</form>
		</div>
		<table class="table table-bordered table-striped table-condensed ptable">
			<caption>Список страниц</caption>
			<thead>
				<tr>
					<th class="col-sm-3">Название</th>
					<th class="col-sm-3">Автор</th>
					<th class="col-sm-1">Количество страниц</th>
					<th class="col-sm-3">Описание</th>
					<th class="col-sm-1">Цена</th>
					<th class="col-sm-1">delete</th>
				</tr>
			</thead>
			<?php
			foreach ($data as $value):?>
			<tbody>
				<tr>
					<td><?php echo $value->name ?></td>
					<td><?php echo $value->author ?></td>
					<td><?php echo $value->pages ?></td>
					<td><?php echo $value->description ?></td>
					<td><?php echo $value->price ?></td>
					<td><a class="del" name="del" href="/admin.php?page=delpages&del=<?php echo $row['id'] ?>"><span class="glyphicon glyphicon-remove" title="Delete <?php echo $row['name'] ?>"></span></a></td>
				</tr>
			</tbody>
		
			<?php endforeach; ?>
			
	</div>
</body>
</html>