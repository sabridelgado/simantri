<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class monitor extends CI_Controller {
  function __construct() {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_monitor");
    $this->load->model("m_setting");
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }
  
  public function index() {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['monitor'] = $this->m_monitor->fetch_data();
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/monitor/monitor", $data);
    $this->load->view("attribute/footer", $setting);
  }

  public function input() {
    $data['monitor_id']                = $this->input->post('monitor_id');
    $data['monitor_nama']            = $this->input->post('monitor_nama');
    $data['monitor_bobot']                = $this->input->post('monitor_bobot');
    
    $this->session->set_flashdata('add', 'Berhasil Tambah monitor <b>' . $data['monitor_nama'].'</b>');
    $this->m_monitor->input($data);
    redirect('monitor');
  }
  
  public function edit() {
    
    $data['monitor_id']                  = $this->input->post('monitor_id');
    $data['monitor_nama']                = $this->input->post('monitor_nama');
    $data['monitor_bobot']                = $this->input->post('monitor_bobot');
    
    $this->session->set_flashdata('update', 'Berhasil Update monitor <b>' . $data['monitor_nama'].'</b>');
    $this->m_monitor->edit($data);
    redirect('monitor');
  }
  
  public function delete() {
    $this->session->set_flashdata('delete', 'monitor <b>'.$this->input->post('monitor_nama').'</b> telah dihapus !');
    $this->m_monitor->delete($this->input->post('monitor_id'));

    redirect('monitor');
  }

  
  
  

  
}
