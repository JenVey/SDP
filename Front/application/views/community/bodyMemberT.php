<div class="titleAccList">
    <div class="hl"></div>
    <h4 style="color: #d7c13f;">Member List</h4>
    <div class="hl"></div>
</div>
<?php
foreach ($teamM as $timM) {
    if ($timM['id_team'] == $teamA['id_team']) { ?>
        <div class="accItem member">
            <div class="Details">
                <div class="profileImg" style="margin-left: 0;"><img src="data:image/jpeg;base64,<?= base64_encode($timM['foto']) ?>" alt="" /></div>
                <h6 class="profileName <?php if ($timM['status'] == 0) {
                                            echo "offline";
                                        } ?>"><?= $timM['nama_user'] ?></h6>
            </div>
        </div>
<?php }
} ?>