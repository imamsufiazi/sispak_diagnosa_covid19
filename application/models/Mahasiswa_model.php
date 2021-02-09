<?php

class Mahasiswa_model extends CI_model
{
    public function tambahData()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "nim" => $this->input->post('nim', true),
            "prodiId" => $this->input->post('prodi', true),
        ];
        $this->db->insert('pemweblan_t_mahasiswa', $data);
    }

    public function hapusData($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('pemweblan_t_mahasiswa');
    }

    public function ubahData($id)
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "prodiId" => $this->input->post('prodi', true),
        ];
        $this->db->where('id', $id);
        $this->db->update('pemweblan_t_mahasiswa', $data);
    }

    public function getAllMahasiswa()
    {
        $this->db->select('pemweblan_t_mahasiswa.*,pemweblan_m_prodi.prodiNama');
        $this->db->from('pemweblan_t_mahasiswa');
        $this->db->join('pemweblan_m_prodi', 'pemweblan_t_mahasiswa.prodiId=pemweblan_m_prodi.prodiId');
        $query = $this->db->get();
        return $query;
    }

    public function getMahasiswaById($id)
    {
        $this->db->select('pemweblan_t_mahasiswa.*,pemweblan_m_prodi.prodiNama');
        $this->db->from('pemweblan_t_mahasiswa');
        $this->db->join('pemweblan_m_prodi', 'pemweblan_t_mahasiswa.prodiId=pemweblan_m_prodi.prodiId');
        $this->db->where('id', $id);
        return $this->db->get();
    }

    public function getAllProdi()
    {
        return $this->db->get('pemweblan_m_prodi');
    }
}
