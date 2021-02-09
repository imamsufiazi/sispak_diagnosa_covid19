<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model', 'model');
    }

    public function index()
    {
        $data['judul'] = 'Login';

        $this->form_validation->set_rules('pass', 'Password', 'trim|required|callback_cekPassword');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth/header', $data);
            $this->load->view('auth/index', $data);
            $this->load->view('auth/footer');
        } else {
            redirect('home');
        }
    }

    public function login($pass)
    {
        $username = $this->input->post('username', TRUE);
        $account = $this->model->account();
        foreach ($account as $key => $value) {
            if ($key === $username) {
                if ($pass === $value) {
                    $data = [
                        'loginsession' => $username
                    ];
                    $this->session->set_userdata($data);
                    return TRUE;
                } else {
                    return FALSE;
                }
            }
        }
    }

    public function cekPassword($password)
    {
        if ($this->login($password)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('cekPassword', 'Username atau Password salah');
            return FALSE;
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('loginsession');
        redirect();
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
