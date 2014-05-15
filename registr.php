<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Регистрация</title>
		<style>
			#tabl{
				background: silver;
				border: 2px solid blue;
				padding: 10px;
				border-radius: 10px;
			}
		</style>
	</head>
	<body>
		<h3>Регистрация</h3>
		<table id="tabl">
			<form action="index.php" method="post">
				<tr><td>Login</td><td><input type="text" name="name" placeholder=" | username"></td></tr>
				<tr><td>Password</td><td><input type="password" name="pass" placeholder=" | password"></td></tr>
				<tr><td>Repassword</td><td><input type="password" name="pass_again" placeholder=" | password"></td></tr>
				<tr><td>e-mail</td><td><input type="text" name="email" placeholder=" | example@somewhere.com"></td></tr>
				<tr><td>Sex</td><td><select name="sex">
					<option>Мужской</option>
					<option>Женский</option>
				</select></td></tr>
				<tr><td></td><td><input type="checkbox" name="checking">Я согласен(а) с <a href="#" title="правила">правилами</a></td></tr>
				<tr><td></td><td><input type="submit" value="Зарегестрировать"></td></tr>
			</form>
		</table> 

<?php
	header("Content-type: text/html, charset=utf-8");
	if(empty($_POST['name'])) exit(); 
	if(empty($_POST['name'])) exit('Поле "Имя" не заполнено'); 
	if(empty($_POST['pass'])) exit('Одно из полей "Пароль" не заполнено'); 
	if(empty($_POST['pass_again'])) exit('Одно из полей "Пароль" не заполнено'); 
	if($_POST['pass'] != $_POST['pass_again']) exit('Пароли не совпадают');
	
	if(!empty($_POST['email'])) { 
		if(!preg_match("|^[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,6}$|i", $_POST['email'])){ 
			exit('Поле "E-mail" должно соответствовать формату somebody@somewhere.ru'); 
		} 
	}
	
	$filename = "text.txt";
	$arr = file($filename);
	foreach($arr as $line){
		$data = explode("::", $line);
		$temp[] = $data[0];
	}
	if(in_array($_POST["name"], $temp)){
		exit("Данное имя уже зарегестрированоб пожалуйста, выберите другое");
	}
	?>
	<p>Регистрация прошла успешно. Вы можете <a href='login.php'>авторизироваться</a></p>
	<?php
	$fd = fopen($filename, "a");
	if(!$fd){
		exit("Ошибка при открытии файла данных");
	}
	$str = $_POST["name"]."::".$_POST["pass"]."::".$_POST["email"]."::".$_POST["sex"]."\r\n";
	fwrite($fd, $str);
	fclose($fd);
	
	echo "<meta http-quiv='refresh' content='0, url=$_SERVER[PHP_SELF]'>";
?>
</html>