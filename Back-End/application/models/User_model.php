<?php


class User_model extends CI_model{

    public function getAllUser()
    {
       return $this->db->get('user')->result_array();
    }

    public function insertUser()
    {
        $data = [
            "id_user" => '',
            // "nama_user" => 'robby',
            // "nickname_user" => 'kenenbot',
			// "pass_user" => '123',
            // "email_user" => 'robby@gmail.com',
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



    

}