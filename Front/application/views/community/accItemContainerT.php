<?php foreach ($team as $tim) { ?>
    <div class="accItem listChannel" idTeam="<?= $tim['id_team'] ?>" <?php if (isset($teamA)) {
                                                                            if ($tim['id_team'] == $teamA['id_team']) {
                                                                                echo "id='active'";
                                                                            }
                                                                        } ?>>
        <div class="profileImg" style="margin-left: 0;"><img src="" width="50" height="50" alt="" /></div>
        <h6 class="profileName"><?= $tim['nama_team'] ?></h6>
    </div>
<?php } ?>