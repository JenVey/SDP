<?php foreach ($channel as $chn) {
    foreach ($channelU as $chnU) {
        if ($chnU['id_channel'] == $chn['id_channel'] && $chnU['id_user'] == $user['id_user'] && $chnU['jenis'] != -1) { ?>
            <div class="accItem listChannel" idChannel="<?= $chn['id_channel'] ?>" <?php if (isset($channelA)) {
                                                                                        if ($chn['id_channel'] == $channelA['id_channel']) {
                                                                                            echo "id='active'";
                                                                                        }
                                                                                    } ?>>
                <div class="profileImg" style="margin-left: 0;"><img src="data:image/jpeg;base64,<?= base64_encode($chn['foto_channel']) ?>" width="50" height="50" alt="" /></div>
                <h6 class="profileName"><?= $chn['nama_channel'] ?></h6>
            </div>
<?php }
    }
} ?>