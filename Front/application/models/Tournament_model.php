<?php
class Tournament_model extends CI_model
{

    public function getAllTournament()
    {
        $query = "SELECT T.NAMA_TURNAMENT AS 'nama_turnament', T.JUMLAH_PEMAIN AS 'jml_pemain', T.TANGGAL_MULAI AS 'tgl_mulai' , T.JUMLAH_SLOT AS 'jumlah_slot', T.TANGGAL_MULAI AS 'tanggal_mulai' ,G.NAMA_GAME AS 'nama_game'
        FROM TOURNAMENT T
        JOIN CHANNEL C ON C.ID_CHANNEL = T.ID_CHANNEL 
        JOIN GAME G ON G.ID_GAME = T.ID_GAME ";

        $res = $this->db->query($query);

        return $res->result_array();
    }

    public function getAllTournamentByIdChannel($id)
    {
        $query = "SELECT T.NAMA_TURNAMENT AS 'nama_turnament', T.JUMLAH_PEMAIN AS 'jml_pemain', T.TANGGAL_MULAI AS 'tgl_mulai' , T.JUMLAH_SLOT AS 'jml_slot'
        FROM TOURNAMENT T
        JOIN CHANNEL C ON C.ID_CHANNEL = T.ID_CHANNEL 
        JOIN GAME G ON G.ID_GAME = T.ID_GAME
        WHERE T.ID_CHANNEL = '" . $id . "' ";

        $res = $this->db->query($query);

        return $res->result_array();
    }

    public function insertTournament()
    {
        //GENERATE ID
        $idUser = $this->session->userdata('id_user');
        $ctr = 1;
        $query = $this->db->query("select * from tournament");
        $newId = $this->input->post('nama_turnament');
        $cekNewId = 'O' . substr(strtoupper($newId), 0, 1);
        foreach ($query->result_array() as $row) {
            $cekId = substr(strtoupper($row['id_turnament']), 0, 2);
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

        $tgl = $this->input->post('tanggal_mulai');
        $tgl = strtotime($tgl);
        $tgl = date("Y-m-d H:i:s", $tgl);

        $this->session->set_userdata(array('idTurnament' => $generateId));
        $data = [
            "id_turnament" => $generateId,
            "id_channel" => $this->input->post('id_channel'),
            "id_game" => $this->input->post('id_game'),
            "nama_turnament" => $this->input->post('nama_turnament'),
            "jumlah_pemain" =>  "0",
            "tanggal_mulai" =>  $tgl,
            "jumlah_slot" =>  $this->input->post('jumlah_slot'),
            "status" => -1
        ];
        $this->db->insert('tournament', $data);
    }

    public function editTournament($id)
    {
        $data = [
            "judul" => $this->input->post(''),
            "waktu" => $this->input->post(''),
            "keterangan" =>  $this->input->post('')
        ];
        $this->db->where('id_turnament', $id);
        $this->db->update('tournament', $data);
    }

    public function deleteTournament($id)
    {
        $this->db->where('id_turnament', $id);
        $this->db->delete('tournament');
    }
}
