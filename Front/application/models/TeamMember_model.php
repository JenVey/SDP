<?php
class TeamMember_model extends CI_model
{

    public function getAllTeamMember()
    {
        return $this->db->get('team_members')->result_array();
    }

    public function getAllTeamMemberbyTeam()
    {
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

    public function getTeamById($id)
    {
        return $this->db->get_where('team', ['id_team' => $id])->row_array();
    }
}
