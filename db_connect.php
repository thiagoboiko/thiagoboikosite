<?php
//banco d dados
$servername = "localhost";
$username = "root";
$password = "";
$db_name = "loginsystem";

$connect = mysqli_connect($servername, $username, $password, $db_name);

if (mysqli_connect_error()):
	echo "connection error".mysqli_connect_error();
endif;
