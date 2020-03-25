<?php
    session_start();
    require_once("connect.php");
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>gather.owl</title>
<style type="text/css">
@import url("CSS/bootstrap.css");
@import url("CSS/Ours.css");
</style>
</head>

<body>
	<nav class="navbar">
	  <a class="logo" style="color: #D7C13F;">gather.owl</a>
	  <form class="form-inline" method="post" action="cekLog.php">
		<input class="form-control mr-sm-2" type="text" name="user" placeholder="Username" aria-label="Username">
		<input class="form-control mr-sm-2" type="password" name="pass" placeholder="Password" aria-label="Password">
		<button class="btn Login-btn" type="submit">Login</button>
	  </form>
	</nav>
<p class="Title" style="left: 86px; top: 364px;">LET'S <em>CONNECT</em></p>
<p class="SubTitle">A place where we can gather and shop items. 
	<br/>Same time, same place.</p>
<div class="RegButton" onclick="location.href='register.html';"> Register now</div>
<img class="svgLanding" width="625.83" height="466.15" src="Images/SVG/LandingPage.svg" alt=""/>
	
<!--Segitiga-->
<svg class="triangle" xmlns="http://www.w3.org/2000/svg" width="94.26" height="98.118" viewBox="0 0 94.26 98.118">
  <g id="Polygon_1" data-name="Polygon 1" transform="matrix(-0.035, -0.999, 0.999, -0.035, 3.315, 98.118)" fill="none" opacity="0.34">
    <path d="M47.5,0,95,91H0Z" stroke="none"/>
    <path d="M 47.5 17.28859710693359 L 13.20009613037109 83 L 81.79990386962891 83 L 47.5 17.28859710693359 M 47.5 0 L 95 91 L 0 91 L 47.5 0 Z" stroke="none" fill="#fff"/>
  </g>
</svg>

<!--Elips-->
<svg class="elips" xmlns="http://www.w3.org/2000/svg" width="76" height="73" viewBox="0 0 76 73">
  <g id="Ellipse_21" data-name="Ellipse 21" fill="none" stroke="#fff" stroke-width="8" opacity="0.34">
    <ellipse cx="38" cy="36.5" rx="38" ry="36.5" stroke="none"/>
    <ellipse cx="38" cy="36.5" rx="34" ry="32.5" fill="none"/>
  </g>
</svg>

<!--X-->
<svg class="X" xmlns="http://www.w3.org/2000/svg" width="85.236" height="84.374" viewBox="0 0 85.236 84.374">
  <path id="Icon_ionic-ios-close" data-name="Icon ionic-ios-close" d="M50.093,40.471,72.5,19.62a4.67,4.67,0,0,0,0-6.91,5.56,5.56,0,0,0-7.426,0L42.667,33.561,20.256,12.71a5.56,5.56,0,0,0-7.426,0,4.636,4.636,0,0,0,0,6.91L35.24,40.471,12.83,61.322a4.636,4.636,0,0,0,0,6.91,5.56,5.56,0,0,0,7.426,0L42.667,47.381,65.077,68.232a5.56,5.56,0,0,0,7.426,0,4.67,4.67,0,0,0,0-6.91Z" transform="matrix(0.799, -0.602, 0.602, 0.799, -15.806, 35.538)" fill="#fff" opacity="0.34"/>
</svg>

<!--Square-->
<svg class="square" xmlns="http://www.w3.org/2000/svg" width="79" height="72" viewBox="0 0 79 72">
  <g id="Rectangle_24" data-name="Rectangle 24" fill="none" stroke="#fff" stroke-width="8" opacity="0.34">
    <rect width="79" height="72" stroke="none"/>
    <rect x="4" y="4" width="71" height="64" fill="none"/>
  </g>
</svg>


</body>
</html>

