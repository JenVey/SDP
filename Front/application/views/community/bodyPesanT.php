<?php $cekTgl = "";
foreach ($pesan as $psn) {
    if ($psn['id_penerima'] == $teamA['id_team']) {
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