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
		$user_work = mysqli_real_escape_string($con, $_POST['inputWork']);
		$user_info = mysqli_real_escape_string($con, $_POST['inputInfo']);
		$user_url = mysqli_real_escape_string($con, $_POST['inputUrl']);
		$user_email = mysqli_real_escape_string($con, $_POST['inputEmail']);
		$user_brtday = mysqli_real_escape_string($con, $_POST['inputBirthdays']);
		$user_login = mysqli_real_escape_string($con, $_POST['inputUsers']);
		$user_pwd = md5($_POST['inputPasswords']);
		$user_avatars = $_FILES['inputPhotos'];
		
		$user_avatarName = $_FILES['inputPhotos']['name'];
		$user_avatarTmpName = $_FILES['inputPhotos']['tmp'];
		$user_avatarSizeName = $_FILES['inputPhotos']['size'];
		$user_avatarErrorName = $_FILES['inputPhotos']['error'];
		$user_avatarTypeName = $_FILES['file']['type'];
		
		$fileExt = explode('.', $user_avatarName);
		$fileActualExt = strtolower(end($fileExt));
		
		$allowed = array('jpg', 'png', 'jpeg');
		
		if (in_array($fileActualExt, $allowed)) {
			if ($user_avatarErrorName === 0) {
				if ($user_avatarSizeName < 100000) {
					$user_avatarNameNew = "profile".$id.".".$fileActualExt;
					$file_url = 'images/'.$user_avatarNameNew;
					move_uploaded_file($user_avatarTmpName, $file_url);
				} else {
					$_SESSION['message'] = $Lang['size_error'];
				}
			}
		} else {
			$_SESSION['message'] = $Lang['image_error'];
		}
		if (empty($user_email)) {
			$emailErr = $Lang['email_error'];
		} else {    
			$email = test_input($user_email);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$emailErr = $Lang['email_err']; 
			}
		}	
	    $sql = "INSERT INTO register_user(reg_firstname, reg_lastname, reg_activity, reg_brthday, login_id) VALUES ('$user_fn','$user_ln', '$user_active', '$user_brtday', '')";
        $sql1 = "INSERT INTO `login_user`(`id_user`, `login_username`, `login_password`) VALUES ('','$user_login','$user_pwd')";
	$sql2 = "INSERT INTO `about_user`(`id_about`, `work_about`, `information_about`, `url_profile`, `email`, `image_url`, `reg_id`) VALUES ('', '$user_work', '$user_info', '$user_url', '$user_email', '$user_avatars', '')";
		if (mysqli_query($con, $sql) === true) {
            if (mysqli_query($con, $sql1) === true) {
				if (mysqli_query($con, $sql2) === true) {
					$_SESSION['message'] = $Lang['succesfully'];
					header("location: admin/admin.php?lang=".$Lang['lang']. "?id=". $_SESSION['id']);
				}
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
