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
        $query = "select t.id_user as 'id_user', p.kodepromo as 'kodepromo', t.tanggal_transaksi as 'tanggal_transaksi', t.id_transaksi as 'id_transaksi',t.cashback as 'cashback' ,t.status as 'status',t.gross_amount as 'gross_amount', u.email_user as 'email_user'
        from transaksi t 
        left join promo p on p.id_promo = t.id_promo 
        join user u on u.id_user = t.id_user
        order by 4 desc ";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function getTransById($id)
    {
        return $this->db->get_where('transaksi', ['id_transaksi' => $id])->row_array();
    }



    public function getTransByUser($id)
    {
        $query = "select p.kodepromo as 'kodepromo', t.tanggal_transaksi as 'tanggal_transaksi', t.id_transaksi as 'id_transaksi',t.cashback as 'cashback' ,t.status as 'status',t.gross_amount as 'gross_amount'
        from transaksi t 
        left join promo p on p.id_promo = t.id_promo 
        where t.id_user = '" . $id . "'
        order by t.tanggal_transaksi desc ";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function insertTrans()
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


        if (isset($_SESSION['id_promo'])) {
            $query2 = $this->db->query("select * from promo");
            foreach ($query2->result_array() as $row) {
                if ($row['id_promo'] == $_SESSION['id_promo']) {
                    $promo = $row['id_promo'];
                    $potongan = $row['potongan'];
                    $maksimal = $row['maksimal'];
                }
            }
            $this->session->unset_userdata('id_promo');
            $cashback = $gross * $potongan / 100;
            if ($cashback > $maksimal) {
                $cashback = $maksimal;
            }
            $this->session->set_userdata(array('cashback' => $cashback));
        } else {
            $promo = '';
            $cashback = 0;
        }

        $data = [
            "id_transaksi" => $generateId,
            "id_user" => $idUser,
            "id_promo" => $promo,
            "Gross_Amount" => $gross,
            "tanggal_transaksi" => $tgl,
            "cashback" =>  $cashback,
            "status" => 0
        ];

        $this->db->insert('transaksi', $data);

        $idmerchant = array();
        for ($i = 0; $i < count($cart); $i++) {
            //echo "masuk" . $i;
            // KIRIM EMAIL KE MERCHANT
            $query2 = $this->db->query("select * from item");
            foreach ($query2->result_array() as $row2) {
                if ($row2['id_item'] == $cart[$i]['id']) {
                    if (!in_array($row2['id_merchant'], $idmerchant)) {
                        array_push($idmerchant, $row2['id_merchant']);
                    }
                }
            }

            $data = [
                "id_transaksi" => $generateId,
                "id_item" => $cart[$i]['id'],
                "jumlah" => intval($cart[$i]['quantity']),
                "subtotal" => intval($cart[$i]['subtotal']),
                "keterangan" => "*Upload your proof(s) and press the update button",
                "status" => 0,
                "foto" => ""
            ];
            $this->db->insert('transaksi_item', $data);
        }

        for ($i = 0; $i < count($idmerchant); $i++) {
            $this->sendEmail($idmerchant[$i], $generateId);
        }
    }

    public function cekStatus($idTransaksi)
    {
        $change = true;
        $query = $this->db->query("select * from transaksi_item where id_transaksi = '" . $idTransaksi . "' ");
        foreach ($query->result_array() as $row) {
            if ($row['status'] == 0 || $row['status'] == 1) {
                $change = false;
            }
        }

        if ($change) {
            $status = -1;
            $query = $this->db->query("select * from transaksi_item where id_transaksi = '" . $idTransaksi . "' ");
            foreach ($query->result_array() as $row2) {
                if ($row2['status'] == 2) {
                    $status = 1;
                }
            }

            $data = [
                "status" => $status
            ];

            $this->db->where('id_transaksi', $idTransaksi);
            $this->db->update('transaksi', $data);

            if ($status == -1) {
                $total = 0;
                $query = $this->db->query("select * from transaksi_item where id_transaksi = '" . $idTransaksi . "' ");
                foreach ($query->result_array() as $row3) {
                    $total += $row3['subtotal'];
                }

                $query = $this->db->query("select * from transaksi");
                foreach ($query->result_array() as $row3) {
                    if ($idTransaksi == $row3['id_transaksi']) {
                        $query = $this->db->query("select * from promo");
                        foreach ($query->result_array() as $row4) {
                            if ($row3['id_promo'] == $row4['id_promo']) {
                                $potongan = $row3['potongan'];
                            }
                        }
                    }
                }
                $cashback = $total * $potongan / 100;

                $data = [
                    "Gross_Amount" => $total,
                    "cashback" => $cashback
                ];

                $this->db->where('id_transaksi', $idTransaksi);
                $this->db->update('transaksi', $data);
            }
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
        $config['smtp_pass']    = 'qyonojwgyxjnwioo';
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
                                        <h1>Your item has been purchased !</h1>
                                        <p>Hey " . $nama . "!<br>
                                            For further information, go to your profile page so you can see what's the
                                            item they bought. Be sure to send the proof that you have sent the item to
                                            them and we will verify shortly and updated your balance according to the
                                            price. </p>
                                        <!-- Action -->
                                        <table class='body-action' align='center' width='100%' cellpadding='0'
                                            cellspacing='0' style=' width: 100%;
                        margin: 30px auto;
                        padding: 0;
                        text-align: center;'>
                                            <tr>
                                                <td align='center'>
                                                    <div>
                                                        <a href='" . base_url() . "Login'
                                                            style=' display: inline-block;
                                width: 200px;
                                background-color: #d7c13f;
                                border-radius: 3px;
                                color: #ffffff;
                                font-size: 15px;
                                line-height: 45px;
                                text-align: center;
                                text-decoration: none;
                                -webkit-text-size-adjust: none;
                                mso-hide: all;'>Go to gather.owl</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                        <p>Cheers,<br> Morning Owl Team.</p>
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
                                            Email sent by gather.owl<br> Copyright &copy; 2020 Morning Owl. All rights
                                            reserved
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
        $this->email->from('morningowl.company@gmail.com', 'Morning Owl Team');
        $this->email->to($email);
        $this->email->subject('SOMEONE BOUGHT YOUR ITEM');
        $this->email->message($message);

        $this->email->send();
        $this->email->print_debugger();
    }
}
