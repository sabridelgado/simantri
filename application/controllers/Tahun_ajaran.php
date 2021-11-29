<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Tahun_ajaran extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_tahun_ajaran");
    $this->load->model("m_setting");
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }

  public function index()
  {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['tahun_ajaran'] = $this->m_tahun_ajaran->fetch_data();
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/tahun_ajaran/tahun_ajaran", $data);
    $this->load->view("attribute/footer", $setting);
  }

  public function input()
  {
    $data['tahun_ajaran_id']                = $this->input->post('tahun_ajaran_id');
    $data['tahun_ajaran_nama']            = $this->input->post('tahun_ajaran_nama');

    $this->session->set_flashdata('add', 'Berhasil Tambah tahun_ajaran <b>' . $data['tahun_ajaran_nama'] . '</b>');
    $this->m_tahun_ajaran->input($data);
    redirect('tahun_ajaran');
  }

  public function edit()
  {

    $data['tahun_ajaran_id']                  = $this->input->post('tahun_ajaran_id');
    $data['tahun_ajaran_nama']                = $this->input->post('tahun_ajaran_nama');

    $this->session->set_flashdata('update', 'Berhasil Update tahun_ajaran <b>' . $data['tahun_ajaran_nama'] . '</b>');
    $this->m_tahun_ajaran->edit($data);
    redirect('tahun_ajaran');
  }

  public function delete()
  {
    $this->session->set_flashdata('delete', 'tahun_ajaran <b>' . $this->input->post('tahun_ajaran_nama') . '</b> telah dihapus !');
    $this->m_tahun_ajaran->delete($this->input->post('tahun_ajaran_id'));

    redirect('tahun_ajaran');
  }
}
