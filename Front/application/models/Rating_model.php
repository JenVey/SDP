<?php
class Rating_model extends CI_model
{
    public function getAllRating()
    {
        return $this->db->get('merchant_rating')->result_array();
    }
    public function getRatingByUser($id, $idM)
    {
        $query = "SELECT * FROM MERCHANT_RATING R 
        JOIN MERCHANT M ON M.ID_MERCHANT = R.ID_MERCHANT 
        WHERE R.ID_MERCHANT= '" . $idM . "' 
        AND R.ID_USER = '" . $id . "' ";
        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function insertRating()
    {
        $id = $this->session->userdata('id_user');

        $query = $this->db->query("select * from user");
        $idUser = $this->session->userdata('id_user');
        foreach ($query->result_array() as $row) {
            if ($row['id_user'] == $idUser) {
                $newId = $row['nama_user'];
            }
        }
        $ctr = 1;
        $query = $this->db->query("select * from merchant_rating");
        $cekNewId = 'B' . substr(strtoupper($newId), 0, 1);
        foreach ($query->result_array() as $row) {
            $cekId = substr(strtoupper($row['id_rating']), 0, 2);
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
            "id_rating" => $generateId,
            "id_merchant" => $this->input->post('idMerchant'),
            "id_user" => $idUser,
            "komentar" => $this->input->post('komentar'),
            "bintang" => $this->input->post('bintang'),

        ];
        $this->db->insert('merchant_rating', $data);
    }

    public function updateRating()
    {
        $idRate = $this->input->post('idRate');
        $data = [
            "komentar" => $this->input->post('komentar'),
            "bintang" => $this->input->post('bintang')
        ];
        $this->db->where('id_rating', $idRate);
        $this->db->update('merchant_rating', $data);
    }
}
