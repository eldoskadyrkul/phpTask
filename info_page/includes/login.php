<?php
ini_set('error_reporting', E_ALL);
$_SESSION['Message'] = '';


if (isset($_POST['submit'])) {
	
	$username = mysqli_real_escape_string($con, trim($_POST['inputUser']));
	$pwd = mysqli_real_escape_string($con, trim($_POST['inputPassword']));
	
	if (!empty($username) && (!empty($pwd))) {
		$sql_query = "SELECT `id_user`, `login_username` FROM `login_user` WHERE `login_username` = '$username' AND `login_password` = '$pwd'";
		$data = mysqli_query($con, $sql_query);
		if (mysqli_num_rows($data) > 0) {
			$row = mysqli_fetch_assoc($data);
			setcookie('userid', $row['id_user'], time() + (60*60*24*30));
			setcookie('username', $row['login_username'], time() + (60*60*24*30));
			header("Location: admin/admin.php?lang=". $Lang['lang']);
		} else {
			header("Location: index.php?lang=". $Lang['lang']);
			$_SESSION['Message'] = $Lang['name_error'];
		}
	} else {
		$_SESSION['Message'] = $Lang['fields_empty'];
	}
}
?>
