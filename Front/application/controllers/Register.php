<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
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

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('register');
	}

	public function insertUser()
	{
		$this->form_validation->set_rules('regUsername', 'Username', 'required|callback_username_check');
		$this->form_validation->set_rules('regName', 'Nama', 'required');
		$this->form_validation->set_rules('regEmail', 'Email', 'callback_username_check');
		$this->form_validation->set_rules('regEmail', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('regPass', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('regCPass', 'Password Confirmation', 'required|matches[regPass]');
		$this->form_validation->set_rules('regPhone', 'Phone Number', 'required');
		$this->form_validation->set_rules('regPhone', 'Phone Number', 'callback_username_check');
		$this->form_validation->set_rules('regJk', 'Gender', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('register');
		} else {
			$this->User_model->insertUser();
			$id = $this->session->userdata('user');
			redirect('Email/verifikasi/' . $id);
		}
	}

	public function username_check()
	{

		$ada = 0;
		$query = $this->db->query("select * from user");
		foreach ($query->result_array() as $row) {
			if ($row['username_user'] == $this->input->post('regUsername')) {
				$ada = 1;
			}
			if ($row['email_user'] == $this->input->post('regEmail')) {
				$ada = 2;
			}
			if ($row['phone'] == $this->input->post('regPhone')) {
				$ada = 3;
			}
		}

		if ($ada == 1) {
			$this->form_validation->set_message('username_check', 'Usename is already in use!');
			return false;
		} else if ($ada == 2) {
			$this->form_validation->set_message('username_check', 'Email is already in use!');
			return false;
		} else if ($ada == 3) {
			$this->form_validation->set_message('username_check', 'Phone number is already in use!');
			return false;
		} else {
			return true;
		}
	}
}
