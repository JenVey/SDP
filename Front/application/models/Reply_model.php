<?php
class Reply_model extends CI_model
{
    public function getAllReply()
    {
        $query = "select * from reply
        order by 3";
        $res = $this->db->query($query);
        return $res->result_array();
        //return $this->db->get('item_reply')->result_array();
    }

    public function insertReply()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl = date("Y-m-d H:i:s");
        $data = [
            "id_komentar" => $this->input->post('id_komentar'),
            "id_pengirim" => $this->input->post('id_pengirim'),
            "pesan" => $this->input->post('pesan'),
            "tgl_reply" => $tgl
        ];
        $this->db->insert('item_reply', $data);
    }
}
