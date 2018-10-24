<?php
include_once ("lang/lang_default.php");
include_once ("includes/dbconnection.php");
include_once ("includes/login.php");

?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?=$Lang['auth_title'];?></title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
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
						<div class="lang text-left" name="lang">
							<a href="main.php?lang=ru"><img src="img/ru.png"></a> 
							<a href="main.php?lang=en"><img src="img/en.png"></a> 
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="login_form">
			<div class="container">
				<div class="row">	
					<div class="col-xl-4 login_text">
						<h2 class="text-center"><?=$Lang['name_head'];?></h2>
						<form class="form" method="post" action="main.php?lang=<?=$Lang['lang']?>">
							<div class="form_group">
								<label for="inputUser" class="text-uppercase"><?=$Lang['name_user'];?></label>
								<input id="login" type="text" name="inputUser" class="form_control" placeholder="" required autocomplete="off">
							</div>
							<div class="form_group">
								<label for="inputPassword" class="text-uppercase"><?=$Lang['name_password'];?></label>
								<input id="pass" type="password" name="inputPassword" class="form_control" placeholder="" required autocomplete="off">
							</div>
							<div class="form_check">
								<label class="form_check_label">
									<small id="errors"><?=$_SESSION['Message'];?></small>
								</label>
								<button name="submit" type="submit" class="btn btn_login float-right"><?=$Lang['name_submit'];?></button>
							</div>
						</form>
						<div class="form_check">
							<label>
								<span><?=$Lang['text_register'];?>  <a href="register.php?lang=<?=$Lang['lang'];?>"><?=$Lang['name_register'];?></a></span>
							</label>
						</div>
					</div>
					<div class="col-xl-8 banner_sec">
						<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
								<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
								<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
							</ol>
							<div class="carousel-inner" role="listbox">
								<div class="carousel-item active">
									<img class="d-block img-fluid" src="img/pexels-photo.jpg" alt="First slide">
								</div>
								<div class="carousel-item">
									<img class="d-block img-fluid" src="img/people-coffee-tea-meeting.jpg" alt="First slide">
								</div>
								<div class="carousel-item">
									<img class="d-block img-fluid" src="img/pexels-photo-872957.jpeg" alt="First slide">
								</div>
							</div>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
