<div class="members" style="margin-bottom: 8vh;">
    <?php foreach ($channelU as $chnU) {
        if ($chnU['id_channel'] == $channelA['id_channel']) {
            if ($chnU['jenis'] == 2) { ?>
                <div class="memberItem master" idUser="<?= $chnU['id_user'] ?>">
                    <div class="memberImg">
                        <img src="data:image/jpeg;base64,<?= base64_encode($chnU['foto']) ?>" alt="">
                    </div>
                    <div class="memberDetails">
                        <h5 style="margin-left: 1vw;color: #ecf0f1;"><?= $chnU['nama_user'] ?></h5>
                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 30.892 42.171">
                            <g id="Group_191" data-name="Group 191" transform="translate(-10453.899 -1088.228)">
                                <path id="Icon_awesome-crown" data-name="Icon awesome-crown" d="M13.747,11.664H2.916a.418.418,0,0,0-.417.417v.833a.418.418,0,0,0,.417.417H13.747a.418.418,0,0,0,.417-.417v-.833A.418.418,0,0,0,13.747,11.664Zm1.666-8.331a1.25,1.25,0,0,0-1.25,1.25,1.224,1.224,0,0,0,.115.516l-1.885,1.13a.832.832,0,0,1-1.151-.3L9.12,2.213a1.25,1.25,0,1,0-1.578,0L5.421,5.926a.833.833,0,0,1-1.151.3L2.387,5.1a1.249,1.249,0,1,0-1.138.734,1.276,1.276,0,0,0,.2-.021l1.882,5.02h10l1.882-5.02a1.276,1.276,0,0,0,.2.021,1.25,1.25,0,0,0,0-2.5Z" transform="translate(10469.689 1088.228) rotate(25)" fill="#d7c13f" />
                                <path id="Icon_awesome-user-alt" data-name="Icon awesome-user-alt" d="M13.949,15.693A7.847,7.847,0,1,0,6.1,7.847,7.849,7.849,0,0,0,13.949,15.693Zm6.975,1.744h-3a9.485,9.485,0,0,1-7.945,0h-3A6.974,6.974,0,0,0,0,24.412v.872A2.616,2.616,0,0,0,2.616,27.9H25.283A2.616,2.616,0,0,0,27.9,25.283v-.872A6.974,6.974,0,0,0,20.924,17.437Z" transform="translate(10453.899 1102.5)" fill="#d7c13f" />
                            </g>
                        </svg>
                    </div>
                </div>

            <?php } else if ($chnU['jenis'] == 1) { ?>
                <div class="memberItem admin" idUser="<?= $chnU['id_user'] ?>">
                    <div class="memberImg">
                        <img src="data:image/jpeg;base64,<?= base64_encode($chnU['foto']) ?>" alt="">
                    </div>
                    <div class="memberDetails">
                        <h5 style="margin-left: 1vw;color: #ecf0f1;"><?= $chnU['nama_user'] ?></h5>
                        <svg xmlns="http://www.w3.org/2000/svg" width="31" height="29" viewBox="0 0 27.899 28.402">
                            <g id="Group_192" data-name="Group 192" transform="translate(-10461.899 -1132.996)">
                                <path id="Icon_awesome-user-alt" data-name="Icon awesome-user-alt" d="M20.924,17.437h-3a9.485,9.485,0,0,1-7.945,0h-3A6.974,6.974,0,0,0,0,24.412v.872A2.616,2.616,0,0,0,2.616,27.9H25.283A2.616,2.616,0,0,0,27.9,25.283v-.872A6.974,6.974,0,0,0,20.924,17.437Z" transform="translate(10461.899 1133.5)" fill="#d7c13f" />
                                <path id="Icon_ionic-ios-settings" data-name="Icon ionic-ios-settings" d="M19.733,12.8A2.137,2.137,0,0,1,21.1,10.808,8.469,8.469,0,0,0,20.079,8.34a2.165,2.165,0,0,1-.869.186,2.132,2.132,0,0,1-1.95-3A8.443,8.443,0,0,0,14.8,4.5a2.135,2.135,0,0,1-3.987,0A8.469,8.469,0,0,0,8.34,5.525a2.132,2.132,0,0,1-1.95,3A2.1,2.1,0,0,1,5.52,8.34,8.656,8.656,0,0,0,4.5,10.813a2.136,2.136,0,0,1,0,3.987,8.469,8.469,0,0,0,1.025,2.469,2.133,2.133,0,0,1,2.815,2.815,8.518,8.518,0,0,0,2.469,1.025,2.131,2.131,0,0,1,3.978,0,8.469,8.469,0,0,0,2.469-1.025,2.135,2.135,0,0,1,2.815-2.815A8.518,8.518,0,0,0,21.1,14.8,2.147,2.147,0,0,1,19.733,12.8Zm-6.892,3.455A3.459,3.459,0,1,1,16.3,12.8,3.458,3.458,0,0,1,12.841,16.257Z" transform="translate(10463.1 1128.496)" fill="#d7c13f" />
                            </g>
                        </svg>
                    </div>
                </div>
            <?php } else if ($chnU['jenis'] == 0) { ?>
                <div class="memberItem regular" idUser="<?= $chnU['id_user'] ?>">
                    <div class="memberImg">
                        <img src="data:image/jpeg;base64,<?= base64_encode($chnU['foto']) ?>" alt="">
                    </div>
                    <div class="memberDetails">
                        <h5 style="margin-left: 1vw;color: #ecf0f1;"><?= $chnU['nama_user'] ?></h5>
                        <svg xmlns="http://www.w3.org/2000/svg" width="27.899" height="27.899" viewBox="0 0 27.899 27.899">
                            <path id="member" data-name="Icon awesome-user-alt" d="M13.949,15.693A7.847,7.847,0,1,0,6.1,7.847,7.849,7.849,0,0,0,13.949,15.693Zm6.975,1.744h-3a9.485,9.485,0,0,1-7.945,0h-3A6.974,6.974,0,0,0,0,24.412v.872A2.616,2.616,0,0,0,2.616,27.9H25.283A2.616,2.616,0,0,0,27.9,25.283v-.872A6.974,6.974,0,0,0,20.924,17.437Z" fill="#d7c13f" />
                        </svg>
                    </div>
                </div>
    <?php }
        }
    }  ?>
</div>
<h3 style="margin: 4vh 0;color: #ecf0f1;">User Requests</h3>
<div class="members">
    <?php foreach ($channelU as $chnU) {
        if ($chnU['id_channel'] == $channelA['id_channel'] && $chnU['jenis'] == -1) { ?>
            <div class="memberItem request" idUser="<?= $chnU['id_user'] ?>">
                <div class="memberImg">
                    <img src="data:image/jpeg;base64,<?= base64_encode($chnU['foto']) ?>" alt="">
                </div>
                <h5 style="margin-left: 1vw;color: #ecf0f1;"><?= $chnU['nama_user'] ?></h5>
            </div>
    <?php }
    } ?>
</div>