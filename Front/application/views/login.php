<html>

<head>
  <meta charset="utf-8">
  <title>gather.owl</title>
  <link rel="icon" href="<?php echo base_url(); ?>asset/Images/android-chrome-512x512.png">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/Ours.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/indexCSS.css">
  <script src="<?php echo base_url(); ?>asset/Js/jquery-min.js"></script>
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/alertify.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/alerts.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/themes/default.css">
  <script src="<?php echo base_url(); ?>asset/Js/alertify.js"></script>
  <script src="<?php echo base_url(); ?>asset/Js/bootbox.js"></script>
  <script src="<?php echo base_url(); ?>asset/Js/bootstrap.js"></script>
</head>

<body>

  <?php if ($this->session->flashdata('flash2')) : ?>
    <div style="width:100%;height:5vh;background-color:#d7c13f;display:flex;justify-content:center;align-items:center">
      <h5 style="color:#1e2126">We have sent an email verification to your account</h5>
    </div>
  <?php endif; ?>
  <nav class="navbar">
    <a class="logo" style="color: #D7C13F;" onclick="location.href='<?= base_url(); ?>'">gather.owl</a>

    <form class="form-inline" method="post" action="<?= base_url(); ?>Login/cekUser">
      <input name="LogUsername" class="form-control mr-sm-2" type="text" placeholder="Username / Email" aria-label="Username / Email" maxlength="24">
      <input name="LogPass" class="form-control mr-sm-2" type="password" placeholder="Password" aria-label="Password" maxlength="12">
      <button class="btn Login-btn" type="submit">Login</button>
      <?php if ($this->session->flashdata('flash')) : ?>
        <div class="forgotClick" id="wrong"><?= $this->session->flashdata('flash'); ?></div>
      <?php endif; ?>
      <div class="forgotClick"> Forgot password ? </div>
      <div class="forgotClick2">Click Here</div>
    </form>
  </nav>

  <p class="Title" style="left: 90px; top: 350px;">LET'S <em>CONNECT</em></p>
  <p class="SubTitle" style="left: 90px;top: 410px;">A place where we can gather and shop items.
    <br />Same time, same place.</p>
  <div class="RegButton" onclick="location.href='<?= base_url(); ?>Register'"> Register now</div>

  <div class="svgLanding" style="content: url('<?= base_url(); ?>asset/Images/SVG/LandingPage.svg');"></div>
  <!--Segitiga-->
  <svg class="triangle" xmlns="http://www.w3.org/2000/svg" width="94.26" height="98.118" viewBox="0 0 94.26 98.118">
    <g id="Polygon_1" data-name="Polygon 1" transform="matrix(-0.035, -0.999, 0.999, -0.035, 3.315, 98.118)" fill="none" opacity="0.34">
      <path d="M47.5,0,95,91H0Z" stroke="none" />
      <path d="M 47.5 17.28859710693359 L 13.20009613037109 83 L 81.79990386962891 83 L 47.5 17.28859710693359 M 47.5 0 L 95 91 L 0 91 L 47.5 0 Z" stroke="none" fill="#fff" />
    </g>
  </svg>


  <!--Elips-->
  <svg class="elips" xmlns="http://www.w3.org/2000/svg" width="76" height="73" viewBox="0 0 76 73">
    <g id="Ellipse_21" data-name="Ellipse 21" fill="none" stroke="#fff" stroke-width="8" opacity="0.34">
      <ellipse cx="38" cy="36.5" rx="38" ry="36.5" stroke="none" />
      <ellipse cx="38" cy="36.5" rx="34" ry="32.5" fill="none" />
    </g>
  </svg>

  <!--X-->
  <svg class="X" xmlns="http://www.w3.org/2000/svg" width="85.236" height="84.374" viewBox="0 0 85.236 84.374">
    <path id="Icon_ionic-ios-close" data-name="Icon ionic-ios-close" d="M50.093,40.471,72.5,19.62a4.67,4.67,0,0,0,0-6.91,5.56,5.56,0,0,0-7.426,0L42.667,33.561,20.256,12.71a5.56,5.56,0,0,0-7.426,0,4.636,4.636,0,0,0,0,6.91L35.24,40.471,12.83,61.322a4.636,4.636,0,0,0,0,6.91,5.56,5.56,0,0,0,7.426,0L42.667,47.381,65.077,68.232a5.56,5.56,0,0,0,7.426,0,4.67,4.67,0,0,0,0-6.91Z" transform="matrix(0.799, -0.602, 0.602, 0.799, -15.806, 35.538)" fill="#fff" opacity="0.34" />
  </svg>

  <!--Square-->
  <svg class="square" xmlns="http://www.w3.org/2000/svg" width="79" height="72" viewBox="0 0 79 72">
    <g id="Rectangle_24" data-name="Rectangle 24" fill="none" stroke="#fff" stroke-width="8" opacity="0.34">
      <rect width="79" height="72" stroke="none" />
      <rect x="4" y="4" width="71" height="64" fill="none" />
    </g>
  </svg>


  <script>
    $(document).ready(function() {
      $('.forgotClick2').click(function() {
        //$(".forgot").fadeIn("slow");
        bootbox.prompt({
          title: "Forgot Password",
          message: "<p>My email is</p>",
          inputType: 'email',
          required: true,
          closeButton: false,
          callback: function(result) {
            email = result;
            if (result) {
              bootbox.confirm({
                message: "We will send the recovery link in your email",
                closeButton: false,
                callback: function(result) {
                  if (result) {
                    window.location.href = '<?= base_url(); ?>Email/index/'.concat(email);
                    $('.forgot').fadeOut("slow");
                    $('.yourEmail').fadeOut("slow");
                    alertify.success("Email sent")
                  }
                }
              });
            }
          }
        });
      });

    });
  </script>
</body>

</html>