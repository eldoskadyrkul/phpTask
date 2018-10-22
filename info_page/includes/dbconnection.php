<?php
$locahost = "localhost";
$user_name = "root";
$password = "";
$database = "test_task";

$con = mysqli_connect($locahost, $user_name, $password, $database);

if ($con == false) {
	die("Connection failed: " . mysql_error());
} else {
	$msg = "Connection was succesfully";
}

?> 