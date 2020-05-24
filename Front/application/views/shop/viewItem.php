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
<?php
$ada = false;
foreach ($merchant as $mch) {
    if ($mch['id_user'] == $user['id_user']) {
        $mchId = $mch['id'];
        $ada = true;
    }
}
if ($ada == false) {
    $mchId = "";
}
?>

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
                <h6 class="profileBalance">GP <?= number_format(ceil($user['saldo']), 0, ".", ".") ?></h6>
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
        <div class="itemFrame">
            <div class="itemImage">
                <img src="data:image/jpeg;base64,<?= base64_encode($item['foto_item']) ?>" alt="" />
            </div>
            <div class="itemDetails">
                <h3 class="varela" style="color: #ecf0f1;"> <?= $item['nama_item'] ?>
                    <p class="yellow" style="font-size: 10px">
                        <?php
                        foreach ($games as $game) {
                            if ($game['id_game'] == $item['id_game']) {
                                echo $game['nama_game'];
                            }
                        }
                        ?>
                    </p>
                </h3>

                <h4 style="color: #42b77c;">IDR <?= number_format(ceil($item['harga_item']), 0, ".", ".") ?></h4>
                <div class="descBox">
                    <p><?= $item['desc_item'] ?></p>
                </div>
                <a href="<?= base_url(); ?>/Shop/viewMerchant/<?= $item['id_merchant'] ?>">
                    <h5 style="color: #42b77c;margin-top: 10px;">
                        <?php
                        foreach ($merchant as $merch) {
                            if ($merch['id'] == $item['id_merchant']) {
                                $namaMerchant = $merch['nama'];
                                echo $namaMerchant;
                            }
                        }
                        ?>
                    </h5>
                </a>
                <p style="color: gray;font-size: 10pt; margin: 0;">Uploaded on <?= date('d/m/Y', strtotime($item['tanggal_upload'])) ?></p>
                <?php
                if ($item['jumlah_item'] == 0) {
                    echo "<button class='soldOut' disabled>Sold Out</button>";
                } else {
                    echo "<button  class='AddtoCart' idItem='" . $item['id_item'] . "' >Add to cart</button>";
                }
                ?>

            </div>
        </div>
        <h3 class="yellow varela" style="margin-left: 2vw;">Comments</h3>
        <?php if ($mchId != $item['id_merchant']) { ?>
            <div class="enterComment">
                <textarea name="commentUser" placeholder="Wanna ask about the item?" id="commentMe" cols="169" rows="6"></textarea>
                <button class="sendComment">
                    <h5>Send</h5>
                </button>
            </div>
        <?php } ?>
        <div class="commentSection">
            <?php foreach ($komen as $comment) : ?>
                <div class="commentWrapper" idComment="<?= $comment['id_komentar'] ?>">
                    <div class="commentUser">
                        <div class=" userDetails">
                            <div class="senderImg" style="content: url('data:image/jpeg;base64,<?= base64_encode($comment['foto']) ?>')">
                            </div>
                            <h5 class="userName"><?= $comment['nama'] ?></h5>
                        </div>
                        <p class="comment varela"><?= $comment['pesan'] ?></p>
                    </div>
                    <?php foreach ($reply as $rep) {
                        if ($rep['id_komentar'] == $comment['id_komentar']) { ?>
                            <div class="replyMerchant">
                                <svg style="align-self: flex-start; margin-top: 2px;" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 56.122 42.518">
                                    <path id="Icon_awesome-reply" data-name="Icon awesome-reply" d="M55.212,29.788,35.919,44.212c-1.689,1.263-4.35.238-4.35-1.724v-7.6C13.962,34.716,0,31.661,0,17.214,0,11.383,4.339,5.606,9.134,2.586c1.5-.943,3.629.24,3.078,1.768C7.242,18.117,14.57,21.77,31.569,21.982V13.639c0-1.965,2.664-2.985,4.35-1.724L55.212,26.34A2.087,2.087,0,0,1,55.212,29.788Z" transform="translate(0 -2.25)" fill="#1E2126" />
                                </svg>
                                <h5 class="merchantName"><?php
                                                            if (substr($rep['id_pengirim'], 0, 1) == "U") {
                                                                foreach ($allUser as $users) {
                                                                    if ($users['id_user'] == $rep['id_pengirim']) {
                                                                        echo "<span class='yellow'>" . $users['nama_user'] . "</span>";
                                                                    }
                                                                }
                                                            } else {
                                                                foreach ($merchant as $mch) {
                                                                    if ($mch['id'] == $rep['id_pengirim']) {
                                                                        echo $mch['nama'];
                                                                    }
                                                                }
                                                            }
                                                            ?></h5>
                                <p class="comment varela"><?= $rep['pesan'] ?></p>
                            </div>
                    <?php }
                    } ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    </div>
    <script src="<?= base_url(); ?>/asset/Js/select.js"></script>
    <script>
        var filter = 0;
        textFit($(".titleGame"));
        textFit($(".profileName"));

        $(document).ready(function() {
            $(".replyTab").css("display", "none");
        });

        $(".commentUser").click(function() {
            if (!$(this).siblings(".replyTab").length) {
                $(this).parent().append("<div class='replyTab'><div id='replyMe' contenteditable></div><button class='replyComment'><h5>Send</h5></button></div>");
                var message = $(this).children(".comment").html();
                $(this).siblings(".replyTab").children("#replyMe").prepend("<span class='yellow' style='border-right: solid 2px #1e2126;margin-right: 5px; padding-right:10px;box-sizing:border-box;' contenteditable='false'>" + message + "</span>");
            } else if ($(this).siblings(".replyTab").children("#replyMe").children("span").length) {
                $(this).siblings(".replyTab").children("#replyMe").children("span").remove();
                var message = $(this).children(".comment").html();
                $(this).siblings(".replyTab").children("#replyMe").prepend("<span class='yellow' style='border-right: solid 2px #1e2126;margin-right: 5px; padding-right:10px;box-sizing:border-box;' contenteditable='false'>" + message + "</span>");
            } else {
                var message = $(this).children(".comment").html();
                $(this).siblings(".replyTab").children("#replyMe").prepend("<span class='yellow' style='border-right: solid 2px #1e2126;margin-right: 5px; padding-right:10px;box-sizing:border-box;' contenteditable='false'>" + message + "</span>");
            }
        });
        $(".replyMerchant").click(function() {
            if (!$(this).siblings(".replyTab").length) {
                $(this).parent().append("<div class='replyTab'><div id='replyMe' contenteditable></div><button class='replyComment'><h5>Send</h5></button></div>");
                var message = $(this).children(".comment").html();
                $(this).siblings(".replyTab").children("#replyMe").prepend("<span class='yellow' style='border-right: solid 2px #1e2126;margin-right: 5px; padding-right:10px;box-sizing:border-box;' contenteditable='false'>" + message + "</span>");
            } else if ($(this).siblings(".replyTab").children("#replyMe").children("span").length) {
                $(this).siblings(".replyTab").children("#replyMe").children("span").remove();
                var message = $(this).children(".comment").html();
                $(this).siblings(".replyTab").children("#replyMe").prepend("<span class='yellow' style='border-right: solid 2px #1e2126;margin-right: 5px; padding-right:10px;box-sizing:border-box;' contenteditable='false'>" + message + "</span>");
            } else {
                var message = $(this).children(".comment").html();
                $(this).siblings(".replyTab").children("#replyMe").prepend("<span class='yellow' style='border-right: solid 2px #1e2126;margin-right: 5px; padding-right:10px;box-sizing:border-box;' contenteditable='false'>" + message + "</span>");
            }
        });



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
            window.location.href = '<?= base_url(); ?>Shop';
        });
        $(".accItem").click(function() {
            id = $(this).attr('idMerchant');
            window.location.href = '<?= base_url(); ?>Shop/viewMerchant/'.concat(id);
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

        $(".gachaContainer").click(function() {
            balance = "<?= $user['saldo']; ?>";
            balance = parseInt(balance);

            if (balance >= 2000) {
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


        $(".AddtoCart").click(function() {
            id = $(this).attr('idItem');
            $.ajax({
                url: "<?= base_url(); ?>Shop/addCart",
                method: "post",
                data: {
                    idItem: id
                },
                success: function(result) {
                    alertify.success("ITEM ADDED TO CART");
                }
            });

        });

        $(".cartButton").click(function() {
            window.location.href = '<?= base_url(); ?>Shop/viewCart/';
        });


        $(".sendComment").click(function() {
            idItem = $(".AddtoCart").attr('idItem');
            pesan = $("#commentMe").val();
            idUser = '<?= $user['id_user'] ?>';

            $.ajax({
                url: "<?= base_url(); ?>Shop/insertComment/komen",
                method: "post",
                data: {
                    id_item: idItem,
                    idUser: idUser,
                    pesan: pesan
                },
                success: function(result) {
                    $(".commentSection").html(result);
                    $("#commentMe").val("");
                    alertify.success("Comment sent");
                }
            });
        });

        $(".commentWrapper").on("click", ".replyComment", function() {
            idKomen = $(this).parent().parent().attr('idComment');
            idItem = $(".AddtoCart").attr('idItem');
            <?php if ($mchId != $item['id_merchant']) { ?>
                id_pengirim = '<?= $user['id_user'] ?>';
            <?php } else { ?>
                id_pengirim = '<?= $mchId ?>';
            <?php } ?>

            pesan = $("#replyMe").html();
            $.ajax({
                url: "<?= base_url(); ?>Shop/insertComment/reply",
                method: "post",
                data: {
                    id_item: idItem,
                    id_komentar: idKomen,
                    id_pengirim: id_pengirim,
                    pesan: pesan
                },
                success: function(result) {
                    $(".commentSection").html(result);
                    alertify.success("Reply sent");
                }
            });
        });
    </script>
</body>

</html>