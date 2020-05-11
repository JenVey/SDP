<?php
class ChannelUser_model extends CI_model
{
    public function getAllChannelUser()
    {
        $query = "SELECT U.NAMA_USER AS 'nama_user', CU.JENIS AS 'jenis', CU.ID_CHANNEL AS 'id_channel',U.STATUS AS 'status',U.ID_USER AS 'id_user', U.FOTO AS 'foto'
        FROM CHANNEL_USER CU
        JOIN USER U ON U.ID_USER = CU.ID_USER";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function getAllChannelUserbyIdChannel($idChannel)
    {
        $idChannel = $this->input->post('');

        $query = "SELECT U.NAMA_USER AS 'nama_user', CU.JENIS AS 'jenis',U.ID_USER AS 'id_user'
        FROM CHANNEL_USER CU
        JOIN CHANNEL C ON C.ID_CHANNEL = CU.ID_CHANNEL 
        JOIN USER U ON U.ID_USER = CU.ID_USER
        WHERE CU.ID_CHANNEL = '" . $idChannel . "' ";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    // public function searchChannelUser()
    // {
    //     $idChannel = $this->input->post('idChannel');
    //     $keyword = $this->input->post('keyword');

    //     $query = "SELECT U.NAMA_USER AS 'nama_user', CU.JENIS AS 'jenis',U.ID_USER AS 'id_user'
    //     FROM CHANNEL_USER CU
    //     JOIN CHANNEL C ON C.ID_CHANNEL = CU.ID_CHANNEL 
    //     JOIN USER U ON U.ID_USER = CU.ID_USER
    //     WHERE CU.ID_CHANNEL = '" . $idChannel . "' 
    //     AND U.NAMA_USER LIKE '%" . $keyword . "%' ";

    //     $res = $this->db->query($query);
    //     return $res->result_array();
    // }


    public function insertChannelUser()
    {
        $idUser = $this->session->userdata('id_user');

        if (isset($_SESSION['newChannel'])) {
            $idChannel = $this->session->userdata('newChannel');
            $this->session->unset_userdata('newChannel');
            $jenis = 2;
        } else {
            $idChannel = $this->input->post('idChannel');
            $jenis = -1;
        }


        $ada = false;
        $query = $this->db->query("select * from channel_user");
        foreach ($query->result_array() as $row) {
            if ($idChannel == $row['id_channel'] && $idUser == $row['id_user']) {
                $ada = true;
            }
        }


        if (!$ada) {
            $data = [
                "id_user" => $idUser,
                "id_channel" => $idChannel,
                "jenis" => $jenis
            ];
            $this->db->insert('channel_user', $data);
        }
    }

    public function accMember()
    {

        $idChannel = $this->input->post('idChannel');
        $idUser = $this->input->post('idUser');
        $query = "UPDATE CHANNEL_USER SET JENIS = 0 WHERE ID_CHANNEL = '" . $idChannel . "' AND ID_USER = '" . $idUser . "' ";

        $this->db->query($query);
    }

    public function decMember()
    {
        $idChannel = $this->input->post('idChannel');
        $idUser = $this->input->post('idUser');
        $query = "DELETE FROM CHANNEL_USER WHERE ID_CHANNEL = '" . $idChannel . "' AND ID_USER = '" . $idUser . "' ";

        $this->db->query($query);
    }

    public function promoteMember()
    {
        $idChannel = $this->input->post('idChannel');
        $idUser = $this->input->post('idUser');
        $query = "UPDATE CHANNEL_USER SET JENIS = 1 WHERE ID_CHANNEL = '" . $idChannel . "' AND ID_USER = '" . $idUser . "' ";

        $this->db->query($query);
    }

    public function demoteAdmin()
    {
        $idChannel = $this->input->post('idChannel');
        $idUser = $this->input->post('idUser');
        $query = "UPDATE CHANNEL_USER SET JENIS = 0 WHERE ID_CHANNEL = '" . $idChannel . "' AND ID_USER = '" . $idUser . "' ";

        $this->db->query($query);
    }


    //JENIS
    // -1 = REQ , 0 = MEMBER, 1 = ADMIN, 2 = CREATOR
}
