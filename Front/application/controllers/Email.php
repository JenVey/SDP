<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Email extends CI_Controller
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
    }

    public function index()
    {
        $email = $this->uri->segment('3');

        $query = $this->db->query("select * from user");
        foreach ($query->result_array() as $row) {
            if ($row['email_user'] == $email) {
                $id = $row['id_user'];
            }
        }

        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'morningowl.company@gmail.com';
        $config['smtp_pass']    = 'satvelrobyos';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'text'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not      




        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('morningowl.company@gmail.com', 'ADMIN');
        $this->email->to($email);
        $this->email->subject('FORGOT PASSWORD');
        $this->email->message('http://localhost/Github/SDP_Proyek/Front/Forgot/Index/' . $id);

        $this->email->send();
        $this->email->print_debugger();
        redirect('login');
    }

    public function verifikasi($id)
    {
        //$data = $this->uri->segment('3');
        $query = $this->db->query("select * from user");
        foreach ($query->result_array() as $row) {
            if ($row['id_user'] == $id) {
                $email = $row['email_user'];
            }
        }



        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'morningowl.company@gmail.com';
        $config['smtp_pass']    = 'satvelrobyos';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not      

        $message = '<html> <h2>TEST</h2> </html>';

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('morningowl.company@gmail.com', 'ADMIN');
        $this->email->to($email);
        $this->email->subject('VERIFIKASI EMAIL');
        $this->email->message($message);
        //$this->email->message('http://localhost/Github/SDP_Proyek/Front/Shop/verifikasi/' . $id);

        $this->email->send();
        $this->email->print_debugger();
        redirect('login');
    }
}
