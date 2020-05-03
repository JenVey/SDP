<?php
class Pesan_model extends CI_model
{
    public function getAllPesan()
    {
        return $this->db->get('pesan')->result_array();
    }

    public function insertPesan()
    {
        //GENERATE ID
        $idUser = $this->session->userdata('id_user');
        $ctr = 1;
        $query = $this->db->query("select * from pesan");
        $newId = $this->input->post('');
        $cekNewId = 'P' . substr(strtoupper($newId), 0, 1);
        foreach ($query->result_array() as $row) {
            $cekId = substr(strtoupper($row['id_team']), 0, 2);
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

        $tgl = date("Y-m-d H:i:s");
        $data = [
            "id_pesan" => $generateId,
            "id_pengirim" => $this->input->post(''),
            "id_penerima" => $this->input->post(''),
            "tipe_penerima" => $this->input->post(''),
            "pesan" =>  $this->input->post(''),
            "tanggal" =>  $tgl,
            "status" =>  $this->input->post('')
        ];
        $this->db->insert('pesan', $data);
    }

    public function editPesan($id)
    {
        $data = [
            "id_pengirim" => $this->input->post(''),
            "id_penerima" => $this->input->post(''),
            "tipe_penerima" => $this->input->post(''),
            "pesan" =>  $this->input->post(''),
            "tanggal" =>  $this->input->post(''),
            "status" =>  $this->input->post('')
        ];
        $this->db->where('id_pesan', $id);
        $this->db->update('pesan', $data);
    }

    public function deletePesan($id)
    {
        $this->db->where('id_pesan', $id);
        $this->db->delete('pesan');
    }
}
