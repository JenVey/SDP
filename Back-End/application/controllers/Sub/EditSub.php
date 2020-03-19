	
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EditSub extends CI_Controller {

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
		$this->load->model('Sub_model');
		$this->load->library('form_validation');
    }
    
	public function index($id)
	{
		$this->load->model('Sub_model');
		$data['sub'] = $this->Sub_model->getSubById($id);

		$this->load->view('templates/header',$data);
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('sub/editSub',$data);
	
	}

	public function edit($id)
	{
		
		$data['Sub'] = $this->Sub_model->getSubById($id);
		$this->form_validation->set_rules('nameSub','Nama','required');

		if( $this->form_validation->run() == FALSE){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/navbar');
			$this->load->view('templates/sidebar');
			$this->load->view('sub/editSub',$data);
		}else{
			$this->Sub_model->editSub($id);
			$this->session->set_flashdata('flash','Susccess Edited');
			redirect('sub/listSub');
		}	
	}

	
		
}
 