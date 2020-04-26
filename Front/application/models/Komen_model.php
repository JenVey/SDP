<?php
class Komen_model extends CI_model
{
    public function getAllKomen()
    {
        return $this->db->get('item_komentar')->result_array();
    }
    public function getKomenById($id)
    {
        return $this->db->get_where('ietm_komentar', ['id_komentar' => $id])->row_array();
    }

    public function getKomenByIdItem($id)
    {
        $query = "SELECT * FROM ITEM_KOMENTAR K JOIN ITEM I ON K.ID_ITEM = I.ID_ITEM JOIN USER U ON U.ID_USER = K.ID_USER WHERE K.ID_ITEM= '" . $id . "' ";
        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function insertComment($idItem)
    {
        $query = $this->db->query("select * from item_komentar");
        $komen = $this->input->post('commentUser');
        $user = $this->input->post('idUser');

        $ctr = 0;
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

        $data = [
            "id_komentar" => $generateId,
            "id_item" => $idItem,
            "id_user" => $user,
            "pesan" => $komen
        ];

        $this->db->insert('item_komentar', $data);
    }
}
