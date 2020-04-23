<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>gather.owl - Item</title>
    <link rel="icon" href="<?php echo base_url(); ?>asset/Images/android-chrome-512x512.png">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/shopCSS.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/itemCSS.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/Ours.css">
    <script src="<?php echo base_url(); ?>asset/Js/jquery-min.js"></script>
    <script src="<?php echo base_url(); ?>asset/Js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>asset/Js/textFit.js"></script>
</head>

<body>
    <div class="accList">
        <button class=" backtoMenu">
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
            <!--
			<div class="noAccItem">
				<h5>This is where all of your beloved merchants will be displayed</h5>
			</div>
                -->
            <?php foreach ($merchantF as $mchF) : ?>
                <div class="accItem" value="<?= $mchF['id'] ?>">
                    <div class="profileImg" style="margin-left: 0;"><img class="profileImg" src="<?php base_url(); ?>asset/Images/R6.jpg" width="50" height="50" alt="" /></div>
                    <div class="profileStats">
                        <h6 class="profileName"> <?= $mchF['nama'] ?> </h6>
                        <h6 class="profileBalance" style="float: left;"><?= $mchF['rating'] ?></h6>
                        <svg style="float: left;margin-top: 5px;" xmlns="http://www.w3.org/2000/svg" width="10.125" height="8.62" viewBox="0 0 35.125 33.62">
                            <path class="solid_star" data-name="solid star" d="M36.178,1.157,31.891,9.85l-9.592,1.4a2.1,2.1,0,0,0-1.162,3.585l6.94,6.762-1.641,9.553a2.1,2.1,0,0,0,3.046,2.213l8.581-4.51,8.581,4.51a2.1,2.1,0,0,0,3.046-2.213L48.048,21.6l6.94-6.762a2.1,2.1,0,0,0-1.162-3.585l-9.592-1.4L39.947,1.157a2.1,2.1,0,0,0-3.769,0Z" transform="translate(-20.5 0.013)" fill="#d7c13f" />
                        </svg>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="profile">
        <div class="profileImg"><img class="profileImg" src="../R6.jpg" width="50" height="50" alt="" /></div>
        <div class="profileStats">
            <!-- Max Line 10 -->
            <h5 class="profileName"><?= $user['nama_user'] ?></h5>
            <h6 class="profileBalance">IDR <?= $user['saldo'] ?></h6>
        </div>
        <button class="TopUp">
            <svg xmlns="http://www.w3.org/2000/svg" width="20.271" height="28" viewBox="0 0 25.271 33">
                <path id="Icon_metro-money" data-name="Icon metro-money" d="M24.3,20.91c-5.632-1.082-7.443-2.191-7.443-3.932,0-2,2.494-3.4,6.7-3.4,4.416,0,6.054,1.558,6.2,3.85h5.483c-.161-3.162-2.779-6.041-7.964-6.985V6.427H19.831v3.96c-4.813.779-8.684,3.071-8.684,6.618,0,4.235,4.751,6.343,11.661,7.572,6.215,1.1,7.443,2.7,7.443,4.427,0,1.256-1.2,3.272-6.7,3.272-5.111,0-7.133-1.7-7.394-3.85H10.688c.31,4.015,4.367,6.261,9.143,7.022v3.978h7.443V35.485c4.826-.687,8.684-2.75,8.684-6.517,0-5.188-6.029-6.967-11.661-8.057Z" transform="translate(-10.688 -6.427)" fill="#63d99e" />
            </svg>
            <h6 class="TopupText">Top-Up</h6>
        </button>
    </div>

    <div class="bodyContainer">

    </div>
    <script>
        $(".backtoMenu").click(function() {
            window.location.href = '<?= base_url(); ?>MainMenu';
        });

        $(".homeButton").click(function() {
            window.location.href = '<?= base_url(); ?>Shop';
        });
    </script>
</body>

</html>