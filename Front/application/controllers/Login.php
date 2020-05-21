<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
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
		//$this->session->unset_userdata(array('first_thing', 'second_thing', 'third_thing', 'etc'));
		//$this->session->unset_userdata($data_session);

		$this->User_model->updateStatus(0);
		$this->session->sess_destroy();
		$this->load->view('templates/header');
		$this->load->view('login');
	}


	public function cekUser()
	{
		$ada = false;
		$query = $this->db->query("select * from user");
		$user = $this->input->post('LogUsername');
		$pass = $this->input->post('LogPass');

		foreach ($query->result_array() as $row) {
			if ($row['email_user'] == $user && $row['pass_user'] == $pass && $row['status'] != -1) {
				$ada = true;
				$id = $row['id_user'];
			}
			if ($row['username_user'] == $user && $row['pass_user'] == $pass && $row['status'] != -1) {
				$ada = true;
				$id = $row['id_user'];
			}
		}

		if ($ada == true) {
			$data_session = array(
				'id_user' => $id
			);
			$this->session->set_userdata($data_session);
			$this->User_model->updateStatus(1);
			redirect('MainMenu');
		} else {
			$this->session->set_flashdata('flash', 'Wrong Username/Password !!!');
			redirect('Login');
		}
	}
}
