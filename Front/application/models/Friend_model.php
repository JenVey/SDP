<?php
class Friend_model extends CI_model
{
    public function getAllGame()
    {
        return $this->db->get('game')->result_array();
    }
    public function getFriendByIdUser($id)
    {
        return $this->db->get_where('friend', ['id_user1' => $id])->row_array();
    }
}
