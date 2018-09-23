<?php
ini_set('error_reporting', E_ALL);
include ("lang/lang_default.php");
include_once ("dbconnection.php");
$_SESSION['message'] = '';

if (isset($_POST['reg'])) {
	
	if ($_POST['inputPasswords'] === $_POST['inputPasswordCorrects']) {
		$user_fn = mysqli_real_escape_string($con, $_POST['inputFirstNames']);
		$user_ln = mysqli_real_escape_string($con, $_POST['inputLastnames']);
		$user_active = mysqli_real_escape_string($con, $_POST['inputActivitys']);
		$user_brtday = mysqli_real_escape_string($con, $_POST['inputBirthdays']);
		$user_login = mysqli_real_escape_string($con, $_POST['inputUsers']);
		$user_pwd = md5($_POST['inputPasswords']);
		$_SESSION['inputUser'] = $user_login;		
	    $sql = "INSERT INTO register_user(reg_firstname, reg_lastname, reg_activity, reg_brthday, login_id) VALUES ('$user_fn','$user_ln', '$user_active', '$user_brtday', '')";
        $sql1 = "INSERT INTO `login_user`(`id_user`, `login_username`, `login_password`) VALUES ('','$user_login','$user_pwd')";
		if (mysqli_query($con, $sql) === true) {
            if (mysqli_query($con, $sql1) === true) {
                $_SESSION['message'] = $Lang['succesfully'];
			    header("location: admin/admin.php?lang=".$Lang['lang']);
            }
			else {
                $_SESSION['message'] = $Lang['error_user'];
            }
		}
		else
		{
			$_SESSION['message'] = $Lang['error_user'];
		}
	}
	else {
		$_SESSION['message'] =  $Lang['error_password'];
	}
} 
?>