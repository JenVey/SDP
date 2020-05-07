<?php
class Team_model extends CI_model
{

    public function getAllTeam()
    {
        return $this->db->get('team')->result_array();
    }

    public function getTeamById()
    {
        $id = $this->session->userdata('idTeam');
        return $this->db->get_where('team', ['id_team' => $id])->row_array();
    }

    public function getAllTeamByIdUser()
    {
        $id = $this->session->userdata('id_user');
        $query = "SELECT *
        FROM TEAM T
        LEFT JOIN TEAM_MEMBERS TM ON TM.ID_TEAM = T.ID_TEAM 
        WHERE TM.ID_USER= '" . $id . "' ";

        $res = $this->db->query($query);
        return $res->result_array();
    }


    public function insertTeam()
    {
        //GENERATE ID
        $idUser = $this->session->userdata('id_user');
        $ctr = 1;
        $query = $this->db->query("select * from team");
        $newId = $this->input->post('nama_team');
        $cekNewId = 'T' . substr(strtoupper($newId), 0, 1);
        foreach ($query->result_array() as $row) {
            $cekId = substr(strtoupper($row['id_team']), 0, 2);
            if ($cekId == $cekNewId) {
                $ctr++;
            }
        }

        if ($ctr < 10) {
            $generateId = $cekNewId . '000' . $ctr;
        } else if ($ctr < 100) {
            $generateId = $cekNewId . '00' . $ctr;
        } else if ($ctr < 1000) {
            $generateId = $cekNewId . '0' . $ctr;
        } else {
            $generateId = $cekNewId . $ctr;
        }

        $foto = $this->input->post('foto');
        $foto = base64_decode($foto);

        $tgl = date("Y-m-d H:i:s");
        $data = [
            "id_team" => $generateId,
            "id_user" => $this->input->post('id_user'),
            "nama_team" => $this->input->post('nama_team'),
            "tanggal_pembuatan" => $tgl,
            "foto_team" => $foto
        ];
        $this->db->insert('team', $data);

        $data = [
            "id_user" => $idUser,
            "id_team" => $generateId
        ];
        $this->db->insert('team_members', $data);

        $this->session->set_userdata(array('idTeam' => $generateId));
    }


    public function editTeam()
    {
        $id = $this->input->post('id_team');
        $foto = $this->input->post('foto');
        $foto = base64_decode($foto);

        $data = [
            "nama_team" => $this->input->post('nama_team'),
            "foto_team" => $foto
        ];

        $this->db->where('id_team', $id);
        $this->db->update('team', $data);
    }

    public function deleteTeam($id)
    {
        $this->db->where('id_team', $id);
        $this->db->delete('team');
    }

    public function getAllTeamByUser()
    {
        $id = $this->session->userdata('id_user');
        $query = "SELECT T.NAMA_TEAM AS 'nama_team', T.BIO AS 'bio', T.TANGGAL_PEMBUATAN AS 'tgl',T.ID_TEAM AS 'id_team'
        FROM TEAM T 
        JOIN TEAM_MEMBERS TM ON TM.ID_TEAM = T.ID_TEAM 
        WHERE TM.ID_USER= '" . $id . "' ";

        $res = $this->db->query($query);
        return $res->result_array();
    }


    public function cekTeam()
    {
        $idTeam =  $this->input->post('idTeam');
        $ada = false;
        $query = $this->db->query("select * from team");
        foreach ($query->result_array() as $row) {
            if ($idTeam == $row['id_team']) {
                $ada = true;
            }
        }
        if ($ada) {
            $this->session->set_userdata(array('idTeam' => $idTeam));
            $this->TeamMember_model->insertTeamMember();
        } else {
            echo false;
        }
    }
}
