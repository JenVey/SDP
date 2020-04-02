<?php
class Sub_model extends CI_model{

    public function getAllSub()
    {
       return $this->db->get('subscription_detail')->result_array();
    }

    public function insertSub()
    {
         //GENERATE ID
         $ctr = 1;
         $query = $this->db->query("select * from subscription_detail");
         $newId = $this->input->post('tipeSub');
         $cekNewId= 'S' . substr(strtoupper($newId),0,1);
         foreach($query->result_array() as $row)
         {
             $cekId = substr(strtoupper($row['id_sub']),0,2);
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
        
        $tgl = $this->input->post('tglKadaluwarsa');
        $tglAwal = substr($tgl,0,10);
        $tglAkhir= substr($tgl,14);
        $newTglAwal = date("Y-m-d H:i:s", strtotime($tglAwal));
        $newTglAkhir = date("Y-m-d H:i:s", strtotime($tglAkhir));

        $data = [
            "id_sub" => $generateId,
            "tipe_sub" => $this->input->post('tipeSub') ,
            "keterangan" => $this->input->post('keterangan'),
            "tgl_awal" => $newTglAwal,
            "tgl_akhir" =>$newTglAkhir
        ];
        $this->db->insert('subscription_detail',$data);
    }

    public function deleteSub($id)
    {
        $this->db->where('id_sub',$id);
        $this->db->delete('subscription_detail');
    }

    public function getSubById($id)
    {
        return $this->db->get_where('subscription_detail', ['id_sub' => $id])->row_array();
    }

    public function editSub($id)
    {
        var_dump($id);

        $tgl = $this->input->post('tglKadaluwarsa');
        $tglAwal = substr($tgl,0,10);
        $tglAkhir= substr($tgl,14);
        $newTglAwal = date("Y-m-d H:i:s", strtotime($tglAwal));
        $newTglAkhir = date("Y-m-d H:i:s", strtotime($tglAkhir));
        $data = [
            "tipe_sub" => $this->input->post('tipeSub'),
            "keterangan" => $this->input->post('keterangan'),
            "tgl_awal" => $newTglAwal,
            "tgl_akhir" =>$newTglAkhir
        ];

        $this->db->where('id_sub',$id);
        $this->db->update('subscription_detail',$data);
    }

}