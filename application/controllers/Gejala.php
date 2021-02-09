<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gejala extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        checkAccess();
        $this->load->model('Gejala_model', 'model');
    }

    public function index()
    {
        $data['judul'] = 'Gejala';
        $data['gejala'] = $this->model->getGejala()->result();
        renderAdmin('gejala/index', $data); //helper template view
    }

    public function tambahGejala()
    {
        $data['judul'] = 'Gejala';
        $data['idGejala'] = $this->generateIdGejala();
        $this->form_validation->set_rules('kode-gejala', 'Kode Gejala', 'required|trim');
        $this->form_validation->set_rules('gejala', 'Nama Gejala', 'required|trim');
        $this->form_validation->set_rules('nilai', 'Nilai CF', 'required|trim|numeric|less_than_equal_to[1]');
        if ($this->form_validation->run() == FALSE) {
            renderAdmin('gejala/tambah_gejala', $data); //helper template view
        } else {
            $this->model->tambahGejala();
            setFlash('success', 'Gejala telah ditambhakan'); //helper alert
            redirect('gejala');
        }
    }

    public function hapus($id)
    {
        $this->model->hapusGejala($id);
        setFlash('success', 'Gejala telah dihapus'); //helper alert
        $message = 'deleted';
        echo json_encode($message);
    }

    function edit($id)
    {
        $data['judul'] = 'Gejala';
        $data['gejala'] = $this->model->getGejala($id)->row();
        $this->form_validation->set_rules('kode-gejala', 'Kode Gejala', 'required|trim');
        $this->form_validation->set_rules('gejala', 'Nama Gejala', 'required|trim');
        $this->form_validation->set_rules('nilai', 'Nilai CF', 'required|trim|numeric|less_than_equal_to[1]');
        if ($this->form_validation->run() == FALSE) {
            renderAdmin('gejala/edit_gejala', $data); //helper template view
        } else {
            $this->model->editGejala($id);
            setFlash('success', 'Gejala telah diedit'); //helper alert
            redirect('gejala');
        }
    }

    public function generateIdGejala()
    {
        $idGejala = $this->model->getLastGejala()->row();
        if ((int) $idGejala->id + 1 < 100) {
            $zero = '0';
        } else {
            $zero = '';
        }
        $id = 'G' . $zero . strval((int) $idGejala->id + 1);
        return $id;
    }
}
