<?php foreach ($channelE as $chnE) {
    if ($chnE['id_channel'] == $channelA['id_channel']) { ?>
        <div class="eventItem">
            <div class="eventImg">
                <img src="data:image/jpeg;base64,<?= base64_encode($chnE['foto']) ?>" alt="">
            </div>
            <div class="eventDetails">
                <h5 class="yellow"><?= $chnE['judul'] ?></h5>
                <div class="eventDesc">
                    <p><?= $chnE['pesan'] ?></p>
                </div>
            </div>
            <p class="dateEvent">Created on <?= date_format(date_create($chnE['tanggal']), "d F Y")  ?> by <?= $chnE['nama_user'] ?></p>
        </div>
<?php }
} ?>