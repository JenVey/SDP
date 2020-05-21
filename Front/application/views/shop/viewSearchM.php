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
                            $idM = $mch['id'];
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
            <?php
            $ctr = 1;
            foreach ($item as $itm) : ?>
                <div class="item" idItem="<?= $itm['id_item'] ?>">
                    <div class="itemHover">
                        <div class="itemImgContainer">
                            <img class="itemImg" src="data:image/jpeg;base64,<?= base64_encode($itm['foto_item']) ?>" alt="" />
                        </div>
                        <h5 class="itemTitle"><?= $itm['nama_item'] ?></h5>
                        <h6 class="itemGameType"><?= $itm['nama_game'] ?></h6>
                        <p class="itemDesc"><?= $itm['desc_item'] ?></p>
                        <div class="merchantRating">
                            <a href="<?= base_url(); ?>/Shop/viewMerchant/<?= $itm['id_merchant'] ?>" class="itemMerchant"><?= $itm['nama_merchant'] ?></a>
                            <?php
                            foreach ($merchant as $mch) {
                                if ($mch['nama'] == $itm['nama_merchant']) {
                                    if (isset($mch['rating'])) { ?>
                                        <p style="color:#d7c13f; margin: 0.2vw 0 0 0.5vw; font-size: 12px; height: 50%;"><?= $mch['rating'] ?>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="10.125" height="8.62" viewBox="0 0 35.125 33.62">
                                                <path class="solid_star" data-name="solid star" d="M36.178,1.157,31.891,9.85l-9.592,1.4a2.1,2.1,0,0,0-1.162,3.585l6.94,6.762-1.641,9.553a2.1,2.1,0,0,0,3.046,2.213l8.581-4.51,8.581,4.51a2.1,2.1,0,0,0,3.046-2.213L48.048,21.6l6.94-6.762a2.1,2.1,0,0,0-1.162-3.585l-9.592-1.4L39.947,1.157a2.1,2.1,0,0,0-3.769,0Z" transform="translate(-20.5 0.013)" fill="#d7c13f" />
                                            </svg>
                                        </p>
                                    <?php } else { ?>
                                        <p style="color:#d7c13f; margin: 0.2vw 0 0 0.5vw; font-size: 12px; height: 50%;">Unrated</p>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </div>
                        <h6 class="stok">Stok : <span class="yellow"><?= $itm['jumlah_item'] ?></span></h6>
                        <h4 class="itemPrice">IDR <?= ceil($itm['harga_item']) ?></h4>
                        <p class="itemUploadDate">Uploaded at <?= date('d/m/Y', strtotime($itm['tanggal_upload'])) ?></p>
                    </div>
                    <div class="addtoCart" idItem="<?= $itm['id_item'] ?>">
                        <button style="border: none;background: none;">
                            <svg id="cartIcon" xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50">
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
                </div>
            <?php endforeach;  ?>

        </div>

    </div>
    <script src="<?= base_url(); ?>/asset/Js/select.js"></script>
    <script>
        var filter = 0;
        var follow = $(".merchantFollow").attr("follow");
        var addCart = 0;

        textFit($(".titleGame"));
        textFit($(".profileName"));
        $('.item').children('.itemHover').each(function() {
            price = $(this).children(".itemPrice").html();
            price = price.replace(/[^a-z0-9\s]/gi, '');
            price = price.substring(4, price.length);
            $(this).children(".itemPrice").html("IDR " + addCommas(price));
        });


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

        $(".wrapProfile").click(function() {
            window.location.href = '<?= base_url(); ?>Shop/viewProfile/'.concat();
        });

        $(".backtoMenu").click(function() {
            window.location.href = '<?= base_url(); ?>MainMenu';
        });

        $(".homeButton").click(function() {
            window.location.href = '<?= base_url(); ?>Shop';
        });

        $(".itemHover").click(function() {
            //alert("A");
            if (addCart == 0) {
                id = $(this).parent().attr('idItem');
                window.location.href = '<?= base_url(); ?>Shop/viewItem/'.concat(id);
            }
        });


        $(".accItem").click(function() {
            id = $(this).attr('idMerchant');
            window.location.href = '<?= base_url(); ?>Shop/viewMerchant/'.concat(id);
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

        $(".searchButton").click(function() {
            idM = $(".merchantName").attr("idMerchant");
            alert(idM);
            isi = $(".Searchinput").val();
            if (isi == "") {
                alert('Search input belum diisi');
            } else {

                if (filter == 1) {
                    setFilter = $('#filters').val();
                    window.location.href = '<?= base_url(); ?>Shop/setMerchantF/'.concat(setFilter.concat("/")).concat(isi.concat("/")).concat(idM);

                } else {
                    window.location.href = '<?= base_url(); ?>Shop/setMerchant/'.concat(idM.concat("/")).concat(isi);
                }

            }
        });


        $(".cartButton").click(function() {
            window.location.href = '<?= base_url(); ?>Shop/viewCart/';
        });
    </script>
</body>

</html>