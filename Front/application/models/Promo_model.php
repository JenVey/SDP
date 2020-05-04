<?php
class Promo_model extends CI_model
{
    public function getAllPromo()
    {
        return $this->db->get('promo')->result_array();
    }
    public function getPromoByMerchant($id)
    {
        return $this->db->get_where('promo', ['id_merchant' => $id])->row_array();
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

        // $tgl = date("Y-m-d H:i:s");
        $data = [
            "id_promo" => $generateId,
            "id_merchant" => $this->input->post(''),
            "kodepromo" => $this->input->post(''),
            "tanggal_aktif" => $this->input->post(''),
            "potongan" =>  $this->input->post('')
        ];
        $this->db->insert('promo', $data);
    }
}
