<?php 
session_start();
include_once ("../lang/lang_default.php");
include_once ("../includes/dbconnection.php");

$select = mysqli_query($con, "SELECT * FROM register_user JOIN about_user");
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
            <?php
                while ($result = mysqli_fetch_array($select)) {
            ?>
            <div class="header">
                <div class="container">
                    <div class="row profile">
                        <div class="col-md-3">
                            <div class="profile_bar">
                                <div class="profile_userpic">
                                    <img src="data:image;base64,<?=$result['image_url'];?>" class="img-responsive" alt="">
                                </div>
                                <div class="profile_usertitle">
                                    <div class="profile_usetitle_name">
                                        <?=$result['reg_firstname'];?> <?=$result['reg_lastname'];?>
                                    </div>
                                    <div class="profile_usertitle_job">
                                        <?=$result['reg_activity'];?>
                                    </div>
                                </div>
                                <div class="profile_userbuttons">
                                    <a type="button" class="btn btn-success btn-sm" href="<?=$result['url_profile'];?>" title="VK share" target="_blank"><?=$Lang['follow'];?></a>
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
                                            <a href="../main.php?lang=<?=$Lang['lang'];?>">
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
                                            <p><?=$Lang['full_name'];?>:</p>
                                        </div>
                                        <div class="info_description">
                                            <p><?=$result['reg_firstname'];?> <?=$result['reg_lastname'];?></p>
                                        </div>
                                        <div class="info_name">
                                            <p><?=$Lang['activity_profile'];?>:</p>
                                        </div>
                                        <div class="info_description">
                                            <p><?=$result['reg_activity'];?></p>
                                        </div>
                                        <div class="info_name">
                                            <p><?=$Lang['birthday_profile'];?>:</p>
                                        </div>
                                        <div class="info_description">
                                            <p><?=$result['reg_brthday'];?></p>
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
                                            <p><?php echo $result['information_about'];?></p>
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
                                              };
?>
