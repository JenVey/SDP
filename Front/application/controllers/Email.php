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
                $nama = $row['nama_user'];
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

        $message =  "<body style='width: 100% !important;
        height: 100%;
        margin: 0;
        line-height: 1.4;
        background-color: #F5F7F9;
        -webkit-text-size-adjust: none;'>
        <table class='email-wrapper' width='100%' cellpadding='0' cellspacing='0' style='width: 100%;
        margin: 0;
        padding: 0;
        background-color: #F5F7F9;'>
            <tr>
                <td align='center'>
                    <table class='email-content' width='100%' cellpadding='0' cellspacing='0'>
                        <!-- Logo -->
                        <tr>
                            <td class='email-masthead' style='padding: 25px 0;
                text-align: center;'><a class='email-masthead_name' style='font-size: 16px;
        font-weight: bold;
        color: #839197;
        text-decoration: none;
        text-shadow: 0 1px 0 white;'>gather.owl</a>
                            </td>
                        </tr>
                        <!-- Email Body -->
                        <tr>
                            <td class='email-body' width='100%' style='width: 100%;
                margin: 0;
                padding: 0;
                border-top: 1px solid #E7EAEC;
                border-bottom: 1px solid #E7EAEC;
                background-color: #FFFFFF;'>
                                <table class='email-body_inner' align='center' width='570' cellpadding='0' cellspacing='0'>
                                    <!-- Body content -->
                                    <tr>
                                        <td class='content-cell' style='padding: 35px;'>
                                            <h1>Hello!</h1>
                                            <p>Hey " . $nama . ", You are receiving this email because we received a password reset request for your account.</p>
                                            <!-- Action -->
                                            <table class='body-action' align='center' width='100%' cellpadding='0' cellspacing='0' style=' width: 100%;
                        margin: 30px auto;
                        padding: 0;
                        text-align: center;'>
                                                <tr>
                                                    <td align='center'>
                                                        <div>
                                                            <!--[if mso]><v:roundrect xmlns:v='urn:schemas-microsoft-com:vml' xmlns:w='urn:schemas-microsoft-com:office:word' href='{{action_url}}' style='height:45px;v-text-anchor:middle;width:200px;' arcsize='7%' stroke='f' fill='t'>
                                <v:fill type='tile' color='#414EF9' />
                                <w:anchorlock/>
                                <center style='color:#ffffff;font-family:sans-serif;font-size:15px;'>Reset Pssword</center>
                                </v:roundrect><![endif]-->
                                                            <a href='" . base_url() . "/Forgot/index/" . $id . " ' style=' display: inline-block;
                                width: 200px;
                                background-color: #d7c13f;
                                border-radius: 3px;
                                color: #ffffff;
                                font-size: 15px;
                                line-height: 45px;
                                text-align: center;
                                text-decoration: none;
                                -webkit-text-size-adjust: none;
                                mso-hide: all;'>Reset Password</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            <p>Thanks,<br>The Morning Owl Team</p>
                                            <!-- Sub copy -->
                                            <table class='body-sub' style='  margin-top: 25px;
                        padding-top: 25px;
                        border-top: 1px solid #E7EAEC;'>
                                                <tr>
                                                    <td>
                                                        <p class='sub' style='font-size: 12px;'>If you did not request a password reset, no further action is required.
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table class='email-footer' align='center' width='570' cellpadding='0' cellspacing='0'>
                                    <tr>
                                        <td class='content-cell' style='padding: 35px;'>
                                            <p class='sub center' style='text-align: center;'>
                                                Email sent by gather.owl<br> Copyright &copy; 2020 Morning Owl. All rights reserved
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>";

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('morningowl.company@gmail.com', 'ADMIN');
        $this->email->to($email);
        $this->email->subject('FORGOT PASSWORD');
        $this->email->message($message);

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
                $nama = $row['nama_user'];
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

        $message =  "<body style='width: 100% !important;
        height: 100%;
        margin: 0;
        line-height: 1.4;
        background-color: #F5F7F9;
        -webkit-text-size-adjust: none;'>
        <table class='email-wrapper' width='100%' cellpadding='0' cellspacing='0' style='width: 100%;
        margin: 0;
        padding: 0;
        background-color: #F5F7F9;'>
            <tr>
                <td align='center'>
                    <table class='email-content' width='100%' cellpadding='0' cellspacing='0'>
                        <!-- Logo -->
                        <tr>
                            <td class='email-masthead' style='padding: 25px 0;
                text-align: center;'><a class='email-masthead_name' style='font-size: 16px;
        font-weight: bold;
        color: #839197;
        text-decoration: none;
        text-shadow: 0 1px 0 white;'>gather.owl</a>
                            </td>
                        </tr>
                        <!-- Email Body -->
                        <tr>
                            <td class='email-body' width='100%' style='width: 100%;
                margin: 0;
                padding: 0;
                border-top: 1px solid #E7EAEC;
                border-bottom: 1px solid #E7EAEC;
                background-color: #FFFFFF;'>
                                <table class='email-body_inner' align='center' width='570' cellpadding='0' cellspacing='0'>
                                    <!-- Body content -->
                                    <tr>
                                        <td class='content-cell' style='padding: 35px;'>
                                            <h1>Almost There!</h1>
                                            <p>Hey " . $nama . ", you're almost ready to start gathering with us. Click the big yellow button below to verify your email address.</p>
                                            <!-- Action -->
                                            <table class='body-action' align='center' width='100%' cellpadding='0' cellspacing='0' style=' width: 100%;
                        margin: 30px auto;
                        padding: 0;
                        text-align: center;'>
                                                <tr>
                                                    <td align='center'>
                                                        <div>
                                                            <!--[if mso]><v:roundrect xmlns:v='urn:schemas-microsoft-com:vml' xmlns:w='urn:schemas-microsoft-com:office:word' href='{{action_url}}' style='height:45px;v-text-anchor:middle;width:200px;' arcsize='7%' stroke='f' fill='t'>
                                <v:fill type='tile' color='#414EF9' />
                                <w:anchorlock/>
                                <center style='color:#ffffff;font-family:sans-serif;font-size:15px;'>Verify Email</center>
                                </v:roundrect><![endif]-->
                                                            <a href='" . base_url() . "/Shop/verifikasi/" . $id . " ' style=' display: inline-block;
                                width: 200px;
                                background-color: #d7c13f;
                                border-radius: 3px;
                                color: #ffffff;
                                font-size: 15px;
                                line-height: 45px;
                                text-align: center;
                                text-decoration: none;
                                -webkit-text-size-adjust: none;
                                mso-hide: all;'>Verify Email</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            <p>Thanks,<br>The Morning Owl Team</p>
                                            <!-- Sub copy -->
                                            <table class='body-sub' style='  margin-top: 25px;
                        padding-top: 25px;
                        border-top: 1px solid #E7EAEC;'>
                                                <tr>
                                                    <td>
                                                        <p class='sub' style='font-size: 12px;'>Please note that this link will expire in 5 days. If you haven't signed up to gather.owl, please ignore this email. Thanks!
                                                        </p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <table class='email-footer' align='center' width='570' cellpadding='0' cellspacing='0'>
                                    <tr>
                                        <td class='content-cell' style='padding: 35px;'>
                                            <p class='sub center' style='text-align: center;'>
                                                Email sent by gather.owl<br> Copyright &copy; 2020 Morning Owl. All rights reserved
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </body>";

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
