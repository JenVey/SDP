<!doctype html>
<html>

<head>
	<meta charset="utf-8">
	<title>Verifying Item</title>


	<link rel="icon" href="<?php echo base_url(); ?>asset/Images/android-chrome-512x512.png">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/Ours.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/verifyMerchant.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/animation.css">
	<script src="<?php echo base_url(); ?>asset/Js/jquery-min.js"></script>
	<script src="<?php echo base_url(); ?>asset/Js/bootstrap.js"></script>
</head>
<?php
$idM = $_GET['idM'];
?>

<body>
	<div class="container">
		<div class="containerWrapper">
			<h2 class="yellow varela" style="text-align: left;">Item Purchase Verification</h2>
			<h4 class="varela" style="color: #ECF0F1; margin: 2vw 0;">Customer's email : <span class="yellow"> <?php foreach ($user as $usr) {
																													if ($usr['id_user'] == $transaksi["id_user"]) {
																														echo $usr['email_user'];
																													}
																												} ?></span></h4>
			<p class="yellow" style="position: absolute;right: 20px;top: 20px;">*You can choose more than one picture</p>
			<?php $ctr = 1;
			foreach ($transaksiItem as $transItem) {
				if ($transItem['id_transaksi'] == $transaksi['id_transaksi']) {
					foreach ($item as $itm) {
						if ($itm['id_item'] == $transItem['id_item']) {
							if ($itm['id_merchant'] == $idM) { ?>
								<div class="item" id="<?= $ctr ?>">
									<div class="itemWrapper">
										<h3 class="yellow" style="width: 40%; word-wrap: wrap; text-align: left;"><?= $itm['nama_item'] ?></h3>
										<input type="file" name="file" id="file1" accept="image/x-png,image/jpg,image/jpeg" class="inputfile" data-multiple-caption="{count} files selected" multiple />
										<label for="file1"><span>Choose a file</span></label>
										<div>
											<svg id="cancel1" class="cancel" xmlns="http://www.w3.org/2000/svg" width="48.444" height="48.445" viewBox="0 0 48.444 48.445">
												<path id="Icon_material-cancel" data-name="Icon material-cancel" d="M27.222,3A24.222,24.222,0,1,0,51.445,27.222,24.2,24.2,0,0,0,27.222,3ZM39.334,35.918l-3.415,3.415-8.7-8.7-8.7,8.7-3.415-3.415,8.7-8.7-8.7-8.7,3.415-3.415,8.7,8.7,8.7-8.7,3.415,3.415-8.7,8.7Z" transform="translate(-3 -3)" fill="#ecf0f1" />
											</svg>
											<svg style="margin-left: 2vw;" id="accept1" class="accept" xmlns="http://www.w3.org/2000/svg" width="48.66" height="48.66" viewBox="0 0 48.66 48.66">
												<path id="Icon_awesome-check-circle" data-name="Icon awesome-check-circle" d="M49.222,24.892A24.33,24.33,0,1,1,24.892.563,24.33,24.33,0,0,1,49.222,24.892ZM22.078,37.775,40.129,19.724a1.57,1.57,0,0,0,0-2.22l-2.22-2.22a1.57,1.57,0,0,0-2.22,0L20.968,30.005,14.1,23.132a1.57,1.57,0,0,0-2.22,0l-2.22,2.22a1.57,1.57,0,0,0,0,2.22l10.2,10.2A1.57,1.57,0,0,0,22.078,37.775Z" transform="translate(-0.563 -0.563)" fill="#ecf0f1" />
											</svg>
										</div>
									</div>
								</div>
			<?php $ctr++;
							}
						}
					}
				}
			} ?>
		</div>
	</div>
	<object id="svg" data="<?= base_url() ?>asset/Images/SVG/undraw_empty.svg" type="image/svg+xml"></object>
	<svg id="message" xmlns="http://www.w3.org/2000/svg" width="921" height="205" viewBox="0 0 921 205">
		<text id="All_set_and_done_" data-name="All set and done!" transform="translate(0 146)" fill="#fff" font-size="185" font-family="Cookie-Regular, Cookie">
			<tspan x="0" y="0">All set and done!</tspan>
		</text>
	</svg>
	<script src="<?= base_url(); ?>asset/Js/bootbox.js"></script>
	<script>
		var ctr = 1;
		$(document).ready(function() {
			var ada = true;
			while (ada) {
				if ($("#" + ctr).length) {
					ctr++;
				} else ada = false;
			}
			ctr--;
			$("#svg").css("display", "none");
			$("#message").css("display", "none");

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

		var timer;

		$(".cancel").click(function() {
			var parent = $(this).parent().parent().parent();
			bootbox.prompt({
				title: "Reason : ",
				inputType: 'textarea',
				callback: function(result) {
					parent.addClass('fadeOutLeft animated');
					timer = setTimeout('$(".fadeOutLeft").css("display","none");', 1000);
					ctr--;
					if (ctr == 0) {
						$(".container").addClass("fadeOut animated");
						timer = setTimeout(ending, 1000);
					}
				}
			});
		});

		$(".accept").click(function() {
			$(this).parent().parent().parent().addClass('fadeOutRight animated');
			timer = setTimeout('$(".fadeOutRight").css("display","none");', 1000);
			ctr--;
			if (ctr == 0) {
				$(".container").addClass("fadeOut animated");
				timer = setTimeout(ending, 1000);
			}

		});

		function ending() {
			$(".container").css("display", "none");
			$("object").addClass("fadeIn animated");
			$("#message").addClass("fadeIn animated");
			timer = setTimeout(function() {
				$("object").css("display", "block");
				$("#message").css("display", "block");
				timer = setTimeout('window.location.href = "<?= base_url() ?>Login";', 3000);
			}, 1000);
		}
	</script>
</body>

</html>