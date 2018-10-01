<?php
session_start();
ini_set('error_reporting', E_ALL);
include ("lang/lang_default.php");
include ("dbconnection.php");
$_SESSION['message'] = '';

if (isset($_POST['reg'])) {
	
	if ($_POST['inputPasswords'] === $_POST['inputPasswordCorrects']) {
        addLogin();
        addRegister();
        addInfo();
    }
	else {
		$_SESSION['message'] =  $Lang['error_password'];
	}
}

function addLogin() {
    include ("dbconnection.php");
    include ("lang/lang_default.php");
    /* объявление переменных */
    $user_login = mysqli_real_escape_string($con, $_POST['inputUsers']);
    $user_pwd = md5($_POST['inputPasswords']);
    
    /* SQL запрос */
    $sql1 = "INSERT INTO login_user(id_user, login_username, login_password) VALUES ('','$user_login','$user_pwd')";
    
    /* проверка SQL запроса */
    if (mysqli_query($con, $sql1) === true) {
        $_SESSION['message'] = 'succesfully';
    } else {
        $_SESSION['message'] = $Lang['error_user'];
    }
    CheckLogin();
    PasswordLength();
}

function addRegister() {
    include ("dbconnection.php");
    include ("lang/lang_default.php");
    /* объявление переменных */
    $user_fn = mysqli_real_escape_string($con, $_POST['inputFirstNames']);
    $user_ln = mysqli_real_escape_string($con, $_POST['inputLastnames']);
	$user_active = mysqli_real_escape_string($con, $_POST['inputActivitys']);
	$user_brtday = mysqli_real_escape_string($con, $_POST['inputBirthdays']);
    
    /* SQL запрос */
    $sql = "INSERT INTO register_user(reg_firstname, reg_lastname, reg_activity, reg_brthday, about_id) VALUES ('$user_fn','$user_ln', '$user_active', '$user_brtday', '')";
    
    /* проверка SQL запроса */
    if (mysqli_query($con, $sql) === true) {
        $_SESSION['message'] = 'error_user';
    } else {
        $_SESSION['message'] = 'succesfully';
    }
}
function addInfo() {
    include ("dbconnection.php");
    include ("lang/lang_default.php");
    
    /* объявление переменных */
	$user_work = mysqli_real_escape_string($con, $_POST['inputWork']);
	$user_url = mysqli_real_escape_string($con, $_POST['inputUrls']);
	$user_info = mysqli_real_escape_string($con, $_POST['inputInfo']);
	$user_email = mysqli_real_escape_string($con, $_POST['inputEmail']);
    $user_avatars = addslashes($_FILES['inputPhotos']['tmp_name']);
    $user_avatarsName = addslashes($_FILES['inputPhotos']['name']);
    $user_avatars = file_get_contents($user_avatars);
    $user_avatars = base64_encode($user_avatars);
    
    $user_avatarSizeName = $_FILES['inputPhotos']['size'];
	$user_avatarErrorName = $_FILES['inputPhotos']['error'];
		
	$fileExt = explode('.', $user_avatarsName);
	$fileActualExt = strtolower(end($fileExt));
		
	$allowed = array('jpg', 'png', 'jpeg');
    if (in_array($fileActualExt, $allowed)) {
		if ($user_avatarErrorName === 0) {
	       if ($user_avatarSizeName < 100000) {
               $user_read = file_get_contents($user_avatarsName);
           } else {
				//$_SESSION['message'] = $Lang['size_error'];
			}
        }
    } else {
		//$_SESSION['message'] = $Lang['image_error'];
    }
    
    /* SQL запрос */
    $sql2 = "INSERT INTO about_user(id_about, work_about, information_about, url_profile, email, image_url, reg_id) VALUES ('', '$user_work', '$user_info', '$user_url', '$user_email', '$user_avatars', '')";
    
    /* проверка SQL запроса */
    if (mysqli_query($con, $sql2) === true) {
        //$_SESSION['message'] = $Lang['succesfully'];
    } else {
       // $_SESSION['message'] = $Lang['error_user'];
    }    
    validateEmail();
}
function validateEmail(){ 
    if (empty($user_email)) {
		//	$emailErr = $Lang['email_error'];
    } else {
        if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
         //   $emailErr = $Lang['email_error']; 
        }
    }	    
}

function CheckLogin() {
    include ("dbconnection.php");
    include ("lang/lang_default.php");
    
    /* объявление переменных */
    $user_login = mysqli_real_escape_string($con, $_POST['inputUsers']);
    
    /* SQL запрос */
    $re_user = "SELECT login_username FROM login_user WHERE login_username=='$user_login'";
    $check_user = mysqli_num_rows($re_user);
    
    if ($check_user != 0) {
        echo 'This username is already registered! Please type another username';
    } else {
        echo 'This username isnt registered';
    }
}

function PasswordLength() {    
    include ("dbconnection.php");
    include ("lang/lang_default.php");
    
    /* объявление переменных */
    $user_login = mysqli_real_escape_string($con, $_POST['inputUsers']);
    $user_pwd = mysqli_real_escape_string($con, $_POST['inputPasswords']);
    
    /* длина пароля */
    if (strlen($user_pwd) > 8) {
        echo 'Success!';
    } else {
        echo 'Your password is short';
    }
}
?>
