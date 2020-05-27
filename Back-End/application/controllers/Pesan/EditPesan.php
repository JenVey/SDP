<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EditPesan extends CI_Controller
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
		$this->load->model('TransItem_model');
		$this->load->library('form_validation');
	}

	public function index($id)
	{
		$this->load->model('Pesan_model');
		$data['pesan'] = $this->Pesan_model->getPesanById($id);
		$data['transItem'] = $this->TransItem_model->getAllTransItem();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('Pesan/EditPesan', $data);
	}

	public function edit($id)
	{

		$data['pesan'] = $this->Pesan_model->getPesanById($id);
		$this->form_validation->set_rules('statusPesan', 'Status Pesan', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('templates/sidebar');
			$this->load->view('pesan/editPesan', $data);
		} else {
			$this->Pesan_model->editPesan($id);
			$this->session->set_flashdata('flash', 'Susccess Edited');
			redirect('Pesan/EditPesan');
		}
	}
}
