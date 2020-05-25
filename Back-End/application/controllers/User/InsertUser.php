	
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InsertUser extends CI_Controller
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
		$this->load->model('User_model');
		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('user/insertUser');
	}

	public function insert()
	{

		$this->load->model('User_model');

		$this->form_validation->set_rules('nameUser', 'Nama', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('username', 'Username', 'callback_username_check');

		$this->form_validation->set_rules('emailUser', 'Email', 'callback_email_check');
		$this->form_validation->set_rules('emailUser', 'Email', 'required|valid_email');

		$this->form_validation->set_rules('passUser', 'Password', 'required');


		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('templates/sidebar');
			$this->load->view('user/insertUser');
		} else {
			$this->User_model->insertUser();
			$this->session->set_flashdata('flash', 'Success Insert User !!!');
			redirect('User/ListUser');
		}
	}

	public function username_check()
	{
		$ada = false;
		$query = $this->db->query("select * from user");
		foreach ($query->result_array() as $row) {
			if ($row['username_user'] == $this->input->post('username')) {
				$ada = true;
			}
		}

		if ($ada == true) {
			$this->form_validation->set_message('username_check', 'Usename is already in use!!!');
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
			if ($row['email_user'] == $this->input->post('LogUsername')) {
				$ada = true;
			}
		}

		if ($ada == true) {
			$this->form_validation->set_message('email_check', 'Email is already in use !!!');
			return false;
		} else {
			return true;
		}
	}

	public function delete($id)
	{
		$this->User_model->deleteUser($id);
		$this->session->set_flashdata('flash', 'Success Deleted');

		redirect('User/ListUser');
	}
}
