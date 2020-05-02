<?php
class Trans_model extends CI_model
{
    public function getAllTrans()
    {
        return $this->db->get('transaksi')->result_array();
    }

    public function getTransByUser($id)
    {
        return $this->db->get_where('transaksi', ['id_user' => $id])->row_array();
    }
}
