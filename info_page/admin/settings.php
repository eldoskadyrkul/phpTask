<?php
ini_set('error_reporting', E_ALL);
session_start();
include_once ("../lang/lang_default.php");
include_once ("../includes/dbconnection.php");
$_SESSION['message'] = '';

if (!isset($_POST['sbm_red'])) {
    $red_fn = mysqli_real_escape_string($con, $_POST['inputFname']);
    $red_ln = mysqli_real_escape_string($con, $_POST['inputLname']);
    $red_active = mysqli_real_escape_string($con, $_POST['inputActivity']);
    $red_brtday = mysqli_real_escape_string($con, $_POST['inputDate']);
    $red_mail = mysqli_real_escape_string($con, $_POST['inputEmail']);
    $red_work = mysqli_real_escape_string($con, $_POST['inputWork']);
    $red_info = mysqli_real_escape_string($con, $_POST['inputInfo']); 
    
    $sql = "UPDATE register_user INNER JOIN about_user ON (register_user.id_reg = about_user.reg_id) SET register_user.reg_firstname = '.$red_fn.', register_user.reg_lastname = '.$red_ln.', register_user.reg_activity = '.$red_active.', register_user.reg_brthday = '.$red_brtday.', about_user.work_about = '.$red_work.', about_user.information_about = '.$red_info.', email = '.$red_mail.' WHERE register_user.id_reg and about_user.id_about";
    if (mysqli_query($con, $sql) === true) {
        $_SESSION['message'] = $Lang['success_update'];
        header("location: admin.php?lang=".$Lang['lang']);
    }
    else {
        $_SESSION['message'] = $Lang['sql_error'];
    }
    $select = mysqli_query($con, "SELECT * FROM register_user JOIN about_user ON register_user.id_reg = about_user.reg_id");
    while ($res = mysqli_fetch_array($select)) {
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title><?=$Lang['page_title'];?></title>
        <link href="../css/style.css" rel="stylesheet" type="text/css">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="main_wrapper">
            <div class="language_block">
                <div class="container">
                    <div class="row">					
                        <div class="copy-text">
                            <div class="lang text-right" name="lang">
                                <a href="settings.php?lang=ru"><img src="../img/ru.png"></a> 
                                <a href="settings.php?lang=en"><img src="../img/en.png"></a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header">
                <div class="container">
                    <div class="row profile">
                        <div class="col-md-3">
                            <div class="profile_bar">
                                <div class="profile_userpic">
                                    <img src="../img/person.png" class="img-responsive" alt="">
                                </div>
                                <div class="profile_usertitle">
                                    <div class="profile_usetitle_name">
                                        <?=$res['reg_firstname'];?> <?=$res['reg_lastname'];?>
                                    </div>
                                    <div class="profile_usertitle_job">
                                        <?=$res['reg_activity'];?>
                                    </div>
                                </div>
                                <div class="profile_userbuttons">
                                    <button type="button" class="btn btn-success btn-sm" onclick="location.href='<?php echo($res['url_profile']);?>'"><?=$Lang['follow'];?></button>
                                    <button type="button" class="btn btn-danger btn-sm"><?=$Lang['message'];?></button>
                                </div>
                                <div class="profile_usermenu">
                                    <ul class="nav">
                                        <li class="active">
                                            <a href="admin.php?lang=<?=$Lang['lang'];?>">
                                                <i class="glyphicon glyphicon-home"></i>
                                                <?=$Lang['overview'];?>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="settings.php?lang=<?=$Lang['lang'];?>">
                                                <i class="glyphicon glyphicon-user"></i>
                                                <?=$Lang['account_settings'];?>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="glyphicon glyphicon-flag"></i>
                                                <?=$Lang['help'];?>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="../index.php?lang=<?=$Lang['lang'];?>">
                                                <i class="glyphicon glyphicon-exit"></i>
                                                <?=$Lang['exit'];?>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="profile-content">
                                <div class="rezume">
                                    <h2 class="text-center">
                                        <?=$Lang['about_info'];?>
                                    </h2>
                                    <div class="info">
                                        <form action="settings.php?lang=<?=$Lang['lang'];?>" method="post">
                                            <div class="red_name">
                                                <p><?=$Lang['firstname'];?>:</p>
                                            </div>
                                            <div class="red_description">
                                                <input type="text" name="inputFname" value="<?=$res['reg_firstname'];?>">
                                            </div>
                                            <div class="red_name">
                                                <p><?=$Lang['lastname'];?>:</p>
                                            </div>
                                            <div class="red_description">
                                                <input type="text" name="inputLname" value="<?=$res['reg_lastname'];?>">
                                            </div>
                                            <div class="red_name">
                                                <p><?=$Lang['activity_profile'];?>:</p>
                                            </div>
                                            <div class="red_description">
                                                <input type="text" name="inputActivity" value="<?=$res['reg_activity'];?>">
                                            </div>
                                            <div class="red_name">
                                                <p><?=$Lang['birthday_profile'];?>:</p>
                                            </div>
                                            <div class="red_description">
                                                <input type="date" name="inputDate" value="<?=$res['reg_brthday'];?>">
                                            </div>
                                            <div class="red_name">
                                                <p><?=$Lang['email_profile'];?>:</p>
                                            </div>
                                            <div class="red_description">
                                                <input type="email" name="inputEmail" value="<?=$result['email'];?>">
                                            </div>
                                            <div class="red_name">
                                                <p><?=$Lang['work_profile'];?>:</p>
                                            </div>
                                            <div class="red_description">
                                                <input type="textarea" name="inputWork" value="<?=$res['work_about'];?>">
                                            </div>
                                            <div class="red_name">
                                                <p><?=$Lang['info_profile'];?>:</p>
                                            </div>
                                            <div class="red_description">
                                                <input type="textarea" name="inputInfo" value="<?php echo $res['information_about'];?>">
                                            </div>
                                            <div class="update_error">
                                                <?=$_SESSION['message'];?>
                                            </div>
                                            <div class="sbm_red">
                                                <button name="sbm_red" type="submit" class="btn btn_login float-center"><?=$Lang['name_red'];?></button>
                                            </div>
                                        </form> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<?
    };
}
else {
    $_SESSION['message'] = $Lang['update_error'];
};
?>