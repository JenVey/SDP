<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>gather.owl - My Profile</title>
	<link rel="icon" href="<?php echo base_url(); ?>asset/Images/android-chrome-512x512.png">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/shopCSS.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/historyCSS.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/Ours.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/cartCSS.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/profileCSS.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/alertify.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/alerts.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/chartCSS.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/animation.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/datepicker.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/themes/default.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="<?php echo base_url(); ?>asset/Js/jquery-min.js"></script>
	<script src="<?php echo base_url(); ?>asset/Js/bootstrap.js"></script>
	<script src="<?php echo base_url(); ?>asset/Js/textFit.js"></script>
	<script src="<?php echo base_url(); ?>asset/Js/alertify.js"></script>
	<script src="<?php echo base_url(); ?>asset/Js/datepicker.js"></script>
	<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-3P7SuUbxsTWXgTf3"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>
	<script src="https://code.highcharts.com/modules/accessibility.js"></script>
</head>
<?php
$mchId = "";
$mchNama = "";
$mchDesc = "";
$mchFoto = "";
$mchRating = "";
foreach ($merchant as $mch) {
	$mchId = $mch['id'];
	$mchNama = $mch['nama'];
	$mchDesc = $mch['bio'];
	$mchFoto = $mch['foto'];
	$mchRating = $mch['rating'];
}

$totalItem = array();
$tahun =  date("d/m/Y");
foreach ($allTrans as $trans) {
	if ($trans['status'] == 1) {
		foreach ($transaksiItem as $transItem) {
			if ($trans['id_transaksi'] == $transItem['id_transaksi']) {
				foreach ($item as $itm) {
					if ($itm['id_item'] == $transItem['id_item']) {
						if ($itm['id_merchant'] == $mchId) {
							if (date('d/m/Y', strtotime($trans['tanggal_transaksi']))  == $tahun) {
								if (isset($totalItem[$transItem['id_item']])) {
									$totalItem[$transItem['id_item']]['jumlah'] +=  $transItem['jumlah'];
								} else {
									$totalItem[$transItem['id_item']]['nama'] =  $itm['nama_item'];
									$totalItem[$transItem['id_item']]['jumlah'] = $transItem['jumlah'];
								}
							}
						}
					}
				}
			}
		}
	}
}
usort($totalItem, function ($a, $b) {
	return $b['jumlah'] <=> $a['jumlah'];
});

$jmlChat = 0;
if ($mchId != "") {
	foreach ($pesan as $psn) {
		if ($psn['id_penerima'] == $mchId) {
			if ($psn['status'] == 0) {
				$jmlChat++;
			}
		}
	}
}

?>


<body>
	<input type="file" name="profileIMG" id="profileIMG" accept="image/x-png,image/jpg,image/jpeg" style="display: none;" />
	<input type="file" name="merchantIMG" id="merchantIMG" accept="image/x-png,image/jpg,image/jpeg" style="display: none;" />
	<div class="profileContainer">
		<div class="profileImgContainer">
			<button id="profileIcon" hidden>
				<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
					<g id="Group_185" data-name="Group 185" transform="translate(-15861 4733)">
						<circle id="Ellipse_187" data-name="Ellipse 187" cx="15" cy="15" r="15" transform="translate(15861 -4733)" fill="#585D68" />
						<path id="Icon_material-add-a-photo" data-name="Icon material-add-a-photo" d="M2.516,3.855V1.5H4.194V3.855H6.71v1.57H4.194V7.78H2.516V5.425H0V3.855Zm2.516,4.71V6.21H7.549V3.855H13.42l1.535,1.57h2.659A1.631,1.631,0,0,1,19.291,7v9.421a1.631,1.631,0,0,1-1.677,1.57H4.194a1.631,1.631,0,0,1-1.677-1.57V8.565ZM10.9,15.631A4.068,4.068,0,0,0,15.1,11.706,4.068,4.068,0,0,0,10.9,7.78,4.068,4.068,0,0,0,6.71,11.706,4.068,4.068,0,0,0,10.9,15.631ZM8.22,11.706A2.6,2.6,0,0,0,10.9,14.218a2.6,2.6,0,0,0,2.684-2.512A2.6,2.6,0,0,0,10.9,9.193,2.6,2.6,0,0,0,8.22,11.706Z" transform="translate(15866.434 -4728.954)" fill="#d7c13f" />
					</g>
				</svg>
			</button>
			<div class="profileImg">
				<img id="profileImg" src="data:image/jpeg;base64,<?= base64_encode($user['foto']) ?>" alt="">
			</div>
		</div>
		<h6 style="opacity: 0.4; color: #d7c13f;"><?= $user['username_user'] ?></h6>
		<div class="inputContainer">
			<label for="nameProfile" class="placeholderName">
				<p style="margin-bottom: 1px; font-size: 14px;">Name</p>
			</label>
			<input type="text" name="nameProfile" id="nameProfile" value="<?= $user['nama_user'] ?>" readonly>
		</div>
		<div class="inputContainer">
			<label for="phoneNum" class="placeholderName">
				<p style="margin-bottom: 1px; font-size: 14px;">Phone Number</p>
			</label>
			<input type="number" name="phoneNum" id="phoneNum" value="<?= $user['phone'] ?>" readonly>
		</div>
		<div class="inputContainer">
			<label for="passProfile" class="placeholderName">
				<p style="margin-bottom: 1px; font-size: 14px;">Password</p>
			</label>
			<input type="password" name="passProfile" id="passProfile" value="<?= $user['pass_user'] ?>" readonly>
		</div>
		<div class="inputContainer">
			<label for="emailProfile" class="placeholderName">
				<p style="margin-bottom: 1px; font-size: 14px;">E-mail</p>
			</label>
			<input type="email" name="emailProfile" id="emailProfile" value="<?= $user['email_user'] ?>" readonly>
		</div>
		<div class="inputContainer">
			<label for="tradeProfile" class="placeholderName">
				<p style="margin-bottom: 1px; font-size: 14px;">Trade Link</p>
			</label>
			<input type="text" name="tradeProfile" id="tradeProfile" value="<?= $user['trade_link'] ?>" readonly>
		</div>

		<button class="changeProfile">
			<svg id="changeProfileIcon" xmlns="http://www.w3.org/2000/svg" width="21" height="18" viewBox="0 0 44.998 36.001">
				<path id="Icon_awesome-user-edit" data-name="Icon awesome-user-edit" d="M15.75,18a9,9,0,1,0-9-9A9,9,0,0,0,15.75,18Zm6.3,2.25H20.876a12.24,12.24,0,0,1-10.252,0H9.45A9.452,9.452,0,0,0,0,29.7v2.925A3.376,3.376,0,0,0,3.375,36H22.7a3.376,3.376,0,0,1-.183-1.5L23,30.22l.084-.78.555-.555,5.435-5.435a9.354,9.354,0,0,0-7.024-3.2Zm3.185,10.216-.478,4.289a1.119,1.119,0,0,0,1.237,1.237l4.282-.478,9.7-9.7-5.041-5.041-9.7,9.689ZM44.508,18.907l-2.665-2.665a1.685,1.685,0,0,0-2.377,0L36.809,18.9l-.288.288,5.048,5.041,2.939-2.939a1.693,1.693,0,0,0,0-2.384Z" fill="#ecf0f1" />
			</svg>
			<svg id="saveChangesIcon" xmlns="http://www.w3.org/2000/svg" width="21" height="18" viewBox="0 0 28.242 20.121">
				<path id="Icon_feather-check" data-name="Icon feather-check" d="M30,9,13.5,25.5,6,18" transform="translate(-3.879 -6.879)" fill="none" stroke="#1E2126" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
			</svg>
			<p class="changeProfileText" style="font-size: 16px;">Edit Profile</p>
		</button>
		<button class="chatroom">
			<svg xmlns="http://www.w3.org/2000/svg" width="21" height="18" viewBox="0 0 35.496 29.812">
				<g id="Icon_ionic-ios-chatbubbles" data-name="Icon ionic-ios-chatbubbles" transform="translate(-3.375 -3.375)">
					<path id="Path_1946" data-name="Path 1946" d="M35.03,22.911a1.53,1.53,0,0,1,.282-.874,2.438,2.438,0,0,1,.179-.222,10.353,10.353,0,0,0,2.355-6.471c.026-6.607-6.613-11.968-14.821-11.968-7.159,0-13.132,4.092-14.531,9.524a9.754,9.754,0,0,0-.316,2.451c0,6.615,6.383,12.118,14.591,12.118a20.658,20.658,0,0,0,4.027-.552c.964-.222,1.92-.516,2.167-.595a2.642,2.642,0,0,1,.794-.122,2.59,2.59,0,0,1,.862.143l4.838,1.44a1.33,1.33,0,0,0,.333.072.632.632,0,0,0,.683-.573.792.792,0,0,0-.043-.193Z" transform="translate(1.026)" fill="#ecf0f1" />
					<path id="Path_1947" data-name="Path 1947" d="M26.456,27.88c-.307.072-.7.15-1.126.229a18.6,18.6,0,0,1-2.9.322c-8.209,0-14.591-5.5-14.591-12.118a11.418,11.418,0,0,1,.128-1.534,8.417,8.417,0,0,1,.2-.917c.085-.322.188-.645.3-.96l-.683.509a10.05,10.05,0,0,0-4.4,8.019,9.389,9.389,0,0,0,2.116,5.876c.2.251.307.444.273.573s-1.015,4.443-1.015,4.443a.527.527,0,0,0,.23.552A.782.782,0,0,0,5.414,33a.713.713,0,0,0,.247-.043l4.787-1.584a1.558,1.558,0,0,1,.486-.079,1.578,1.578,0,0,1,.538.093,16.774,16.774,0,0,0,5.179.86A14.586,14.586,0,0,0,26.9,28.3s.273-.315.589-.688C27.173,27.708,26.815,27.8,26.456,27.88Z" transform="translate(0 0.183)" fill="#ecf0f1" />
				</g>
			</svg>
			Chatroom
		</button>
		<div class="profileSeparator" style="margin-top: 40px;"></div>
		<div class="Balance">
			<h5 class="yellow">Current Balance </h5>
			<h5 style="color: #42b77c;">GP <?= number_format(ceil($user['saldo']), 0, ".", ".") ?></h5>
			<div class="butWrapper">
				<button class="ProfileTopUp">
					<svg style="margin-left: 20px;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 45 45">
						<path id="Subtraction_1" data-name="Subtraction 1" d="M22.5,45A22.5,22.5,0,0,1,6.59,6.59,22.5,22.5,0,1,1,38.41,38.41,22.353,22.353,0,0,1,22.5,45ZM17.961,16.973a6.02,6.02,0,0,0-4.551,1.982,6.747,6.747,0,0,0-1.855,4.756,6.344,6.344,0,0,0,1.806,4.513,5.859,5.859,0,0,0,4.385,1.894c.337,0,.662-.01.967-.03.347-.022.594-.04.8-.059a6.534,6.534,0,0,0,.723-.107c.288-.059.463-.094.586-.118a5.262,5.262,0,0,0,.546-.146c.23-.072.374-.12.44-.147s.224-.087.439-.167.355-.133.381-.146c.324-.13.489-.248.489-.352a1.932,1.932,0,0,0-.137-.391,1.793,1.793,0,0,1-.137-.684c0-.026-.01-.195-.03-.517s-.029-.621-.029-.888c0-.778.066-1.218.2-1.309a3.354,3.354,0,0,1,.6-.225,2.6,2.6,0,0,1,.537-.127c.051,0,.077-.1.077-.292a.859.859,0,0,0-.039-.274c-1.337.067-2.008.1-2.11.1-.039,0-.9-.033-2.559-.1a.474.474,0,0,0-.078.322c0,.164.026.244.078.244a4.529,4.529,0,0,1,.869.117c.369.078.583.183.635.313a5.725,5.725,0,0,1,.157,1.679v.137l.02,1.6c0,.156-.046.255-.137.293a5.745,5.745,0,0,1-2.539.429,4.424,4.424,0,0,1-3.6-1.826,6.515,6.515,0,0,1-.127-8,4.015,4.015,0,0,1,3.262-1.661c2.294,0,3.634.9,3.984,2.676.039.065.124.1.254.1.272,0,.41-.1.41-.293,0-.13-.026-.945-.078-2.422A20.671,20.671,0,0,0,17.961,16.973ZM27.9,29.961h0c.389,0,1.243.033,2.539.1a.938.938,0,0,0,.039-.293c0-.184-.026-.274-.078-.274a3.92,3.92,0,0,1-.85-.157c-.4-.1-.628-.241-.693-.41a5.71,5.71,0,0,1-.157-1.7V20.254c0-.622.01-1.095.03-1.406a3.4,3.4,0,0,1,.068-.6.186.186,0,0,1,.137-.147,5.346,5.346,0,0,1,1.367-.137,2.194,2.194,0,0,1,1.875.811,3.6,3.6,0,0,1,.606,2.2,2.913,2.913,0,0,1-.7,1.953,2.153,2.153,0,0,1-1.68.821,3.8,3.8,0,0,1-1.309-.215.034.034,0,0,0-.015,0c-.019,0-.033.02-.044.062a.538.538,0,0,0,.058.449,1.782,1.782,0,0,0,1.5.547,3.871,3.871,0,0,0,1.768-.4,3.6,3.6,0,0,0,1.26-1.015,4.99,4.99,0,0,0,.713-1.27,3.517,3.517,0,0,0-.147-2.9,2.953,2.953,0,0,0-1.005-1.113,5.117,5.117,0,0,0-1.27-.586,4.558,4.558,0,0,0-1.3-.2c-.37,0-.83.013-1.367.04s-.992.039-1.387.039l-2.344-.039a.494.494,0,0,0-.078.332c0,.155.026.234.078.234a3.391,3.391,0,0,1,.771.137c.344.09.537.189.576.293A7.366,7.366,0,0,1,27,19.824v7.383a6.117,6.117,0,0,1-.137,1.836c-.065.117-.262.216-.586.293a3.51,3.51,0,0,1-.761.118c-.039,0-.059.085-.059.254a.613.613,0,0,0,.059.351Z" fill="#d7c13f" />
					</svg>
					<p style="margin-right: 20px;">Top Up</p>
				</button>
				<button class="History">
					<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 34.875 34.875">
						<path id="Icon_awesome-history" data-name="Icon awesome-history" d="M35.438,17.967A17.438,17.438,0,0,1,7.056,31.577a1.686,1.686,0,0,1-.129-2.5l.792-.792a1.69,1.69,0,0,1,2.242-.139A12.938,12.938,0,1,0,9.136,8.573L12.7,12.142a1.125,1.125,0,0,1-.8,1.921H1.688A1.125,1.125,0,0,1,.563,12.938V2.716a1.125,1.125,0,0,1,1.921-.8L5.954,5.392A17.437,17.437,0,0,1,35.438,17.967Zm-12.72,5.539.691-.888a1.687,1.687,0,0,0-.3-2.368L20.25,18.025V10.688A1.687,1.687,0,0,0,18.563,9H17.438a1.687,1.687,0,0,0-1.687,1.688v9.538l4.6,3.577a1.688,1.688,0,0,0,2.368-.3Z" transform="translate(-0.563 -0.563)" fill="#1e2126" />
					</svg>
				</button>
			</div>
		</div>
		<div class="profileSeparator" style="margin-bottom: 20px;"></div>
		<button class="logout">
			<svg id="logoutIcon" style="margin-left: 20px;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 34.875 35.438">
				<path id="Icon_awesome-power-off" data-name="Icon awesome-power-off" d="M28.125,3.8a17.435,17.435,0,1,1-20.264.007,1.693,1.693,0,0,1,2.461.541l1.111,1.976a1.687,1.687,0,0,1-.464,2.18A11.812,11.812,0,1,0,25.024,8.5a1.677,1.677,0,0,1-.457-2.173l1.111-1.976A1.685,1.685,0,0,1,28.125,3.8ZM20.813,18.563V1.688A1.683,1.683,0,0,0,19.125,0h-2.25a1.683,1.683,0,0,0-1.687,1.688V18.563a1.683,1.683,0,0,0,1.688,1.688h2.25A1.683,1.683,0,0,0,20.813,18.563Z" transform="translate(-0.563)" fill="#ECF0F1" />
			</svg>
			<p class="logoutText" style="margin-right: 20px;">Logout</p>
		</button>


	</div>

	<div class="profilePage">

		<div class="navBar">
			<button class="homeButton">
				<h1 class="yellow varela">gather.owl</h1>
			</button>
			<div class="navsContainer">
				<h5 class="yellow navItem merchant" style="margin:0 2vw;">My Merchant</h5>
				<h5 class="yellow navItem pending" style="margin:0 2vw;">Transaction</h5>
				<h5 class="yellow navItem rating" style="margin:0 2vw;">Ratings</h5>
				<h5 class="yellow navItem stash" style="margin:0 2vw;">Stash Box</h5>
			</div>
		</div>
		<div class="navBarFix">
			<button class="homeButton">
				<h1 class="yellow varela">gather.owl</h1>
			</button>
			<div class="navsContainer">
				<h5 class="yellow navItem merchant" style="margin:0 2vw;">My Merchant</h5>
				<h5 class="yellow navItem pending" style="margin:0 2vw;">Transaction</h5>
				<h5 class="yellow navItem rating" style="margin:0 2vw;">Ratings</h5>
				<h5 class="yellow navItem stash" style="margin:0 2vw;">Stash Box</h5>
			</div>
		</div>


		<div class="merchantImg">
			<button id="merchantIcon" hidden>
				<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
					<g id="Group_185" data-name="Group 185" transform="translate(-15861 4733)">
						<circle id="Ellipse_187" data-name="Ellipse 187" cx="15" cy="15" r="15" transform="translate(15861 -4733)" fill="#353b48" />
						<path id="Icon_material-add-a-photo" data-name="Icon material-add-a-photo" d="M2.516,3.855V1.5H4.194V3.855H6.71v1.57H4.194V7.78H2.516V5.425H0V3.855Zm2.516,4.71V6.21H7.549V3.855H13.42l1.535,1.57h2.659A1.631,1.631,0,0,1,19.291,7v9.421a1.631,1.631,0,0,1-1.677,1.57H4.194a1.631,1.631,0,0,1-1.677-1.57V8.565ZM10.9,15.631A4.068,4.068,0,0,0,15.1,11.706,4.068,4.068,0,0,0,10.9,7.78,4.068,4.068,0,0,0,6.71,11.706,4.068,4.068,0,0,0,10.9,15.631ZM8.22,11.706A2.6,2.6,0,0,0,10.9,14.218a2.6,2.6,0,0,0,2.684-2.512A2.6,2.6,0,0,0,10.9,9.193,2.6,2.6,0,0,0,8.22,11.706Z" transform="translate(15866.434 -4728.954)" fill="#d7c13f" />
					</g>
				</svg>
			</button>
			<?php if (count($merchant) > 0) { ?>
				<div class="merchantImgWrapper">
					<img src="data:image/jpeg;base64,<?= base64_encode($mchFoto) ?>" alt="" />
				</div>
			<?php } ?>
		</div>
		<h3 id="merchantName" style=" color:#D7C13F; margin-top: 30px;">Merchant Nama</h3>
		<div class="description">
			<div id="descriptionArea">

			</div>
			<button class="editDescription">
				<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 125.182 119.959">
					<g id="Icon_feather-edit" data-name="Icon feather-edit" transform="translate(0.5 0.682)">
						<path id="Path_1931" data-name="Path 1931" d="M55.861,6H14.747A11.5,11.5,0,0,0,3,17.228V95.822A11.5,11.5,0,0,0,14.747,107.05H96.975a11.5,11.5,0,0,0,11.747-11.228v-39.3" transform="translate(0 8.727)" fill="none" stroke="#ECF0F1" stroke-linecap="round" stroke-linejoin="round" stroke-width="7" />
						<path id="Path_1932" data-name="Path 1932" d="M73.671,6.306a12.871,12.871,0,0,1,17.62,0,11.54,11.54,0,0,1,0,16.842L35.494,76.48,12,82.094l5.873-22.456Z" transform="translate(26.241 0)" fill="none" stroke="#ECF0F1" stroke-linecap="round" stroke-linejoin="round" stroke-width="7" />
					</g>
				</svg>
			</button>
		</div>




		<?php
		if (count($merchant) == 0) {
			echo "<button class='createMerchant'>Create Now</button>";
		}
		?>

		<?php
		if (count($merchant) > 0) { ?>

			<div style="display: flex; width: 500px; justify-content: space-around;position: relative;">
				<button class="ngiklan">
					<svg xmlns="http://www.w3.org/2000/svg" width="27.947" height="20.96" viewBox="0 0 27.947 20.96">
						<path id="ad" data-name="Icon awesome-ad" d="M8.6,15.853h2.017l-1.009-2.9Zm10.615-.873a1.31,1.31,0,1,0,1.31,1.31A1.312,1.312,0,0,0,19.213,14.98ZM25.327,4.5H2.62A2.621,2.621,0,0,0,0,7.12V22.84a2.621,2.621,0,0,0,2.62,2.62H25.327a2.621,2.621,0,0,0,2.62-2.62V7.12A2.621,2.621,0,0,0,25.327,4.5ZM13.678,20.22h-.925a.875.875,0,0,1-.825-.587l-.4-1.16H7.689l-.4,1.16a.873.873,0,0,1-.825.587H5.536a.873.873,0,0,1-.825-1.16l2.931-8.44a1.31,1.31,0,0,1,1.237-.88h1.455a1.31,1.31,0,0,1,1.237.881L14.5,19.06A.873.873,0,0,1,13.678,20.22Zm9.466-.873a.873.873,0,0,1-.873.873H21.4a.86.86,0,0,1-.654-.31,3.94,3.94,0,1,1-.219-7.309V10.613A.873.873,0,0,1,21.4,9.74h.873a.873.873,0,0,1,.873.873Z" transform="translate(0 -4.5)" fill="#d7c13f" />
					</svg>
					Create My Ad
				</button>
				<button class="chatCust">
					<svg xmlns="http://www.w3.org/2000/svg" width="35.496" height="29.812" viewBox="0 0 35.496 29.812">
						<g id="Icon_ionic-ios-chatbubbles" data-name="Icon ionic-ios-chatbubbles" transform="translate(-3.375 -3.375)">
							<path id="Path_1946" data-name="Path 1946" d="M35.03,22.911a1.53,1.53,0,0,1,.282-.874,2.438,2.438,0,0,1,.179-.222,10.353,10.353,0,0,0,2.355-6.471c.026-6.607-6.613-11.968-14.821-11.968-7.159,0-13.132,4.092-14.531,9.524a9.754,9.754,0,0,0-.316,2.451c0,6.615,6.383,12.118,14.591,12.118a20.658,20.658,0,0,0,4.027-.552c.964-.222,1.92-.516,2.167-.595a2.642,2.642,0,0,1,.794-.122,2.59,2.59,0,0,1,.862.143l4.838,1.44a1.33,1.33,0,0,0,.333.072.632.632,0,0,0,.683-.573.792.792,0,0,0-.043-.193Z" transform="translate(1.026)" fill="#d7c13f" />
							<path id="Path_1947" data-name="Path 1947" d="M26.456,27.88c-.307.072-.7.15-1.126.229a18.6,18.6,0,0,1-2.9.322c-8.209,0-14.591-5.5-14.591-12.118a11.418,11.418,0,0,1,.128-1.534,8.417,8.417,0,0,1,.2-.917c.085-.322.188-.645.3-.96l-.683.509a10.05,10.05,0,0,0-4.4,8.019,9.389,9.389,0,0,0,2.116,5.876c.2.251.307.444.273.573s-1.015,4.443-1.015,4.443a.527.527,0,0,0,.23.552A.782.782,0,0,0,5.414,33a.713.713,0,0,0,.247-.043l4.787-1.584a1.558,1.558,0,0,1,.486-.079,1.578,1.578,0,0,1,.538.093,16.774,16.774,0,0,0,5.179.86A14.586,14.586,0,0,0,26.9,28.3s.273-.315.589-.688C27.173,27.708,26.815,27.8,26.456,27.88Z" transform="translate(0 0.183)" fill="#d7c13f" />
						</g>
					</svg>
					Chat With Customer
				</button>
				<p class="bubbleNotif">99999</p>
			</div>

			<h2 class="yellow" style="margin-top: 10vh;">
				<svg style="margin-bottom: 5px;" xmlns="http://www.w3.org/2000/svg" width="20" height="29" viewBox="0 0 27 36">
					<path id="Icon_awesome-fire" data-name="Icon awesome-fire" d="M15.188,1.678a1.691,1.691,0,0,0-3.1-.917C3.375,13.489,15.75,14.063,15.75,20.25a4.5,4.5,0,1,1-9-.067V14.171a1.688,1.688,0,0,0-2.913-1.16A14.059,14.059,0,0,0,0,22.5a13.5,13.5,0,0,0,27,0C27,10.526,15.188,8.93,15.188,1.678Z" fill="#ee511f" />
				</svg>
				<span style="margin-left: 5px;color: #EE511F;">HOT </span>Games</h2>
			<h4 style="font-family: Roboto;font-weight: lighter;color: #ecf0f1;text-align: left;margin-top: 5px;">Top 5 Most Sold Items</h4>
			<div class="hotgamesContainer">
				<?php $ctrG = 0;
				foreach ($games as $game) {
					if ($ctrG < 6) { ?>
						<div class="hotgamesItem">
							<div class="hotgamesImg"><img src="data:image/jpeg;base64,<?= base64_encode($game['foto_game']) ?>" alt=""></div>
							<div class="hotgamesDetails">
								<h6 class="yellow"><?= $game['nama_game'] ?></h6>
								<h6 style="text-align: center;color: #ecf0f1;"><?= $game['klik'] ?> <br>Times Clicked</h6>
							</div>
						</div>
				<?php $ctrG++;
					}
				} ?>
			</div>

			<h2 style="margin: 10vh 0 4vh 0;color: #26c978;">
				<svg xmlns="http://www.w3.org/2000/svg" width="25" height="34.004" viewBox="0 0 27 36.004">
					<path id="Icon_awesome-receipt" data-name="Icon awesome-receipt" d="M25.2.225l-2.7,3.15L18.675.225a1.118,1.118,0,0,0-1.35,0L13.5,3.375,9.675.225a1.118,1.118,0,0,0-1.35,0L4.5,3.375,1.8.225a1.124,1.124,0,0,0-1.8.9v33.75a1.124,1.124,0,0,0,1.8.9l2.7-3.15,3.825,3.15a1.118,1.118,0,0,0,1.35,0l3.825-3.15,3.825,3.15a1.118,1.118,0,0,0,1.35,0l3.825-3.15,2.7,3.15a1.125,1.125,0,0,0,1.8-.9V1.125a1.124,1.124,0,0,0-1.8-.9ZM22.5,25.313a.564.564,0,0,1-.562.563H5.063a.564.564,0,0,1-.562-.562V24.188a.564.564,0,0,1,.563-.562H21.938a.564.564,0,0,1,.563.563Zm0-6.75a.564.564,0,0,1-.562.563H5.063a.564.564,0,0,1-.562-.562V17.438a.564.564,0,0,1,.563-.562H21.938a.564.564,0,0,1,.563.563Zm0-6.75a.564.564,0,0,1-.562.563H5.063a.564.564,0,0,1-.562-.562V10.688a.564.564,0,0,1,.563-.562H21.938a.564.564,0,0,1,.563.563Z" transform="translate(0 0.002)" fill="#26c978" />
				</svg>
				Transaction</h2>

			<div class="pendingTrans" style="overflow: hidden;">
				<div style="width: 100%; display: flex;justify-content: center; margin-top: 2vh; color: #ecf0f1;">
					<h4 class="ongoing yellow">Ongoing</h4>
					<h4 class="finished" style="margin-left: 5vw;">Finished</h4>
				</div>
				<div class="transContainer" style="overflow: hidden;">
					<div class="transHistoryWrapper" style="margin-bottom: 1vw;direction: ltr;">
						<div class="transHistoryContainer">
							<div class="headerTable">
								<h5 class="white" style="margin-left: 2vw;">Order ID</h5>
								<h5 class="white" style="margin-left: 8vw;">Date</h5>
								<h5 class="white" style="margin-left: 10vw;">Customer's Email</h5>
							</div>
							<div class="headerSeparator"></div>



							<div class="transBlockContainer" style="height: 70vh; overflow: auto;" id="ongoing">
								<?php
								$ctr = 1;
								$ctr2 = 1;
								$ada = "";
								$masuk = false;
								foreach ($transaksiItem as $transItem) {
									if ($transItem['status'] == 0 || $transItem['status'] == 1) {
										foreach ($item as $itm) {
											if ($itm['id_item'] == $transItem['id_item'] && $itm['id_merchant'] == $mchId) {
												if ($ada != $transItem['id_transaksi']) {
													if ($masuk) {
														echo "</div></div>";
													}
													$ada = $transItem['id_transaksi'];
													$masuk = true;
													foreach ($allTrans as $trans) {
														if ($transItem['id_transaksi'] == $trans['id_transaksi']) {

															echo
																"<div class='transBlock' id='transBlock" . $ctr . "' data-toggle='collapse' data-target='#itemBlockContainer" . $ctr . "' aria-expanded='false' aria-controls='itemBlockContainer" . $ctr . "'>
																<div class='orderID'>
																	<p style='margin-left: 2vw;'>" . $trans['id_transaksi'] . "</p>
																</div>
																<div class='Date'>
																	<p style='margin-left: 2vw;'>" . date('d/m/Y', strtotime($trans['tanggal_transaksi'])) . " </p>
																</div>
																<div class='kodePromo'>
																	<p style='margin-left: 2vw;'>" . $trans['email_user'] . "</p>
																</div>
															</div>";
														}
													}
													echo "<div class='itemBlockContainer collapse' id='itemBlockContainer" . $ctr . "'>
															<div class='itemBlockContainer'>";


													echo "<div class='itemBlock' idTrans='" . $transItem['id_transaksi'] . "' idItem='" . $transItem['id_item'] . "'>
															<div class='orderID'>
																<p>
																	<p style='margin-left: 2vw;'>" . $itm['nama_item'] . "(" . $transItem['jumlah'] . "x)</p>
																</p>
															</div>";
													if ($transItem['status'] == 0) {
														echo "<div class='Date'>
															<input type='file' name='file' id='file" . $ctr2 . "' accept='image/x-png,image/jpg,image/jpeg' class='inputfile' data-multiple-caption='{count} files selected' multiple />
															<label for='file" . $ctr2 . "'><span>Choose a file</span></label>
															</div>
															<div class='kodePromo'>
																<button class='updateItemTrans' style='background-color: #D7C13F;margin: 0 0 0 2vw; '>Update</button>
															</div>";
													}
													echo "	<div class='Price' style='width: 10vw;color: #63D99E;'>
																<p>IDR" . number_format(ceil($transItem['subtotal']), 0, ".", ".") . "</p>
															</div>

															<h6 class='keterangan' style='color: #ecf0f1'>" . $transItem['keterangan'] . "</h6>
															<div class='fotobukti' style='display: none;'></div>
														</div>";
												} else {
													echo "<div class='itemBlock' idTrans='" . $transItem['id_transaksi'] . "' idItem='" . $transItem['id_item'] . "'>
															<div class='orderID'>
																<p>
																	<p style='margin-left: 2vw;'>" . $itm['nama_item'] . "(" . $transItem['jumlah'] . "x)</p>
																</p>
															</div>";
													if ($transItem['status'] == 0) {
														echo "<div class='Date'>
															<input type='file' name='file' id='file" . $ctr2 . "' accept='image/x-png,image/jpg,image/jpeg' class='inputfile' data-multiple-caption='{count} files selected' multiple />
															<label for='file" . $ctr2 . "'><span>Choose a file</span></label>
															</div>
															<div class='kodePromo'>
																<button class='updateItemTrans' style='background-color: #D7C13F;margin: 0 0 0 2vw; '>Update</button>
															</div>";
													}
													echo "	<div class='Price' style='width: 10vw;color: #63D99E;'>
																<p>IDR" . number_format(ceil($transItem['subtotal']), 0, ".", ".") . "</p>
															</div>

															<h6 class='keterangan' style='color: #ecf0f1'>" . $transItem['keterangan'] . "</h6>
															<div class='fotobukti' style='display: none;'></div>
														</div>";
												}
												$ctr2++;
												break;
											}
										}
										$ctr++;
									}
								}
								if ($masuk) {
									echo "</div></div>";
									$masuk = false;
								}
								?>
							</div>


							<div class="transBlockContainer" style="height: 70vh; overflow: auto;" id="finish">
								<?php
								$ctr = 1;
								$ctr2 = 1;
								$ada = "";
								$masuk = false;
								foreach ($transaksiItem as $transItem) {
									if ($transItem['status'] == 2 || $transItem['status'] == -1) {
										foreach ($item as $itm) {
											if ($itm['id_item'] == $transItem['id_item'] && $itm['id_merchant'] == $mchId) {
												if ($ada != $transItem['id_transaksi']) {
													if ($masuk) {
														echo "</div></div>";
													}
													$ada = $transItem['id_transaksi'];
													$masuk = true;
													foreach ($allTrans as $trans) {
														if ($transItem['id_transaksi'] == $trans['id_transaksi']) {

															echo
																"<div class='transBlock' id='transBlock" . $ctr . "' data-toggle='collapse' data-target='#itemBlockContainer" . $ctr . "' aria-expanded='false' aria-controls='itemBlockContainer" . $ctr . "'>
																<div class='orderID'>
																	<p style='margin-left: 2vw;'>" . $trans['id_transaksi'] . "</p>
																</div>
																<div class='Date'>
																	<p style='margin-left: 2vw;'>" . date('d/m/Y', strtotime($trans['tanggal_transaksi'])) . " </p>
																</div>
																<div class='kodePromo'>
																	<p style='margin-left: 2vw;'>" . $trans['email_user'] . "</p>
																</div>
															</div>";
														}
													}
													echo "<div class='itemBlockContainer collapse' id='itemBlockContainer" . $ctr . "'>
															<div class='itemBlockContainer'>";

													echo "<div class='itemBlock' idTrans='" . $transItem['id_transaksi'] . "' idItem='" . $transItem['id_item'] . "'>
															<div class='orderID'>
																<p>
																	<p style='margin-left: 2vw;'>" . $itm['nama_item'] . "(" . $transItem['jumlah'] . "x)</p>
																</p>
															</div>
															<div class='Date'>
																<div class='statusTrans' id='statusPoints" . $ctr2 . "' style='margin-left: 2vw;'>
																</div>
															</div>
															<div class='Price' style='width: 10vw;'>
																<p>IDR " . number_format(ceil($transItem['subtotal']), 0, ".", ".") . "</p>
															</div>
															<div class='Date'>
																<p>
																	<p style='margin-left: 2vw;'>" . date('d/m/Y', strtotime($trans['tanggal_transaksi'])) . "</p>
																</p>
															</div>";
													if ($transItem['status'] == -1) {
														echo "<div class='Date' style='width: 20vw;'>
																<p>
																	<p style='margin-left: 2vw;'>(User) " . $transItem['keterangan']  . "</p>
																</p>
															</div>";
													}

													echo "<input type='hidden' name='status' id='inputPoints" . $ctr2 . "' value='" . $transItem['status'] . "'>
															</div>";
												} else {
													echo "<div class='itemBlock' idTrans='" . $transItem['id_transaksi'] . "' idItem='" . $transItem['id_item'] . "'>
															<div class='orderID'>
																<p>
																	<p style='margin-left: 2vw;'>" . $itm['nama_item'] . "(" . $transItem['jumlah'] . "x)</p>
																</p>
															</div>
															<div class='Date'>
																<div class='statusTrans' id='statusPoints" . $ctr2 . "' style='margin-left: 2vw;'>
																</div>
															</div>
															<div class='Price' style='width: 10vw;'>
																<p>IDR " . number_format(ceil($transItem['subtotal']), 0, ".", ".") . "</p>
															</div>
															<div class='Date'>
																<p>
																	<p style='margin-left: 2vw;'>" . date('d/m/Y', strtotime($trans['tanggal_transaksi'])) . "</p>
																</p>
															</div>";
													if ($transItem['status'] == -1) {
														echo "<div class='Date' style='width: 20vw;'>
																<p>
																	<p style='margin-left: 2vw;'>(User) " . $transItem['keterangan']  . "</p>
																</p>
															</div>";
													}

													echo "<input type='hidden' name='status' id='inputPoints" . $ctr2 . "' value='" . $transItem['status'] . "'>
															</div>";
												}
												$ctr2++;
												break;
											}
										}
										$ctr++;
									}
								}
								if ($masuk) {
									echo "</div></div>";
									$masuk = false;
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<h2 style="margin: 10vh 0 5vh 0;color: #d7c13f;">
				<svg id="Group_199" data-name="Group 199" xmlns="http://www.w3.org/2000/svg" width="36" height="31.5" viewBox="0 0 36 31.5">
					<path id="Icon_awesome-comment" data-name="Icon awesome-comment" d="M18,2.25c9.942,0,18,6.546,18,14.625a12.981,12.981,0,0,1-4.008,9.19A17.888,17.888,0,0,0,35.845,32.8a.559.559,0,0,1,.105.612.551.551,0,0,1-.513.338,16.08,16.08,0,0,1-9.886-3.614A21.444,21.444,0,0,1,18,31.5c-9.942,0-18-6.546-18-14.625S8.058,2.25,18,2.25Z" transform="translate(0 -2.25)" fill="#1e2126" />
					<path id="Icon_ionic-ios-star" data-name="Icon ionic-ios-star" d="M2.974,9.5H9.235l1.9-5.678a.689.689,0,0,1,1.294,0l1.9,5.678h6.3a.683.683,0,0,1,.681.681.5.5,0,0,1-.013.115.654.654,0,0,1-.285.481l-5.146,3.626,1.975,5.742a.683.683,0,0,1-.234.766.659.659,0,0,1-.383.166.834.834,0,0,1-.426-.153l-5.022-3.58-5.022,3.58a.8.8,0,0,1-.426.153.611.611,0,0,1-.379-.166.675.675,0,0,1-.234-.766L7.7,14.407l-5.1-3.66-.123-.106a.714.714,0,0,1-.221-.455A.721.721,0,0,1,2.974,9.5Z" transform="translate(5.932 1.75)" fill="#d6b329" />
				</svg>
				Ratings</span>
			</h2>

			<div class="ratingContainer">

				<div class="ratingItem">
					<div class="starContainer">
						<h3 class="varela" style="color: #d9ac18;margin-bottom: 5vh;">YOU ARE AWESOME!</h3>
						<div style="display: flex;width: 40%; justify-content: space-around;">
							<svg xmlns="http://www.w3.org/2000/svg" width="41.736" height="38" viewBox="0 0 41.736 38">
								<path id="Icon_ionic-ios-star" data-name="Icon ionic-ios-star" d="M42.4,16.529H28.7L24.534,4.343a1.52,1.52,0,0,0-2.832,0L17.538,16.529H3.741A1.481,1.481,0,0,0,2.25,17.99a1.054,1.054,0,0,0,.028.247A1.4,1.4,0,0,0,2.9,19.269l11.263,7.783L9.843,39.375a1.583,1.583,0,0,0,1.351,2,1.849,1.849,0,0,0,.932-.329l10.993-7.682,10.993,7.682a1.768,1.768,0,0,0,.932.329,1.351,1.351,0,0,0,.829-.356,1.432,1.432,0,0,0,.512-1.644L32.061,27.052,43.231,19.2l.27-.228a1.521,1.521,0,0,0,.484-.977A1.565,1.565,0,0,0,42.4,16.529Z" transform="translate(-2.25 -3.375)" fill="#d9ac18" />
							</svg>
							<svg xmlns="http://www.w3.org/2000/svg" width="41.736" height="38" viewBox="0 0 41.736 38">
								<path id="Icon_ionic-ios-star" data-name="Icon ionic-ios-star" d="M42.4,16.529H28.7L24.534,4.343a1.52,1.52,0,0,0-2.832,0L17.538,16.529H3.741A1.481,1.481,0,0,0,2.25,17.99a1.054,1.054,0,0,0,.028.247A1.4,1.4,0,0,0,2.9,19.269l11.263,7.783L9.843,39.375a1.583,1.583,0,0,0,1.351,2,1.849,1.849,0,0,0,.932-.329l10.993-7.682,10.993,7.682a1.768,1.768,0,0,0,.932.329,1.351,1.351,0,0,0,.829-.356,1.432,1.432,0,0,0,.512-1.644L32.061,27.052,43.231,19.2l.27-.228a1.521,1.521,0,0,0,.484-.977A1.565,1.565,0,0,0,42.4,16.529Z" transform="translate(-2.25 -3.375)" fill="#d9ac18" />
							</svg>
							<svg xmlns="http://www.w3.org/2000/svg" width="41.736" height="38" viewBox="0 0 41.736 38">
								<path id="Icon_ionic-ios-star" data-name="Icon ionic-ios-star" d="M42.4,16.529H28.7L24.534,4.343a1.52,1.52,0,0,0-2.832,0L17.538,16.529H3.741A1.481,1.481,0,0,0,2.25,17.99a1.054,1.054,0,0,0,.028.247A1.4,1.4,0,0,0,2.9,19.269l11.263,7.783L9.843,39.375a1.583,1.583,0,0,0,1.351,2,1.849,1.849,0,0,0,.932-.329l10.993-7.682,10.993,7.682a1.768,1.768,0,0,0,.932.329,1.351,1.351,0,0,0,.829-.356,1.432,1.432,0,0,0,.512-1.644L32.061,27.052,43.231,19.2l.27-.228a1.521,1.521,0,0,0,.484-.977A1.565,1.565,0,0,0,42.4,16.529Z" transform="translate(-2.25 -3.375)" fill="#d9ac18" />
							</svg>
							<svg xmlns="http://www.w3.org/2000/svg" width="41.736" height="38" viewBox="0 0 41.736 38">
								<path id="Icon_ionic-ios-star" data-name="Icon ionic-ios-star" d="M42.4,16.529H28.7L24.534,4.343a1.52,1.52,0,0,0-2.832,0L17.538,16.529H3.741A1.481,1.481,0,0,0,2.25,17.99a1.054,1.054,0,0,0,.028.247A1.4,1.4,0,0,0,2.9,19.269l11.263,7.783L9.843,39.375a1.583,1.583,0,0,0,1.351,2,1.849,1.849,0,0,0,.932-.329l10.993-7.682,10.993,7.682a1.768,1.768,0,0,0,.932.329,1.351,1.351,0,0,0,.829-.356,1.432,1.432,0,0,0,.512-1.644L32.061,27.052,43.231,19.2l.27-.228a1.521,1.521,0,0,0,.484-.977A1.565,1.565,0,0,0,42.4,16.529Z" transform="translate(-2.25 -3.375)" fill="#d9ac18" />
							</svg>
							<svg xmlns="http://www.w3.org/2000/svg" width="41.736" height="38" viewBox="0 0 41.736 38">
								<path id="Icon_ionic-ios-star" data-name="Icon ionic-ios-star" d="M42.4,16.529H28.7L24.534,4.343a1.52,1.52,0,0,0-2.832,0L17.538,16.529H3.741A1.481,1.481,0,0,0,2.25,17.99a1.054,1.054,0,0,0,.028.247A1.4,1.4,0,0,0,2.9,19.269l11.263,7.783L9.843,39.375a1.583,1.583,0,0,0,1.351,2,1.849,1.849,0,0,0,.932-.329l10.993-7.682,10.993,7.682a1.768,1.768,0,0,0,.932.329,1.351,1.351,0,0,0,.829-.356,1.432,1.432,0,0,0,.512-1.644L32.061,27.052,43.231,19.2l.27-.228a1.521,1.521,0,0,0,.484-.977A1.565,1.565,0,0,0,42.4,16.529Z" transform="translate(-2.25 -3.375)" fill="#d9ac18" />
							</svg>
						</div>
					</div>
					<div class="rateContainer">
						<?php foreach ($rating as $rate) {
							if ($rate['id_merchant'] == $mchId & $rate['bintang'] == 5) {  ?>
								<h4 class="yellow" style="margin-top: 5vh;"><?php foreach ($allUser as $users) {
																				if ($users['id_user'] == $rate['id_user']) {
																					echo $users['nama_user'];
																				}
																			} ?></h4>
								<div class="rateMessage">
									<p style="color: #ecf0f1;"><?= $rate['komentar'] ?></p>
								</div>
						<?php }
						} ?>
					</div>
				</div>
				<div class="ratingItem">
					<div class="starContainer">
						<h3 class="varela" style="color: #d9ac18;margin-bottom: 5vh;">DECENT WORK!</h3>
						<div style="display: flex;width: 40%; justify-content: space-around;">
							<svg xmlns="http://www.w3.org/2000/svg" width="41.736" height="38" viewBox="0 0 41.736 38">
								<path id="Icon_ionic-ios-star" data-name="Icon ionic-ios-star" d="M42.4,16.529H28.7L24.534,4.343a1.52,1.52,0,0,0-2.832,0L17.538,16.529H3.741A1.481,1.481,0,0,0,2.25,17.99a1.054,1.054,0,0,0,.028.247A1.4,1.4,0,0,0,2.9,19.269l11.263,7.783L9.843,39.375a1.583,1.583,0,0,0,1.351,2,1.849,1.849,0,0,0,.932-.329l10.993-7.682,10.993,7.682a1.768,1.768,0,0,0,.932.329,1.351,1.351,0,0,0,.829-.356,1.432,1.432,0,0,0,.512-1.644L32.061,27.052,43.231,19.2l.27-.228a1.521,1.521,0,0,0,.484-.977A1.565,1.565,0,0,0,42.4,16.529Z" transform="translate(-2.25 -3.375)" fill="#d9ac18" />
							</svg>
							<svg xmlns="http://www.w3.org/2000/svg" width="41.736" height="38" viewBox="0 0 41.736 38">
								<path id="Icon_ionic-ios-star" data-name="Icon ionic-ios-star" d="M42.4,16.529H28.7L24.534,4.343a1.52,1.52,0,0,0-2.832,0L17.538,16.529H3.741A1.481,1.481,0,0,0,2.25,17.99a1.054,1.054,0,0,0,.028.247A1.4,1.4,0,0,0,2.9,19.269l11.263,7.783L9.843,39.375a1.583,1.583,0,0,0,1.351,2,1.849,1.849,0,0,0,.932-.329l10.993-7.682,10.993,7.682a1.768,1.768,0,0,0,.932.329,1.351,1.351,0,0,0,.829-.356,1.432,1.432,0,0,0,.512-1.644L32.061,27.052,43.231,19.2l.27-.228a1.521,1.521,0,0,0,.484-.977A1.565,1.565,0,0,0,42.4,16.529Z" transform="translate(-2.25 -3.375)" fill="#d9ac18" />
							</svg>
							<svg xmlns="http://www.w3.org/2000/svg" width="41.736" height="38" viewBox="0 0 41.736 38">
								<path id="Icon_ionic-ios-star" data-name="Icon ionic-ios-star" d="M42.4,16.529H28.7L24.534,4.343a1.52,1.52,0,0,0-2.832,0L17.538,16.529H3.741A1.481,1.481,0,0,0,2.25,17.99a1.054,1.054,0,0,0,.028.247A1.4,1.4,0,0,0,2.9,19.269l11.263,7.783L9.843,39.375a1.583,1.583,0,0,0,1.351,2,1.849,1.849,0,0,0,.932-.329l10.993-7.682,10.993,7.682a1.768,1.768,0,0,0,.932.329,1.351,1.351,0,0,0,.829-.356,1.432,1.432,0,0,0,.512-1.644L32.061,27.052,43.231,19.2l.27-.228a1.521,1.521,0,0,0,.484-.977A1.565,1.565,0,0,0,42.4,16.529Z" transform="translate(-2.25 -3.375)" fill="#d9ac18" />
							</svg>
							<svg xmlns="http://www.w3.org/2000/svg" width="41.736" height="38" viewBox="0 0 41.736 38">
								<path id="Icon_ionic-ios-star" data-name="Icon ionic-ios-star" d="M42.4,16.529H28.7L24.534,4.343a1.52,1.52,0,0,0-2.832,0L17.538,16.529H3.741A1.481,1.481,0,0,0,2.25,17.99a1.054,1.054,0,0,0,.028.247A1.4,1.4,0,0,0,2.9,19.269l11.263,7.783L9.843,39.375a1.583,1.583,0,0,0,1.351,2,1.849,1.849,0,0,0,.932-.329l10.993-7.682,10.993,7.682a1.768,1.768,0,0,0,.932.329,1.351,1.351,0,0,0,.829-.356,1.432,1.432,0,0,0,.512-1.644L32.061,27.052,43.231,19.2l.27-.228a1.521,1.521,0,0,0,.484-.977A1.565,1.565,0,0,0,42.4,16.529Z" transform="translate(-2.25 -3.375)" fill="#d9ac18" />
							</svg>
						</div>
					</div>
					<div class="rateContainer">
						<?php foreach ($rating as $rate) {
							if ($rate['id_merchant'] == $mchId & $rate['bintang'] == 4) {  ?>
								<h4 class="yellow" style="margin-top: 5vh;"><?php foreach ($allUser as $users) {
																				if ($users['id_user'] == $rate['id_user']) {
																					echo $users['nama_user'];
																				}
																			} ?></h4>
								<div class="rateMessage">
									<p style="color: #ecf0f1;"><?= $rate['komentar'] ?></p>
								</div>
						<?php }
						} ?>
					</div>
				</div>
				<div class="ratingItem">
					<div class="starContainer">
						<h3 class="varela" style="color: #d9ac18;margin-bottom: 5vh;">IT'S STILL AVERAGE!</h3>
						<div style="display: flex;width: 40%; justify-content: space-around;">
							<svg xmlns="http://www.w3.org/2000/svg" width="41.736" height="38" viewBox="0 0 41.736 38">
								<path id="Icon_ionic-ios-star" data-name="Icon ionic-ios-star" d="M42.4,16.529H28.7L24.534,4.343a1.52,1.52,0,0,0-2.832,0L17.538,16.529H3.741A1.481,1.481,0,0,0,2.25,17.99a1.054,1.054,0,0,0,.028.247A1.4,1.4,0,0,0,2.9,19.269l11.263,7.783L9.843,39.375a1.583,1.583,0,0,0,1.351,2,1.849,1.849,0,0,0,.932-.329l10.993-7.682,10.993,7.682a1.768,1.768,0,0,0,.932.329,1.351,1.351,0,0,0,.829-.356,1.432,1.432,0,0,0,.512-1.644L32.061,27.052,43.231,19.2l.27-.228a1.521,1.521,0,0,0,.484-.977A1.565,1.565,0,0,0,42.4,16.529Z" transform="translate(-2.25 -3.375)" fill="#d9ac18" />
							</svg>
							<svg xmlns="http://www.w3.org/2000/svg" width="41.736" height="38" viewBox="0 0 41.736 38">
								<path id="Icon_ionic-ios-star" data-name="Icon ionic-ios-star" d="M42.4,16.529H28.7L24.534,4.343a1.52,1.52,0,0,0-2.832,0L17.538,16.529H3.741A1.481,1.481,0,0,0,2.25,17.99a1.054,1.054,0,0,0,.028.247A1.4,1.4,0,0,0,2.9,19.269l11.263,7.783L9.843,39.375a1.583,1.583,0,0,0,1.351,2,1.849,1.849,0,0,0,.932-.329l10.993-7.682,10.993,7.682a1.768,1.768,0,0,0,.932.329,1.351,1.351,0,0,0,.829-.356,1.432,1.432,0,0,0,.512-1.644L32.061,27.052,43.231,19.2l.27-.228a1.521,1.521,0,0,0,.484-.977A1.565,1.565,0,0,0,42.4,16.529Z" transform="translate(-2.25 -3.375)" fill="#d9ac18" />
							</svg>
							<svg xmlns="http://www.w3.org/2000/svg" width="41.736" height="38" viewBox="0 0 41.736 38">
								<path id="Icon_ionic-ios-star" data-name="Icon ionic-ios-star" d="M42.4,16.529H28.7L24.534,4.343a1.52,1.52,0,0,0-2.832,0L17.538,16.529H3.741A1.481,1.481,0,0,0,2.25,17.99a1.054,1.054,0,0,0,.028.247A1.4,1.4,0,0,0,2.9,19.269l11.263,7.783L9.843,39.375a1.583,1.583,0,0,0,1.351,2,1.849,1.849,0,0,0,.932-.329l10.993-7.682,10.993,7.682a1.768,1.768,0,0,0,.932.329,1.351,1.351,0,0,0,.829-.356,1.432,1.432,0,0,0,.512-1.644L32.061,27.052,43.231,19.2l.27-.228a1.521,1.521,0,0,0,.484-.977A1.565,1.565,0,0,0,42.4,16.529Z" transform="translate(-2.25 -3.375)" fill="#d9ac18" />
							</svg>
						</div>
					</div>
					<div class="rateContainer">
						<?php foreach ($rating as $rate) {
							if ($rate['id_merchant'] == $mchId & $rate['bintang'] == 3) {  ?>
								<h4 class="yellow" style="margin-top: 5vh;"><?php foreach ($allUser as $users) {
																				if ($users['id_user'] == $rate['id_user']) {
																					echo $users['nama_user'];
																				}
																			} ?></h4>
								<div class="rateMessage">
									<p style="color: #ecf0f1;"><?= $rate['komentar'] ?></p>
								</div>
						<?php }
						} ?>
					</div>
				</div>
				<div class="ratingItem">
					<div class="starContainer">
						<h3 class="varela" style="color: #d9ac18;margin-bottom: 5vh;">NEED SOME WORK!</h3>
						<div style="display: flex;width: 40%; justify-content: space-around;">
							<svg xmlns="http://www.w3.org/2000/svg" width="41.736" height="38" viewBox="0 0 41.736 38">
								<path id="Icon_ionic-ios-star" data-name="Icon ionic-ios-star" d="M42.4,16.529H28.7L24.534,4.343a1.52,1.52,0,0,0-2.832,0L17.538,16.529H3.741A1.481,1.481,0,0,0,2.25,17.99a1.054,1.054,0,0,0,.028.247A1.4,1.4,0,0,0,2.9,19.269l11.263,7.783L9.843,39.375a1.583,1.583,0,0,0,1.351,2,1.849,1.849,0,0,0,.932-.329l10.993-7.682,10.993,7.682a1.768,1.768,0,0,0,.932.329,1.351,1.351,0,0,0,.829-.356,1.432,1.432,0,0,0,.512-1.644L32.061,27.052,43.231,19.2l.27-.228a1.521,1.521,0,0,0,.484-.977A1.565,1.565,0,0,0,42.4,16.529Z" transform="translate(-2.25 -3.375)" fill="#d9ac18" />
							</svg>
							<svg xmlns="http://www.w3.org/2000/svg" width="41.736" height="38" viewBox="0 0 41.736 38">
								<path id="Icon_ionic-ios-star" data-name="Icon ionic-ios-star" d="M42.4,16.529H28.7L24.534,4.343a1.52,1.52,0,0,0-2.832,0L17.538,16.529H3.741A1.481,1.481,0,0,0,2.25,17.99a1.054,1.054,0,0,0,.028.247A1.4,1.4,0,0,0,2.9,19.269l11.263,7.783L9.843,39.375a1.583,1.583,0,0,0,1.351,2,1.849,1.849,0,0,0,.932-.329l10.993-7.682,10.993,7.682a1.768,1.768,0,0,0,.932.329,1.351,1.351,0,0,0,.829-.356,1.432,1.432,0,0,0,.512-1.644L32.061,27.052,43.231,19.2l.27-.228a1.521,1.521,0,0,0,.484-.977A1.565,1.565,0,0,0,42.4,16.529Z" transform="translate(-2.25 -3.375)" fill="#d9ac18" />
							</svg>
						</div>
					</div>
					<div class="rateContainer">
						<?php foreach ($rating as $rate) {
							if ($rate['id_merchant'] == $mchId & $rate['bintang'] == 2) {  ?>
								<h4 class="yellow" style="margin-top: 5vh;"><?php foreach ($allUser as $users) {
																				if ($users['id_user'] == $rate['id_user']) {
																					echo $users['nama_user'];
																				}
																			} ?></h4>
								<div class="rateMessage">
									<p style="color: #ecf0f1;"><?= $rate['komentar'] ?></p>
								</div>
						<?php }
						} ?>
					</div>
				</div>
				<div class="ratingItem">
					<div class="starContainer">
						<h3 class="varela" style="color: #d9ac18;margin-bottom: 5vh;">BETTER KEEP UP!</h3>
						<div style="display: flex;width: 40%; justify-content: space-around;">
							<svg xmlns="http://www.w3.org/2000/svg" width="41.736" height="38" viewBox="0 0 41.736 38">
								<path id="Icon_ionic-ios-star" data-name="Icon ionic-ios-star" d="M42.4,16.529H28.7L24.534,4.343a1.52,1.52,0,0,0-2.832,0L17.538,16.529H3.741A1.481,1.481,0,0,0,2.25,17.99a1.054,1.054,0,0,0,.028.247A1.4,1.4,0,0,0,2.9,19.269l11.263,7.783L9.843,39.375a1.583,1.583,0,0,0,1.351,2,1.849,1.849,0,0,0,.932-.329l10.993-7.682,10.993,7.682a1.768,1.768,0,0,0,.932.329,1.351,1.351,0,0,0,.829-.356,1.432,1.432,0,0,0,.512-1.644L32.061,27.052,43.231,19.2l.27-.228a1.521,1.521,0,0,0,.484-.977A1.565,1.565,0,0,0,42.4,16.529Z" transform="translate(-2.25 -3.375)" fill="#d9ac18" />
							</svg>
						</div>
					</div>
					<div class="rateContainer">
						<?php foreach ($rating as $rate) {
							if ($rate['id_merchant'] == $mchId & $rate['bintang'] == 1) {  ?>
								<h4 class="yellow" style="margin-top: 5vh;"><?php foreach ($allUser as $users) {
																				if ($users['id_user'] == $rate['id_user']) {
																					echo $users['nama_user'];
																				}
																			} ?></h4>
								<div class="rateMessage">
									<p style="color: #ecf0f1;"><?= $rate['komentar'] ?></p>
								</div>
						<?php }
						} ?>
					</div>
				</div>
			</div>

			<h2 style="margin-top: 10vh;color: #E2A52A;">
				<svg xmlns="http://www.w3.org/2000/svg" width="29.5" height="34" viewBox="0 0 31.5 36">
					<path id="Icon_simple-codesandbox" data-name="Icon simple-codesandbox" d="M3,9,18.682,0,34.365,9,34.5,26.925,18.683,36,3,27Zm3.132,3.722v7.135l5.017,2.79v5.274l5.958,3.444V18.957Zm25.108,0L20.265,18.957V31.365l5.958-3.444V22.65l5.017-2.792V12.72ZM7.7,9.9l10.955,6.216,10.98-6.27-5.806-3.3L18.714,9.469,13.569,6.517,7.7,9.9Z" transform="translate(-3)" fill="#E2A52A" />
				</svg>
				STASH <span class="yellow">BOX</span>
			</h2>


			<div class="chartWrapper">
				<div id="containerChart">
				</div>
				<div class="waktu">
					<div class="form-group mb-4" style="margin: 0!important;">
						<div class="datepicker date input-group p-0 shadow-sm">
							<input type="text" placeholder="Start Date" class="form-control" name="startDate" id="startDate">
							<div class="input-group-append" style="overflow: visible;">
								<svg xmlns="http://www.w3.org/2000/svg" width="48" height="32.5" viewBox="0 0 61 46">
									<g id="Group_190" data-name="Group 190" transform="translate(-6632 2629)">
										<path id="Rectangle_348" data-name="Rectangle 348" d="M0,0H46A15,15,0,0,1,61,15V31A15,15,0,0,1,46,46H0a0,0,0,0,1,0,0V0A0,0,0,0,1,0,0Z" transform="translate(6632 -2629)" fill="#d7c13f" />
										<path id="Icon_material-date-range" data-name="Icon material-date-range" d="M13.5,16.5h-3v3h3Zm6,0h-3v3h3Zm6,0h-3v3h3ZM28.5,6H27V3H24V6H12V3H9V6H7.5A2.986,2.986,0,0,0,4.515,9L4.5,30a3,3,0,0,0,3,3h21a3.009,3.009,0,0,0,3-3V9A3.009,3.009,0,0,0,28.5,6Zm0,24H7.5V13.5h21Z" transform="translate(6644.3 -2624)" fill="#1e2126" />
									</g>
								</svg>
							</div>
						</div>
					</div>
					<button class="showGraph">Update Graph</button>
					<div class="form-group mb-4" style="margin: 0!important;">
						<div class="datepicker date input-group p-0 shadow-sm">
							<input type="text" placeholder="End Date" class="form-control" name="endDate" id="endDate">
							<div class="input-group-append" style="overflow: visible;">
								<svg xmlns="http://www.w3.org/2000/svg" width="48" height="32.5" viewBox="0 0 61 46">
									<g id="Group_190" data-name="Group 190" transform="translate(-6632 2629)">
										<path id="Rectangle_348" data-name="Rectangle 348" d="M0,0H46A15,15,0,0,1,61,15V31A15,15,0,0,1,46,46H0a0,0,0,0,1,0,0V0A0,0,0,0,1,0,0Z" transform="translate(6632 -2629)" fill="#d7c13f" />
										<path id="Icon_material-date-range" data-name="Icon material-date-range" d="M13.5,16.5h-3v3h3Zm6,0h-3v3h3Zm6,0h-3v3h3ZM28.5,6H27V3H24V6H12V3H9V6H7.5A2.986,2.986,0,0,0,4.515,9L4.5,30a3,3,0,0,0,3,3h21a3.009,3.009,0,0,0,3-3V9A3.009,3.009,0,0,0,28.5,6Zm0,24H7.5V13.5h21Z" transform="translate(6644.3 -2624)" fill="#1e2126" />
									</g>
								</svg>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="addItemContainer">
				<h2 class="addItemHeader">Adding Item</h2>
				<div class="addItem">
					<input type="file" name="addItemIMG" id="addItemIMG" accept="image/x-png,image/jpg,image/jpeg" style="display: none;" />
					<div class="addItemImgContainer">
						<div id="imgDisplay" hidden="true"></div>
						<h3 style="color: #ecf0f1; text-align: center;" id="imageText">Click to give it an image</h3>
					</div>
					<div class="name-gameContainer">
						<h5 class="additemTitle" contenteditable="true">Item name</h5>
						<div class="addItemGame">
							<select id="addItemGame" class="form-control" style="border: solid 2px #d7c13f;">
								<?php
								foreach ($games as $game) {
									echo "<option value='" . $game['id_game'] . "'>" . $game['nama_game'] . "</option>";
								}
								?>
							</select>
						</div>
					</div>
					<p class="additemDesc" contenteditable="true">Item Description</p>
					<div class="addItemMerchantDesc">
						<h6 class="additemMerchant"><?= $mchNama ?></h6>
						<div class="addmerchantRating">
							<p style="color:#d7c13f; margin-bottom: 0;float: left; font-size: 10pt;"><?= $mchRating ?></p>
							<div>
								<svg style="float: left;margin-top: 5px;" xmlns="http://www.w3.org/2000/svg" width="10.125" height="8.62" viewBox="0 0 35.125 33.62">
									<path class="solid_star" data-name="solid star" d="M36.178,1.157,31.891,9.85l-9.592,1.4a2.1,2.1,0,0,0-1.162,3.585l6.94,6.762-1.641,9.553a2.1,2.1,0,0,0,3.046,2.213l8.581-4.51,8.581,4.51a2.1,2.1,0,0,0,3.046-2.213L48.048,21.6l6.94-6.762a2.1,2.1,0,0,0-1.162-3.585l-9.592-1.4L39.947,1.157a2.1,2.1,0,0,0-3.769,0Z" transform="translate(-20.5 0.013)" fill="#d7c13f" />
								</svg>
							</div>
						</div>
						<h4 class="additemPrice" contenteditable="true">Item Price(ex. 18000)</h4>
						<p class="additemUploadDate">Upload date <?= date("d/m/Y") ?></p>
					</div>
					<div class="addtoStash">
						<button style="border: none;background: none;">
							<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35">
								<g id="Group_186" data-name="Group 186" transform="translate(-15955 3415)">
									<g id="Rectangle_346" data-name="Rectangle 346" transform="translate(15955 -3415)" fill="#d7c13f" stroke="#d7c13f" stroke-width="1">
										<rect width="35" height="35" rx="7" stroke="none" />
										<rect x="0.5" y="0.5" width="34" height="34" rx="6.5" fill="none" />
									</g>
									<path id="Icon_ionic-ios-add" data-name="Icon ionic-ios-add" d="M25.91,16.875H19.125V10.09a1.125,1.125,0,0,0-2.25,0v6.785H10.09a1.125,1.125,0,0,0,0,2.25h6.785V25.91a1.125,1.125,0,0,0,2.25,0V19.125H25.91a1.125,1.125,0,0,0,0-2.25Z" transform="translate(15954.342 -3415.5)" fill="#4c525d" />
								</g>
							</svg>
						</button>
					</div>
					<h5 class="addStok yellow" contenteditable="true">item Stok(ex. 5)</h5>
				</div>
				<div class="addIteminfo">
					<p>You can add your item by editing the card on the left. When you're done editing it, press the + button to add it to your stash.
					</p>
				</div>
			</div>

			<h2 class="yellow">Your Stash</h2>
			<div class="cartHeader">
				<div class="headerText" style="color: #ecf0f1;">
					<h5 class="headerDesc varela" style="margin-left: 20vw;">Description</h5>
					<h5 class="headerAmount varela" style="margin-left: 25vw;">Amount</h5>
					<h5 class="headerPrice varela" style="margin-left: 10vw;">Price</h5>
				</div>
				<hr style="background-color: #D7C13F; width: 90%;">
			</div>
			<div class="itemMerchantContainer">
				<div class="cartItemContainer">
					<?php
					$ctr = 1;
					foreach ($item as $itm) { ?>
						<div class="cartItemWrapper" id="item<?= $ctr ?>" idItem="<?= $itm['id_item'] ?>">
							<!-- isie id item-amount			-->
							<input type="hidden" name="item<?= $ctr ?>Storage" />
							<div class="action">
								<button class="saveChanges" id="<?= $ctr ?>saveChanges" onClick="saveChanges(<?= $ctr ?>)" hidden="true">
									<svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 35 35">
										<g id="Group_186" data-name="Group 186" transform="translate(-15955 3415)">
											<g id="Rectangle_346" data-name="Rectangle 346" transform="translate(15955 -3415)" fill="#d7c13f" stroke="#d7c13f" stroke-width="1">
												<rect width="35" height="35" rx="7" stroke="none" />
												<rect x="0.5" y="0.5" width="34" height="34" rx="6.5" fill="none" />
											</g>
											<path id="Icon_feather-check" data-name="Icon feather-check" d="M30,9,13.5,25.5,6,18" transform="translate(15954.445 -3414.75)" fill="none" stroke="#4c525d" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
										</g>
									</svg>
								</button>
								<button class="editItem" id="edit<?= $ctr ?>Item" onClick="editItem(<?= $ctr ?>)">
									<svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 35 35">
										<g id="Group_186" data-name="Group 186" transform="translate(-15955 3415)">
											<g id="Rectangle_346" data-name="Rectangle 346" transform="translate(15955 -3415)" fill="#d7c13f" stroke="#d7c13f" stroke-width="1">
												<rect width="35" height="35" rx="7" stroke="none" />
												<rect x="0.5" y="0.5" width="34" height="34" rx="6.5" fill="none" />
											</g>
											<path id="Icon_material-edit" data-name="Icon material-edit" d="M4.5,24.084v5.154H9.505l14.762-15.2L19.262,8.884ZM28.138,10.052a1.4,1.4,0,0,0,0-1.938L25.015,4.9a1.3,1.3,0,0,0-1.882,0L20.69,7.413,25.7,12.567Z" transform="translate(15956.349 -3414.115)" fill="#4c525d" />
										</g>
									</svg>
								</button>
								<button class="removeButton" onClick="removeItem(<?= $ctr ?>)">
									<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 46 41">
										<g id="Group_191" data-name="Group 191" transform="translate(-15869.5 3007.5)">
											<g id="Group_190" data-name="Group 190" transform="translate(136 -44)">
												<rect id="Rectangle_302" data-name="Rectangle 302" width="43" height="38" rx="8" transform="translate(15735 -2962)" stroke-width="3" stroke="#d7c13f" stroke-linecap="round" stroke-linejoin="bevel" fill="#d7c13f" />
											</g>
											<g id="Icon_feather-trash-2" data-name="Icon feather-trash-2" transform="translate(15876.1 -3004)">
												<path class="Path_1848" data-name="Path 1848" d="M4.5,9H28.052" transform="translate(0 -0.484)" fill="none" stroke="#4c525d" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
												<path id="Path_1849" data-name="Path 1849" d="M25.818,8.516V27.823A2.69,2.69,0,0,1,23.2,30.581H10.117A2.69,2.69,0,0,1,7.5,27.823V8.516m3.925,0V5.758A2.69,2.69,0,0,1,14.042,3h5.234a2.69,2.69,0,0,1,2.617,2.758V8.516" transform="translate(-0.383)" fill="none" stroke="#4c525d" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
												<path id="Path_1850" data-name="Path 1850" d="M15,16.5v8.274" transform="translate(-1.341 -1.088)" fill="none" stroke="#4c525d" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
												<path id="Path_1851" data-name="Path 1851" d="M21,16.5v8.274" transform="translate(-2.107 -1.088)" fill="none" stroke="#4c525d" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
											</g>
										</g>
									</svg>
								</button>
							</div>
							<div class="cartItem" id="item<?= $ctr ?>Wrapper" hovered="true" onClick="viewItem(<?= $ctr ?>)">
								<div class="itemImage">
									<div class="itemImgContainer" id="item<?= $ctr ?>ImgContainer">
										<img id="item<?= $ctr ?>DisplayIMG" src="data:image/jpeg;base64,<?= base64_encode($itm['foto_item']) ?>" alt="">
									</div>
									<button class="changeItemImg" id="changeItem1Img" onClick="changeItemIMG(1)" hidden="true">
										<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30">
											<g id="Group_185" data-name="Group 185" transform="translate(-15861 4733)">
												<circle id="Ellipse_187" data-name="Ellipse 187" cx="15" cy="15" r="15" transform="translate(15861 -4733)" fill="#353b48" />
												<path id="Icon_material-add-a-photo" data-name="Icon material-add-a-photo" d="M2.516,3.855V1.5H4.194V3.855H6.71v1.57H4.194V7.78H2.516V5.425H0V3.855Zm2.516,4.71V6.21H7.549V3.855H13.42l1.535,1.57h2.659A1.631,1.631,0,0,1,19.291,7v9.421a1.631,1.631,0,0,1-1.677,1.57H4.194a1.631,1.631,0,0,1-1.677-1.57V8.565ZM10.9,15.631A4.068,4.068,0,0,0,15.1,11.706,4.068,4.068,0,0,0,10.9,7.78,4.068,4.068,0,0,0,6.71,11.706,4.068,4.068,0,0,0,10.9,15.631ZM8.22,11.706A2.6,2.6,0,0,0,10.9,14.218a2.6,2.6,0,0,0,2.684-2.512A2.6,2.6,0,0,0,10.9,9.193,2.6,2.6,0,0,0,8.22,11.706Z" transform="translate(15866.434 -4728.954)" fill="#d7c13f" />
											</g>
										</svg>
									</button>
									<input type="file" name="item<?= $ctr ?>IMG" id="item<?= $ctr ?>IMG" accept="image/x-png,image/jpg,image/jpeg" style="display: none;" />
								</div>
								<div class="itemDescWrapper">
									<h5 class="itemName yellow" id="name<?= $ctr ?>" style="display: inline-block;" contenteditable="true"><?= $itm['nama_item'] ?></h5>
									<div class="selectGame">
										<h6 style="margin-bottom: 10px;">Game</h6>

										<h4 id="item<?= $ctr ?>Game" class="yellow">
											<?php
											foreach ($games as $game) {
												if ($game['id_game'] == $itm['id_game']) {
													echo $game['nama_game'];
												}
											}
											?></h4>
										<select id="select<?= $ctr ?>Game" class="form-control" style="border: solid 2px #d7c13f;" hidden="true">
											<?php
											foreach ($games as $game) {
												if ($game['id_game'] == $itm['id_game']) {
													echo "<option value='" . $game['id_game'] . "' selected >" . $game['nama_game'] . "</option>";
												} else {
													echo "<option value='" . $game['id_game'] . "'>" . $game['nama_game'] . "</option>";
												}
											}
											?>
										</select>
									</div>
								</div>
								<div class="desc">
									<p id="desc<?= $ctr ?>"> <?= $itm['desc_item'] ?> </p>
								</div>
								<div class="amount">
									<h4 id="item<?= $ctr ?>Amount" class="yellow" contenteditable="false"><?= $itm['jumlah_item'] ?></h4>
									<div class="minplusButton" id="amountBut<?= $ctr ?>" hidden="true">
										<button class="amountBut" onClick="addAmount(1,0)">
											<svg xmlns="http://www.w3.org/2000/svg" width="46" height="41" viewBox="0 0 46 41">
												<g id="Group_185" data-name="Group 185" transform="translate(-15819.5 3056.5)">
													<g id="Group_182" data-name="Group 182" transform="translate(86 -93)">
														<rect id="Rectangle_302" data-name="Rectangle 302" width="43" height="38" rx="8" transform="translate(15735 -2962)" stroke-width="3" stroke="none" stroke-linecap="round" stroke-linejoin="bevel" fill="#d7c13f" />
													</g>
													<path id="Icon_material-add" data-name="Icon material-add" d="M28.5,19.5H7.5v-3h21Z" transform="translate(15824.7 -3054)" fill="#4C525D" />
												</g>
											</svg>
										</button>
										<button class="amountBut" onClick="addAmount(<?= $ctr ?>,1)">
											<svg class="plus" xmlns="http://www.w3.org/2000/svg" width="46" height="41" viewBox="0 0 46 41">
												<g id="Group_186" data-name="Group 186" transform="translate(-15879.5 3056.5)">
													<g id="Group_184" data-name="Group 184" transform="translate(146 -93)">
														<rect id="Rectangle_302" data-name="Rectangle 302" width="43" height="38" rx="8" transform="translate(15735 -2962)" stroke-width="3" stroke="none" stroke-linecap="round" stroke-linejoin="bevel" fill="#d7c13f" />
													</g>
													<path id="Icon_material-add" data-name="Icon material-add" d="M28.5,19.5h-9v9h-3v-9h-9v-3h9v-9h3v9h9Z" transform="translate(15884.7 -3054)" fill="#4C525D" />
												</g>
											</svg>
										</button>
									</div>
								</div>
								<div class="subtotal">
									<h4 id="item<?= $ctr ?>Price" style="color:#63D99E;" onblur="savePrice(<?= $ctr ?>)">IDR <?= ceil($itm['harga_item']) ?></h4>
								</div>
							</div>
						</div>
					<?php $ctr++;
					} ?>
				</div>
			</div>

		<?php } ?>

	</div>
	<form id="payment-form" method="post" action="<?= site_url() ?>Shop/topUp/">
		<input type="hidden" name="result_data" id="result-type" value="">
		</div>
		<input type="hidden" name="result_data" id="result-data" value="">
		</div>
		<input type="hidden" name="gross_amount" id="total" value="">
		</div>
		<input type="hidden" name="idHistory" id="idHistory" value=""></div>
	</form>
	<div style="display: none;">
		<div id="topUpHeader">
			<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 15 15">
				<path id="Icon_awesome-coins" data-name="Icon awesome-coins" d="M0,11.874v1.251C0,14.159,2.52,15,5.625,15s5.625-.841,5.625-1.875V11.874a10.654,10.654,0,0,1-5.625,1.251A10.654,10.654,0,0,1,0,11.874ZM9.375,3.75C12.48,3.75,15,2.909,15,1.875S12.48,0,9.375,0,3.75.841,3.75,1.875,6.27,3.75,9.375,3.75ZM0,8.8v1.512c0,1.034,2.52,1.875,5.625,1.875s5.625-.841,5.625-1.875V8.8a9.435,9.435,0,0,1-5.625,1.512A9.435,9.435,0,0,1,0,8.8Zm12.188.322C13.866,8.8,15,8.194,15,7.5V6.249A7.194,7.194,0,0,1,12.188,7.26ZM5.625,4.688C2.52,4.688,0,5.736,0,7.031S2.52,9.375,5.625,9.375,11.25,8.326,11.25,7.031,8.73,4.688,5.625,4.688ZM12.05,6.337C13.808,6.021,15,5.4,15,4.688V3.437a9.538,9.538,0,0,1-4.708,1.225A3.281,3.281,0,0,1,12.05,6.337Z" fill="#d7c13f" />
			</svg>
			<h5 class="yellow" style="margin-left: 1vw;">Top Up</h5>
		</div>
		<div id="topUpBody">
			<h6 style="color: #ecf0f1">Input Value</h6>
			<input type="number" name="topUpAmount" id="topUpAmount">
		</div>
	</div>
	<?php
	$ada = false;
	$tgl =  date("Y-m-d H:i:s");
	if ($mchId != "") {
		foreach ($subscribers as $subs) {
			if ($subs['id_merchant'] == $mchId && $tgl < $subs['tgl_akhir'] && $subs['status'] == 1) {
				$ada = true;
				$subBanner = $subs['banner'];
				$subId = $subs['id_sub'];
				$subAkhir = $subs['tgl_akhir'];
			}
		}
	}
	?>
	<div class="subs" style="text-align: center;">
		<input type="file" name="bannerImg" id="bannerImg" accept="image/x-png,image/jpg,image/jpeg" hidden>
		<p id="countdown">Subscribe to our <span style="color: #d7c13f;">MONTHLY PLAN</span></p>
		<h5 class="varela" id="desc">Create your own ad banner and display it on the shop page</h5>
		<div class="banner">
			<h2 style="color: #ecf0f1;">Click here to upload your own image</h2>
			<h5 style="color: #ecf0f1;">(900px X 200px)</h5>
		</div>
		<h5 class="varela" id="priceTag">Only GP 30.000 / month</h5>
		<button class="subscribe">SUBSCRIBE</button>
	</div>

	<div class="bgblur"></div>
	<script>
		$(document).ready(function() {

			var ctr = 1;
			var ada = true;
			while (ada) {
				if ($("#item" + ctr + "Wrapper").length) {
					ctr++;
				} else {
					ada = false;
				}
			}
			ctr--;
			count = ctr;

			for (i = 1; i <= count; i++) {
				var price = $("#item" + i + "Price").html();
				price = price.replace(/[^a-z0-9\s]/gi, '');
				price = price.substring(4, price.length);
				$("#item" + i + "Price").html("IDR " + addCommas(price));
			}

			<?php
			if ($mchNama != "") { ?>
				createfirstChart();
				var merchantName = <?php if (isset($mchNama)) {
										echo "'" . $mchNama . "'";
									} ?>;
				var merchantDesc = <?php if (isset($mchNama)) {
										echo "'" . $mchDesc . "'";
									} ?>;
				$("#merchantName").html(merchantName);
				$("#merchantName").attr("idM", '<?= $mchId ?>');
				$("#descriptionArea").html(merchantDesc);
			<?php } else { ?>
				$("#merchantName").html("Merchant Name");
				$("#descriptionArea").html("YOURR DESCRIPTION </br> YOURR DESCRIPTION </br> YOURR DESCRIPTION");
			<?php } ?>

			ada = true;
			ctr = 1;
			while (ada) {
				if ($("#inputPoints" + ctr).length) {
					var status = $("#inputPoints" + ctr).val();
					if (status == 2) {
						$("#statusPoints" + ctr).css("background-color", "#42b77c");
						$("#statusPoints" + ctr).append("<p>Successful</p>");
					} else if (status == -1) {
						$("#statusPoints" + ctr).css("background-color", "#F25757");
						$("#statusPoints" + ctr).append("<p>Failed</p>");
					} else {
						$("#statusPoints" + ctr).append("<p>Pending</p>");
					}
					ctr++;
				} else ada = false;
			}

			$("#finish").css("display", "none");
			$(".subs").css("display", "none");
			$(".bgblur").css("display", "none");
			$(".navBarFix").css("display", "none");
			$(".bubbleNotif").html('<?= $jmlChat ?>')

		});

		var nav = false;

		$(window).scroll(function(event) {
			var scroll = $(window).scrollTop();
			if (scroll > 1250) {
				nav = true;
				$(".navBarFix").removeClass("slideOutUp");
				$(".navBarFix").addClass("slideInDown animated");
				$(".navBarFix").css("width", "81vw");
				$(".navBarFix").css("display", "flex");
				$(".navBarFix").css("z-index", "99");
				$(".navBarFix").css("position", "fixed");
			}
			if (scroll < 500 && nav) {
				$(".navBarFix").removeClass("slideInDown");
				$(".navBarFix").addClass("slideOutUp animated");
				var time = setTimeout('$(".navBarFix").css("display","none");', 1000);
			}
			// Do something
		});

		$(".stash").click(function() {
			$('html, body').animate({
				scrollTop: $(".chartWrapper").offset().top - 50
			}, 2000);
		});

		$(".rating").click(function() {
			$('html, body').animate({
				scrollTop: $(".ratingContainer").offset().top - 50
			}, 2000);
		});

		$(".pending").click(function() {
			$('html, body').animate({
				scrollTop: $(".pendingTrans").offset().top - 50
			}, 2000);
		});

		var check = false;
		var id = 0;
		var count = 0;
		var timer = setInterval(gantiGambar, 1);



		var headerTopUp = $("#topUpHeader").html();
		var bodyTopUp = $("#topUpBody").html();
		var ageInput = document.getElementById("topUpAmount");
		ageInput.addEventListener("keydown", function(e) {
			// prevent: "e", "=", ",", "-", "."
			if ([69, 187, 188, 189, 190].includes(e.keyCode)) {
				e.preventDefault();
			}
		})
		$("#topUpHeader").html("");
		$("#topUpBody").html("");


		$(".ProfileTopUp").click(function() {
			alertify.confirm(bodyTopUp).set('onok', function(closeevent, value) {
				//var hasil = $("#topUpAmount").val();
				event.preventDefault();
				$(this).attr("disabled", "disabled");
				var gross_amount = $("#topUpAmount").val();
				$("#total").val(gross_amount);
				//alert(gross_amount);

				nama = $("#nameProfile").val();
				phone = $("#phoneNum").val();
				email = $("#emailProfile").val();
				$.ajax({
					method: 'POST',
					url: '<?= base_url() ?>Midtrans/snap2/token',
					data: {
						gross_amount: gross_amount,
						price: gross_amount,
						nama: nama,
						phone: phone,
						email: email
					},
					cache: false,

					success: function(data) {
						console.log('token = ' + data);

						var resultType = document.getElementById('result-type');
						var resultData = document.getElementById('result-data');

						function changeResult(type, data) {
							$("#result-type").val(type);
							$("#result-data").val(JSON.stringify(data));
							//resultType.innerHTML = type;
							//resultData.innerHTML = JSON.stringify(data);
						}

						snap.pay(data, {
							onSuccess: function(result) {
								changeResult('success', result);
								console.log(result.status_message);
								console.log(result);
								$("#payment-form").submit();
							},
							onPending: function(result) {
								changeResult('pending', result);
								console.log(result.status_message);
								$("#payment-form").submit();
							},
							onError: function(result) {
								changeResult('error', result);
								console.log(result.status_message);
								$("#payment-form").submit();
							}
						});

					}
				});

			}).set({
				onfocus: function() {
					$(".ajs-input").attr("id", "inputTopUp");
				},
				'title': headerTopUp
			});

		});


		function gantiGambar() {
			if (id != 0) {
				$("#item" + id + "IMG").change(function() {
					if (this.files && this.files[0]) {
						var reader = new FileReader();

						reader.onload = function(e) {
							var img = $('<img>').attr({
								src: e.target.result,
								id: "item" + id + "DisplayIMG"
							});
							$("#item" + id + "DisplayIMG").remove();
							$("#item" + id + "ImgContainer").html(img);
						};
						reader.readAsDataURL(this.files[0]);
					}
				});
			}
			for (var i = 1; i <= count; i++) {
				$("#item" + i + "Wrapper").mouseover(function() {
					if ($(this).attr("hovered") == "true") {
						$("body").css("cursor", "pointer");
					}

				});
				$("#item" + i + "Wrapper").mouseout(function() {
					$("body").css("cursor", "default");
				});
			}
		}

		$(".addItemImgContainer").click(function() {
			$("#addItemIMG").trigger("click");
		});

		$(".addtoStash").click(function() {
			var price = $(".additemPrice").html();
			var stok = $(".addStok").html();
			if (!isNaN(price) && !isNaN(stok)) {
				name = $('.additemTitle').html();
				id_game = $('.addItemGame option:selected').val();
				desc = $('.additemDesc').html();
				id_merchant = $('#merchantName').attr("idM");
				foto = $("#imgDisplay").find('img').attr('src');

				if (foto.substring(11, 12) == "j") {
					foto = foto.substring(23, foto.length);
				} else {
					foto = foto.substring(22, foto.length);
				}

				$.ajax({
					url: "<?= base_url(); ?>Shop/insertItem",
					method: "post",
					data: {
						name: name,
						id_game: id_game,
						price: price,
						stok: stok,
						desc: desc,
						id_merchant: id_merchant,
						foto: foto
					},
					success: function(result) {
						alertify.success("SUCCESS TAMBAH ITEM !!!");
						window.location.href = '<?= base_url(); ?>Shop/viewProfile/';
					}
				});
			} else {
				if (isNaN(price)) alert("Price must be a number");
				else if (isNaN(stok)) alert("Stok must be a number");
			}
		});

		function editItem(idDiv) {
			//alert($("#"+idDiv+"saveChanges").attr("hidden"));
			if ($("#" + idDiv + "saveChanges").attr("hidden") == "hidden") {
				$("#item" + idDiv + "Wrapper").css("border", "solid 2px rgba(215,193,63,0.3)");
				$("#item" + idDiv + "Wrapper").attr("hovered", "false");
				$("#" + idDiv + "saveChanges").attr("hidden", false);
				$("#changeItem" + idDiv + "Img").attr("hidden", false);
				$("#edit" + idDiv + "Item").attr("hidden", true);
				$("#name" + idDiv).attr("contenteditable", true);
				$("#select" + idDiv + "Game").attr("hidden", false);
				$("#item" + idDiv + "Game").attr("hidden", true);
				$("#amountBut" + idDiv).attr("hidden", false);
				$("#desc" + idDiv).attr("contenteditable", true);
				$("#item" + idDiv + "Price").attr("contenteditable", true);
				$("#item" + idDiv + "Amount").attr("contenteditable", "true");
				var price = $("#item" + idDiv + "Price").html();
				price = price.replace(/[^a-z0-9\s]/gi, '');
				price = price.substring(4, price.length);
				$("#item" + idDiv + "Price").html(price);
			}
		}

		function saveChanges(idDiv) {
			var price = $("#item" + idDiv + "Price").html();
			price = price.replace(/[^a-z0-9\s]/gi, '');
			var amount = $("#item" + idDiv + "Amount").html();
			if (isNaN(price)) {
				alert("Price must be a number");
			} else if (isNaN(amount)) {
				alert("Stok must be a number");
			} else {
				id = $('#item' + idDiv).attr("idItem");
				name = $('#name' + idDiv).html();
				id_game = $('#select' + idDiv + 'Game option:selected').val();
				desc = $('#desc' + idDiv).html();

				//alert(foto);
				$.ajax({
					url: "<?= base_url(); ?>Shop/editItem",
					method: "post",
					data: {
						id: id,
						name: name,
						id_game: id_game,
						price: price,
						stok: amount,
						desc: desc
					},
					success: function(result) {
						var selected = $("#select" + idDiv + "Game").children("option:selected").html();
						$("#item" + idDiv + "Game").html(selected);
						$("#" + idDiv + "saveChanges").attr("hidden", true);
						$("#item" + idDiv + "Wrapper").css("border", "none");
						$("#item" + idDiv + "Wrapper").attr("hovered", "true");
						$("#edit" + idDiv + "Item").attr("hidden", false);
						$("#changeItem" + idDiv + "Img").attr("hidden", true);
						$("#name" + idDiv).attr("contenteditable", false);
						$("#select" + idDiv + "Game").attr("hidden", true);
						$("#item" + idDiv + "Game").attr("hidden", false);
						$("#amountBut" + idDiv).attr("hidden", true);
						$("#desc" + idDiv).attr("contenteditable", false);
						$("#item" + idDiv + "Amount").attr("contenteditable", "false");
						$("#item" + idDiv + "Price").attr("contenteditable", false);
						$("#item" + idDiv + "Price").html("IDR " + addCommas(price));
						alertify.success("SUCCESS EDIT ITEM !!!");
					}
				});



			}
		}

		function viewItem(idDiv) {
			if ($("#" + idDiv + "saveChanges").attr("hidden") == "hidden") {
				id = $("#item" + idDiv).attr("idItem");
				window.location.href = '<?= base_url(); ?>Shop/viewItem/'.concat(id);
			}
		}

		function removeItem(idDiv) {
			idI = $("#item" + idDiv).attr("idItem");
			$.ajax({
				url: "<?= base_url(); ?>Shop/removeItem",
				method: "post",
				data: {
					idItem: idI
				},
				success: function(result) {
					$("#item" + idDiv).remove();
				}
			});
		}

		function addAmount(id, jenis) {
			var amount = $("#item" + id + "Amount").html();
			if (!isNaN(amount)) {
				amount = parseInt(amount);
				if (jenis == 0) {
					if (amount != 0) amount -= 1;
				} else {
					amount += 1;
				}
				$("#item" + id + "Amount").html(amount);
			}
		}

		function addCommas(nStr) {
			nStr += '';
			x = nStr.split('.');
			x1 = x[0];
			x2 = x.length > 1 ? '.' + x[1] : '';
			var rgx = /(\d+)(\d{3})/;
			while (rgx.test(x1)) {
				x1 = x1.replace(rgx, '$1' + '.' + '$2');
			}
			return x1 + x2;
		}

		$("#merchantIcon").click(function() {
			$("#merchantIMG").trigger("click");
		});

		$("#profileIcon").click(function() {
			$("#profileIMG").trigger("click");
		});

		function changeItemIMG(idDiv) {
			id = idDiv;
			$("#item" + idDiv + "IMG").trigger("click");
		}


		$(".changeProfile").mouseover(function() {
			if ($(".changeProfileText").html() == "Edit Profile") {
				$(".changeProfileText").css("color", "#D7C13F");
				$("#Icon_awesome-user-edit").attr("fill", "#D7C13F");
			} else {
				$(".changeProfileText").css("color", "#ECF0F1");
				$("#Icon_feather-check").attr("stroke", "#ecf0f1");
			}
		});
		$(".changeProfile").mouseout(function() {
			if ($(".changeProfileText").html() == "Edit Profile") {
				$(".changeProfileText").css("color", "#ECF0F1");
				$("#Icon_awesome-user-edit").attr("fill", "#ECF0F1");
			} else {
				$(".changeProfileText").css("color", "#1E2126");
				$("#Icon_feather-check").attr("stroke", "#1E2126");
			}
		});

		$(".logout").mouseover(function() {
			$("#logoutIcon").hide();
			$(".logoutText").attr("style", "");
			$(".logoutText").html("Don't go :(");
		});
		$(".logout").mouseout(function() {
			$("#logoutIcon").show();
			$(".logoutText").attr("style", "margin-right:20px;");
			$(".logoutText").html("Logout");
		});


		$(".changeProfile").click(function() {
			if ($(".changeProfileText").html() == "Edit Profile") {
				$(".changeProfileText").html("Save Changes");
				$("#changeProfileIcon").hide();
				$("#saveChangesIcon").show();
				$("#profileIcon").attr("hidden", false);
				$(".changeProfile").css("background-color", "#D7C13F");
				$(".changeProfileText").css("color", "#1E2126");
				$("#Icon_feather-check").attr("stroke", "#1E2126");
				$("input").attr("readonly", false);
			} else {
				name = $('#nameProfile').val();
				phone = $('#phoneNum').val();
				pass = $('#passProfile').val();
				email = $('#emailProfile').val();
				trade = $('#tradeProfile').val();

				foto = $(".profileImg").find('img').attr('src');
				if (foto != null) {
					if (foto.substring(11, 12) == "j") {
						foto = foto.substring(23, foto.length);
					} else {
						foto = foto.substring(22, foto.length);
					}
				}

				$.ajax({
					url: "<?= base_url(); ?>Shop/editProfile",
					method: "post",
					data: {
						name: name,
						phone: phone,
						pass: pass,
						email: email,
						trade: trade,
						foto: foto
					},
					success: function(result) {
						$("#changeProfileIcon").show();
						$("#saveChangesIcon").hide();
						$(".changeProfileText").html("Edit Profile");
						$(".changeProfile").css("background-color", "#1E2126");
						$(".changeProfileText").css("color", "#ECF0F1");
						$("#profileIcon").attr("hidden", true);
						$("input").attr("readonly", true);

						alertify.success("SUCCESS EDIT PROFILE !!!!");
					}


				});


			}
		});


		$(".History").click(function() {
			id_user = '<?= $user['id_user'] ?>';
			$.ajax({
				url: "<?= base_url(); ?>Shop/refreshStatus",
				method: "post",
				success: function(result) {
					window.location.href = '<?= base_url(); ?>Shop/viewHistory';
				}
			});

		});




		$(".logout").click(function() {
			window.location.href = '<?= base_url(); ?>Login';
		});

		$(".createMerchant").click(function() {
			name = $("#merchantName").html();
			desc = $("#descriptionArea").html();
			// alert(name);
			// alert(desc);
			foto = $(".merchantImg").find('img').attr('src');
			//alert(foto);

			if (foto != null) {
				if (foto.substring(11, 12) == "j") {
					foto = foto.substring(23, foto.length);
				} else {
					foto = foto.substring(22, foto.length);
				}
			}

			$.ajax({
				url: "<?= base_url(); ?>Shop/insertMerchant",
				method: "post",
				data: {
					name: name,
					desc: desc,
					foto: foto
				},
				success: function(result) {
					window.location.href = '<?= base_url(); ?>Shop/viewProfile';
				}
			});
		});


		$(".editDescription").click(function() {
			if ($("#Path_1931").css("stroke") == "rgb(215, 193, 63)") {

				id = $("#merchantName").attr("idM");
				name = $("#merchantName").html();
				desc = $("#descriptionArea").html();
				foto = $(".merchantImg").find('img').attr('src');

				if (foto != null) {
					if (foto.substring(11, 12) == "j") {
						foto = foto.substring(23, foto.length);
					} else {
						foto = foto.substring(22, foto.length);
					}
				}

				$.ajax({
					url: "<?= base_url(); ?>Shop/editMerchant",
					method: "post",
					data: {
						id: id,
						name: name,
						desc: desc,
						foto: foto
					},
					success: function(result) {
						$("#Path_1931").css("stroke", "#ecf0f1");
						$("#Path_1932").css("stroke", "#ecf0f1");
						$("#descriptionArea").attr("contenteditable", false);
						$("#merchantName").attr("contenteditable", false);
						$("#descriptionArea").css("box-shadow", "none");
						$("#merchantName").css("box-shadow", "none");
						$("#merchantIcon").attr("hidden", true);

						alertify.success("SUCCESS EDIT MERCHANT !!!");
						window.location.href = '<?= base_url(); ?>Shop/viewProfile';
					}
				});
			} else {

				$("#Path_1931").css("stroke", "#D7C13F");
				$("#Path_1932").css("stroke", "#D7C13F");
				$("#descriptionArea").attr("contenteditable", true);
				$("#merchantName").attr("contenteditable", true);
				$("#merchantIcon").attr("hidden", false);
				$("#descriptionArea").css("box-shadow", "0 0 5px #D7C13F");
				$("#merchantName").css("box-shadow", "0 0 5px #D7C13F");
			}
		});

		$("#profileIMG").change(function() {
			if (this.files && this.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					var img = $('<img>').attr('src', e.target.result);
					$('.profileImg').html(img);
				};
				reader.readAsDataURL(this.files[0]);
			}
		});

		$("#merchantIMG").change(function() {
			if (this.files && this.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					var img = $('<img>').attr('src', e.target.result);
					$('.merchantImg').html(img);
				};

				reader.readAsDataURL(this.files[0]);
			}
		});

		$("#addItemIMG").change(function() {
			$("#imageText").attr("hidden", true);
			$("#imgDisplay").attr("hidden", false);
			if (this.files && this.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					var img = $('<img>').attr('src', e.target.result);
					$('#imgDisplay').html(img);
				};

				reader.readAsDataURL(this.files[0]);
			}
		});

		$(".homeButton").click(function() {
			window.location.href = '<?= base_url(); ?>Shop/unsetGame/';
		});

		function createfirstChart() {
			Highcharts.chart('containerChart', {
				chart: {
					type: 'column'
				},
				title: {
					text: 'Total Penjualan dari semua item'
				},
				subtitle: {
					text: 'Hari ini'
				},
				xAxis: {
					type: 'category',
					labels: {
						rotation: -45,
						style: {
							fontSize: '13px',
							fontFamily: 'Verdana, sans-serif'
						}
					}
				},
				yAxis: {
					min: 0,
					title: {
						text: 'Penjualan (Pcs)'
					}
				},
				legend: {
					enabled: false
				},
				tooltip: {
					pointFormat: 'Total Penjualan: <b>{point.y:.0f} Pcs</b>'
				},
				series: [{
					name: 'Nama Item',
					data: [
						<?php
						$i = 0;
						foreach ($totalItem as $ttl) {
							if ($i == count($totalItem) - 1) {
								echo '[' . "'" . $ttl['nama'] . "'" . ',' . $ttl['jumlah'] . ']';
							} else {
								echo '[' . "'" . $ttl['nama'] . "'" . ',' . $ttl['jumlah'] . '],';
							}
							$i++;
						}
						?>
					],
					dataLabels: {
						enabled: true,
						rotation: 0,
						color: '#d7c13f',
						align: 'left',
						y: 25, // 10 pixels down from the top
						style: {
							fontSize: '12px',
							fontFamily: 'Roboto',
							fontWeight: 'Bold'
						}
					}
				}]
			});
		}

		$(".finished").click(function() {
			$("#ongoing").addClass("fadeOut animated");
			var timer = setTimeout('$("#ongoing").css("display", "none");$("#ongoing").removeClass("fadeOut animated");', 1000);
			$("#finish").addClass("fadeIn animated");
			timer = setTimeout('$("#finish").css("display", "block");$("#finish").removeClass("fadeIn animated");', 1000);

			$(".ongoing").removeClass("yellow");
			$(".finished").addClass("yellow");
		});

		$(".ongoing").click(function() {
			$("#finish").addClass("fadeOut animated");
			var timer = setTimeout('$("#finish").css("display", "none");$("#finish").removeClass("fadeOut animated");', 1000);
			$("#ongoing").addClass("fadeIn animated");
			timer = setTimeout('$("#ongoing").css("display", "block");$("#ongoing").removeClass("fadeIn animated");', 1000);

			$(".finished").removeClass("yellow");
			$(".ongoing").addClass("yellow");
		});

		$(".inputfile").change(function() {
			if (this.files && this.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					var img = $('<img>').attr('src', e.target.result);
					$('.fotobukti').html(img);
				};

				reader.readAsDataURL(this.files[0]);
			}
		});


		$(".itemBlock").on("click", ".updateItemTrans", function() {
			if ($(this).parent().siblings(".Date").children(".inputfile").val()) {
				idTrans = $(this).parent().parent().attr("idTrans");
				idItem = $(this).parent().parent().attr("idItem");
				foto = $(this).parent().siblings(".Date").children(".inputfile").val();

				foto = $(this).parent().siblings(".fotobukti").find('img').attr('src');

				if (foto != null) {
					if (foto.substring(11, 12) == "j") {
						foto = foto.substring(23, foto.length);
					} else {
						foto = foto.substring(22, foto.length);
					}
				}

				$(this).parent().parent().addClass("ganti");
				$.ajax({
					url: "<?= base_url(); ?>Shop/updateStatusTransItem/1",
					method: "post",
					data: {
						id_transaksi: idTrans,
						id_item: idItem,
						foto: foto
					},
					success: function(result) {
						$(".ganti").children(".Date").css("display", "none");
						$(".ganti").children(".kodePromo").css("display", "none");
						$(".ganti").children(".keterangan").html("Awaiting admin 's approval");
					}
				});
			} else {
				alert("MASUKKAN FOTO DULU");
			}
		});

		var inputs = document.querySelectorAll('.inputfile');
		Array.prototype.forEach.call(inputs, function(input) {
			var label = input.nextElementSibling,
				labelVal = label.innerHTML;

			input.addEventListener('change', function(e) {
				var fileName = '';
				if (this.files && this.files.length > 1)
					fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
				else
					fileName = e.target.value.split('\\').pop();

				if (fileName)
					label.querySelector('span').innerHTML = fileName;
				else
					label.innerHTML = labelVal;
			});
		});

		$(".showGraph").click(function() {
			startDate = $("#startDate").val();
			endDate = $("#endDate").val();
			$.ajax({
				url: "<?= base_url(); ?>Shop/modifYear",
				method: "post",
				data: {
					startDate: startDate,
					endDate: endDate
				},
				success: function(result) {
					$(".chartWrapper").html(result);
				}
			});
		});

		$('.datepicker').datepicker({
			clearBtn: true,
			format: "dd/mm/yyyy",
			orientation: "left bottom"
		});

		var bannerReady = false;
		var subs = false;
		var countDownDate;
		var x;

		function countdown() {
			if (subs) {
				var now = new Date().getTime();

				var distance = countDownDate - now;

				var days = Math.floor(distance / (1000 * 60 * 60 * 24));
				var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				var seconds = Math.floor((distance % (1000 * 60)) / 1000);

				document.getElementById("countdown").innerHTML = days + "d " + hours + "h " +
					minutes + "m " + seconds + "s left";

				if (distance < 0) {
					clearInterval(x);
					document.getElementById("countdown").innerHTML = "EXPIRED";
				}
			} else {
				clearInterval(x);
			}

		}

		$(".subscribe").click(function() {
			gp = '<?= $user['saldo'] ?>';
			if (bannerReady) {
				alertify.confirm('Subscribe', 'Are you sure to subscribe by paying GP 30.000/Month?',
					function() {

						if (gp >= 30000) {

							id_merchant = '<?= $mchId ?>';
							foto = $(".banner").find("img").attr("src");

							if (foto != null) {
								if (foto.substring(11, 12) == "j") {
									foto = foto.substring(23, foto.length);
								} else {
									foto = foto.substring(22, foto.length);
								}
							}

							$.ajax({
								url: "<?= base_url(); ?>Shop/insertSubs",
								method: "post",
								data: {
									id_merchant: id_merchant,
									foto: foto
								},
								success: function(result) {
									alertify.success('Subscribed!');
									x = setInterval(countdown, 1000);
									subs = true;
									var today = new Date();
									countDownDate = today.setDate(today.getDate() + 31);
									$("#desc").html("Change the banner below to replace your current banner");
									$("#countdown").css("color", "#d7c13f");
									$("#priceTag").css("display", "none");
									$(".subscribe").css("display", "none");
								}
							});


						} else {
							alertify.error("Your GP not enough !!!");
						}
					},
					function() {});
			} else {
				alertify.error("You haven't selected any image as a banner");
			}
		});

		$("#bannerImg").change(function() {
			if (this.files && this.files[0]) {
				var reader = new FileReader();

				reader.onload = function(e) {
					var img = $('<img>').attr('src', e.target.result);
					$(".banner").html(img);
					bannerReady = true;
				};
				reader.readAsDataURL(this.files[0]);
			}

		});

		$(".banner").click(function() {
			$("#bannerImg").trigger("click");
		});

		<?php if ($ada) { ?>
			x = setInterval(countdown, 1000);
			subs = true;
			var today = new Date();
			countDownDate = new Date('<?= $subAkhir  ?>');
			$("#desc").html("Change the banner below to replace your current banner");
			$("#countdown").css("color", "#d7c13f");
			$("#priceTag").css("display", "none");
			$(".subscribe").css("display", "none");
			var img = $('<img>').attr('src', "data:image/jpeg;base64,<?= base64_encode($subBanner) ?>");
			$(".banner").html(img);
		<?php } ?>

		$(".ngiklan").click(function() {
			$(".subs").css("display", "block");
			$(".subs").addClass("slideInDown animated");
			$(".subs").removeClass("slideOutUp");
			$(".bgblur").css("display", "block");
			$(".bgblur").removeClass("fadeOutBG");
			$(".bgblur").addClass("fadeInBG animated");
		});

		$(".bgblur").click(function() {
			<?php if ($ada) { ?>
				foto = $(".banner").find("img").attr("src");
				if (foto != null) {
					if (foto.substring(11, 12) == "j") {
						foto = foto.substring(23, foto.length);
					} else {
						foto = foto.substring(22, foto.length);
					}
				}
				id_sub = '<?= $subId ?>';
				// alert(foto);
				// alert(id_sub);
				$.ajax({
					url: "<?= base_url(); ?>Shop/editBanner",
					method: "post",
					data: {
						id_sub: id_sub,
						foto: foto
					},
					success: function(result) {
						alertify.success("Success change Banner");
					}
				});
			<?php } ?>
			$(".subs").removeClass("slideInDown animated");
			$(".subs").addClass("slideOutUp animated");
			$(".bgblur").removeClass("fadeInBG animated");
			$(".bgblur").addClass("fadeOutBG animated");
			timer[10] = setTimeout("$('.subs').css('display','none')", 1000);
			timer[11] = setTimeout("$('.bgblur').css('display','none')", 1000);

		});

		$(".merchant").click(function() {
			$('html, body').animate({
				scrollTop: $(".navBar").offset().top - 50
			}, 2000);
		});

		$(".chatroom").click(function() {
			window.location.href = '<?= base_url(); ?>Shop/chatUser/room';
		});

		$(".chatCust").click(function() {
			window.location.href = '<?= base_url(); ?>Shop/chatMerchant/room';
		});
	</script>
</body>

</html>