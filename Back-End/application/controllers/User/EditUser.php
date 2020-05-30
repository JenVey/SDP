	
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EditUser extends CI_Controller
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
		$this->load->model('TransItem_model');
		$this->load->library('form_validation');
	}

	public function index($id)
	{
		$this->load->model('User_model');
		$data['user'] = $this->User_model->getUserById($id);
		$data['transItem'] = $this->TransItem_model->getAllTransItem();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('user/editUser', $data);
	}


	public function edit($id)
	{
		//$data['user'] = $this->User_model->getUserById($id);
		$this->form_validation->set_rules('nameUser', 'Nama', 'required');
		$this->form_validation->set_rules('passUser', 'Password', 'required');
		$this->form_validation->set_rules('emailUser', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('passUser', 'Password', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->model('User_model');
			$data['user'] = $this->User_model->getUserById($id);
			$data['transItem'] = $this->TransItem_model->getAllTransItem();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('templates/sidebar', $data);
			$this->load->view('user/editUser', $data);
		} else {
			$this->User_model->editUser($id);
			$this->session->set_flashdata('flash', 'Susccess Edited');
			redirect('User/ListUser');
		}
	}
}
