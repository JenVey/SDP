<?php
class ChannelRoom_model extends CI_model
{
    public function getAllChannelRoom()
    {
        return $this->db->get('channel_roomchat')->result_array();
    }

    public function getAllChannelRoomByIdChannel($idC)
    {
        //$id = $this->session->userdata('id_user');
        $query = "select cr.namaroom as 'namaroom'
        from channel_roomchat cr
        join channel c on c.id_channel = cr.id_channel 
        where c.id_channel= '" . $idC . "' ";
        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function insertChannelRoom($idChannel)
    {
        // $idUser = $this->session->userdata('id_user');
        $ctr = 1;
        $query = $this->db->query("select * from channel_roomchat");
        $newId = $this->input->post('');
        $cekNewId = 'Z' . substr(strtoupper($newId), 0, 1);
        foreach ($query->result_array() as $row) {
            $cekId = substr(strtoupper($row['id_room']), 0, 2);
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
            "id_room" => $generateId,
            "id_channel" => $idChannel,
            "namaroom" => $this->input->post('')
        ];
        $this->db->insert('team_reminder', $data);
    }

    public function deleteChannelRoom($id)
    {
        $this->db->where('id_room', $id);
        $this->db->delete('channel_roomchat');
    }
}
