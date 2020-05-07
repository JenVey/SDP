<?php foreach ($teamR as $timR) {
    if ($timR['id_team'] == $teamA['id_team']) { ?>
        <div class="reminderItem">
            <div class="reminderTime">
                <h4 class="varela" style="color: #ecf0f1;"><?= date_format(date_create($timR['waktu']), "H:i") ?></h4>
                <h6 class="varela" style="font-size: 14px;color: #d7c13f;"> <?= date_format(date_create($timR['waktu']), "d/m/Y") ?> </h6>
            </div>
            <div class="reminderDetails" id="reminder1">
                <input type="hidden" id="reminderValue1" value="2020-05-06T16:19:20Z">
                <h5 class="yellow" id="reminder1Name"><?= $timR['judul'] ?></h5>
                <div class="reminderDesc" id="reminder1Desc">
                    <p><?= $timR['keterangan'] ?></p>
                </div>
            </div>
            <p class="dateReminder">Created on <?= date_format(date_create($timR['waktu']), "d F Y") ?> by Yosua</p>
        </div>
<?php }
} ?>