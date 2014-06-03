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
	<script type="text/javascript">
		var n = $("#name").val();
		var a = $("#author").val();

		
		$.ajax({
   			type: "POST",
   			url: "response.php",
   			data: 'name=Andrew&nickname=Aramis',
   			function(data){
           $('.results').html(data);
        }
    });
	
		
		
	</script>
<h2 class='page-header'>Добавить в библиотеку:</h2>
		<div class='col-sm-12'>
			<!-- <form action='library.php' method='get'>			 -->
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
				
				<div class="form-group">	
					<button  class="btn btn-success" onclick = "sendRequest();" name="butt">Добавить</button>
				</div>
				<div id = "responce">
				</div>
			<!-- </form> -->
		</div>
		
			
	</div>
</body>
</html>