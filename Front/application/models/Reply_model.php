<?php
class Reply_model extends CI_model
{
    public function getAllReply()
    {
        return $this->db->get('item_reply')->result_array();
    }

    public function insertReply()
    {
        $data = [
            "id_komentar" => $this->input->post('id_komentar'),
            "id_pengirim" => $this->input->post('id_pengirim'),
            "pesan" => $this->input->post('pesan')
        ];
        $this->db->insert('item_reply', $data);
    }
}
