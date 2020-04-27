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
        C.AMOUNT * I.HARGA_ITEM AS 'subtotal', M.ID_MERCHANT AS 'id_merchant', C.ID_ITEM AS 'id_item'
        FROM USER_CART C 
        JOIN ITEM I ON I.ID_ITEM = C.ID_ITEM
        JOIN MERCHANT M ON M.ID_MERCHANT = I.ID_MERCHANT
        WHERE C.ID_USER = '" . $id . "' ";
        $res = $this->db->query($query);
        return $res->result_array();
        //return $this->db->get_where('cart', ['id_user' => $id])->row_array();
    }

    public function addCart($idI)
    {
        $id = $this->session->userdata('id_user');
        $query = "INSERT INTO USER_CART(ID_USER,ID_ITEM,AMOUNT) VALUES('" . $id . "' , '" . $idI . "' , 1)";
        $this->db->query($query);
    }

    public function removeCart($idI)
    {
        $id = $this->session->userdata('id_user');
        $query = "DELETE FROM USER_CART WHERE ID_USER = '" . $id . "' AND ID_ITEM = '" . $idI . "' ";
        $this->db->query($query);
    }
}
