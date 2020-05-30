	
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InsertSub extends CI_Controller
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
		$this->load->model('TransItem_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['merchant'] = $this->Merchant_model->getAllMerchant();
		$data['transItem'] = $this->TransItem_model->getAllTransItem();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar', $data);
		$this->load->view('templates/sidebar', $data);
		$this->load->view('sub/insertSub', $data);
	}

	public function insert()
	{
		$this->form_validation->set_rules('photoBanner', 'Banner', 'required');
		$this->form_validation->set_rules('tglAkhir', 'Tanggal Akhir', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data['merchant'] = $this->Merchant_model->getAllMerchant();
			$data['transItem'] = $this->TransItem_model->getAllTransItem();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar', $data);
			$this->load->view('templates/sidebar', $data);
			$this->load->view('sub/insertSub', $data);
		} else {
			$this->Sub_model->insertSub();
			$this->session->set_flashdata('flash', 'Success Insert Subscription !!!');
			redirect('Sub/ListSub');
		}
	}

	public function delete($id)
	{
		$this->Sub_model->deleteSub($id);
		$this->session->set_flashdata('flash', 'Success Deleted');
		redirect('Sub/ListSub');
	}
}
