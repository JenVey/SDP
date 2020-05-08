<?php
class Pesan_model extends CI_model
{
    public function getAllPesan()
    {
        $query = "SELECT U.NAMA_USER AS 'pengirim', P.PESAN AS 'pesan', P.TANGGAL AS 'tgl', P.STATUS AS 'status', P.ID_PENERIMA AS 'id_penerima', U.FOTO AS 'foto', P.ID_PENGIRIM AS 'id_pengirim'
        FROM PESAN P
        LEFT JOIN USER U ON U.ID_USER = P.ID_PENGIRIM 
        ORDER BY P.TANGGAL";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function getAllPesanByIdPengirim($id)
    {
        $cek = substr($id, 0, 1);
        // if ($cek == "C") {
        //     $query = "SELECT U.NAMA 'pengirim', P.PESAN AS 'pesan', P.TANGGAL AS 'tgl', P.STATUS AS 'status'
        //     FROM PESAN P
        //     JOIN CHANNEL C ON C.ID_CHANNEL = P.ID_PENERIMA
        //     JOIN USER U ON U.ID_USER = P.ID_PENGIRIM
        //     WHERE P.ID_PENERIMA = '" . $id . "'
        //     ORDER BY P.TANGGAL";
        // } else if ($cek == "T") {
        //     $query = "SELECT U.NAMA 'pengirim', P.PESAN AS 'pesan', P.TANGGAL AS 'tgl', P.STATUS AS 'status'
        //     FROM PESAN P
        //     JOIN TEAM T ON T.ID_TEAM = P.ID_PENERIMA
        //     JOIN USER U ON U.ID_USER = P.ID_PENGIRIM
        //     WHERE P.ID_PENERIMA = '" . $id . "'
        //     ORDER BY P.TANGGAL";
        // } else if ($cek == "U") {
        //     $query = "SELECT U.NAMA 'pengirim', P.PESAN AS 'pesan', P.TANGGAL AS 'tgl', P.STATUS AS 'status'
        //     FROM PESAN P
        //     JOIN USER U ON U.ID_USER = P.ID_PENERIMA
        //     WHERE P.ID_PENERIMA = '" . $id . "'
        //     ORDER BY P.TANGGAL";
        // }

        $id = $this->input->post('');
        $query = "SELECT U.NAMA_USER AS 'pengirim', P.PESAN AS 'pesan', P.TANGGAL AS 'tgl', P.STATUS AS 'status'
        FROM PESAN P
        JOIN USER U ON U.ID_USER = P.ID_PENERIMA
        WHERE P.ID_PENERIMA = '" . $id . "'
        ORDER BY P.TANGGAL";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function insertPesan()
    {
        //GENERATE ID
        date_default_timezone_set('Asia/Jakarta');
        $idUser = $this->session->userdata('id_user');
        $ctr = 1;
        $query = $this->db->query("select * from pesan");
        $newId = $this->input->post('pesan');
        $cekNewId = 'P' . substr(strtoupper($newId), 0, 1);
        foreach ($query->result_array() as $row) {
            $cekId = substr(strtoupper($row['id_pesan']), 0, 2);
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
            "id_pesan" => $generateId,
            "id_pengirim" => $this->input->post('id_pengirim'),
            "id_penerima" => $this->input->post('id_penerima'),
            "tipe_penerima" => $this->input->post('tipe_penerima'),
            "pesan" =>  $this->input->post('pesan'),
            "tanggal" =>  $tgl,
            "status" =>  "0"
        ];

        $this->db->insert('pesan', $data);
    }

    public function editPesan($id)
    {
        $data = [
            "id_pengirim" => $this->input->post(''),
            "id_penerima" => $this->input->post(''),
            "tipe_penerima" => $this->input->post(''),
            "pesan" =>  $this->input->post(''),
            "tanggal" =>  $this->input->post(''),
            "status" =>  $this->input->post('')
        ];
        $this->db->where('id_pesan', $id);
        $this->db->update('pesan', $data);
    }

    public function deletePesan($id)
    {
        $this->db->where('id_pesan', $id);
        $this->db->delete('pesan');
    }

    public function readPesan()
    {
        $id = $this->session->userdata('id_user');
        $idFriend =  $this->input->post('idFriend');
        $query = "UPDATE PESAN SET STATUS = 1 WHERE ID_PENGIRIM = '" . $idFriend . "' AND ID_PENERIMA = '" . $id . "'";
        $this->db->query($query);
    }
}
