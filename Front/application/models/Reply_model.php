<?php
class Reply_model extends CI_model
{
    public function getAllReply()
    {
        return $this->db->get('item_reply')->result_array();
    }
    public function getReplyById($id)
    {
        return $this->db->get_where('item_komentar', ['id_komentar' => $id])->row_array();
    }

    public function getKomenByIdItem($id)
    {
        $query = "SELECT * FROM ITEM_REPLY R JOIN ITEM_KOMENTAR K ON K.ID_KOMENTAR = R.ID_KOMENTAR  WHERE K.ID_ITEM = '" . $id . "' ";
        $res = $this->db->query($query);
        return $res->result_array();
    }
}
