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

        $query = "select u.nama_user as 'nama_user', u.id_user as 'id_user', u.foto as 'foto', f.status as 'status', f.id_user2 as 'id_user2'
        from friend f
        join user u on u.id_user = f.id_user2
        where f.id_user1 = '" . $id . "' ";

        $res = $this->db->query($query);
        return $res->result_array();
    }
    public function unlikeMerchant($idM)
    {
        $id = $this->session->userdata('id_user');
        $query = "delete from friend  where id_user1 = '" . $id . "' and id_user2 = '" . $idM . "' ";
        $this->db->query($query);
    }

    public function likeMerchant($idM)
    {
        $id = $this->session->userdata('id_user');
        $query = "insert into friend(id_user1,id_user2,status) values('" . $id . "' , '" . $idM . "', 0 )";
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

            $query = "insert into friend(id_user1,id_user2,status) values('" . $id . "' , '" . $idU . "',1)"; // YANG ADD
            $this->db->query($query);

            $query = "insert into friend(id_user1,id_user2,status) values('" . $idU . "' , '" . $id . "',0)"; // YANG DI ADD
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

        $query = "update friend set status = 2 where id_user1 =  '" . $id . "' and id_user2 = '" . $idU . "' "; // ACCEPT FRIEND
        $this->db->query($query);

        $query = "update friend set status = 2 where id_user1 =  '" . $idU . "' and id_user2 = '" . $id . "' "; // ACCEPT FRIEND
        $this->db->query($query);
    }

    public function blockUser()
    {
        $id = $this->session->userdata('id_user');
        $idU = $this->input->post('id_user2');

        $query = "Update friend set status = -1 where id_user1 =  '" . $id . "' and id_user2 = '" . $idU . "' "; // YANG BLOCK
        $this->db->query($query);
    }

    public function unblockUser()
    {
        $id = $this->session->userdata('id_user');
        $idU = $this->input->post('id_user2');

        $query = "update friend set status = 2 where id_user1 =  '" . $id . "' and id_user2 = '" . $idU . "' "; // YANG BLOCK
        $this->db->query($query);
    }

    public function searchFriend()
    {
        $id = $this->session->userdata('id_user');
        $keyword = $this->input->post('keyword');

        $query = "select u.nama_user as 'nama_user', u.id_user as 'id_user', u.foto as 'foto', f.status as 'status', f.id_user2 as 'id_user2'
        from friend f
        join user u on u.id_user = f.id_user2
        where f.id_user1 = '" . $id . "' 
        and u.nama_user like '%" . $keyword . "%' ";


        $res = $this->db->query($query);
        return $res->result_array();
    }
}
