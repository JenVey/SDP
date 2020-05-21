<?php
class Subs_model extends CI_model
{
    public function getAllSub()
    {
        return $this->db->get('subscription')->result_array();
    }


    public function insertSubs()
    {
        $ctr = 1;
        $query = $this->db->query("select * from subscription_detail");
        $cekNewId = 'SU';
        foreach ($query->result_array() as $row) {
            $cekId = substr(strtoupper($row['id_sub']), 0, 2);
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

        $tglAwal =  date("Y-m-d H:i:s");
        $tglAkhir = date('Y-m-d H:i:s', strtotime('+31 days', strtotime($tglAwal)));

        $data = [
            "id_sub" => $generateId,
            "tgl_awal" => $tglAwal,
            "tgl_akhir" => $tglAkhir
        ];
        $this->db->insert('subscription_detail', $data);



        $foto = $this->input->post('foto');
        $foto = base64_decode($foto);

        $data = [
            "id_sub" => $generateId,
            "id_merchant" => $this->input->post('id_merchant'),
            "banner" => $foto
        ];
        $this->db->insert('subscribers', $data);
    }

    public function editBanner()
    {
    }
}
