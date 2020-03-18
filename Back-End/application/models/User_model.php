<?php


class User_model extends CI_model{

    public function getAllUser()
    {
       return $this->db->get('user')->result_array();
    }

    public function insertUser()
    {
        //ID ??????
        $data = [
            "id_user" => '2',
            "nama_user" => $this->input->post('nameUser'),
            "nickname_user" => $this->input->post('nickUser'),
			"pass_user" => $this->input->post('passUser'),
			"email_user" => $this->input->post('emailUser'),
			"trade_link" => '',
			"foto" => '',
			"saldo" => 0
        ];
        $this->db->insert('user',$data);
    }

    public function deleteUser($id)
    {
        $this->db->where('id_user',$id);
        $this->db->delete('user');
    }

    public function getUserById($id)
    {
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }

    public function editUser($id)
    {
        //ID ??????
        $data = [
            "nama_user" => $this->input->post('nameUser'),
            "nickname_user" => $this->input->post('nickUser'),
			"pass_user" => $this->input->post('passUser'),
			"email_user" => $this->input->post('emailUser'),
			"trade_link" => '',
			"foto" => '',
			"saldo" => 0
        ];

        $this->db->where('id_user',$id);
        $this->db->update('user',$data);
    }

}