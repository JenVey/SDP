<?php foreach ($teamM as $timM) {
    if ($timM['id_team'] == $teamA['id_team']) {
        if ($teamA['id_user'] == $user['id_user']) { ?>
            <div class="memberItem master" idUser="<?= $timM['id_user'] ?>">
                <div class="memberImg">
                    <img src="data:image/jpeg;base64,<?= base64_encode($timM['foto']) ?>" alt="">
                </div>
                <div class="memberDetails">
                    <h5 style="margin-left: 1vw;color: #ecf0f1;"><?= $timM['nama_user'] ?></h5>
                    <svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" viewBox="0 0 30.892 42.171">
                        <g id="Group_191" data-name="Group 191" transform="translate(-10453.899 -1088.228)">
                            <path id="Icon_awesome-crown" data-name="Icon awesome-crown" d="M13.747,11.664H2.916a.418.418,0,0,0-.417.417v.833a.418.418,0,0,0,.417.417H13.747a.418.418,0,0,0,.417-.417v-.833A.418.418,0,0,0,13.747,11.664Zm1.666-8.331a1.25,1.25,0,0,0-1.25,1.25,1.224,1.224,0,0,0,.115.516l-1.885,1.13a.832.832,0,0,1-1.151-.3L9.12,2.213a1.25,1.25,0,1,0-1.578,0L5.421,5.926a.833.833,0,0,1-1.151.3L2.387,5.1a1.249,1.249,0,1,0-1.138.734,1.276,1.276,0,0,0,.2-.021l1.882,5.02h10l1.882-5.02a1.276,1.276,0,0,0,.2.021,1.25,1.25,0,0,0,0-2.5Z" transform="translate(10469.689 1088.228) rotate(25)" fill="#d7c13f" />
                            <path id="Icon_awesome-user-alt" data-name="Icon awesome-user-alt" d="M13.949,15.693A7.847,7.847,0,1,0,6.1,7.847,7.849,7.849,0,0,0,13.949,15.693Zm6.975,1.744h-3a9.485,9.485,0,0,1-7.945,0h-3A6.974,6.974,0,0,0,0,24.412v.872A2.616,2.616,0,0,0,2.616,27.9H25.283A2.616,2.616,0,0,0,27.9,25.283v-.872A6.974,6.974,0,0,0,20.924,17.437Z" transform="translate(10453.899 1102.5)" fill="#d7c13f" />
                        </g>
                    </svg>
                </div>
            </div>
        <?php } else { ?>
            <div class="memberItem regular" idUser="<?= $timM['id_user'] ?>">
                <div class="memberImg">
                    <img src="data:image/jpeg;base64,<?= base64_encode($timM['foto']) ?>" alt="">
                </div>
                <div class="memberDetails">
                    <h5 style="margin-left: 1vw;color: #ecf0f1;"><?= $timM['nama_user'] ?></h5>
                    <svg xmlns="http://www.w3.org/2000/svg" width="27.899" height="27.899" viewBox="0 0 27.899 27.899">
                        <path id="member" data-name="Icon awesome-user-alt" d="M13.949,15.693A7.847,7.847,0,1,0,6.1,7.847,7.849,7.849,0,0,0,13.949,15.693Zm6.975,1.744h-3a9.485,9.485,0,0,1-7.945,0h-3A6.974,6.974,0,0,0,0,24.412v.872A2.616,2.616,0,0,0,2.616,27.9H25.283A2.616,2.616,0,0,0,27.9,25.283v-.872A6.974,6.974,0,0,0,20.924,17.437Z" fill="#d7c13f" />
                    </svg>
                </div>
            </div>
<?php }
    }
}  ?>