<?php
class Friend_model extends CI_model
{
    public function getAllFriend()
    {
        return $this->db->get('friend')->result_array();
    }
    public function getFriendByIdUser($id)
    {
        return $this->db->get_where('friend', ['id_user1' => $id])->row_array();
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
}
