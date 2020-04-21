<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forgot extends CI_Controller
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
		$this->load->library('form_validation');
	}

	public function index($id)
	{
		$data['user'] = $this->User_model->getUserById($id);
		$this->load->view('templates/header', $data);
		$this->load->view('forgot', $data);
	}


	public function changePass($id)
	{
		$this->form_validation->set_rules('forPass', 'Password', 'required');
		$this->form_validation->set_rules('forCPass', 'Password Confirmation', 'required|matches[forPass]');

		if ($this->form_validation->run() == FALSE) {
			echo "<script>alert('gagal')</script>";
			$data['user'] = $this->User_model->getUserById($id);
			$this->load->view('templates/header', $data);
			$this->load->view('forgot', $data);
		} else {
			$this->User_model->changePass($id);
			redirect('login');
		}
	}
}
