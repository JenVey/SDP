<?php
class Pertandingan_model extends CI_model
{
    public function getAllPertandingan()
    {
        $query = "SELECT *
        FROM PERTANDINGAN P
        JOIN TOURNAMENT T ON T.ID_TURNAMENT = P.ID_TURNAMENT";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function insertPertandingan($bagian)
    {
        //GENERATE ID
        $idUser = $this->session->userdata('id_user');
        $idTurnament = $this->session->userdata('idTurnament');
        $ctr = 1;
        $query = $this->db->query("select * from pertandingan");
        $newId = $bagian;
        $cekNewId = 'B' . substr(strtoupper($newId), 0, 1);
        foreach ($query->result_array() as $row) {
            $cekId = substr(strtoupper($row['id_match']), 0, 2);
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
            "id_match" => $generateId,
            "id_turnament" => $idTurnament,
            "waktu_mulai" => '',
            "bagian" => $bagian,
            "status" =>  0,
            "skor_1" =>  '',
            "skor_2" =>  '',
            "team_1" =>  '',
            "team_2" =>  ''
        ];
        $this->db->insert('pertandingan', $data);
    }


    public function editPertandingan($id)
    {
        $data = [
            "waktu_mulai" => $this->input->post(''),
            "bagian" => $this->input->post(''),
            "status" =>  $this->input->post(''),
            "skor_1" =>  $this->input->post(''),
            "skor_2" =>  $this->input->post(''),
            "team_1" =>  $this->input->post(''),
            "team_2" =>  $this->input->post('')
        ];
        $this->db->where('id_match', $id);
        $this->db->update('pertandingan', $data);
    }

    public function deletePertandingan($id)
    {
        $this->db->where('id_match', $id);
        $this->db->delete('pertandingan');
    }
}
