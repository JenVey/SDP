<?php
class TransItem_model extends CI_model
{
    public function getAllTransItem()
    {
        return $this->db->get('transaksi_item')->result_array();
    }
    public function getTransItemByTrans($id)
    {
        return $this->db->get_where('transaksi_item', ['id_transaksi' => $id])->row_array();
    }

    //STATUS

    //-1 = CANCEL BY USER
    //0 = PENDING
    //1 = WAIT ADMIN APPROVE
    //2 = FINISH

    public function changeStatus($status)
    {
        $idTrans = $this->input->post('id_transaksi');
        $idItem = $this->input->post('id_item');
        $ket = $this->input->post('keterangan');
        $foto = $this->input->post('foto');
        $foto = base64_decode($foto);

        if ($status == 1) {
            $data = [
                "status" => $status,
                "keterangan" => "Awaiting admin's approval",
                "foto" => $foto
            ];
        } else if ($status == -1) {
            $data = [
                "status" => $status,
                "keterangan" => "Canceled by User : " . $ket
            ];
        }

        $this->db->where('id_transaksi', $idTrans);
        $this->db->where('id_item', $idItem);
        $this->db->update('transaksi_item', $data);
    }
}
