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
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="<?php echo base_url(); ?>asset/Js/jquery-min.js"></script>
	<script src="<?php echo base_url(); ?>asset/Js/bootstrap.js"></script>
	<script src="<?php echo base_url(); ?>asset/Js/textFit.js"></script>
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
		<button class="changeProfile">Edit Profile</button>
		<button class="logout">Logout</button>
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

	<script>
		var check = false;
		var id = 0;
		var count = 0;
		var timer = setInterval(gantiGambar, 1);

		var merchantName = <?php if (isset($mchNama)) {
								echo "'" . $mchNama . "'";
							} ?>;
		var merchantDesc = <?php if (isset($mchNama)) {
								echo "'" . $mchDesc . "'";
							} ?>;

		$("#merchantName").html(merchantName);
		$("#descriptionArea").html(merchantDesc);
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
						alert("SUCCESS EDIT ITEM !!!");
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



		$(".changeProfile").click(function() {
			if ($(".changeProfile").html() == "Edit Profile") {
				$(".changeProfile").html("Save Changes");
				$("#profileIcon").attr("hidden", false);
				$(".changeProfile").css("background-color", "#D7C13F");
				$(".changeProfile").css("color", "#1E2126");
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
						$(".changeProfile").html("Edit Profile");
						$(".changeProfile").css("background-color", "#1E2126");
						$(".changeProfile").css("color", "#ECF0F1");
						$("#profileIcon").attr("hidden", true);
						$("input").attr("readonly", true);
						alert("SUCCESS EDIT PROFILE !!!!");
					}


				});


			}
		});
		$(".changeProfile").mouseover(function() {
			if ($(".changeProfile").html() == "Edit Profile") {
				$(".changeProfile").css("color", "#D7C13F");
			} else {
				$(".changeProfile").css("color", "#ECF0F1");
			}
		});
		$(".changeProfile").mouseout(function() {
			if ($(".changeProfile").html() == "Edit Profile") {
				$(".changeProfile").css("color", "#ECF0F1");
			} else {
				$(".changeProfile").css("color", "#1E2126");
			}
		});

		$(".logout").mouseover(function() {
			$(".logout").html("Don't go :(");
		});
		$(".logout").mouseout(function() {
			$(".logout").html("Logout");
		});

		$(".logout").click(function() {
			window.location.href = '<?= base_url(); ?>Login';
		});

		$(".createMerchant").click(function() {
			name = $("#merchantName").html();
			desc = $("#descriptionArea").html();
			foto = $(".merchantImgWrapper").find('img').attr('src');

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

						alert("SUCCESS EDIT !!!");
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