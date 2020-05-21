	
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
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->model('Sub_model');

		$data['merchant'] = $this->Merchant_model->getAllMerchant();
		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('sub/insertSub');
		//$this->load->view('templates/footer',$data);

	}

	public function insert()
	{
		$this->load->model('Sub_model');
		$this->form_validation->set_rules('banner', 'Banner', 'required');
		$this->form_validation->set_rules('tglAkhir', 'Tanggal Akhir', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('templates/sidebar');
			$this->load->view('sub/insertSub');
		} else {
			$this->Sub_model->insertSub();
			$this->session->set_flashdata('flash', 'Success Insert Subscription !!!');
			redirect('sub/listSub');
		}
	}

	public function delete($id)
	{
		$this->Sub_model->deleteSub($id);
		$this->session->set_flashdata('flash', 'Success Deleted');
		redirect('sub/listSub');
	}
}
