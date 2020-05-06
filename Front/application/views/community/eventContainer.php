<div class="createTournamentForm collapse" id="eventForm">
    <div class="tourname">
        <h5 class="varela">Event Name</h5>
        <input type="text" name="eventName" id="tourName">
    </div>
    <div class="tourname" style="width: 70%;">
        <h5 class="varela">Message</h5>
        <textarea name="message" id="message" cols="30" rows="10"></textarea>
    </div>
    <div class="tourname" style="margin-top: 8vh;width: 65%;">
        <input type="file" name="imgEvent" id="imgEvent" accept="image/x-png,image/jpg,image/jpeg" hidden>
        <h5 class="varela" style="margin-left: 0.5vw;">Image</h5>
        <div class="imageShow">
            <div class="imageContainer">
                <img class="img" style="display: block;" src="" alt="" hidden>
                <h6 class="varela imgText">Click here to select Image</h6>
            </div>
        </div>
    </div>
</div>
<?php if (isset($_SESSION['admin'])) { ?>
    <button id="createEvent">
        <h6 class="varela">Create Event</h6>
    </button>
<?php } ?>
<div class="events">
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
</div>