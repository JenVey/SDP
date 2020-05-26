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

    public function updateStanding()
    {
        $idTurney = $this->input->post("id_turnament");
        $juara =  $this->input->post("juara");

        if ($juara == "3") {
            $data = [
                "juara_3" => $this->input->post('nama_team')
            ];
            $this->db->where('id_turnament', $idTurney);
            $this->db->update('tournament_standing', $data);
        } else if ($juara == "0") {

            $data = [
                "juara_1" => $this->input->post('juara1'),
                "juara_2" => $this->input->post('juara2')
            ];

            $this->db->where('id_turnament', $idTurney);
            $this->db->update('tournament_standing', $data);

            $data = [
                "status" => 3
            ];

            $this->db->where('id_turnament', $idTurney);
            $this->db->update('tournament', $data);
        }
    }
}
