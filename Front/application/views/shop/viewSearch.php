<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>gather.owl - Merchant</title>
    <link rel="icon" href="<?php echo base_url(); ?>asset/Images/android-chrome-512x512.png">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/shopCSS.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/itemCSS.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/Ours.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/select.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/alertify.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/alerts.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/themes/default.css">
    <script src="<?php echo base_url(); ?>asset/Js/alertify.js"></script>
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
        <div class="headerContainer">

            <button class="homeButton">
                <h1 class="yellow varela">gather.owl</h1>
            </button>
            <button class="gachaContainer">
                <svg xmlns="http://www.w3.org/2000/svg" width="40.5" height="40.5" viewBox="0 0 110.055 78.793">
                    <path id="solid_box-open" data-name="solid box-open" d="M73.164,71.365a8.3,8.3,0,0,1-7.119-4.115L54.989,48.5,43.95,67.25a8.327,8.327,0,0,1-7.136,4.133,7.745,7.745,0,0,1-2.287-.334L10.97,64.154V95.46a5.588,5.588,0,0,0,4.161,5.452l37.176,9.515a10.935,10.935,0,0,0,5.33,0l37.21-9.515a5.618,5.618,0,0,0,4.161-5.452V64.154L75.451,71.031A7.745,7.745,0,0,1,73.164,71.365Zm36.557-19.733-8.855-18.08a2.794,2.794,0,0,0-2.872-1.565l-43,5.61,15.768,26.75a2.8,2.8,0,0,0,3.181,1.284l34.029-9.937A2.915,2.915,0,0,0,109.721,51.632ZM9.113,33.552.257,51.632a2.885,2.885,0,0,0,1.737,4.045l34.029,9.937A2.8,2.8,0,0,0,39.2,64.33L54.989,37.6l-43.022-5.61A2.8,2.8,0,0,0,9.113,33.552Z" transform="translate(0.042 -31.963)" fill="#1E2126" />
                </svg>
                <h5 style="color: #1E2126;">Gacha Crate</h5>
            </button>
            <div class="filterContainer">
                <div class="filterAlpha">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26.5" height="26.5" viewBox="0 0 15.998 15.999">
                        <path id="solid_filter" data-name="solid filter" d="M15.248,0H.751a.75.75,0,0,0-.53,1.28L6,7.06V13.5a.75.75,0,0,0,.32.614l2.5,1.749A.75.75,0,0,0,10,15.248V7.06l5.779-5.78A.751.751,0,0,0,15.248,0Z" transform="translate(0)" fill="#1E2126" opacity="" 0.26 />
                    </svg>
                </div>
                <div class="filterOption">
                    <div class="sel sel--superman">
                        <select name="select-superpower" id="filters">
                            <option value="" disabled>Filter By</option>
                            <option value="newest">Newest</option>
                            <option value="oldest">Oldest</option>
                            <option value="expensive">Expensive</option>
                            <option value="cheapest">Cheapest</option>
                        </select>
                    </div>
                    <hr class="rule">
                </div>
            </div>
            <button class="searchButton" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="30.621" height="30.621" viewBox="0 0 30.621 30.621">
                    <g id="Icon_feather-search" data-name="Icon feather-search" transform="translate(-3 -3)">
                        <path id="Path_1128" data-name="Path 1128" d="M28.5,16.5a12,12,0,1,1-12-12A12,12,0,0,1,28.5,16.5Z" fill="none" stroke="#d7c13f" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                        <path id="Path_1129" data-name="Path 1129" d="M31.5,31.5l-6.525-6.525" fill="none" stroke="#d7c13f" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                    </g>
                </svg>
            </button>
            <input name="search" type="text" class="Searchinput" placeholder="Search your favourite item or merchant here">
            <button class="cartButton" type="button">
                <svg id="Icon_ionic-ios-cart" data-name="Icon ionic-ios-cart" xmlns="http://www.w3.org/2000/svg" width="31.176" height="28.343" viewBox="0 0 42.176 39.343">
                    <path id="Path_1125" data-name="Path 1125" d="M12.938,29.813a1.688,1.688,0,1,1-1.687-1.688,1.688,1.688,0,0,1,1.688,1.688Z" transform="translate(-0.291 7.843)" fill="#42b77c" />
                    <path id="Path_1126" data-name="Path 1126" d="M28.723,29.813a1.687,1.687,0,1,1-1.687-1.688,1.687,1.687,0,0,1,1.687,1.688Z" transform="translate(9.555 7.843)" fill="#42b77c" />
                    <path id="Path_1127" data-name="Path 1127" d="M45.543,11.928a.607.607,0,0,0-.527-.457L11.983,8.042a1.012,1.012,0,0,1-.761-.512A11.2,11.2,0,0,0,9.985,5.505C9.2,4.482,7.733,4.515,5.035,4.493A1.518,1.518,0,0,0,3.382,6.028,1.494,1.494,0,0,0,4.964,7.563,12.576,12.576,0,0,1,7.6,7.77c.477.152.862.991,1,1.72a.042.042,0,0,0,.01.033c.02.131.2,1.11.2,1.121l4.057,23.035a8.813,8.813,0,0,0,1.471,3.886,3.958,3.958,0,0,0,3.337,1.764h24a1.489,1.489,0,0,0,1.46-1.459,1.473,1.473,0,0,0-1.42-1.589H17.662a1.125,1.125,0,0,1-.842-.3,5.037,5.037,0,0,1-1.166-2.83l-.436-2.58a.06.06,0,0,1,.041-.065l28.165-5.116a.619.619,0,0,0,.5-.566l1.623-12.606A.665.665,0,0,0,45.543,11.928Z" transform="translate(-3.382 -4.493)" fill="#42b77c" />
                </svg>
            </button>
        </div>



        <h2 class=" itemHeader">Keyword : '<?= $_SESSION['keyword'] ?>'</p>
        </h2>
        <div class="merchantContainer">
            <?php foreach ($merchant as $mch) : ?>

                <div class="merchantAcc" idMerchant='<?= $mch['id'] ?>'>
                    <div class="merchantIMG"><img src="data:image/jpeg;base64,<?= base64_encode($mch['foto']) ?>" width="60" height="60" alt="" /></div>
                    <div class="merchantDetails">
                        <h5 style="color: #ecf0f1;"><?= $mch['nama'] ?></h5>
                        <?php
                        if (isset($mch['rating'])) {
                            echo "<p class='rating yellow' style='margin-bottom: 0; '>";
                            echo $mch['rating'];
                            echo "<svg style='margin-left: 1px; margin-bottom: 5px;' xmlns='http://www.w3.org/2000/svg' width='10.125' height='8.62' viewBox='0 0 35.125 33.62'>";
                            echo "<path class='solid_star' data-name='solid star' d='M36.178,1.157,31.891,9.85l-9.592,1.4a2.1,2.1,0,0,0-1.162,3.585l6.94,6.762-1.641,9.553a2.1,2.1,0,0,0,3.046,2.213l8.581-4.51,8.581,4.51a2.1,2.1,0,0,0,3.046-2.213L48.048,21.6l6.94-6.762a2.1,2.1,0,0,0-1.162-3.585l-9.592-1.4L39.947,1.157a2.1,2.1,0,0,0-3.769,0Z' transform='translate(-20.5 0.013)' fill='#d7c13f' />";
                            echo "</svg>";
                        } else {
                            echo "<p class='rating yellow' style='margin-bottom: 0; '>";
                            echo "Unrated";
                            echo "</p>";
                        }
                        ?>
                        </p>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
        <div class="itemContainer">
            <?php foreach ($item as $itm) : ?>
                <div class="item" idItem="<?= $itm['id_item'] ?>">
                    <h5 class="itemPrice"><?= "IDR " .  ceil($itm['harga_item']) ?></h5>
                    <div class="itemImgContainer">
                        <img src="data:image/jpeg;base64,<?= base64_encode($itm['foto_item']) ?>" alt="" />
                    </div>
                    <h5 class="itemTitle"><?= $itm['nama_item'] ?></h5>
                    <h6 class="itemGameType"><?= $itm['nama_game'] ?></h6>
                    <p class="itemDesc">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation
                        ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                        proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                    <h6 class="itemMerchant"><?= $itm['nama_merchant'] ?></h6>
                    <div class="merchantRating">

                        <?php
                        foreach ($merchant as $mch) {
                            if ($mch['nama'] == $itm['nama_merchant']) {
                                if (isset($mch['rating'])) {
                                    echo "<p style='color:#d7c13f; margin-bottom: 0;float: left; font-size: 10pt;'>";
                                    echo $mch['rating'];
                                    echo "</p>";
                                    echo "<svg style='float: left;margin-top: 5px;' xmlns='http://www.w3.org/2000/svg' width='10.125' height='8.62' viewBox='0 0 35.125 33.62'>";
                                    echo "<path class='solid_star' data-name='solid star' d='M36.178,1.157,31.891,9.85l-9.592,1.4a2.1,2.1,0,0,0-1.162,3.585l6.94,6.762-1.641,9.553a2.1,2.1,0,0,0,3.046,2.213l8.581-4.51,8.581,4.51a2.1,2.1,0,0,0,3.046-2.213L48.048,21.6l6.94-6.762a2.1,2.1,0,0,0-1.162-3.585l-9.592-1.4L39.947,1.157a2.1,2.1,0,0,0-3.769,0Z' transform='translate(-20.5 0.013)' fill='#d7c13f' /></svg>";
                                } else {
                                    echo "<p style='color:#d7c13f; margin-bottom: 0;float: left; font-size: 10pt;'>";
                                    echo "Unrated";
                                    echo "</p>";
                                }
                            }
                        }
                        ?>
                    </div>
                    <p class="itemUploadDate">Uploaded at <?= date('d/m/Y', strtotime($itm['tanggal_upload'])) ?></p>
                    <div class="addtoCart" idItem="<?= $itm['id_item'] ?>">
                        <button style="border: none;background: none;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50">
                                <g id="Group_182" data-name="Group 182" transform="translate(-10402 -997)">
                                    <g id="Group_181" data-name="Group 181" transform="translate(10402 997)">
                                        <rect id="Rectangle_302" data-name="Rectangle 302" width="50" height="50" rx="10" fill="#63d99e" />
                                        <path id="Icon_material-add-shopping-cart" data-name="Icon material-add-shopping-cart" d="M12.115,31.142a3.55,3.55,0,1,0,3.538,3.55A3.539,3.539,0,0,0,12.115,31.142Zm17.691,0a3.55,3.55,0,1,0,3.538,3.55A3.539,3.539,0,0,0,29.806,31.142ZM12.416,25.374l.053-.213,1.592-2.893h13.18a3.52,3.52,0,0,0,3.1-1.828L37.166,8l-3.078-1.7H34.07l-1.946,3.55-4.883,8.875H14.822l-.23-.479-3.963-8.4L8.948,6.294,7.285,2.744H1.5v3.55H5.038l6.369,13.472L9.019,24.114a3.44,3.44,0,0,0-.442,1.7,3.554,3.554,0,0,0,3.538,3.55h21.23v-3.55H12.858A.45.45,0,0,1,12.416,25.374Z" transform="translate(5.012 5.81)" fill="#4c525d" />
                                        <path id="Icon_awesome-arrow-down" data-name="Icon awesome-arrow-down" d="M12.568,8.543l.663.733a.85.85,0,0,1,0,1.12l-5.8,6.422a.667.667,0,0,1-1.013,0L.608,10.4a.85.85,0,0,1,0-1.12l.663-.733A.671.671,0,0,1,2.3,8.556l3.429,3.981V3.043a.756.756,0,0,1,.717-.793H7.4a.756.756,0,0,1,.717.793v9.494l3.429-3.981a.666.666,0,0,1,1.025-.013Z" transform="translate(19.034 2.114)" fill="#4c525d" />
                                    </g>
                                </g>
                            </svg>
                        </button>
                    </div>
                    <h4 class="stok yellow">Stok : <?= $itm['jumlah_item'] ?></h4>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="<?= base_url(); ?>/asset/Js/select.js"></script>
    <script>
        var filter = 0;
        var addCart = 0;
        textFit($(".titleGame"));
        textFit($(".profileName"));

        $(".filterAlpha").click(function() {
            if (filter == 0) {
                filter = 1;
                $("#solid_filter").css("fill", "#D7C13F");
            } else {
                filter = 0;
                $("#solid_filter").css("fill", "#1E2126");
            }
        });

        $(".wrapProfile").click(function() {
            window.location.href = '<?= base_url(); ?>Shop/viewProfile/'.concat();
        });

        $(".backtoMenu").click(function() {
            window.location.href = '<?= base_url(); ?>MainMenu';
        });

        $(".homeButton").click(function() {
            window.location.href = '<?= base_url(); ?>Shop/unsetGame/';
        });

        $(".item").click(function() {
            if (addCart == 0) {
                id = $(this).attr('idItem');
                window.location.href = '<?= base_url(); ?>Shop/viewItem/'.concat(id);
            }
        });

        $(".accItem").click(function() {
            id = $(this).attr('idMerchant');
            window.location.href = '<?= base_url(); ?>Shop/viewMerchant/'.concat(id);
        });

        $(".merchantAcc").click(function() {
            id = $(this).attr('idMerchant');
            window.location.href = '<?= base_url(); ?>Shop/viewMerchant/'.concat(id);
        });

        $(".gachaContainer").click(function() {
            balance = "<?= $user['saldo']; ?>";
            balance = parseInt(balance);

            if (balance >= 5000) {
                alertify.confirm('Confirmation', 'Are you sure? GP 5.000 will be taken from your balance.',
                    function() {
                        //alert(balance);
                        $.ajax({
                            url: "<?= base_url(); ?>Shop/updateSaldoG/kurang",
                            method: "post",
                            success: function(result) {
                                $(".buttons").css("display", "none");
                                $("#logo").css("display", "none");
                                $(".wrapper").css("display", "flex");
                                window.location.href = '<?= base_url(); ?>Shop/viewGacha/';
                            }
                        });

                    },
                    function() {
                        alertify.success('Ok, Take Your Time.');
                    }
                ).set('labels', {
                    ok: 'Yes!',
                    cancel: 'Nope!'
                });
            } else {
                alertify.error("Insufficient Balance");
            }
        });


        $(".addtoCart").click(function() {
            addCart = 1;
            id = $(this).attr('idItem');
            $.ajax({
                url: "<?= base_url(); ?>Shop/addCart",
                method: "post",
                data: {
                    idItem: id
                },
                success: function(result) {
                    addCart = 0;
                    alertify.success("ITEM ADDED TO CART");
                }
            });

        });



        $(".searchButton").click(function() {
            isi = $(".Searchinput").val();
            if (isi == "") {
                alert('Search input belum diisi');
            } else {
                if (filter == 1) {
                    setFilter = $('#filters').val();
                    window.location.href = '<?= base_url(); ?>Shop/setFilter/'.concat(setFilter.concat("/")).concat(isi);
                } else {
                    window.location.href = '<?= base_url(); ?>Shop/unsetFilter/'.concat(isi);
                }

            }
        });


        $(".cartButton").click(function() {
            window.location.href = '<?= base_url(); ?>Shop/viewCart/';
        });
    </script>
</body>

</html>