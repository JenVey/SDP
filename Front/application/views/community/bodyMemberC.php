<div class="titleAccList">
    <div class="hl"></div>
    <h4 style="color: #d7c13f;">Member List</h4>
    <div class="hl"></div>
</div>
<?php
foreach ($channelU as $chnU) {
    if ($chnU['id_channel'] == $channelA['id_channel']) {
        if ($chnU['jenis'] == 2) { ?>
            <div class="accItem member">
                <div class="Details">
                    <div class="profileImg" style="margin-left: 0;"><img src="data:image/jpeg;base64,<?= base64_encode($chnU['foto']) ?>" alt="" /></div>
                    <h6 class="profileName <?php if ($chnU['status'] == 0) {
                                                echo "offline";
                                            } ?>"><?= $chnU['nama_user'] ?></h6>
                </div>
                <div style="margin-right: 2vw;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22.5" height="18" viewBox="0 0 22.5 18">
                        <path id="Icon_awesome-crown" data-name="Icon awesome-crown" d="M18.563,15.75H3.938a.564.564,0,0,0-.562.563v1.125A.564.564,0,0,0,3.938,18H18.563a.564.564,0,0,0,.563-.562V16.313A.564.564,0,0,0,18.563,15.75ZM20.813,4.5a1.688,1.688,0,0,0-1.687,1.688,1.653,1.653,0,0,0,.155.7L16.734,8.409A1.123,1.123,0,0,1,15.18,8L12.315,2.988a1.688,1.688,0,1,0-2.13,0L7.32,8a1.124,1.124,0,0,1-1.554.408L3.224,6.884a1.687,1.687,0,1,0-1.536.991,1.723,1.723,0,0,0,.271-.028L4.5,14.625H18l2.542-6.778a1.723,1.723,0,0,0,.271.028,1.688,1.688,0,0,0,0-3.375Z" fill="#d7c13f" />
                    </svg>
                </div>
            </div>
        <?php } elseif ($chnU['jenis'] == 0 || $chnU['jenis'] == 1) { ?>
            <div class="accItem member" idUser="<?= $chnU['id_user'] ?>">
                <div class="Details">
                    <div class="profileImg" style="margin-left: 0;"><img src="data:image/jpeg;base64,<?= base64_encode($chnU['foto']) ?>" alt="" /></div>
                    <h6 class="profileName <?php if ($chnU['status'] == 0) {
                                                echo "offline";
                                            } ?>"><?= $chnU['nama_user'] ?></h6>
                </div>
            </div>
<?php }
    }
} ?>