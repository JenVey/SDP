<?php
class TeamMember_model extends CI_model
{

    public function getAllTeamMember()
    {
        $query = "SELECT U.NAMA_USER AS 'nama_user', U.STATUS AS 'status', TR.ID_TEAM AS 'id_team',U.ID_USER AS 'id_user',U.FOTO AS 'foto'
        FROM TEAM_MEMBERS TR
        JOIN USER U ON U.ID_USER = TR.ID_USER";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function getAllTeamMemberbyIdTeam($idTeam)
    {
        $query = "SELECT U.NAMA_USER AS 'nama_user', U.STATUS AS 'status',U.ID_USER AS 'id_user',U.FOTO AS 'foto'
        FROM TEAM_MEMBERS TR
        JOIN TEAM T ON T.ID_TEAM = TR.ID_TEAM 
        JOIN USER U ON U.ID_USER = TR.ID_USER
        WHERE T.ID_TEAM = '" . $idTeam . "' ";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function insertTeamMember()
    {
        $idUser = $this->session->userdata('id_user');
        $idTeam = $this->input->post('idTeam');

        $ada = false;
        $query = $this->db->query("select * from team_members");
        foreach ($query->result_array() as $row) {
            if ($idTeam == $row['id_team'] && $idUser == $row['id_user']) {
                $ada = true;
            }
        }


        if (!$ada) {
            $data = [
                "id_user" => $idUser,
                "id_team" => $idTeam
            ];
            $this->db->insert('team_members', $data);
        }
    }

    public function deleteTeamMember()
    {
        $idTeam = $this->input->post('idTeam');
        $idUser = $this->input->post('idUser');
        $query = "DELETE FROM TEAM_MEMBERS WHERE ID_TEAM = '" . $idTeam . "' AND ID_USER = '" . $idUser . "' ";
        $this->db->query($query);
    }
}
