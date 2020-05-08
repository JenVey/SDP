<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>gather.owl - History</title>
	<link rel="icon" href="<?php echo base_url(); ?>asset/Images/android-chrome-512x512.png">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/shopCSS.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/Ours.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/profileCSS.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/historyCSS.css">
	<script src="<?php echo base_url(); ?>asset/Js/jquery-min.js"></script>
	<script src="<?php echo base_url(); ?>asset/Js/bootstrap.js"></script>
</head>

<body>
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
		<button class="backtoShop">
			<svg style="margin-left: 20px;" xmlns="http://www.w3.org/2000/svg" width="20.243" height="13.501" viewBox="0 0 20.243 13.501">
				<path id="Icon_ionic-ios-arrow-round-back" data-name="Icon ionic-ios-arrow-round-back" d="M15.216,11.51a.919.919,0,0,1,.007,1.294l-4.268,4.282H27.218a.914.914,0,0,1,0,1.828H10.955L15.23,23.2a.925.925,0,0,1-.007,1.294.91.91,0,0,1-1.287-.007L8.142,18.647h0a1.026,1.026,0,0,1-.19-.288.872.872,0,0,1-.07-.352.916.916,0,0,1,.26-.64l5.794-5.836A.9.9,0,0,1,15.216,11.51Z" transform="translate(-7.882 -11.252)" fill="#1E2126" />
			</svg>
			<p style="margin-right: 20px;">Back</p>
		</button>
		<button class="logout">
			<svg id="logoutIcon" style="margin-left: 20px;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 34.875 35.438">
				<path id="Icon_awesome-power-off" data-name="Icon awesome-power-off" d="M28.125,3.8a17.435,17.435,0,1,1-20.264.007,1.693,1.693,0,0,1,2.461.541l1.111,1.976a1.687,1.687,0,0,1-.464,2.18A11.812,11.812,0,1,0,25.024,8.5a1.677,1.677,0,0,1-.457-2.173l1.111-1.976A1.685,1.685,0,0,1,28.125,3.8ZM20.813,18.563V1.688A1.683,1.683,0,0,0,19.125,0h-2.25a1.683,1.683,0,0,0-1.687,1.688V18.563a1.683,1.683,0,0,0,1.688,1.688h2.25A1.683,1.683,0,0,0,20.813,18.563Z" transform="translate(-0.563)" fill="#ECF0F1" />
			</svg>
			<p class="logoutText" style="margin-right: 20px;">Logout</p>
		</button>
	</div>
	<div class="historyContainer">
		<div class="headerContainer">
			<button class="homeButton">
				<h1 class="yellow varela">gather.owl</h1>
			</button>
		</div>
		<div class="headerTransaction">
			<h2 style="color: #ecf0f1;">Top-Up History</h2>
		</div>
		<div class="transHistoryWrapper" style="width: 75%; margin-left: 1vw;margin-bottom: 2vw;">
			<div class="transHistoryContainer" style="height: 70vh;">
				<div class="headerTable">
					<h4 class="white" style="margin-left: 2vw;">ID History</h4>
					<h4 class="white" style="margin-left: 10vw;">Top Up</h4>
					<h4 class="white" style="margin-left: 9vw;">Date</h4>
				</div>
				<div class="headerSeparator"></div>
				<?php $ctr3 = 1;
				if (!empty($history)) {
					foreach ($history as $his) { ?>
						<div class="transBlockContainer">
							<div class="transBlock">
								<div class="Date">
									<p style="margin-left: 2vw;"><?= $his['id_history'] ?></p>
								</div>
								<div class="Points">
									<p style="color: #63D99E;margin-left: 3vw;">GP <?= $his['saldo'] ?></p>
								</div>
								<div class="GrandTotal">
									<p style="margin-left: 2.5vw;"><?= date('d/m/Y', strtotime($his['date'])) ?></p>
								</div>
							</div>
						</div>
				<?php $ctr3++;
					}
				} ?>
			</div>
		</div>
		<div class="headerTransaction">
			<h2 style="color: #ecf0f1;">Transaction History</h2>
		</div>
		<div class="transHistoryWrapper" style="margin-bottom: 1vw;">
			<div class="transHistoryContainer">
				<div class="headerTable">
					<h4 class="white" style="margin-left: 2vw;">Date</h4>
					<h4 class="white" style="margin-left: 10vw;">Kode Promo</h4>
					<h4 class="white" style="margin-left: 9vw;">Grand Total</h4>
					<h4 class="white" style="margin-left: 9vw;">Cashback</h4>
					<h4 class="white" style="margin-left: 10vw;">Status</h4>
				</div>
				<div class="headerSeparator"></div>
				<div class="transBlockContainer">
					<?php if (!empty($transaksi)) {
						$ctr = 1;
						foreach ($transaksi as $trans) { ?>
							<div class="transBlock" id="transBlock<?= $ctr ?>" data-toggle="collapse" data-target="#itemBlockContainer<?= $ctr ?>" aria-expanded="false" aria-controls="itemBlockContainer<?= $ctr ?>">
								<div class="Date">
									<p style="margin-left: 2vw;"><?= $trans['tanggal_transaksi'] ?></p>
								</div>
								<div class="PointsUsed">
									<p><?= $trans['id_promo']  ?></p>
								</div>
								<div class="GrandTotal">
									<p>IDR <?= $trans['Gross_Amount'] ?></p>
								</div>
								<div class="CashBack">
									<p>IDR <?= $trans['cashback'] ?></p>
								</div>
								<div class="statusTrans" id="statusTrans<?= $ctr ?>">
								</div>
								<input type="hidden" name="status" id="status<?= $ctr ?>" value="<?= $trans['status'] ?>">
							</div>
							<?php
							foreach ($transaksiItem as $transItem) {
								if ($transItem['id_transaksi'] == $trans['id_transaksi']) {
									foreach ($item as $itm) {
										if ($transItem['id_item'] == $itm['id_item']) {
							?>
											<div class="itemBlockContainer collapse" id="itemBlockContainer<?= $ctr ?>">
												<div class="itemBlock">
													<div class="itemName">
														<p>
															<?= $itm['nama_item'] ?>(<?= $transItem['jumlah'] ?>x)
														</p>
													</div>
													<div class="itemDesc">
														<p style="font-size: 0.8vw;">
															<?= $itm['desc_item'] ?>
														</p>
													</div>
													<div class="Price">
														<p>IDR <?= $transItem['subtotal'] ?></p>
													</div>
													<div class="merchantName">
														<a href="<?= base_url() . "/Shop/viewMerchant/" . $itm['id_merchant'] ?>">
															<?php foreach ($merchant as $mch) {
																if ($itm['id_merchant'] == $mch['id']) {
																	echo $mch['nama'];
																}
															} ?>
														</a>
													</div>
													<div class="game"><strong>
															<?php foreach ($games as $game) {
																if ($itm['id_game'] == $game['id_game']) {
																	echo $game['nama_game'];
																}
															} ?></strong>
													</div>
												</div>
											</div>
							<?php
										}
									}
								}
							} ?>
					<?php $ctr++;
						}
					} ?>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			var ctr = 1;
			var ada = true;
			while (ada) {
				if ($("#status" + ctr).length) {
					var status = $("#status" + ctr).val();
					if (status == 1) {
						$("#statusTrans" + ctr).css("background-color", "#42b77c");
						$("#statusTrans" + ctr).append("<p>Successful</p>");
					} else if (status == 2) {
						$("#statusTrans" + ctr).css("background-color", "#F25757");
						$("#statusTrans" + ctr).append("<p>Failed</p>");
					} else {
						$("#statusTrans" + ctr).append("<p>Pending</p>");
					}
					ctr++;
				} else ada = false;
			}
			ada = true;
			ctr = 1;
			while (ada) {
				if ($("#inputPoints" + ctr).length) {
					var status = $("#inputPoints" + ctr).val();
					if (status == 1) {
						$("#statusPoints" + ctr).css("background-color", "#42b77c");
						$("#statusPoints" + ctr).append("<p>Successful</p>");
					} else if (status == 2) {
						$("#statusPoints" + ctr).css("background-color", "#F25757");
						$("#statusPoints" + ctr).append("<p>Failed</p>");
					} else {
						$("#statusPoints" + ctr).append("<p>Pending</p>");
					}
					ctr++;
				} else ada = false;
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


		$(".homeButton").click(function() {
			window.location.href = '<?= base_url(); ?>Shop/unsetGame/';
		});

		$(".backtoShop").click(function() {
			window.location.href = '<?= base_url(); ?>Shop/viewProfile/';
		});
	</script>
</body>

</html>