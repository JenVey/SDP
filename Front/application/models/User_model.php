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
            "status" => 0
        ];
        $this->db->insert('user', $data);
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
}
