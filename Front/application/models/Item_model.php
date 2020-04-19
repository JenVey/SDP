<?php
class Item_model extends CI_model
{
    public function getAllItem()
    {
        return $this->db->get('item')->result_array();
    }
    public function getItemById($id)
    {
        return $this->db->get_where('item', ['id_item' => $id])->row_array();
    }
}
