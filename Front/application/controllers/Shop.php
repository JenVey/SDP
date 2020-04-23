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
        $this->load->model('User_model');
        $this->load->model('Item_model');
        $this->load->model('Merchant_model');
        $this->load->model('Game_model');
    }

    public function index($id)
    {
        $data['user'] = $this->User_model->getUserById($id);
        $data['merchant'] = $this->Merchant_model->getAllMerchant();

        $data['item'] = $this->Item_model->getAllItem();
        $data['games'] = $this->Game_model->getAllGame();

        $this->load->view('templates/header', $data);
        $this->load->view('shop', $data);
    }

    public function viewItem()
    {
        $this->load->view('viewItem');
    }
}
