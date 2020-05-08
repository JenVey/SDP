<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>gather.owl - My Profile</title>
	<link rel="icon" href="<?php echo base_url(); ?>asset/Images/android-chrome-512x512.png">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/shopCSS.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/profileCSS.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/Ours.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/cartCSS.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/alertify.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/alerts.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/themes/default.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="<?php echo base_url(); ?>asset/Js/jquery-min.js"></script>
	<script src="<?php echo base_url(); ?>asset/Js/bootstrap.js"></script>
	<script src="<?php echo base_url(); ?>asset/Js/textFit.js"></script>
	<script src="<?php echo base_url(); ?>asset/Js/alertify.js"></script>
	<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-3P7SuUbxsTWXgTf3"></script>
</head>
<?php
foreach ($merchant as $mch) {
	$mchId = $mch['id'];
	$mchNama = $mch['nama'];
	$mchDesc = $mch['bio'];
	$mchFoto = $mch['foto'];
	$mchRating = $mch['rating'];
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
		<h6 style="opacity: 0.4;"><?= $user['username_user'] ?></h6>
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
			<svg id="changeProfileIcon" style="margin-left: 20px;" xmlns="http://www.w3.org/2000/svg" width="21" height="18" viewBox="0 0 44.998 36.001">
				<path id="Icon_awesome-user-edit" data-name="Icon awesome-user-edit" d="M15.75,18a9,9,0,1,0-9-9A9,9,0,0,0,15.75,18Zm6.3,2.25H20.876a12.24,12.24,0,0,1-10.252,0H9.45A9.452,9.452,0,0,0,0,29.7v2.925A3.376,3.376,0,0,0,3.375,36H22.7a3.376,3.376,0,0,1-.183-1.5L23,30.22l.084-.78.555-.555,5.435-5.435a9.354,9.354,0,0,0-7.024-3.2Zm3.185,10.216-.478,4.289a1.119,1.119,0,0,0,1.237,1.237l4.282-.478,9.7-9.7-5.041-5.041-9.7,9.689ZM44.508,18.907l-2.665-2.665a1.685,1.685,0,0,0-2.377,0L36.809,18.9l-.288.288,5.048,5.041,2.939-2.939a1.693,1.693,0,0,0,0-2.384Z" fill="#ecf0f1" />
			</svg>
			<svg id="saveChangesIcon" style="margin-left: 20px;" xmlns="http://www.w3.org/2000/svg" width="21" height="18" viewBox="0 0 28.242 20.121">
				<path id="Icon_feather-check" data-name="Icon feather-check" d="M30,9,13.5,25.5,6,18" transform="translate(-3.879 -6.879)" fill="none" stroke="#1E2126" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
			</svg>
			<p class="changeProfileText" style="margin-right: 20px;">Edit Profile</p>
		</button>
		<div class="profileSeparator" style="margin-top: 40px;"></div>
		<div class="Balance">
			<h5 class="yellow">Current Balance </h5>
			<h5 style="color: #42b77c;">GP <?= $user['saldo'] ?></h5>
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

		<div style="display:flex; justify-content: flex-start; width: 100%; margin-left: 2vw; margin-top: 2vh;">
			<button class="homeButton">
				<h1 class="yellow varela">gather.owl</h1>
			</button>
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
		<h3 id="merchantName" idM="<?php if (isset($mchId)) {
										echo $mchId;
									} ?>" style=" color:#D7C13F; margin-top: 30px;">
			<?php if (count($merchant) == 0) {
				echo "Merchant Name";
			}
			?>
		</h3>
		<div class="description">
			<div id="descriptionArea">
				<?php if (count($merchant) == 0) { ?>
					Your Description !!! </br>
					Your Description !!!</br>
					Your Description !!!
				<?php } else {
					echo $mchDesc;
				} ?>
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
			<div class="addItemContainer">
				<h2 class="addItemHeader">Adding Item</h2>
				<div class="addItem">
					<input type="file" name="addItemIMG" id="addItemIMG" accept="image/x-png,image/jpg,image/jpeg" style="display: none;" />
					<h5 class="additemPrice" contenteditable="true">Item Price(ex. 18000)</h5>
					<div class="addItemImgContainer">
						<div id="imgDisplay" hidden="true"></div>
						<h3 style="color: #ecf0f1;" id="imageText">Item Image</h3>
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
						<p class="additemUploadDate">Upload date</p>
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
					<h4 class="addStok yellow" contenteditable="true">item Stok(ex. 5)</h4>
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
		<input type="hidden" name="result_data" id="result-data" value=""></div>
		<input type="hidden" name="total" id="total" value=""></div>
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

		});

		var check = false;
		var id = 0;
		var count = 0;
		var timer = setInterval(gantiGambar, 1);

		<?php if (isset($mchNama)) { ?>
			var merchantName = <?php if (isset($mchNama)) {
									echo "'" . $mchNama . "'";
								} ?>;
			var merchantDesc = <?php if (isset($mchNama)) {
									echo "'" . $mchDesc . "'";
								} ?>;

			$("#merchantName").html(merchantName);
			$("#descriptionArea").html(merchantDesc);
		<?php } ?>



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

				if (foto.substring(11, 12) == "j") {
					foto = foto.substring(23, foto.length);
				} else {
					foto = foto.substring(22, foto.length);
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
			window.location.href = '<?= base_url(); ?>Shop/viewHistory';
		});


		$(".logout").click(function() {
			window.location.href = '<?= base_url(); ?>Login';
		});

		$(".createMerchant").click(function() {
			name = $("#merchantName").html();
			desc = $("#descriptionArea").html();

			foto = $(".merchantImgWrapper").find('img').attr('src');
			alert(foto);
			if (foto.substring(11, 12) == "j") {
				foto = foto.substring(23, foto.length);
			} else {
				foto = foto.substring(22, foto.length);
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
				foto = $(".merchantImgWrapper").find('img').attr('src');

				if (foto.substring(11, 12) == "j") {
					foto = foto.substring(23, foto.length);
				} else {
					foto = foto.substring(22, foto.length);
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
					$('.merchantImgWrapper').html(img);
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
	</script>
</body>

</html>