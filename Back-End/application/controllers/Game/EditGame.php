	
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditGame extends CI_Controller {

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
    
	public function index($id)
	{
		$this->load->model('Game_model');
		$data['game'] = $this->Game_model->getGameById($id);

		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('game/editGame',$data);
	
	}

	public function edit($id)
	{
		
		$data['game'] = $this->Game_model->getGameById($id);
		$this->form_validation->set_rules('nameGame','Nama','required');

		if( $this->form_validation->run() == FALSE){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/navbar');
			$this->load->view('templates/sidebar');
			$this->load->view('game/editGame',$data);
		}else{
			$this->Game_model->editGame($id);
			$this->session->set_flashdata('flash','Edited');
			redirect('game/listGame');
		}	
	}

	
		
}
 