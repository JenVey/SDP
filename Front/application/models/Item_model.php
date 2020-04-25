<?php
class Item_model extends CI_model
{
    public function getAllItem()
    {
        return $this->db->get('item')->result_array();
    }

    public function getAllItemOrder()
    {
        $query = "SELECT * FROM ITEM I 
        JOIN MERCHANT M ON M.ID_MERCHANT = I.ID_MERCHANT 
        JOIN GAME G ON G.ID_GAME = I.ID_GAME";
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
        ORDER BY I.TANGGAL_UPLOAD DESC";
        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function getItemByIdGame($id)
    {
        $query = "SELECT * FROM ITEM I 
        JOIN MERCHANT M ON M.ID_MERCHANT = I.ID_MERCHANT 
        JOIN GAME G ON G.ID_GAME = I.ID_GAME 
        WHERE I.ID_GAME= '" . $id . "' ORDER BY I.TANGGAL_UPLOAD DESC";
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
}
