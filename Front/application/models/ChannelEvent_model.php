<?php
class ChannelEvent_model extends CI_model
{
    public function getAllChannelEvent()
    {
        $query = "SELECT CE.JUDUL AS 'judul', CE.PESAN AS 'pesan', CE.FOTO AS 'foto', CE.TANGGAL AS 'tanggal', CE.ID_EVENT AS  'id_event', CE.ID_CHANNEL AS 'id_channel' , U.NAMA_USER AS 'nama_user'
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

    public function insertChannelEvent()
    {
        $ctr = 1;
        //$id = $this->session->userdata('id_user');
        $query = $this->db->query("select * from channel_event");
        $newId = $this->input->post('judul');
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

        $foto = $this->input->post('foto');
        $foto = base64_decode($foto);
        $tgl = date("Y-m-d H:i:s");
        $data = [
            "id_event" => $generateId,
            "id_channel" => $this->input->post('idChannel'),
            "id_user" => $this->input->post('idUser'),
            "judul" => $this->input->post('judul'),
            "pesan" => $this->input->post('pesan'),
            "tanggal" => $tgl,
            "foto" => $foto,

        ];
        $this->db->insert('channel_event', $data);
    }

    public function editChannelEvent($id)
    {
        $id = $this->input->post('');
        $data = [
            "judul" => $this->input->post('judul'),
            "pesan" => $this->input->post('pesan'),
            "foto" => $this->input->post('foto')
        ];
        $this->db->where('id_event', $id);
        $this->db->update('channel_event', $data);
    }

    public function deleteChannelEvent()
    {
        $id = $this->input->post('');
        $this->db->where('id_event', $id);
        $this->db->delete('channel_event');
    }
}
