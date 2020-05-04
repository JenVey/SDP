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
    }

    public function viewChannel()
    {
        if (isset($_SESSION['idFriend'])) {
            $this->session->unset_userdata('idFriend');
        }
        if (isset($_SESSION['idTeam'])) {
            $this->session->unset_userdata('idTeam');
        }

        $id = $this->session->userdata('id_user');
        $data['user'] = $this->User_model->getUserById($id);
        if (isset($_SESSION['idChannel'])) {
            $data['channelA'] = $this->Channel_model->getChannelById();
        }
        $data['channel'] = $this->Channel_model->getAllChannelByIdUser($id);
        $data['channelU'] = $this->ChannelUser_model->getAllChannelUser();
        $data['channelE'] = $this->ChannelEvent_model->getAllChannelEvent();
        $data['pesan'] = $this->Pesan_model->getAllPesan();
        // $data['tournament'] = $this->Tournament_model->getAllTournament();
        // $data['standing'] = $this->Standing_model->getAllStanding();
        // $data['pertandingan'] = $this->Petandingan_model->getAllPertandingan();
        // $data['team'] = $this->Team_model->getAllTeam();


        //$this->load->view('templates/header', $data);
        $this->load->view('community/viewChannel', $data);
    }

    public function chooseChannel()
    {
        $idChannel =  $this->input->post('idChannel');
        $this->session->set_userdata(array('idChannel' => $idChannel));
    }

    public function insertEvent()
    {
        $this->ChannelEvent_model->insertChannelEvent();
        redirect('community/viewChannel');
    }

    public function deleteEvent()
    {
        $this->ChannelEvent_model->deleteChannelEvent();
        redirect('community/viewChannel');
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
                $ctr -= 2;
                $ctr2 = 4;
                for ($i = $ctr; $i <= 1; $i++) {
                    for ($j = 1; $j <= $ctr2; $j++) {
                        $this->Pertandingan_model->insertPertandingan('round' . $i);
                    }
                    $ctr2 *= 2;
                }
            }
        }

        $this->session->unset_userdata('idTurnament');
    }


    public function viewTeam()
    {
        if (isset($_SESSION['idChannel'])) {
            $this->session->unset_userdata('idChannel');
        }
        if (isset($_SESSION['idFriend'])) {
            $this->session->unset_userdata('idFriend');
        }

        $id = $this->session->userdata('id_user');
        $data['user'] = $this->User_model->getUserById($id);
        $data['team'] = $this->Team_model->getAllTeam();
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

    public function chooseTeam()
    {
        $idTeam =  $this->input->post('idTeam');
        $this->session->set_userdata(array('idTeam' => $idTeam));
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
        $data['channel'] = $this->Channel_model->getAllChannelByIdUser($id);
        $data['channelU'] = $this->ChannelUser_model->getAllChannelUser();
        $data['channelE'] = $this->ChannelEvent_model->getAllChannelEvent();
        $data['tournament'] = $this->Tournament_model->getAllTournament();
        $data['standing'] = $this->Standing_model->getAllStanding();
        $data['pertandingan'] = $this->Petandingan_model->getAllPertandingan();
        $data['team'] = $this->Team_model->getAllTeam();
        $data['pesan'] = $this->Pesan_model->getAllPesan();

        //$this->load->view('templates/header', $data);
        $this->load->view('community/viewTeam', $data);
    }

    public function chooseFriend()
    {
        $idFriend =  $this->input->post('idFriend');
        $this->session->set_userdata(array('idFriend' => $idFriend));
    }

    public function addFriend()
    {
        $this->Friend_model->addFriend();
    }

    public function insertPesan()
    {
        $this->Pesan_model->insertPesan();

        redirect('community/refreshChat');
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
    }

    public function insertReminder()
    {
    }
}
