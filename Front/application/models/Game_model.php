<?php
class Game_model extends CI_model
{
    public function getAllGame()
    {
        return $this->db->get('game')->result_array();
    }
    public function getGameById($id)
    {
        return $this->db->get_where('game', ['id_game' => $id])->row_array();
    }
}
