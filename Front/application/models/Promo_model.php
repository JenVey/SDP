<?php
class Promo_model extends CI_model
{
    public function getAllPromo()
    {
        return $this->db->get('promo')->result_array();
    }
    public function getPromoByMerchant($id)
    {
        return $this->db->get_where('promo', ['id_merchant' => $id])->row_array();
    }
}
