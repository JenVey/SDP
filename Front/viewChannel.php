<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>gather.owl - Channel</title>
	<style type="text/css">
		@import url("CSS/bootstrap.css");
		@import url("CSS/Ours.css");
		@import url("CSS/channelCSS.css");
		@import url("CSS/alertify.css");
		@import url("CSS/themes/default.css");
		@import url("CSS/Animation.css");
		@import url("CSS/datepicker.css");
	</style>
	<script src="Js/jquery-min.js"></script>
	<script src="Js/bootstrap.js"></script>
	<script src="Js/textFit.js"></script>
	<script src="Js/datepicker.js"></script>
	<link rel="icon" href="Images/android-chrome-512x512.png">
</head>

<body>
	<div class="accList">
		<div class="navbarCom">
			<button class="butNav" style="border-top-left-radius: 15px; border-bottom-left-radius: 15px;">
				<svg style="margin-top: 2vh;" xmlns="http://www.w3.org/2000/svg" width="35" height="41" viewBox="0 0 35 41">
					<path id="solid_child" data-name="solid child" d="M10.938,5.766C10.938,2.581,13.876,0,17.5,0s6.562,2.581,6.562,5.766-2.938,5.766-6.562,5.766S10.938,8.95,10.938,5.766Zm23.208.11a3.209,3.209,0,0,0-4.125,0l-7.9,6.937h-9.25l-7.9-6.937a3.209,3.209,0,0,0-4.125,0,2.349,2.349,0,0,0,0,3.624l8.625,7.577V38.438A2.757,2.757,0,0,0,12.4,41h1.458a2.757,2.757,0,0,0,2.917-2.562V29.469h1.458v8.969A2.757,2.757,0,0,0,21.146,41H22.6a2.757,2.757,0,0,0,2.917-2.562V17.077L34.146,9.5A2.349,2.349,0,0,0,34.146,5.876Z" transform="translate(0)" fill="#d7c13f" />
				</svg>
				<h6 class="varela" style="color: #ecf0f1;margin-top: 4vh;">Friends</h6>
			</button>
			<button class="butNav">
				<svg style="margin-top: 2vh;" xmlns="http://www.w3.org/2000/svg" width="42.2" height="31.5" viewBox="0 0 42.2 31.5">
					<path id="Icon_material-group" data-name="Icon material-group" d="M30.273,21c3.184,0,5.735-3.015,5.735-6.75S33.457,7.5,30.273,7.5s-5.755,3.015-5.755,6.75S27.089,21,30.273,21ZM14.927,21c3.184,0,5.735-3.015,5.735-6.75S18.111,7.5,14.927,7.5s-5.755,3.015-5.755,6.75S11.743,21,14.927,21Zm0,4.5C10.458,25.5,1.5,28.132,1.5,33.375V39H28.355V33.375C28.355,28.133,19.4,25.5,14.927,25.5Zm15.345,0c-.556,0-1.189.045-1.861.113a9.93,9.93,0,0,1,3.779,7.763V39H43.7V33.375C43.7,28.133,34.742,25.5,30.273,25.5Z" transform="translate(-1.5 -7.5)" fill="#d7c13f" />
				</svg>
				<h6 class="varela" style="color: #ecf0f1;margin-top: 5vh;">Teams</h6>
			</button>
			<button class="butNav active" style="border-top-right-radius: 15px; border-bottom-right-radius: 15px;">
				<svg style="margin-top: 2vh;" xmlns="http://www.w3.org/2000/svg" width="48.299" height="45.162" viewBox="0 0 48.299 45.162">
					<g id="channel" transform="translate(0 -1.86)">
						<g id="Group_137" data-name="Group 137" transform="translate(0 1.86)">
							<path id="Path_1398" data-name="Path 1398" d="M128.573,13.933a6.238,6.238,0,0,0-3.544-5.545,3.836,3.836,0,0,0,.979-2.548,4.212,4.212,0,0,0-8.412,0,3.841,3.841,0,0,0,1.037,2.612,6.228,6.228,0,0,0-3.419,5.482v3.338h13.358ZM121.8,4.012a1.884,1.884,0,0,1,1.931,1.827,1.934,1.934,0,0,1-3.863,0A1.884,1.884,0,0,1,121.8,4.012Zm4.5,11.107H117.49V13.933a4.242,4.242,0,0,1,4.349-4.115h.111a4.242,4.242,0,0,1,4.349,4.115v1.186Z" transform="translate(-97.745 -1.86)" fill="#d7c13f" />
							<path id="Path_1399" data-name="Path 1399" d="M9.814,215.768a3.836,3.836,0,0,0,.979-2.548,4.1,4.1,0,0,0-4.206-3.979,4.1,4.1,0,0,0-4.206,3.979,3.841,3.841,0,0,0,1.037,2.612A6.227,6.227,0,0,0,0,221.313v3.338H13.358v-3.338A6.238,6.238,0,0,0,9.814,215.768Zm-3.227-4.376a1.83,1.83,0,1,1,0,3.654,1.83,1.83,0,1,1,0-3.654Zm4.5,11.107H2.275v-1.186A4.241,4.241,0,0,1,6.624,217.2h.111a4.242,4.242,0,0,1,4.349,4.115S11.083,222.5,11.083,222.5Z" transform="translate(0 -179.489)" fill="#d7c13f" />
							<path id="Path_1400" data-name="Path 1400" d="M240.244,215.768a3.836,3.836,0,0,0,.979-2.548,4.212,4.212,0,0,0-8.412,0,3.841,3.841,0,0,0,1.037,2.612,6.228,6.228,0,0,0-3.419,5.482v3.338h13.358v-3.338A6.239,6.239,0,0,0,240.244,215.768Zm-3.227-4.376a1.83,1.83,0,1,1-1.931,1.827A1.883,1.883,0,0,1,237.017,211.392Zm4.5,11.107H232.7v-1.186a4.241,4.241,0,0,1,4.349-4.115h.111a4.242,4.242,0,0,1,4.349,4.115V222.5Z" transform="translate(-195.489 -179.489)" fill="#d7c13f" />
							<path id="Path_1401" data-name="Path 1401" d="M109.639,134.949h-2.275v7.086l-7.935,7.508,1.608,1.522L108.5,144l7.464,7.062,1.609-1.522-7.936-7.508Z" transform="translate(-84.352 -115.856)" fill="#d7c13f" />
						</g>
					</g>
				</svg>
				<h6 class="varela" style="color: #ecf0f1;margin-top: 3.5vh;">Channel</h6>
			</button>
		</div>
		<div class="titleAccList">
			<div class="hl"></div>
			<h4 style="color: #ecf0f1;">Channel</h4>
			<div class="hl"></div>
		</div>
		<div class="actionButs">
			<button class="action" id="create">
				<svg xmlns="http://www.w3.org/2000/svg" width="20.851" height="21.432" viewBox="0 0 20.851 21.432">
					<path id="Icon_material-create" data-name="Icon material-create" d="M4.5,21.464v4.464H8.843l12.81-13.167L17.31,8.3ZM25.012,9.309a1.209,1.209,0,0,0,0-1.679L22.3,4.844a1.131,1.131,0,0,0-1.633,0l-2.12,2.179,4.343,4.464,2.12-2.179Z" transform="translate(-4.5 -4.496)" fill="#d7c13f" />
				</svg>
				<h6 class="varela">Create</h6>
			</button>
			<button class="action" id="join">
				<svg xmlns="http://www.w3.org/2000/svg" width="36" height="19.5" viewBox="0 0 36 19.5">
					<path id="Icon_material-group-add" data-name="Icon material-group-add" d="M12,15H7.5V10.5h-3V15H0v3H4.5v4.5h3V18H12Zm15,1.5a4.5,4.5,0,1,0-1.365-8.79A7.4,7.4,0,0,1,26.985,12a7.547,7.547,0,0,1-1.35,4.29A4.485,4.485,0,0,0,27,16.5Zm-7.5,0A4.5,4.5,0,1,0,15,12,4.481,4.481,0,0,0,19.5,16.5Zm9.93,3.24A5.55,5.55,0,0,1,31.5,24v3H36V24C36,21.69,32.445,20.265,29.43,19.74ZM19.5,19.5c-3,0-9,1.5-9,4.5v3h18V24C28.5,21,22.5,19.5,19.5,19.5Z" transform="translate(0 -7.5)" fill="#d7c13f" />
				</svg>
				<h6 class="varela">Join</h6>
			</button>
		</div>
		<div class="accItemContainer">
			<div class="accItem">
				<div class="profileImg" style="margin-left: 0;"><img src="../R6.jpg" alt="" /></div>
				<h6 class="profileName">Untrail.ID</h6>
			</div>
			<div class="accItem">
				<div class="profileImg" style="margin-left: 0;"><img src="../R6.jpg" alt="" /></div>
				<h6 class="profileName">Untrail.ID</h6>
			</div>
			<div class="accItem">
				<div class="profileImg" style="margin-left: 0;"><img src="../R6.jpg" alt="" /></div>
				<h6 class="profileName">Untrail.ID</h6>
			</div>
			<div class="accItem">
				<div class="profileImg" style="margin-left: 0;"><img src="../R6.jpg" alt="" /></div>
				<h6 class="profileName">Untrail.ID</h6>
			</div>
			<div class="accItem">
				<div class="profileImg" style="margin-left: 0;"><img src="../R6.jpg" alt="" /></div>
				<h6 class="profileName">Untrail.ID</h6>
			</div>
			<div class="accItem">
				<div class="profileImg" style="margin-left: 0;"><img src="../R6.jpg" alt="" /></div>
				<h6 class="profileName">Untrail.ID</h6>
			</div>
			<div class="accItem">
				<div class="profileImg" style="margin-left: 0;"><img src="../R6.jpg" alt="" /></div>
				<h6 class="profileName">Untrail.ID</h6>
			</div>
			<div class="accItem">
				<div class="profileImg" style="margin-left: 0;"><img src="../R6.jpg" alt="" /></div>
				<h6 class="profileName">Untrail.ID</h6>
			</div>

		</div>
	</div>
	<div class="profile">
		<div class="wrapProfile">
			<div class="profileImg"><img src="" alt="" /></div>
			<div class="profileStats">
				<!-- Max Line 10 -->
				<h5 class="profileName" style="font-size: 15px;margin-top: 0.5vh;">Yosua Yuwono Kaley</h5>
				<h6 class="profileBalance">GP 50000</h6>
			</div>
		</div>
		<button class="Home">
			<img style="margin-top: -3vh;" src="Images/android-chrome-512x512.png" width="30" height="30"></img>
			<p class="HomeText" style="margin-top: -2vh;">Main Menu</p>
		</button>
	</div>
	<div class="bodyContainer">
		<div id="banner">
			<object data="Images/undraw_having_fun_iais.svg" type="image/svg+xml"></object>
			<svg style="margin-top: 5vh;" xmlns="http://www.w3.org/2000/svg" width="606" height="105" viewBox="0 0 606 105">
				<text id="Give_all_of_em_a_toast" data-name="Give all of &apos;em a toast" transform="translate(0 74)" fill="#fff" font-size="94" font-family="Cookie-Regular, Cookie">
					<tspan x="0" y="0">Give all of &apos;em a toast</tspan>
				</text>
			</svg>
		</div>
		<div class="memberlist">
			<div class="titleAccList">
				<div class="hl"></div>
				<h4 style="color: #d7c13f;">Member List</h4>
				<div class="hl"></div>
			</div>
			<div class="accItem member">
				<div class="Details">
					<div class="profileImg" style="margin-left: 0;"><img src="../R6.jpg" alt="" /></div>
					<h6 class="profileName">Yosua Alexander</h6>
				</div>
				<div style="margin-right: 2vw;">
					<svg xmlns="http://www.w3.org/2000/svg" width="22.5" height="18" viewBox="0 0 22.5 18">
						<path id="Icon_awesome-crown" data-name="Icon awesome-crown" d="M18.563,15.75H3.938a.564.564,0,0,0-.562.563v1.125A.564.564,0,0,0,3.938,18H18.563a.564.564,0,0,0,.563-.562V16.313A.564.564,0,0,0,18.563,15.75ZM20.813,4.5a1.688,1.688,0,0,0-1.687,1.688,1.653,1.653,0,0,0,.155.7L16.734,8.409A1.123,1.123,0,0,1,15.18,8L12.315,2.988a1.688,1.688,0,1,0-2.13,0L7.32,8a1.124,1.124,0,0,1-1.554.408L3.224,6.884a1.687,1.687,0,1,0-1.536.991,1.723,1.723,0,0,0,.271-.028L4.5,14.625H18l2.542-6.778a1.723,1.723,0,0,0,.271.028,1.688,1.688,0,0,0,0-3.375Z" fill="#d7c13f" />
					</svg>
				</div>
			</div>
			<div class="accItem member">
				<div class="Details">
					<div class="profileImg" style="margin-left: 0;"><img src="../R6.jpg" alt="" /></div>
					<h6 class="profileName">Untrail.ID</h6>
				</div>
				<div style="margin-right: 2vw;">
					<svg xmlns="http://www.w3.org/2000/svg" width="20.938" height="20.938" viewBox="0 0 10.938 10.938">
						<path id="Icon_awesome-dot-circle" data-name="Icon awesome-dot-circle" d="M6.031.563A5.469,5.469,0,1,0,11.5,6.031,5.469,5.469,0,0,0,6.031.563ZM7.8,6.031A1.764,1.764,0,1,1,6.031,4.267,1.766,1.766,0,0,1,7.8,6.031Z" transform="translate(-0.563 -0.563)" fill="#63d99e" />
					</svg>
				</div>
			</div>
			<div class="accItem member">
				<div class="Details">
					<div class="profileImg" style="margin-left: 0;"><img src="../R6.jpg" alt="" /></div>
					<h6 class="profileName">Untrail.ID</h6>
				</div>
				<div style="margin-right: 2vw;">
					<svg xmlns="http://www.w3.org/2000/svg" width="20.938" height="20.938" viewBox="0 0 10.938 10.938">
						<path id="Icon_awesome-dot-circle" data-name="Icon awesome-dot-circle" d="M6.031.563A5.469,5.469,0,1,0,11.5,6.031,5.469,5.469,0,0,0,6.031.563ZM7.8,6.031A1.764,1.764,0,1,1,6.031,4.267,1.766,1.766,0,0,1,7.8,6.031Z" transform="translate(-0.563 -0.563)" fill="#f25757" />
					</svg>
				</div>
			</div>
			<div class="accItem member">
				<div class="Details">
					<div class="profileImg" style="margin-left: 0;"><img src="../R6.jpg" alt="" /></div>
					<h6 class="profileName">Untrail.ID</h6>
				</div>
				<div style="margin-right: 2vw;">
					<svg xmlns="http://www.w3.org/2000/svg" width="20.938" height="20.938" viewBox="0 0 10.938 10.938">
						<path id="Icon_awesome-dot-circle" data-name="Icon awesome-dot-circle" d="M6.031.563A5.469,5.469,0,1,0,11.5,6.031,5.469,5.469,0,0,0,6.031.563ZM7.8,6.031A1.764,1.764,0,1,1,6.031,4.267,1.766,1.766,0,0,1,7.8,6.031Z" transform="translate(-0.563 -0.563)" fill="#f25757" />
					</svg>
				</div>
			</div>
			<div class="accItem member">
				<div class="Details">
					<div class="profileImg" style="margin-left: 0;"><img src="../R6.jpg" alt="" /></div>
					<h6 class="profileName">Untrail.ID</h6>
				</div>
				<div style="margin-right: 2vw;">
					<svg xmlns="http://www.w3.org/2000/svg" width="20.938" height="20.938" viewBox="0 0 10.938 10.938">
						<path id="Icon_awesome-dot-circle" data-name="Icon awesome-dot-circle" d="M6.031.563A5.469,5.469,0,1,0,11.5,6.031,5.469,5.469,0,0,0,6.031.563ZM7.8,6.031A1.764,1.764,0,1,1,6.031,4.267,1.766,1.766,0,0,1,7.8,6.031Z" transform="translate(-0.563 -0.563)" fill="#f25757" />
					</svg>
				</div>
			</div>
			<div class="titleAccList">
				<h4 style="color: #1e2126;">User Requests</h4>
				<button class="minimize">
					<svg xmlns="http://www.w3.org/2000/svg" width="54" height="25" viewBox="0 0 64 35">
						<g id="Group_188" data-name="Group 188" transform="translate(-10053 -992)">
							<rect id="Rectangle_346" data-name="Rectangle 346" width="64" height="35" rx="11" transform="translate(10053 992)" fill="#d7c13f" />
							<path id="Icon_awesome-window-minimize" data-name="Icon awesome-window-minimize" d="M32.625,24.75H3.375A3.376,3.376,0,0,0,0,28.125v2.25A3.376,3.376,0,0,0,3.375,33.75h29.25A3.376,3.376,0,0,0,36,30.375v-2.25A3.376,3.376,0,0,0,32.625,24.75Z" transform="translate(10066.661 980.125)" fill="#353b48" />
						</g>
					</svg>
				</button>
			</div>
			<div class="accItem request">
				<div class="Details">
					<div class="profileImg" style="margin-left: 0;"><img src="../R6.jpg" alt="" /></div>
					<h6 class="profileName">Untrail.ID</h6>
				</div>
			</div>
			<div class="accItem request">
				<div class="Details">
					<div class="profileImg" style="margin-left: 0;"><img src="../R6.jpg" alt="" /></div>
					<h6 class="profileName">Untrail.ID</h6>
				</div>
			</div>
			<div class="accItem request">
				<div class="Details">
					<div class="profileImg" style="margin-left: 0;"><img src="../R6.jpg" alt="" /></div>
					<h6 class="profileName">Untrail.ID</h6>
				</div>
			</div>
			<div class="accItem request">
				<div class="Details">
					<div class="profileImg" style="margin-left: 0;"><img src="../R6.jpg" alt="" /></div>
					<h6 class="profileName">Untrail.ID</h6>
				</div>
			</div>
			<div class="accItem request">
				<div class="Details">
					<div class="profileImg" style="margin-left: 0;"><img src="../R6.jpg" alt="" /></div>
					<h6 class="profileName">Untrail.ID</h6>
				</div>
			</div>
		</div>
		<div class="chatHeader">
			<div class="chatLogo"></div>
			<div class="channelHeader">
				<p style="color: rgba(216,216,216,0.61);">CH0001</p>
				<h4 class="yellow">Nadia Jelek</h4>
			</div>
			<div class="channelAction">
				<button id="action1">
					<svg xmlns="http://www.w3.org/2000/svg" width="48.395" height="45.049" viewBox="0 0 48.395 45.049">
						<path id="Icon_ionic-ios-trophy" data-name="Icon ionic-ios-trophy" d="M50.141,8.723H42.463V6.377A1.875,1.875,0,0,0,40.6,4.5H14.543a1.875,1.875,0,0,0-1.861,1.877V8.723H5a1.64,1.64,0,0,0-1.629,1.642h0c0,4.845.907,7.743,2.629,10.605a9.476,9.476,0,0,0,6.55,4.728.957.957,0,0,1,.721.575c.721,1.807,2.35,4.083,5.945,6.124a22.327,22.327,0,0,0,6.014,2.534.94.94,0,0,1,.721.915v9.479a.937.937,0,0,1-.931.939H17.393a1.674,1.674,0,0,0-1.675,1.56,1.638,1.638,0,0,0,1.629,1.725H37.775a1.674,1.674,0,0,0,1.675-1.56,1.638,1.638,0,0,0-1.629-1.725H30.143a.937.937,0,0,1-.931-.939V35.859a.94.94,0,0,1,.721-.915,22.873,22.873,0,0,0,6.014-2.534c3.595-2.041,5.223-4.317,5.945-6.124a.933.933,0,0,1,.721-.575,9.476,9.476,0,0,0,6.55-4.728c1.7-2.874,2.606-5.772,2.606-10.617h0A1.64,1.64,0,0,0,50.141,8.723ZM12.682,21.7a.468.468,0,0,1-.628.446,6.8,6.8,0,0,1-3.56-3.39,12.426,12.426,0,0,1-1.757-5.725.937.937,0,0,1,.931-1.021h4.083a.937.937,0,0,1,.931.939Zm33.969-2.945a6.8,6.8,0,0,1-3.56,3.39.468.468,0,0,1-.628-.446V12.947a.937.937,0,0,1,.931-.939h4.083a.937.937,0,0,1,.931,1.021A12.569,12.569,0,0,1,46.651,18.754Z" transform="translate(-3.375 -4.5)" fill="#fff" />
					</svg>
				</button>
				<button id="action2">
					<svg xmlns="http://www.w3.org/2000/svg" width="43.724" height="47.474" viewBox="0 0 43.724 47.474">
						<path id="Icon_material-event-available" data-name="Icon material-event-available" d="M37.366,25.379l-2.575-2.516L22.937,34.447l-5.15-5.032-2.575,2.516,7.725,7.548Zm6-19.132H40.937V1.5H36.078V6.247H16.646V1.5H11.787V6.247H9.358a4.781,4.781,0,0,0-4.834,4.747L4.5,44.227a4.8,4.8,0,0,0,4.858,4.747H43.366a4.818,4.818,0,0,0,4.858-4.747V10.995A4.818,4.818,0,0,0,43.366,6.247Zm0,37.979H9.358V18.116H43.366Z" transform="translate(-4.5 -1.5)" fill="#fff" />
					</svg>
				</button>
				<!--
				<button id="action4">
						<svg xmlns="http://www.w3.org/2000/svg" width="56.503" height="50.474" viewBox="0 0 52.494 48.491">
						  <path id="Icon_material-access-alarm" data-name="Icon material-access-alarm" d="M55.494,12.084,43.42,2.79,40.034,6.474l12.074,9.294ZM18.433,6.474,15.074,2.79,3,12.06l3.386,3.684,12.047-9.27Zm12.126,11.1H26.622V32.019L39.09,38.881l1.969-2.961-10.5-5.706ZM29.247,7.942c-13.045,0-23.622,9.7-23.622,21.669S16.176,51.281,29.247,51.281c13.045,0,23.622-9.7,23.622-21.669S42.292,7.942,29.247,7.942Zm0,38.523c-10.158,0-18.373-7.536-18.373-16.854s8.215-16.854,18.373-16.854S47.62,20.294,47.62,29.611,39.4,46.465,29.247,46.465Z" transform="translate(-3 -2.79)" fill="#fff"/>
						</svg>
				</button>
-->
				<button id="action3">
					<svg xmlns="http://www.w3.org/2000/svg" width="56.503" height="50.474" viewBox="0 0 56.503 50.474">
						<g id="Icon-Settings" transform="translate(1.5 1.5)">
							<path id="Path_1010" data-name="Path 1010" d="M28.092,19.974c0,3.575-3.266,6.474-7.3,6.474s-7.3-2.9-7.3-6.474S16.766,13.5,20.8,13.5,28.092,16.4,28.092,19.974Z" transform="translate(5.956 3.763)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
							<path id="Path_1011" data-name="Path 1011" d="M46.248,31.711a3.268,3.268,0,0,0,.8,3.927l.146.129a3.981,3.981,0,0,1,0,6.107,5.311,5.311,0,0,1-6.882,0l-.146-.129a4.4,4.4,0,0,0-4.426-.712,3.579,3.579,0,0,0-2.432,3.258v.367a4.615,4.615,0,0,1-4.864,4.316,4.615,4.615,0,0,1-4.864-4.316v-.194a3.619,3.619,0,0,0-2.627-3.258,4.4,4.4,0,0,0-4.426.712l-.146.129a5.311,5.311,0,0,1-6.882,0,3.981,3.981,0,0,1,0-6.107l.146-.129a3.268,3.268,0,0,0,.8-3.927,4.053,4.053,0,0,0-3.672-2.158H6.364A4.615,4.615,0,0,1,1.5,25.41a4.615,4.615,0,0,1,4.864-4.316h.219a4.009,4.009,0,0,0,3.672-2.331,3.268,3.268,0,0,0-.8-3.927l-.146-.129a3.981,3.981,0,0,1,0-6.107,5.311,5.311,0,0,1,6.882,0l.146.129a4.4,4.4,0,0,0,4.426.712h.195a3.579,3.579,0,0,0,2.432-3.258V5.816A4.615,4.615,0,0,1,28.252,1.5a4.615,4.615,0,0,1,4.864,4.316V6.01a3.579,3.579,0,0,0,2.432,3.258,4.4,4.4,0,0,0,4.426-.712l.146-.129a5.311,5.311,0,0,1,6.882,0,3.981,3.981,0,0,1,0,6.107l-.146.129a3.268,3.268,0,0,0-.8,3.927v.173a4.053,4.053,0,0,0,3.672,2.158h.413A4.615,4.615,0,0,1,55,25.237a4.615,4.615,0,0,1-4.864,4.316H49.92a4.053,4.053,0,0,0-3.672,2.158Z" transform="translate(-1.5 -1.5)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
						</g>
					</svg>
				</button>
			</div>
		</div>
		<div class="chatSection">
			<div class="chatWrapper">
			</div>
			<div class="inputField">
				<textarea name="inputText" id="inputText" cols="132" rows="1"></textarea>
			</div>
			<button id="sendButton">
			</button>
			<!--			DIBAWAH-->
			<div id="tournament" class="settings">
				<h3 class="yellow">Tournament</h3>
				<div id="tournamentContainer">
					<div class="createTournamentForm collapse" id="tourneyForm">
						<div class="tourname">
							<h5 class="varela">Tournament Name</h5>
							<input type="text" name="tourName" id="tourName">
						</div>
						<div class="tourname">
							<h5 class="varela" style="margin-left: 6.5vw; margin-right: 2vw;">Game</h5>
							<select id="TourGame" class="form-control">
								<option value="Dota 2">Dota 2</option>
								<option value="CSGO" selected>CSGO</option>
							</select>
						</div>
						<div class="tourname slot">
							<h5 class="varela">Slot(s)</h5>
							<input type="number" name="slotTour" id="slotTour">
						</div>
						<div class="tourname" style="width: 61%;margin-left: 2.5vw;">
							<h5 class="varela">Start Date</h5>
							<div class="form-group mb-4" style="margin: 0!important;">
								<div class="datepicker date input-group p-0 shadow-sm">
									<input type="text" placeholder="Start Date" class="form-control" id="tourDate">
									<div class="input-group-append" style="overflow: visible;">
										<span class="input-group-text px-4">
											<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 27 30">
												<path id="Icon_material-date-range" data-name="Icon material-date-range" d="M13.5,16.5h-3v3h3Zm6,0h-3v3h3Zm6,0h-3v3h3ZM28.5,6H27V3H24V6H12V3H9V6H7.5A2.986,2.986,0,0,0,4.515,9L4.5,30a3,3,0,0,0,3,3h21a3.009,3.009,0,0,0,3-3V9A3.009,3.009,0,0,0,28.5,6Zm0,24H7.5V13.5h21Z" transform="translate(-4.5 -3)" fill="#d7c13f" />
											</svg>
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<button id="createTournament">
						<h6 class="varela">Create Tournament</h6>
					</button>
					<div class="tourneys">
						<div class="tourneyItem">
							<h2 class="yellow varela" style="margin-top: 2vh;">CS:GO</h2>
							<h6 class="varela" style="margin-top: 1vh;color: #ecf0f1;">Tournament Name</h6>
							<h6 style="font-size: 12px; color: rgba(236,240,241,0.37);">10 Slots</h6>
							<div class="standingsContainer">
								<h6 class="varela" style="color: #ecf0f1;">Standings</h6>
								<div class="standings">
									<div class="place" style="color: #D1D1D1;">
										2
										<h6>Faze</h6>
									</div>
									<div class="place" style="color: #d7c13f;">
										1
										<h6>Astralis</h6>
									</div>
									<div class="place" style="color: #B98316;">
										3
										<h6>Team Liquid</h6>
									</div>
								</div>
							</div>
							<div class="startDate">
								<p class="finished">Finished</p>
								<p>Start: <span style="color: rgba(215,193,63,0.70);">18 January 2020</span></p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="settings" id="event">
				<h3 class="yellow">Event</h3>
				<div id="eventContainer">
					<div class="createTournamentForm collapse" id="eventForm">
						<div class="tourname">
							<h5 class="varela">Event Name</h5>
							<input type="text" name="tourName" id="tourName">
						</div>
						<div class="tourname" style="width: 70%;">
							<h5 class="varela">Message</h5>
							<textarea name="message" id="message" cols="30" rows="10"></textarea>
						</div>
						<div class="tourname" style="margin-top: 8vh;width: 65%;">
							<input type="file" name="imgEvent" id="imgEvent" accept="image/x-png,image/jpg,image/jpeg" hidden>
							<h5 class="varela" style="margin-left: 0.5vw;">Image</h5>
							<div class="imageShow">
								<div class="imageContainer">
									<img class="img" style="display: block;" src="" alt="" hidden>
									<h6 class="varela imgText">Click here to select Image</h6>
								</div>
							</div>
						</div>
					</div>
					<button id="createEvent">
						<h6 class="varela">Create Event</h6>
					</button>
					<div class="events">
						<div class="eventItem">
							<div class="eventImg">
								<img src="Images/contohIklan1.png" alt="">
							</div>
							<div class="eventDetails">
								<h5 class="yellow">Event Name</h5>
								<div class="eventDesc">
									<p>awijdijawodajawkdopakdopakdoajkdiasojodijasiojwioajdoiwajdoaijdoaijdoiajdoaijdoijdoaijofijaoiwjodjaojdaljskldjalkwjldkjadaoidjaoidjasdjlzkj,xckmna</p>
								</div>
							</div>
							<p class="dateEvent">Created on 20 January 2020 by Yosua</p>
						</div>
						<div class="eventItem"></div>
						<div class="eventItem"></div>
						<div class="eventItem"></div>
						<div class="eventItem"></div>
						<div class="eventItem"></div>
						<div class="eventItem"></div>
						<div class="eventItem"></div>
						<div class="eventItem"></div>
					</div>
				</div>
			</div>
			<!--			Diatas-->
		</div>
	</div>

</body>
<script src="Js/alertify.js"></script>
<script>
	var keys = {};
	var ctr = 0;
	var select = -1;
	var timer = {};
	var tourney = false;

	$(document).ready(function() {
		$("#tournament").hide();
		$("#event").hide();
		$(".memberlist").css("display", "none");
		$(".chatHeader").css("display", "none");
		$(".chatSection").css("display", "none");
		$(".memberlist").css("z-index", "2");
		$(".chatHeader").css("z-index", "2");
		$(".chatSection").css("z-index", "2");
	});
	$('.datepicker').datepicker({
		clearBtn: true,
		format: "dd/mm/yyyy"
	});


	//
	/////////////////////////////////////////////////////////////////////////////////////

	$("#inputText").keydown(function(e) {
		keys[e.which] = true;
		if (keys[13] && !keys[16]) {
			e.preventDefault();
			$("#sendButton").trigger("click");
		} else if (keys[13] && keys[16]) {
			if ($(".chatField").css("height") != "624px") {
				var height = parseInt($(this).css("height"));
				height += 26;
				$(this).css("height", height);
				ctr++;
				var height = parseInt($(".inputField").css("height"));
				height += 26;
				$(".inputField").css("height", height);

				var height = parseInt($(".chatField").css("height"));
				height -= 26;
				$(".chatField").css("height", height);
			}
		}
		///////////
		else if (keys[8] && $(this).val().length == 1) {
			$(".chatField").css("height", 702.75);
			$(".inputField").css("height", 46.8438);
			$("#inputText").css("height", 28);
		}
		///////////
	});

	$("#inputText").focus(function() {
		$("#inputText").on("input", function() {
			if (keys[17] && keys[86]) {
				if ($(this).prop('scrollHeight') > $(this).prop('clientHeight')) {
					var tambah = true;
					while (tambah) {
						if ($(".chatField").css("height") != "624px" && $(this).prop('scrollHeight') > $(this).prop('clientHeight')) {
							var height = parseInt($(this).css("height"));
							height += 26;
							$(this).css("height", height);
							var height = parseInt($(".inputField").css("height"));
							height += 26;
							ctr++;
							$(".inputField").css("height", height);
							var height = parseInt($(".chatField").css("height"));
							height -= 26;
							$(".chatField").css("height", height);
						} else tambah = false;
						var chatHeight = parseInt($(".chatField").css("height"));
						if (chatHeight <= 624) tambah = false;
					}
				}
				console.log($(".chatField").css("height"));
			} else {
				if ($(".chatField").css("height") != "624px") {
					if ($(this).prop('scrollHeight') > $(this).prop('clientHeight')) {
						var height = parseInt($(this).css("height"));
						height += 26;
						$(this).css("height", height);
						var height = parseInt($(".inputField").css("height"));
						height += 26;
						ctr++;
						$(".inputField").css("height", height);
						var height = parseInt($(".chatField").css("height"));
						height -= 26;
						$(".chatField").css("height", height);
					}
				}
			}
		});

	});

	$("#inputText").keyup(function(e) {
		delete keys[e.which];
	});

	$("#sendButton").click(function() {
		alert($("#inputText").val());
		$("#inputText").val("");
		var height = parseInt($("#inputText").css("height"));
		height -= 26 * ctr;
		$("#inputText").css("height", height);
		var height = parseInt($(".inputField").css("height"));
		height -= 26 * ctr;
		$(".inputField").css("height", height);

		var height = parseInt($(".chatField").css("height"));
		height += 26 * ctr;
		$(".chatField").css("height", height);
		ctr = 0;
		alertify.success("Message sent");
	});

	$(".accItem").click(function() {
		if ($(".memberlist").css("display") == "none") {
			$(".memberlist").css("display", "block");
			$(".chatHeader").css("display", "flex");
			$(".chatSection").css("display", "flex");
			$(".memberlist").addClass("slideInRight animated");
			$(".chatHeader").addClass("slideInDown animated");
			$(".chatSection").addClass("slideInUp animated");
			$("#banner").addClass("fadeOut animated");

		} else {
			$(".accItemContainer").children().attr("id", "");
			$(this).attr("id", "active");
			//			$(".memberlist").removeClass("slideInRight");
			//			$(".chatHeader").removeClass("slideInDown");
			//			$(".chatSection").removeClass("slideInUp");
			//			$("#banner").removeClass("fadeOut");
			//			$(".memberlist").addClass("slideOutRight");
			//			$(".chatHeader").addClass("slideOutUp");
			//			$(".chatSection").addClass("slideOutDown");
			//			$("#banner").addClass("fadeIn");
			//			timer[0] = setTimeout("$('.chatSection').removeClass('slideOutDown');",1000);
			//			timer[1] = setTimeout("$('.chatHeader').removeClass('slideOutUp');",1000);
			//			timer[2] = setTimeout("$('.memberlist').removeClass('slideOutRight');",1000);
			//			timer[3] = setTimeout("$('.chatSection').addClass('slideInUp');",1000);
			//			timer[4] = setTimeout("$('.chatHeader').addClass('slideInDown');",1000);
			//			timer[5] = setTimeout("$('.memberlist').addClass('slideInRight');",1000);
			//			timer[6] = setTimeout("$('#banner').removeClass('fadeIn');",1000);
			//			timer[7] = setTimeout("$('#banner').addClass('fadeOut');",1000);
		}
	});


	/////////////////////////////////////////////////////////////////////////////////////////////////////////
	////

	var animated = false;
	var action1 = false;
	var action2 = false;
	var action3 = false;
	var action4 = false;

	$("#action1").click(function() {
		$("#action1").css("outline", "none");
		if (!animated) {
			if (!action1) {
				action1 = true;
				$("#Icon_ionic-ios-trophy").attr("fill", "#d7c13f");
				$("#tournament").removeClass("fadeOut");
				if (action2) {
					action2 = false;
					$("#Icon_material-event-available").attr("fill", "#fff");
					$("#event").addClass("fadeOut");
					timer[4] = setTimeout("$('#event').hide();", 1000);
				} else if (action3) {
					action3 = false;
					$("#Path_1010").attr("stroke", "#fff");
					$("#Path_1011").attr("stroke", "#fff");
				} else if (action4) {
					action4 = false;
					$("#Icon_material-access-alarm").attr("fill", "#fff");
				} else {
					main = false;
					$(".chatWrapper").addClass("fadeOut animated");
					$(".inputField").addClass("fadeOut animated");
					timer[2] = setTimeout("$('.chatWrapper').hide();", 1000);
					timer[3] = setTimeout("$('.inputField').hide();", 1000);
					animated = true;
				}
				timer[0] = setTimeout("$('#tournament').show();", 1000);
				timer[1] = setTimeout("$('#tournament').addClass('fadeIn animated');", 1000);
			} else if (action1) {
				action1 = false;
				$("#Icon_ionic-ios-trophy").attr("fill", "#fff");
				$("#tournament").removeClass("fadeIn");
				$("#tournament").addClass("fadeOut");
				timer[4] = setTimeout("$('#tournament').hide();", 1000);
				timer[5] = setTimeout(fadeInFrame, 1000);

				function fadeInFrame() {
					$('.chatWrapper').show()
					$('.inputField').show()
					$(".chatWrapper").removeClass("fadeOut");
					$(".inputField").removeClass("fadeOut");
					$(".chatField").addClass("fadeIn");
					$(".inputField").addClass("fadeIn");
				}
				animated = true;
			}
			timer[6] = setTimeout("animated=false;", 2000);
		}
	});

	$("#action2").click(function() {
		$("#action2").css("outline", "none");
		if (!animated) {
			if (!action2) {
				action2 = true;
				$("#Icon_material-event-available").attr("fill", "#d7c13f");
				$("#event").removeClass("fadeOut");
				if (action1) {
					action1 = false;
					$("#Icon_ionic-ios-trophy").attr("fill", "#fff");
					$("#tournament").addClass("fadeOut");
					timer[4] = setTimeout("$('#tournament').hide();", 1000);
				} else if (action3) {
					action3 = false;
					$("#Path_1010").attr("stroke", "#fff");
					$("#Path_1011").attr("stroke", "#fff");
				} else if (action4) {
					action4 = false;
					$("#Icon_material-access-alarm").attr("fill", "#fff");
				} else {
					main = false;
					$(".chatWrapper").addClass("fadeOut animated");
					$(".inputField").addClass("fadeOut animated");
					timer[2] = setTimeout("$('.chatWrapper').hide();", 1000);
					timer[3] = setTimeout("$('.inputField').hide();", 1000);
					animated = true;
				}
				timer[0] = setTimeout("$('#event').show();", 1000);
				timer[1] = setTimeout("$('#event').addClass('fadeIn animated');", 1000);
			} else if (action2) {
				action2 = false;
				$("#Icon_material-event-available").attr("fill", "#fff");
				$("#event").removeClass("fadeIn");
				$("#event").addClass("fadeOut");
				timer[4] = setTimeout("$('#event').hide();", 1000);
				timer[5] = setTimeout(fadeInFrame, 1000);

				function fadeInFrame() {
					$('.chatWrapper').show()
					$('.inputField').show()
					$(".chatWrapper").removeClass("fadeOut");
					$(".inputField").removeClass("fadeOut");
					$(".chatField").addClass("fadeIn");
					$(".inputField").addClass("fadeIn");
				}
				animated = true;
			}
			timer[6] = setTimeout("animated=false;", 2000);
		}
	});

	$("#action3").click(function() {
		$("#action3").css("outline", "none");
		if (!animated) {
			if (!action3) {
				action3 = true;
				$("#Path_1010").attr("stroke", "#d7c13f");
				$("#Path_1011").attr("stroke", "#d7c13f");
				if (action2) {
					action2 = false;
					$("#Icon_material-event-available").attr("fill", "#fff");
				} else if (action1) {
					action1 = false;
					$("#Icon_ionic-ios-trophy").attr("fill", "#fff");
				} else if (action4) {
					action4 = false;
					$("#Icon_material-access-alarm").attr("fill", "#fff");
				} else {
					main = false;
					$(".chatWrapper").addClass("fadeOut animated");
					$(".inputField").addClass("fadeOut animated");
					timer[0] = setTimeout("$('.chatWrapper').hide();", 1000);
					timer[1] = setTimeout("$('.inputField').hide();", 1000);
					animated = true;
				}
			} else if (action3) {
				action3 = false;
				$("#Path_1010").attr("stroke", "#fff");
				$("#Path_1011").attr("stroke", "#fff");
				$('.chatWrapper').show()
				$('.inputField').show()
				$(".chatWrapper").removeClass("fadeOut");
				$(".inputField").removeClass("fadeOut");
				$(".chatWrapper").addClass("fadeIn");
				$(".inputField").addClass("fadeIn");
				animated = true;
			}
			timer[2] = setTimeout("animated=false;", 1000);
		}
	});

	$("#action4").click(function() {
		$("#action4").css("outline", "none");
		if (!animated) {
			if (!action4) {
				action4 = true;
				$("#Icon_material-access-alarm").attr("fill", "#d7c13f");
				if (action2) {
					action2 = false;
					$("#Icon_material-event-available").attr("fill", "#fff");
				} else if (action3) {
					action3 = false;
					$("#Path_1010").attr("stroke", "#fff");
					$("#Path_1011").attr("stroke", "#fff");
				} else if (action1) {
					action1 = false;
					$("#Icon_ionic-ios-trophy").attr("fill", "#fff");
				} else {
					main = false;
					$(".chatWrapper").addClass("fadeOut animated");
					$(".inputField").addClass("fadeOut animated");
					timer[0] = setTimeout("$('.chatWrapper').hide();", 1000);
					timer[1] = setTimeout("$('.inputField').hide();", 1000);
					animated = true;
				}
			} else if (action4) {
				action4 = false;
				$("#Icon_material-access-alarm").attr("fill", "#fff");
				$('.chatWrapper').show()
				$('.inputField').show()
				$(".chatWrapper").removeClass("fadeOut");
				$(".inputField").removeClass("fadeOut");
				$(".chatWrapper").addClass("fadeIn");
				$(".inputField").addClass("fadeIn");
				animated = true;
			}
			timer[2] = setTimeout("animated=false;", 1000);
		}
	});

	$("#slotTour").on("input", function() {
		if (this.value.length > 3) {
			this.value = this.value.slice(0, 3);
		}
	});

	$("#message").on("input", function() {
		if (this.value.length > 250) {
			this.value = this.value.slice(0, 250);
		}
	});

	$("#createTournament").click(function() {
		$("#tourneyForm").collapse();
	});

	$("#createEvent").click(function() {
		$("#eventForm").collapse();
	});

	$(".imageShow").click(function() {
		$("#imgEvent").trigger("click");
	});

	$("#imgEvent").change(function() {
		if (this.files && this.files[0]) {
			var reader = new FileReader();

			reader.onload = function(e) {
				$('.img').attr('src', e.target.result);
				$('.img').attr('hidden', false);
				$(".imgText").hide();
			};
			reader.readAsDataURL(this.files[0]);
		}
	});

	var minimize = false;

	$(".minimize").click(function() {
		if (minimize) {
			$(".request").show();
			minimize = false;
		} else {
			$(".request").hide();
			minimize = true;
		}
	});
</script>

</html>