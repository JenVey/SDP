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

        $foto = base64_decode("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");

        $cekFoto = $this->input->post('photoChannel');
        if ($cekFoto != "") {
            $foto = $cekFoto;
            $foto = base64_decode($foto);
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
        $this->db->delete('channel_user');

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
