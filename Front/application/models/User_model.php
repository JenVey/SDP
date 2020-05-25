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

        $foto = base64_decode("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");

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

            if ($saldo < 0) {
                $saldo = 0;
            }
        }

        $query = "update user set saldo = '" . $saldo . "' where id_user = '" . $id . "' ";
        $this->db->query($query);
        $this->session->unset_userdata('total');
        $this->session->unset_userdata('cashback');
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

    public function updateStatus($status)
    {
        $id = $this->session->userdata('id_user');
        $data = [
            "status" => $status
        ];

        $this->db->where('id_user', $id);
        $this->db->update('user', $data);
    }
}
