<?php
class Standing_model extends CI_model
{

    public function getAllStanding()
    {
        $query = "SELECT *
        FROM TOURNAMENT_STANDING TS
        JOIN TOURNAMENT T ON T.ID_TURNAMENT = TS.ID_TURNAMENT";

        $res = $this->db->query($query);
        return $res->result_array();
    }
}
