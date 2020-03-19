	
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditChannel extends CI_Controller {

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
		$this->load->model('Channel_model');
		$this->load->library('form_validation');
    }
    
	public function index($id)
	{
		$this->load->model('Channel_model');
		$data['channel'] = $this->Channel_model->getChannelById($id);

		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('channel/editChannel',$data);
	
	}

	public function edit($id)
	{
		
		$data['channel'] = $this->Channel_model->getChannelById($id);
		$this->form_validation->set_rules('nameChannel','Nama','required');

		if( $this->form_validation->run() == FALSE){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/navbar');
			$this->load->view('templates/sidebar');
			$this->load->view('channel/editChannel',$data);
		}else{
			$this->Channel_model->editChannel($id);
			$this->session->set_flashdata('flash','Edited');
			redirect('channel/listChannel');
		}	
	}

	
		
}
 