<?php
class Cart_model extends CI_model
{
    public function getAllCart()
    {
        return $this->db->get('cart')->result_array();
    }
    public function getCartById($id)
    {
        return $this->db->get_where('cart', ['id_cart' => $id])->row_array();
    }
}
