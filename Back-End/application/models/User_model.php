<?php
class User_model extends CI_model{

    public function getAllUser()
    {
       return $this->db->get('user')->result_array();
    }

    public function insertUser()
    {
        //GENERATE ID
        $ctr = 1;
        $query = $this->db->query("select * from user");
        $newId = $this->input->post('username');
        $cekNewId= 'U' . substr(strtoupper($newId),0,1);
        foreach($query->result_array() as $row)
        {
            $cekId = substr(strtoupper($row['id_user']),0,2);
            if($cekId == $cekNewId){
                $ctr++;
            }
        }
        if($ctr < 10){
            $generateId = $cekNewId .'000'. $ctr;
        }else if($ctr < 100){
            $generateId = $cekNewId.'00'. $ctr;
        }else if($ctr < 1000){
            $generateId = $cekNewId. '0'. $ctr;
        }else{
            $generateId = $cekNewId . $ctr;
        }

        //default.jpg
        $foto = $this->input->post('photoUser');
        if($foto == ''){
            $foto = 'default.jpg';
        }
    
        $data = [
            "id_user" => $generateId,
            "nama_user" => $this->input->post('nameUser'),
            "username_user" => $this->input->post('username'),
            "pass_user" => $this->input->post('passUser'),
            "email_user" => $this->input->post('emailUser'),
            "trade_link" => '',
            "jenis_kelamin" =>  $this->input->post('jkUser'),
            "foto" =>  $foto,
            "saldo" => 0,
            "status" => 0
           
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
        
         //default.jpg
         $foto = $this->input->post('photoUser');
         if($foto == ''){
             $foto = 'default.jpg';
         }

        $data = [
            "nama_user" => $this->input->post('nameUser'),
			"pass_user" => $this->input->post('passUser'),
			"email_user" => $this->input->post('emailUser'),
            "foto" => $foto,
            "trade_link" => $this->input->post('tradeUser'),
            "jenis_kelamin" =>  $this->input->post('jkUser'),
            "saldo" => $this->input->post('saldoUser'),
            "status" =>$this->input->post('statusUser')
        ];

        $this->db->where('id_user',$id);
        $this->db->update('user',$data);
    }

}