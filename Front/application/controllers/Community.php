<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Community extends CI_Controller
{
    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_model');
        $this->load->model('Channel_model');
        $this->load->model('ChannelUser_model');
        $this->load->model('ChannelEvent_model');
        $this->load->model('Team_model');
        $this->load->model('TeamMember_model');
        $this->load->model('TeamRemin_model');
        $this->load->model('Tournament_model');
        $this->load->model('Standing_model');
        $this->load->model('Pertandingan_model');
        $this->load->model('Pesan_model');
        $this->load->model('Friend_model');
        $this->load->model('Game_model');
    }

    public function viewChannel()
    {
        if (isset($_SESSION['idFriend'])) {
            $this->session->unset_userdata('idFriend');
        }
        if (isset($_SESSION['idTeam'])) {
            $this->session->unset_userdata('idTeam');
        }
        $this->session->unset_userdata('master');
        $this->session->unset_userdata('admin');
        $id = $this->session->userdata('id_user');
        $data['user'] = $this->User_model->getUserById($id);
        if (isset($_SESSION['idChannel'])) {
            $data['channelA'] = $this->Channel_model->getChannelById();
        }
        $data['channel'] = $this->Channel_model->getAllChannelByIdUser();
        $data['channelU'] = $this->ChannelUser_model->getAllChannelUser();
        $data['channelE'] = $this->ChannelEvent_model->getAllChannelEvent();
        $data['pesan'] = $this->Pesan_model->getAllPesan();
        $data['game'] = $this->Game_model->getAllGame();
        $data['tournament'] = $this->Tournament_model->getAllTournament();
        $data['standing'] = $this->Standing_model->getAllStanding();
        //$data['pertandingan'] = $this->Petandingan_model->getAllPertandingan();
        //$data['team'] = $this->Team_model->getAllTeam();

        //$this->load->view('templates/header', $data);
        $this->load->view('community/viewChannel', $data);
    }

    public function insertChannel()
    {
        $this->Channel_model->insertChannel();
        $this->ChannelUser_model->insertChannelUser();
        redirect('Community/refreshAccItem');
    }

    public function editChannel()
    {
        $this->Channel_model->editChannel();
    }

    public function chooseChannel()
    {
        $idChannel =  $this->input->post('idChannel');
        $this->session->set_userdata(array('idChannel' => $idChannel));
    }

    public function searchChannelUser()
    {
        $keyword = $this->input->post('keyword');
        $this->ChannelUser_model->searchChannelUser($keyword);
    }

    public function searchChannel()
    {
        $data['channelA'] = $this->Channel_model->getChannelById();
        $data['channel'] =  $this->Channel_model->searchChannel();
        $this->load->view('community/accItemContainerC', $data);
    }

    public function joinChannel()
    {
        $this->Channel_model->cekChannel();
    }

    public function accMember()
    {
        $this->ChannelUser_model->accMember();
        redirect('Community/refreshListMemberContainer');
    }

    public function decMember()
    {
        if (isset($_SESSION['idChannel'])) {
            $this->ChannelUser_model->decMember();
            redirect('Community/refreshListMemberContainer');
        }
        if (isset($_SESSION['idTeam'])) {
            $this->TeamMember_model->kickMember();
            redirect('Community/refreshListMemberContainer');
        }
    }

    public function insertEvent()
    {
        $this->ChannelEvent_model->insertChannelEvent();
        redirect('Community/refreshEvent');
    }

    public function deleteEvent()
    {
        $this->ChannelEvent_model->deleteChannelEvent();
        redirect('community/viewChannel');
    }

    public function refreshEvent()
    {
        $data['channelA'] = $this->Channel_model->getChannelById();
        $data['channelE'] = $this->ChannelEvent_model->getAllChannelEVent();
        $this->load->view('community/eventContainer', $data);
    }

    public function refreshMember()
    {
        if (isset($_SESSION['idChannel'])) {
            $data['channelA'] = $this->Channel_model->getChannelById();
            $data['channelU'] = $this->ChannelUser_model->getAllChannelUser();
            $this->load->view('community/bodyMemberC', $data);
        }
        if (isset($_SESSION['idTeam'])) {
            $data['teamA'] = $this->Team_model->getTeamById();
            $data['teamM'] = $this->TeamMember_model->getAllTeamMember();
            $this->load->view('community/bodyMemberT', $data);
        }
    }

    public function promoteMember()
    {
        $this->ChannelUser_model->promoteMember();
        redirect('Community/refreshListMemberContainer');
    }

    public function demoteAdmin()
    {
        $this->ChannelUser_model->demoteAdmin();
        redirect('Community/refreshListMemberContainer');
    }

    public function refreshListMemberContainer()
    {
        $id = $this->session->userdata('id_user');
        $data['user'] = $this->User_model->getUserById($id);
        if (isset($_SESSION['idChannel'])) {
            $data['channelA'] = $this->Channel_model->getChannelById();
            $data['channelU'] = $this->ChannelUser_model->getAllChannelUser();
            $this->load->view('community/listMemberContainerC', $data);
        }
        if (isset($_SESSION['idTeam'])) {
            $data['teamA'] = $this->Team_model->getTeamById();
            $data['teamM'] = $this->TeamMember_model->getAllTeamMember();
            $this->load->view('community/listMemberContainerT', $data);
        }
    }

    public function insertTournament()
    {
        $this->Tournament_model->insertTournament();

        $slot = $this->input->post('jumlah_slot');
        $pembagian = $slot / 2;

        $this->Pertandingan_model->insertPertandingan('final');
        if ($pembagian != 1) {
            $cekKiri = $pembagian / 2;
            $cekKanan = $pembagian - $cekKiri;

            $this->Pertandingan_model->insertPertandingan('semifinalkiri');

            $this->Pertandingan_model->insertPertandingan('semifinalkanan');

            $kiri = 1;
            $kanan = 1;
            $ctr = 0;
            $ada = false;

            while ($kiri * 2 <= $cekKiri) {
                $kiri *= 2;
                if ($ctr == 0) {
                    $this->Pertandingan_model->insertPertandingan('quarterfinalkiri1');
                    $this->Pertandingan_model->insertPertandingan('quarterfinalkiri2');
                } else if ($ctr > 0) {
                    $ada = true;
                }
                $ctr++;
            }


            if ($ada == true) {
                $ctr -= 1;
                $ctr2 = 4;
                for ($i = $ctr; $i >= 1; $i--) {
                    for ($j = 1; $j <= $ctr2; $j++) {
                        $this->Pertandingan_model->insertPertandingan('round' . $i . 'kiri' . $j);
                    }
                    $ctr2 *= 2;
                }
            }

            $ctr = 0;
            $ada = false;

            while ($kanan * 2 <= $cekKanan) {
                $kanan *= 2;
                if ($ctr == 0) {
                    $this->Pertandingan_model->insertPertandingan('quarterfinalkanan1');
                    $this->Pertandingan_model->insertPertandingan('quarterfinalkanan2');
                } else if ($ctr > 0) {
                    $ada = true;
                }
                $ctr++;
            }

            if ($ada == true) {
                $ctr -= 1;
                $ctr2 = 4;
                for ($i = $ctr; $i >= 1; $i--) {
                    for ($j = 1; $j <= $ctr2; $j++) {
                        $this->Pertandingan_model->insertPertandingan('round' . $i . 'kanan' . $j);
                    }
                    $ctr2 *= 2;
                }
            }
        }

        $this->session->unset_userdata('idTurnament');
        redirect('Community/refreshTournament');
    }

    public function joinPertandingan()
    {
        $this->Pertandingan_model->joinPertandingan();
    }


    public function refreshTournament()
    {
        $data['game'] = $this->Game_model->getAllGame();
        $data['tournament'] = $this->Tournament_model->getAllTournament();
        $data['standing'] = $this->Standing_model->getAllStanding();
        $this->load->view('community/tournamentContainer', $data);
    }


    public function viewTeam()
    {
        if (isset($_SESSION['idChannel'])) {
            $this->session->unset_userdata('idChannel');
        }
        if (isset($_SESSION['idFriend'])) {
            $this->session->unset_userdata('idFriend');
        }
        $this->session->unset_userdata('master');
        $id = $this->session->userdata('id_user');
        $data['user'] = $this->User_model->getUserById($id);
        $data['team'] = $this->Team_model->getAllTeamByIdUser();
        if (isset($_SESSION['idTeam'])) {
            $data['teamA'] = $this->Team_model->getTeamById();
        }
        $data['teamM'] = $this->TeamMember_model->getAllTeamMember();
        $data['teamR'] = $this->TeamRemin_model->getAllTeamRemin();
        $data['pesan'] = $this->Pesan_model->getAllPesan();

        // $data['tournament'] = $this->Tournament_model->getAllTournament();
        // $data['standing'] = $this->Standing_model->getAllStanding();
        // $data['pertandingan'] = $this->Petandingan_model->getAllPertandingan();

        //$this->load->view('templates/header', $data);
        $this->load->view('community/viewTeam', $data);
    }

    public function insertTeam()
    {
        $this->Team_model->insertTeam();
        redirect('Community/refreshAccItem');
    }
    public function editTeam()
    {
        $this->Team_model->editTeam();
    }

    // public function searchTeamMember()
    // {
    //     $this->TeamMember_model->searchTeamMember();
    // }

    public function searchTeam()
    {
        $data['teamA'] = $this->Team_model->getTeamById();
        $data['team'] = $this->Team_model->searchTeam();
        $this->load->view('community/accItemContainerT', $data);
    }

    public function chooseTeam()
    {
        $idTeam =  $this->input->post('idTeam');
        $this->session->set_userdata(array('idTeam' => $idTeam));
    }

    public function joinTeam()
    {
        $this->Team_model->cekTeam();
        redirect('Community/refreshAccItem');
    }

    public function kickTeam()
    {
        $this->Team_model->kickMember();
    }

    public function viewFriend()
    {
        if (isset($_SESSION['idChannel'])) {
            $this->session->unset_userdata('idChannel');
        }
        if (isset($_SESSION['idTeam'])) {
            $this->session->unset_userdata('idTeam');
        }

        $id = $this->session->userdata('id_user');
        $data['user'] = $this->User_model->getUserById($id);
        $data['friend'] = $this->Friend_model->getFriendByIdUser($id);
        if (isset($_SESSION['idFriend'])) {
            $data['friendA'] = $this->User_model->getFriendById();
        }
        $data['pesan'] = $this->Pesan_model->getAllPesan();

        $this->load->view('community/viewFriend', $data);
    }

    public function chooseFriend()
    {
        $idFriend =  $this->input->post('idFriend');
        $this->session->set_userdata(array('idFriend' => $idFriend));
        $this->Pesan_model->readPesan();
    }

    public function cekUsername()
    {
        $this->User_model->cekUsername();
        if (isset($_SESSION['friend'])) {
            $this->session->unset_userdata('friend');
            redirect('Community/refreshAccItem');
        }
    }

    public function updateAddfriend()
    {
        $this->Friend_model->updateAddfriend();
    }

    public function blockUser()
    {
        $this->Friend_model->blockUser();
        redirect('Community/refreshBlock');
    }

    public function unblockUser()
    {
        $this->Friend_model->unblockUser();
        redirect('Community/refreshBlock');
    }

    public function searchFriend()
    {
        $id = $this->session->userdata('id_user');
        $data['user'] = $this->User_model->getUserById($id);
        $data['friend'] = $this->Friend_model->searchFriend();
        $data['friendA'] = $this->User_model->getFriendById();
        $data['pesan'] = $this->Pesan_model->getAllPesan();
        $this->load->view('community/accItemContainerF', $data);
    }

    public function refreshBlock()
    {
        $id = $this->session->userdata('id_user');
        $data['user'] = $this->User_model->getUserById($id);
        $data['friend'] = $this->Friend_model->getFriendByIdUser($id);
        $data['friendA'] = $this->User_model->getFriendById();
        $this->load->view('community/blockContainer', $data);
    }


    public function insertPesan()
    {
        $this->Pesan_model->insertPesan();
        redirect('community/refreshChat');
    }

    public function refreshAccItem()
    {
        $id = $this->session->userdata('id_user');
        $data['user'] = $this->User_model->getUserById($id);

        if (isset($_SESSION['idChannel'])) {
            $data['channelA'] = $this->Channel_model->getChannelById();
            $data['channel'] = $this->Channel_model->getAllChannelByIdUser($id);
            $this->load->view('community/accItemContainerC', $data);
        }
        if (isset($_SESSION['idTeam'])) {
            $data['teamA'] = $this->Team_model->getTeamById();
            $data['team'] = $this->Team_model->getAllTeamByIdUser();
            $this->load->view('community/accItemContainerT', $data);
        }
        if (isset($_SESSION['idFriend'])) {
            $data['friend'] = $this->Friend_model->getFriendByIdUser($id);
            $data['friendA'] = $this->User_model->getFriendById();
            $this->load->view('community/accItemContainerF', $data);
        }
    }

    public function refreshChat()
    {
        $id = $this->session->userdata('id_user');
        $data['user'] = $this->User_model->getUserById($id);
        if (isset($_SESSION['idChannel'])) {
            $data['channelA'] = $this->Channel_model->getChannelById();
            $data['pesan'] = $this->Pesan_model->getAllPesan();
            $this->load->view('community/bodyPesanC', $data);
        }
        if (isset($_SESSION['idTeam'])) {
            $data['teamA'] = $this->Team_model->getTeamById();
            $data['pesan'] = $this->Pesan_model->getAllPesan();
            $this->load->view('community/bodyPesanT', $data);
        }
        if (isset($_SESSION['idFriend'])) {

            $data['friendA'] = $this->User_model->getFriendById();
            $data['pesan'] = $this->Pesan_model->getAllPesan();
            $this->load->view('community/bodyPesanU', $data);
        }
    }

    public function insertReminder()
    {
        $this->TeamRemin_model->insertTeamRemin();
        redirect('Community/refreshReminder');
    }

    public function deleteReminder()
    {
        $this->TeamRemin_model->deleteReminder();
        redirect('Community/refreshReminder');
    }

    public function refreshReminder()
    {
        $data['teamA'] = $this->Team_model->getTeamById();
        $data['teamR'] = $this->TeamRemin_model->getAllTeamRemin();
        $this->load->view('community/reminderContainer', $data);
    }

    public function setTournament()
    {
        $idTour = $this->input->post('id_turnament');
        $this->session->set_userdata(array('idTournament' => $idTour));
        //redirect('Community/viewTournament');
    }

    public function viewTournament()
    {
        $id = $this->session->userdata('id_user');
        $data['user'] = $this->User_model->getUserById($id);

        $data['channelA'] = $this->Channel_model->getChannelById();
        $data['tournament'] = $this->Tournament_model->getAllTournament();
        $data['standing'] = $this->Standing_model->getAllStanding();
        $data['pertandingan'] = $this->Pertandingan_model->getAllPertandingan();
        //$data['team'] = $this->Team_model->getAllTeam();

        $this->load->view('community/viewTournament', $data);
    }
}
