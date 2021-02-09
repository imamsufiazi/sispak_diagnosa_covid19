<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        checkAccess();
        $this->load->model('Home_model', 'model');
    }

    public function index()
    {
        $data['judul'] = 'Home';
        $data['gender'] = $this->model->getDataGender()->result();
        renderAdmin('home/index', $data); //helper template view
    }

    public function getGrafik()
    {
        echo json_encode($this->model->getDataGrafik()->result());
    }
}
