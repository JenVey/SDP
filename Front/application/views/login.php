<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>gather.owl</title>
  <link rel="icon" href="<?php echo base_url(); ?>asset/Images/android-chrome-512x512.png">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/bootstrap.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/Ours.css">
  <script src="<?php echo base_url(); ?>asset/Js/jquery-min.js"></script>
</head>

<body>
  <nav class="navbar">
    <a class="logo" style="color: #D7C13F;" onclick="location.href='index.html';">gather.owl</a>

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

  <p class="Title" style="left: 86px; top: 364px;">LET'S <em>CONNECT</em></p>
  <p class="SubTitle">A place where we can gather and shop items.
    <br />Same time, same place.</p>
  <div class="RegButton" onclick="location.href='<?= base_url(); ?>register'"> Register now</div>


  <div class="forgot">
    <h1 style="position: absolute; left: 230px;top:40px; z-index: 2; color: white; font-family: Varela;">Which one is still yours?</h1>
    <h4 style="position: absolute; left: 240px; top: 90px; z-index: 2; color: white; font-family: Varela;">so we can send the verification to you</h4>
    <div class="chooseDivs" id="email">
      <svg xmlns="http://www.w3.org/2000/svg" width="170.948" height="124.6" viewBox="0 0 120.948 74.6" style="margin-top: 80px;">
        <path id="Icon_zocial-email" data-name="Icon zocial-email" d="M.072,72.061V10.675q0-.107.35-2.025L39.96,39.556.539,74.192a8.345,8.345,0,0,1-.467-2.131ZM5.32,4.388A5.449,5.449,0,0,1,7.3,4.068H113.789a7.173,7.173,0,0,1,2.1.32L76.233,35.4l-5.248,3.837L60.6,47.016l-10.38-7.78L44.976,35.4Zm.117,73.961L45.209,43.5,60.6,54.9,76,43.5l39.772,34.849a6.075,6.075,0,0,1-1.983.32H7.3a5.726,5.726,0,0,1-1.866-.32ZM81.248,39.556,120.67,8.651a5.862,5.862,0,0,1,.35,2.025V72.061a7.517,7.517,0,0,1-.35,2.131Z" transform="translate(-0.072 -4.068)" fill="#d7c13f" />
      </svg>
      <h1 style="color: white; margin-top: 100px;">E-Mail</h1>
    </div>
    <div class="chooseDivs" id="phone">
      <svg xmlns="http://www.w3.org/2000/svg" width="121.126" height="252.899" viewBox="0 0 151.126 282.899">
        <path id="Icon_ionic-ios-phone-portrait" data-name="Icon ionic-ios-phone-portrait" d="M139.516,2.25H32.466c-12.352,0-22.341,9.219-22.341,20.775v240.59c0,11.619,9.99,21.533,22.341,21.533H139.449a21.644,21.644,0,0,0,21.8-21.533V23.025C161.318,11.469,151.868,2.25,139.516,2.25ZM75.6,16.774H95.846a2.625,2.625,0,0,1,2.7,2.526,2.625,2.625,0,0,1-2.7,2.526H75.6A2.625,2.625,0,0,1,72.9,19.3,2.625,2.625,0,0,1,75.6,16.774Zm10.462,258.9c-6.48,0-11.744-4.925-11.744-10.988S79.579,253.7,86.059,253.7,97.8,258.627,97.8,264.689,92.539,275.677,86.059,275.677Zm63.109-30.942H22.274a1.312,1.312,0,0,1-1.35-1.263V35.718a1.312,1.312,0,0,1,1.35-1.263H149.168a1.312,1.312,0,0,1,1.35,1.263V243.472A1.312,1.312,0,0,1,149.168,244.735Z" transform="translate(-10.125 -2.25)" fill="#d7c13f" />
      </svg>
      <h1 style="color: white; margin-top: 50px;">Phone Number</h1>
    </div>
    <div style="width: 1px; height: 350px; position: absolute; left: 437px;
				top: 160px; background: #D7C13F;"></div>
  </div>

  <div class="yourEmail" style="width: 880px; height: 650px;  background-color: #585D68; padding: 10px; box-sizing: border-box; text-align: center;">
    <p class="Title" id="ttlEmail" style="position:absolute; ">What is your <em>E-mail?</em></p>
    <input id="iptEmail" type="text" style="width: 500px; height: 50px; font-size: 16pt; background-color:#353B48; border: none; color: #D7C13F; padding-left: 10px; border-radius: 20px; position: absolute; left: 200px; top:300px;">
    <input class="btnEmail" type="submit" name="submit" value="Submit">
  </div>

  <div class="yourPhone" style="width: 880px; height: 650px;  background-color: #585D68; padding: 10px; box-sizing: border-box; text-align: center;">
    <p class="Title" id="ttlPhone" style="position:absolute; ">What is your <em>Phone Number?</em></p>
    <input id="iptPhone" type="text" style="width: 500px; height: 50px; font-size: 16pt; background-color:#353B48; border: none; color: #D7C13F; padding-left: 10px; border-radius: 20px; position: absolute; left: 200px; top:300px;">
    <input class="btnPhone" type="submit" name="submit" value="Submit">
  </div>

  <div class="success">
    <div class="check">
      <div class="textVeri">Verification Has Been Sent</div>
      <div class="textExp">The mail will expire in 24 hours</div>
      <svg id=centang1 xmlns="http://www.w3.org/2000/svg" width="215" height="215" viewBox="0 0 215 215">
        <ellipse id="Ellipse_58" data-name="Ellipse 58" cx="107.5" cy="107.5" rx="107.5" ry="107.5" fill="#69f0ae" />
      </svg>
      <svg id="centang2" xmlns="http://www.w3.org/2000/svg" width="134.385" height="117.583" viewBox="0 0 134.385 117.583">
        <path id="Path_1265" data-name="Path 1265" d="M319.351,289.686l40.308,36.955,57.109-83.981,20.167,16.8L359.659,360.243,302.55,296.416Z" transform="translate(-302.55 -242.66)" fill="#fff" />
      </svg>
    </div>
  </div>

  <img class="svgLanding" width="625.83" height="466.15" src="<?= base_url(); ?>asset/Images/SVG/LandingPage.svg" alt="" />
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

      $('.forgot').hide();
      $('.success').hide();
      $('.yourEmail').hide();
      $('.yourPhone').hide();

      $('.forgotClick2').click(function() {
        $(".forgot").fadeIn("slow");
      });


      $(document).mouseup(function(e) {
        var container = $(".forgot");
        // If the target of the click isn't the container
        if (!container.is(e.target) && container.has(e.target).length === 0) {
          $(".forgot").fadeOut("slow");
        }
      });

      $(document).mouseup(function(e) {
        var container = $(".yourEmail");
        // If the target of the click isn't the container
        if (!container.is(e.target) && container.has(e.target).length === 0) {
          $(".yourEmail").fadeOut("slow");
        }
      });

      $(document).mouseup(function(e) {
        var container = $(".yourPhone");
        // If the target of the click isn't the container
        if (!container.is(e.target) && container.has(e.target).length === 0) {
          $(".yourPhone").fadeOut("slow");
        }
      });

      $('#email').click(function() {
        $('.yourEmail').fadeIn("slow");
      });

      $('#phone').click(function() {
        $('.yourPhone').fadeIn("slow");
      });

      $('.btnEmail').click(function() {
        var email = $('#iptEmail').val();
        window.location.href = '<?= base_url(); ?>Email/index/'.concat(email);
        $('.forgot').fadeOut("slow");
        $('.yourEmail').fadeOut("slow");
        $('.success').fadeIn("slow");
      });


      $('.btnPhone').click(function() {
        var phone = $('#iptPhone').val();
        alert(phone);
        window.location.href = '<?= base_url(); ?>Email/index/'.concat(phone);
        $('.forgot').fadeOut("slow");
        $('.yourPhone').fadeOut("slow");
        $('.success').fadeIn("slow");
      });

    });
  </script>
</body>

</html>