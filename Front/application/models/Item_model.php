<?php
class Item_model extends CI_model
{

    public function getAllItem()
    {
        $query = "select * from item i 
        join merchant m on m.id_merchant = i.id_merchant 
        join game g on g.id_game = i.id_game
        and i.jumlah_item > 0 ";
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
        $query = "select * from item i 
        join merchant m on m.id_merchant = i.id_merchant 
        join game g on g.id_game = i.id_game 
        where m.id_merchant= '" . $id . "' 
        and i.jumlah_item > 0
        order by i.tanggal_upload desc";
        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function getItemByIdUser($id)
    {
        $query = "select * from item i 
        join merchant m on m.id_merchant = i.id_merchant 
        join game g on g.id_game = i.id_game 
        where m.id_user= '" . $id . "' 
        and i.jumlah_item > 0
        order by i.tanggal_upload desc";
        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function getItemByIdGame($limit, $start)
    {
        $idG = $this->session->userdata('id_game');

        $this->db->select('*');
        $this->db->from('item i');
        $this->db->join('merchant m', 'm.id_merchant = i.id_merchant');
        $this->db->join('game g', ' g.id_game = i.id_game');
        $this->db->where('i.id_game', $idG);
        $this->db->where('i.jumlah_item >', 0);
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
            $query = "select * from item i 
            join merchant m on m.id_merchant = i.id_merchant 
            join game g on g.id_game = i.id_game 
            where i.nama_item like '%" . $keyword . "%' 
            and i.jumlah_item > 0
            order by case when i.nama_item like '" . $keyword . "%' then 0 else 1 end ";

            if ($_SESSION['filter'] == "newest") {
                $query = $query . ", i.tanggal_upload desc";
            } else if ($_SESSION['filter'] == "oldest") {
                $query = $query . ", i.tanggal_upload asc";
            } else if ($_SESSION['filter'] == "cheapest") {
                $query = $query . ", i.harga_item asc";
            } else {
                $query = $query . ", i.harga_item desc";
            }
        } else {
            $query = "select * from item i 
            join merchant m on m.id_merchant = i.id_merchant 
            join game g on g.id_game = i.id_game 
            where i.nama_item like '%" . $keyword . "%' 
            order by case when i.nama_item like '" . $keyword . "%' then 0 else 1 end, i.nama_item";
        }

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function getItemBySearchM($keyword)
    {
        $idM = $_SESSION['id_merchant'];
        if (isset($_SESSION['filter'])) {
            $query = "select * from item i 
            join merchant m on m.id_merchant = i.id_merchant 
            join game g on g.id_game = i.id_game 
            where i.nama_item like '%" . $keyword . "%' 
            and m.id_merchant = '" . $idM . "'
            and i.jumlah_item > 0
            order by case when i.nama_item like '" . $keyword . "%' then 0 else 1 end ";

            if ($_SESSION['filter'] == "newest") {
                $query = $query . ", i.tanggal_upload desc";
            } else if ($_SESSION['filter'] == "oldest") {
                $query = $query . ", i.tanggal_upload asc";
            } else if ($_SESSION['filter'] == "cheapest") {
                $query = $query . ", i.harga_item asc";
            } else {
                $query = $query . ", i.harga_item desc";
            }
        } else {
            $query = "select * from item i 
            join merchant m on m.id_merchant = i.id_merchant 
            join game g on g.id_game = i.id_game 
            where i.nama_item like '%" . $keyword . "%' 
            and m.id_merchant = '" . $idM . "'
            order by case when i.nama_item like '" . $keyword . "%' then 0 else 1 end, i.nama_item";
        }

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function updateAmount()
    {

        if (isset($_SESSION['idTransaksi'])) {
            $idTrans = $this->session->userdata('idTransaksi');
            $cekQuery =  $this->db->query("select * from transaksi_item where id_transaksi = '" . $idTrans . "' ");

            foreach ($cekQuery->result_array() as $row) {
                $amount = $row['jumlah'];
                var_dump($row['id_item']);
                $query = $this->db->query("select * from item i  where i.id_item = '" . $row['id_item'] . "' ");
                foreach ($query->result_array() as $row2) {
                    $amountItem = $row2['jumlah_item'];
                }

                $newAmount = $amountItem - $amount;
                $query2 = "update item i set jumlah_item = " . $newAmount . " where i.id_item = '" . $row['id_item'] . "' ";
                $this->db->query($query2);
            }
        } else {
            $cart = $this->input->post('cart');
            $cart = json_decode($cart, true);

            for ($i = 0; $i < count($cart); $i++) {
                $amount = $cart[$i]['quantity'];
                //var_dump($row['id_item']);
                $query = $this->db->query("select * from item i  where i.id_item = '" . $cart[$i]['id'] . "' ");

                foreach ($query->result_array() as $row2) {
                    $amountItem = $row2['jumlah_item'];
                }

                $newAmount = $amountItem - $amount;
                $query2 = "update item i set jumlah_item = " . $newAmount . " where i.id_item = '" . $cart[$i]['id'] . "' ";
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
        $harga = $this->input->post('price');

        //BIAYA ADMIN
        $admin = 1000;
        $harga += $admin;

        $data = [
            "id_item" => $generateId,
            "id_merchant" => $this->input->post('id_merchant'),
            "id_game" =>  $this->input->post('id_game'),
            "nama_item" =>  $this->input->post('name'),
            "desc_item" =>  $this->input->post('desc'),
            "harga_item" =>  $harga,
            "tanggal_upload" =>  $tgl,
            "jumlah_item" =>  $this->input->post('stok'),
            "foto_item" => $foto
        ];
        $this->db->insert('item', $data);
    }

    public function removeItem()
    {
        $idI = $this->input->post('idItem');
        $query = "delete from item where id_item = '" . $idI . "' ";
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
        $this->db->from('item i');
        $this->db->join('merchant m', 'm.id_merchant = i.id_merchant');
        $this->db->join('game g', ' g.id_game = i.id_game');
        $this->db->where('i.jumlah_item >', 0);
        $this->db->limit($limit, $start);
        return  $this->db->get()->result_array();
    }

    public function countAllItem()
    {
        if (isset($_SESSION['id_game'])) {
            $idG = $this->session->userdata('id_game');
            $sql = "SELECT id_item
            FROM item i
            where id_game = '" . $idG . "'";

            return $this->db->query($sql)->num_rows();
        } else {
            return $this->db->get('item')->num_rows();
        }
    }
}
