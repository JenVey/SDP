<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>gather.owl - Chat User</title>
    <link rel="icon" href="<?php echo base_url(); ?>asset/Images/android-chrome-512x512.png">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/Ours.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/chatmerchantCSS.css">
    <link rel=" stylesheet" href="<?php echo base_url(); ?>asset/CSS/animation.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/alerts.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/alertify.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/themes/default.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/shopCSS.css">
    <script src="<?php echo base_url(); ?>asset/Js/alertify.js"></script>

    <script src="<?php echo base_url(); ?>asset/Js/jquery-min.js"></script>
    <script src="<?php echo base_url(); ?>asset/Js/bootstrap.js"></script>
</head>
<?php

if (!empty($merchant)) {
    foreach ($merchant as $mch) {
        $mchId = $mch['id'];
        $mchNama = $mch['nama'];
        $mchDesc = $mch['bio'];
        $mchFoto = $mch['foto'];
        $mchRating = $mch['rating'];
    }
}

$listMerchant = array();
foreach ($pesan as $psn) {
    $ada = false;
    if ($psn['id_pengirim'] == $user['id_user'] && $psn['tipe_penerima'] == "Merchant") {
        for ($i = 0; $i < count($listMerchant); $i++) {
            if ($listMerchant[$i] == $psn['id_penerima']) {
                $ada = true;
            }
        }

        if (!$ada) {
            array_push($listMerchant, $psn['id_penerima']);
        }
    }
}

foreach ($merchantF as $mchF) {
    $ada = false;
    for ($i = 0; $i < count($listMerchant); $i++) {
        if ($listMerchant[$i] == $mchF['id']) {
            $ada = true;
        }
    }

    if (!$ada) {
        array_push($listMerchant,  $mchF['id']);
    }
}

//var_dump($listMerchant);

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
            if (count($listMerchant) > 0) {
                for ($i = 0; $i < count($listMerchant); $i++) {
                    foreach ($allMerchant as $allMch) {
                        if ($listMerchant[$i] == $allMch['id']) {
            ?>
                            <div class="accItem listMerchant" idMerchant="<?= $allMch['id'] ?>">
                                <div class="profileImg" style="margin-left: 0;"><img class="profileImg" src="data:image/jpeg;base64,<?= base64_encode($allMch['foto']) ?>" width="50" height="50" alt="" /></div>
                                <div class="profileStats">
                                    <h6 class="profileName"> <?= $allMch['nama'] ?> </h6>
                                    <?php
                                    if (isset($allMch['rating'])) {
                                        echo "<h6 class='profileBalance' style='float: left;'>";
                                        echo $allMch['rating'];
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
            <?php
                        }
                    }
                }
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
        <?php if (empty($merchant)) { ?>
            <div id="banner">
                <object data="<?= base_url(); ?>asset/Images/SVG/chat.svg" type="image/svg+xml" style="margin-top: 15vh;"></object>
                <svg xmlns="http://www.w3.org/2000/svg" width="730" height="105" viewBox="0 0 730 105">
                    <text id="Asking_is_always_an_option" data-name="Asking is always an option" transform="translate(0 74)" fill="#fff" font-size="94" font-family="Cookie-Regular, Cookie">
                        <tspan x="0" y="0">Asking is always an option</tspan>
                    </text>
                </svg>
            </div>
        <?php } else { ?>
            <div class="chatHeader">
                <div class="headerDetails">
                    <div class="chatLogo"><img src="data:image/jpeg;base64,<?= base64_encode($mchFoto) ?>" /></div>
                    <div class="channelHeader">
                        <h4 style="color: #ecf0f1;"><?= $mchNama ?></h4>
                        <p class="yellow"><?= $mchRating ?></p>
                    </div>
                </div>
                <div class="actionContainer">
                    <h3 class="yellow">Visit Shop</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="52.544" height="46.706" viewBox="0 0 52.544 46.706">
                        <path id="shop" data-name="Icon metro-shop" d="M19.068,19.953,21.377,4.627H9.367L4.35,17.763a4.6,4.6,0,0,0-.236,1.46c0,3.223,3.357,5.838,7.505,5.838,3.824,0,6.985-2.23,7.45-5.108Zm11.317,5.108c4.145,0,7.505-2.616,7.505-5.838,0-.12-.009-.239-.015-.353L36.39,4.627H24.38L22.892,18.858c-.006.12-.012.239-.012.365,0,3.223,3.36,5.838,7.505,5.838Zm14.6,3.053V39.657H15.79V28.132a12.283,12.283,0,0,1-4.171.724,12.035,12.035,0,0,1-1.667-.143V47.246a4.1,4.1,0,0,0,4.081,4.087h32.7a4.1,4.1,0,0,0,4.087-4.087V28.716a12.542,12.542,0,0,1-1.667.143A12.131,12.131,0,0,1,44.981,28.114ZM56.424,17.763,51.4,4.627H39.394l2.306,15.3c.45,2.89,3.611,5.132,7.453,5.132,4.145,0,7.505-2.616,7.505-5.838A4.688,4.688,0,0,0,56.424,17.763Z" transform="translate(-4.113 -4.627)" fill="#d7c13f;" />
                    </svg>
                </div>
            </div>

            <div class="chatSection">
                <div class="chatWrapper">
                    <div class="chatField">
                        <?php $cekTgl = "";
                        foreach ($pesan as $psn) {
                            if ($psn['id_penerima'] == $mchId && $psn['id_pengirim'] == $user['id_user']) {
                                $tgl = date('d F Y', strtotime($psn['tgl']));
                                if ($tgl != $cekTgl) {
                                    $cekTgl = $tgl; ?>
                                    <div class="dateChat">
                                        <div style="width: 5vw; height: 1px; background-color: #ecf0f1;"></div>
                                        <h6 style="color: #ecf0f1;"><?= date_format(date_create($psn['tgl']), "d F Y"); ?></h6>
                                        <div style="width: 5vw; height: 1px; background-color: #ecf0f1;"></div>
                                    </div>
                                <?php }
                                if ($psn['pengirim'] != $user['nama_user']) { ?>
                                    <div class="othersText">
                                        <div class="senderImg"><img src="data:image/jpeg;base64,<?= base64_encode($psn['foto']) ?>" /></div>
                                        <div class="nameText">
                                            <h6 class="senderName"><?= $psn['pengirim'] ?></h6>
                                            <div class="text">
                                                <p><?= $psn['pesan'] ?></p>
                                                <p class="textDate"><?= date('H:i', strtotime($psn['tgl'])) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php } else { ?>
                                    <div class="myText">
                                        <div class="my nameText">
                                            <div class="text mine">
                                                <h6 class="mySenderName"><?= $psn['pengirim'] ?></h6>
                                                <p><?= $psn['pesan'] ?></p>
                                                <p class="myTextDate"><?= date('H:i', strtotime($psn['tgl'])) ?></p>
                                            </div>
                                        </div>
                                        <div class="senderImg" style="margin:0 1vw 0 1vw;"><img src="data:image/jpeg;base64,<?= base64_encode($psn['foto']) ?>" /></div>
                                    </div>
                                <?php } ?>
                        <?php }
                        } ?>
                    </div>
                </div>
                <div class="inputField">
                    <textarea name="inputText" id="inputText" cols="132" rows="1"></textarea>
                </div>
                <button id="sendButton">
                </button>
            </div>
        <?php } ?>
    </div>



    <script>
        var keys = {};
        var ctr = 0;
        $("#inputText").keydown(function(e) {
            keys[e.which] = true;
            if (keys[13] && !keys[16]) {
                e.preventDefault();
                $("#sendButton").trigger("click");
            } else if (keys[13] && keys[16]) {
                if ($(".chatField").css("height") != "624px") {
                    var height = parseInt($(this).css("height"));
                    height += 26;
                    $(this).css("height", height);
                    ctr++;
                    var height = parseInt($(".inputField").css("height"));
                    height += 26;
                    $(".inputField").css("height", height);

                    var height = parseInt($(".chatField").css("height"));
                    height -= 26;
                    $(".chatField").css("height", height);
                }
            } else if (keys[8] && $(this).val().length == 1) {
                $(".chatField").css("height", 702.75);
                $(".inputField").css("height", 46.8438);
                $("#inputText").css("height", 28);
            }
        });

        $("#inputText").focus(function() {
            $("#inputText").on("input", function() {
                if (keys[17] && keys[86]) {
                    if ($(this).prop('scrollHeight') > $(this).prop('clientHeight')) {
                        var tambah = true;
                        while (tambah) {
                            if ($(".chatField").css("height") != "624px" && $(this).prop('scrollHeight') > $(this).prop('clientHeight')) {
                                var height = parseInt($(this).css("height"));
                                height += 26;
                                $(this).css("height", height);
                                var height = parseInt($(".inputField").css("height"));
                                height += 26;
                                ctr++;
                                $(".inputField").css("height", height);
                                var height = parseInt($(".chatField").css("height"));
                                height -= 26;
                                $(".chatField").css("height", height);
                            } else tambah = false;
                            var chatHeight = parseInt($(".chatField").css("height"));
                            if (chatHeight <= 624) tambah = false;
                        }
                    }
                    console.log($(".chatField").css("height"));
                } else {
                    if ($(".chatField").css("height") != "624px") {
                        if ($(this).prop('scrollHeight') > $(this).prop('clientHeight')) {
                            var height = parseInt($(this).css("height"));
                            height += 26;
                            $(this).css("height", height);
                            var height = parseInt($(".inputField").css("height"));
                            height += 26;
                            ctr++;
                            $(".inputField").css("height", height);
                            var height = parseInt($(".chatField").css("height"));
                            height -= 26;
                            $(".chatField").css("height", height);
                        }
                    }
                }
            });

        });

        $("#inputText").keyup(function(e) {
            delete keys[e.which];
        });

        <?php if (isset($user) && isset($mchId)) { ?>
            idUser = '<?= $user['id_user'] ?>';
            idMerchant = '<?= $mchId ?>';
        <?php } ?>

        $("#sendButton").click(function() {
            pesan = $("#inputText").val();
            if (pesan != "") {
                var height = parseInt($("#inputText").css("height"));
                height -= 26 * ctr;
                $("#inputText").css("height", height);
                var height = parseInt($(".inputField").css("height"));
                height -= 26 * ctr;
                $(".inputField").css("height", height);

                var height = parseInt($(".chatField").css("height"));
                height += 26 * ctr;
                $(".chatField").css("height", height);
                ctr = 0;

                $.ajax({
                    url: "<?= base_url(); ?>Shop/insertPesan/".concat(idMerchant).concat('/user'),
                    method: "post",
                    data: {
                        id_pengirim: idUser,
                        id_penerima: idMerchant,
                        tipe_penerima: "Merchant",
                        pesan: pesan
                    },
                    success: function(result) {
                        $(".chatSection").html(result);
                        $("#inputText").val("");
                    }
                });
                alertify.success("Message sent");
            } else {
                alertify.error("Empty Message");
            }
        });

        $(".accItemContainer").on("click", ".listMerchant", function() {
            idMerchant = $(this).attr("idMerchant");
            window.location.href = '<?= base_url(); ?>Shop/chatUser/'.concat(idMerchant);
        });


        $(".backtoMenu").click(function() {
            window.location.href = '<?= base_url(); ?>MainMenu';
        });

        $(".actionContainer").click(function() {
            window.location.href = '<?= base_url(); ?>Shop/viewMerchant/'.concat(idMerchant);
        });

        $(".wrapProfile").click(function() {
            window.location.href = '<?= base_url(); ?>Shop/viewProfile/';
        });
    </script>
</body>

</html>