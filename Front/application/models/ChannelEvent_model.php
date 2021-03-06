<?php
class ChannelEvent_model extends CI_model
{
    public function getAllChannelEvent()
    {
        $query = "select ce.judul as 'judul', ce.pesan as 'pesan', ce.foto as 'foto', ce.tanggal as 'tanggal', ce.id_event as  'id_event', ce.id_channel as 'id_channel' , u.nama_user as 'nama_user'
        from channel_event ce
        join channel c on c.id_channel = ce.id_channel
        join user u on u.id_user = ce.id_user";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function getAllChannelEventByIdChannel($idC)
    {
        //$id = $this->session->userdata('id_user');
        $query = "select ce.judul as 'judul', ce.pesan as 'pesan', ce.foto as 'foto', ce.tanggal as 'tanggal'
        from channel_event i
        join channel c on c.id_channel = ci.id_channel
        join user u on u.id_user = ci.id_user 
        where c.id_channel= '" . $idC . "' ";

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
            "id_channel" => $this->input->post('id_channel'),
            "id_user" => $this->input->post('id_user'),
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
