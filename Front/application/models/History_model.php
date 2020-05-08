<?php
class History_model extends CI_model
{
    public function getAllHistory()
    {
        return $this->db->get('history')->result_array();
    }
    public function getHistoryByUser($id)
    {
        return $this->db->get_where('history', ['id_user' => $id])->result_array();
    }

    public function insertHistory($id)
    {
        $idUser = $this->session->userdata('id_user');
        $saldo = $this->input->post('gross_amount');
        $tgl = date("Y-m-d H:i:s");
        $data = [
            "id_history" => $id,
            "id_user" => $idUser,
            "saldo" => $saldo,
            "date" => $tgl
        ];

        $this->db->insert('history', $data);
    }
}
