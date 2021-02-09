<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsultasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        checkAccess();
        $this->load->model('Konsultasi_model', 'model');
        $this->load->model('User_Diagnosa_model', 'd_model');
    }

    public function index()
    {
        delUserData();
        $data['judul'] = 'Konsultasi';
        $this->form_validation->set_rules('nama', 'Nama Pasien', 'trim|required');
        $this->form_validation->set_rules('umur', 'Umur', 'required|numeric');
        $this->form_validation->set_message('required', 'Nama & Umur harus diisi');
        $this->form_validation->set_message('numeric', 'Umur hanya boleh angka');
        if ($this->form_validation->run() == FALSE) {
            $data['error'] = array_keys($this->form_validation->error_array());
            renderAdmin('konsultasi/index', $data); //helper template view
        } else {
            $userdata['userdata'] = $this->input->post();
            $this->session->set_userdata($userdata);
            $this->diagnosa();
        }
    }

    public function diagnosa(){
        checkUserData('konsultasi/index');
        $data['judul'] = 'Konsultasi';
        $data['gejala'] = $this->model->getGejala();
        $data['kondisi'] = $this->model->getKondisi();
        renderAdmin('konsultasi/diagnosa', $data); //helper template view
    }

    public function hasil()
    {
        checkUserData('konsultasi/index');
        $data['judul'] = 'Konsultasi';
        $data['gejala'] = $this->model->getUserGejala();
        $data['hasil'] = $this->model->diagnosa();
        setFlash('success', 'Diagnosa Berhasil'); //helper alert
        renderAdmin('konsultasi/hasil', $data); //helper template view
    }

    public function simpan()
    {
        $this->model->simpan();
        setFlash('success', 'Riwayat telah disimpan'); //helper alert
        redirect('riwayat');
    }
}
