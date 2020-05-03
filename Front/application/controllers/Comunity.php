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
        $this->load->view('viewChannel', $data);
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
        $this->load->view('viewTeam', $data);
    }
}
