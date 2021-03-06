<?php foreach ($tournament as $turney) {
    if ($turney['id_channel'] == $channelA['id_channel'] && $turney['status'] != -1) {
        if ($turney['jenis_pemain'] == 1) {
            $jenis = "person";
        } else {
            $jenis = "team";
        }
?>
        <div class="tourneyItem" jenis="<?= $jenis ?>" jumlahPemain="<?= $turney['jumlah_pemain'] ?>" jumlahSlot="<?= $turney['jumlah_slot'] ?>" idTournament=<?= $turney['id_turnament'] ?> statusTurney="<?= $turney['status'] ?>">
            <h4 class="yellow varela" style="margin-top: 2vh;"><?= $turney['nama_game'] ?></h4>
            <h6 class="varela" style="margin-top: 1vh;color: #ecf0f1;"><?= $turney['nama_turnament'] ?></h6>
            <h6 style="font-size: 12px; color: rgba(236,240,241,0.37);"><?= $turney['jumlah_slot'] ?> Slots | <?= ucfirst($jenis)  ?></h6>
            <div class="standingsContainer">
                <h6 class="varela" style="color: #ecf0f1;">Standings</h6>
                <div class="standings">
                    <div class="place" style="color: #D1D1D1;">
                        2
                        <h6><?php foreach ($standing as $stand) {
                                if ($stand['id_turnament'] == $turney['id_turnament']) {
                                    echo $stand['juara_2'];
                                }
                            }
                            ?></h6>
                    </div>
                    <div class="place" style="color: #d7c13f;">
                        1
                        <h6><?php foreach ($standing as $stand) {
                                if ($stand['id_turnament'] == $turney['id_turnament']) {
                                    echo $stand['juara_1'];
                                }
                            }
                            ?></h6>
                    </div>
                    <div class="place" style="color: #B98316;">
                        3
                        <h6><?php foreach ($standing as $stand) {
                                if ($stand['id_turnament'] == $turney['id_turnament']) {
                                    echo $stand['juara_3'];
                                }
                            }
                            ?></h6>
                    </div>
                </div>
            </div>
            <div class="startDate">
                <?php if ($turney['status'] == 0) {
                    echo "<p class='available'> Available </p>";
                } else if ($turney['status'] == 1) {
                    echo "<p class='ongoing'> Full </p>";
                } else if ($turney['status'] == 2) {
                    echo "<p class='ongoing'> OnGoing </p>";
                } else if ($turney['status'] == 3) {
                    echo "<p class='finished'> Finished </p>";
                } ?>
                <p>Start: <span style="color: rgba(215,193,63,0.70);"><?= date_format(date_create($turney['tanggal_mulai']), "d F Y")  ?></span></p>
            </div>
        </div>
<?php }
} ?>