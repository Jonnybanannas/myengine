<?php
if (empty($_POST['name']) || empty($_POST['author']) || empty($_FILES['img'])){
	exit ("pusto");
}

$conf = parse_ini_file('conf.ini');
$con = @mysqli_connect($conf['server'],$conf['name'],$conf['password'],$conf['db']);

if(mysqli_connect_errno($con)){
	echo mysqli_connect_error();
	exit("connect error");
}

$name = $_POST['name'];
$author = $_POST['author'];
$img = 'upload/'.md5(microtime()).$_FILES['img']['name'];
$query = "INSERT INTO library VALUES (null,'$name','$author','$img')";

if(!mysqli_query($con,$query)){
		print_r(mysqli_error_list($con));
				
}else{
	echo 'Поздравляем';
}

if(!move_uploaded_file($_FILES['img']['tmp_name'], $img)){
	echo "string";
}
	
		
				
		
print_r($_POST);
print_r($_FILES);