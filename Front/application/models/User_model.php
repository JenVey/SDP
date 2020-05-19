<?php
class User_model extends CI_model
{

    public function getAllUser()
    {
        return $this->db->get('user')->result_array();
    }

    public function getUserById($id)
    {
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }


    public function getFriendById()
    {
        $id = $this->session->userdata('idFriend');
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }

    public function getUserByIdFriend($id)
    {

        $query = "select u.nama_user as 'nama_user', u.foto 'foto'
        from user u 
        join friend f on u.id_user = f.id_user2
        where f.id_user1 = '" . $id . "'";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function insertUser()
    {
        //GENERATE ID
        $ctr = 1;
        $query = $this->db->query("select * from user");
        $newId = $this->input->post('regName');
        $user = $this->input->post('regUsername');
        $name = $this->input->post('regName');
        $email = $this->input->post('regEmail');
        $phone = $this->input->post('regPhone');
        $pass = $this->input->post('regPass');
        $jk = $this->input->post('regJk');

        $cekNewId = 'U' . substr(strtoupper($newId), 0, 1);
        foreach ($query->result_array() as $row) {
            $cekId = substr(strtoupper($row['id_user']), 0, 2);
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
        //default.jpg
        $foto = $this->input->post('photoUser');
        if ($foto == '') {
            $foto = 'default.jpg';
        }

        $data = [
            "id_user" => $generateId,
            "nama_user" => $name,
            "username_user" => $user,
            "pass_user" => $pass,
            "email_user" => $email,
            "trade_link" => '',
            "jenis_kelamin" =>  $jk,
            "foto" =>  $foto,
            "phone" => $phone,
            "saldo" => 0,
            "status" => -1
        ];
        $this->db->insert('user', $data);
        $this->session->set_userdata(array('user' => $generateId));
    }


    public function changePass($id)
    {
        $query = $this->db->query("select * from user");
        $pass = $this->input->post('forPass');

        $data = [
            "pass_user" => $pass
        ];

        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
    }

    public function updateSaldo($jenis)
    {
        $id = $this->session->userdata('id_user');
        $cekquery = $this->db->query("select * from user");
        foreach ($cekquery->result_array() as $row) {
            if ($id == $row['id_user']) {
                $saldo = $row['saldo'];
            }
        }

        if ($jenis == "topup") {
            $total = $this->session->userdata('total');
            $saldo = $saldo + intval($total);
        } else {

            $cashback = $this->session->userdata('cashback');
            $total = $this->input->post('gross_amount');

            $saldo = $saldo - intval($total) + $cashback;
            // echo $total;
            // echo $saldo;
            if ($saldo < 0) {
                $saldo = 0;
            }
        }

        $query = "update user set saldo = '" . $saldo . "' where id_user = '" . $id . "' ";
        $this->db->query($query);
        $this->session->unset_userdata('total');
    }

    public function updateSaldoG($cek)
    {
        $id = $this->session->userdata('id_user');
        $cekquery = $this->db->query("select * from user");
        foreach ($cekquery->result_array() as $row) {
            if ($id == $row['id_user']) {
                $saldo = $row['saldo'];
            }
        }

        if ($cek == "kurang") {
            $saldo = $saldo - 5000;
        } else {
            $total = $this->input->post('total');
            $saldo = $saldo + intval($total);
            echo $saldo;
        }

        $query = "update user set saldo = '" . $saldo . "' where id_user = '" . $id . "' ";
        $this->db->query($query);
    }

    public function editUser()
    {
        $id = $this->session->userdata('id_user');
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $pass = $this->input->post('pass');
        $email = $this->input->post('email');
        $trade = $this->input->post('trade');
        $foto = $this->input->post('foto');
        $foto = base64_decode($foto);

        $data = [
            "nama_user" => $name,
            "pass_user" => $pass,
            "email_user" => $email,
            "trade_link" => $trade,
            "foto" =>  $foto,
            "phone" => $phone
        ];

        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
    }

    public function updateStatusById($id)
    {
        $query = $this->db->query("select * from user");
        $pass = $this->input->post('forPass');

        $data = [
            "status" => 0
        ];

        $this->db->where('id_user', $id);
        $this->db->update('user', $data);

        $this->session->unset_userdata('user');
    }

    public function cekUsername()
    {
        $username =  $this->input->post('username');
        $ada = false;
        $query = $this->db->query("select * from user");
        foreach ($query->result_array() as $row) {
            if ($username == $row['username_user']) {
                $id = $row['id_user'];
                $ada = true;
            }
        }

        if ($ada) {
            $this->Friend_model->addFriend($id);
        } else {
            echo false;
        }
    }
}
