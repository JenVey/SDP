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
        return $this->db->get_where('merchant', ['id_user' => $id])->row_array();
        // $query = "SELECT "

        // $res = $this ->db->query($query);
        // return $res->result_array();

    }
}
