<?php
class History_model extends CI_model
{
    public function getAllHistory()
    {
        return $this->db->get('history')->result_array();
    }
    public function getHistoryByUser($id)
    {
        return $this->db->get_where('history', ['id_user' => $id])->row_array();
    }
}
