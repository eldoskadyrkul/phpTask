<?php 
ini_set('error_reporting', E_ALL);
include_once ("../lang/lang_default.php");
include_once ("../includes/dbconnection.php");
$select = mysqli_query($con, "SELECT * FROM register_user JOIN about_user ON register_user.id_register = about_user.reg_id");
while ($result = mysqli_fetch_array($select, MYSQLI_ASSOC)) { 
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
                                <a href="admin.php?lang=ru"><img src="../img/ru.png"></a> 
                                <a href="admin.php?lang=en"><img src="../img/en.png"></a> 
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
                                    <img src="../images/<?=$result['image_url'];?>" class="img-responsive" alt="">
                                </div>
                                <div class="profile_usertitle">
                                    <div class="profile_usetitle_name">
                                        <?=$result['first_name'];?> <?=$result['last_name'];?>
                                    </div>
                                    <div class="profile_usertitle_job">
                                        <?=$result['user_activity'];?>
                                    </div>
                                </div>
                                <div class="profile_userbuttons">
                                    <button type="button" class="btn btn-success btn-sm" onclick="location.href='<?=$result['url_profile'];?>'" title="VK share" target="_blank"><?=$Lang['follow'];?></button>
                                    <button type="button" class="btn btn-danger btn-sm" onclick="location.href='mailto:<?=$result['email']?>'"><?=$Lang['message'];?></button>
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
                                        <div class="info_name">
                                            <p><?=$Lang['firstname'];?>:</p>
                                        </div>
                                        <div class="info_description">
                                            <p><?=$result['first_name'];?></p>
                                        </div>
                                        <div class="info_name">
                                            <p><?=$Lang['lastname'];?>:</p>
                                        </div>
                                        <div class="info_description">
                                            <p><?=$result['last_name'];?></p>
                                        </div>
                                        <div class="info_name">
                                            <p><?=$Lang['activity_profile'];?>:</p>
                                        </div>
                                        <div class="info_description">
                                            <p><?=$result['user_activity'];?></p>
                                        </div>
                                        <div class="info_name">
                                            <p><?=$Lang['birthday_profile'];?>:</p>
                                        </div>
                                        <div class="info_description">
                                            <p><?=$result['user_birhday'];?></p>
                                        </div>
                                        <div class="info_name">
                                            <p><?=$Lang['email_profile'];?>:</p>
                                        </div>
                                        <div class="info_description">
                                            <p><?=$result['email'];?></p>
                                        </div>
                                        <div class="info_name">
                                            <p><?=$Lang['work_profile'];?>:</p>
                                        </div>
                                        <div class="info_description">
                                            <p><?=$result['work_about'];?></p>
                                        </div>
                                        <div class="info_name">
                                            <p><?=$Lang['info_profile'];?>:</p>
                                        </div>
                                        <div class="info_description">
                                            <p><?=$result['information_about'];?></p>
                                        </div>
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
<?php
                                              }
											  mysqli_close($con);
											  session_destroy();
?>
