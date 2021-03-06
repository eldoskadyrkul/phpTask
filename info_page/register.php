<?php
include ("lang/lang_default.php");
include_once ("includes/reg_user.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?=$Lang['reg_title'];?></title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link rel="icon" type="image/png" href="../favicon.png" >
		<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet" type="text/css">
		<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
		<script src="js/main.js" type="text/javascript" ></script>
	</head>
	<body>
		<div class="language_block">
			<div class="container">
				<div class="row">					
					<div class="copy-text">
						<div class="lang text-right">
							<a href="register.php?lang=ru"><img src="img/ru.png"></a> 
							<a href="register.php?lang=en"><img src="img/en.png"></a> 
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="register_form">
			<div class="container">
				<div class="row">	
					<div class="col-xl-12 register_text">
						<h2 class="text-center"><?=$Lang['s_register'];?></h2>
						<form class="form" method="POST" action="register.php?lang=<?=$Lang['lang'];?>" enctype="multipart/form-data">
							<div class="form_group">
								<label for="inputFirstName" class="text-uppercase"><?=$Lang['name_firstname'];?></label>
								<input type="text" name="inputFirstNames" class="form_control" placeholder="" autocomplete="off" required="required">
							</div>
							<div class="form_group">
								<label for="inputLastname" class="text-uppercase"><?=$Lang['name_lastname'];?></label>
								<input type="text" name="inputLastnames" class="form_control" placeholder="" autocomplete="off" required="required">
							</div>
							<div class="form_group">
								<label for="inputActivity" class="text-uppercase"><?=$Lang['name_activity'];?></label>
								<input type="text" name="inputActivitys" class="form_control" placeholder="" autocomplete="off" required="required">
							</div>
							<div class="form_group">
								<label for="inputWork" class="text-uppercase"><?=$Lang['name_work'];?></label>
                                <textarea name="inputWork" class="form_control" placeholder="" autocomplete="off" required="required"></textarea>
							</div>
							<div class="form_group">
								<label for="inputEmail" class="text-uppercase"><?=$Lang['name_email'];?></label>
								<input type="email" name="inputEmail" class="form_control" placeholder="" autocomplete="off" required="required">
							</div>
							<div class="form_group">
								<label for="inputUrl" class="text-uppercase"><?=$Lang['name_url'];?></label>
								<input type="text" name="inputUrls" class="form_control" placeholder="" autocomplete="off" required="required">
							</div>
							<div class="form_group">
								<label for="inputInfo" class="text-uppercase"><?=$Lang['name_info'];?></label>
                                <textarea type="text" name="inputInfo" class="form_control" autocomplete="off" required="required"></textarea>
							</div>
							<div class="form_group">
								<label for="inputBirthday" class="text-uppercase"><?=$Lang['name_birthday'];?></label>
								<input type="date" name="inputBirthdays" class="form_control" placeholder="" autocomplete="off" required="required">
							</div>
							<div class="form_group">
								<label for="inputPhoto" class="text-uppercase"><?=$Lang['name_photo'];?></label>
								<input type="file" name="inputPhotos" class="form_control" placeholder="" autocomplete="off" required="required" accept="image/png">
							</div>
							<div class="form_group">
								<label for="inputUser" class="text-uppercase"><?=$Lang['name_reg_user'];?></label>
								<input type="text" name="inputUsers" class="form_control" placeholder="" autocomplete="off" required="required">
							</div>
							<div class="form_group">
								<label for="inputPassword" class="text-uppercase"><?=$Lang['name_password'];?></label>
								<input id="psw" type="password" name="inputPasswords" class="form_control" placeholder="" autocomplete="off" required="required">
							</div>
							<div class="form_group">
								<label for="inputPasswordCorrect" class="text-uppercase"><?=$Lang['name_correct'];?></label>
								<input type="password" name="inputPasswordCorrects" class="form_control" placeholder="" autocomplete="off" required="required">
							</div>
							<div class="form_check">
								<button name="reg" type="submit" class="btn btn_reg float-right"><?=$Lang['name_reg'];?></button>
							</div>
							<input type="hidden" id="about_id" name="about_id">
							<input type="hidden" id="reg_id" name="reg_id" >
							<input type="hidden" id="user_id" name="user_id">
						</form>						
						<div class="form_check">
							<a href="main.php?lang=<?=$Lang['lang'];?>"><button id="submit" name="submit" type="submit" class="btn btn_reg float-left"><?=$Lang['name_signin'];?></button></a>
						</div>
					</div>
					<div class="alert alert_error"><?=$_SESSION['message'];?></div>
				</div>
			</div>
		</div>
		<script>
           function random(min,max)
            {
                return Math.floor(Math.random()*(max-min+1)+min);
            }
            var initial = 0;
            var count = initial;
            setInterval(function() {
                var variation = 1;
                count += variation
                document.getElementById("about_id").value = count;
                document.getElementById("reg_id").value = count;
                document.getElementById("user_id").value = count;
            }, 10000)
        </script>
	</body>
</html>
