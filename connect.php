<?php
$conf = parse_ini_file('conf.ini');
$con = @mysqli_connect($conf['server'],$conf['name'],$conf['password'],$conf['db']);
?>