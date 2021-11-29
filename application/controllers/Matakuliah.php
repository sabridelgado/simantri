<?php
defined('BASEPATH') or exit('No direct script access allowed');
class matakuliah extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_matakuliah");
    $this->load->model("m_setting");
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }

  public function index()
  {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['matakuliah'] = $this->m_matakuliah->fetch_data();
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/matakuliah/matakuliah", $data);
    $this->load->view("attribute/footer", $setting);
  }

  public function input()
  {

    $data['matakuliah_id']            = $this->input->post('matakuliah_id');
    $data['matakuliah_nama']            = $this->input->post('matakuliah_nama');
    $data['matakuliah_sks']            = $this->input->post('matakuliah_sks');
    $data['matakuliah_semester']            = $this->input->post('matakuliah_semester');
    $this->session->set_flashdata('add', 'Berhasil Tambah matakuliah <b>' . $data['matakuliah_nama'] . '</b>');
    $this->m_matakuliah->input($data);



    redirect('matakuliah');
  }

  public function edit()
  {
    $data['matakuliah_id']                = $this->input->post('matakuliah_id');
    $data['matakuliah_nama']            = $this->input->post('matakuliah_nama');
    $data['matakuliah_sks']            = $this->input->post('matakuliah_sks');
    $data['matakuliah_semester']            = $this->input->post('matakuliah_semester');
    $this->session->set_flashdata('add', 'Berhasil Tambah matakuliah <b>' . $data['matakuliah_nama'] . '</b>');
    $this->m_matakuliah->edit($data);


    redirect('matakuliah');
  }

  public function delete()
  {
    $this->session->set_flashdata('delete', 'matakuliah <b>' . $this->input->post('matakuliah_nama') . '</b> telah dihapus !');
    $this->m_matakuliah->delete($this->input->post('matakuliah_id'));


    redirect('matakuliah');
  }
}
