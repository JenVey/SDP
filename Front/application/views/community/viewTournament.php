<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script|Herr+Von+Muellerhoff' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Abel' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Istok+Web|Roboto+Condensed:700' rel='stylesheet' type='text/css'>

    <link rel="icon" href="<?php echo base_url(); ?>asset/Images/android-chrome-512x512.png">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/channelCSS.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/animation.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/alertify.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/tournamentCSS.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/themes/default.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/themes/default.css">
    <script src="<?php echo base_url(); ?>asset/Js/alertify.js"></script>
    <script src="<?php echo base_url(); ?>asset/Js/jquery-min.js"></script>
    <script src="<?php echo base_url(); ?>asset/Js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>asset/Js/textFit.js"></script>
    <script src="<?php echo base_url(); ?>asset/Js/datepicker.js"></script>
    <script src="<?php echo base_url(); ?>asset/Js/jquery-clockpicker.min.js"></script>

    <title>gather.owl - Tournament</title>
</head>
<?php

foreach ($tournament as $turney) {
    if ($turney['id_turnament'] == $_SESSION['idTournament']) {
        $slot = $turney['jumlah_slot'];
    }
}

// foreach ($pertandingan as $stand) {
//     echo "A";
//     if ($stand['id_turnament'] == $idTurney && strpos($stand['bagian'], 'round1kiri') === true) {
//         echo $stand['team_1'];
//         echo "A";
//     }
// }
// echo $slot;
$idTurney = $_SESSION['idTournament'];
?>


<body>
    <header class="hero">
        <div class="hero-wrap">
            <p class="intro" id="intro"><?= $channelA['nama_channel'] ?></p>
            <h1 id="headline">IEM KATOWICE</h1>
            <p class="year"><i class="fa fa-star"></i> <?php foreach ($tournament as $turney) {
                                                            if ($turney['id_turnament'] == $_SESSION['idTournament']) {
                                                                echo $turney['tanggal_mulai'];
                                                            }
                                                        } ?> <i class="fa fa-star"></i></p>
            <p>Counter Strike : Global Offensive</p>
        </div>
    </header>

    <section id="bracket">
        <div class="container">
            <?php if ($slot > 7) { ?>
                <div class="split split-one">
                    <?php if ($slot > 31) { ?>
                        <div class="round round-one current">
                            <div class="round-details" bagian="round1kiri">Round 1<br /></div>
                            <?php foreach ($pertandingan as $stand) {
                                if ($stand['id_turnament'] == $idTurney && strpos($stand['bagian'], 'round1kiri') !== false) { ?>
                                    <ul class="matchup" bagian="<?= $stand['bagian'] ?>">
                                        <?php if ($stand['team_1'] == "") { ?>
                                            <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                                        <?php } else { ?>
                                            <li class="team team-top"><?= $stand['team_1'] ?><span class="score"><?= $stand['skor_1'] ?></span></li>
                                        <?php } ?>

                                        <?php if ($stand['team_2'] == "") { ?>
                                            <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                                        <?php } else { ?>
                                            <li class="team team-bottom"><?= $stand['team_2'] ?><span class="score"><?= $stand['skor_2'] ?></span></li>
                                        <?php } ?>
                                    </ul>
                            <?php }
                            } ?>
                        </div>
                        <div class="round round-two">
                            <div class="round-details" bagian="round2kiri">Round 2<br /></div>
                            <?php foreach ($pertandingan as $stand) {
                                if ($stand['id_turnament'] == $idTurney && strpos($stand['bagian'], 'round2kiri') !== false) { ?>
                                    <ul class="matchup" bagian="<?= $stand['bagian'] ?>">
                                        <?php if ($stand['team_1'] == "") { ?>
                                            <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                                        <?php } else { ?>
                                            <li class="team team-top"><?= $stand['team_1'] ?><span class="score"><?= $stand['skor_1'] ?></span></li>
                                        <?php } ?>

                                        <?php if ($stand['team_2'] == "") { ?>
                                            <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                                        <?php } else { ?>
                                            <li class="team team-bottom"><?= $stand['team_2'] ?><span class="score"><?= $stand['skor_2'] ?></span></li>
                                        <?php } ?>
                                    </ul>
                            <?php }
                            } ?>
                        </div>
                    <?php
                    } else if ($slot > 15) { ?>
                        <?php if ($slot == 16) { ?>
                            <div class="round round-two current">
                            <?php } else { ?>
                                <div class="round round-two">
                                <?php } ?>
                                <div class="round-details" bagian="round1kiri">Round 1<br /></div>
                                <?php foreach ($pertandingan as $stand) {
                                    if ($stand['id_turnament'] == $idTurney && strpos($stand['bagian'], 'round1kiri') !== false) { ?>
                                        <ul class="matchup" bagian="<?= $stand['bagian'] ?>">
                                            <?php if ($stand['team_1'] == "") { ?>
                                                <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                                            <?php } else { ?>
                                                <li class="team team-top"><?= $stand['team_1'] ?><span class="score"><?= $stand['skor_1'] ?></span></li>
                                            <?php } ?>

                                            <?php if ($stand['team_2'] == "") { ?>
                                                <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                                            <?php } else { ?>
                                                <li class="team team-bottom"><?= $stand['team_2'] ?><span class="score"><?= $stand['skor_2'] ?></span></li>
                                            <?php } ?>
                                        </ul>
                                <?php }
                                } ?>
                                </div>

                            <?php } ?>

                            <?php if ($slot == 8) { ?>
                                <div class="round round-three current">
                                <?php } else { ?>
                                    <div class="round round-three">
                                    <?php } ?>
                                    <div class="round-details" bagian="quarterfinalkiri">Quarter Final<br /></div>
                                    <?php foreach ($pertandingan as $stand) {
                                        if ($stand['id_turnament'] == $idTurney && strpos($stand['bagian'], 'quarterfinalkiri') !== false) { ?>
                                            <ul class="matchup" bagian="<?= $stand['bagian'] ?>">
                                                <?php if ($stand['team_1'] == "") { ?>
                                                    <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                                                <?php } else { ?>
                                                    <li class="team team-top"><?= $stand['team_1'] ?><span class="score"><?= $stand['skor_1'] ?></span></li>
                                                <?php } ?>

                                                <?php if ($stand['team_2'] == "") { ?>
                                                    <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                                                <?php } else { ?>
                                                    <li class="team team-bottom"><?= $stand['team_2'] ?><span class="score"><?= $stand['skor_2'] ?></span></li>
                                                <?php } ?>
                                            </ul>
                                    <?php }
                                    } ?>
                                    </div>

                                </div>

                            <?php
                        } ?>



                            <div class="champion">
                                <?php if ($slot > 3) { ?>
                                    <?php if ($slot == 4) { ?>
                                        <div class="semis-l current">
                                        <?php } else { ?>
                                            <div class="semis-l">
                                            <?php } ?>
                                            <div class="round-details" bagian="semifinalkiri">semifinals <br /></div>
                                            <?php foreach ($pertandingan as $stand) {
                                                if ($stand['id_turnament'] == $idTurney && strpos($stand['bagian'], 'semifinalkiri') !== false) { ?>
                                                    <ul class="matchup championship" bagian="<?= $stand['bagian'] . "1" ?>">
                                                        <?php if ($stand['team_1'] == "") { ?>
                                                            <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                                                        <?php } else { ?>
                                                            <li class="team team-top"><?= $stand['team_1'] ?><span class="score"><?= $stand['skor_1'] ?></span></li>
                                                        <?php } ?>

                                                        <?php if ($stand['team_2'] == "") { ?>
                                                            <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                                                        <?php } else { ?>
                                                            <li class="team team-bottom"><?= $stand['team_2'] ?><span class="score"><?= $stand['skor_2'] ?></span></li>
                                                        <?php } ?>
                                                    </ul>
                                            <?php }
                                            } ?>
                                            </div>
                                        <?php
                                    } ?>
                                        <?php if ($slot == 1) { ?>
                                            <div class="final current">
                                            <?php } else { ?>
                                                <div class="final">
                                                <?php } ?>
                                                <i class="fa fa-trophy"></i>
                                                <div class="round-details" bagian="final">final <br /></div>
                                                <?php foreach ($pertandingan as $stand) {
                                                    if ($stand['id_turnament'] == $idTurney && $stand['bagian'] == 'final') { ?>
                                                        <ul class="matchup" bagian="<?= $stand['bagian'] . "1" ?>">
                                                            <?php if ($stand['team_1'] == "") { ?>
                                                                <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                                                            <?php } else { ?>
                                                                <li class="team team-top"><?= $stand['team_1'] ?><span class="score"><?= $stand['skor_1'] ?></span></li>
                                                            <?php } ?>

                                                            <?php if ($stand['team_2'] == "") { ?>
                                                                <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                                                            <?php } else { ?>
                                                                <li class="team team-bottom"><?= $stand['team_2'] ?><span class="score"><?= $stand['skor_2'] ?></span></li>
                                                            <?php } ?>
                                                        </ul>
                                                <?php }
                                                } ?>
                                                </div>
                                                <?php if ($slot > 3) { ?>
                                                    <?php if ($slot == 4) { ?>
                                                        <div class="semis-r current">
                                                        <?php } else { ?>
                                                            <div class="semis-r">
                                                            <?php } ?>
                                                            <div class="round-details" bagian="semifinalkanan">semifinals <br /></div>
                                                            <?php foreach ($pertandingan as $stand) {
                                                                if ($stand['id_turnament'] == $idTurney && strpos($stand['bagian'], 'semifinalkanan') !== false) { ?>
                                                                    <ul class="matchup" bagian="<?= $stand['bagian'] . "1" ?>">
                                                                        <?php if ($stand['team_1'] == "") { ?>
                                                                            <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                                                                        <?php } else { ?>
                                                                            <li class="team team-top"><?= $stand['team_1'] ?><span class="score"><?= $stand['skor_1'] ?></span></li>
                                                                        <?php } ?>

                                                                        <?php if ($stand['team_2'] == "") { ?>
                                                                            <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                                                                        <?php } else { ?>
                                                                            <li class="team team-bottom"><?= $stand['team_2'] ?><span class="score"><?= $stand['skor_2'] ?></span></li>
                                                                        <?php } ?>
                                                                    </ul>
                                                            <?php }
                                                            } ?>
                                                            </div>
                                                        <?php } ?>
                                                        </div>

                                                        <?php if ($slot > 7) { ?>
                                                            <div class="split split-two">
                                                                <?php if ($slot < 15) { ?>
                                                                    <div class="round round-three current">
                                                                    <?php } else { ?>
                                                                        <div class="round round-three">
                                                                        <?php } ?>
                                                                        <div class="round-details" bagian="quarterfinalkanan">Quarter Final<br /></div>
                                                                        <?php foreach ($pertandingan as $stand) {
                                                                            if ($stand['id_turnament'] == $idTurney && strpos($stand['bagian'], 'quarterfinalkanan') !== false) { ?>
                                                                                <ul class="matchup" bagian="<?= $stand['bagian'] ?>">
                                                                                    <?php if ($stand['team_1'] == "") { ?>
                                                                                        <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                                                                                    <?php } else { ?>
                                                                                        <li class="team team-top"><?= $stand['team_1'] ?><span class="score"><?= $stand['skor_1'] ?></span></li>
                                                                                    <?php } ?>

                                                                                    <?php if ($stand['team_2'] == "") { ?>
                                                                                        <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                                                                                    <?php } else { ?>
                                                                                        <li class="team team-bottom"><?= $stand['team_2'] ?><span class="score"><?= $stand['skor_2'] ?></span></li>
                                                                                    <?php } ?>
                                                                                </ul>
                                                                        <?php }
                                                                        } ?>
                                                                        </div>

                                                                        <?php if ($slot > 15 && $slot < 31) { ?>
                                                                            <div class="round round-two current">
                                                                                <div class="round-details" bagian="round1kanan">Round 1<br /></div>
                                                                                <?php foreach ($pertandingan as $stand) {
                                                                                    if ($stand['id_turnament'] == $idTurney && strpos($stand['bagian'], 'round1kanan') !== false) { ?>
                                                                                        <ul class="matchup" bagian="<?= $stand['bagian'] ?>">
                                                                                            <?php if ($stand['team_1'] == "") { ?>
                                                                                                <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                                                                                            <?php } else { ?>
                                                                                                <li class="team team-top"><?= $stand['team_1'] ?><span class="score"><?= $stand['skor_1'] ?></span></li>
                                                                                            <?php } ?>

                                                                                            <?php if ($stand['team_2'] == "") { ?>
                                                                                                <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                                                                                            <?php } else { ?>
                                                                                                <li class="team team-bottom"><?= $stand['team_2'] ?><span class="score"><?= $stand['skor_2'] ?></span></li>
                                                                                            <?php } ?>
                                                                                        </ul>
                                                                                <?php }
                                                                                } ?>
                                                                            </div>
                                                                        <?php } ?>

                                                                        <?php if ($slot > 31) { ?>
                                                                            <div class="round round-two">
                                                                                <div class="round-details" bagian="round2kanan">Round 2<br /></div>
                                                                                <?php foreach ($pertandingan as $stand) {
                                                                                    if ($stand['id_turnament'] == $idTurney && strpos($stand['bagian'], 'round2kanan') !== false) { ?>
                                                                                        <ul class="matchup" bagian="<?= $stand['bagian'] ?>">
                                                                                            <?php if ($stand['team_1'] == "") { ?>
                                                                                                <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                                                                                            <?php } else { ?>
                                                                                                <li class="team team-top"><?= $stand['team_1'] ?><span class="score"><?= $stand['skor_1'] ?></span></li>
                                                                                            <?php } ?>

                                                                                            <?php if ($stand['team_2'] == "") { ?>
                                                                                                <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                                                                                            <?php } else { ?>
                                                                                                <li class="team team-bottom"><?= $stand['team_2'] ?><span class="score"><?= $stand['skor_2'] ?></span></li>
                                                                                            <?php } ?>
                                                                                        </ul>
                                                                                <?php }
                                                                                } ?>
                                                                            </div>
                                                                            <div class="round round-one current">
                                                                                <div class="round-details" bagian="round1kanan">Round 1<br /></div>
                                                                                <?php foreach ($pertandingan as $stand) {
                                                                                    if ($stand['id_turnament'] == $idTurney && strpos($stand['bagian'], 'round1kanan') !== false) { ?>
                                                                                        <ul class="matchup" bagian="<?= $stand['bagian'] ?>">
                                                                                            <?php if ($stand['team_1'] == "") { ?>
                                                                                                <li class="team team-top">&nbsp;<span class="score">&nbsp;</span></li>
                                                                                            <?php } else { ?>
                                                                                                <li class="team team-top"><?= $stand['team_1'] ?><span class="score"><?= $stand['skor_1'] ?></span></li>
                                                                                            <?php } ?>

                                                                                            <?php if ($stand['team_2'] == "") { ?>
                                                                                                <li class="team team-bottom">&nbsp;<span class="score">&nbsp;</span></li>
                                                                                            <?php } else { ?>
                                                                                                <li class="team team-bottom"><?= $stand['team_2'] ?><span class="score"><?= $stand['skor_2'] ?></span></li>
                                                                                            <?php } ?>
                                                                                        </ul>
                                                                                <?php }
                                                                                } ?>
                                                                            </div>
                                                                        <?php } ?>
                                                                    </div>
                                                                <?php } ?>
                                                            </div>

    </section>
    <section>
        <div class="footer">
            <svg xmlns="http://www.w3.org/2000/svg" width="104.248" height="51.365" viewBox="0 0 104.248 51.365">
                <g id="Group_196" data-name="Group 196" transform="translate(-160.188 89.73)">
                    <g id="Group_194" data-name="Group 194" transform="translate(161.205 -88.73)">
                        <path id="Path_1941" data-name="Path 1941" d="M191.9-50.08s-25.468,6.147-30.3-15.392l-.4-23.259h25.507s10.566.2,23.517,14.063L205.458-69.7s-10-11.507-18.746-12.686l-18.122-.1.17,16.866s3.466,12.539,18.8,10.375Z" transform="translate(-161.205 88.73)" fill="#d6b329" stroke="#1e2126" stroke-miterlimit="10" stroke-width="2" />
                        <path id="Path_1942" data-name="Path 1942" d="M214.815-65.053l6.418,8.285L208.357-40,195.33-56.718s21.245-31.667,38.628-32.011h25.45v22.521s-3.068,21.538-30.733,16.326l4.488-5.311s16.645,2.213,18.974-11.113l-.057-16.079H233.958s-8.748-.639-30.221,25.52l4.62,5.975,4.5-5.721-2.684-3.535Z" transform="translate(-157.178 88.73)" fill="#d6b329" stroke="#1e2126" stroke-miterlimit="10" stroke-width="2" />
                    </g>
                    <g id="Group_195" data-name="Group 195" transform="translate(231.396 -79.177)">
                        <ellipse id="Ellipse_189" data-name="Ellipse 189" cx="3.581" cy="3.304" rx="3.581" ry="3.304" transform="translate(6.253)" fill="#1a1818" stroke="#d6b329" stroke-miterlimit="10" stroke-width="0.25" />
                        <ellipse id="Ellipse_190" data-name="Ellipse 190" cx="3.581" cy="3.304" rx="3.581" ry="3.304" transform="translate(12.745 6.607)" fill="#1a1818" stroke="#d6b329" stroke-miterlimit="10" stroke-width="0.25" />
                        <ellipse id="Ellipse_191" data-name="Ellipse 191" cx="3.581" cy="3.304" rx="3.581" ry="3.304" transform="translate(0 6.607)" fill="#1a1818" stroke="#d6b329" stroke-miterlimit="10" stroke-width="0.25" />
                        <ellipse id="Ellipse_192" data-name="Ellipse 192" cx="3.581" cy="3.304" rx="3.581" ry="3.304" transform="translate(6.253 12.62)" fill="#1a1818" stroke="#d6b329" stroke-miterlimit="10" stroke-width="0.25" />
                    </g>
                    <ellipse id="Ellipse_193" data-name="Ellipse 193" cx="6.567" cy="6.305" rx="6.567" ry="6.305" transform="translate(175.482 -78.078)" fill="#1a1818" stroke="#d6b329" stroke-miterlimit="10" stroke-width="0.25" />
                </g>
            </svg>
            <p class="yellow" style="margin-top: 1vw;">&copy; 2020 Morning Owl. All rights reserved</p>
        </div>
    </section>
    <div class="create animated">
        <div class="horizonline"></div>
        <div class="teamContainer" style="z-index: 4;">
            <button class="winnerButton" id="winner1">WINNER</button>
            <h1 class="newName yellow" id="team1">Team 1</h1>
            <h1 class="newName" id="score1">0</h1>
            <div class="actionButton">
                <button class="minusBut" id="minus1">
                    <svg class="minus1" xmlns="http://www.w3.org/2000/svg" width="71" height="66" viewBox="0 0 46 41">
                        <g id="Group_185" data-name="Group 185" transform="translate(-15819.5 3056.5)">
                            <g id="Group_182" data-name="Group 182" transform="translate(86 -93)">
                                <rect id="Rectangle_302" data-name="Rectangle 302" width="43" height="38" rx="8" transform="translate(15735 -2962)" stroke-width="3" stroke="none" stroke-linecap="round" stroke-linejoin="bevel" fill="#d7c13f" />
                            </g>
                            <path id="Icon_material-add" data-name="Icon material-add" d="M28.5,19.5H7.5v-3h21Z" transform="translate(15824.7 -3054)" fill="#4C525D" />
                        </g>
                    </svg>
                </button>
                <button class="plusBut" id="plus1">
                    <svg class="plus1" xmlns="http://www.w3.org/2000/svg" width="71" height="66" viewBox="0 0 46 41">
                        <g id="Group_186" data-name="Group 186" transform="translate(-15879.5 3056.5)">
                            <g id="Group_184" data-name="Group 184" transform="translate(146 -93)">
                                <rect id="Rectangle_302" data-name="Rectangle 302" width="43" height="38" rx="8" transform="translate(15735 -2962)" stroke-width="3" stroke="none" stroke-linecap="round" stroke-linejoin="bevel" fill="#d7c13f" />
                            </g>
                            <path id="Icon_material-add" data-name="Icon material-add" d="M28.5,19.5h-9v9h-3v-9h-9v-3h9v-9h3v9h9Z" transform="translate(15884.7 -3054)" fill="#4C525D" />
                        </g>
                    </svg>
                </button>
            </div>
        </div>
        <div class="teamContainer" style="z-index: 4;">
            <button class="winnerButton" id="winner2">WINNER</button>
            <h1 class="newName yellow" id="team2">Team 2</h1>
            <h1 class="newName" id="score2">0</h1>
            <div class="actionButton">
                <button class="minusBut" id="minus2">
                    <svg class="minus2" xmlns="http://www.w3.org/2000/svg" width="71" height="66" viewBox="0 0 46 41">
                        <g id="Group_185" data-name="Group 185" transform="translate(-15819.5 3056.5)">
                            <g id="Group_182" data-name="Group 182" transform="translate(86 -93)">
                                <rect id="Rectangle_302" data-name="Rectangle 302" width="43" height="38" rx="8" transform="translate(15735 -2962)" stroke-width="3" stroke="none" stroke-linecap="round" stroke-linejoin="bevel" fill="#d7c13f" />
                            </g>
                            <path id="Icon_material-add" data-name="Icon material-add" d="M28.5,19.5H7.5v-3h21Z" transform="translate(15824.7 -3054)" fill="#4C525D" />
                        </g>
                    </svg>
                </button>
                <button class="plusBut" id="plus2">
                    <svg class="plus2" xmlns="http://www.w3.org/2000/svg" width="71" height="66" viewBox="0 0 46 41">
                        <g id="Group_186" data-name="Group 186" transform="translate(-15879.5 3056.5)">
                            <g id="Group_184" data-name="Group 184" transform="translate(146 -93)">
                                <rect id="Rectangle_302" data-name="Rectangle 302" width="43" height="38" rx="8" transform="translate(15735 -2962)" stroke-width="3" stroke="none" stroke-linecap="round" stroke-linejoin="bevel" fill="#d7c13f" />
                            </g>
                            <path id="Icon_material-add" data-name="Icon material-add" d="M28.5,19.5h-9v9h-3v-9h-9v-3h9v-9h3v9h9Z" transform="translate(15884.7 -3054)" fill="#4C525D" />
                        </g>
                    </svg>
                </button>
            </div>
        </div>
        <p style="color:#1e2126;position: absolute;bottom: 2vh;right: 2vh;">*Updated Winner can't be undone</p>
        <button class="createButton">Update Bracket</button>
    </div>
    <div class="bgblur"></div>
    <script src="Js/jquery-min.js"></script>
    <script src="Js/alertify.js"></script>
    <script>
        var admin = true; // <= Check admin
        var slots = parseInt('<?= $slot ?>'); // <= Total Slot
        ////////////////////////////////////
        var MAXround1kiri = -1;
        var MAXround1kanan = -1;
        var MAXround2kiri = -1;
        var MAXround2kanan = -1;
        var MAXquarterfinalkiri = -1;
        var MAXquarterfinalkanan = -1;
        var MAXsemifinalkiri = -1;
        var MAXsemifinalkanan = -1;
        var MAXfinal = -1;
        //////////////////////////////////////////////////
        var edit;
        $(document).ready(function() {
            $(".create").hide();
            $(".bgblur").hide();
            if (slots >= 4) {
                MAXsemifinalkiri = 1;
                MAXsemifinalkanan = 1;
            }
            if (slots >= 8) {
                MAXquarterfinalkiri = 2;
                MAXquarterfinalkanan = 2;
            }
            if (slots == 16) {
                MAXround1kiri = 4;
                MAXround1kanan = 4;
            } else if (slots == 32) {
                MAXround1kiri = 8;
                MAXround1kanan = 8;
                MAXround2kiri = 4;
                MAXround2kanan = 4;
            }
            checkFinished();
        });
        /////////////////EFFECTS/////////////////////
        if (admin) {
            $("li").mouseover(function() {
                if ($(this).parent().parent().hasClass("current") && $(this).parent().attr("status") != "finished") {
                    $(this).css("cursor", "pointer");
                }

            });
            $("li").mouseleave(function() {
                if ($(this).parent().parent().hasClass("current") && $(this).parent().attr("status") != "finished") {
                    $(this).css("cursor", "normal");
                }
            });

            /////////////////////////////////////////////

            $("li").click(function() {
                if ($(this).parent().parent().hasClass("current") && $(this).parent().attr("status") != "finished") {
                    var parent = $(this).parent();
                    var team1 = parent.children(".team-top").html();
                    var team2 = parent.children(".team-bottom").html();
                    var score1 = parent.children(".team-top").children(".score").html();
                    var score2 = parent.children(".team-bottom").children(".score").html();
                    $("#team1").html(team1);
                    $("#team2").html(team2);
                    $("#score1").html(score1);
                    $("#score2").html(score2);
                    $(".create").show();
                    $(".create").addClass("slideInDown");
                    $(".bgblur").show();
                    edit = parent.attr("bagian");
                }
            });

            $(".bgblur").click(function() {
                $(".create").removeClass("slideInDown");
                $(".create").addClass("slideOutUp");
                var timer = setTimeout('$(".create").hide();$(".bgblur").hide();$(".create").removeClass("slideOutUp");', 1000);
            });

            $("#minus1").click(function() {
                var score = $("#score1").html();
                score--;
                $("#score1").html(score);
            });

            $("#plus1").click(function() {
                var score = $("#score1").html();
                score++;
                $("#score1").html(score);
            });

            $("#minus2").click(function() {
                var score = $("#score2").html();
                score--;
                $("#score2").html(score);
            });

            $("#plus2").click(function() {
                var score = $("#score2").html();
                score++;
                $("#score2").html(score);
            });

            $("#winner2").click(function() {
                $(this).css("background-color", "#63D99E");
                $("#winner1").css("background-color", "#F25757");
                $("#winner1").html("LOSER");
                $(this).html("WINNER");
            });

            $("#winner1").click(function() {
                $(this).css("background-color", "#63D99E");
                $("#winner2").css("background-color", "#F25757");
                $("#winner2").html("LOSER");
                $(this).html("WINNER");
            });
            $(".createButton").click(function() {
                $(".create").removeClass("slideInDown");
                $(".create").addClass("slideOutUp");
                var timer = setTimeout('$(".create").hide();$(".bgblur").hide();$(".create").removeClass("slideOutUp");', 1000);
                alertify.success("Bracket Updated!");
                var score1 = $("#score1").html();
                var score2 = $("#score2").html();
                if ($("#winner1").html() == "LOSER") {
                    $("[bagian='" + edit + "']").children(".team-bottom").addClass("winner");
                    $("[bagian='" + edit + "']").children(".team-top").addClass("loser");
                    $("[bagian='" + edit + "']").attr("status", "finished");
                    var teamname = $("[bagian='" + edit + "']").children(".team-bottom").html();
                    nextRound(edit, teamname);
                } else if ($("#winner2").html() == "LOSER") {
                    $("[bagian='" + edit + "']").children(".team-bottom").addClass("loser");
                    $("[bagian='" + edit + "']").children(".team-top").addClass("winner");
                    $("[bagian='" + edit + "']").attr("status", "finished");
                    var teamname = $("[bagian='" + edit + "']").children(".team-top").html();
                    nextRound(edit, teamname);
                }
                $("[bagian='" + edit + "']").children(".team-top").children(".score").html(score1);
                $("[bagian='" + edit + "']").children(".team-bottom").children(".score").html(score2);
                $("#winner1").css("background-color", "#d7c13f");
                $("#winner2").css("background-color", "#d7c13f");
                $("#winner1").html("WINNER");
                $("#winner2").html("WINNER");
                edit = "";
            });

            function nextRound(bagian, teamname) {
                var side;
                if (bagian.substring(0, 1) == "r") {
                    var jenis = bagian.substring(5, 6);
                    var letak = bagian.substring(6, 10);
                    if (letak == "kana") letak = "kanan";
                    var urutan = parseInt((bagian.substring(bagian.length - 1, bagian.length)));
                    if (urutan % 2 == 0) side = "bottom";
                    else side = "top";
                    urutan = Math.round(urutan / 2);
                    if (jenis == 1) {
                        if (MAXround2kiri > 0) {
                            var nama = "[bagian='round2" + letak + urutan + "']";
                            $(nama).children(".team-" + side).html(teamname);
                            $(nama).children(".team-" + side).children(".score").html("0");
                        } else {
                            var nama = "[bagian='quarterfinal" + letak + urutan + "']";
                            $(nama).children(".team-" + side).html(teamname);
                            $(nama).children(".team-" + side).children(".score").html("0");
                        }
                    } else {
                        var nama = "[bagian='quarterfinal" + letak + urutan + "']";
                        $(nama).children(".team-" + side).html(teamname);
                        $(nama).children(".team-" + side).children(".score").html("0");
                    }
                } else if (bagian.substring(0, 1) == "q") {
                    var nama = "";
                    var side = "";
                    if (bagian == "quarterfinalkiri1") {
                        nama = "[bagian='semifinalkiri1']";
                        side = "top";
                    } else if (bagian == "quarterfinalkiri2") {
                        nama = "[bagian='semifinalkanan1']";
                        side = "top";
                    } else if (bagian == "quarterfinalkanan1") {
                        nama = "[bagian='semifinalkiri1']";
                        side = "bottom";
                    } else if (bagian == "quarterfinalkanan2") {
                        nama = "[bagian='semifinalkanan1']";
                        side = "bottom";
                    }
                    $(nama).children(".team-" + side).html(teamname);
                    $(nama).children(".team-" + side).children(".score").html("0");
                } else if (bagian.substring(0, 1) == "s") {
                    if (bagian == "semifinalkiri1") side = "top";
                    else side = "bottom";
                    $("[bagian='final1']").children(".team-" + side).html(teamname);
                    $("[bagian='final1']").children(".team-" + side).children(".score").html("0");
                }
                checkFinished();
            }

            function checkFinished() {
                var ctrkiri = 0;
                var ctrkanan = 0;
                for (var i = 1; i <= MAXround1kiri; i++) {
                    if ($('[bagian="round1kiri' + i + '"]').attr("status") == "finished") {
                        ctrkiri++;
                    }
                    if ($('[bagian="round1kanan' + i + '"]').attr("status") == "finished") {
                        ctrkanan++;
                    }
                }
                if (ctrkiri == MAXround1kiri && $("[bagian='round1kiri']").children(".date").html() != "Finished") {
                    $("[bagian='round1kiri']").append("<span class='date'>Finished</span>");
                    $("[bagian='round1kiri']").parent().removeClass("current");
                }
                if (ctrkanan == MAXround1kanan && $("[bagian='round1kanan']").children(".date").html() != "Finished") {
                    $("[bagian='round1kanan']").append("<span class='date'>Finished</span>");
                    $("[bagian='round1kanan']").parent().removeClass("current");
                }
                if ($("[bagian='round1kanan']").children(".date").html() == "Finished" && $("[bagian='round1kiri']").children(".date").html() == "Finished") {
                    if (MAXround2kiri > 0) {
                        $("[bagian='round2kiri']").parent().addClass("current");
                        $("[bagian='round2kanan']").parent().addClass("current");
                    } else {
                        $("[bagian='quarterfinalkiri']").parent().addClass("current");
                        $("[bagian='quarterfinalkanan']").parent().addClass("current");
                    }
                    MAXround1kiri = -1;
                    MAXround1kanan = -1;
                }
                ctrkiri = 0;
                ctrkanan = 0;
                for (var i = 1; i <= MAXround2kiri; i++) {
                    if ($('[bagian="round2kiri' + i + '"]').attr("status") == "finished") {
                        ctrkiri++;
                    }
                    if ($('[bagian="round2kanan' + i + '"]').attr("status") == "finished") {
                        ctrkanan++;
                    }
                }
                if (ctrkiri == MAXround2kiri && $("[bagian='round2kiri']").children(".date").html() != "Finished") {
                    $("[bagian='round2kiri']").append("<span class='date'>Finished</span>");
                    $("[bagian='round2kiri']").parent().removeClass("current");
                }
                if (ctrkanan == MAXround2kanan && $("[bagian='round2kanan']").children(".date").html() != "Finished") {
                    $("[bagian='round2kanan']").append("<span class='date'>Finished</span>");
                    $("[bagian='round2kanan']").parent().removeClass("current");
                }
                if ($("[bagian='round2kiri']").children(".date").html() == "Finished" && $("[bagian='round2kanan']").children(".date").html() == "Finished") {
                    $("[bagian='quarterfinalkiri']").parent().addClass("current");
                    $("[bagian='quarterfinalkanan']").parent().addClass("current");
                    MAXround2kiri = -1;
                    MAXround2kanan = -1;
                }
                ctrkiri = 0;
                ctrkanan = 0;
                for (var i = 1; i <= MAXquarterfinalkiri; i++) {
                    if ($('[bagian="quarterfinalkiri' + i + '"]').attr("status") == "finished") {
                        ctrkiri++;
                    }
                    if ($('[bagian="quarterfinalkanan' + i + '"]').attr("status") == "finished") {
                        ctrkanan++;
                    }
                }
                if (ctrkiri == MAXquarterfinalkiri && $("[bagian='quarterfinalkiri']").children(".date").html() != "Finished") {
                    $("[bagian='quarterfinalkiri']").append("<span class='date'>Finished</span>");
                    $("[bagian='quarterfinalkiri']").parent().removeClass("current");
                }
                if (ctrkanan == MAXquarterfinalkanan && $("[bagian='quarterfinalkanan']").children(".date").html() != "Finished") {
                    $("[bagian='quarterfinalkanan']").append("<span class='date'>Finished</span>");
                    $("[bagian='quarterfinalkanan']").parent().removeClass("current");
                }
                if ($("[bagian='quarterfinalkiri']").children(".date").html() == "Finished" && $("[bagian='quarterfinalkanan']").children(".date").html() == "Finished") {
                    $("[bagian='semifinalkanan']").parent().addClass("current");
                    $("[bagian='semifinalkiri']").parent().addClass("current");
                    MAXquarterfinalkanan = -1;
                    MAXquarterfinalkiri = -1;
                }
                if ($('[bagian="semifinalkiri1"]').attr("status") == "finished" && $("[bagian='semifinalkiri']").children(".date").html() != "Finished") {
                    $("[bagian='semifinalkiri']").append("<span class='date'>Finished</span>");
                    $("[bagian='semifinalkiri']").parent().removeClass("current");
                }
                if ($('[bagian="semifinalkanan1"]').attr("status") == "finished" && $("[bagian='semifinalkanan']").children(".date").html() != "Finished") {
                    $("[bagian='semifinalkanan']").append("<span class='date'>Finished</span>");
                    $("[bagian='semifinalkanan']").parent().removeClass("current");
                }
                if ($("[bagian='semifinalkanan']").children(".date").html() == "Finished" && $("[bagian='semifinalkiri']").children(".date").html() == "Finished") {
                    $("[bagian='final']").parent().addClass("current");
                    MAXsemifinalkiri = -1;
                    MAXsemifinalkanan = -1;
                }
                if ($('[bagian="final1"]').attr("status") == "finished") {
                    $(".fa-trophy").css("color", "#d7c13f");
                    $("[bagian='final1']").parent().removeClass("current");
                    var winner = $("[bagian='final1']").children(".winner").html();
                    var loser = $("[bagian='final1']").children(".loser").html();
                    $("[bagian='final']").append("<span class='date'>Winner :" + winner + "</span>");

                }
            }
        }
    </script>
</body>

</html>