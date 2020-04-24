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
        $this->load->model('Friend_model');
        $this->load->model('Item_model');
        $this->load->model('Merchant_model');
        $this->load->model('Game_model');
        $this->load->model('Komen_model');
    }

    public function index()
    {
        //$this->session->unset_userdata('id_game');
        $id = $this->session->userdata('id_user');
        $data['user'] = $this->User_model->getUserById($id);
        $data['merchantF'] = $this->Merchant_model->getMerchantByIdUser($id);
        $data['merchant'] = $this->Merchant_model->getAllMerchant();
        $data['item'] = $this->Item_model->getAllItemOrder();
        $data['games'] = $this->Game_model->getAllGame();
        $this->load->view('templates/header', $data);
        $this->load->view('shop', $data);
    }

    public function viewItem($idI)
    {
        $id = $this->session->userdata('id_user');
        $data['user'] = $this->User_model->getUserById($id);
        $data['merchantF'] = $this->Merchant_model->getMerchantByIdUser($id);
        $data['merchant'] = $this->Merchant_model->getAllMerchant();
        $data['item'] = $this->Item_model->getItemById($idI);
        $data['games'] = $this->Game_model->getAllGame();
        $data['komen'] = $this->Komen_model->getKomenByIdItem($idI);
        $this->load->view('viewItem', $data);
    }

    public function viewMerchant($idM)
    {
        $id = $this->session->userdata('id_user');
        $data['user'] = $this->User_model->getUserById($id);
        $data['merchantF'] = $this->Merchant_model->getMerchantByIdUser($id);
        $data['merchant'] = $this->Merchant_model->getMerchantById($idM);
        $data['item'] = $this->Item_model->getItemByIdMerchant($idM);
        $this->load->view('viewMerchant', $data);
    }

    public function unsetGame()
    {
        $this->session->unset_userdata('id_game');
        redirect('Shop');
    }

    public function setGame($id)
    {
        $this->session->set_userdata(array('id_game' => $id));
        redirect('Shop');
    }
}
