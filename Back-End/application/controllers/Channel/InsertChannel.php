	
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InsertChannel extends CI_Controller
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

		$this->load->model('Channel_model');
		$this->load->model('TransItem_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['transItem'] = $this->TransItem_model->getAllTransItem();
		$this->load->model('Channel_model');
		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('channel/insertChannel');
	}

	public function insert()
	{

		$this->load->model('Channel_model');
		$this->form_validation->set_rules('nameChannel', 'Nama', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('templates/sidebar');
			$this->load->view('channel/insertChannel');
		} else {
			$this->Channel_model->insertChannel();
			$this->session->set_flashdata('flash', 'Success Insert Channel !!!');
			redirect('Channel/ListChannel');
		}
	}

	public function delete($id)
	{
		$this->Channel_model->deleteChannel($id);
		$this->session->set_flashdata('flash', 'Success Deleted');
		redirect('Channel/ListChannel');
	}
}
