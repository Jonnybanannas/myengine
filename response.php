<?php
// echo 'Пример 2 - передача завершилась успешно. Параметры:';
// var_dump($_POST);
if (!empty($_POST['name'])&&!empty($_POST['author'])!empty($_POST['img'])){
	require_once('connect.php');
	if(!mysqli_connect_errno($con)){
		$name = $_POST['name'];
		$author = $_POST['author'];
		$img = md5(microtime()).$_FILES['img']['name'];
		if(move_uploaded_file($_FILES['img']['tmp-name'], 'upload/'.$img)){
			$query = "INSERT INTO library VALUES (null,'$name','$author','$img')";
			$db_query = mysqli_query($con,$query);
			if(!$db_query){
				echo '<pre>';
				print_r(mysqli_error_list($con));
				echo '</pre>';
			}else
				echo '<div class="alert alert-success">Поздравляем! Вы успешно загрузили баннер</div>';
					}
					mysqli_close($con);
				} else {
					echo '<pre>Ошибка! '.mysqli_connect_error().'</pre>';
				}
		}
