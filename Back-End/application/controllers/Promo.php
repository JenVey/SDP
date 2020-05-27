<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Promo extends CI_Controller
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

        $this->load->model('TransItem_model');
        $this->load->model('Promo_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

        $data['promo'] = $this->Promo_model->getAllPromo();
        $data['transItem'] = $this->TransItem_model->getAllTransItem();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('promo/listPromo', $data);
    }

    public function editPromo($idPromo)
    {
        $data['promo'] = $this->Promo_model->getPromoById($idPromo);
        $data['transItem'] = $this->TransItem_model->getAllTransItem();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('promo/editPromo', $data);
    }

    public function insertPromo()
    {
        $data['transItem'] = $this->TransItem_model->getAllTransItem();
        $data['promo'] = $this->Promo_model->getAllPromo();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('promo/insertPromo', $data);
    }

    public function insert()
    {
        $this->form_validation->set_rules('kodepromo', 'Kode Promo', 'required');
        $this->form_validation->set_rules('potongan', 'Potongan', 'required');
        $this->form_validation->set_rules('potongan', 'Potongan', 'numeric');
        $this->form_validation->set_rules('maksimal', 'Maksimal', 'required');
        $this->form_validation->set_rules('tglKadaluwarsa', 'Tanggal Kadaluwarsa', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('promo/insertPromo');
        } else {
            $this->Promo_model->insertPromo();
            $this->session->set_flashdata('flash', 'Success Insert Promo !!!');
            redirect('Promo');
        }
    }

    public function delete($idPromo)
    {
        $this->Promo_model->deletePromo($idPromo);
        redirect('Promo');
    }

    public function edit($idPromo)
    {
        $this->form_validation->set_rules('kodepromo', 'Kode Promo', 'required');
        $this->form_validation->set_rules('potongan', 'Potongan', 'required');
        $this->form_validation->set_rules('potongan', 'Potongan', 'numeric');
        $this->form_validation->set_rules('maksimal', 'Maksimal', 'required');
        $this->form_validation->set_rules('tglKadaluwarsa', 'Tanggal Kadaluwarsa', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates/navbar');
            $this->load->view('templates/sidebar');
            $this->load->view('promo/editPromo');
        } else {
            $this->Promo_model->editPromo($idPromo);
            $this->session->set_flashdata('flash', 'Success Edit Promo !!!');
            redirect('Promo');
        }
    }
}
