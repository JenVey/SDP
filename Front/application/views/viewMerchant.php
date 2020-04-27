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
        <div class="profileImg"><img class="profileImg" src="data:image/jpeg;base64,<?= base64_encode($user['foto']) ?>" width="50" height="50" alt="" /></div>
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

        <div class="filterSearchContainer">
            <div class="merchantInfo">
                <div class="merchantWrapper">
                    <img src="Images/untrail.jpeg" width="50" height="50" alt="" class="merchantImg">
                    <h4 class="merchantName" <?php
                                                foreach ($merchant as $mch) {
                                                    echo "idMerchant='" . $mch['id'] . "'";
                                                }
                                                ?>>
                        <?php
                        foreach ($merchant as $mch) {
                            echo $mch['nama'];
                        ?>
                    </h4>
                    <div class="rating">
                    <?php
                            if (isset($mch['rating'])) {
                                for ($i = 0; $i < $mch['rating']; $i++) {
                                    echo " <svg xmlns='http://www.w3.org/2000/svg' width='37.353' height='30' viewBox='0 0 21 21'>";
                                    echo "<path class='Icon_awesome-star' data-name='Icon awesome-star' d='M10.815.73,8.252,6.159l-5.735.874a1.329,1.329,0,0,0-.695,2.239L5.971,13.5,4.99,19.463a1.268,1.268,0,0,0,1.821,1.382l5.13-2.817,5.13,2.817a1.269,1.269,0,0,0,1.821-1.382L17.912,13.5l4.149-4.224a1.329,1.329,0,0,0-.695-2.239l-5.735-.874L13.068.73a1.234,1.234,0,0,0-2.253,0Z' transform='translate(-1.441 0.001)' fill='#d7c13f' />";
                                    echo "</svg>";
                                }
                            } else {
                                echo "<p style='color:#d7c13f; margin-bottom: 0;float: left; font-size: 20pt;'>";
                                echo "Unrated";
                                echo "</p>";
                            }
                        }
                    ?>
                    </div>
                </div>
                <div class="buttons">
                    <?php
                    $ada = false;
                    foreach ($merchantF as $mchF) {
                        foreach ($merchant as $mch) {
                            if ($mch['id'] == $mchF['id']) {
                                $ada = true;
                            }
                        }
                    }

                    if ($ada) {
                        echo "<button class='merchantFollow' follow='1'>";
                        echo "<svg xmlns='http://www.w3.org/2000/svg' width='37.353' height='30' viewBox='0 0 47.353 40'>";
                        echo "<path id='Icon_awesome-heart' style='fill:#E92E55;' data-name='Icon awesome-heart' d='M42.755,4.983C37.687.813,30.15,1.563,25.5,6.2L23.676,8.009,21.854,6.2C17.211,1.563,9.665.813,4.6,4.983a12.52,12.52,0,0,0-.916,18.562l17.9,17.839a2.972,2.972,0,0,0,4.19,0l17.9-17.839a12.512,12.512,0,0,0-.906-18.562Z' transform='translate(0.001 -2.248)' fill='#3e3e3e' />";
                        echo "</svg>";
                        echo "</button>";
                    } else {
                        echo "<button class='merchantFollow' follow='0'>";
                        echo "<svg xmlns='http://www.w3.org/2000/svg' width='37.353' height='30' viewBox='0 0 47.353 40'>";
                        echo "<path id='Icon_awesome-heart' data-name='Icon awesome-heart' d='M42.755,4.983C37.687.813,30.15,1.563,25.5,6.2L23.676,8.009,21.854,6.2C17.211,1.563,9.665.813,4.6,4.983a12.52,12.52,0,0,0-.916,18.562l17.9,17.839a2.972,2.972,0,0,0,4.19,0l17.9-17.839a12.512,12.512,0,0,0-.906-18.562Z' transform='translate(0.001 -2.248)' fill='#3e3e3e' />";
                        echo "</svg>";
                        echo "</button>";
                    }


                    ?>

                    <button class="merchantChat">
                        <svg xmlns="http://www.w3.org/2000/svg" width="37.353" height="30" viewBox="0 0 56.736 44">
                            <path id="Icon_open-chat" data-name="Icon open-chat" d="M0,0V31.429l7.092-6.286h7.092V6.286H35.46V0ZM21.276,12.571V37.714H49.644L56.736,44V12.571Z" fill="#fff" />
                        </svg>
                    </button>
                    <button class="merchantRate">
                        <svg xmlns="http://www.w3.org/2000/svg" width="37.353" height="30" viewBox="0 0 43.153 42.621">
                            <path id="Icon_material-rate-review" data-name="Icon material-rate-review" d="M41.838,3H7.315A4.283,4.283,0,0,0,3.022,7.262L3,45.621,11.631,37.1H41.838a4.3,4.3,0,0,0,4.315-4.262V7.262A4.3,4.3,0,0,0,41.838,3ZM11.631,28.572V23.309L26.475,8.647a1.078,1.078,0,0,1,1.532,0l3.819,3.772a1.046,1.046,0,0,1,0,1.513L16.96,28.572Zm25.892,0H21.34l4.315-4.262H37.523Z" transform="translate(-3 -3)" fill="#fff" />
                        </svg>
                    </button>
                    <button class="merchantReport">
                        <svg xmlns="http://www.w3.org/2000/svg" width="37.353" height="30" viewBox="0 0 45.466 45.121">
                            <path id="Icon_material-report" data-name="Icon material-report" d="M36.654,4.5H17.811L4.5,17.71v18.7l13.311,13.21H36.654L49.966,36.41V17.71ZM27.233,40.346a3.259,3.259,0,1,1,3.284-3.259A3.265,3.265,0,0,1,27.233,40.346Zm2.526-10.779H24.707V14.527h5.052Z" transform="translate(-4.5 -4.5)" fill="#ff5858" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <h2 class=" itemHeader">Recent Items</p>
        </h2>
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
                        $ada = 0;
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
                    <button class="addtoCart">Add to cart</button>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
    <script src="<?= base_url(); ?>/asset/Js/select.js"></script>
    <script>
        var filter = 0;
        var follow = $(".merchantFollow").attr("follow");
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

        $(".merchantFollow").click(function() {
            //alert('a');
            id = $(".merchantName").attr("idMerchant");
            if (follow == 0) {
                follow = 1;
                $.ajax({
                    url: "<?= base_url(); ?>Shop/likeMerchant",
                    method: "post",
                    data: {
                        idMerchant: id
                    },
                    success: function(result) {

                    }
                });
                $("#Icon_awesome-heart").css("fill", "#E92E55");

            } else {
                //alert(id);
                follow = 0;
                $.ajax({
                    url: "<?= base_url(); ?>Shop/unlikeMerchant",
                    method: "post",
                    data: {
                        idMerchant: id
                    },
                    success: function(result) {

                    }
                });
                $("#Icon_awesome-heart").css("fill", "#3e3e3e");
            }
        });

        $(".backtoMenu").click(function() {
            window.location.href = '<?= base_url(); ?>MainMenu';
        });

        $(".homeButton").click(function() {
            window.location.href = '<?= base_url(); ?>Shop';
        });

        $(".item").click(function() {
            id = $(this).attr('idItem');
            window.location.href = '<?= base_url(); ?>Shop/viewItem/'.concat(id);
        });

        $(".accItem").click(function() {
            id = $(this).attr('idMerchant');
            window.location.href = '<?= base_url(); ?>Shop/viewMerchant/'.concat(id);
        });
    </script>
</body>

</html>