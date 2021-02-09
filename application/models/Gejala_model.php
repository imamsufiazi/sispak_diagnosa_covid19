<?php

class Gejala_model extends CI_model
{
    public function getGejala($id = '')
    {
        $this->db->select('*');
        $this->db->from('t_gejala');
        if ($id) {
            $this->db->where('id', $id);
        }
        return $this->db->get();
    }

    public function getLastGejala()
    {
        $this->db->select('*');
        $this->db->from('t_gejala');
        $this->db->limit(1);
        $this->db->order_by('id', "DESC");
        $query = $this->db->get();
        return $query;
    }

    public function tambahGejala()
    {
        $data = [
            "kode" => $this->input->post('kode-gejala', true),
            "gejala" => $this->input->post('gejala', true),
            "nilai" => $this->input->post('nilai', true)
        ];
        $this->db->insert('t_gejala', $data);
    }
    public function hapusGejala($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('t_gejala');
    }

    public function editGejala($id)
    {
        $data = [
            "gejala" => $this->input->post('gejala', true),
            "nilai" => $this->input->post('nilai', true)
        ];
        $this->db->where('id', $id);
        $this->db->update('t_gejala', $data);
    }
}
