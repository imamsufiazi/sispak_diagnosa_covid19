<?php

class Home_model extends CI_model
{
    public function getDataGrafik()
    {
        $this->db->select('tanggal,COUNT(tanggal) AS total');
        $this->db->from('t_riwayat');
        $this->db->group_by("tanggal");
        return $this->db->get();
    }

    public function getDataGender(){
        $this->db->select('gender,COUNT(gender) AS total');
        $this->db->from('t_riwayat');
        $this->db->group_by("gender");
        return $this->db->get();
    }

    
}
