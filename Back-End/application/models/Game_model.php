<?php
class Game_model extends CI_model{

    public function getAllGame()
    {
       return $this->db->get('game')->result_array();
    }

    public function insertChannel()
    {
         //GENERATE ID
         $ctr = 1;
         $query = $this->db->query("select * from game");
         $newId = $this->input->post('nameGame');
         $cekNewId= 'G' . substr(strtoupper($newId),0,1);
         foreach($query->result_array() as $row)
         {
             $cekId = substr(strtoupper($row['id_game']),0,1);
             if($cekId == $cekNewId){
                 $ctr++;
             }
         }
         if($ctr < 10){
             $generateId = $cekNewId .'00'. $ctr;
         }else if($ctr < 100){
             $generateId = $cekNewId.'0'. $ctr;
         }else if($ctr < 1000){
             $generateId = $cekNewId . $ctr;
         }


        //  $foto = $this->input->post('photoChannel');
        //  if($foto == ''){
        //      $foto = 'default.jpg';
        //  }
 
        $data = [
            "id_game" => $generateId,
            "nama_game" => $this->input->post('nameGame')
           // "foto_channel" => $foto
        ];
        $this->db->insert('game',$data);

    }

    public function deleteGame($id)
    {
        $this->db->where('id_game',$id);
        $this->db->delete('game');
    }

    public function getGameById($id)
    {
        return $this->db->get_where('game', ['id_game' => $id])->row_array();
    }

    public function editGame($id)
    {
    
        // $foto = $this->input->post('photoChannel');
        // if($foto == ''){
        //     $foto = 'default.jpg';
        // }

       $data = [
             "nama_game" => $this->input->post('nameGame')
       ];

        $this->db->where('id_game',$id);
        $this->db->update('game',$data);
    }

}