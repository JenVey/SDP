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
        $harga = $this->input->post('harga');
        $jumlah = $this->input->post('jumlah');

        if ($status == 2) {
            $data = [
                "status" => $status,
                "keterangan" => "Success"
            ];

            //TAMBAH SALDO MERCHANT
            $query2 = $this->db->query("select * from item");
            foreach ($query2->result_array() as $row2) {
                if ($row2['id_item'] == $idItem) {

                    //UPDATE AMOUNT ITEM
                    $amount = $row2['jumlah_item'];
                    $amount -= $jumlah;

                    $data2 = [
                        "jumlah_item" => $amount
                    ];

                    echo $amount;

                    $this->db->where('id_item', $row2['id_item']);
                    $this->db->update('item', $data2);

                    $query3 = $this->db->query("select * from merchant");
                    foreach ($query3->result_array() as $row3) {
                        if ($row3['id_merchant'] == $row2['id_merchant']) {

                            $query4 = $this->db->query("select * from user");
                            foreach ($query4->result_array() as $row4) {
                                if ($row4['id_user'] == $row3['id_user']) {

                                    //ADMIN
                                    $admin = $harga * 2 / 100;

                                    $harga -= $admin;
                                    $saldo = $row4['saldo'];
                                    $saldo += $harga;

                                    echo $saldo;

                                    $queryUpdate = "update user set saldo = '" . $saldo . "' where id_user = '" . $row4['id_user'] . "' ";
                                    $this->db->query($queryUpdate);
                                }
                            }
                        }
                    }
                }
            }
        } else if ($status == -2) {
            $data = [
                "status" => $status,
                "keterangan" => "Cancel by Admin"
            ];

            $query = $this->db->query("select * from transaksi");
            foreach ($query->result_array() as $row) {
                if ($row['id_transaksi'] == $idTrans) {
                    $query2 = $this->db->query("select * from user");
                    foreach ($query2->result_array() as $row2) {
                        if ($row2['id_user'] == $row['id_user']) {
                            $cashback = 0;
                            $hargaM = $harga;
                            if ($row['cashback'] != 0) {

                                $promo = $row['Gross_Amount'];
                                $promo = $promo / $row['cashback'];
                                $potongan = $harga * $promo / 100;

                                $grandtotal = $row['Gross_Amount'];
                                $grandtotal -= $harga;
                                $cachback = $row['cashback'];
                                $cachback -= $potongan;

                                //UPDATE GRANDTOTAL DAN CASHBACK DI TRANSAKSI
                                $data2 = [
                                    "Gross_Amount" => $grandtotal,
                                    "cashback" => $cachback
                                ];

                                $this->db->where('id_transaksi', $row['id_transaksi']);
                                $this->db->update('transaksi', $data2);

                                //UPDATE SALDO USER YANG BELI
                                $harga -= $potongan;
                            } else {

                                $grandtotal = $row['Gross_Amount'];
                                $grandtotal -= $harga;

                                //UPDATE GRANDTOTAL DAN CASHBACK DI TRANSAKSI
                                $data2 = [
                                    "Gross_Amount" => $grandtotal
                                ];

                                $this->db->where('id_transaksi', $row['id_transaksi']);
                                $this->db->update('transaksi', $data2);
                            }

                            $saldo = $row2['saldo'];
                            $saldo += $harga;
                            //UPDATE SALDO USER YANG BELI
                            $data3 = [
                                "saldo" => $saldo
                            ];

                            $this->db->where('id_user', $row2['id_user']);
                            $this->db->update('user', $data3);
                        }
                    }
                }
            }
        }

        $this->db->where('id_transaksi', $idTrans);
        $this->db->where('id_item', $idItem);
        $this->db->update('transaksi_item', $data);

        $this->Trans_model->cekStatus($idTrans);
    }
}
