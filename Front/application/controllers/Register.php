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
		$this->form_validation->set_rules('regUsername', 'Username', '	');
		$this->form_validation->set_rules('regUsername', 'Username', 'callback_username_check');
		$this->form_validation->set_rules('regName', 'Nama', 'required');
		$this->form_validation->set_rules('regEmail', 'Email', 'callback_email_check');
		$this->form_validation->set_rules('regEmail', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('regPass', 'Password', 'required');
		$this->form_validation->set_rules('regCPass', 'Password Confirmation', 'required|matches[regPass]');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('register');
		} else {
			$this->User_model->insertUser();
			redirect('login');
		}
	}

	public function username_check()
	{
		$ada = false;
		$query = $this->db->query("select * from user");
		foreach ($query->result_array() as $row) {
			if ($row['username_user'] == $this->input->post('regUsername')) {
				$ada = true;
			}
		}

		if ($ada == true) {
			$this->form_validation->set_message('username_check', 'Usename sudah ada !!!');
			return false;
		} else {
			return true;
		}
	}

	public function email_check()
	{
		$ada = false;
		$query = $this->db->query("select * from user");

		foreach ($query->result_array() as $row) {
			if ($row['email_user'] == $this->input->post('regEmail')) {
				$ada = true;
			}
		}

		if ($ada == true) {
			$this->form_validation->set_message('email_check', 'Email telah dipakai !!!');
			return false;
		} else {
			return true;
		}
	}

	public function phone_check()
	{
		$ada = false;
		$query = $this->db->query("select * from user");

		foreach ($query->result_array() as $row) {
			if ($row['phone'] == $this->input->post('regPhone')) {
				$ada = true;
			}
		}

		if ($ada == true) {
			$this->form_validation->set_message('phone_check', 'Nomor HP telah dipakai !!!');
			return false;
		} else {
			return true;
		}
	}
}
