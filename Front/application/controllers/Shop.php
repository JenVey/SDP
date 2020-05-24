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
        $this->load->model('Friend_model');
        $this->load->model('Item_model');
        $this->load->model('Merchant_model');
        $this->load->model('Game_model');
        $this->load->model('Komen_model');
        $this->load->model('Cart_model');
        $this->load->model('Trans_model');
        $this->load->model('TransItem_model');
        $this->load->model('History_model');
        $this->load->model('Rating_model');
        $this->load->model('Gacha_model');
        $this->load->model('Promo_model');
        $this->load->model('Pesan_model');
        $this->load->model('Subs_model');
        $this->load->model('Reply_model');
    }

    public function index()
    {
        //PAGINATION
        $this->load->library('pagination');
        $config['base_url'] = "http://localhost/Github/SDP_Proyek/Front/Shop/index";
        $config['total_rows'] = $this->Item_model->countAllItem();
        $config['per_page'] = 9;

        $start = $this->uri->segment(3);



        //STYLE PAGINATION
        $config['full_tag_open'] = '<div class="pagination">';
        $config['full_tag_close'] = ' </div>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<div class="pageblock">';
        $config['first_tag_close'] = '</div>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<div class="pageblock">';
        $config['last_tag_close'] = '</div>';


        $config['next_link'] = '  <svg xmlns="http://www.w3.org/2000/svg" width="20.243" height="13.501" viewBox="0 0 20.243 13.501">
                                    <path id="Icon_ionic-ios-arrow-round-back" data-name="Icon ionic-ios-arrow-round-back" d="M20.792,11.51a.919.919,0,0,0-.007,1.294l4.268,4.282H8.789a.914.914,0,0,0,0,1.828H25.053L20.777,23.2a.925.925,0,0,0,.007,1.294.91.91,0,0,0,1.287-.007l5.794-5.836h0a1.027,1.027,0,0,0,.19-.288.872.872,0,0,0,.07-.352.916.916,0,0,0-.26-.64l-5.794-5.836A.9.9,0,0,0,20.792,11.51Z" transform="translate(-7.882 -11.252)" fill="#ecf0f1"/>
                                </svg>';
        $config['next_tag_open'] = '<div class="pageblock">';
        $config['next_tag_close'] = '</div>';

        $config['prev_link'] = ' <svg xmlns="http://www.w3.org/2000/svg" width="20.243" height="13.501" viewBox="0 0 20.243 13.501">
                                    <path id="Icon_ionic-ios-arrow-round-back" data-name="Icon ionic-ios-arrow-round-back" d="M15.216,11.51a.919.919,0,0,1,.007,1.294l-4.268,4.282H27.218a.914.914,0,0,1,0,1.828H10.955L15.23,23.2a.925.925,0,0,1-.007,1.294.91.91,0,0,1-1.287-.007L8.142,18.647h0a1.026,1.026,0,0,1-.19-.288.872.872,0,0,1-.07-.352.916.916,0,0,1,.26-.64l5.794-5.836A.9.9,0,0,1,15.216,11.51Z" transform="translate(-7.882 -11.252)" fill="#ecf0f1"/>
                                </svg>';
        $config['prev_tag_open'] = ' <div class="pageblock">';
        $config['prev_tag_close'] = ' </div>';

        $config['cur_tag_open'] = '<div class="pageblock active" ><h4>';
        $config['cur_tag_close'] = '</h4></div>';

        $config['num_tag_open'] = ' <div class="pageblock"><h4>';
        $config['num_tag_close'] = '</h4></div>';

        // $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);

        // CEK STATUS DI MIDTRANS
        //$this->Trans_model->refreshStatus();
        $this->History_model->refreshStatus();

        if (isset($_SESSION['id_game'])) {
            $id = $this->session->userdata('id_user');
            $data['user'] = $this->User_model->getUserById($id);
            $data['merchantF'] = $this->Merchant_model->getMerchantByIdUser($id);
            $data['merchant'] = $this->Merchant_model->getAllMerchant();
            $data['item'] = $this->Item_model->getItemByIdGame($config['per_page'], $start);
            $data['games'] = $this->Game_model->getAllGame();
            $data['pagination'] = $this->pagination->create_links();
            $data['subscribers'] = $this->Subs_model->getAllSubs();
            $this->load->view('templates/header', $data);
            $this->load->view('shop/shop', $data);
        } else {
            $id = $this->session->userdata('id_user');
            $data['user'] = $this->User_model->getUserById($id);
            $data['merchantF'] = $this->Merchant_model->getMerchantByIdUser($id);
            $data['merchant'] = $this->Merchant_model->getAllMerchant();
            $data['item'] = $this->Item_model->getItem($config['per_page'], $start);
            //$data['item'] = $this->Item_model->getAllItem();
            $data['games'] = $this->Game_model->getAllGame();
            $data['pagination'] = $this->pagination->create_links();
            $data['subscribers'] = $this->Subs_model->getAllSubs();
            $this->load->view('templates/header', $data);
            $this->load->view('shop/shop', $data);
        }
    }

    public function viewItem($idI)
    {
        $id = $this->session->userdata('id_user');
        $data['user'] = $this->User_model->getUserById($id);
        $data['allUser'] = $this->User_model->getAllUser();
        $data['merchantF'] = $this->Merchant_model->getMerchantByIdUser($id);
        $data['merchant'] = $this->Merchant_model->getAllMerchant();
        $data['item'] = $this->Item_model->getItemById($idI);
        $data['games'] = $this->Game_model->getAllGame();
        $data['komen'] = $this->Komen_model->getKomenByIdItem($idI);
        $data['reply'] = $this->Reply_model->getAllReply();
        $this->load->view('shop/viewItem', $data);
    }

    public function viewMerchant($idM)
    {
        $id = $this->session->userdata('id_user');
        $this->session->set_userdata(array('id_merchant' => $idM));
        $data['user'] = $this->User_model->getUserById($id);
        $data['merchantF'] = $this->Merchant_model->getMerchantByIdUser($id);
        $data['merchant'] = $this->Merchant_model->getMerchantById($idM);
        $data['item'] = $this->Item_model->getItemByIdMerchant($idM);
        $data['rating'] = $this->Rating_model->getRatingByUser($id, $idM);
        $this->load->view('shop/viewMerchant', $data);
    }

    public function viewSearchM($keyword)
    {
        $start = $this->uri->segment(3);
        $id = $this->session->userdata('id_user');
        $idM = $this->session->userdata('id_merchant');
        $data['user'] = $this->User_model->getUserById($id);
        $data['merchantF'] = $this->Merchant_model->getMerchantByIdUser($id);
        $data['merchant'] = $this->Merchant_model->getMerchantById($idM);
        $data['item'] = $this->Item_model->getItemBySearchM($keyword);

        $this->session->unset_userdata('id_merchant');
        $this->load->view('shop/viewSearchM', $data);
    }

    public function viewSearch($keyword)
    {
        //PAGINATION
        $this->load->library('pagination');
        $config['base_url'] = "http://localhost/Github/SDP_Proyek/Front/Shop/index";
        $config['total_rows'] = $this->Item_model->countAllItem();
        $config['per_page'] = 10;

        $start = $this->uri->segment(3);



        //STYLE PAGINATION
        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';


        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';


        $config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = array('class' => 'page-link');

        $this->pagination->initialize($config);


        $id = $this->session->userdata('id_user');
        $data['user'] = $this->User_model->getUserById($id);
        $data['merchantF'] = $this->Merchant_model->getMerchantByIdUser($id);
        $data['merchant'] = $this->Merchant_model->getMerchantBySearch($keyword);
        //$data['item'] = $this->Item_model->getItemBySearch($keyword, 10, $start);
        $data['item'] = $this->Item_model->getItemBySearch($keyword);
        $data['pagination'] = $this->pagination->create_links();
        $this->load->view('shop/viewSearch', $data);
    }

    public function viewCart()
    {
        $id = $this->session->userdata('id_user');
        $this->Cart_model->updateStatus1();
        $data['user'] = $this->User_model->getUserById($id);
        $data['merchantF'] = $this->Merchant_model->getMerchantByIdUser($id);
        $data['merchant'] = $this->Merchant_model->getAllMerchant();
        $data['transaksi'] = $this->Trans_model->getAllTrans();
        $data['transaksiItem'] = $this->TransItem_model->getAllTransItem();
        $data['item'] = $this->Item_model->getAllItem();
        $data['games'] = $this->Game_model->getAllGame();
        $data['promo'] = $this->Promo_model->getAllPromo();
        $data['cart'] = $this->Cart_model->getCartByIdUser($id);
        $this->load->view('shop/myCart', $data);
    }

    public function viewProfile()
    {
        $id = $this->session->userdata('id_user');
        $data['user'] = $this->User_model->getUserById($id);
        $data['allUser'] = $this->User_model->getAllUser();
        $data['merchantF'] = $this->Merchant_model->getMerchantByIdUser($id);
        $data['merchant'] = $this->Merchant_model->getMerchantUser($id);
        $data['allTrans'] = $this->Trans_model->getAllTrans();
        $data['transaksiItem'] = $this->TransItem_model->getAllTransItem();
        $data['item'] = $this->Item_model->getItemByIdUser($id);
        $data['games'] = $this->Game_model->getAllGame();
        $data['subscribers'] = $this->Subs_model->getAllSubs();
        $data['rating'] = $this->Rating_model->getAllRating();
        $data['pesan'] = $this->Pesan_model->getAllPesan();
        $this->load->view('shop/viewProfile', $data);
    }

    public function viewHistory()
    {
        $id = $this->session->userdata('id_user');
        $data['user'] = $this->User_model->getUserById($id);
        $data['transaksi'] = $this->Trans_model->getAllTrans();
        $data['transaksiItem'] = $this->TransItem_model->getAllTransItem();
        $data['item'] = $this->Item_model->getAllItem();
        $data['merchant'] = $this->Merchant_model->getAllMerchant();
        $data['games'] = $this->Game_model->getAllGame();
        $data['history'] = $this->History_model->getHistoryByUser($id);

        $this->load->view('shop/viewHistory', $data);
    }

    public function chatUser($jenis)
    {
        if ($jenis == "room") {
            $id = $this->session->userdata('id_user');
            $data['user'] = $this->User_model->getUserById($id);
            $data['merchantF'] = $this->Merchant_model->getMerchantByIdUser($id);
            $data['allMerchant'] = $this->Merchant_model->getAllMerchant();
            $data['pesan'] = $this->Pesan_model->getAllPesan();
            $this->load->view('shop/chatUser', $data);
        } else {
            $id = $this->session->userdata('id_user');
            $data['user'] = $this->User_model->getUserById($id);
            $data['merchantF'] = $this->Merchant_model->getMerchantByIdUser($id);
            $data['allMerchant'] = $this->Merchant_model->getAllMerchant();
            $data['merchant'] = $this->Merchant_model->getMerchantById($jenis);
            $data['pesan'] = $this->Pesan_model->getAllPesan();
            $this->load->view('shop/chatUser', $data);
        }

        // if (isset($_SESSION['idMerchant'])) {
        //     $idM = $_SESSION['idMerchant'];
        // }
    }

    public function chooseMerchant()
    {
    }

    public function chatMerchant($jenis)
    {
        if ($jenis == "room") {
            $id = $this->session->userdata('id_user');
            $data['user'] = $this->User_model->getUserById($id);
            $data['allUser'] = $this->User_model->getAllUser();
            $data['merchant'] = $this->Merchant_model->getMerchantUser($id);
            $data['pesan'] = $this->Pesan_model->getAllPesan();
            $this->load->view('shop/chatMerchant', $data);
        } else {
            $id = $this->session->userdata('id_user');
            $data['user'] = $this->User_model->getUserById($id);
            $data['allUser'] = $this->User_model->getAllUser();
            $data['allMerchant'] = $this->Merchant_model->getAllMerchant();
            $data['merchant'] = $this->Merchant_model->getMerchantUser($id);
            $data['custA'] = $this->User_model->getUserById($jenis);
            $data['pesan'] = $this->Pesan_model->getAllPesan();
            $this->load->view('shop/chatMerchant', $data);
        }
    }

    public function viewGacha()
    {
        $id = $this->session->userdata('id_user');
        $data['user'] = $this->User_model->getUserById($id);
        $this->load->view('shop/viewGacha', $data);
    }

    public function updateSaldoG($cek)
    {
        $this->User_model->updateSaldoG($cek);
    }

    public function editProfile()
    {
        $this->User_model->editUser();
    }

    public function insertItem()
    {
        $this->Item_model->insertItem();
    }

    public function removeItem()
    {
        $this->Item_model->removeItem();
    }

    public function editItem()
    {
        $this->Item_model->editItem();
    }

    public function insertMerchant()
    {
        $this->Merchant_model->insertMerchant();
    }

    public function editMerchant()
    {
        $this->Merchant_model->editMerchant();
    }

    public function topUp()
    {
        $idHis = $this->session->userdata('idHistory');
        $this->History_model->insertHistory($idHis);
        redirect('Shop');
    }

    public function setFilter($isi)
    {
        $keyword = $this->uri->segment('4');
        $this->session->set_userdata(array('filter' => $isi));
        $this->session->set_userdata(array('keyword' => $keyword));

        if (isset($_SESSION['id_merchant'])) {
            redirect('Shop/viewSearchM/' . $keyword);
        } else {
            redirect('Shop/viewSearch/' . $keyword);
        }
    }

    public function unsetFilter($keyword)
    {
        $this->session->unset_userdata('filter');
        $this->session->set_userdata(array('keyword' => $keyword));

        if (isset($_SESSION['id_merchant'])) {
            redirect('Shop/viewSearchM/' . $keyword);
        } else {
            redirect('Shop/viewSearch/' . $keyword);
        }
    }

    public function setMerchant($idM)
    {
        $keyword = $this->uri->segment('4');
        $this->session->set_userdata(array('id_merchant' => $idM));
        redirect('Shop/unsetFilter/' . $keyword);
    }

    public function setMerchantF($filter)
    {
        $keyword = $this->uri->segment('4');
        $idM = $this->uri->segment('5');
        $this->session->set_userdata(array('id_merchant' => $idM));

        redirect('Shop/setFilter/' . $filter . "/" . $keyword);
    }

    public function unsetGame()
    {
        $this->session->unset_userdata('id_game');
        redirect('Shop');
    }

    public function setGame($id)
    {
        $this->session->set_userdata(array('id_game' => $id));
        $this->Game_model->tambahKlik();
        redirect('Shop');
    }

    public function insertComment($jenis)
    {
        $idI = $this->input->post("id_item");
        if ($jenis == "komen") {
            $this->Komen_model->insertComment($idI);
        } else {
            $this->Reply_model->insertReply();
        }
        $id = $this->session->userdata('id_user');
        $data['user'] = $this->User_model->getUserById($id);
        $data['allUser'] = $this->User_model->getAllUser();
        $data['merchant'] = $this->Merchant_model->getAllMerchant();
        $data['item'] = $this->Item_model->getItemById($idI);
        $data['komen'] = $this->Komen_model->getKomenByIdItem($idI);
        $data['reply'] = $this->Reply_model->getAllReply();

        $this->load->view('shop/refreshComment', $data);
    }


    public function unlikeMerchant()
    {
        $idM = $this->input->post('idMerchant');
        $this->Friend_model->unlikeMerchant($idM);
    }

    public function likeMerchant()
    {
        $idM = $this->input->post('idMerchant');
        $this->Friend_model->likeMerchant($idM);
    }

    public function addCart()
    {
        $idI = $this->input->post('idItem');
        $this->Cart_model->addCart($idI);
    }

    public function removeCart()
    {
        $idI = $this->input->post('idItem');
        $this->Cart_model->removeCart($idI);
    }

    public function cekPromo()
    {
        $this->Promo_model->cekPromo();
    }

    public function finish()
    {
        $id = $this->session->userdata('id_user');
        $cart = array();
        $cart = $this->input->post('cart');
        $cart = json_decode($cart, true);

        $this->Trans_model->insertTrans();
        $this->User_model->updateSaldo("transaksi");

        for ($i = 0; $i < count($cart); $i++) {
            $this->Cart_model->updateStatus2($cart[$i]['id']);
        }
    }

    public function refreshStatus()
    {
        $this->History_model->refreshStatus();
    }

    public function insertRating()
    {
        $this->Rating_model->insertRating();
    }

    public function updateRating()
    {
        $this->Rating_model->updateRating();
    }

    public function verifikasiRegister($id)
    {
        $this->User_model->updateStatusById($id);
        redirect('Login');
    }

    public function verifikasiItem($idT)
    {
        $data['user'] = $this->User_model->getAllUser();
        $data['transaksi'] = $this->Trans_model->getTransById($idT);
        $data['transaksiItem'] = $this->TransItem_model->getAllTransItem();
        $data['item'] = $this->Item_model->getAllItem();
        $this->load->view('shop/merchantVerify', $data);
    }

    public function updateStatusTransaksi()
    {
    }

    public function modifYear()
    {
        $id = $this->session->userdata('id_user');
        $data['user'] = $this->User_model->getUserById($id);
        $data['merchant'] = $this->Merchant_model->getMerchantUser($id);
        $data['allTrans'] = $this->Trans_model->getAllTrans();
        $data['transaksiItem'] = $this->TransItem_model->getAllTransItem();
        $data['item'] = $this->Item_model->getItemByIdUser($id);

        $this->load->view('shop/chartMerchant', $data);
    }

    public function updateStatusTransItem($status)
    {
        $this->TransItem_model->changeStatus($status);
    }

    public function insertPesan($idM, $jenis)
    {
        $this->Pesan_model->insertPesan();
        if ($jenis == "user") {
            $id = $this->session->userdata('id_user');
            $data['user'] = $this->User_model->getUserById($id);
            $data['merchant'] = $this->Merchant_model->getMerchantById($idM);
            $data['pesan'] = $this->Pesan_model->getAllPesan();
            $this->load->view('shop/refreshChatU', $data);
        } else {
            $id = $this->session->userdata('id_user');
            $idCust = $this->input->post("id_penerima");
            $data['user'] = $this->User_model->getUserById($id);
            $data['allUser'] = $this->User_model->getAllUser();
            $data['allMerchant'] = $this->Merchant_model->getAllMerchant();
            $data['merchant'] = $this->Merchant_model->getMerchantById($idM);
            $data['custA'] = $this->User_model->getUserById($idCust);
            $data['pesan'] = $this->Pesan_model->getAllPesan();
            $this->load->view('shop/refreshChatM', $data);
        }
    }

    public function read($jenis)
    {
        if ($jenis == "cust") {
            $this->Pesan_model->readCust();
        } else {
            $this->Pesan_model->readMerchant();
        }
    }

    public function insertSubs()
    {
        $this->Subs_model->insertSubs();
    }

    public function editBanner()
    {
        $this->Subs_model->editBanner();
    }
}
