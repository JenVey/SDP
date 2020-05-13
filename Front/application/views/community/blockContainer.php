<?php foreach ($friend as $frn) {
    if ($frn['status'] == -1) { ?>
        <div class="accItem listBlock" idFriend="<?= $frn['id_user'] ?>" <?php if (isset($friendA)) {
                                                                                if ($frn['id_user'] == $friendA['id_user']) {
                                                                                    echo "id='active'";
                                                                                }
                                                                            } ?>>
            <div class="profileImg" style="margin-left: 0;"><img src="data:image/jpeg;base64,<?= base64_encode($frn['foto']) ?>" width="50" height="50" alt="" /></div>
            <h6 class="profileName"><?= $frn['nama_user'] ?></h6>
        </div>
<?php }
}
?>