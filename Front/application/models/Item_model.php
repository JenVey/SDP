<?php
class Item_model extends CI_model
{

    public function getAllItem()
    {
        $query = "SELECT * FROM ITEM I 
        JOIN MERCHANT M ON M.ID_MERCHANT = I.ID_MERCHANT 
        JOIN GAME G ON G.ID_GAME = I.ID_GAME
        AND I.JUMLAH_ITEM > 0 ";
        //ORDER BY I.TANGGAL_UPLOAD DESC";
        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function getItemById($id)
    {
        return $this->db->get_where('item', ['id_item' => $id])->row_array();
    }

    public function getItemByIdMerchant($id)
    {
        $query = "SELECT * FROM ITEM I 
        JOIN MERCHANT M ON M.ID_MERCHANT = I.ID_MERCHANT 
        JOIN GAME G ON G.ID_GAME = I.ID_GAME 
        WHERE M.ID_MERCHANT= '" . $id . "' 
        AND I.JUMLAH_ITEM > 0
        ORDER BY I.TANGGAL_UPLOAD DESC";
        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function getItemByIdUser($id)
    {
        $query = "SELECT * FROM ITEM I 
        JOIN MERCHANT M ON M.ID_MERCHANT = I.ID_MERCHANT 
        JOIN GAME G ON G.ID_GAME = I.ID_GAME 
        WHERE M.ID_USER= '" . $id . "' 
        AND I.JUMLAH_ITEM > 0
        ORDER BY I.TANGGAL_UPLOAD DESC";
        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function getItemByIdGame($limit, $start)
    {
        $idG = $this->session->userdata('id_game');

        $this->db->select('*');
        $this->db->from('ITEM I');
        $this->db->join('MERCHANT M', 'M.ID_MERCHANT = I.ID_MERCHANT');
        $this->db->join('GAME G', ' G.ID_GAME = I.ID_GAME');
        $this->db->where('I.ID_GAME', $idG);
        $this->db->where('I.JUMLAH_ITEM >', 0);
        $this->db->limit($limit, $start);
        return  $this->db->get()->result_array();

        // $query = "SELECT * FROM ITEM I 
        // JOIN MERCHANT M ON M.ID_MERCHANT = I.ID_MERCHANT 
        // JOIN GAME G ON G.ID_GAME = I.ID_GAME 
        // WHERE I.ID_GAME= '" . $idG . "' 
        // AND I.JUMLAH_ITEM > 0
        // ORDER BY I.TANGGAL_UPLOAD DESC";


        // $res = $this->db->query($query);
        // return $res->result_array();
    }

    public function getItemBySearch($keyword)
    {
        if (isset($_SESSION['filter'])) {
            $query = "SELECT * FROM ITEM I 
            JOIN MERCHANT M ON M.ID_MERCHANT = I.ID_MERCHANT 
            JOIN GAME G ON G.ID_GAME = I.ID_GAME 
            WHERE I.NAMA_ITEM LIKE '%" . $keyword . "%' 
            AND I.JUMLAH_ITEM > 0
            ORDER BY CASE WHEN I.NAMA_ITEM LIKE '" . $keyword . "%' THEN 0 ELSE 1 END ";

            if ($_SESSION['filter'] == "newest") {
                $query = $query . ", I.TANGGAL_UPLOAD DESC";
            } else if ($_SESSION['filter'] == "oldest") {
                $query = $query . ", I.TANGGAL_UPLOAD ASC";
            } else if ($_SESSION['filter'] == "cheapest") {
                $query = $query . ", I.HARGA_ITEM ASC";
            } else {
                $query = $query . ", I.HARGA_ITEM DESC";
            }
        } else {
            $query = "SELECT * FROM ITEM I 
            JOIN MERCHANT M ON M.ID_MERCHANT = I.ID_MERCHANT 
            JOIN GAME G ON G.ID_GAME = I.ID_GAME 
            WHERE I.NAMA_ITEM LIKE '%" . $keyword . "%' 
            ORDER BY CASE WHEN I.NAMA_ITEM LIKE '" . $keyword . "%' THEN 0 ELSE 1 END, I.NAMA_ITEM";
        }


        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function getItemBySearchM($keyword)
    {
        $idM = $_SESSION['id_merchant'];
        if (isset($_SESSION['filter'])) {
            $query = "SELECT * FROM ITEM I 
            JOIN MERCHANT M ON M.ID_MERCHANT = I.ID_MERCHANT 
            JOIN GAME G ON G.ID_GAME = I.ID_GAME 
            WHERE I.NAMA_ITEM LIKE '%" . $keyword . "%' 
            AND M.ID_MERCHANT = '" . $idM . "'
            AND I.JUMLAH_ITEM > 0
            ORDER BY CASE WHEN I.NAMA_ITEM LIKE '" . $keyword . "%' THEN 0 ELSE 1 END ";

            if ($_SESSION['filter'] == "newest") {
                $query = $query . ", I.TANGGAL_UPLOAD DESC";
            } else if ($_SESSION['filter'] == "oldest") {
                $query = $query . ", I.TANGGAL_UPLOAD ASC";
            } else if ($_SESSION['filter'] == "cheapest") {
                $query = $query . ", I.HARGA_ITEM ASC";
            } else {
                $query = $query . ", I.HARGA_ITEM DESC";
            }
        } else {
            $query = "SELECT * FROM ITEM I 
            JOIN MERCHANT M ON M.ID_MERCHANT = I.ID_MERCHANT 
            JOIN GAME G ON G.ID_GAME = I.ID_GAME 
            WHERE I.NAMA_ITEM LIKE '%" . $keyword . "%' 
            AND M.ID_MERCHANT = '" . $idM . "'
            ORDER BY CASE WHEN I.NAMA_ITEM LIKE '" . $keyword . "%' THEN 0 ELSE 1 END, I.NAMA_ITEM";
        }

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function updateAmount()
    {

        if (isset($_SESSION['idTransaksi'])) {
            $idTrans = $this->session->userdata('idTransaksi');
            $cekQuery =  $this->db->query("SELECT * FROM TRANSAKSI_ITEM WHERE ID_TRANSAKSI = '" . $idTrans . "' ");

            foreach ($cekQuery->result_array() as $row) {
                $amount = $row['jumlah'];
                var_dump($row['id_item']);
                $query = $this->db->query("SELECT * FROM ITEM I  WHERE I.ID_ITEM = '" . $row['id_item'] . "' ");
                foreach ($query->result_array() as $row2) {
                    $amountItem = $row2['jumlah_item'];
                }

                $newAmount = $amountItem - $amount;
                $query2 = "UPDATE ITEM I SET JUMLAH_ITEM = " . $newAmount . " WHERE I.ID_ITEM = '" . $row['id_item'] . "' ";
                $this->db->query($query2);
            }
        } else {
            $cart = $this->input->post('cart');
            $cart = json_decode($cart, true);

            for ($i = 0; $i < count($cart); $i++) {
                $amount = $cart[$i]['quantity'];
                //var_dump($row['id_item']);
                $query = $this->db->query("SELECT * FROM ITEM I  WHERE I.ID_ITEM = '" . $cart[$i]['id'] . "' ");

                foreach ($query->result_array() as $row2) {
                    $amountItem = $row2['jumlah_item'];
                }

                $newAmount = $amountItem - $amount;
                $query2 = "UPDATE ITEM I SET JUMLAH_ITEM = " . $newAmount . " WHERE I.ID_ITEM = '" . $cart[$i]['id'] . "' ";
                $this->db->query($query2);
            }
        }
    }

    public function insertItem()
    {
        $ctr = 1;
        $query = $this->db->query("select * from item");
        $newId = $this->input->post('name');

        $cekNewId = 'I' . substr(strtoupper($newId), 0, 1);
        foreach ($query->result_array() as $row) {
            $cekId = substr(strtoupper($row['id_item']), 0, 2);
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
        $foto = $this->input->post('foto');
        $foto = base64_decode($foto);
        $data = [
            "id_item" => $generateId,
            "id_merchant" => $this->input->post('id_merchant'),
            "id_game" =>  $this->input->post('id_game'),
            "nama_item" =>  $this->input->post('name'),
            "desc_item" =>  $this->input->post('desc'),
            "harga_item" =>  $this->input->post('price'),
            "tanggal_upload" =>  $tgl,
            "jumlah_item" =>  $this->input->post('stok'),
            "foto_item" => $foto
        ];
        $this->db->insert('item', $data);
    }

    public function removeItem()
    {
        $idI = $this->input->post('idItem');
        $query = "DELETE FROM ITEM WHERE ID_ITEM = '" . $idI . "' ";
        $this->db->query($query);
    }

    public function editItem()
    {
        $id = $this->input->post('id');
        $data = [
            "id_game" =>  $this->input->post('id_game'),
            "nama_item" =>  $this->input->post('name'),
            "desc_item" =>  $this->input->post('desc'),
            "harga_item" =>  $this->input->post('price'),
            "jumlah_item" =>  $this->input->post('stok')
        ];

        $this->db->where('id_item', $id);
        $this->db->update('item', $data);
    }


    public function getItem($limit, $start)
    {
        $this->db->select('*');
        $this->db->from('ITEM I');
        $this->db->join('MERCHANT M', 'M.ID_MERCHANT = I.ID_MERCHANT');
        $this->db->join('GAME G', ' G.ID_GAME = I.ID_GAME');
        $this->db->where('I.JUMLAH_ITEM >', 0);
        $this->db->limit($limit, $start);
        return  $this->db->get()->result_array();
    }

    public function countAllItem()
    {
        if (isset($_SESSION['id_game'])) {
            $idG = $this->session->userdata('id_game');
            $sql = "SELECT id_item
            FROM ITEM I
            WHERE ID_GAME = '" . $idG . "'";

            return $this->db->query($sql)->num_rows();
        } else {
            return $this->db->get('item')->num_rows();
        }
    }
}
