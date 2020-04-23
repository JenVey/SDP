<?php
class Merchant_model extends CI_model
{
    public function getAllMerchant()
    {
        return $this->db->get('merchant')->result_array();
    }
    public function getMerchantById($id)
    {
        return $this->db->get_where('merchant', ['id_merchant' => $id])->row_array();
    }

    public function getMerchantByIdUser($id)
    {
        $query = "SELECT M.ID_MERCHANT AS 'id', M.NAMA_MERCHANT AS 'nama',  ROUND(SUM(R.BINTANG)/COUNT(R.BINTANG)) AS 'rating' FROM MERCHANT M JOIN FRIEND F ON M.ID_USER = F.ID_USER2 JOIN MERCHANT_RATING R ON R.ID_MERCHANT = M.ID_MERCHANT WHERE F.ID_USER1 = '" . $id . "' GROUP BY M.ID_MERCHANT,M.NAMA_MERCHANT";
        $res = $this->db->query($query);
        return $res->result_array();
    }
}
