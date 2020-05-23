<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>gather.owl - Chat Merchant</title>
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
foreach ($merchant as $mch) {
    $mchId = $mch['id'];
    $mchNama = $mch['nama'];
    $mchDesc = $mch['bio'];
    $mchFoto = $mch['foto'];
    $mchRating = $mch['rating'];
}

//cekUser kirim pesan
$listUser = array();
foreach ($pesan as $psn) {
    $ada = false;
    if ($psn['id_penerima'] == $mchId) {

        for ($i = 0; $i < count($listUser); $i++) {
            if ($listUser[$i] == $psn['id_pengirim']) {
                $ada = true;
            }
        }

        if (!$ada) {
            array_push($listUser, $psn['id_pengirim']);
        }
    }
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
            <h3 style="color: #ecf0f1;">Customers</h3>
            <div class="hl"></div>
        </div>
        <div class="accItemContainer">
            <?php for ($i = 0; $i < count($listUser); $i++) {
                foreach ($allUser as $users) {
                    if ($listUser[$i] == $users['id_user']) { ?>
                        <div class="accItem listCust" idCust="<?= $users['id_user'] ?>">
                            <div class="profileImg" style="margin-left: 0;"><img class="profileImg" src="data:image/jpeg;base64,<?= base64_encode($users['foto']) ?>" width="50" height="50" alt="" /></div>
                            <div class="profileStats">
                                <h6 class="profileName">
                                    <?php $notif = false;
                                    foreach ($pesan as $psn) {
                                        if ($psn['id_pengirim'] == $users['id_user'] && $psn['id_penerima'] == $mchId) {
                                            if ($psn['status'] == 0) {
                                                $notif = true;
                                            }
                                        }
                                    }
                                    if ($notif) {
                                        echo $users['nama_user'] . " (ADA PESAN BARU)";
                                    } else {
                                        echo $users['nama_user'];
                                    } ?>
                                </h6>
                            </div>
                        </div>
            <?php }
                }
            } ?>
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
        <?php if (!isset($custA)) { ?>
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
                    <div class="chatLogo"><img src="data:image/jpeg;base64,<?= base64_encode($custA['foto']) ?>" /></div>
                    <div class="channelHeader">
                        <h4 style="color: #ecf0f1;"><?= $custA['nama_user'] ?></h4>
                    </div>
                </div>
            </div>

            <div class="chatSection">
                <div class="chatWrapper">
                    <div class="chatField">
                        <?php $cekTgl = "";
                        foreach ($pesan as $psn) {
                            if ($psn['id_penerima'] == $mchId && $psn['id_pengirim'] == $custA['id_user'] || $psn['id_penerima'] == $custA['id_user'] && $psn['id_pengirim'] == $mchId) {
                                $tgl = date('d F Y', strtotime($psn['tgl']));
                                if ($tgl != $cekTgl) {
                                    $cekTgl = $tgl; ?>
                                    <div class="dateChat">
                                        <div style="width: 5vw; height: 1px; background-color: #ecf0f1;"></div>
                                        <h6 style="color: #ecf0f1;"><?= date_format(date_create($psn['tgl']), "d F Y"); ?></h6>
                                        <div style="width: 5vw; height: 1px; background-color: #ecf0f1;"></div>
                                    </div>
                                <?php }
                                if ($psn['id_pengirim'] == $custA['id_user'] && $psn['id_penerima'] == $mchId) { ?>
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
                                                <h6 class="mySenderName">
                                                    <?= $mchNama ?>
                                                </h6>
                                                <p><?= $psn['pesan'] ?></p>
                                                <p class="myTextDate"><?= date('H:i', strtotime($psn['tgl'])) ?></p>
                                            </div>
                                        </div>
                                        <div class="senderImg" style="margin:0 1vw 0 1vw;"><img src="data:image/jpeg;base64,<?= base64_encode($mchFoto) ?>" /></div>
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

        <?php if (isset($custA)) { ?>
            idCust = '<?= $custA['id_user'] ?>';
        <?php } ?>

        <?php if (isset($mchId)) { ?>
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


                //alert(pesan);
                //alert(idMerchant);
                $.ajax({
                    url: "<?= base_url(); ?>Shop/insertPesan/".concat('<?= $mchId ?>/merchant'),
                    method: "post",
                    data: {
                        id_pengirim: idMerchant,
                        id_penerima: idCust,
                        tipe_penerima: "Customer",
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

        $(".accItemContainer").on("click", ".listCust", function() {
            idCust = $(this).attr("idCust");
            $.ajax({
                url: "<?= base_url(); ?>Shop/read/cust",
                method: "post",
                data: {
                    id_pengirim: idCust,
                    id_penerima: idMerchant
                },
                success: function(result) {
                    window.location.href = '<?= base_url(); ?>Shop/chatMerchant/'.concat(idCust);
                }
            });

        });


        $(".backtoMenu").click(function() {
            window.location.href = '<?= base_url(); ?>MainMenu';
        });

        $(".wrapProfile").click(function() {
            window.location.href = '<?= base_url(); ?>Shop/viewProfile/';
        });
    </script>
</body>

</html>