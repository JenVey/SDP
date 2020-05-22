<?php
class Merchant_model extends CI_model
{
    public function getAllMerchant()
    {
        //return $this->db->get('merchant')->result_array();

        $query = "select m.id_merchant as 'id', m.nama_merchant as 'nama',  round(sum(r.bintang)/count(r.bintang)) as 'rating' , m.foto_profil as 'foto', m.id_user as 'id_user'
        from merchant m 
        left join merchant_rating r on r.id_merchant = m.id_merchant
        group by m.id_merchant,m.nama_merchant,m.id_user";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function getMerchantById($id)
    {
        //return $this->db->get_where('merchant', ['id_merchant' => $id])->row_array();
        $query = "select m.id_merchant as 'id', m.nama_merchant as 'nama',  round(sum(r.bintang)/count(r.bintang)) as 'rating' , m.foto_profil as 'foto', m.bio as 'bio'
        from merchant m 
        left join merchant_rating r on r.id_merchant = m.id_merchant 
        where m.id_merchant = '" . $id . "'
        group by m.id_merchant,m.nama_merchant";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function getMerchantByIdUser($id)
    {
        $query = "select m.id_merchant as 'id', m.nama_merchant as 'nama',  round(sum(r.bintang)/count(r.bintang)) as 'rating' , m.foto_profil as 'foto', m.foto_profil as 'foto', m.bio as 'bio'
        from merchant m 
        join friend f on m.id_merchant = f.id_user2
        left join merchant_rating r on r.id_merchant = m.id_merchant
        where f.id_user1 = '" . $id . "' 
        group by m.id_merchant,m.nama_merchant";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function getMerchantUser($id)
    {
        $query = "select m.id_merchant as 'id', m.nama_merchant as 'nama',  round(sum(r.bintang)/count(r.bintang)) as 'rating' , m.foto_profil as 'foto', m.bio as 'bio'
        from merchant m 
        left join merchant_rating r on r.id_merchant = m.id_merchant
        where m.id_user = '" . $id . "' 
        group by m.id_merchant,m.nama_merchant";

        $res = $this->db->query($query);
        //print_r($res);
        return $res->result_array();
    }

    public function getMerchantBySearch($keyword)
    {
        $query = "select m.id_merchant as 'id', m.nama_merchant as 'nama',  round(sum(r.bintang)/count(r.bintang)) as 'rating' , m.foto_profil as 'foto'
        from merchant m 
        left join merchant_rating r on r.id_merchant = m.id_merchant 
        where m.nama_merchant like '%" . $keyword . "%' 
        group by m.id_merchant,m.nama_merchant
        order by case when m.nama_merchant like '" . $keyword . "%' then 0 else 1 end, m.nama_merchant";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function insertMerchant()
    {
        $id = $this->session->userdata('id_user');

        $ctr = 1;
        $query = $this->db->query("select * from merchant");
        $newId = $this->input->post('name');
        $foto = $this->input->post('foto');
        $foto = base64_decode($foto);

        $cekNewId = 'M' . substr(strtoupper($newId), 0, 1);
        foreach ($query->result_array() as $row) {
            $cekId = substr(strtoupper($row['id_merchant']), 0, 2);
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

        $data = [
            "id_merchant" => $generateId,
            "id_user" => $id,
            "nama_merchant" =>  $this->input->post('name'),
            "bio" =>  $this->input->post('desc'),
            "foto_profil" => $foto
        ];

        $this->db->insert('merchant', $data);
    }

    public function editMerchant()
    {
        $id = $this->input->post('id');
        $foto = $this->input->post('foto');

        $foto = base64_decode($foto);
        $data = [
            "nama_merchant" =>  $this->input->post('name'),
            "bio" =>  $this->input->post('desc'),
            "foto_profil" => $foto
        ];

        $this->db->where('id_merchant', $id);
        $this->db->update('merchant', $data);
    }
}
