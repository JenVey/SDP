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

<script>
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