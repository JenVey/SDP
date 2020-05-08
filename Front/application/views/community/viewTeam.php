<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>gather.owl - Team</title>
    <link rel="icon" href="<?php echo base_url(); ?>asset/Images/android-chrome-512x512.png">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/Ours.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/channelCSS.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/teamCSS.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/animation.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/alertify.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/alerts.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/themes/default.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/themes/default.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/datepicker.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>asset/CSS/bootstrap-clockpicker.css">

    <script src="<?php echo base_url(); ?>asset/Js/alertify.js"></script>
    <script src="<?php echo base_url(); ?>asset/Js/jquery-min.js"></script>
    <script src="<?php echo base_url(); ?>asset/Js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>asset/Js/textFit.js"></script>
    <script src="<?php echo base_url(); ?>asset/Js/datepicker.js"></script>
    <script src="<?php echo base_url(); ?>asset/Js/jquery-clockpicker.min.js"></script>

</head>
<?php
date_default_timezone_set('Asia/Jakarta');
if (isset($teamA)) {
    foreach ($team as $tim) {
        if ($tim['id_user'] && $user['id_user']) {
            $_SESSION["master"] = "true";
        }
    }
}

?>

<body>
    <div class="accList">
        <div class="navbarCom">
            <button class="butNav btnFriend" style=" border-top-left-radius: 15px; border-bottom-left-radius: 15px;">
                <svg style="margin-top: 2vh;" xmlns="http://www.w3.org/2000/svg" width="35" height="41" viewBox="0 0 35 41">
                    <path id="solid_child" data-name="solid child" d="M10.938,5.766C10.938,2.581,13.876,0,17.5,0s6.562,2.581,6.562,5.766-2.938,5.766-6.562,5.766S10.938,8.95,10.938,5.766Zm23.208.11a3.209,3.209,0,0,0-4.125,0l-7.9,6.937h-9.25l-7.9-6.937a3.209,3.209,0,0,0-4.125,0,2.349,2.349,0,0,0,0,3.624l8.625,7.577V38.438A2.757,2.757,0,0,0,12.4,41h1.458a2.757,2.757,0,0,0,2.917-2.562V29.469h1.458v8.969A2.757,2.757,0,0,0,21.146,41H22.6a2.757,2.757,0,0,0,2.917-2.562V17.077L34.146,9.5A2.349,2.349,0,0,0,34.146,5.876Z" transform="translate(0)" fill="#d7c13f" />
                </svg>
                <h6 class="varela" style="color: #ecf0f1;margin-top: 4vh;">Friends</h6>
            </button>
            <button class="butNav btnTeams active">
                <svg style="margin-top: 2vh;" xmlns="http://www.w3.org/2000/svg" width="42.2" height="31.5" viewBox="0 0 42.2 31.5">
                    <path id="Icon_material-group" data-name="Icon material-group" d="M30.273,21c3.184,0,5.735-3.015,5.735-6.75S33.457,7.5,30.273,7.5s-5.755,3.015-5.755,6.75S27.089,21,30.273,21ZM14.927,21c3.184,0,5.735-3.015,5.735-6.75S18.111,7.5,14.927,7.5s-5.755,3.015-5.755,6.75S11.743,21,14.927,21Zm0,4.5C10.458,25.5,1.5,28.132,1.5,33.375V39H28.355V33.375C28.355,28.133,19.4,25.5,14.927,25.5Zm15.345,0c-.556,0-1.189.045-1.861.113a9.93,9.93,0,0,1,3.779,7.763V39H43.7V33.375C43.7,28.133,34.742,25.5,30.273,25.5Z" transform="translate(-1.5 -7.5)" fill="#d7c13f" />
                </svg>
                <h6 class="varela" style="color: #ecf0f1;margin-top: 5vh;">Teams</h6>
            </button>
            <button class="butNav btnChannel" style="border-top-right-radius: 15px; border-bottom-right-radius: 15px;">
                <svg style="margin-top: 2vh;" xmlns="http://www.w3.org/2000/svg" width="48.299" height="45.162" viewBox="0 0 48.299 45.162">
                    <g id="channel" transform="translate(0 -1.86)">
                        <g id="Group_137" data-name="Group 137" transform="translate(0 1.86)">
                            <path id="Path_1398" data-name="Path 1398" d="M128.573,13.933a6.238,6.238,0,0,0-3.544-5.545,3.836,3.836,0,0,0,.979-2.548,4.212,4.212,0,0,0-8.412,0,3.841,3.841,0,0,0,1.037,2.612,6.228,6.228,0,0,0-3.419,5.482v3.338h13.358ZM121.8,4.012a1.884,1.884,0,0,1,1.931,1.827,1.934,1.934,0,0,1-3.863,0A1.884,1.884,0,0,1,121.8,4.012Zm4.5,11.107H117.49V13.933a4.242,4.242,0,0,1,4.349-4.115h.111a4.242,4.242,0,0,1,4.349,4.115v1.186Z" transform="translate(-97.745 -1.86)" fill="#d7c13f" />
                            <path id="Path_1399" data-name="Path 1399" d="M9.814,215.768a3.836,3.836,0,0,0,.979-2.548,4.1,4.1,0,0,0-4.206-3.979,4.1,4.1,0,0,0-4.206,3.979,3.841,3.841,0,0,0,1.037,2.612A6.227,6.227,0,0,0,0,221.313v3.338H13.358v-3.338A6.238,6.238,0,0,0,9.814,215.768Zm-3.227-4.376a1.83,1.83,0,1,1,0,3.654,1.83,1.83,0,1,1,0-3.654Zm4.5,11.107H2.275v-1.186A4.241,4.241,0,0,1,6.624,217.2h.111a4.242,4.242,0,0,1,4.349,4.115S11.083,222.5,11.083,222.5Z" transform="translate(0 -179.489)" fill="#d7c13f" />
                            <path id="Path_1400" data-name="Path 1400" d="M240.244,215.768a3.836,3.836,0,0,0,.979-2.548,4.212,4.212,0,0,0-8.412,0,3.841,3.841,0,0,0,1.037,2.612,6.228,6.228,0,0,0-3.419,5.482v3.338h13.358v-3.338A6.239,6.239,0,0,0,240.244,215.768Zm-3.227-4.376a1.83,1.83,0,1,1-1.931,1.827A1.883,1.883,0,0,1,237.017,211.392Zm4.5,11.107H232.7v-1.186a4.241,4.241,0,0,1,4.349-4.115h.111a4.242,4.242,0,0,1,4.349,4.115V222.5Z" transform="translate(-195.489 -179.489)" fill="#d7c13f" />
                            <path id="Path_1401" data-name="Path 1401" d="M109.639,134.949h-2.275v7.086l-7.935,7.508,1.608,1.522L108.5,144l7.464,7.062,1.609-1.522-7.936-7.508Z" transform="translate(-84.352 -115.856)" fill="#d7c13f" />
                        </g>
                    </g>
                </svg>
                <h6 class="varela" style="color: #ecf0f1;margin-top: 3.5vh;">Channels</h6>
            </button>
        </div>
        <div class="titleAccList">
            <div class="hl"></div>
            <h4 style="color: #ecf0f1;">Teams</h4>
            <div class="hl"></div>
        </div>
        <div class="actionButs">
            <button class="action" id="create">
                <svg xmlns="http://www.w3.org/2000/svg" width="20.851" height="21.432" viewBox="0 0 20.851 21.432">
                    <path id="Icon_material-create" data-name="Icon material-create" d="M4.5,21.464v4.464H8.843l12.81-13.167L17.31,8.3ZM25.012,9.309a1.209,1.209,0,0,0,0-1.679L22.3,4.844a1.131,1.131,0,0,0-1.633,0l-2.12,2.179,4.343,4.464,2.12-2.179Z" transform="translate(-4.5 -4.496)" fill="#d7c13f" />
                </svg>
                <h6 class="varela">Create</h6>
            </button>
            <button class="action" id="join">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="19.5" viewBox="0 0 36 19.5">
                    <path id="Icon_material-group-add" data-name="Icon material-group-add" d="M12,15H7.5V10.5h-3V15H0v3H4.5v4.5h3V18H12Zm15,1.5a4.5,4.5,0,1,0-1.365-8.79A7.4,7.4,0,0,1,26.985,12a7.547,7.547,0,0,1-1.35,4.29A4.485,4.485,0,0,0,27,16.5Zm-7.5,0A4.5,4.5,0,1,0,15,12,4.481,4.481,0,0,0,19.5,16.5Zm9.93,3.24A5.55,5.55,0,0,1,31.5,24v3H36V24C36,21.69,32.445,20.265,29.43,19.74ZM19.5,19.5c-3,0-9,1.5-9,4.5v3h18V24C28.5,21,22.5,19.5,19.5,19.5Z" transform="translate(0 -7.5)" fill="#d7c13f" />
                </svg>
                <h6 class="varela">Join</h6>
            </button>
        </div>
        <div class="accItemContainer">
            <?php foreach ($team as $tim) { ?>
                <div class="accItem listChannel" idTeam="<?= $tim['id_team'] ?>" <?php if (isset($teamA)) {
                                                                                        if ($tim['id_team'] == $teamA['id_team']) {
                                                                                            echo "id='active'";
                                                                                        }
                                                                                    } ?>>
                    <div class="profileImg" style="margin-left: 0;"><img src="data:image/jpeg;base64,<?= base64_encode($tim['foto_team']) ?>" width="50" height="50" alt="" /></div>
                    <h6 class="profileName"><?= $tim['nama_team'] ?></h6>
                </div>
            <?php } ?>
        </div>
    </div>
    <div class="profile">
        <div class="wrapProfile">
            <div class="profileImg"><img src="data:image/jpeg;base64,<?= base64_encode($user['foto']) ?>" width="50" height="50" alt="" /></div>
            <div class="profileStats">
                <!-- Max Line 10 -->
                <h5 class="profileName" style="font-size: 15px;margin-top: 0.5vh;"><?= $user['nama_user'] ?></h5>
                <h6 class="profileBalance">GP <?= $user['saldo'] ?></h6>
            </div>
        </div>
        <button class="Home">
            <img style="margin-top: -3vh;" src="<?= base_url(); ?>asset/Images/android-chrome-512x512.png" width="30" height="30"></img>
            <p class="HomeText" style="margin-top: -2vh;">Main Menu</p>
        </button>
    </div>
    <div class="bodyContainer">
        <?php if (!isset($_SESSION['idTeam'])) { ?>
            <div id="banner">
                <object data="<?= base_url(); ?>/asset/Images/SVG/undraw_having_fun_iais.svg" type="image/svg+xml"></object>
                <svg style="margin-top: 5vh;" xmlns="http://www.w3.org/2000/svg" width="606" height="105" viewBox="0 0 606 105">
                    <text id="Give_all_of_em_a_toast" data-name="Give all of &apos;em a toast" transform="translate(0 74)" fill="#fff" font-size="94" font-family="Cookie-Regular, Cookie">
                        <tspan x="0" y="0">Give all of &apos;em a toast</tspan>
                    </text>
                </svg>
            </div>
        <?php } else { ?>
            <div class="memberlist">
                <div class="titleAccList">
                    <div class="hl"></div>
                    <h4 style="color: #d7c13f;">Member List</h4>
                    <div class="hl"></div>
                </div>
                <?php
                foreach ($teamM as $timM) {
                    if ($timM['id_team'] == $teamA['id_team']) { ?>
                        <div class="accItem member">
                            <div class="Details">
                                <div class="profileImg" style="margin-left: 0;"><img src="data:image/jpeg;base64,<?= base64_encode($timM['foto']) ?>" alt="" /></div>
                                <h6 class="profileName <?php if ($timM['status'] == 0) {
                                                            echo "offline";
                                                        } ?>"><?= $timM['nama_user'] ?></h6>
                            </div>
                            <?php if ($timM['id_user'] == $teamA['id_user']) { ?>
                                <div style="margin-right: 2vw;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22.5" height="18" viewBox="0 0 22.5 18">
                                        <path id="Icon_awesome-crown" data-name="Icon awesome-crown" d="M18.563,15.75H3.938a.564.564,0,0,0-.562.563v1.125A.564.564,0,0,0,3.938,18H18.563a.564.564,0,0,0,.563-.562V16.313A.564.564,0,0,0,18.563,15.75ZM20.813,4.5a1.688,1.688,0,0,0-1.687,1.688,1.653,1.653,0,0,0,.155.7L16.734,8.409A1.123,1.123,0,0,1,15.18,8L12.315,2.988a1.688,1.688,0,1,0-2.13,0L7.32,8a1.124,1.124,0,0,1-1.554.408L3.224,6.884a1.687,1.687,0,1,0-1.536.991,1.723,1.723,0,0,0,.271-.028L4.5,14.625H18l2.542-6.778a1.723,1.723,0,0,0,.271.028,1.688,1.688,0,0,0,0-3.375Z" fill="#d7c13f" />
                                    </svg>
                                </div>
                            <?php } ?>
                        </div>
                <?php }
                } ?>
            </div>
            <div class="chatHeader">
                <div class="chatLogo"><img src="data:image/jpeg;base64,<?= base64_encode($teamA['foto_team']) ?>" /></div>
                <div class="channelHeader">
                    <p style="color: rgba(216,216,216,0.61);"><?= $teamA['id_team'] ?></p>
                    <h4 class="yellow"><?= $teamA['nama_team'] ?></h4>
                </div>
                <div class="channelAction">
                    <button id="action1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48.395" height="45.049" viewBox="0 0 48.395 45.049">
                            <path id="Icon_ionic-ios-trophy" data-name="Icon ionic-ios-trophy" d="M50.141,8.723H42.463V6.377A1.875,1.875,0,0,0,40.6,4.5H14.543a1.875,1.875,0,0,0-1.861,1.877V8.723H5a1.64,1.64,0,0,0-1.629,1.642h0c0,4.845.907,7.743,2.629,10.605a9.476,9.476,0,0,0,6.55,4.728.957.957,0,0,1,.721.575c.721,1.807,2.35,4.083,5.945,6.124a22.327,22.327,0,0,0,6.014,2.534.94.94,0,0,1,.721.915v9.479a.937.937,0,0,1-.931.939H17.393a1.674,1.674,0,0,0-1.675,1.56,1.638,1.638,0,0,0,1.629,1.725H37.775a1.674,1.674,0,0,0,1.675-1.56,1.638,1.638,0,0,0-1.629-1.725H30.143a.937.937,0,0,1-.931-.939V35.859a.94.94,0,0,1,.721-.915,22.873,22.873,0,0,0,6.014-2.534c3.595-2.041,5.223-4.317,5.945-6.124a.933.933,0,0,1,.721-.575,9.476,9.476,0,0,0,6.55-4.728c1.7-2.874,2.606-5.772,2.606-10.617h0A1.64,1.64,0,0,0,50.141,8.723ZM12.682,21.7a.468.468,0,0,1-.628.446,6.8,6.8,0,0,1-3.56-3.39,12.426,12.426,0,0,1-1.757-5.725.937.937,0,0,1,.931-1.021h4.083a.937.937,0,0,1,.931.939Zm33.969-2.945a6.8,6.8,0,0,1-3.56,3.39.468.468,0,0,1-.628-.446V12.947a.937.937,0,0,1,.931-.939h4.083a.937.937,0,0,1,.931,1.021A12.569,12.569,0,0,1,46.651,18.754Z" transform="translate(-3.375 -4.5)" fill="#fff" />
                        </svg>
                    </button>

                    <button id="action4">
                        <svg xmlns="http://www.w3.org/2000/svg" width="56.503" height="50.474" viewBox="0 0 52.494 48.491">
                            <path id="Icon_material-access-alarm" data-name="Icon material-access-alarm" d="M55.494,12.084,43.42,2.79,40.034,6.474l12.074,9.294ZM18.433,6.474,15.074,2.79,3,12.06l3.386,3.684,12.047-9.27Zm12.126,11.1H26.622V32.019L39.09,38.881l1.969-2.961-10.5-5.706ZM29.247,7.942c-13.045,0-23.622,9.7-23.622,21.669S16.176,51.281,29.247,51.281c13.045,0,23.622-9.7,23.622-21.669S42.292,7.942,29.247,7.942Zm0,38.523c-10.158,0-18.373-7.536-18.373-16.854s8.215-16.854,18.373-16.854S47.62,20.294,47.62,29.611,39.4,46.465,29.247,46.465Z" transform="translate(-3 -2.79)" fill="#fff" />
                        </svg>
                    </button>

                    <button id="action3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="56.503" height="50.474" viewBox="0 0 56.503 50.474">
                            <g id="Icon-Settings" transform="translate(1.5 1.5)">
                                <path id="Path_1010" data-name="Path 1010" d="M28.092,19.974c0,3.575-3.266,6.474-7.3,6.474s-7.3-2.9-7.3-6.474S16.766,13.5,20.8,13.5,28.092,16.4,28.092,19.974Z" transform="translate(5.956 3.763)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                                <path id="Path_1011" data-name="Path 1011" d="M46.248,31.711a3.268,3.268,0,0,0,.8,3.927l.146.129a3.981,3.981,0,0,1,0,6.107,5.311,5.311,0,0,1-6.882,0l-.146-.129a4.4,4.4,0,0,0-4.426-.712,3.579,3.579,0,0,0-2.432,3.258v.367a4.615,4.615,0,0,1-4.864,4.316,4.615,4.615,0,0,1-4.864-4.316v-.194a3.619,3.619,0,0,0-2.627-3.258,4.4,4.4,0,0,0-4.426.712l-.146.129a5.311,5.311,0,0,1-6.882,0,3.981,3.981,0,0,1,0-6.107l.146-.129a3.268,3.268,0,0,0,.8-3.927,4.053,4.053,0,0,0-3.672-2.158H6.364A4.615,4.615,0,0,1,1.5,25.41a4.615,4.615,0,0,1,4.864-4.316h.219a4.009,4.009,0,0,0,3.672-2.331,3.268,3.268,0,0,0-.8-3.927l-.146-.129a3.981,3.981,0,0,1,0-6.107,5.311,5.311,0,0,1,6.882,0l.146.129a4.4,4.4,0,0,0,4.426.712h.195a3.579,3.579,0,0,0,2.432-3.258V5.816A4.615,4.615,0,0,1,28.252,1.5a4.615,4.615,0,0,1,4.864,4.316V6.01a3.579,3.579,0,0,0,2.432,3.258,4.4,4.4,0,0,0,4.426-.712l.146-.129a5.311,5.311,0,0,1,6.882,0,3.981,3.981,0,0,1,0,6.107l-.146.129a3.268,3.268,0,0,0-.8,3.927v.173a4.053,4.053,0,0,0,3.672,2.158h.413A4.615,4.615,0,0,1,55,25.237a4.615,4.615,0,0,1-4.864,4.316H49.92a4.053,4.053,0,0,0-3.672,2.158Z" transform="translate(-1.5 -1.5)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" />
                            </g>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="chatSection">
                <div class="chatWrapper">
                    <div class="chatField">
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
                    </div>
                </div>
                <div class="inputField">
                    <textarea name="inputText" id="inputText" cols="132" rows="1"></textarea>
                </div>
                <button id="sendButton">
                </button>
                <div id="tournament" class="settings">
                    <h3 class="yellow">Tournament</h3>
                    <div id="tournamentContainer">
                        <div class="tourneys">
                            <div class="tourneyItem">
                                <h2 class="yellow varela" style="margin-top: 2vh;">CS:GO</h2>
                                <h6 class="varela" style="margin-top: 1vh;color: #ecf0f1;">Tournament Name</h6>
                                <h6 style="font-size: 12px; color: rgba(236,240,241,0.37);">10 Slots</h6>
                                <div class="standingsContainer">
                                    <h6 class="varela" style="color: #ecf0f1;">Standings</h6>
                                    <div class="standings">
                                        <div class="place" style="color: #D1D1D1;">
                                            2
                                            <h6>Faze</h6>
                                        </div>
                                        <div class="place" style="color: #d7c13f;">
                                            1
                                            <h6>Astralis</h6>
                                        </div>
                                        <div class="place" style="color: #B98316;">
                                            3
                                            <h6>Team Liquid</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="startDate">
                                    <p class="finished">Finished</p>
                                    <p>Start: <span style="color: rgba(215,193,63,0.70);">18 January 2020</span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="settings" id="reminder">
                    <h3 class="yellow">reminder</h3>
                    <div id="reminderContainer">
                        <div class="createTournamentForm collapse" id="reminderForm">
                            <div class="tourname">
                                <h5 class="varela">Reminder Name</h5>
                                <input type="text" name="tourName" id="tourName">
                            </div>
                            <div class="tourname" style="width: 80%;justify-content: flex-end;">
                                <h5 class="varela">Message</h5>
                                <textarea name="messagereminder" id="message" cols="30" rows="10" style="margin-left: 2.8vw;"></textarea>
                            </div>
                            <div class="tourname" style="margin-top: 8vh;width: 80%; justify-content: flex-end;">
                                <h6 class="varela imgText">Time Trigger</h6>
                                <div class="form-group mb-4" style="margin: 0!important;">
                                    <div class="datepicker date input-group p-0 shadow-sm" data-date-start-date="d">
                                        <input type="text" placeholder="Date" class="form-control" name="reminderDate" id="tourDate">
                                        <div class="input-group-append" style="overflow: visible;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="32.5" viewBox="0 0 61 46">
                                                <g id="Group_190" data-name="Group 190" transform="translate(-6632 2629)">
                                                    <path id="Rectangle_348" data-name="Rectangle 348" d="M0,0H46A15,15,0,0,1,61,15V31A15,15,0,0,1,46,46H0a0,0,0,0,1,0,0V0A0,0,0,0,1,0,0Z" transform="translate(6632 -2629)" fill="#d7c13f" />
                                                    <path id="Icon_material-date-range" data-name="Icon material-date-range" d="M13.5,16.5h-3v3h3Zm6,0h-3v3h3Zm6,0h-3v3h3ZM28.5,6H27V3H24V6H12V3H9V6H7.5A2.986,2.986,0,0,0,4.515,9L4.5,30a3,3,0,0,0,3,3h21a3.009,3.009,0,0,0,3-3V9A3.009,3.009,0,0,0,28.5,6Zm0,24H7.5V13.5h21Z" transform="translate(6644.3 -2624)" fill="#1e2126" />
                                                </g>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="input-group clockpicker">
                                    <input type="text" class="form-control" placeholder="Time" name="reminderTime" id="tourDate">
                                    <span class="input-group-addon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="32.5" viewBox="0 0 61 46">
                                            <g id="Group_189" data-name="Group 189" transform="translate(-6526 2629)">
                                                <path id="Rectangle_347" data-name="Rectangle 347" d="M0,0H46A15,15,0,0,1,61,15V31A15,15,0,0,1,46,46H0a0,0,0,0,1,0,0V0A0,0,0,0,1,0,0Z" transform="translate(6526 -2629)" fill="#d7c13f" />
                                                <path id="Icon_material-access-time" data-name="Icon material-access-time" d="M17.985,3A15,15,0,1,0,33,18,14.993,14.993,0,0,0,17.985,3ZM18,30A12,12,0,1,1,30,18,12,12,0,0,1,18,30Zm.75-19.5H16.5v9l7.875,4.725L25.5,22.38l-6.75-4.005Z" transform="translate(6539 -2623.75)" fill="#1e2126" />
                                            </g>
                                        </svg>
                                    </span>
                                </div>
                                <script type="text/javascript">
                                    $('.clockpicker').clockpicker({
                                        placement: 'top',
                                        align: 'left',
                                        donetext: 'Done'
                                    });
                                </script>
                            </div>
                        </div>
                        <button id="createReminder">
                            <h6 class="varela">Create Reminder</h6>
                        </button>
                        <div class="reminders">
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
                        </div>
                    </div>
                </div>
                <div class="settings" id="settings">
                    <h3 class="yellow">Settings</h3>
                    <div id="settingsContainer">
                        <div class="channelImg">
                            <input type="file" name="inputChannelImg" accept="image/x-png,image/jpg,image/jpeg" id="inputChannelImg" hidden>
                            <div id="imgContainer">
                                <img src="data:image/jpeg;base64,<?= base64_encode($teamA['foto_team']) ?>" />
                            </div>
                            <?php if ($teamA['id_user'] == $user['id_user']) { ?>
                                <button id="changeImg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 30 30">
                                        <g id="Group_185" data-name="Group 185" transform="translate(-15861 4733)">
                                            <circle id="Ellipse_187" data-name="Ellipse 187" cx="15" cy="15" r="15" transform="translate(15861 -4733)" fill="#1e2126" />
                                            <path id="Icon_material-add-a-photo" data-name="Icon material-add-a-photo" d="M2.516,3.855V1.5H4.194V3.855H6.71v1.57H4.194V7.78H2.516V5.425H0V3.855Zm2.516,4.71V6.21H7.549V3.855H13.42l1.535,1.57h2.659A1.631,1.631,0,0,1,19.291,7v9.421a1.631,1.631,0,0,1-1.677,1.57H4.194a1.631,1.631,0,0,1-1.677-1.57V8.565ZM10.9,15.631A4.068,4.068,0,0,0,15.1,11.706,4.068,4.068,0,0,0,10.9,7.78,4.068,4.068,0,0,0,6.71,11.706,4.068,4.068,0,0,0,10.9,15.631ZM8.22,11.706A2.6,2.6,0,0,0,10.9,14.218a2.6,2.6,0,0,0,2.684-2.512A2.6,2.6,0,0,0,10.9,9.193,2.6,2.6,0,0,0,8.22,11.706Z" transform="translate(15866.434 -4728.954)" fill="#d7c13f" />
                                        </g>
                                    </svg>
                                </button>
                            <?php } ?>
                        </div>
                        <h5 id="channelName" style="margin-top: 2vh;color: #ecf0f1;" <?php if ($teamA['id_user'] == $user['id_user']) {
                                                                                            echo "contenteditable";
                                                                                        } ?>><?= $teamA['nama_team'] ?></h5>
                        <button id="saveChange">Save Change</button>
                        <div style="margin-top: 4vh;width: 75%;height: 1px;background: #d7c13f;"></div>
                        <h3 class="yellow" style="margin: 4vh 0;">Members</h3>
                        <div id="settingsContainer" class="listMember">
                            <div class="members" style="margin-bottom: 8vh;">
                                <?php foreach ($teamM as $timM) {
                                    if ($timM['id_team'] == $teamA['id_team']) {
                                        if ($timM['id_user'] == $teamA['id_user']) { ?>
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
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        <?php } ?>
    </div>
    <div class="create">
        <p style="position: absolute;top: 1vw;right: 1vw; color: #777D8A;">*You can still change it later on settings tab</p>
        <h1 class="header">Creating <span style="color: #d7c13f;">TEAM</span></h1>
        <div class="horizonline"></div>
        <div class="container" style="z-index: 4;">
            <input type="file" name="imageInput" id="imageInput" accept="image/x-png,image/jpg,image/jpeg" hidden>
            <div class="imageWrapper">
                <div class="image">
                </div>
            </div>
        </div>
        <div class="container" style="margin-top: 3vh;z-index: 4;">
            <h1 class="yellow newName" contenteditable>Team Name</h1>
        </div>
        <div style="position: absolute; bottom: -10vh; right: -8vw;">
            <svg xmlns="http://www.w3.org/2000/svg" width="542.2" height="531.5" viewBox="0 0 42.2 31.5">
                <path id="Icon_material-group" data-name="Icon material-group" d="M30.273,21c3.184,0,5.735-3.015,5.735-6.75S33.457,7.5,30.273,7.5s-5.755,3.015-5.755,6.75S27.089,21,30.273,21ZM14.927,21c3.184,0,5.735-3.015,5.735-6.75S18.111,7.5,14.927,7.5s-5.755,3.015-5.755,6.75S11.743,21,14.927,21Zm0,4.5C10.458,25.5,1.5,28.132,1.5,33.375V39H28.355V33.375C28.355,28.133,19.4,25.5,14.927,25.5Zm15.345,0c-.556,0-1.189.045-1.861.113a9.93,9.93,0,0,1,3.779,7.763V39H43.7V33.375C43.7,28.133,34.742,25.5,30.273,25.5Z" transform="translate(-1.5 -7.5)" fill="rgba(215,193,63,0.19)" />
            </svg>
        </div>
        <button class="createButton">Create</button>
    </div>
    <div class="bgblur"></div>
    <div style="display: none;">
        <div id="topUpHeader">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 23.245 15">
                <path id="Icon_material-group-add" data-name="Icon material-group-add" d="M7.748,13.269H4.843V9.808H2.906v3.462H0v2.308H2.906v3.462H4.843V15.577H7.748Zm9.685,1.154a3.209,3.209,0,0,0,2.9-3.462,3.209,3.209,0,0,0-2.9-3.462,2.472,2.472,0,0,0-.881.162,6.47,6.47,0,0,1,.872,3.3,6.6,6.6,0,0,1-.872,3.3A2.472,2.472,0,0,0,17.434,14.423Zm-4.843,0a3.209,3.209,0,0,0,2.9-3.462,3.209,3.209,0,0,0-2.9-3.462,3.216,3.216,0,0,0-2.906,3.462A3.216,3.216,0,0,0,12.591,14.423ZM19,16.915a4.61,4.61,0,0,1,1.337,3.277V22.5h2.906V20.192C23.245,18.415,20.95,17.319,19,16.915Zm-6.412-.185c-1.937,0-5.811,1.154-5.811,3.462V22.5H18.4V20.192C18.4,17.885,14.528,16.731,12.591,16.731Z" transform="translate(0 -7.5)" fill="#d7c13f" />
            </svg>
            <h5 class="yellow" style="margin-left: 1vw;">Join</h5>
        </div>
        <div id="topUpBody">
            <h6 style="color: #ecf0f1">Input Team ID </h6>
            <input type="text" class="topUpAmount" name="topUpAmount" id="idTim">
        </div>
    </div>

</body>
<script src="Js/alertify.js"></script>
<script>
    var keys = {};
    var ctr = 0;
    var select = -1;
    var timer = {};
    var tourney = false;

    <?php if (isset($user)) { ?>
        userA = '<?= $user['id_user'] ?>';
    <?php } ?>

    <?php if (isset($teamA)) { ?>
        teamA = '<?= $teamA['id_team'] ?>';
    <?php } ?>

    $(document).ready(function() {
        <?php if (!isset($_SESSION['idTeam'])) { ?>
            $(".memberlist").css("display", "none");
            $(".chatHeader").css("display", "none");
            $(".chatSection").css("display", "none");
        <?php } else { ?>
            $(".memberlist").addClass("slideInRight animated");
            $(".chatHeader").addClass("slideInDown animated");
            $(".chatSection").addClass("slideInUp animated");
            $("#banner").addClass("fadeOut animated");
        <?php } ?>

        $("#tournament").hide();
        $("#reminder").hide();
        $("#settings").hide();
        $(".bgblur").hide();
        $(".create").hide();
    });



    $(".createButton").click(function() {
        nama_team = $(".newName").html();
        foto = $(".imageWrapper").find('img').attr('src');

        if (foto.substring(11, 12) == "j") {
            foto = foto.substring(23, foto.length);
        } else {
            foto = foto.substring(22, foto.length);
        }

        $.ajax({
            url: "<?= base_url(); ?>Community/insertTeam",
            method: "post",
            data: {
                id_user: userA,
                nama_team: nama_team,
                foto: foto
            },
            success: function(result) {
                $(".accItemContainer").html(result);
                alertify.success('Team created!');
                $(".create").removeClass("slideInDown animated");
                $(".create").addClass("slideOutUp animated");
                $(".bgblur").removeClass("fadeInBG animated");
                $(".bgblur").addClass("fadeOutBG animated");
                timer[10] = setTimeout("$('.create').hide();", 1000);
                timer[11] = setTimeout("$('.bgblur').hide();", 1000);
            }
        });
    });

    $("#saveChange").click(function() {
        nama_team = $('#channelName').html();
        foto = $("#imgContainer").find('img').attr('src');
        //alert(nama_team);
        // alert(foto);
        if (foto.substring(11, 12) == "j") {
            foto = foto.substring(23, foto.length);
        } else {
            foto = foto.substring(22, foto.length);
        }

        $.ajax({
            url: "<?= base_url(); ?>Community/editTeam",
            method: "post",
            data: {
                id_team: teamA,
                nama_team: nama_team,
                foto: foto
            },
            success: function(result) {
                alertify.success("Success edit team");
            }
        });
    });

    $(".bgblur").click(function() {
        $(".create").removeClass("slideInDown animated");
        $(".create").addClass("slideOutUp animated");
        $(".bgblur").removeClass("fadeInBG animated");
        $(".bgblur").addClass("fadeOutBG animated");
        timer[10] = setTimeout("$('.create').hide();", 1000);
        timer[11] = setTimeout("$('.bgblur').hide();", 1000);
    });

    $("#create").click(function() {
        $(".create").show();
        $(".create").addClass("slideInDown animated");
        $(".create").removeClass("slideOutUp");
        $(".bgblur").show();
        $(".bgblur").removeClass("fadeOutBG");
        $(".bgblur").addClass("fadeInBG animated");
    });


    timer[11] = setInterval(checkreminder, 1000);

    function checkreminder() {
        var ctr = 1;
        var ada = true;
        while (ada) {
            if ($("#reminderTime" + ctr).length) {
                ctr++;
            } else {
                ada = false;
            }
        }
        ctr--;
        console.log(ctr);
        var d = new Date();

        for (var i = 1; i <= ctr; i++) {
            var newdate = new Date($("#reminderTime" + i).val());
            newdate.setMilliseconds(0);
            d.setMilliseconds(0);
            newdate.setHours(newdate.getHours() - 7);
            if (newdate.getTime() === d.getTime()) {
                alertify.alert($("#reminder" + i + "Name").html(), $("#reminder" + i + "Desc").html());
            }
            console.log(d);
            console.log(newdate);
        }
    }
    var date = new Date();
    var yesterday = new Date();
    yesterday.setDate(yesterday.getDate() - 1);
    //	alert(today);
    //	alert(d);

    $('.datepicker').datepicker({
        clearBtn: true,
        format: "dd/mm/yyyy",
        minDate: yesterday
    });


    $("#changeImg").click(function() {
        $("#inputChannelImg").trigger("click");
    });

    $(".image").click(function() {
        $("#imageInput").trigger("click");
    });


    $("#imageInput").change(function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var img = $('<img>').attr('src', e.target.result);
                $(".image").html(img)
            };
            reader.readAsDataURL(this.files[0]);
        }
    });

    $("#inputChannelImg").change(function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var img = $('<img>').attr('src', e.target.result);
                $("#imgContainer").html(img)
            };
            reader.readAsDataURL(this.files[0]);
        }
    });


    $("#inputText").keydown(function(e) {
        keys[e.which] = true;
        if (keys[13] && !keys[16]) {
            e.preventDefault();
            $("#sendButton").trigger("click");
        } else if (keys[13] && keys[16]) {
            if ($(".chatField").css("height") != "624px") {
                var height = parseInt($(this).css("height"));
                height += 26;
                $(this).css("height", height);
                ctr++;
                var height = parseInt($(".inputField").css("height"));
                height += 26;
                $(".inputField").css("height", height);

                var height = parseInt($(".chatField").css("height"));
                height -= 26;
                $(".chatField").css("height", height);
            }
        } else if (keys[8] && $(this).val().length == 1) {
            $(".chatField").css("height", 702.75);
            $(".inputField").css("height", 46.8438);
            $("#inputText").css("height", 28);
        }
    });

    $("#inputText").focus(function() {
        $("#inputText").on("input", function() {
            if (keys[17] && keys[86]) {
                if ($(this).prop('scrollHeight') > $(this).prop('clientHeight')) {
                    var tambah = true;
                    while (tambah) {
                        if ($(".chatField").css("height") != "624px" && $(this).prop('scrollHeight') > $(this).prop('clientHeight')) {
                            var height = parseInt($(this).css("height"));
                            height += 26;
                            $(this).css("height", height);
                            var height = parseInt($(".inputField").css("height"));
                            height += 26;
                            ctr++;
                            $(".inputField").css("height", height);
                            var height = parseInt($(".chatField").css("height"));
                            height -= 26;
                            $(".chatField").css("height", height);
                        } else tambah = false;
                        var chatHeight = parseInt($(".chatField").css("height"));
                        if (chatHeight <= 624) tambah = false;
                    }
                }
                console.log($(".chatField").css("height"));
            } else {
                if ($(".chatField").css("height") != "624px") {
                    if ($(this).prop('scrollHeight') > $(this).prop('clientHeight')) {
                        var height = parseInt($(this).css("height"));
                        height += 26;
                        $(this).css("height", height);
                        var height = parseInt($(".inputField").css("height"));
                        height += 26;
                        ctr++;
                        $(".inputField").css("height", height);
                        var height = parseInt($(".chatField").css("height"));
                        height -= 26;
                        $(".chatField").css("height", height);
                    }
                }
            }
        });

    });

    $("#inputText").keyup(function(e) {
        delete keys[e.which];
    });

    $("#sendButton").click(function() {
        var height = parseInt($("#inputText").css("height"));
        height -= 26 * ctr;
        $("#inputText").css("height", height);
        var height = parseInt($(".inputField").css("height"));
        height -= 26 * ctr;
        $(".inputField").css("height", height);

        var height = parseInt($(".chatField").css("height"));
        height += 26 * ctr;
        $(".chatField").css("height", height);
        ctr = 0;

        pesan = $("#inputText").val();
        //alert(pesan);
        $.ajax({
            url: "<?= base_url(); ?>Community/insertPesan",
            method: "post",
            data: {
                id_pengirim: userA,
                id_penerima: teamA,
                tipe_penerima: "Team",
                pesan: pesan
            },
            success: function(result) {
                $(".chatField").html(result);
                $("#inputText").val("");
            }
        });

        alertify.success("Message sent");
    });

    $(".accItemContainer").on("click", ".listChannel", function() {
        idTeam = $(this).attr("idTeam");
        $.ajax({
            url: "<?= base_url(); ?>Community/chooseTeam",
            method: "post",
            data: {
                idTeam: idTeam
            },
            success: function(result) {
                window.location.href = '<?= base_url(); ?>Community/viewTeam';
            }
        });
    });

    $(".btnTeams").click(function() {
        window.location.href = '<?= base_url(); ?>Community/viewTeam';
    });

    $(".btnChannel").click(function() {
        window.location.href = '<?= base_url(); ?>Community/viewChannel';
    });

    $(".btnFriend").click(function() {
        window.location.href = '<?= base_url(); ?>Community/viewFriend';
    });


    $(".Home").click(function() {
        window.location.href = '<?= base_url(); ?>MainMenu/';
    });

    var headerTopUp = $("#topUpHeader").html();
    var bodyTopUp = $("#topUpBody").html();
    $("#topUpHeader").html("");
    $("#topUpBody").html("");

    $("#join").click(function() {
        alertify.confirm(bodyTopUp).set('onok', function(closeevent, value) {
            idTeam = $("#idTim").val();
            //alert(idTeam);
            $.ajax({
                url: "<?= base_url(); ?>Community/joinTeam",
                method: "post",
                data: {
                    idTeam: idTeam
                },
                success: function(result) {
                    if (result == false) {
                        alertify.error("Can't find ID Team");

                    } else {
                        $(".accItemContainer").html(result);
                        alertify.success("Success join team");
                    }
                }
            });


        }).set({
            onfocus: function() {
                $(".ajs-input").attr("id", "idChannel");
            },
            'title': headerTopUp
        });
    });

    <?php if (isset($_SESSION['master'])) { ?>

        $(".listMember").on("click", ".regular", function() {
            idUser = $(this).attr("idUser");
            alertify.confirm('Confirmation', 'Kick user ?',
                function() {
                    $.ajax({
                        url: "<?= base_url(); ?>Community/decMember",
                        method: "post",
                        data: {
                            id_team: teamA,
                            id_user: idUser
                        },
                        success: function(result) {
                            $(".listMember").html(result);
                            alertify.error('Kicked!');
                        }
                    });
                },
                function() {}
            ).set('labels', {
                ok: 'Kick',
                cancel: 'Cancel'
            });
        });

    <?php } ?>




    var animated = false;
    var action1 = false;
    var action2 = false;
    var action3 = false;
    var action4 = false;

    $("#action1").click(function() {
        $("#action1").css("outline", "none");
        if (!animated) {
            if (!action1) {
                action1 = true;
                $("#Icon_ionic-ios-trophy").attr("fill", "#d7c13f");
                $("#tournament").removeClass("fadeOut");
                if (action2) {
                    action2 = false;
                    $("#Icon_material-event-available").attr("fill", "#fff");
                    $("#event").addClass("fadeOut");
                    timer[4] = setTimeout("$('#event').hide();", 1000);
                } else if (action3) {
                    action3 = false;
                    $("#Path_1010").attr("stroke", "#fff");
                    $("#Path_1011").attr("stroke", "#fff");
                    $("#settings").addClass("fadeOut");
                    timer[4] = setTimeout("$('#settings').hide();", 1000);
                } else if (action4) {
                    action4 = false;
                    $("#Icon_material-access-alarm").attr("fill", "#fff");
                    $("#reminder").addClass("fadeOut");
                    timer[4] = setTimeout("$('#reminder').hide();", 1000);
                } else {
                    main = false;
                    $(".chatWrapper").addClass("fadeOut animated");
                    $(".inputField").addClass("fadeOut animated");
                    timer[2] = setTimeout("$('.chatWrapper').hide();", 1000);
                    timer[3] = setTimeout("$('.inputField').hide();", 1000);
                    animated = true;
                }
                timer[0] = setTimeout("$('#tournament').show();", 1000);
                timer[1] = setTimeout("$('#tournament').addClass('fadeIn animated');", 1000);
            } else if (action1) {
                action1 = false;
                $("#Icon_ionic-ios-trophy").attr("fill", "#fff");
                $("#tournament").removeClass("fadeIn");
                $("#tournament").addClass("fadeOut");
                timer[4] = setTimeout("$('#tournament').hide();", 1000);
                timer[5] = setTimeout(fadeInFrame, 1000);

                function fadeInFrame() {
                    $('.chatWrapper').show()
                    $('.inputField').show()
                    $(".chatWrapper").removeClass("fadeOut");
                    $(".inputField").removeClass("fadeOut");
                    $(".chatField").addClass("fadeIn");
                    $(".inputField").addClass("fadeIn");
                }
                animated = true;
            }
            timer[6] = setTimeout("animated=false;", 2000);
        }
    });

    $("#action3").click(function() {
        $("#action3").css("outline", "none");
        if (!animated) {
            if (!action3) {
                action3 = true;
                $("#Path_1010").attr("stroke", "#d7c13f");
                $("#Path_1011").attr("stroke", "#d7c13f");
                $("#settings").removeClass("fadeOut");
                if (action1) {
                    action1 = false;
                    $("#Icon_ionic-ios-trophy").attr("fill", "#fff");
                    $("#tournament").addClass("fadeOut");
                    timer[4] = setTimeout("$('#tournament').hide();", 1000);
                } else if (action4) {
                    action4 = false;
                    $("#Icon_material-access-alarm").attr("fill", "#fff");
                    $("#reminder").addClass("fadeOut");
                    timer[4] = setTimeout("$('#reminder').hide();", 1000);
                } else if (action2) {
                    action2 = false;
                    $("#Icon_material-event-available").attr("fill", "#fff");
                    $("#event").addClass("fadeOut");
                    timer[4] = setTimeout("$('#event').hide();", 1000);
                } else {
                    main = false;
                    $(".chatWrapper").addClass("fadeOut animated");
                    $(".inputField").addClass("fadeOut animated");
                    timer[2] = setTimeout("$('.chatWrapper').hide();", 1000);
                    timer[3] = setTimeout("$('.inputField').hide();", 1000);
                    animated = true;
                }
                timer[0] = setTimeout("$('#settings').show();", 1000);
                timer[1] = setTimeout("$('#settings').addClass('fadeIn animated');", 1000);
            } else if (action3) {
                action3 = false;
                $("#Path_1010").attr("stroke", "#fff");
                $("#Path_1011").attr("stroke", "#fff");
                $("#settings").removeClass("fadeIn");
                $("#settings").addClass("fadeOut");
                timer[4] = setTimeout("$('#settings').hide();", 1000);
                timer[5] = setTimeout(fadeInFrame, 1000);

                function fadeInFrame() {
                    $('.chatWrapper').show()
                    $('.inputField').show()
                    $(".chatWrapper").removeClass("fadeOut");
                    $(".inputField").removeClass("fadeOut");
                    $(".chatField").addClass("fadeIn");
                    $(".inputField").addClass("fadeIn");
                }
                animated = true;
            }
            timer[6] = setTimeout("animated=false;", 2000);
        }
    });

    $("#action4").click(function() {
        $("#action4").css("outline", "none");
        if (!animated) {
            if (!action4) {
                action4 = true;
                $("#Icon_material-access-alarm").attr("fill", "#d7c13f");
                $("#reminder").removeClass("fadeOut");
                if (action1) {
                    action1 = false;
                    $("#Icon_ionic-ios-trophy").attr("fill", "#fff");
                    $("#tournament").addClass("fadeOut");
                    timer[4] = setTimeout("$('#tournament').hide();", 1000);
                } else if (action3) {
                    action3 = false;
                    $("#Path_1010").attr("stroke", "#fff");
                    $("#Path_1011").attr("stroke", "#fff");
                    $("#settings").addClass("fadeOut");
                    timer[4] = setTimeout("$('#settings').hide();", 1000);
                } else if (action2) {
                    action2 = false;
                    $("#Icon_material-event-available").attr("fill", "#fff");
                    $("#event").addClass("fadeOut");
                    timer[4] = setTimeout("$('#event').hide();", 1000);
                } else {
                    main = false;
                    $(".chatWrapper").addClass("fadeOut animated");
                    $(".inputField").addClass("fadeOut animated");
                    timer[2] = setTimeout("$('.chatWrapper').hide();", 1000);
                    timer[3] = setTimeout("$('.inputField').hide();", 1000);
                    animated = true;
                }
                timer[0] = setTimeout("$('#reminder').show();", 1000);
                timer[1] = setTimeout("$('#reminder').addClass('fadeIn animated');", 1000);
            } else if (action4) {
                action4 = false;
                $("#Icon_material-access-alarm").attr("fill", "#fff");
                $("#reminder").removeClass("fadeIn");
                $("#reminder").addClass("fadeOut");
                timer[4] = setTimeout("$('#reminder').hide();", 1000);
                timer[5] = setTimeout(fadeInFrame, 1000);

                function fadeInFrame() {
                    $('.chatWrapper').show()
                    $('.inputField').show()
                    $(".chatWrapper").removeClass("fadeOut");
                    $(".inputField").removeClass("fadeOut");
                    $(".chatField").addClass("fadeIn");
                    $(".inputField").addClass("fadeIn");
                }
                animated = true;
            }
            timer[6] = setTimeout("animated=false;", 2000);
        }
    });

    $("#slotTour").on("input", function() {
        if (this.value.length > 3) {
            this.value = this.value.slice(0, 3);
        }
    });

    $("#message").on("input", function() {
        if (this.value.length > 250) {
            this.value = this.value.slice(0, 250);
        }
    });


    var createReminder = false;
    $("#createReminder").click(function() {
        if (createReminder == false) {
            $("#reminderForm").collapse("show");
            createReminder = true;
        } else {
            judul = $('[name="tourName"]').val();
            desc = $('[name="messagereminder"]').val();
            hari = $('[name="reminderDate"]').val();
            jam = $('[name="reminderTime"]').val();
            waktu = hari + " " + jam;

            alert(waktu);

            // foto = $(".imageContainer").find('img').attr('src');

            // if (foto.substring(11, 12) == "j") {
            //     foto = foto.substring(23, foto.length);
            // } else {
            //     foto = foto.substring(22, foto.length);
            // }

            $.ajax({
                url: "<?= base_url(); ?>Community/insertReminder",
                method: "post",
                data: {
                    id_team: teamA,
                    id_user: userA,
                    judul: judul,
                    keterangan: desc,
                    waktu: waktu
                },
                success: function(result) {
                    $(".reminders").html(result);
                    $("#reminderForm").collapse("hide");
                    alertify.success("Success add reminder");
                    createReminder = false;
                }
            });
        }
    });

    $(".imageShow").click(function() {
        $("#imgEvent").trigger("click");
    });

    $("#imgEvent").change(function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.img').attr('src', e.target.result);
                $('.img').attr('hidden', false);
                $(".imgText").hide();
            };
            reader.readAsDataURL(this.files[0]);
        }
    });

    var minimize = false;

    $(".minimize").click(function() {
        if (minimize) {
            $(".request").show();
            minimize = false;
        } else {
            $(".request").hide();
            minimize = true;
        }
    });


    $("#inputChannelImg").change(function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var img = $('<img>').attr('src', e.target.result);
                $("#imgContainer").html(img)
            };
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>

</html>