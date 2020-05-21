<?php
class Tournament_model extends CI_model
{
    public function getAllTournament()
    {
        $query = "select t.id_turnament as 'id_turnament', t.nama_turnament as 'nama_turnament', t.jumlah_pemain as 'jumlah_pemain', t.tanggal_mulai as 'tanggal_mulai' , t.jumlah_slot as 'jumlah_slot', t.tanggal_mulai as 'tanggal_mulai' ,g.nama_game as 'nama_game', t.status as 'status'
        from tournament t
        join channel c on c.id_channel = t.id_channel 
        join game g on g.id_game = t.id_game ";

        $res = $this->db->query($query);

        return $res->result_array();
    }

    public function getTournamentById($id)
    {
        return $this->db->get_where('tournament', ['id_turnament' => $id])->row_array();
    }

    public function getAllTournamentByIdChannel($id)
    {
        $query = "select t.id_turnament as 'id_turnament', t.nama_turnament as 'nama_turnament', t.jumlah_pemain as 'jumlah_pemain', t.tanggal_mulai as 'tgl_mulai' , t.jumlah_slot as 'jumlah_slot', t.tanggal_mulai as 'tanggal_mulai' ,g.nama_game as 'nama_game', t.status as 'status'
        from tournament t
        join channel c on c.id_channel = t.id_channel 
        join game g on g.id_game = t.id_game
        where t.id_channel = '" . $id . "' ";

        $res = $this->db->query($query);

        return $res->result_array();
    }

    public function insertTournament()
    {
        //GENERATE ID
        date_default_timezone_set('Asia/Jakarta');
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
        $tgl = date("Y-d-m H:i", $tgl);

        $this->session->set_userdata(array('idTurnament' => $generateId));
        $data = [
            "id_turnament" => $generateId,
            "id_channel" => $this->input->post('id_channel'),
            "id_game" => $this->input->post('id_game'),
            "nama_turnament" => $this->input->post('nama_turnament'),
            "jumlah_pemain" =>  "0",
            "tanggal_mulai" =>  $tgl,
            "jumlah_slot" =>  $this->input->post('jumlah_slot'),
            "status" => 0
        ];
        $this->db->insert('tournament', $data);
    }

    public function cancelTournament($id)
    {
        $id = $this->input->post('id_turnament');
        $data = [
            "status" => -1
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
