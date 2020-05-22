<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ListSub extends CI_Controller
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
		$this->load->model('Sub_model');
		$this->load->model('Merchant_model');
	}

	public function index()
	{
		$this->load->model('Sub_model');
		$data['sub'] = $this->Sub_model->getAllSub();
		$data['merchant'] = $this->Merchant_model->getAllMerchant();

		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('sub/listSub', $data);
	}
}
