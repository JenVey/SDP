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
}
