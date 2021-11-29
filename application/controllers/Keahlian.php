<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Keahlian extends CI_Controller {
  function __construct() {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_keahlian");
    $this->load->model("m_setting");
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }
  
  public function index() {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['keahlian'] = $this->m_keahlian->fetch_data();
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/keahlian/keahlian", $data);
    $this->load->view("attribute/footer", $setting);
  }

  public function input() {
    $data['keahlian_id']                = $this->input->post('keahlian_id');
    $data['keahlian_nama']            = $this->input->post('keahlian_nama');
    $this->session->set_flashdata('add', 'Berhasil Tambah keahlian <b>' . $data['keahlian_nama'].'</b>');
    $this->m_keahlian->input($data);
    redirect('keahlian');
  }
  
  public function edit() {
    
    $data['keahlian_id']                  = $this->input->post('keahlian_id');
    $data['keahlian_nama']                = $this->input->post('keahlian_nama');
    
    $this->session->set_flashdata('update', 'Berhasil Update keahlian <b>' . $data['keahlian_nama'].'</b>');
    $this->m_keahlian->edit($data);
    redirect('keahlian');
  }
  
  public function delete() {
    $this->session->set_flashdata('delete', 'keahlian <b>'.$this->input->post('keahlian_nama').'</b> telah dihapus !');
    $this->m_keahlian->delete($this->input->post('keahlian_id'));

    redirect('keahlian');
  }
  
}
?>
