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

    <?php if (isset($custA) && isset($mchId)) { ?>
        idCust = '<?= $custA['id_user'] ?>';
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
</script>