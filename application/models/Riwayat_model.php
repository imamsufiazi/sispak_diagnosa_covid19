<?php

class Riwayat_model extends CI_model
{
    public function getRiwayat($id = '')
    {
        $this->db->from('t_riwayat');
        if ($id) {
            $this->db->where('id', $id);
        } 
        return $this->db->get();
    }

    public function hapusRiwayat($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('t_riwayat');
    }
}
