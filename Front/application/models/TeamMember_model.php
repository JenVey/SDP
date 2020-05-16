<?php
class TeamMember_model extends CI_model
{

    public function getAllTeamMember()
    {
        $query = "select u.nama_user as 'nama_user', u.status as 'status', tr.id_team as 'id_team' ,u.id_user as 'id_user' ,u.foto as 'foto'
        from team_members tr
        join user u on u.id_user = tr.id_user";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function getAllTeamMemberbyIdTeam($idTeam)
    {
        $query = "select u.nama_user as 'nama_user', u.status as 'status',u.id_user as 'id_user',u.foto as 'foto'
        from team_members tr
        join team t on t.id_team = tr.id_team 
        join user u on u.id_user = tr.id_user
        where t.id_team = '" . $idTeam . "' ";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function searchTeamMember()
    {
        $idTeam = $this->input->post("idTeam");
        $keyword = $this->input->post("keyword");

        $query = "select u.nama_user as 'nama_user', u.status as 'status',u.id_user as 'id_user',u.foto as 'foto'
        from team_members tr
        join team t on t.id_team = tr.id_team 
        join user u on u.id_user = tr.id_user
        where t.id_team = '" . $idTeam . "'
        and u.nama_user like '%" . $keyword . "%' ";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function insertTeamMember()
    {
        $idUser = $this->session->userdata('id_user');
        if (isset($_SESSION['insertTeam'])) {
            $idTeam = $this->session->userdata('idTeam');
        } else {
            $idTeam = $this->input->post('idTeam');
        }


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

        $this->session->unset_userdata('insertTeam');
    }

    public function kickMember()
    {
        $idTeam = $this->input->post('id_team');
        $idUser = $this->input->post('id_user');

        $query = "delete from team_members where id_team = '" . $idTeam . "' and id_user = '" . $idUser . "' ";

        $this->db->query($query);
    }
}
