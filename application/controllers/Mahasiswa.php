<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // checkAccess(); //helper user access menu
        if ($this->_cek_akses()) {
            redirect('auth/blocked');
            exit;
        }
        $this->load->model('Mahasiswa_model', 'model');
    }

    public function index()
    {
        $data['judul'] = 'Mahasiswa';
        $data["mahasiswa"] = $this->model->getAllMahasiswa()->result();
        renderAdmin('mahasiswa/index', $data); //helper template view
    }

    function tambahData()
    {
        if ($this->_cek_akses()) {
            redirect('auth/blocked');
            exit;
        }
        $data['judul'] = 'Mahasiswa';
        $data["prodi"] = $this->arr_prodi();
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nim', 'NIM', 'required|trim|numeric|is_unique[pemweblan_t_mahasiswa.nim]');
        $this->form_validation->set_rules('prodi', 'Program Studi', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            renderAdmin('mahasiswa/tambah', $data); //helper template view
        } else {
            $this->model->tambahData();
            setFlash('success', 'Data telah ditambhakan'); //helper alert
            redirect('mahasiswa');
        }
    }

    function edit($id)
    {
        if ($this->_cek_akses()) {
            redirect('auth/blocked');
            exit;
        }
        $data['judul'] = 'Mahasiswa';
        $data["prodi"] = $this->arr_prodi();
        $data["mahasiswa"] = $this->model->getMahasiswaById($id)->row();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('prodi', 'Program Studi', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            renderAdmin('mahasiswa/edit', $data); //helper template view
        } else {
            $this->model->ubahData($id);
            setFlash('success', 'Data telah diubah'); //helper alert
            redirect('mahasiswa');
        }
    }

    public function hapus($id)
    {
        if ($this->_cek_akses()) {
            redirect('auth/blocked');
        } else {
            $this->model->hapusData($id);
            setFlash('success', 'Data telah dihapus'); //helper alert
            $message = 'access';
        }
        echo $message;
    }

    function arr_prodi()
    {
        if ($this->_cek_akses()) {
            redirect('auth/blocked');
            exit;
        }
        $data = $this->model->getAllProdi()->result();
        $list_prodi[''] = '-- Pilih Program Studi';
        foreach ($data as $prodi) {
            $list_prodi[$prodi->prodiId] = $prodi->prodiNama;
        }
        return $list_prodi;
    }

    private function _cek_akses()
    {
        if (!$this->session->userdata('username')) {
            return TRUE;
        }
    }
}
