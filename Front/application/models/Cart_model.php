<?php
class Cart_model extends CI_model
{
    public function getAllCart()
    {
        return $this->db->get('user_cart')->result_array();
    }
    public function getCartByIdUser($id)
    {
        $query = "SELECT I.NAMA_ITEM AS 'nama_item', M.NAMA_MERCHANT AS 'nama_merchant', 
        ROUND(I.HARGA_ITEM) AS 'harga', I.FOTO_ITEM AS 'foto',I.DESC_ITEM AS 'deskripsi',C.AMOUNT AS 'jumlah', 
        C.AMOUNT * I.HARGA_ITEM AS 'subtotal', M.ID_MERCHANT AS 'id_merchant', C.ID_ITEM AS 'id_item', I.JUMLAH_ITEM AS 'stok'
        FROM USER_CART C 
        JOIN ITEM I ON I.ID_ITEM = C.ID_ITEM
        JOIN MERCHANT M ON M.ID_MERCHANT = I.ID_MERCHANT
        WHERE C.ID_USER = '" . $id . "' 
        AND C.STATUS = 1 ";
        $res = $this->db->query($query);
        return $res->result_array();
        //return $this->db->get_where('cart', ['id_user' => $id])->row_array();
    }

    public function addCart($idI)
    {
        $ada = false;
        $id = $this->session->userdata('id_user');
        $cekQuery = $this->db->query("select * from USER_CART");
        $amount = 1;

        foreach ($cekQuery->result_array() as $row) {
            if ($id == $row['id_user'] && $idI == $row['id_item'] && $row['status'] == 1) {
                $ada = true;
                $amount = $row['amount'];
            }
        }

        if ($ada) {
            $amount++;
            $query = "UPDATE USER_CART SET AMOUNT = $amount WHERE ID_USER = '" . $id . "' AND ID_ITEM = '" . $idI . "' ";
            $this->db->query($query);
        } else {
            $query = "INSERT INTO USER_CART(ID_USER,ID_ITEM,AMOUNT,STATUS) VALUES('" . $id . "' , '" . $idI . "' , $amount , 0)";
            $this->db->query($query);
        }
    }

    public function updateCart($idI)
    {
        $id = $this->session->userdata('id_user');
        $cekQuery = $this->db->query("select * from USER_CART");
        $amount = 0;

        $query = "UPDATE USER_CART 
        SET AMOUNT = $amount
        WHERE ID_USER = '" . $id . "' 
        AND ID_ITEM = '" . $idI . "' 
        AND STATUS = 1";
        $this->db->query($query);
    }

    public function updateStatus1()
    {
        $id = $this->session->userdata('id_user');
        $cekQuery = $this->db->query("select * from USER_CART");

        //BUKA CART
        foreach ($cekQuery->result_array() as $row) {
            $query = "UPDATE USER_CART SET STATUS = 1 
            WHERE ID_USER = '" . $row['id_user'] . "' 
            AND ID_ITEM = '" .  $row['id_item'] . "' 
            AND STATUS = 0 ";
            $this->db->query($query);
        }
    }

    public function removeCart($idI)
    {
        $id = $this->session->userdata('id_user');
        $query = "DELETE FROM USER_CART WHERE ID_USER = '" . $id . "' AND ID_ITEM = '" . $idI . "' ";
        $this->db->query($query);
    }

    public function updateStatus2($idI)
    {
        //YANG JADI DIBELI
        $id = $this->session->userdata('id_user');

        $query = "UPDATE USER_CART SET STATUS = 2 
        WHERE ID_USER = '" . $id . "' 
        AND ID_ITEM = '" .  $idI . "' 
        AND STATUS = 1";

        $this->db->query($query);
    }

    public function updateAmount($amount, $idI)
    {
        $id = $this->session->userdata('id_user');
        $query = "UPDATE USER_CART 
        SET AMOUNT = $amount 
        WHERE ID_USER = '" . $id . "' 
        AND ID_ITEM = '" . $idI . "' 
        AND STATUS = 1";

        $this->db->query($query);
    }
}
