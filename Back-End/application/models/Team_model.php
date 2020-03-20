<?php
class Team_model extends CI_model{

    public function getAllTeam()
    {
       return $this->db->get('gamingteam')->result_array();
    }

    public function insertTeam()
    {
         //GENERATE ID
         $ctr = 1;
         $query = $this->db->query("select * from gamingteam");
         $newId = $this->input->post('nameTeam');
         $cekNewId= substr(strtoupper($newId),0,1);
         foreach($query->result_array() as $row)
         {
             $cekId = substr(strtoupper($row['id_team']),0,1);
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
         
        $tgl = date("Y-m-d H:i:s");

        $data = [
            "id_team" => $generateId,
            "nama_team" => $this->input->post('nameTeam'),
            "tanggal_pembuatan" => $tgl,
            "bio" =>  $this->input->post('bioTeam')
        ];
        $this->db->insert('gamingteam',$data);
    }

    public function deleteTeam($id)
    {
        $this->db->where('id_team',$id);
        $this->db->delete('gamingteam');
    }

    public function getTeamById($id)
    {
        return $this->db->get_where('gamingteam', ['id_team' => $id])->row_array();
    }

    public function editTeam($id)
    {

       $data = [
            "nama_team" => $this->input->post('nameTeam'),
            "bio" =>  $this->input->post('bioTeam')
       ];

        $this->db->where('id_team',$id);
        $this->db->update('gamingteam',$data);
    }

}