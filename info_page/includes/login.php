<?php
ini_set('error_reporting', E_ALL);
$_SESSION['Message'] = '';
$_SESSION['ID_USER'] = '';
$_SESSION['username'] = '';
include ("lang/lang_default.php");
include ("includes/dbconnection.php");

if (isset($_SESSION['username'])) {
    if (isset($_POST['submit'])) {
    	CheckPassword();
    }
} else {
    header('Location: main.php?lang=ru');
}

function CheckPassword() {
    include ("includes/dbconnection.php");
    include ("lang/lang_default.php");
    $username = mysqli_real_escape_string($con, $_POST['inputUser']);
	$pwd = mysqli_real_escape_string($con, $_POST['inputPassword']);
    $new_pwd = md5($pwd);
    $sql_query = "SELECT id_user, `login_username`, `login_password` FROM `login_user` WHERE `login_username` = '$username' AND `login_password` = '$new_pwd' ORDER BY login_user.id_user";
    $data = mysqli_query($con, $sql_query);
    $_SESSION['username'] = $username;
    $num_rows = mysqli_num_rows($data);
    if ($num_rows > 0) {
        while ($row = mysqli_fetch_array($data)) {
            $db_user = $row['login_username'];
            $db_pass = $row['login_password'];
            $_SESSION['ID_USER'] = $row['id_user'];
            $_SESSION['username'] = $db_user;
            if ($username == $db_user) {
                if ($new_pwd == $db_pass) {
                    header('Location: https://eldos-1995.000webhostapp.com/admin/admin.php?lang=ru&user_id='. $row['id_user']);
                }
                else 
                {
                    header('Location: https://eldos-1995.000webhostapp.com/main.php?lang=ru');
                }
            }
        }
    }
    else {
        echo "<script>alert('You dont correct login or password');</script>";
    }
}
