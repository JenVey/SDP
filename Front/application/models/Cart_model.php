<?php
class Cart_model extends CI_model
{
    public function getAllCart()
    {
        return $this->db->get('user_cart')->result_array();
    }
    public function getCartByIdUser($id)
    {
        $query = "select i.nama_item as 'nama_item', m.nama_merchant as 'nama_merchant', 
        round(i.harga_item) as 'harga', i.foto_item as 'foto',i.desc_item as 'deskripsi',c.amount as 'jumlah', 
        c.amount * i.harga_item as 'subtotal', m.id_merchant as 'id_merchant', c.id_item as 'id_item', i.jumlah_item as 'stok'
        from user_cart c 
        join item i on i.id_item = c.id_item
        join merchant m on m.id_merchant = i.id_merchant
        where c.id_user = '" . $id . "' 
        and c.status = 1 ";
        $res = $this->db->query($query);
        return $res->result_array();
        //return $this->db->get_where('cart', ['id_user' => $id])->row_array();
    }

    public function addCart($idI)
    {
        $ada = false;
        $id = $this->session->userdata('id_user');
        $cekQuery = $this->db->query("select * from user_cart");
        $amount = 1;

        foreach ($cekQuery->result_array() as $row) {
            if ($id == $row['id_user'] && $idI == $row['id_item'] && $row['status'] == 0) {
                $ada = true;
                $amount = $row['amount'];
            }
        }

        if ($ada) {
            $amount++;
            $query = "update user_cart set amount = $amount where id_user = '" . $id . "' and id_item = '" . $idI . "' ";
            $this->db->query($query);
        } else {
            $query = "insert into user_cart(id_user,id_item,amount,status) values('" . $id . "' , '" . $idI . "' , $amount , 0)";
            $this->db->query($query);
        }
    }

    public function updateCart($idI)
    {
        $id = $this->session->userdata('id_user');
        $cekQuery = $this->db->query("select * from user_cart");
        $amount = 0;

        $query = "update user_cart 
        set amount = $amount
        where id_user = '" . $id . "' 
        and id_item = '" . $idI . "' 
        and status = 1";
        $this->db->query($query);
    }

    public function updateStatus1()
    {
        $id = $this->session->userdata('id_user');
        $cekQuery = $this->db->query("select * from user_cart");

        //BUKA CART
        foreach ($cekQuery->result_array() as $row) {
            $query = "update user_cart set status = 1 
            where id_user = '" . $row['id_user'] . "' 
            and id_item = '" .  $row['id_item'] . "' 
            and status = 0 ";
            $this->db->query($query);
        }
    }

    public function removeCart($idI)
    {
        $id = $this->session->userdata('id_user');
        $query = "delete from user_cart where id_user = '" . $id . "' and id_item = '" . $idI . "' ";
        $this->db->query($query);
    }

    public function updateStatus2($idI)
    {
        //SUDAH DIBELI ENTAH ITU SUDAH DI BAYAR ATAU BELUM (JIKA TRANSFER)
        //JIKA BLM BAYAR TIDAK AKAN KURANGAI DI AMOUNT ITEM

        $id = $this->session->userdata('id_user');

        $query = "update user_cart set status = 2 
        where id_user = '" . $id . "' 
        and id_item = '" .  $idI . "' 
        and status = 1";

        $this->db->query($query);
    }

    public function updateAmount($amount, $idI)
    {
        $id = $this->session->userdata('id_user');
        $query = "update user_cart 
        set amount = $amount 
        where id_user = '" . $id . "' 
        and id_item = '" . $idI . "' 
        and status = 1";

        $this->db->query($query);
    }
}
