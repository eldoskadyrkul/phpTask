<?php
error_reporting(E_ALL);

include_once('dbconnection.php');

$_SESSION['Message'] = '';


if (isset($_POST['submit'])) {

	$user_login = $_POST['inputUser'];
	$user_pwd = md5($_POST['inputPassword']);

	$user_login = stripcslashes($user_login);
	$user_pwd = stripcslashes($user_pwd);
	$user_login = mysqli_real_escape_string($con, $user_login);
	$user_pwd = mysqli_real_escape_string($con, $user_pwd);

	$result = mysqli_query($con, "SELECT * FROM login_user WHERE login_username = '$user_login' AND login_password = '$user_pwd'") or die ("Failed to query database".mysql_error());
	$row = mysqli_fetch_array($result);
	if($row['login_username'] == $user_login && $row['login_password'] == $user_pwd) {
		$_SESSION['Message'] = $Lang['success_auth'];
		header("admin/admin.php?lang". $Lang['lang']);
	} else {
		$_SESSION['Message'] = $Lang['name_error'];
		header("index.php?lang=". $Lang['lang']);
	}
}
?>