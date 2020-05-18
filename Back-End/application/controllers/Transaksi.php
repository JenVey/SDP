<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
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
        $this->load->model('User_model');
        $this->load->model('Trans_model');
        $this->load->model('TransItem_model');
        $this->load->model('Merchant_model');
        $this->load->model('Item_model');
    }

    public function index()
    {

        $data['transaksiItem'] = $this->TransItem_model->getAllTransItem();
        $data['transaksi'] = $this->Trans_model->getAllTrans();
        $data['merchant'] = $this->Merchant_model->getAllMerchant();
        $data['item'] = $this->Item_model->getAllItem();
        $data['user'] = $this->User_model->getAllUser();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('transaksi/listTransaksi', $data);
    }

    public function editTransaksi()
    {
        $data['transaksi'] = $this->Trans_model->getAllUser();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/navbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('transaksi/editTransaksi', $data);
    }

    public function changeStatus($status)
    {
        $this->TransItem_model->changeStatus($status);
        redirect("Transaksi");
    }
}
