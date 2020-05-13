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
    }

    public function getAllTrans()
    {
        return $this->db->get('transaksi')->result_array();
    }

    public function getTransByUser($id)
    {
        return $this->db->get_where('transaksi', ['id_user' => $id])->result_array();
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
        $data = [
            "id_transaksi" => $generateId,
            "id_user" => $idUser,
            "id_promo" => '',
            "Gross_Amount" => $gross,
            "tanggal_transaksi" => $tgl,
            "cashback" =>  0,
            "status" =>  $status,
            "order_id" => $order_id
        ];

        $this->db->insert('transaksi', $data);

        for ($i = 0; $i < count($cart); $i++) {
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
}
