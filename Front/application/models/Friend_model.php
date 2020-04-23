<?php
class Friend_model extends CI_model
{
    public function getAllGame()
    {
        return $this->db->get('game')->result_array();
    }
    public function getFriendByUser($id)
    {
        return $this->db->get_where('friend', ['id_game' => $id])->row_array();
    }
}
