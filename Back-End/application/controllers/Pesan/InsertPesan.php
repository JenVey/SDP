	
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InsertPesan extends CI_Controller
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
		$this->load->model('Pesan_model');
		$this->load->model('User_model');
		$this->load->model('TransItem_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->model('Pesan_model');
		$data['user'] = $this->User_model->getAllUser();
		$data['channel'] = $this->User_model->getAllUser();
		$data['transItem'] = $this->TransItem_model->getAllTransItem();
		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('pesan/insertPesan', $data);
		//$this->load->view('templates/footer',$data);

	}

	public function insert()
	{
		// $data['user'] = $this->User_model->getUserById();
		// $data['channel'] = $this->Channel_model->getChannelById();

		// $this->load->model('Pesan_model');
		// $this->load->model('User_model');

		$this->form_validation->set_rules('idPenerima', 'ID Penemrima', 'required');
		$this->form_validation->set_rules('idPengirim', 'ID Pengirim', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('templates/sidebar');
			$this->load->view('pesan/insertPesan');
		} else {
			$this->Pesan_model->insertPesan();
			$this->session->set_flashdata('flash', 'Success Insert Pesan !!!');
			redirect('Pesan/ListPesan');
		}
	}

	public function delete($id)
	{
		$this->Pesan_model->deletePesan($id);
		$this->session->set_flashdata('flash', 'Success Deleted');
		redirect('Pesan/ListPesan');
	}
}
