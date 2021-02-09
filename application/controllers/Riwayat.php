<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        checkAccess();
        $this->load->model('Riwayat_model', 'model');
    }

    public function index()
    {
        $data['judul'] = 'Riwayat';
        $data['riwayat'] = $this->model->getRiwayat()->result();
        renderAdmin('riwayat/index', $data); //helper template view
    }

    public function hapus($id)
    {
        $this->model->hapusRiwayat($id);
        setFlash('success', 'Riwayat telah dihapus'); //helper alert
        $message = 'deleted';
        echo json_encode($message);
    }
}
