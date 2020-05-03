<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>gather.owl - Cart</title>
	<link rel="icon" href="<?php echo base_url(); ?>asset/Images/android-chrome-512x512.png">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/shopCSS.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/Ours.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/cartCSS.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/checkBox.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/animation.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/alerts.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/alertify.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/themes/default.css">

	<script src="<?php echo base_url(); ?>asset/Js/jquery-min.js"></script>
	<script src="<?php echo base_url(); ?>asset/Js/bootstrap.js"></script>
	<script src="<?php echo base_url(); ?>asset/Js/alertify.js"></script>
	<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-3P7SuUbxsTWXgTf3"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
</head>

<body>
	<div class="accList">
		<button class="backtoMenu">
			<svg xmlns="http://www.w3.org/2000/svg" width="35" height="27.5" viewBox="0 0 40 32.5">
				<g id="icon" transform="translate(0 -4.785)">
					<path id="Path_1402" data-name="Path 1402" d="M39.144,37.285a.871.871,0,0,1-.793-.657h0c-.1-.3-2.573-7.328-11.823-8.721a50.176,50.176,0,0,0-7.037-.475V36.2a1.159,1.159,0,0,1-.456.965.714.714,0,0,1-.882-.063L.381,21.941a1.191,1.191,0,0,1-.381-.9,1.2,1.2,0,0,1,.381-.906L18.16,4.971a.7.7,0,0,1,.882-.055,1.147,1.147,0,0,1,.454.954v8.156c3.866.638,20.5,4.427,20.5,22.18a1.059,1.059,0,0,1-.688,1.068A.84.84,0,0,1,39.144,37.285Z" fill="#f25757" />
				</g>
			</svg>
			<h5 class="backText">Back to menu</h5>
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

	<div class="profile">
		<div class="wrapProfile" style="display: flex;overflow: hidden; height:100%;width: 100%; align-items: center;">
			<div class="profileImg"><img class="profileImg" src="data:image/jpeg;base64,<?= base64_encode($user['foto']) ?>" width="50" height="50" alt="" /></div>
			<div class="profileStats">
				<!-- Max Line 10 -->
				<h5 class="profileName"><?= $user['nama_user'] ?></h5>
				<h6 class="profileBalance">GP <?= ceil($user['saldo']) ?></h6>
			</div>
		</div>
	</div>
	<div class="bodyContainer">
		<div style="text-align: left; margin-left: 3vw;">
			<button class="back">
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
							<h5 class="itemName yellow" id="item<?= $ctr ?>Name" nama="<?= $crt['nama_item'] ?>"><?= $crt['nama_item'] ?></h5>
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

			<div class="cartItemWrapper">
				<div class="grandTotalContainer">
					<div class="grandTotalWrapper">
						<div class="total">
							<div class="pembeda">
								<h4 style="color: #ecf0f1; margin-left: 5.8vw;">Grand Total :</h4>
								<h4 class="GrandTotal">IDR 54.000.000</h4>
							</div>
							<div class="pembeda">
								<h4 style="color: #ecf0f1; margin-left: 5vw;">Your Balance :</h4>
								<h4 class="balance yellow" style="margin-left: 3vw;">IDR <?= $user['saldo'] ?></h4>
							</div>
						</div>
						<button class="checkOut">
							<h6>Checkout</h6>
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<form id="payment-form" method="post" action="<?= site_url() ?>Shop/finish/bank">
		<input type="hidden" name="result_data" id="result-type" value=""></div>
		<input type="hidden" name="result_data" id="result-data" value=""></div>
		<input type="hidden" name="total" id="total" value=""></div>
	</form>
	<div id="bodyTrans">
		<h2 class="header">What kind of payment?</h2>
		<div class="pilihTrans" id="pilihCredit">
			<svg style="margin-top: 10vw;" xmlns="http://www.w3.org/2000/svg" width="118.755" height="84.674" viewBox="0 0 118.755 84.674">
				<path id="Icon_metro-credit-card" data-name="Icon metro-credit-card" d="M110.192,5.784H13.7c-6.123,0-11.133,4.763-11.133,10.584V79.874c0,5.821,5.01,10.584,11.133,10.584h96.488c6.123,0,11.133-4.763,11.133-10.584V16.368c0-5.821-5.01-10.584-11.133-10.584ZM13.7,12.84h96.488a3.672,3.672,0,0,1,3.711,3.528V26.953H9.993V16.368A3.672,3.672,0,0,1,13.7,12.84ZM110.192,83.4H13.7a3.672,3.672,0,0,1-3.711-3.528V48.121H113.9V79.874a3.672,3.672,0,0,1-3.711,3.528ZM17.415,62.234h7.422V76.346H17.415Zm14.844,0h7.422V76.346H32.259Zm14.844,0h7.422V76.346H47.1Z" transform="translate(-2.57 -5.784)" fill="#D7C13F" />
			</svg>
			<h2 class="yellow" style="margin-top: 4vw;">Credit Card</h2>
		</div>
		<div class="pilihTrans" id="pilihBalance">
			<svg style="margin-top: 8.5vw;" xmlns="http://www.w3.org/2000/svg" width="117" height="117" viewBox="0 0 117 117">
				<path id="Subtraction_1" data-name="Subtraction 1" d="M58.5,117A58.515,58.515,0,0,1,35.729,4.6,58.515,58.515,0,0,1,81.271,112.4,58.135,58.135,0,0,1,58.5,117ZM46.255,43.083A14.744,14.744,0,0,0,35.1,47.94a16.522,16.522,0,0,0-4.546,11.651,15.532,15.532,0,0,0,4.427,11.054,14.351,14.351,0,0,0,10.742,4.641c.83,0,1.627-.024,2.369-.071.769-.05,1.411-.1,1.962-.144a15.353,15.353,0,0,0,1.77-.263c.586-.12,1.082-.22,1.436-.287a12.738,12.738,0,0,0,1.34-.359c.557-.175.919-.3,1.076-.359s.551-.211,1.076-.407c.554-.206.868-.326.933-.358.794-.318,1.2-.608,1.2-.862a4.761,4.761,0,0,0-.335-.957,4.378,4.378,0,0,1-.335-1.675c0-.061-.022-.441-.072-1.268-.048-.783-.072-1.515-.072-2.177,0-1.905.161-2.984.479-3.206a8.251,8.251,0,0,1,1.46-.551,6.389,6.389,0,0,1,1.316-.31c.127,0,.191-.242.191-.718a2.131,2.131,0,0,0-.1-.67c-3.276.164-4.918.239-5.168.239-.091,0-2.025-.074-6.269-.239a1.16,1.16,0,0,0-.192.789c0,.4.064.6.192.6a11.088,11.088,0,0,1,2.129.287c.9.19,1.428.447,1.555.765a14.083,14.083,0,0,1,.382,4.116v.335l.048,3.924c0,.381-.113.622-.335.717a14.06,14.06,0,0,1-6.221,1.053,10.649,10.649,0,0,1-4.863-1.118,11.979,11.979,0,0,1-3.966-3.355,15.964,15.964,0,0,1-.311-19.6A9.841,9.841,0,0,1,46.4,45.093a11.9,11.9,0,0,1,6.675,1.639,7.371,7.371,0,0,1,3.087,4.917c.1.159.3.239.622.239.666,0,1-.241,1-.717,0-.314-.062-2.255-.191-5.934C52.325,43.808,48.509,43.083,46.255,43.083ZM70.61,74.9c.947,0,3.04.081,6.221.239a2.311,2.311,0,0,0,.1-.718c0-.444-.064-.67-.192-.67a9.619,9.619,0,0,1-2.082-.382c-.968-.254-1.54-.593-1.7-1.005a13.99,13.99,0,0,1-.383-4.163V51.122c0-1.519.024-2.678.072-3.445a8.36,8.36,0,0,1,.167-1.459.457.457,0,0,1,.335-.359,13.1,13.1,0,0,1,3.35-.335,5.382,5.382,0,0,1,4.594,1.985,8.841,8.841,0,0,1,1.483,5.384,7.14,7.14,0,0,1-1.723,4.784,5.274,5.274,0,0,1-4.115,2.011,9.3,9.3,0,0,1-3.206-.527.082.082,0,0,0-.037-.01c-.045,0-.081.051-.107.153a1.31,1.31,0,0,0,.144,1.1c.666.889,1.906,1.34,3.685,1.34a9.5,9.5,0,0,0,4.33-.981,8.826,8.826,0,0,0,3.087-2.488,12.192,12.192,0,0,0,1.746-3.11,8.609,8.609,0,0,0-.358-7.105,7.227,7.227,0,0,0-2.465-2.728,12.443,12.443,0,0,0-3.11-1.436,11.109,11.109,0,0,0-3.182-.479c-.915,0-2.042.032-3.35.1s-2.457.1-3.4.1l-5.742-.1a1.2,1.2,0,0,0-.192.813c0,.381.064.574.192.574a8.3,8.3,0,0,1,1.89.336c.841.222,1.316.464,1.411.717a18.1,18.1,0,0,1,.336,4.116V68.157c0,2.6-.113,4.118-.336,4.5-.159.286-.642.528-1.436.718a8.664,8.664,0,0,1-1.866.287c-.1,0-.144.209-.144.622a1.5,1.5,0,0,0,.144.861Z" fill="#d7c13f" />
			</svg>
			<h2 class="yellow" style="margin-top: 4vw;">Own Balance</h2>
			<h5 style="margin-top: 2vw;color: #ecf0f1;">Current Balance : <span style="color: #63D99E;">GP 15.000</span></h25>
		</div>
	</div>
	<div class="bgblur" hidden></div>
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
			var balance = $(".balance").html();
			balance = balance.substring(4, balance.length);
			$(".balance").html("IDR " + addCommas(balance));

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
			$(".GrandTotal").html("IDR " + addCommas(grandtotal));

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
		$(".checkOut").click(function() {
			$(".bgblur").attr("hidden", false);
			$("#bodyTrans").css("display", "flex");
			$("#bodyTrans").addClass("slideInDown");
			$('body').css("overflow", "hidden");
		});

		$("#pilihBalance").click(function() {
			alertify.confirm('Balance Payment', 'Are you sure?',
				function() {
					var grandtotal = $(".GrandTotal").html();
					grandtotal = grandtotal.replace(/[^a-z0-9\s]/gi, '');
					grandtotal = grandtotal.substring(4, grandtotal.length);
					saldo = '<?= ceil($user['saldo']) ?>';

					saldo = parseInt(saldo);
					alert(saldo);
					alert(grandtotal);
					$(".bgblur").trigger("click");

					if (saldo < grandtotal) {
						alert('tidakkk');
						alertify.error('Insufficient Balance');
					} else {
						$("#total").val(grandtotal);
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
								window.location.href = '<?= base_url(); ?>Shop';
							}
						});


					}
				},
				function() {
					alertify.error('Payment Cancelled');
					$(".bgblur").trigger("click");
				}).set('labels', {
				ok: 'Yes!',
				cancel: 'Nope!'
			});
		});

		$("#pilihCredit").click(function() {
			alertify.confirm('Credit Card Payment', 'Are you sure?',
				function() {
					$(".bgblur").trigger("click");
					event.preventDefault();
					$(this).attr("disabled", "disabled");

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

					var grandtotal = $(".GrandTotal").html();
					grandtotal = grandtotal.replace(/[^a-z0-9\s]/gi, '');
					grandtotal = grandtotal.substring(4, grandtotal.length);
					var gross_amount = grandtotal;
					$("#total").val(grandtotal);
					total = $("#total").val();

					nama = $(".profile").attr("nama");
					phone = $(".profile").attr("phone");
					email = $(".profile").attr("email");
					$.ajax({
						method: 'POST',
						url: '<?= base_url() ?>Midtrans/snap/token',
						data: {
							cart: cartt,
							gross_amount: gross_amount,
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
								for (var i = 0; i < cart.length; i++) {
									$('<input>').attr({
										type: 'hidden',
										name: 'cart[]',
										value: cart[i]["id"]
									}).appendTo('#payment-form');
								}
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

				},
				function() {
					alertify.error('Payment Cancelled');
					$(".bgblur").trigger("click");
				}).set('labels', {
				ok: 'Yes!',
				cancel: 'Nope!'
			});
		});

		$(".bgblur").click(function() {
			$(".bgblur").attr("hidden", true);
			$("#bodyTrans").css("display", "none");
			$("#bodyTrans").attr("class", "");
			$('body').css("overflow-y", "auto");
		});
	</script>
</body>

</html>