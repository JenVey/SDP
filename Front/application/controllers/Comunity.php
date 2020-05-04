<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop extends CI_Controller
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
        $this->load->model('ChannelEvent_model');
        $this->load->model('Team_model');
        $this->load->model('TeamMember_model');
        $this->load->model('TeamRemin_model');
        $this->load->model('Tournament_model');
        $this->load->model('Standing_model');
        $this->load->model('Petandingan_model');
        $this->load->model('Pesan_model');
        $this->load->model('Friend_model');
    }

    public function viewChannel()
    {
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
        $this->load->view('channel/viewChannel', $data);
    }

    public function insertEvent()
    {
        $this->ChannelEvent_model->insertChannelEvent();
        redirect('channel/viewChannel');
    }

    public function deleteEvent()
    {
        $this->ChannelEvent_model->deleteChannelEvent();
        redirect('channel/viewChannel');
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
        $this->load->view('channel/viewTeam', $data);
    }

    public function viewFriend()
    {
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
        $this->load->view('channel/viewTeam', $data);
    }

    public function addFriend()
    {
        $this->Friend_model->addFriend();
    }

    public function sendChat()
    {
        $this->Pesan_model->insertPesan();
        redirect('channel/refreshChat');
    }

    public function refreshChat($id)
    {
        $data['pesan'] = $this->Pesan_model->getAllPesanByIdPengirim($id);
        $this->load->view('channel/bodyPesan', $data);
    }

    public function refreshMemberChannel()
    {
        $data['channelU'] = $this->ChannelUser_model->getAllChannelUserbyIdChannel();
        $this->load->view('channel/bodyMember', $data);
    }



    public function insertReminder()
    {
    }
}
