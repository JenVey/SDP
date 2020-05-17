<?php
class Merchant_model extends CI_model
{
    public function getAllMerchant()
    {
        return $this->db->get('merchant')->result_array();
    }
    public function getTransItemByTrans($id)
    {
        return $this->db->get_where('merchant', ['id_merchant' => $id])->row_array();
    }
}
