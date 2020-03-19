<?php
class Sub_model extends CI_model{

    public function getAllSub()
    {
       return $this->db->get('subscription')->result_array();
    }

    public function insertSub()
    {
         //GENERATE ID
         $ctr = 1;
         $query = $this->db->query("select * from subscription");
         $newId = $this->input->post('tipeSub');
         $cekNewId= substr(strtoupper($newId),0,1);
         foreach($query->result_array() as $row)
         {
             $cekId = substr(strtoupper($row['id_sub']),0,1);
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

        $tgl = $this->input->post('tglKadaluwarsa');
        $newTgl = date("Y-m-d H:i:s", strtotime($tgl));
        $data = [
            "id_sub" => $generateId,
            "tipe_sub" => $this->input->post('tipeSub') ,
            "keterangan" => $this->input->post('keterangan'),
            "tgl_kadaluwarsa" => $newTgl
        ];
        $this->db->insert('subscription',$data);
    }

    public function deleteSub($id)
    {
        $this->db->where('id_sub',$id);
        $this->db->delete('subscription');
    }

    public function getSubById($id)
    {
        return $this->db->get_where('subscription', ['id_sub' => $id])->row_array();
    }

    public function editSub($id)
    {

        $data = [
            "tipe_sub" => $this->input->post('tipeSub') ,
            "keterangan" => $this->input->post('keterangan'),
            "tgl_kadaluawarsa" => $this->input->post('tglKadaluwarsa'),
        ];

        $this->db->where('id_sub',$id);
        $this->db->update('subscription',$data);
    }

}