<?php
class Sub_model extends CI_model
{

    public function getAllSub()
    {
        return $this->db->get('subscribers')->result_array();
    }

    public function insertSub()
    {
        $ctr = 1;
        $query = $this->db->query("select * from subscribers");
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

        $tglAkhir =  $this->input->post('tglAkhir');
        $tglAkhir = date('Y-m-d H:i:s', strtotime($tglAkhir));
        $foto = $this->input->post('photoBanner');
        $foto = base64_decode($foto);

        $data = [
            "id_sub" => $generateId,
            "id_merchant" => $this->input->post('idMerchant'),
            "banner" => $foto,
            "tgl_akhir" => $tglAkhir
        ];
        $this->db->insert('subscribers', $data);
    }

    public function deleteSub($id)
    {

        $data = [
            "status" => 0
        ];

        $this->db->where('id_sub', $id);
        $this->db->update('subscribers', $data);
    }

    public function getSubById($id)
    {
        return $this->db->get_where('subscribers', ['id_sub' => $id])->row_array();
    }

    public function editSub($id)
    {

        $tglAkhir =  $this->input->post('tglAkhir');
        $tglAkhir = date('Y-m-d H:i:s', strtotime($tglAkhir));
        $foto = $this->input->post('photoBanner');
        $foto = base64_decode($foto);

        $data = [
            "banner" => $foto,
            "tgl_akhir" => $tglAkhir
        ];

        $this->db->where('id_sub', $id);
        $this->db->update('subscribers', $data);
    }
}
