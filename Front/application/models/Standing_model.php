<?php
class Standing_model extends CI_model
{

    public function getAllStanding()
    {
        $query = "select *
        from tournament_standing ts
        join tournament t on t.id_turnament = ts.id_turnament";

        $res = $this->db->query($query);
        return $res->result_array();
    }
}
