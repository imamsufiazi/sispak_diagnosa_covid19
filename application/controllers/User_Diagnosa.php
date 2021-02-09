<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Diagnosa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_Diagnosa_model','model');
    }

    public function index(){
        delUserData();
        $data['judul'] = 'Diagnosa COVID-19';
        renderUser('user_diagnosa/index',$data);
    }

    public function biodata(){
        delUserData();
        $data['judul'] = 'Diagnosa COVID-19';
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('umur', 'Umur', 'required|numeric');
        $this->form_validation->set_message('required', 'Nama & Umur harus diisi');
        $this->form_validation->set_message('numeric', 'Umur hanya boleh angka');
        if ($this->form_validation->run() == false) {
            $data['error'] = array_keys($this->form_validation->error_array());
            renderUser('user_diagnosa/biodata',$data);
        } else {
            $userdata['userdata'] = $this->input->post();
            $this->session->set_userdata($userdata);
            redirect('user_diagnosa/diagnosa');
        }
    }

    public function diagnosa(){
        checkUserData('user_diagnosa');
        $data['judul'] = 'Diagnosa COVID-19';
        $data['gejala'] = $this->model->getGejala();
        $data['kondisi'] = $this->model->getKondisi();
        renderUser('user_diagnosa/diagnosa',$data);
    }

    public function hasil(){
        checkUserData('user_diagnosa');
        $data['judul'] = 'Diagnosa COVID-19';
        $data['hasil'] = $this->model->diagnosa();
        setFlash('success', 'Diagnosa Berhasil');
        renderUser('user_diagnosa/hasil',$data);
        // echo "<pre>";
        //     print_r($hasil);
        // echo "</pre>";
    }
}