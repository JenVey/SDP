<?php
class TeamMember_model extends CI_model
{

    public function getAllTeamMember()
    {
        $query = "SELECT U.NAMA_USER AS 'nama_user', U.STATUS AS 'status', TR.ID_TEAM AS 'id_team'
        FROM TEAM_MEMBERS TR
        JOIN USER U ON U.ID_USER = TR.ID_USER";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function getAllTeamMemberbyIdTeam($idTeam)
    {
        $query = "SELECT U.NAMA_USER AS 'nama_user', U.STATUS AS 'status'
        FROM TEAM_MEMBERS TR
        JOIN TEAM T ON T.ID_TEAM = TR.ID_TEAM 
        JOIN USER U ON U.ID_USER = TR.ID_USER
        WHERE T.ID_TEAM = '" . $idTeam . "' ";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function insertTeamMember($idTeam)
    {
        $idUser = $this->input->post('');
        $data = [
            "id_user" => $idUser,
            "id_team" => $idTeam
        ];
        $this->db->insert('team_members', $data);
    }

    public function deleteTeamMember($idTeam)
    {
        $idUser = $this->input->post('');
        $this->db->where('id_team', $idTeam);
        $this->db->where('id_user', $idUser);
        $this->db->delete('team_members');
    }
}
