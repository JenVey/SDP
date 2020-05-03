<?php
class Gacha_model extends CI_model
{
    public function getAllGacha()
    {
        return $this->db->get('gacha')->result_array();
    }
}
