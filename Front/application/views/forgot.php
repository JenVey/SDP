<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>gather.owl</title>
<link rel="icon" href="<?php echo base_url();?>asset/Images/android-chrome-512x512.png">
<link rel="stylesheet" href="<?php echo base_url();?>asset/CSS/bootstrap.css">
<link rel="stylesheet" href="<?php echo base_url();?>asset/CSS/Ours.css">
</head>

<body bgcolor="#353B48">
    <nav class="navbar">
	  <a class="logo" style="color: #D7C13F;" onclick="location.href='<?= base_url(); ?>login';">gather.owl</a>
	</nav>
    <p class="Title" style="left: 87px; top: 214px;">Forgot <em>Password</em></p>
    <form action="" class="register">
    <div class="gridForgot">
        <div><input name="forUsername" class="form-control mr-sm-2" type="text" placeholder="Username" aria-label="Username" maxlength="12"></div>
        <div><input name="forPass" class="form-control mr-sm-2" type="password" placeholder="New Password" aria-label="Password" maxlength="12"></div>
        <div><input name="forPass2" class="form-control mr-sm-2" type="password" placeholder="Retype New Password" aria-label="Password" maxlength="12"></div>
    </div>
    <input type="submit" class="btn btn-primary reset" value="Reset">
    </form>

    <img class="svgForgot" width="1097.1" height="811.84" src="<?php echo base_url();?>asset/Images/SVG/ForgotPage.svg" alt="" />
   
</body>