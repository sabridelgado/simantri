<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kriteria extends CI_Controller {
  function __construct() {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_kriteria");
    $this->load->model("m_setting");
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }
  
  public function index() {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['kriteria'] = $this->m_kriteria->fetch_data();
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/kriteria/kriteria", $data);
    $this->load->view("attribute/footer", $setting);
  }

  public function input() {
    $data['kriteria_id']                = $this->input->post('kriteria_id');
    $data['kriteria_nama']            = $this->input->post('kriteria_nama');
    $data['kriteria_bobot']                = $this->input->post('kriteria_bobot');
    
    $this->session->set_flashdata('add', 'Berhasil Tambah kriteria <b>' . $data['kriteria_nama'].'</b>');
    $this->m_kriteria->input($data);
    redirect('kriteria');
  }
  
  public function edit() {
    
    $data['kriteria_id']                  = $this->input->post('kriteria_id');
    $data['kriteria_nama']                = $this->input->post('kriteria_nama');
    $data['kriteria_bobot']                = $this->input->post('kriteria_bobot');
    
    $this->session->set_flashdata('update', 'Berhasil Update kriteria <b>' . $data['kriteria_nama'].'</b>');
    $this->m_kriteria->edit($data);
    redirect('kriteria');
  }
  
  public function delete() {
    $this->session->set_flashdata('delete', 'kriteria <b>'.$this->input->post('kriteria_nama').'</b> telah dihapus !');
    $this->m_kriteria->delete($this->input->post('kriteria_id'));

    redirect('kriteria');
  }

  
  
  

  
}
