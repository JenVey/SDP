<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>gather.owl</title>
    <link rel="icon" href="<?php echo base_url(); ?>asset/Images/android-chrome-512x512.png">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/Ours.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/alertify.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/themes/default.css">
    <script src="<?php echo base_url(); ?>asset/Js/alertify.js"></script>
    <script src="<?php echo base_url(); ?>asset/Js/jquery-min.js"></script>

</head>

<body bgcolor="#353B48">
    <nav class="navbar">
        <a class="logo" style="color: #D7C13F;" onclick="location.href='<?= base_url(); ?>Login'">gather.owl</a>
    </nav>
    <p class="Title" style="left: 87px; top: 214px;">Forgot <em>Password</em></p>
    <form method="post" class="register" action="<?= base_url(); ?>Forgot/changePass/<?= $user['id_user'] ?>">
        <div class="gridForgot">
            <div><input name="forUsername" class="form-control mr-sm-2" type="text" placeholder="Username" style="color: black" readonly aria-label="Username" maxlength="12" value="<?= $user['username_user'] ?>"></div>
            <div><input name="forPass" class="form-control mr-sm-2" type="password" placeholder="New Password" aria-label="Password" maxlength="12"></div>
            <div><input name="forCPass" class="form-control mr-sm-2" type="password" placeholder="Retype New Password" aria-label="Password" maxlength="12"></div>
        </div>
        <input type="submit" class="btn btn-primary reset" value="Reset">
    </form>

    <div class="success">
        <div class="check">
            <div class="textVeri" style="left: 250px">Password Updated</div>
            <div class="textExp" style="top: 500px; font-size: 20pt;">Your password has been changed successfully</div>
            <div class="textExp" style="left:240px; top: 535px; font-size: 20pt;">Use your new password to login.</div>
            <svg id=centang1 xmlns="http://www.w3.org/2000/svg" width="215" height="215" viewBox="0 0 215 215">
                <ellipse id="Ellipse_58" data-name="Ellipse 58" cx="107.5" cy="107.5" rx="107.5" ry="107.5" fill="#69f0ae" />
            </svg>
            <svg id="centang2" xmlns="http://www.w3.org/2000/svg" width="134.385" height="117.583" viewBox="0 0 134.385 117.583">
                <path id="Path_1265" data-name="Path 1265" d="M319.351,289.686l40.308,36.955,57.109-83.981,20.167,16.8L359.659,360.243,302.55,296.416Z" transform="translate(-302.55 -242.66)" fill="#fff" />
            </svg>
        </div>
    </div>

    <DIV class="svgForgot" style="content: url('<?= base_url(); ?>asset/Images/SVG/ForgotPage.svg')"></div>
    <script>
        $('.success').hide();
        $('.reset').click(function() {
            alertify.success("Success Change Your Password");
        });
    </script>
</body>