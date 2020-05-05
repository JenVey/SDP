<?php
class ChannelUser_model extends CI_model
{
    public function getAllChannelUser()
    {
        $query = "SELECT U.NAMA_USER AS 'nama_user', CU.JENIS AS 'jenis', CU.ID_CHANNEL AS 'id_channel',U.STATUS AS 'status'
        FROM CHANNEL_USER CU
        JOIN USER U ON U.ID_USER = CU.ID_USER";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function getAllChannelUserbyIdChannel($idChannel)
    {
        $idChannel = $this->input->post('');

        $query = "SELECT U.NAMA_USER AS 'nama_user', CU.JENIS AS 'jenis'
        FROM CHANNEL_USER CU
        JOIN CHANNEL C ON C.ID_CHANNEL = CU.ID_CHANNEL 
        JOIN USER U ON U.ID_USER = CU.ID_USER
        WHERE CU.ID_CHANNEL = '" . $idChannel . "' ";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function insertChannelUser($idChannel)
    {
        $idUser = $this->input->post('');
        $jenis = $this->input->post('');
        $data = [
            "id_user" => $idUser,
            "id_channel" => $idChannel,
            "jenis" => $jenis
        ];
        $this->db->insert('channel_user', $data);
    }

    public function deleteChannelUser($idChannel)
    {
        $idUser = $this->input->post('');
        $this->db->where('id_channel', $idChannel);
        $this->db->where('id_user', $idUser);
        $this->db->delete('channel_user');
    }
}
