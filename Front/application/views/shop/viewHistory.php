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
<?php

//var_dump($totalItem);

?>

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
					<h4 class="white" style="margin-left: 7vw;">Amount</h4>
					<h4 class="white" style="margin-left: 8.8vw;">Date</h4>
					<h4 class="white" style="margin-left: 10vw;">Status</h4>
				</div>
				<div class="headerSeparator"></div>
				<div class="transBlockContainer">
					<?php $ctr3 = 1;
					if (!empty($history)) {
						foreach ($history as $his) { ?>

							<div class="transBlock">
								<div class="orderID">
									<p style="margin-left: 2vw;"><?= $his['id_history'] ?></p>
								</div>
								<div class="Amount">
									<p style="color: #63D99E; margin-left: 2.3vw;">GP <?= number_format(ceil($his['saldo']), 0, ".", ".")   ?></p>
								</div>
								<div class="Date">
									<p><?= date('d/m/Y', strtotime($his['date'])) ?></p>
								</div>
								<div class="statusTrans" id="statusHis<?= $ctr3 ?>" style="margin-left: 0.3vw;">
								</div>
								<input type="hidden" name="status" id="statusH<?= $ctr3 ?>" value="<?= $his['status'] ?>">
							</div>
					<?php $ctr3++;
						}
					} ?>
				</div>
			</div>
		</div>
		<div class="headerTransaction">
			<h2 style="color: #ecf0f1;">Transaction History</h2>
		</div>
		<div class="transHistoryWrapper" style="margin-bottom: 1vw;">
			<div class="transHistoryContainer">
				<div class="headerTable">
					<h5 class="white" style="margin-left: 2vw;">Order ID</h5>
					<h5 class="white" style="margin-left: 8vw;">Date</h5>
					<h5 class="white" style="margin-left: 10vw;">Kode Promo</h5>
					<h5 class="white" style="margin-left: 6.1vw;">Grand Total</h5>
					<h5 class="white" style="margin-left: 7vw;">CashBack</h5>
					<h5 class="white" style="margin-left: 7vw;">Status</h5>
				</div>
				<div class="headerSeparator"></div>
				<div class="transBlockContainer">
					<?php
					if (!empty($transaksi)) {
						$ctr = 1;
						$ctr2 = 1;
						foreach ($transaksi as $trans) {
							if ($trans['id_user'] == $user['id_user']) {
								if ($trans['status'] == -1 || $trans['status'] == 1) { ?>
									<div class="transBlock" id="transBlock<?= $ctr ?>" data-toggle="collapse" data-target="#itemBlockContainer<?= $ctr ?>" aria-expanded="false" aria-controls="itemBlockContainer1">
										<div class="orderID">
											<p style="margin-left: 2vw;"><?= $trans['id_transaksi']
																			?></p>
										</div>
										<div class="Date">
											<p style="margin-left: 2vw;"><?= date('d/m/Y', strtotime($trans['tanggal_transaksi'])) ?></p>
										</div>
										<div class="kodePromo">
											<p style="margin-left: 2vw;"><?= $trans['kodepromo']  ?></p>
										</div>
										<div class="GrandTotal">
											<p>IDR <?= number_format(ceil($trans['gross_amount']), 0, ".", ".") ?></p>
										</div>
										<div class="CashBack">
											<p>GP <?= number_format(ceil($trans['cashback']), 0, ".", ".") ?></p>
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
														<div class="itemBlockContainer">
															<div class="itemBlock" idTrans="<?= $transItem['id_transaksi'] ?>" idItem="<?= $transItem['id_item'] ?>" harga="<?= $transItem['subtotal'] ?>">
																<div class="itemName" style="width: 12.4vw;">
																	<p>
																		<?= $itm['nama_item'] ?>(<?= $transItem['jumlah'] ?>x)
																	</p>
																</div>
																<div class="itemDesc" style="width: 10vw;margin: 0;">
																	<p style="font-size: 0.8vw;">
																		<?= $itm['desc_item'] ?>
																	</p>
																</div>
																<div class="merchantName" style="margin-left: 2.3vw; width: 10.3vw;">
																	<a><?php foreach ($merchant as $mch) {
																			if ($itm['id_merchant'] == $mch['id']) {
																				echo $mch['nama'];
																			}
																		} ?></a></div>
																<div class="Price" style="width: 13vw;">
																	<p>IDR <?= ceil($transItem['subtotal']) ?></p>
																</div>
																<div class="game" style="width: 11.5vw;">
																	<strong><?php foreach ($games as $game) {
																				if ($itm['id_game'] == $game['id_game']) {
																					echo $game['nama_game'];
																				}
																			} ?>
																	</strong>
																</div>
																<div class="statusTrans" id="statusItemTrans<?= $ctr2 ?>">
																</div>
																<input type="hidden" name="statusItem" id="statusItem<?= $ctr2 ?>" value="<?= $transItem['status'] ?>">
															</div>
														</div>
													</div>

					<?php $ctr2++;
												}
											}
										}
									}
									$ctr++;
								}
							}
						}
					} ?>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function() {
			ada = true;
			ctr = 1;
			while (ada) {
				if ($("#status" + ctr).length) {
					var status = $("#status" + ctr).val();
					if (status == 1) {
						$("#statusTrans" + ctr).css("background-color", "#42b77c");
						$("#statusTrans" + ctr).append("<p>Successful</p>");
					} else if (status == -1) {
						$("#statusTrans" + ctr).css("background-color", "#F25757");
						$("#statusTrans" + ctr).append("<p>Cancelled</p>");
					} else {
						$("#statusTrans" + ctr).css("background-color", "#969BA6");
						$("#statusTrans" + ctr).append("<p>Pending</p>");
					}
					ctr++;
				} else ada = false;
			}
			ada = true;
			ctr = 1;
			while (ada) {
				if ($("#statusItem" + ctr).length) {
					var status = $("#statusItem" + ctr).val();
					if (status == 2) {
						$("#statusItemTrans" + ctr).css("background-color", "#42b77c");
						$("#statusItemTrans" + ctr).append("<p>Successful</p>");
					} else if (status == -2 || status == -1) {
						$("#statusItemTrans" + ctr).css("background-color", "#F25757");
						$("#statusItemTrans" + ctr).append("<p>Cancelled</p>");
					} else {
						$("#statusItemTrans" + ctr).css("background-color", "#969BA6");
						$("#statusItemTrans" + ctr).append("<p>Pending</p>");
					}
					ctr++;
				} else ada = false;
			}
			ada = true;
			ctr = 1;
			while (ada) {
				if ($("#statusH" + ctr).length) {
					var status = $("#statusH" + ctr).val();
					if (status == 1) {
						$("#statusHis" + ctr).css("background-color", "#42b77c");
						$("#statusHis" + ctr).append("<p>Successful</p>");
					} else if (status == -1) {
						$("#statusHis" + ctr).css("background-color", "#F25757");
						$("#statusHis" + ctr).append("<p>Failed</p>");
					} else {
						$("#statusHis" + ctr).append("<p>Pending</p>");
					}
					ctr++;
				} else ada = false;
			}

			createfirstChart();
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


		$(".logout").click(function() {
			window.location.href = '<?= base_url(); ?>Login';
		});


		$(".homeButton").click(function() {
			window.location.href = '<?= base_url(); ?>Shop/unsetGame/';
		});

		$(".backtoShop").click(function() {
			window.location.href = '<?= base_url(); ?>Shop/viewProfile/';
		});


		$("#nextYear").click(function() {
			modifyYear(1);
		});

		$("#prevYear").click(function() {
			modifyYear(-1);
		});

		$("#next10Year").click(function() {
			modifyYear(10);
		});

		$("#prev10Year").click(function() {
			modifyYear(-10);
		});
	</script>
</body>

</html>