<?php
class Rating_model extends CI_model
{
    public function getAllRating()
    {
        return $this->db->get('merchant_rating')->result_array();
    }
    public function getRatingById($id)
    {
        return $this->db->get_where('merchant', ['id_merchant' => $id])->row_array();
    }

    public function getRatingByIdMerchant($id)
    {
        // $query = "SELECT * FROM RATING R JOIN MERCHANT M ON M.ID_MERCHANT = R.ID_MERCHANT WHERE M.ID_MERCHANT= '" . $id . "' ";
        // $res = $this->db->query($query);
        // return $res->result_array();
    }
}
