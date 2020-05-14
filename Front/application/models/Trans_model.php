<?php
class Trans_model extends CI_model
{

    public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-LgQ3iuXIFPxc0efEaP2oHHTJ', 'production' => false);
        $this->load->library('veritrans');
        $this->veritrans->config($params);
        $this->load->helper('url');
        date_default_timezone_set('Asia/Jakarta');
    }



    public function getAllTrans()
    {
        $query = "SELECT P.KODEPROMO AS 'kodepromo', T.TANGGAL_TRANSAKSI AS 'tanggal_transaksi', T.ID_TRANSAKSI AS 'id_transaksi',T.CASHBACK AS 'cashback' ,T.STATUS AS 'status',T.GROSS_AMOUNT AS 'Gross_Amount',T.ORDER_ID AS 'order_id'
        FROM TRANSAKSI T 
        LEFT JOIN PROMO P ON P.ID_PROMO = T.ID_PROMO 
        ORDER BY 4 DESC ";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function getTransById($id)
    {
        return $this->db->get_where('transaksi', ['id_transaksi' => $id])->row_array();
    }



    public function getTransByUser($id)
    {
        $query = "SELECT P.KODEPROMO AS 'kodepromo', T.TANGGAL_TRANSAKSI AS 'tanggal_transaksi', T.ID_TRANSAKSI AS 'id_transaksi',T.CASHBACK AS 'cashback' ,T.STATUS AS 'status',T.GROSS_AMOUNT AS 'Gross_Amount',T.ORDER_ID AS 'order_id'
        FROM TRANSAKSI T 
        LEFT JOIN PROMO P ON P.ID_PROMO = T.ID_PROMO 
        WHERE T.ID_USER = '" . $id . "'
        ORDER BY T.TANGGAL_TRANSAKSI DESC ";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function insertTrans($order_id)
    {
        $ctr = 1;

        $query = $this->db->query("select * from user");
        $idUser = $this->session->userdata('id_user');
        foreach ($query->result_array() as $row) {
            if ($row['id_user'] == $idUser) {
                $newId = $row['nama_user'];
            }
        }

        $cart = array();
        $cart = $this->input->post('cart');
        $cart = json_decode($cart, true);
        $gross = $this->input->post('gross_amount');
        //$cashback =  $gross * 10 / 100;

        $tgl = date("Y-m-d H:i:s");

        $query = $this->db->query("select * from transaksi");
        $cekNewId = 'T' . substr(strtoupper($newId), 0, 1);
        foreach ($query->result_array() as $row) {
            $cekId = substr(strtoupper($row['id_transaksi']), 0, 2);
            if ($cekId == $cekNewId) {
                $ctr++;
            }
        }

        if ($ctr < 10) {
            $generateId = $cekNewId . '000' . $ctr;
        } else if ($ctr < 100) {
            $generateId = $cekNewId . '00' . $ctr;
        } else if ($ctr < 1000) {
            $generateId = $cekNewId . '0' . $ctr;
        } else {
            $generateId = $cekNewId . $ctr;
        }

        // if ($order_id == 0) {
        //     $status = '1';
        // } else {

        // }

        $status = '0';

        if (isset($_SESSION['id_promo']) && isset($_SESSION['gp'])) {
            $query2 = $this->db->query("select * from promo");
            foreach ($query2->result_array() as $row) {
                if ($row['id_promo'] == $_SESSION['id_promo']) {
                    $promo = $row['id_promo'];
                    $potongan = $row['potongan'];
                }
            }

            $this->session->unset_userdata('gp');
            $cashback = $gross * $potongan / 100;
            $this->session->set_userdata(array('cashback' => $cashback));
        } else {
            $promo = '';
            $cashback = '';
        }



        $data = [
            "id_transaksi" => $generateId,
            "id_user" => $idUser,
            "id_promo" => $promo,
            "Gross_Amount" => $gross,
            "tanggal_transaksi" => $tgl,
            "cashback" =>  $cashback,
            "status" =>  $status,
            "order_id" => $order_id
        ];

        $this->db->insert('transaksi', $data);


        $idmerchant = array();
        for ($i = 0; $i < count($cart); $i++) {

            // KIRIM EMAIL KE MERCHANT
            $query2 = $this->db->query("select * from item");
            foreach ($query2->result_array() as $row) {
                if ($row['id_item'] == $cart[$i]['id']) {
                    if (!in_array($row['id_merchant'], $idmerchant)) {
                        array_push($idmerchant, $row['id_merchant']);
                    }
                }
            }

            $data = [
                "id_transaksi" => $generateId,
                "id_item" => $cart[$i]['id'],
                "jumlah" => $cart[$i]['quantity'],
                "subtotal" => $cart[$i]['subtotal']
            ];
            $this->db->insert('transaksi_item', $data);
        }

        for ($i = 0; $i < count($idmerchant); $i++) {

            $this->sendEmail($idmerchant[$i], $generateId);
        }
    }

    public function refreshStatus()
    {
        $idUser = $this->session->userdata('id_user');
        $query = $this->db->query("select * from transaksi");

        foreach ($query->result_array() as $row) {
            if ($row['id_user'] == $idUser && $row['order_id'] != 0 && $row['status'] == 0) {

                $response = $this->veritrans->status(($row['order_id']));
                $transaction_status = $response->transaction_status;
                //print_r($transaction_status);

                if ($transaction_status == "settlement") {
                    $this->Trans_model->updateStatus($row['order_id']);
                } else if ($transaction_status == "failure") {
                    $this->Trans_model->updateStatus(0);
                }
            }
        }
    }

    public function updateStatus($order_id)
    {
        if ($order_id == 0) {
            $data = [
                "status" => '-1' //GAGAL DI BAYAR
            ];
            $this->db->where('order_id', $order_id);
            $this->db->update('transaksi', $data);
        } else {
            $data = [
                "status" => '1' //SUDAH DI BAYAR
            ];
            $this->db->where('order_id', $order_id);
            $this->db->update('transaksi', $data);

            $this->Item_model->updateAmount();
            $this->session->unset_userdata('idTransaksi');
        }
    }


    public function sendEmail($idM, $idTransaksi)
    {
        $query = $this->db->query("select u.email_user,m.nama_merchant from user u join merchant m on m.id_user = u.id_user where m.id_merchant = '" . $idM . "' ");
        foreach ($query->result_array() as $row) {
            $email = $row['email_user'];
            $nama = $row['nama_merchant'];
        }

        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = 'noreply.morningowl@gmail.com';
        $config['smtp_pass']    = 'kirimemail123';
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
                                            <h1>Purchased Item Verification</h1>
                                            <p>Hey " . $nama . ", 
                                            just so we know you're already sent the desired items to your customer, Please press the button below to redirect you to our page and send the image needed </p>
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
                                <center style='color:#ffffff;font-family:sans-serif;font-size:15px;'>Verify</center>
                                </v:roundrect><![endif]-->
                                                            <a href='" . base_url() . "Shop/verifikasiItem/" . $idTransaksi . "?idM=" . $idM . " ' style=' display: inline-block;
                                width: 200px;
                                background-color: #d7c13f;
                                border-radius: 3px;
                                color: #ffffff;
                                font-size: 15px;
                                line-height: 45px;
                                text-align: center;
                                text-decoration: none;
                                -webkit-text-size-adjust: none;
                                mso-hide: all;'>Redirect Me</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>
                                            <p>Sincerely,<br>The Morning Owl Team</p>
                                            <!-- Sub copy -->
                                            <table class='body-sub' style='  margin-top: 25px;
                        padding-top: 25px;
                        border-top: 1px solid #E7EAEC;'>
                                                <tr>
                                                    <td>
                                                        <p class='sub' style='font-size: 12px;'>Thanks!
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
        $this->email->subject('VERIFIKASI ITEM');
        $this->email->message($message);

        //$this->email->message('http://localhost/Github/SDP_Proyek/Front/Shop/verifikasi/' . $id);

        $this->email->send();
        $this->email->print_debugger();
    }
}
