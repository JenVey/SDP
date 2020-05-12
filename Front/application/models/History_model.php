<?php
class History_model extends CI_model
{
    public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-LgQ3iuXIFPxc0efEaP2oHHTJ', 'production' => false);
        $this->load->library('veritrans');
        $this->veritrans->config($params);
        $this->load->helper('url');
    }

    public function getAllHistory()
    {
        return $this->db->get('history')->result_array();
    }
    public function getHistoryByUser($id)
    {
        return $this->db->get_where('history', ['id_user' => $id])->result_array();
    }

    public function insertHistory($id)
    {
        $idUser = $this->session->userdata('id_user');
        $saldo = $this->input->post('gross_amount');
        $tgl = date("Y-m-d H:i:s");
        $data = [
            "id_history" => $id,
            "id_user" => $idUser,
            "saldo" => $saldo,
            "date" => $tgl,
            "status" => 0
        ];

        $this->db->insert('history', $data);
    }

    public function refreshStatus()
    {
        $idUser = $this->session->userdata('id_user');
        $query = $this->db->query("select * from history");

        foreach ($query->result_array() as $row) {
            if ($row['id_user'] == $idUser && $row['status'] == 0) {

                $response = $this->veritrans->status(($row['id_history']));
                echo $row['id_history'];
                $transaction_status = $response->transaction_status;
                print_r($transaction_status);

                if ($transaction_status == "settlement") {
                    $this->History_model->updateStatus($row['id_history']);
                } else if ($transaction_status == "failure") {
                    $this->History_model->updateStatus(0);
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
            $this->db->where('id_history', $order_id);
            $this->db->update('history', $data);
        } else {
            $data = [
                "status" => '1' //SUDAH DI BAYAR
            ];
            $this->db->where('id_history', $order_id);
            $this->db->update('history', $data);

            $query = $this->db->query("select * from history");
            foreach ($query->result_array() as $row) {
                if ($row['id_history'] == $order_id) {
                    $total = $row['saldo'];
                }
            }
            $this->User_model->updateSaldo($total);
        }
    }
}
