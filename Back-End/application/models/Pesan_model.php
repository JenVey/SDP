<?php
class Pesan_model extends CI_model{

    public function getAllPesan()
    {
       return $this->db->get('pesan')->result_array();
    }

    public function insertPesan()
    {
         //GENERATE ID
         $ctr = 1;
         $query = $this->db->query("select * from pesan");
         $newId = $this->input->post('nameChannel');
         $cekNewId= 'P' . substr(strtoupper($newId),0,1);
         foreach($query->result_array() as $row)
         {

             $cekId = substr(strtoupper($row['id_pesan']),0,1);
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


         $foto = $this->input->post('photoChannel');
         if($foto == ''){
             $foto = 'default.jpg';
         }
 
        $data = [
            
        ];
        $this->db->insert('channel',$data);
    }

    public function deletePesan($id)
    {
        $this->db->where('id_pesan',$id);
        $this->db->delete('pesan');
    }

    public function getPesanById($id)
    {
        return $this->db->get_where('pesan', ['id_pesan' => $id])->row_array();
    }

    public function editPesan($id)
    {
        $status;
        if($this->input->post('statusPesan') == "Delivered"){
           $status = 0;
        }else if($this->input->post('statusPesan') == "Read" ){
            $status = 1;
        }else{
            $status = 2;
        }

       $data = [
            "id_pengirim" =>  $this->input->post('idPengirim'),
            "id_penerima" =>  $this->input->post('idPenerima'),
            "tipe_penerima" => $this->input->post('tipePenerima'),
            "pesan" => $this->input->post('isiPesan'),
            "tanggal" => $this->input->post('tglPesan'),
            "status" => $status
       ];

        $this->db->where('id_pesan',$id);
        $this->db->update('pesan',$data);
    }

}