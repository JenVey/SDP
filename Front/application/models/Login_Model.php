<?php
class Login_model extends CI_model{

    public function getAllUser()
    {
       return $this->db->get('user')->result_array();
    }

    public function cekUser()
    {
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
      
    }


    public function getUserById($id)
    {
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }

   

}