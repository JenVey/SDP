<?php
class ChannelUser_model extends CI_model
{
    public function getAllChannelUser()
    {
        $query = "select u.nama_user as 'nama_user', cu.jenis as 'jenis', cu.id_channel as 'id_channel',u.status as 'status',u.id_user as 'id_user', u.foto as 'foto'
        from channel_user cu
        join user u on u.id_user = cu.id_user";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function getAllChannelUserbyIdChannel($idChannel)
    {
        $idChannel = $this->input->post('');

        $query = "select u.nama_user as 'nama_user', cu.jenis as 'jenis',u.id_user as 'id_user'
        from channel_user cu
        join channel c on c.id_channel = cu.id_channel 
        join user u on u.id_user = cu.id_user
        where cu.id_channel = '" . $idChannel . "' ";

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
        $query = "update channel_user set jenis = 0 where id_channel = '" . $idChannel . "' and id_user = '" . $idUser . "' ";

        $this->db->query($query);
    }

    public function decMember()
    {
        $idChannel = $this->input->post('idChannel');
        $idUser = $this->input->post('idUser');
        $query = "delete from channel_user where id_channel = '" . $idChannel . "' and id_user = '" . $idUser . "' ";

        $this->db->query($query);
    }

    public function promoteMember()
    {
        $idChannel = $this->input->post('idChannel');
        $idUser = $this->input->post('idUser');
        $query = "update channel_user set jenis = 1 where id_channel = '" . $idChannel . "' and id_user = '" . $idUser . "' ";

        $this->db->query($query);
    }

    public function demoteAdmin()
    {
        $idChannel = $this->input->post('idChannel');
        $idUser = $this->input->post('idUser');
        $query = "update channel_user set jenis = 0 where id_channel = '" . $idChannel . "' and id_user = '" . $idUser . "' ";

        $this->db->query($query);
    }


    //JENIS
    // -1 = REQ , 0 = MEMBER, 1 = ADMIN, 2 = CREATOR
}
