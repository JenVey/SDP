<?php
class TransItem_model extends CI_model
{
    public function getAllTransItem()
    {
        return $this->db->get('transaksi_item')->result_array();
    }
    public function getTransItemByTrans($id)
    {
        return $this->db->get_where('transaksi_item', ['id_transaksi' => $id])->row_array();
    }
    public function getTransItemByUser($id)
    {
        return $this->db->get_where('promo', ['id_merchant' => $id])->row_array();
    }
}
