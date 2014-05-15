<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Registration</title>
	</head>
	<?php
		
		$db_connect = parse_ini_file("db_connect.ini");
		print_r($db_connect);
		$mysqli = mysqli_connect($db_connect['host'], $db_connect['username'], $db_connect['password'], $db_connect['db']);
		if(mysqli_connect_errno($mysqli)){

			echo "No connection";
			mysqli_connect_error();
		}

		if(isset($_POST['submit'])){

			$name = $_POST['name'];
			$lastname = $_POST['lastname'];
			$pass = $_POST['pass'];
			$repass = $_POST['repass'];
			
			if(!empty($_POST['email'])) { 
				if(!preg_match("|^[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,6}$|i", $_POST['email'])){ 
					exit('Поле "E-mail" должно соответствовать формату somebody@somewhere.ru'); 
				}else{

					$email = $_POST['email'];
				} 
			}
			$sex = $_POST['sex'];
			if($pass == $repass){

				$pass = md5($pass);
			}else{

				exit("Пароли не соответствуют");
			}

			$query = mysqli_query($mysqli, "INSERT INTO users VALUES(null, '$email', '$name', '$lastname', '$pass')");
			if($query == false){

				print_r(mysqli_error_list($mysqli));
			}else{

				echo "Регистрация прошла успешно";
			}
		}
	?>
	<body>
		<div>
			<form action="registration.php" method="post">
				<input type="text" name="email" placeholder="email"><br>
				<input type="text" name="name" placeholder="name"><br>
				<input type="text" name="lastname" placeholder="lastname"><br>
				<input type="password" name="pass" placeholder="password"><br>
				<input type="password" name="repass" placeholder="confirm password"><br>
				<p>Sex:
				<select name="sex">
					<option>Male</option>
					<option>Female</option>
				</select></p>
				<input type="submit" name="submit" value="send"><br>
			</form>
		</div>
	</body>
</html>
