<?php
class Komen_model extends CI_model
{
    public function getAllKomen()
    {
        return $this->db->get('item_komentar')->result_array();
    }
    public function getKomenById($id)
    {
        return $this->db->get_where('item_komentar', ['id_komentar' => $id])->row_array();
    }

    public function getKomenByIdItem($id)
    {
        $query = "select u.nama_user as 'nama', k.pesan as 'pesan', u.foto as 'foto',k.id_komentar as 'id_komentar',k.tgl_komentar as 'tgl_komentar'
        from item_komentar k 
        join item i on k.id_item = i.id_item 
        join user u on u.id_user = k.id_user 
        where k.id_item = '" . $id . "' 
        order by k.tgl_komentar desc";
        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function insertComment($idItem)
    {
        date_default_timezone_set('Asia/Jakarta');
        $query = $this->db->query("select * from item_komentar");
        $komen = $this->input->post('pesan');
        $user = $this->input->post('idUser');

        $ctr = 1;
        $cekNewId = 'K' . substr(strtoupper($komen), 0, 1);
        foreach ($query->result_array() as $row) {
            $cekId = substr(strtoupper($row['id_komentar']), 0, 2);
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
            "id_komentar" => $generateId,
            "id_item" => $idItem,
            "id_user" => $user,
            "pesan" => $komen,
            "tgl_komentar" => $tgl
        ];

        $this->db->insert('item_komentar', $data);
    }
}
