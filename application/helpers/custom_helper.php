<?php

function renderAdmin($view, $data = '')
{
    $ci = get_instance();
    $ci->load->view('templates/header', $data);
    $ci->load->view('templates/sidebar', $data);
    $ci->load->view('templates/topbar', $data);
    $ci->load->view($view, $data);
    $ci->load->view('templates/footer');
}

function renderUser($view, $data = '')
{
    $ci = get_instance();
    $ci->load->view('templates/header', $data);
    $ci->load->view('templates/user_topbar', $data);
    $ci->load->view($view, $data);
    $ci->load->view('templates/user_footer', $data);
}

function checkAccess()
{
    $ci = get_instance();
    if (!$ci->session->userdata('loginsession')) {
        redirect('auth/blocked');
    }
}

function checkUserData($route)
{
    $ci = get_instance();
    if (!$ci->session->userdata('userdata')) {
        redirect($route);
    }
}

function delUserData()
{
    $ci = get_instance();
    $ci->session->unset_userdata('userdata');
}
