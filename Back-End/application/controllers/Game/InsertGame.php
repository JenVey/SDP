	
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InsertGame extends CI_Controller
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
		$this->load->model('Game_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->model('Game_model');
		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('game/insertGame');
		//$this->load->view('templates/footer',$data);

	}

	public function insert()
	{

		$this->load->model('Game_model');
		$this->form_validation->set_rules('nameGame', 'Nama', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('templates/sidebar');
			$this->load->view('game/insertGame');
		} else {
			$this->Game_model->insertGame();
			$this->session->set_flashdata('flash', 'Success Insert Game !!!');
			redirect('game/listGame');
		}
	}

	public function delete($id)
	{
		$this->Game_model->deleteGame($id);
		$this->session->set_flashdata('flash', 'Success Deleted');

		redirect('game/listGame');
	}
}
