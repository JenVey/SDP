<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>gather.owl - History</title>
	<link rel="icon" href="<?php echo base_url(); ?>asset/Images/android-chrome-512x512.png">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/bootstrap.css">
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
			</div>
		</div>
		<h6 style="opacity: 0.4;">username</h6>
		<div class="inputContainer">
			<label for="nameProfile" class="placeholderName">
				<p style="margin-bottom: 1px; font-size: 14px;">Name</p>
			</label>
			<input type="text" name="nameProfile" id="nameProfile" value="Yosua Yuwono" readonly>
		</div>
		<div class="inputContainer">
			<label for="phoneNum" class="placeholderName">
				<p style="margin-bottom: 1px; font-size: 14px;">Phone Number</p>
			</label>
			<input type="number" name="phoneNum" id="phoneNum" readonly>
		</div>
		<div class="inputContainer">
			<label for="passProfile" class="placeholderName">
				<p style="margin-bottom: 1px; font-size: 14px;">Password</p>
			</label>
			<input type="password" name="passProfile" id="passProfile" readonly>
		</div>
		<div class="inputContainer">
			<label for="emailProfile" class="placeholderName">
				<p style="margin-bottom: 1px; font-size: 14px;">E-mail</p>
			</label>
			<input type="email" name="emailProfile" id="emailProfile" readonly>
		</div>
		<button class="backShop">Back to Shop</button>
		<button class="logout">Logout</button>
	</div>
	<div class="historyContainer">
		<div class="headerContainer">
			<button class="homeButton">
				<h1 class="yellow varela">gather.owl</h1>
			</button>
		</div>
		<div class="headerTransaction">
			<h2 style="color: #ecf0f1;">Points History</h2>
		</div>
		<div class="transHistoryWrapper" style="width: 75%; margin-left: 1vw;margin-bottom: 2vw;">
			<div class="transHistoryContainer">
				<div class="headerTable">
					<h4 class="white" style="margin-left: 2vw;">Date</h4>
					<h4 class="white" style="margin-left: 10vw;">Amount</h4>
					<h4 class="white" style="margin-left: 9vw;">Annotation</h4>
					<h4 class="white" style="margin-left: 10vw;">Status</h4>
				</div>
				<div class="headerSeparator"></div>
				<div class="transBlockContainer">
					<div class="transBlock">
						<div class="Date">
							<p style="margin-left: 2vw;">18 October 2020</p>
						</div>
						<div class="Points">
							<p style="color: #63D99E;">GP 30.000</p>
						</div>
						<div class="GrandTotal">
							<p>Tournament Vorhees</p>
						</div>
						<div class="statusTrans" id="statusPoints1" style="margin-left: 0.8vw;">
						</div>
						<input type="hidden" name="status" id="inputPoints1" value="1">
					</div>
				</div>
			</div>
		</div>
		<div class="headerTransaction">
			<h2 style="color: #ecf0f1;">Transaction History</h2>
		</div>
		<div class="transHistoryWrapper" style="margin-bottom: 1vw;">
			<div class="transHistoryContainer">
				<div class="headerTable">
					<h4 class="white" style="margin-left: 2vw;">Date</h4>
					<h4 class="white" style="margin-left: 10vw;">Points Used</h4>
					<h4 class="white" style="margin-left: 9vw;">Grand Total</h4>
					<h4 class="white" style="margin-left: 9vw;">Cashback</h4>
					<h4 class="white" style="margin-left: 10vw;">Status</h4>
				</div>
				<div class="headerSeparator"></div>
				<div class="transBlockContainer">
					<?php if (!empty($transaksi)) {
						$ctr = 1;
						foreach ($transaksi as $trans) { ?>
							<div class="transBlock" id="transBlock<?= $ctr ?>" data-toggle="collapse" data-target="#itemBlockContainer<?= $ctr ?>" aria-expanded="false" aria-controls="itemBlockContainer1">
								<div class="Date">
									<p style="margin-left: 2vw;"><?= $trans['tanggal_transaksi'] ?></p>
								</div>
								<div class="PointsUsed">
									<p>GP <?= $trans['used_point']  ?></p>
								</div>
								<div class="GrandTotal">
									<p>IDR <?= $trans['Gross_Amount'] ?></p>
								</div>
								<div class="CashBack">
									<p>GP <?= $trans['cashback'] ?></p>
								</div>
								<div class="statusTrans" id="statusTrans<?= $ctr ?>">
								</div>
								<input type="hidden" name="status" id="status<?= $ctr ?>" value="<?= $trans['status'] ?>">
							</div>
							<?php
							$ctr2 = 1;
							foreach ($transaksiItem as $transItem) {
								foreach ($item as $itm) {
									if ($transItem['id_item'] == $itm['id_item']) {
							?>
										<div class="itemBlockContainer collapse" id="itemBlockContainer<?= $ctr2 ?>">
											<div class="itemBlock">
												<div class="itemName">
													<p>
														<?= $itm['nama_item'] ?>(3x)
													</p>
												</div>
												<div class="itemDesc">
													<p style="font-size: 0.8vw;">
														<?= $itm['desc_item'] ?>
													</p>
												</div>
												<div class="Price">
													<p>IDR <?= $itm['harga_item'] ?></p>
												</div>
												<div class="merchantName">
													<a href="#">
														<?php foreach ($merchant as $mch) {
															if ($itm['id_merchant'] == $mch['id_merchant']) {
																echo $mch['nama_merchant'];
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
							<?php $ctr2++;
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
			$(".logout").html("Don't go :(");
		});
		$(".logout").mouseout(function() {
			$(".logout").html("Logout");
		});
	</script>
</body>

</html>