<?php
defined('BASEPATH') or exit('No direct script access allowed');

class EditTeam extends CI_Controller
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
		$this->load->model('Team_model');
		$this->load->model('TransItem_model');
		$this->load->library('form_validation');
	}

	public function index($id)
	{
		$this->load->model('Team_model');
		$data['team'] = $this->Team_model->getTeamById($id);
		$data['transItem'] = $this->TransItem_model->getAllTransItem();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar', $data);
		$this->load->view('team/editTeam', $data);
	}

	public function edit($id)
	{

		$data['team'] = $this->Team_model->getTeamById($id);
		$this->form_validation->set_rules('nameTeam', 'Nama', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->model('Team_model');
			$data['team'] = $this->Team_model->getTeamById($id);
			$data['transItem'] = $this->TransItem_model->getAllTransItem();
			$this->load->view('templates/header', $data);
			$this->load->view('templates/navbar');
			$this->load->view('templates/sidebar', $data);
			$this->load->view('team/editTeam', $data);
		} else {
			$this->Team_model->editTeam($id);
			$this->session->set_flashdata('flash', 'Susccess Edited');
			redirect('Team/ListTeam');
		}
	}
}
