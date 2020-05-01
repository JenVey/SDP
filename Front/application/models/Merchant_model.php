<?php
class Merchant_model extends CI_model
{
    public function getAllMerchant()
    {
        //return $this->db->get('merchant')->result_array();

        $query = "SELECT M.ID_MERCHANT AS 'id', M.NAMA_MERCHANT AS 'nama',  ROUND(SUM(R.BINTANG)/COUNT(R.BINTANG)) AS 'rating' , M.FOTO_PROFIL AS 'foto', M.ID_USER AS 'id_user'
        FROM MERCHANT M 
        LEFT JOIN MERCHANT_RATING R ON R.ID_MERCHANT = M.ID_MERCHANT
        GROUP BY M.ID_MERCHANT";

        $res = $this->db->query($query);
        return $res->result_array();
    }
    public function getMerchantById($id)
    {
        //return $this->db->get_where('merchant', ['id_merchant' => $id])->row_array();
        $query = "SELECT M.ID_MERCHANT AS 'id', M.NAMA_MERCHANT AS 'nama',  ROUND(SUM(R.BINTANG)/COUNT(R.BINTANG)) AS 'rating' , M.FOTO_PROFIL AS 'foto', M.FOTO_PROFIL AS 'foto', M.BIO as 'bio'
        FROM MERCHANT M 
        LEFT JOIN MERCHANT_RATING R ON R.ID_MERCHANT = M.ID_MERCHANT 
        WHERE M.ID_MERCHANT = '" . $id . "'
        GROUP BY M.ID_MERCHANT,M.NAMA_MERCHANT";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function getMerchantByIdUser($id)
    {
        $query = "SELECT M.ID_MERCHANT AS 'id', M.NAMA_MERCHANT AS 'nama',  ROUND(SUM(R.BINTANG)/COUNT(R.BINTANG)) AS 'rating' , M.FOTO_PROFIL AS 'foto', M.FOTO_PROFIL AS 'foto', M.BIO as 'bio'
        FROM MERCHANT M 
        JOIN FRIEND F ON M.ID_MERCHANT = F.ID_USER2
        LEFT JOIN MERCHANT_RATING R ON R.ID_MERCHANT = M.ID_MERCHANT
        WHERE F.ID_USER1 = '" . $id . "' 
        GROUP BY M.ID_MERCHANT,M.NAMA_MERCHANT";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function getMerchantUser($id)
    {
        $query = "SELECT M.ID_MERCHANT AS 'id', M.NAMA_MERCHANT AS 'nama',  ROUND(SUM(R.BINTANG)/COUNT(R.BINTANG)) AS 'rating' , M.FOTO_PROFIL AS 'foto', M.BIO as 'bio'
        FROM MERCHANT M 
        LEFT JOIN MERCHANT_RATING R ON R.ID_MERCHANT = M.ID_MERCHANT
        WHERE M.ID_USER = '" . $id . "' 
        GROUP BY M.ID_MERCHANT,M.NAMA_MERCHANT";

        $res = $this->db->query($query);
        //print_r($res);
        return $res->result_array();
    }

    public function getMerchantBySearch($keyword)
    {
        $query = "SELECT M.ID_MERCHANT AS 'id', M.NAMA_MERCHANT AS 'nama',  ROUND(SUM(R.BINTANG)/COUNT(R.BINTANG)) AS 'rating' , M.FOTO_PROFIL AS 'foto'
        FROM MERCHANT M 
        LEFT JOIN MERCHANT_RATING R ON R.ID_MERCHANT = M.ID_MERCHANT 
        WHERE M.NAMA_MERCHANT LIKE '%" . $keyword . "%' 
        GROUP BY M.ID_MERCHANT,M.NAMA_MERCHANT
        ORDER BY CASE WHEN M.NAMA_MERCHANT LIKE '" . $keyword . "%' THEN 0 ELSE 1 END, M.NAMA_MERCHANT";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function insertMerchant()
    {
        $id = $this->session->userdata('id_user');

        $ctr = 1;
        $query = $this->db->query("select * from merchant");
        $newId = $this->input->post('name');
        $foto = $this->input->post('foto');
        $foto = base64_decode($foto);

        $cekNewId = 'M' . substr(strtoupper($newId), 0, 1);
        foreach ($query->result_array() as $row) {
            $cekId = substr(strtoupper($row['id_merchant']), 0, 2);
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
            "id_merchant" => $generateId,
            "id_user" => $id,
            "nama_merchant" =>  $this->input->post('name'),
            "bio" =>  $this->input->post('desc'),
            "foto_profil" => $foto
        ];

        $this->db->insert('merchant', $data);
    }

    public function editMerchant()
    {
        $id = $this->input->post('id');
        $foto = $this->input->post('foto');

        $foto = base64_decode($foto);
        $data = [
            "nama_merchant" =>  $this->input->post('name'),
            "bio" =>  $this->input->post('desc'),
            "foto_profil" => $foto
        ];

        $this->db->where('id_merchant', $id);
        $this->db->update('merchant', $data);
    }
}
