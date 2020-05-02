<?php
class Channel_model extends CI_model
{

    public function getAllChannel()
    {
        return $this->db->get('channel')->result_array();
    }

    public function insertChannel()
    {
        //GENERATE ID
        $ctr = 1;
        $query = $this->db->query("select * from channel");
        $newId = $this->input->post('nameChannel');
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


        $foto = $this->input->post('photoChannel');
        if ($foto == '') {
            $foto = 'default.jpg';
        }

        $data = [
            "id_channel" => $generateId,
            "nama_channel" => $this->input->post('nameChannel'),
            "foto_channel" => $foto
        ];
        $this->db->insert('channel', $data);
    }

    public function deleteChannel($id)
    {
        $this->db->where('id_channel', $id);
        $this->db->delete('channel');
    }

    public function getChannelById($id)
    {
        return $this->db->get_where('channel', ['id_channel' => $id])->row_array();
    }

    public function editChannel($id)
    {

        $foto = $this->input->post('photoChannel');
        if ($foto == '') {
            $foto = 'default.jpg';
        }

        $data = [
            "nama_channel" => $this->input->post('nameChannel'),
            "foto_channel" => $foto
        ];

        $this->db->where('id_channel', $id);
        $this->db->update('channel', $data);
    }
}
