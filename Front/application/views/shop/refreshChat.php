<?php
foreach ($merchant as $mch) {
    $mchId = $mch['id'];
    $mchNama = $mch['nama'];
    $mchDesc = $mch['bio'];
    $mchFoto = $mch['foto'];
    $mchRating = $mch['rating'];
}
?>
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

            <?php if (isset($user) && isset($mchId)) { ?>
                idUser = '<?= $user['id_user'] ?>';
                idMerchant = '<?= $mchId ?>';
            <?php } ?>


            //alert(pesan);
            //alert(idMerchant);
            $.ajax({
                url: "<?= base_url(); ?>Shop/insertPesan/".concat('<?= $mchId ?>'),
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
</script>