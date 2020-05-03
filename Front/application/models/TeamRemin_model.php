<?php
class TeamRemin_model extends CI_model
{

    public function getAllTeamRemin()
    {
        return $this->db->get('team_reminder')->result_array();
    }

    public function getAllTeamReminByIdTeam($idTeam)
    {
        $query = "SELECT T.NAMA_TEAM AS 'nama_team', T.BIO AS 'bio', T.TANGGAL_PEMBUATAN AS 'tgl',T.ID_TEAM AS 'id_team'
        FROM TEAM_REMINDER TR
        JOIN TEAM T ON T.ID_TEAM = TR.ID_TEAM 
        WHERE T.ID_TEAM = '" . $idTeam . "' ";

        $res = $this->db->query($query);

        return $res->result_array();
    }

    public function insertTeamRemin()
    {
        //GENERATE ID
        $idUser = $this->session->userdata('id_user');
        $ctr = 1;
        $query = $this->db->query("select * from team_reminder");
        $newId = $this->input->post('');
        $cekNewId = 'R' . substr(strtoupper($newId), 0, 1);
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

        // $tgl = date("Y-m-d H:i:s");
        $data = [
            "id_reminder" => $generateId,
            "judul" => $this->input->post(''),
            "id_team" => $this->input->post(''),
            "waktu" => $this->input->post(''),
            "keterangan" =>  $this->input->post('')
        ];
        $this->db->insert('team_reminder', $data);
    }


    public function editTeamRemin($id)
    {
        $data = [
            "judul" => $this->input->post(''),
            "waktu" => $this->input->post(''),
            "keterangan" =>  $this->input->post('')
        ];
        $this->db->where('id_reminder', $id);
        $this->db->update('team_reminder', $data);
    }

    public function deleteTeamRemin($id)
    {
        $this->db->where('id_reminder', $id);
        $this->db->delete('team_reminder');
    }
}
