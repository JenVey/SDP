<?php
class ChannelEvent_model extends CI_model
{
    public function getAllChannelEvent()
    {
        $query = "SELECT CE.JUDUL AS 'judul', CE.PESAN AS 'pesan', CE.FOTO AS 'foto', CE.TANGGAL AS 'tanggal'
        FROM CHANNEL_EVENT CE
        JOIN CHANNEL C ON C.ID_CHANNEL = CE.ID_CHANNEL
        JOIN USER U ON U.ID_USER = CE.ID_USER";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function getAllChannelEventByIdChannel($idC)
    {
        //$id = $this->session->userdata('id_user');
        $query = "SELECT CE.JUDUL AS 'judul', CE.PESAN AS 'pesan', CE.FOTO AS 'foto', CE.TANGGAL AS 'tanggal'
        FROM CHANNEL_EVENT I
        JOIN CHANNEL C ON C.ID_CHANNEL = CI.ID_CHANNEL
        JOIN USER U ON U.ID_USER = CI.ID_USER 
        WHERE C.ID_CHANNEL= '" . $idC . "' ";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function insertEvent($idChannel)
    {
        $ctr = 1;
        $id = $this->session->userdata('id_user');
        $query = $this->db->query("select * from channel_event");
        $newId = $this->input->post('');
        $cekNewId = 'E' . substr(strtoupper($newId), 0, 1);
        foreach ($query->result_array() as $row) {
            $cekId = substr(strtoupper($row['id_event']), 0, 2);
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
        $tgl = date("Y-m-d H:i:s");

        $data = [
            "id_event" => $generateId,
            "id_channel" => $idChannel,
            "id_user" => $id,
            "judul" => $this->input->post('nameChannel'),
            "pesan" => $this->input->post('nameChannel'),
            "tanggal" => $tgl,
            "foto" => $this->input->post('nameChannel'),

        ];
        $this->db->insert('channel_event', $data);
    }

    public function editChannelEvent($id)
    {
        $data = [
            "judul" => $this->input->post('nameChannel'),
            "pesan" => $this->input->post('nameChannel'),
            "foto" => $this->input->post('nameChannel')
        ];
        $this->db->where('id_event', $id);
        $this->db->update('channel_event', $data);
    }

    public function deleteChannelEvent($id)
    {
        $this->db->where('id_event', $id);
        $this->db->delete('channel_event');
    }
}
