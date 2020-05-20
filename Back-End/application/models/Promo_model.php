<?php
class Promo_model extends CI_model
{

    public function getAllPromo()
    {
        return $this->db->get('promo')->result_array();
    }

    public function getPromoById($id)
    {
        return $this->db->get_where('promo', ['id_promo' => $id])->row_array();
    }


    public function insertPromo()
    {
        $ctr = 1;
        $query = $this->db->query("select * from promo");
        $newId = $this->input->post('kodepromo');
        $cekNewId = 'V' . substr(strtoupper($newId), 0, 1);
        foreach ($query->result_array() as $row) {
            $cekId = substr(strtoupper($row['id_promo']), 0, 2);
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

        $tgl = $this->input->post('tglKadaluwarsa');
        $tglAwal = substr($tgl, 0, 10);
        $tglAkhir = substr($tgl, 14);
        $newTglAwal = date("Y-m-d H:i:s", strtotime($tglAwal));
        $newTglAkhir = date("Y-m-d H:i:s", strtotime($tglAkhir));
        // $tgl = date("Y-m-d H:i:s");
        $data = [
            "id_promo" => $generateId,
            "kodepromo" => $this->input->post('kodepromo'),
            "tanggal_aktif" => $newTglAwal,
            "tanggal_kadaluwarsa" => $newTglAkhir,
            "potongan" =>  $this->input->post('potongan'),
            "maksimal" =>  $this->input->post('maksimal')
        ];
        $this->db->insert('promo', $data);
    }

    public function deletePromo($idPromo)
    {
        $this->db->where('id_promo', $idPromo);
        $this->db->delete('promo');
    }


    public function editPromo($idPromo)
    {
        $tgl = $this->input->post('tglKadaluwarsa');
        $tglAwal = substr($tgl, 0, 10);
        $tglAkhir = substr($tgl, 14);
        $newTglAwal = date("Y-m-d H:i:s", strtotime($tglAwal));
        $newTglAkhir = date("Y-m-d H:i:s", strtotime($tglAkhir));
        $data = [
            "tanggal_aktif" => $newTglAwal,
            "tanggal_kadaluwarsa" => $newTglAkhir,
            "potongan" =>  $this->input->post('potongan'),
            "maksimal" =>  $this->input->post('maksimal')
        ];

        $this->db->where('id_promo', $idPromo);
        $this->db->update('promo', $data);
    }
}
