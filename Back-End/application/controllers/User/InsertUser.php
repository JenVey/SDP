	
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InsertUser extends CI_Controller {

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
		//$data['judul'] = 'Insert Data User';
		$this->load->view('templates/header');
		$this->load->view('templates/navbar');
		$this->load->view('templates/sidebar');
		$this->load->view('user/insertUser'	);
		//$this->load->view('templates/footer',$data);
	
	}

	public function insert()
	{
		//var_dump($this->input->post('nameUser'));

		$this->form_validation->set_rules('nameUser','Nama','required');
		$this->form_validation->set_rules('nickUser','Nickname','required');
		//$this->form_validation->set_rules('emailUser','Email','required|valid_email');
		$this->form_validation->set_rules('passUser','Password','required');

		if( $this->form_validation->run() == FALSE){
			$this->load->view('templates/header');
			$this->load->view('templates/navbar');
			$this->load->view('templates/sidebar');
			$this->load->view('user/insertUser'	);
		}else{
			$this->User_model->insertUser();

			$this->session->set_flashdata('flash','Success insert User !!!');

			redirect('user/listUser');
		}	
    
	}

	public function delete($id)
	{
		$this->User_model->deleteUser($id);
		$this->session->set_flashdata('flash','Deleted');

		redirect('user/listUser');
	}

	
		
}
 