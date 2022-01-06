<?php

$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
mysqli_query($connect, "SET NAMES UTF8");
$result = mysqli_query($connect, $sql);

?>