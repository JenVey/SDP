<?php
class Channel_model extends CI_model
{
    public function getAllChannel()
    {
        return $this->db->get('channel')->result_array();
    }

    public function getChannelById()
    {
        $id = $this->session->userdata('idChannel');
        return $this->db->get_where('channel', ['id_channel' => $id])->row_array();
    }

    public function getAllChannelByIdUser()
    {
        $id = $this->session->userdata('id_user');
        $query = "select c.id_channel as 'id_channel', c.nama_channel as 'nama_channel' , c.foto_channel as 'foto_channel'
        from channel c 
        left join channel_user cu on cu.id_channel = c.id_channel 
        where cu.id_user= '" . $id . "' ";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function searchChannel()
    {
        $id = $this->session->userdata('id_user');
        $keyword = $this->input->post('keyword');

        $query = "select c.id_channel as 'id_channel', c.nama_channel as 'nama_channel' , c.foto_channel as 'foto_channel'
        from channel c 
        left join channel_user cu on cu.id_channel = c.id_channel 
        where cu.id_user= '" . $id . "' 
        and c.nama_channel like '%" . $keyword . "%' ";

        $res = $this->db->query($query);
        return $res->result_array();
    }

    public function insertChannel()
    {
        $ctr = 1;
        $query = $this->db->query("select * from channel");
        $newId = $this->input->post('nama_channel');
        $cekNewId = 'C' . substr(strtoupper($newId), 0, 1);
        foreach ($query->result_array() as $row) {
            $cekId = substr(strtoupper($row['id_channel']), 0, 2);
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


        $foto = $this->input->post('foto');
        $foto = base64_decode($foto);

        $data = [
            "id_channel" => $generateId,
            "nama_channel" => $this->input->post('nama_channel'),
            "foto_channel" => $foto
        ];
        $this->db->insert('channel', $data);

        $this->session->set_userdata(array('newChannel' => $generateId));
        $this->session->set_userdata(array('idChannel' => $generateId));
    }

    public function editChannel()
    {
        $id = $this->input->post('id_channel');
        $foto = $this->input->post('foto');
        $foto = base64_decode($foto);

        $data = [
            "nama_channel" => $this->input->post('nama_channel'),
            "foto_channel" => $foto
        ];

        $this->db->where('id_channel', $id);
        $this->db->update('channel', $data);
    }

    public function cekChannel()
    {
        $idChannel =  $this->input->post('idChannel');
        $ada = false;
        $query = $this->db->query("select * from channel");
        foreach ($query->result_array() as $row) {
            if ($idChannel == $row['id_channel']) {
                $ada = true;
            }
        }

        if ($ada) {
            $this->ChannelUser_model->insertChannelUser();
            echo true;
        } else {
            echo false;
        }
    }
}
