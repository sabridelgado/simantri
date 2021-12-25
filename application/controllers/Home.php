<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Home extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_login");
    $this->load->model("m_widget");
    $this->load->model("m_setting");
  }

  public function index()
  {
    if (!($this->session->userdata('user_id'))) {
      $data['settings_app']   = $this->m_setting->fetch_setting();
      $this->load->view("admin/login/auth", $data);
    } else {

      //====================================================

      $data['hitung'] = $this->m_widget->get_hasil();
      $data['parameter'] = $this->m_widget->get_parameter();
      $setting['settings_app'] = $this->m_setting->fetch_setting();
      $data['group']          = $this->m_widget->total_group();
      $data['user']           = $this->m_widget->total_user();
      $data['nasabah']           = $this->m_widget->total_nasabah();
      //===================================================


      $this->load->view("attribute/header", $setting);
      $this->load->view("attribute/menus", $setting);
      $this->load->view("attribute/content", $data);
      $this->load->view("attribute/footer", $setting);
    }
  }

  public function login()
  {
    if ($_POST) {
      $data['username'] = $this->input->post('username');
      $data['password'] = md5($this->input->post('password'));
      $result           = $this->m_login->login($data);
      if (!!($result)) {
        $data = array(
          'user_id'         => $result->user_id,
          'user_name'       => $result->user_name,
          'user_fullname'   => $result->user_fullname,
          'user_photo'      => $result->user_photo,
          'user_address'    => $result->user_address,
          'nomor_induk'  => $result->nomor_induk,
          'user_sector'     => $result->user_sector,
          'group_id'        => $result->group_id,
          'IsAuthorized'    => true
        );

        $this->session->set_userdata($data);
        redirect('home');
      } else {
        $this->session->set_flashdata('login', 'Username atau Kata Sandi salah!');
        redirect('home');
      }
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('' . base_url());
  }
}
