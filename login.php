<html>
	<head>
		<meta charset="utf-8">
		<title>Вход в систему</title>
		<style>
			#tabl{
				border: 2px solid blue;
				padding: 10px;
				border-radius: 10px;
				background: gray;
			}
		</style>
	</head>
	<body>
		
	</body>
<?php
	
	$mysqli = mysqli_connect('localhost', 'root', '', 'mydb');
	if(mysqli_connect_errno($mysqli)){

			echo "Not connection";
			mysqli_connect_error();
		}
	
	if ($_POST['enter']){
		$e_email = $_POST['e_email'];
		$e_pass = md5($_POST['epass']);

		$query = mysqli_query($mysqli, "SELECT * FROM users WHERE email = '$e_email'");
		if($query == false){

				print_r(mysqli_error_list($mysqli));
			}
		$user_data = mysqli_fetch_array($query);
		if ($user_data['password'] == $e_pass) {
			echo 'Авториация успешна';
		}else{

			echo 'Ошибка авторизации - неправильный пароль';
		}

	}
?>
	<form action="login.php" method="post">
			<input type="text" name="e_email" placeholder="email"><br>
			<input type="password" name="epass" placeholder="password"><br>
			<input type="submit" value="enter" name="enter">
	</form>
	
</html>