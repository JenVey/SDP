<?php $ctr = 0;
foreach ($teamR as $timR) {
    if ($timR['id_team'] == $teamA['id_team']) { ?>
        <div class="reminderItem">
            <div class="reminderTime">
                <h4 class="varela" style="color: #ecf0f1;"><?= date_format(date_create($timR['waktu']), "H:i") ?></h4>
                <h6 class="varela" style="font-size: 14px;color: #d7c13f;"> <?= date_format(date_create($timR['waktu']), "d/m/Y") ?> </h6>
            </div>
            <div class="reminderDetails" id="reminder<?= $ctr ?>">
                <input type="text" id="reminderTime<?= $ctr ?>" value="<?= date_format(date_create($timR['waktu']), "Y-m-d") ?>T<?= date_format(date_create($timR['waktu']), "H:i") . ":00" ?>Z" hidden>
                <h5 class="yellow" id="reminder<?= $ctr ?>Name"><?= $timR['judul'] ?></h5>
                <div class="reminderDesc" id="reminder<?= $ctr ?>Desc">
                    <p><?= $timR['keterangan'] ?></p>
                </div>
            </div>
        </div>
<?php }
    $ctr++;
} ?>