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

    public function getItemByIdGame($id)
    {
        $query = "SELECT * FROM ITEM I 
        JOIN MERCHANT M ON M.ID_MERCHANT = I.ID_MERCHANT 
        JOIN GAME G ON G.ID_GAME = I.ID_GAME 
        WHERE I.ID_GAME= '" . $id . "' 
        AND I.JUMLAH_ITEM > 0
        ORDER BY I.TANGGAL_UPLOAD DESC";
        $res = $this->db->query($query);
        return $res->result_array();
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
        $cekQuery =  $this->db->query("SELECT * FROM USER_CART WHERE STATUS = 2 ");
        foreach ($cekQuery->result_array() as $row) {

            $amount = $row['amount'];
            var_dump($row['id_item']);
            $query = $this->db->query("SELECT * FROM ITEM I  WHERE I.ID_ITEM = '" . $row['id_item'] . "' ");
            foreach ($query->result_array() as $row2) {
                $amountItem = $row2['jumlah_item'];
            }

            $newAmount = $amountItem - $amount;
            $query2 = "UPDATE ITEM I SET JUMLAH_ITEM = " . $newAmount . " WHERE I.ID_ITEM = '" . $row['id_item'] . "' ";
            $this->db->query($query2);

            $query3 = "UPDATE USER_CART SET STATUS = 3 WHERE ID_USER = '" . $row['id_user'] . "' AND ID_ITEM = '" . $row['id_item'] . "' ";
            $this->db->query($query3);
        }
    }
}
