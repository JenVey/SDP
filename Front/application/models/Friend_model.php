<?php
class Friend_model extends CI_model
{
    public function getAllFriend()
    {
        return $this->db->get('friend')->result_array();
    }
    public function getFriendByIdUser($id)
    {
        //return $this->db->get_where('friend', ['id_user1' => $id])->result_array();

        $query = "SELECT U.NAMA_USER AS 'nama_user', U.ID_USER AS 'id_user', U.FOTO AS 'foto', F.STATUS AS 'status', F.ID_USER2 AS 'id_user2'
        FROM FRIEND F
        JOIN USER U ON U.ID_USER = F.ID_USER2
        WHERE F.ID_USER1 = '" . $id . "' ";

        $res = $this->db->query($query);
        return $res->result_array();
    }
    public function unlikeMerchant($idM)
    {
        $id = $this->session->userdata('id_user');
        $query = "DELETE FROM FRIEND  WHERE ID_USER1 = '" . $id . "' AND ID_USER2 = '" . $idM . "' ";
        $this->db->query($query);
    }

    public function likeMerchant($idM)
    {
        $id = $this->session->userdata('id_user');
        $query = "INSERT INTO FRIEND(ID_USER1,ID_USER2) VALUES('" . $id . "' , '" . $idM . "' )";
        $this->db->query($query);
    }

    public function addFriend($idU)
    {
        // 0 blm diterima
        // 1 diterima

        $id = $this->session->userdata('id_user');

        $ada = false;
        $query = $this->db->query("select * from friend");
        foreach ($query->result_array() as $row) {
            if ($id == $row['id_user1'] && $idU == $row['id_user2']) {
                $ada = true;
            }
        }

        if (!$ada) {

            $query = "INSERT INTO FRIEND(ID_USER1,ID_USER2,STATUS) VALUES('" . $id . "' , '" . $idU . "',1)"; // YANG ADD
            $this->db->query($query);

            $query = "INSERT INTO FRIEND(ID_USER1,ID_USER2,STATUS) VALUES('" . $idU . "' , '" . $id . "',0)"; // YANG DI ADD
            $this->db->query($query);

            // $this->session->set_userdata(array('friend' => "ada"));
            // $this->session->set_userdata(array('idFriend' => $idU));
        }

        $this->session->set_userdata(array('friend' => "ada"));
        $this->session->set_userdata(array('idFriend' => $idU));
    }

    public function updateAddfriend()
    {
        $id = $this->session->userdata('id_user');
        $idU = $this->input->post('id_user2');

        $query = "UPDATE FRIEND SET STATUS = 2 WHERE ID_USER1 =  '" . $id . "' AND ID_USER2 = '" . $idU . "' "; // ACCEPT FRIEND
        $this->db->query($query);

        $query = "UPDATE FRIEND SET STATUS = 2 WHERE ID_USER1 =  '" . $idU . "' AND ID_USER2 = '" . $id . "' "; // ACCEPT FRIEND
        $this->db->query($query);
    }

    public function blockUser()
    {
        $id = $this->session->userdata('id_user');
        $idU = $this->input->post('id_user2');

        $query = "UPDATE FRIEND SET STATUS = -1 WHERE ID_USER1 =  '" . $id . "' AND ID_USER2 = '" . $idU . "' "; // YANG BLOCK
        $this->db->query($query);
    }

    public function unblockUser()
    {
        $id = $this->session->userdata('id_user');
        $idU = $this->input->post('id_user2');

        $query = "UPDATE FRIEND SET STATUS = 2 WHERE ID_USER1 =  '" . $id . "' AND ID_USER2 = '" . $idU . "' "; // YANG BLOCK
        $this->db->query($query);
    }
}
