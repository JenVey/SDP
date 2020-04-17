<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {

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

	public function index()
	{
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'canonbot69@gmail.com';
        $config['smtp_pass']    = 'namikaze31';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'text'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not      

        $this->load->library('email', $config); 
        $this->email->set_newline("\r\n");
        $this->email->from('canonbot69@gmail.com','ADMIN');
        $this->email->to('robbygiovanni@gmail.com');
        $this->email->subject('FORGOT PASSWORD');
        $this->email->message('http://localhost/Github/SDP_Proyek/Front/Forgot');

        $this->email->send();
        $this->email->print_debugger();
        redirect('login');
	}
}