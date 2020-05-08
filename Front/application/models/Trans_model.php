<?php
class Trans_model extends CI_model
{
    public function getAllTrans()
    {
        return $this->db->get('transaksi')->result_array();
    }

    public function getTransByUser($id)
    {
        return $this->db->get_where('transaksi', ['id_user' => $id])->result_array();
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

        $data = [
            "id_transaksi" => $generateId,
            "id_user" => $idUser,
            "id_promo" => '',
            "Gross_Amount" => $gross,
            "tanggal_transaksi" => $tgl,
            "cashback" =>  0,
            "status" =>  '1'

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
}
