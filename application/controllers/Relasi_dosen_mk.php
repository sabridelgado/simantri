<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Relasi_dosen_mk extends CI_Controller {
  function __construct() {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_relasi_dosen_mk");
    $this->load->model("m_dosen");
    $this->load->model("m_matakuliah");
    $this->load->model("m_user");
    $this->load->model("m_setting");
    $this->load->model("m_laporan");
    $this->load->library('upload');
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }
  
  public function index() {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['relasi_dosen_mk'] = $this->m_relasi_dosen_mk->fetch_data();
    $data['matakuliah'] = $this->m_matakuliah->fetch_data();
    $data['dosen'] = $this->m_dosen->fetch_data();
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/dosen/relasi_dosen_mk", $data);
    $this->load->view("attribute/footer", $setting);
  }

  public function input() {
    // $data['relasi_dosen_mk_id']                  = "US".date('YmdHis');
    $data['dosen_id']              = $this->input->post('dosen_id');
    $data['matakuliah_id']            = $this->input->post('matakuliah_id');
    $this->m_relasi_dosen_mk->input($data);

    $this->session->set_flashdata('add', 'Berhasil Tambah relasi dosen mk <b>'.'</b>');
    redirect('relasi_dosen_mk');
  }
  
  public function edit() {
    
    $data['relasi_dosen_mk_id']              = $this->input->post('relasi_dosen_mk_id');
    $data['dosen_id']              = $this->input->post('dosen_id');
    $data['matakuliah_id']            = $this->input->post('matakuliah_id');
    $this->session->set_flashdata('update', 'Berhasil Update relasi_dosen_mk <b>' .'</b>');
    $this->m_relasi_dosen_mk->edit($data);


    redirect('relasi_dosen_mk');
  }
  
  public function delete() {
    $this->session->set_flashdata('delete', 'relasi_dosen_mk <b>'.'</b> telah dihapus !');
    $this->m_relasi_dosen_mk->delete($this->input->post('relasi_dosen_mk_id'));

    redirect('relasi_dosen_mk');
  }

  
  
  

  
}
?>
