<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>gather.owl - Cart</title>
	<link rel="icon" href="<?php echo base_url(); ?>asset/Images/android-chrome-512x512.png">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/shopCSS.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/Ours.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/historyCSS.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/cartCSS.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/checkBox.css">
	<link rel=" stylesheet" href="<?php echo base_url(); ?>asset/CSS/animation.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/alerts.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/alertify.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/themes/default.css">

	<script src="<?php echo base_url(); ?>asset/Js/jquery-min.js"></script>
	<script src="<?php echo base_url(); ?>asset/Js/bootstrap.js"></script>
	<script src="<?php echo base_url(); ?>asset/Js/alertify.js"></script>
	<script src="<?php echo base_url(); ?>asset/Js/bootbox.js"></script>
	<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-3P7SuUbxsTWXgTf3"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>

<body>
	<div class="accList">
		<button class="backtoMenu">
			<svg xmlns="http://www.w3.org/2000/svg" width="66.147" height="34.478" viewBox="0 0 66.147 34.478">
				<g id="Group_197" data-name="Group 197" transform="translate(-160.188 89.73)">
					<g id="Group_194" data-name="Group 194" transform="translate(161.205 -88.73)">
						<path id="Path_1941" data-name="Path 1941" d="M180.46-63.507S164.484-59.5,161.455-73.551l-.25-15.179h16s6.628.129,14.753,9.178l-2.993,3.241s-6.271-7.509-11.759-8.279l-11.368-.065.107,11.007s2.174,8.183,11.8,6.771Z" transform="translate(-161.205 88.73)" fill="#d6b329" stroke="#1e2126" stroke-miterlimit="10" stroke-width="2" />
						<path id="Path_1942" data-name="Path 1942" d="M207.553-73.278l4.026,5.407L203.5-56.928,195.33-67.839s13.328-20.666,24.232-20.891h15.965v14.7S233.6-59.977,216.248-63.378l2.815-3.466S229.5-65.4,230.966-74.1L230.93-84.59H219.562s-5.488-.417-18.958,16.655l2.9,3.9,2.822-3.733-1.684-2.307Z" transform="translate(-171.397 88.73)" fill="#d6b329" stroke="#1e2126" stroke-miterlimit="10" stroke-width="2" />
					</g>
					<g id="Group_195" data-name="Group 195" transform="translate(205.237 -82.496)">
						<ellipse id="Ellipse_189" data-name="Ellipse 189" cx="2.247" cy="2.156" rx="2.247" ry="2.156" transform="translate(3.923)" fill="#1a1818" stroke="#d6b329" stroke-miterlimit="10" stroke-width="0.25" />
						<ellipse id="Ellipse_190" data-name="Ellipse 190" cx="2.247" cy="2.156" rx="2.247" ry="2.156" transform="translate(7.995 4.312)" fill="#1a1818" stroke="#d6b329" stroke-miterlimit="10" stroke-width="0.25" />
						<ellipse id="Ellipse_191" data-name="Ellipse 191" cx="2.247" cy="2.156" rx="2.247" ry="2.156" transform="translate(0 4.312)" fill="#1a1818" stroke="#d6b329" stroke-miterlimit="10" stroke-width="0.25" />
						<ellipse id="Ellipse_192" data-name="Ellipse 192" cx="2.247" cy="2.156" rx="2.247" ry="2.156" transform="translate(3.923 8.236)" fill="#1a1818" stroke="#d6b329" stroke-miterlimit="10" stroke-width="0.25" />
					</g>
					<ellipse id="Ellipse_193" data-name="Ellipse 193" cx="4.119" cy="4.115" rx="4.119" ry="4.115" transform="translate(170.161 -81.779)" fill="#1a1818" stroke="#d6b329" stroke-miterlimit="10" stroke-width="0.25" />
				</g>
			</svg>
			<h5 class="backText">Back to Home</h5>
		</button>
		<div class="titleAccList">
			<div class="hl"></div>
			<h3 style="color: #ecf0f1;">Merchant</h3>
			<div class="hl"></div>
		</div>
		<div class="accItemContainer">
			<?php
			if (count($merchantF) > 0) {
				foreach ($merchantF as $mchF) : ?>
					<div class="accItem" idMerchant="<?= $mchF['id'] ?>">
						<div class="profileImg" style="margin-left: 0;"><img class="profileImg" src="data:image/jpeg;base64,<?= base64_encode($mchF['foto']) ?>" width="50" height="50" alt="" /></div>
						<div class="profileStats">
							<h6 class="profileName"> <?= $mchF['nama'] ?> </h6>
							<?php
							if (isset($mchF['rating'])) {
								echo "<h6 class='profileBalance' style='float: left;'>";
								echo $mchF['rating'];
								echo "</h6>";
								echo "<svg style='float: left;margin-top: 5px;' xmlns='http://www.w3.org/2000/svg' width='10.125' height='8.62' viewBox='0 0 35.125 33.62'>";
								echo "<path class='solid_star' data-name='solid star' d='M36.178,1.157,31.891,9.85l-9.592,1.4a2.1,2.1,0,0,0-1.162,3.585l6.94,6.762-1.641,9.553a2.1,2.1,0,0,0,3.046,2.213l8.581-4.51,8.581,4.51a2.1,2.1,0,0,0,3.046-2.213L48.048,21.6l6.94-6.762a2.1,2.1,0,0,0-1.162-3.585l-9.592-1.4L39.947,1.157a2.1,2.1,0,0,0-3.769,0Z' transform='translate(-20.5 0.013)' fill='#d7c13f' /></svg>";
							} else {
								echo "<h6 class='profileBalance' style='float: left;'>";
								echo "Unrated";
								echo "</h6>";
							}
							?>
						</div>
					</div>
			<?php endforeach;
			} else {
				echo "<div class='noAccItem'>";
				echo "<h5>This is where all of your beloved merchants will be displayed</h5>";
				echo "</div>";
			}
			?>
		</div>
	</div>

	<div class="profile" nama="<?= $user['nama_user'] ?>" phone="<?= $user['phone'] ?>" email="<?= $user['email_user'] ?>">
		<div class="wrapProfile" style="display: flex;overflow: hidden; height:100%;width: 100%; align-items: center;">
			<div class="profileImg"><img class="profileImg" src="data:image/jpeg;base64,<?= base64_encode($user['foto']) ?>" width="50" height="50" alt="" /></div>
			<div class="profileStats">
				<!-- Max Line 10 -->
				<h5 class="profileName"><?= $user['nama_user'] ?></h5>
				<h6 class="profileBalance">GP <?= number_format(ceil($user['saldo']), 0, ".", ".") ?></h6>
			</div>
		</div>
	</div>
	<div class="bodyContainer">
		<div style="text-align: left; margin-left: 3vw;">
			<button class="back" style="background-color: transparent;">
				<svg xmlns="http://www.w3.org/2000/svg" width="21.161" height="31.769" viewBox="0 0 21.161 31.769">
					<path id="Icon_ionic-ios-arrow-back" data-name="Icon ionic-ios-arrow-back" d="M17.63,22.074,31.635,10.063a2.042,2.042,0,0,0,0-3.206,2.977,2.977,0,0,0-3.746,0L12.021,20.466a2.041,2.041,0,0,0-.077,3.13L27.877,37.3a2.981,2.981,0,0,0,3.746,0,2.042,2.042,0,0,0,0-3.206Z" transform="translate(-11.251 -6.194)" fill="#fff" />
				</svg>
			</button>
			<h3 class="titleCart yellow varela">Your Cart</h3>
		</div>
		<div class="cartHeader">
			<div class="headerText" style="color: #ecf0f1;">
				<input type="hidden" id="checkall" value="1" />
				<input type="checkbox" name="checkAll" id="checkAll" />
				<h5 class="headerItem varela">Picture</h5>
				<h5 class="headerDesc varela">Description</h5>
				<h5 class="headerPrice varela">Price</h5>
				<h5 class="headerAmount varela">Amount</h5>
				<h5 class="headerSubtotal varela">Subtotal</h5>
			</div>
			<hr style="background-color: #D7C13F;">
		</div>
		<div class="cartItemContainer">
			<?php
			$ctr = 1;
			foreach ($cart as $crt) : ?>
				<div class="cartItemWrapper" id="item<?= $ctr ?>" idItem='<?= $crt['id_item'] ?>'>
					<!-- isie id item-amount			-->
					<input type="hidden" name="item<?= $ctr ?>Storage" />
					<div class="action">
						<input type="checkbox" name="check<?= $ctr ?>Item" id="check<?= $ctr ?>Item" />
						<button class="removeButton" onClick="removeItem(<?= $ctr ?>)">
							<svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 46 41">
								<g id="Group_191" data-name="Group 191" transform="translate(-15869.5 3007.5)">
									<g id="Group_190" data-name="Group 190" transform="translate(136 -44)">
										<rect id="Rectangle_302" data-name="Rectangle 302" width="43" height="38" rx="8" transform="translate(15735 -2962)" stroke-width="3" stroke="#d7c13f" stroke-linecap="round" stroke-linejoin="bevel" fill="#d7c13f" />
									</g>
									<g id="Icon_feather-trash-2" data-name="Icon feather-trash-2" transform="translate(15876.1 -3004)">
										<path id="Path_1848" data-name="Path 1848" d="M4.5,9H28.052" transform="translate(0 -0.484)" fill="none" stroke="#4c525d" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
										<path id="Path_1849" data-name="Path 1849" d="M25.818,8.516V27.823A2.69,2.69,0,0,1,23.2,30.581H10.117A2.69,2.69,0,0,1,7.5,27.823V8.516m3.925,0V5.758A2.69,2.69,0,0,1,14.042,3h5.234a2.69,2.69,0,0,1,2.617,2.758V8.516" transform="translate(-0.383)" fill="none" stroke="#4c525d" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
										<path id="Path_1850" data-name="Path 1850" d="M15,16.5v8.274" transform="translate(-1.341 -1.088)" fill="none" stroke="#4c525d" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
										<path id="Path_1851" data-name="Path 1851" d="M21,16.5v8.274" transform="translate(-2.107 -1.088)" fill="none" stroke="#4c525d" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
									</g>
								</g>
							</svg>
						</button>
					</div>
					<div class="cartItem">
						<div class="itemImage">
							<img src="data:image/jpeg;base64,<?= base64_encode($crt['foto']) ?>" alt="">
						</div>
						<div class=" itemDescWrapper">
							<h5 class="itemName yellow" style="margin: 0;" id="item<?= $ctr ?>Name" nama="<?= $crt['nama_item'] ?>"><?= $crt['nama_item'] ?></h5>
							<a href="<?= base_url(); ?>/Shop/viewMerchant/<?= $crt['id_merchant'] ?>" class="merchantName"><?= $crt['nama_merchant'] ?></a>
							<div class="itemDesc">
								<p><?= $crt['deskripsi'] ?></p>
							</div>
						</div>
						<div class="price">
							<h4 id="item<?= $ctr ?>Price" class="yellow" harga="<?= $crt['harga'] ?>">IDR <?= $crt['harga'] ?></h4>
						</div>
						<div class="amount">
							<h4 id="item<?= $ctr ?>Amount" class="yellow"><?= $crt['jumlah'] ?>/<?= $crt['stok'] ?></h4>
							<div class="minplusButton">
								<button class="amountBut" onClick="addAmount(<?= $ctr ?>,0)">
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
							<h4 id="item<?= $ctr ?>Subtotal" style="color:#63D99E; " subtotal="<?= $crt['subtotal'] ?>">IDR <?= $crt['subtotal'] ?></h4>
						</div>
					</div>
				</div>
			<?php
				$ctr++;
			endforeach;
			?>

		</div>
		<div class="grandtotalWrapper">
			<div class="grandTotalContainer">
				<div style="width: 100%;display: flex;">
					<h4 style="color: #ecf0f1;margin-left: 2.1vw;">Grand Total : <span class="GrandTotalInput">IDR 0</span></h4>
				</div>
				<div style="width: 100%;display: flex;align-items: center;">
					<input class="input" type="text" name="enterPromo" id="promoCode" maxlength="10" placeholder="Input Promo Code">
					<h4 style="color: #63D99E; margin-left: 0.5vw;"><span style="color: #ecf0f1;"> : </span>
						<span id="cashback">0</span> % Cashback
					</h4>
				</div>
				<button class="checkOut" style="margin-left: 4vw;">
					<h6>Checkout</h6>
				</button>
			</div>
		</div>

		<h3 class="yellow" style="margin: 15vh 0 5vh 0; text-align: center;">Your Ongoing Transaction</h3>
		<div class="transHistoryWrapper" style="margin-bottom: 1vw;text-align: left;">
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
								if ($trans['status'] == 0) { ?>
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
										<input type="hidden" name="status" id="status<?= $ctr ?>" value="0">
									</div>
									<?php
									foreach ($transaksiItem as $transItem) {
										if ($transItem['id_transaksi'] == $trans['id_transaksi']) {
											foreach ($item as $itm) {
												if ($transItem['id_item'] == $itm['id_item']) {
									?>
													<div class="itemBlockContainer collapse" id="itemBlockContainer<?= $ctr ?>">
														<div class="itemBlockContainer">
															<div class="itemBlock" idTrans="<?= $transItem['id_transaksi'] ?>" idItem="<?= $transItem['id_item'] ?>" idMerchant="<?= $itm['id_merchant'] ?>" harga="<?= $transItem['subtotal'] ?>">

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
																				$mchId = $mch['id'];
																				echo $mch['nama'];
																			}
																		} ?></a></div>
																<div class="Price" style="width: 13vw;">
																	<p>IDR <?= number_format(ceil($transItem['subtotal']), 0, ".", ".") ?></p>
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
	<form id="payment-form" method="post" action="<?= site_url() ?>Shop/finish/bank">
		<input type="hidden" name="result_data" id="result-type" value=""></div>
		<input type="hidden" name="result_data" id="result-data" value=""></div>
		<input type="hidden" name="total" id="total" value=""></div>
	</form>
	<div style="display: none;">
		<div id="topUpHeader">
			<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 23.245 15">
				<path id="Icon_material-group-add" data-name="Icon material-group-add" d="M7.748,13.269H4.843V9.808H2.906v3.462H0v2.308H2.906v3.462H4.843V15.577H7.748Zm9.685,1.154a3.209,3.209,0,0,0,2.9-3.462,3.209,3.209,0,0,0-2.9-3.462,2.472,2.472,0,0,0-.881.162,6.47,6.47,0,0,1,.872,3.3,6.6,6.6,0,0,1-.872,3.3A2.472,2.472,0,0,0,17.434,14.423Zm-4.843,0a3.209,3.209,0,0,0,2.9-3.462,3.209,3.209,0,0,0-2.9-3.462,3.216,3.216,0,0,0-2.906,3.462A3.216,3.216,0,0,0,12.591,14.423ZM19,16.915a4.61,4.61,0,0,1,1.337,3.277V22.5h2.906V20.192C23.245,18.415,20.95,17.319,19,16.915Zm-6.412-.185c-1.937,0-5.811,1.154-5.811,3.462V22.5H18.4V20.192C18.4,17.885,14.528,16.731,12.591,16.731Z" transform="translate(0 -7.5)" fill="#d7c13f" />
			</svg>
			<h5 class="yellow" style="margin-left: 1vw;">KODE PROMO</h5>
		</div>
		<div id="topUpBody">
			<h6 style="color: #ecf0f1">Input kode promo </h6>
			<input type="text" name="topUpAmount" id="kodePromo">
		</div>
	</div>
	<script>
		var id = 0;

		var timer = setInterval(addGrandtotal, 1);

		$(document).ready(function() {
			var ctr = 1;
			var ada = true;
			while (ada) {
				if ($("#check" + ctr + "Item").length) {
					ctr++;
				} else {
					ada = false;
				}
			}
			ctr--;
			id = ctr;
			for (i = 1; i <= id; i++) {
				var price = $("#item" + i + "Price").html();
				var amount = $("#item" + id + "Amount").html();
				amount = amount.substring(0, amount.indexOf('/'));
				price = price.substring(4, price.length);
				$("#item" + i + "Price").html("IDR " + addCommas(price));
				var subtotal = price * amount;
				$("#item" + i + "Subtotal").html("IDR " + addCommas(subtotal));
			}


			ada = true;
			ctr = 1;
			while (ada) {
				if ($("#status" + ctr).length) {
					var status = $("#status" + ctr).val();
					if (status == 2) {
						$("#statusTrans" + ctr).css("background-color", "#42b77c");
						$("#statusTrans" + ctr).append("<p>Successful</p>");
					} else if (status == -2 || status == -1) {
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

		});

		function addGrandtotal() {
			var grandtotal = 0;
			for (i = 1; i <= id; i++) {
				if ($("#check" + i + "Item").prop('checked')) {
					var sub = $("#item" + i + "Subtotal").html();
					sub = sub.replace(/[^a-z0-9\s]/gi, '');
					sub = sub.substring(4, sub.length);
					sub = parseInt(sub);
					grandtotal += sub;
				}
			}
			$(".GrandTotalInput").html("IDR " + addCommas(grandtotal));

		}

		$('#checkAll').change(function() {
			if ($(this).prop('checked')) {
				for (var i = 1; i <= id; i++) {
					$("#check" + i + "Item").prop("checked", true);
				}
			} else {
				for (i = 1; i <= id; i++) {
					$("#check" + i + "Item").prop("checked", false);
				}
			}
		});

		function checkSufficient(grandtotal) {
			var balance = $(".balance").html();
			balance = balance.replace(/[^a-z0-9\s]/gi, '');
			balance = balance.substring(4, balance.length);
			balance = parseInt(balance);
			console.log(balance + "|" + grandtotal);
			if (balance < grandtotal || grandtotal == 0) {
				$(".checkOut").prop("disabled", true);
			} else {
				$(".checkOut").prop("disabled", false);
			}
		}

		function addAmount(id, jenis) {
			var amount = $("#item" + id + "Amount").html();
			amount = amount.substring(0, amount.indexOf('/'));
			amount = parseInt(amount);
			var stok = $("#item" + id + "Amount").html();
			stok = stok.substring(stok.indexOf('/') + 1, stok.length);
			stok = parseInt(stok);
			if (jenis == 0) {
				if (amount != 0) amount -= 1;
			} else {
				if (stok > amount) amount += 1;
			}
			$("#item" + id + "Amount").html(amount + "/" + stok);
			var price = $("#item" + id + "Price").html();
			price = price.replace(/[^a-z0-9\s]/gi, '');
			price = price.substring(4, price.length);
			var subtotal = price * amount;
			$("#item" + id + "Subtotal").html("IDR " + addCommas(subtotal));
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

		function removeItem(id) {
			idI = $("#item" + id).attr("idItem");
			$.ajax({
				url: "<?= base_url(); ?>Shop/removeCart",
				method: "post",
				data: {
					idItem: idI
				},
				success: function(result) {
					$("#item" + id).remove();
				}
			});

		}

		$(".wrapProfile").click(function() {
			window.location.href = '<?= base_url(); ?>Shop/viewProfile/'.concat();
		});


		$(".backtoMenu").click(function() {
			window.location.href = '<?= base_url(); ?>MainMenu';
		});

		$(".back").click(function() {
			window.location.href = '<?= base_url(); ?>Shop/unsetGame/';
		});


		//MIDTRANS
		// $(".checkOut").click(function() {
		// 	$(".bgblur").attr("hidden", false);
		// 	$("#bodyTrans").css("display", "flex");
		// 	$("#bodyTrans").addClass("slideInDown");
		// 	$('body').css("overflow", "hidden");
		// });

		$(".checkOut").click(function() {
			alertify.confirm('Balance Payment', 'Are you sure?',
				function() {
					var grandtotal = $(".GrandTotalInput").html();
					grandtotal = grandtotal.replace(/[^a-z0-9\s]/gi, '');
					grandtotal = grandtotal.substring(4, grandtotal.length);
					saldo = '<?= ceil($user['saldo']) ?>';

					saldo = parseInt(saldo);
					//alert(saldo);
					//alert(grandtotal);
					$(".bgblur").trigger("click");

					if (saldo < grandtotal) {
						alertify.error('Insufficient Balance');
					} else {

						if (grandtotal > 0) {
							//$("#total").val(grandtotal);
							total = $("#total").val();

							var cart = [];
							for (var i = 1; i <= id; i++) {
								if ($("#check" + i + "Item").prop('checked')) {
									var amount = $("#item" + i + "Amount").html();
									amount = amount.substring(0, amount.indexOf('/'));
									let obj = {
										id: $("#item" + i).attr("idItem"),
										price: parseInt($("#item" + i + "Price").attr("harga")),
										quantity: parseInt(amount),
										name: $("#item" + i + "Name").attr("nama"),
										subtotal: $("#item" + i + "Subtotal").attr("subtotal")
									}
									cart.push(obj);
								}
							}

							cartt = JSON.stringify(cart);


							$.ajax({
								url: "<?= base_url(); ?>Shop/finish/gp",
								method: "post",
								data: {
									cart: cartt,
									gross_amount: grandtotal
								},
								success: function(result) {
									alertify.success("Success buy item");
									//window.location.href = '<?= base_url(); ?>Shop/viewCart';
								}
							});
						} else {
							alertify.error('No item selected');
							$(".bgblur").trigger("click");
						}

					}
				},
				function() {
					alertify.error('Payment Cancelled');
					$(".bgblur").trigger("click");
				}).set('labels', {
				ok: 'Buy',
				cancel: 'Cancel'
			});
		});

		$("input[name='enterPromo']").on("input", function() {
			kode = $(this).val();
			//alert(kode);
			$.ajax({
				url: "<?= base_url(); ?>Shop/cekPromo/",
				method: "post",
				data: {
					kode: kode
				},
				success: function(result) {
					if (result != 0) {
						$("#cashback").html(result);
					} else {
						$("#cashback").html(0);
					}
				}
			});
		});


		$(".itemBlock").click(function(e) {
			status = $(this).children("[name='statusItem']").val();
			if (status == 0 || status == 1) {
				idTrans = $(this).attr("idTrans");
				idItem = $(this).attr("idItem");
				harga = $(this).attr("harga");
				idMerchant = $(this).attr("idMerchant");

				bootbox.dialog({
					title: "Action",
					message: "<p>Status: <span style='color:#63D99E;'>Waiting for Merchant's Response</span><br>What are you going to do?</p>",
					buttons: {
						cancel: {
							label: "Nothing",
							className: 'back',
							callback: function() {}
						},
						noclose: {
							label: "Chat the Merchant",
							className: 'chatMerchant',
							callback: function() {
								window.location.href = '<?= base_url(); ?>Shop/chatUser/'.concat(idMerchant);
							}
						},
						ok: {
							label: "Cancel the Item",
							className: 'cancel',
							callback: function() {
								bootbox.prompt({
									title: "Reason : ",
									inputType: 'textarea',
									required: true,
									callback: function(result) {
										if (result) {
											keterangan = result;
											bootbox.confirm("Are you sure?", function(result) {
												if (result) {
													$.ajax({
														url: "<?= base_url(); ?>Shop/updateStatusTransItem/-1",
														method: "post",
														data: {
															id_transaksi: idTrans,
															id_item: idItem,
															keterangan: keterangan,
															harga: harga
														},
														success: function(result) {
															window.location.href = '<?= base_url(); ?>Shop/viewCart';
															alertify.success("Successfully Cancelled the item");
														}
													});
												}
											});
										}
									}
								});
							}
						}
					}
				});
			}
		});
	</script>
</body>

</html>