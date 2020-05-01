<?php
class Merchant_model extends CI_model
{
    public function getAllMerchant()
    {
        //return $this->db->get('merchant')->result_array();

        $query = "SELECT M.ID_MERCHANT AS 'id', M.NAMA_MERCHANT AS 'nama',  ROUND(SUM(R.BINTANG)/COUNT(R.BINTANG)) AS 'rating' , M.FOTO_PROFIL AS 'foto'
        FROM MERCHANT M 
        LEFT JOIN MERCHANT_RATING R ON R.ID_MERCHANT = M.ID_MERCHANT
        GROUP BY M.ID_MERCHANT";

        $res = $this->db->query($query);
        return $res->result_array();
    }
    public function getMerchantById($id)
    {
        //return $this->db->get_where('merchant', ['id_merchant' => $id])->row_array();
        $query = "SELECT M.ID_MERCHANT AS 'id', M.NAMA_MERCHANT AS 'nama',  ROUND(SUM(R.BINTANG)/COUNT(R.BINTANG)) AS 'rating' , M.FOTO_PROFIL AS 'foto'
        FROM MERCHANT M 
        LEFT JOIN MERCHANT_RATING R ON R.ID_MERCHANT = M.ID_MERCHANT 
        WHERE M.ID_MERCHANT = '" . $id . "'
        GROUP BY M.ID_MERCHANT,M.NAMA_MERCHANT";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function getMerchantByIdUser($id)
    {
        $query = "SELECT M.ID_MERCHANT AS 'id', M.NAMA_MERCHANT AS 'nama',  ROUND(SUM(R.BINTANG)/COUNT(R.BINTANG)) AS 'rating' , M.FOTO_PROFIL AS 'foto'
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
}
