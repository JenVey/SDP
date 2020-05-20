<?php
class Game_model extends CI_model
{
    public function getAllGame()
    {
        //return $this->db->get('game')->result_array();
        $query = "select * from game
        order by game.klik desc";
        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function getGameById($id)
    {
        return $this->db->get_where('game', ['id_game' => $id])->row_array();
    }

    public function tambahKlik()
    {
        $idGame = $this->session->userdata('id_game');

        $query = $this->db->query("select * from game");
        foreach ($query->result_array() as $row) {
            if ($row['id_game'] == $idGame) {
                $klik = $row['klik'];
            }
        }

        $klik += 1;

        $data = [
            "klik" => $klik
        ];

        $this->db->where('id_game', $idGame);
        $this->db->update('game', $data);
    }
}
