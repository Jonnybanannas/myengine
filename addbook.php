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
	
<h2 class='page-header'>Добавить книгу в библиотеку:</h2>
		<div class='col-sm-12'>
				<div class='form-group '>
					<label>Название</label>
					<div class="input-group col-sm-6">				
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-link"></span>
						</span>
						<input id='name' require class="form-control" placeholder="Название">
					</div>
				</div>
				<div class='form-group '>
					<label>Автор</label>
					<div class="input-group col-sm-6">				
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-link"></span>
						</span>
						<input id='author' require class="form-control" placeholder="Автор">
					</div>
				</div>
				<div class='form-group '>
					<label>Изображение</label>
					<div class="input-group col-sm-6">				
						<span class="input-group-addon">
							<span class="glyphicon glyphicon-link"></span>
						</span>
						<input type="file" id='img' require class="form-control">
					</div>
				</div>
				<div class="form-group">	
					<button type="submit" class="btn btn-success" id="submit">Добавить</button>
				</div>
		</div>
	<script type="text/javascript">
	$(function(){
		$('#submit').click(function(e){
		
		var post = new FormData();
		post.append('author',$('#author').val());
		post.append('name',$('#name').val());
		post.append('img',$('#img')[0].files[0]);

		
		$.ajax({
   			type: "POST",
   			url: "response.php",
   			data: post,
   			processData: false,
   			contentData: false,
   		}).then(function(data){
   			console.log(data);
   		})
   			
 		})
	})
	</script>
</body>
</html>