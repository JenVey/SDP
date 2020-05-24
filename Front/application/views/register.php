<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>gather.owl - Register</title>
	<link rel="icon" href="<?php echo base_url(); ?>asset/Images/android-chrome-512x512.png">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/Ours.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/registerCSS.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/bootstrap-datepicker3.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/alertify.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/alerts.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/themes/default.css">
	<script src="<?php echo base_url(); ?>asset/Js/alertify.js"></script>
	<script src="<?php echo base_url(); ?>asset/Js/jquery-min.js"></script>
	<script src="<?php echo base_url(); ?>asset/Js/bootstrap-datepicker.js"></script>
	<script src="<?php echo base_url(); ?>asset/Js/bootstrap.js"></script>
</head>

<body bgcolor="#353B48">
	<nav class="navbar">
		<a class="logo" style="color: #D7C13F;" onclick="location.href='<?= base_url(); ?>login';">gather.owl</a>
	</nav>
	<div class="svgRegister" style="content: url('<?= base_url(); ?>asset/Images/SVG/RegisterPage.svg');"></div>
	<?php if (validation_errors()) : ?>
		<div class="alert alert-danger" style="margin-left: 95px; margin-top: 10px; width: 1000px;" role="alert">
			<?= validation_errors(); ?>
		</div>
	<?php endif; ?>
	<form id="registerForm" action="<?= base_url(); ?>Register/insertUser" method="POST" class="">
		<div class="regContainer" style="margin-bottom:20px; width: 1500px;height: 900px; position: absolute;">
			<p class="Title" style="left: 87px; top: 10vh; position: absolute;">Register <em>Your Account</em></p>

			<div class="gridRegister" style="top:25vh">
				<div class="Form-Title"> Account Info
					<hr style="border: 1px solid #D7C13F" width="100%">
				</div>
				<div class="Form-Title"> Your Info
					<hr style="border: 1px solid #D7C13F" width="100%">
				</div>
				<div><input id="regUsername" name="regUsername" class="form-control mr-sm-2" type="text" placeholder="Username" aria-label="Username" maxlength="12"></div>
				<div><input id="regName" name="regName" class="form-control mr-sm-2" type="text" placeholder="Name" aria-label="Name" maxlength="24"></div>
				<div><input id="regEmail" name="regEmail" class="form-control mr-sm-2" type="texts" placeholder="Email" aria-label="Email" maxlength="64"></div>
				<div><input id="regDOB" name="regDOB" class="form-control mr-sm-2 date" placeholder="DOB" type="text"></div>
				<div><input id="regPass" name="regPass" class="form-control mr-sm-2" type="password" placeholder="Password" aria-label="Password" maxlength="12"></div>
				<div><input id="regPhone" name="regPhone" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" class="form-control mr-sm-2" type="number" placeholder="Phone Number" aria-label="Phone Number" maxlength="12"></div>
				<div><input id="regCPass" name="regCPass" class="form-control mr-sm-2" type="password" placeholder="Confirm Password" aria-label="Confirm Password" maxlength="12"></div>
				<input class="jk" type="hidden" name="regJk" value="">
				<div class="Gender">
					<!--girl-->
					<svg class="girl" xmlns="http://www.w3.org/2000/svg" width="76.433" height="100" viewBox="0 0 76.433 100">
						<g id="Group_64" data-name="Group 64" transform="translate(-85.389 -72.5)" opacity="0.3">
							<g id="face">
								<g id="Group_54" data-name="Group 54">
									<rect id="Rectangle_40" data-name="Rectangle 40" width="73.754" height="54.33" transform="translate(86.729 109.374)" fill="#333" />
								</g>
								<g id="Group_55" data-name="Group 55">
									<path id="Path_999" data-name="Path 999" d="M160.483,109.374A36.877,36.877,0,1,1,123.605,72.5,36.872,36.872,0,0,1,160.483,109.374Z" fill="#333" />
								</g>
								<path id="Path_1000" data-name="Path 1000" d="M161.822,172.5c-3.459-11.265-12.827-22.666-37.963-22.666-26.647,0-35.515,11.4-38.47,22.666Z" fill="#f1e8d7" />
								<path id="Path_1001" data-name="Path 1001" d="M115.513,137.7v13.1s5.708,5.035,8.09,5.035,8.1-5.035,8.1-5.035V137.7Z" fill="#f5b887" />
								<g id="Group_56" data-name="Group 56">
									<path id="Path_1002" data-name="Path 1002" d="M151.012,110.263a6.614,6.614,0,1,1,0,13.228Z" fill="#fdcca0" />
									<path id="Path_1003" data-name="Path 1003" d="M96.2,110.263a6.614,6.614,0,0,0,0,13.228Z" fill="#fdcca0" />
								</g>
								<g id="Group_57" data-name="Group 57">
									<path id="Path_1004" data-name="Path 1004" d="M94.431,109.374v7.395a29.177,29.177,0,1,0,58.354,0v-7.395Z" fill="#fc9" />
								</g>
								<g id="Group_58" data-name="Group 58">
									<path id="Path_1005" data-name="Path 1005" d="M114.108,132.41a14.526,14.526,0,0,0,2.74,6.634h13.515a14.541,14.541,0,0,0,2.742-6.634Z" fill="#8f3527" />
									<path id="Path_1006" data-name="Path 1006" d="M116.848,139.044a8.913,8.913,0,0,0,13.515,0,12.463,12.463,0,0,0-13.515,0Z" fill="#e5554d" />
								</g>
							</g>
							<g id="glasses">
								<g id="Group_60" data-name="Group 60">
									<path id="Path_1007" data-name="Path 1007" d="M99.864,127.124a6.4,6.4,0,0,1-6.155-6.612V109.177a6.4,6.4,0,0,1,6.155-6.612h47.483a6.4,6.4,0,0,1,6.156,6.612v11.335a6.4,6.4,0,0,1-6.156,6.612Z" fill="#97978c" fill-rule="evenodd" />
									<path id="Path_1008" data-name="Path 1008" d="M96.912,118.968v-9.791a3.208,3.208,0,0,1,2.952-3.408h47.483a3.208,3.208,0,0,1,2.952,3.408v9.791Z" fill="#454545" fill-rule="evenodd" />
									<path id="Path_1009" data-name="Path 1009" d="M150.3,113.814v6.7a3.208,3.208,0,0,1-2.952,3.408H99.864a3.208,3.208,0,0,1-2.952-3.408v-6.7s0,4.123,26.694,4.123S150.3,113.814,150.3,113.814Z" fill="#333" fill-rule="evenodd" />
									<g id="Group_59" data-name="Group 59">
										<rect id="Rectangle_41" data-name="Rectangle 41" width="2.638" height="2.638" transform="translate(122.372 107.715)" fill="#c74a42" />
										<rect id="Rectangle_42" data-name="Rectangle 42" width="2.638" height="2.638" transform="translate(126.769 107.715)" fill="#e5554d" />
										<rect id="Rectangle_43" data-name="Rectangle 43" width="2.638" height="2.638" transform="translate(117.976 107.715)" fill="#c74a42" />
									</g>
								</g>
								<g id="Group_63" data-name="Group 63">
									<g id="Group_61" data-name="Group 61">
										<path id="Rectangle_44" data-name="Rectangle 44" d="M0,0H3.715A2.162,2.162,0,0,1,5.876,2.162V3.242a0,0,0,0,1,0,0H0a0,0,0,0,1,0,0V0A0,0,0,0,1,0,0Z" transform="translate(150.539 107.979)" fill="#97978c" />
									</g>
									<g id="Group_62" data-name="Group 62">
										<path id="Rectangle_45" data-name="Rectangle 45" d="M0,0H5.876a0,0,0,0,1,0,0V1.081A2.162,2.162,0,0,1,3.715,3.242H0a0,0,0,0,1,0,0V0A0,0,0,0,1,0,0Z" transform="translate(96.673 111.221) rotate(-180)" fill="#97978c" />
									</g>
								</g>
							</g>
						</g>
						<rect class="girl" x="0" y="0" width="100%" height="100%" />
					</svg>
					<!--boy-->
					<svg class="boy" xmlns="http://www.w3.org/2000/svg" width="84.192" height="104" viewBox="0 0 84.192 104">
						<g id="Group_116" data-name="Group 116" transform="translate(-233.145 -218.5)" opacity="0.3">
							<g id="faces">
								<g id="Group_21" data-name="Group 21">
									<path id="Path_946" data-name="Path 946" d="M306.022,255.325a7.429,7.429,0,1,1,0,14.857Z" fill="#fdcca0" />
									<path id="Path_947" data-name="Path 947" d="M244.46,255.325a7.429,7.429,0,1,0,0,14.857Z" fill="#fdcca0" />
								</g>
								<path id="Path_948" data-name="Path 948" d="M317.337,322.5c-3.81-12.408-14.13-24.967-41.818-24.967-29.351,0-39.119,12.559-42.374,24.967Z" fill="#97978c" />
								<path id="Path_949" data-name="Path 949" d="M266.326,284.161v14.432s6.192,5.546,8.912,5.546,8.917-5.546,8.917-5.546V284.161Z" fill="#f5b887" />
								<g id="Group_22" data-name="Group 22">
									<path id="Path_950" data-name="Path 950" d="M243.1,239.992v21.12a32.139,32.139,0,1,0,64.278,0v-8.147L288.52,241.433Z" fill="#fc9" />
								</g>
								<g id="Group_25" data-name="Group 25">
									<g id="Group_23" data-name="Group 23">
										<path id="Path_951" data-name="Path 951" d="M279.32,282.543c-.319,3.012-2.394,5.1-4.642,4.686-2.257-.4-3.824-3.186-3.515-6.173.31-3.009,2.391-5.112,4.639-4.7S279.621,279.532,279.32,282.543Z" fill="#8f3527" />
									</g>
									<g id="Group_24" data-name="Group 24">
										<path id="Path_952" data-name="Path 952" d="M275.8,282.343c-1.624-.3-3.149.728-3.993,2.448a4.154,4.154,0,0,0,2.868,2.438,3.825,3.825,0,0,0,4.006-2.438A4.183,4.183,0,0,0,275.8,282.343Z" fill="#e5554d" />
									</g>
								</g>
								<path id="Path_953" data-name="Path 953" d="M314.756,243.374s.218,4.01-3.467,3.838c-4.889-.231-4.889-10.593-11.808-15.258,0,0,4.913-1.324,8.64,1.287,0,0-3.576-11.515-22.186-12.129-15.173-.5-23.156,4.146-23.156,4.146a11.474,11.474,0,0,1,5.829-6.758s-8.257,1.076-10.848,8.6a14.093,14.093,0,0,1-.485-5.373s-4.7,4.914-4.857,10.132c0,0-1.96-3.376-1.3-6.6,0,0-3.715,6.293-2.421,11.207a14.623,14.623,0,0,1-4.533-5.526s-5.167,7.827-2.827,16.733l-2.517-2.147s3.826,8.615,3.887,12.74l-2.1-.3s2.483,9.8,4.76,12.461c0,0,2.782-19.987,14.346-23.827,6.329-2.1,15.384-2.914,22.507.771a20.6,20.6,0,0,0-9.229-5.375,16.169,16.169,0,0,1,10.74,2.3c5.777,3.379,10.077,7.775,15.1,9.062A19.052,19.052,0,0,1,295,248.288a36.573,36.573,0,0,0,6.236,3.786A114.747,114.747,0,0,1,305.106,268s3.221-5.418,2.37-16.048c.052,0-.147,1.01-.094,1.013C313.372,253.426,317.51,249.055,314.756,243.374Z" fill="#333" />
							</g>
							<g id="glasses2">
								<path id="Path_954" data-name="Path 954" d="M246.688,251.606a1.886,1.886,0,0,0-1.885,1.887V266.83a1.891,1.891,0,0,0,.552,1.335l4.226,4.227a1.888,1.888,0,0,0,1.335.553h16.358a1.887,1.887,0,0,0,1.334-.553l4.229-4.228a1.891,1.891,0,0,1,1.335-.552h2.136a1.887,1.887,0,0,1,1.334.553l4.227,4.227a1.888,1.888,0,0,0,1.335.553h16.358a1.888,1.888,0,0,0,1.335-.553l4.229-4.227a1.888,1.888,0,0,0,.553-1.335V253.493a1.888,1.888,0,0,0-1.885-1.888Z" fill="#f7f4ea" />
								<g id="Group_26" data-name="Group 26">
									<path id="Path_955" data-name="Path 955" d="M298.449,255.685H284.32a1.886,1.886,0,0,0-1.333.552l-1.7,1.693a1.885,1.885,0,0,0-.554,1.335v5.979a1.887,1.887,0,0,0,.554,1.336l1.7,1.691a1.885,1.885,0,0,0,1.333.551h14.129a1.884,1.884,0,0,0,1.334-.552l1.692-1.69a1.888,1.888,0,0,0,.553-1.335v-5.981a1.887,1.887,0,0,0-.553-1.334l-1.692-1.692A1.887,1.887,0,0,0,298.449,255.685Z" fill="#00ada7" />
									<path id="Path_956" data-name="Path 956" d="M298.449,255.685H284.32a1.886,1.886,0,0,0-1.333.552l-2.249,2.246V261.4l2.217-2.214a1.994,1.994,0,0,1,1.41-.584H298.4a2,2,0,0,1,1.411.585l2.213,2.213v-2.918l-2.245-2.245A1.887,1.887,0,0,0,298.449,255.685Z" fill="#008f8a" />
								</g>
								<g id="Group_27" data-name="Group 27">
									<path id="Path_957" data-name="Path 957" d="M269.745,262.254v-2.989a1.888,1.888,0,0,0-.553-1.335l-1.695-1.693a1.89,1.89,0,0,0-1.334-.552H252.035a1.888,1.888,0,0,0-1.335.553l-1.692,1.692a1.886,1.886,0,0,0-.552,1.334v2.99" fill="#e5554d" />
									<path id="Path_958" data-name="Path 958" d="M248.456,262.254v2.991a1.888,1.888,0,0,0,.553,1.335l1.691,1.69a1.886,1.886,0,0,0,1.334.552h14.13a1.887,1.887,0,0,0,1.333-.551l1.694-1.691a1.887,1.887,0,0,0,.554-1.336v-2.99" fill="#e5554d" />
									<path id="Path_959" data-name="Path 959" d="M252.035,255.685h14.128a1.89,1.89,0,0,1,1.334.552l2.248,2.246V261.4l-2.216-2.214a2,2,0,0,0-1.411-.584H252.08a2,2,0,0,0-1.412.585l-2.212,2.213v-2.918l2.244-2.245A1.888,1.888,0,0,1,252.035,255.685Z" fill="#c74a42" />
								</g>
								<g id="Group_28" data-name="Group 28">
									<path id="Rectangle_34" data-name="Rectangle 34" d="M0,0H2.055a2,2,0,0,1,2,2V3.053a0,0,0,0,1,0,0H0a0,0,0,0,1,0,0V0A0,0,0,0,1,0,0Z" transform="translate(305.15 252.613)" fill="#f7f4ea" />
									<path id="Rectangle_35" data-name="Rectangle 35" d="M0,0H4.051a0,0,0,0,1,0,0V1.057a2,2,0,0,1-2,2H0a0,0,0,0,1,0,0V0A0,0,0,0,1,0,0Z" transform="translate(245.332 255.666) rotate(-180)" fill="#f7f4ea" />
								</g>
							</g>
						</g>
						<rect class="boy" x="0" y="0" width="100%" height="100%" />
					</svg>

				</div>
			</div>
			<button id="register" type="submit" style="top:72vh">Register</button>

		</div>
	</form>
	<script>
		$('.boy').click(function() {
			$('#Group_116').css('opacity', 1);
			$('#Group_64').css('opacity', 0.3);
			$('.jk').val('L');

		});
		$('.girl').click(function() {
			$('#Group_116').css('opacity', 0.3);
			$('#Group_64').css('opacity', 1);
			$('.jk').val('P');
		});
		$('.date').datepicker({
			autoclose: true,
			defaultViewDate: {
				year: 2000,
				month: 00,
				day: 00
			}
		});
	</script>

</body>

</html>