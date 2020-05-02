<?php
class ChannelRoom_model extends CI_model
{
    public function getAllChannelRoom()
    {
        return $this->db->get('channel_roomchat')->result_array();
    }

    public function getAllChannelRoomByChannel($id)
    {
        //$id = $this->session->userdata('id_user');
        $query = "SELECT CR.NAMAROOM AS 'namaroom'
        FROM CHANNEL_ROOMCHAT CR
        JOIN CHANNEL C ON C.ID_CHANNEL = CR.ID_CHANNEL 
        WHERE C.ID_CHANNEL= '" . $id . "' ";
        $res = $this->db->query($query);
        return $res->result_array();
    }
}
