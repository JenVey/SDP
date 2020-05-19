<?php
class Trans_model extends CI_model
{
    public function getAllTrans()
    {
        return $this->db->get('transaksi')->result_array();
    }

    public function getItemByTrans($id)
    {
        return $this->db->get_where('transaksi', ['id_transaksi' => $id])->row_array();
    }

    public function cekStatus($idTransaksi)
    {
        $change = true;


        $query = $this->db->query("select * from transaksi_item where id_transaksi = '" . $idTransaksi . "' ");
        foreach ($query->result_array() as $row) {

            if ($row['status'] == 0) {
                $change = false;
            }
        }


        if ($change) {
            $query2 = $this->db->query("select * from transaksi_item where id_transaksi = '" . $idTransaksi . "' ");
            foreach ($query->result_array() as $row2) {
                $status = -1;
                if ($row2['status'] == 2) {
                    $status = 1;
                }
            }

            $data = [
                "status" => $status
            ];

            $this->db->where('id_transaksi', $idTransaksi);
            $this->db->update('transaksi', $data);

            if ($status == -1) {
                $total = 0;
                $query3 = $this->db->query("select * from transaksi_item where id_transaksi = '" . $idTransaksi . "' ");
                foreach ($query->result_array() as $row3) {
                    $total += $row3['subtotal'];
                }

                $query3 = $this->db->query("select * from transaksi");
                foreach ($query->result_array() as $row3) {
                    if ($idTransaksi == $row3['id_transaksi']) {
                        $query4 = $this->db->query("select * from promo");
                        foreach ($query->result_array() as $row4) {
                            if ($row3['id_promo'] == $row4['id_promo']) {
                                $potongan = $row3['potongan'];
                            }
                        }
                    }
                }
                $cashback = $total * $potongan / 100;


                $data = [
                    "Gross_Amount" => $total,
                    "cashback" => $cashback
                ];

                $this->db->where('id_transaksi', $idTransaksi);
                $this->db->update('transaksi', $data);
            }
        }
    }
}
