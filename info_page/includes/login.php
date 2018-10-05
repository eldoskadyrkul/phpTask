<?php
ini_set('error_reporting', E_ALL);
$_SESSION['Message'] = '';
include ("includes/dbconnection.php");
include ("lang/lang_default.php");

if (isset($_POST['submit'])) {
	CheckPassword();
}

function CheckPassword() {
    include ("includes/dbconnection.php");
    include ("lang/lang_default.php");
    $username = mysqli_real_escape_string($con, $_POST['inputUser']);
    $pwd = mysqli_real_escape_string($con, $_POST['inputPassword']);
    $new_pwd = md5($pwd);
    $sql_query = "SELECT `login_username`, `login_password` FROM `login_user` WHERE `login_username` = '$username' AND `login_password` = '$new_pwd'";
    $data = mysqli_query($con, $sql_query);
    $num_rows = mysqli_num_rows($data);
    if ($num_rows > 0) {
        while ($row = mysqli_fetch_array($data)) {
            $db_user = $row['login_username'];
            $db_pass = $row['login_password'];
            if ($username == $db_user) {
                print_r('equals');
                if (hash('md5', $pwd) == $db_pass) {
                    header('Location:admin/admin.php?lang=ru');
                }
                else 
                {
                    header('Location: index.php?lang=ru');
                }
            }
        }
    }
    else {
        echo "<script>alert('');</script>";
    }
   
}
?>
