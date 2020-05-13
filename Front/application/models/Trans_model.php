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
        $query = "SELECT P.KODEPROMO AS 'kodepromo', T.TANGGAL_TRANSAKSI AS 'transaksi', T.ID_TRANSAKSI AS 'id_transaksi',T.CASHBACK AS 'cashback' ,T.STATUS AS 'status',T.GROSS_AMOUNT AS 'Gross_Amount',T.ORDER_ID AS 'order_id'
        FROM TRANSAKSI T 
        LEFT JOIN PROMO P ON P.ID_PROMO = T.ID_PROMO 
        ORDER BY 4 DESC ";

        $res = $this->db->query($query);
        return $res->result_array();
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

        if ($order_id == 0) {
            $status = '1';
        } else {
            $status = '0';
        }

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


        for ($i = 0; $i < count($cart); $i++) {


            // KIRIM EMAIL KE MERCHANT

            $data = [
                "id_transaksi" => $generateId,
                "id_item" => $cart[$i]['id'],
                "jumlah" => $cart[$i]['quantity'],
                "subtotal" => $cart[$i]['subtotal']
            ];
            $this->db->insert('transaksi_item', $data);
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

    public function verifikasi($id)
    {
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

        $message =  "";

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
