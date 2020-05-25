<?php
class TeamRemin_model extends CI_model
{

    public function getAllTeamRemin()
    {
        $query = "select *
        from team_reminder tr
        order by tr.waktu asc ";
        $res = $this->db->query($query);

        return $res->result_array();
        // $this->db->get('team_reminder')->result_array();
    }

    public function getAllTeamReminByIdTeam($idTeam)
    {
        $query = "select t.nama_team as 'nama_team', t.bio as 'bio', t.tanggal_pembuatan as 'tgl',t.id_team as 'id_team'
        from team_reminder tr
        join team t on t.id_team = tr.id_team 
        where t.id_team = '" . $idTeam . "' ";

        $res = $this->db->query($query);

        return $res->result_array();
    }

    public function insertTeamRemin()
    {
        //GENERATE ID
        $idUser = $this->session->userdata('id_user');
        $ctr = 1;
        $query = $this->db->query("select * from team_reminder");
        $newId = $this->input->post('judul');
        $cekNewId = 'R' . substr(strtoupper($newId), 0, 1);
        foreach ($query->result_array() as $row) {
            $cekId = substr(strtoupper($row['id_reminder']), 0, 2);
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

        $tgl = $this->input->post('waktu');
        $tgl = strtotime($tgl);
        $tgl = date("Y-m-d H:i", $tgl);


        $data = [
            "id_reminder" => $generateId,
            "judul" => $this->input->post('judul'),
            "id_team" => $this->input->post('id_team'),
            "waktu" => $tgl,
            "keterangan" =>  $this->input->post('keterangan')
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
