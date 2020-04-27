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
	<script src="<?php echo base_url(); ?>asset/Js/jquery-min.js"></script>
	<script src="<?php echo base_url(); ?>asset/Js/bootstrap.js"></script>
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
		<div class="profileImg"><img class="profileImg" src="data:image/jpeg;base64,<?= base64_encode($user['foto']) ?>" width="50" height="50" alt="" /></div>
		<div class="profileStats">
			<!-- Max Line 10 -->
			<h5 class="profileName"><?= $user['nama_user'] ?></h5>
			<h6 class="profileBalance">IDR <?= ceil($user['saldo']) ?></h6>
		</div>
		<button class="TopUp">
			<svg xmlns="http://www.w3.org/2000/svg" width="20.271" height="28" viewBox="0 0 25.271 33">
				<path id="Icon_metro-money" data-name="Icon metro-money" d="M24.3,20.91c-5.632-1.082-7.443-2.191-7.443-3.932,0-2,2.494-3.4,6.7-3.4,4.416,0,6.054,1.558,6.2,3.85h5.483c-.161-3.162-2.779-6.041-7.964-6.985V6.427H19.831v3.96c-4.813.779-8.684,3.071-8.684,6.618,0,4.235,4.751,6.343,11.661,7.572,6.215,1.1,7.443,2.7,7.443,4.427,0,1.256-1.2,3.272-6.7,3.272-5.111,0-7.133-1.7-7.394-3.85H10.688c.31,4.015,4.367,6.261,9.143,7.022v3.978h7.443V35.485c4.826-.687,8.684-2.75,8.684-6.517,0-5.188-6.029-6.967-11.661-8.057Z" transform="translate(-10.688 -6.427)" fill="#63d99e" />
			</svg>
			<h6 class="TopupText">Top-Up</h6>
		</button>
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
							<h5 class="itemName yellow"><?= $crt['nama_item'] ?></h5>
							<a href="<?= base_url(); ?>/Shop/viewMerchant/<?= $crt['id_merchant'] ?>" class="merchantName"><?= $crt['nama_merchant'] ?></a>
							<div class="itemDesc">
								<p><?= $crt['deskripsi'] ?></p>
							</div>
						</div>
						<div class="price">
							<h4 id="item<?= $ctr ?>Price" class="yellow">IDR <?= $crt['harga'] ?></h4>
						</div>
						<div class="amount">
							<h4 id="item<?= $ctr ?>Amount" class="yellow"><?= $crt['jumlah'] ?>/<?= $crt['stok'] ?></h4>
							<div class="minplusButton">
								<button class="amountBut" onClick="addAmount(<?= $ctr ?>	,0)">
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
							<h4 id="item<?= $ctr ?>Subtotal" style="color:#63D99E; ">IDR <?= $crt['subtotal'] ?></h4>
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
			checkSufficient(grandtotal);
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

		$(".backtoMenu").click(function() {
			window.location.href = '<?= base_url(); ?>MainMenu';
		});

		$(".back").click(function() {
			window.location.href = '<?= base_url(); ?>Shop/unsetGame/';
		});
	</script>
</body>

</html>