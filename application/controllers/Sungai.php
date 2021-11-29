<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Sungai extends CI_Controller {
  function __construct() {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_sungai");
    $this->load->model("m_setting");
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }
  
  public function index() {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['sungai'] = $this->m_sungai->fetch_data();
    $this->load->view("attribute/header",$setting);
    $this->load->view("attribute/menus",$setting);
    $this->load->view("admin/master_data/sungai", $data);
    $this->load->view("attribute/footer",$setting);
  }

  
  
  public function input() {
    
    $data['nama_sungai']  = $this->input->post('nama_sungai');
    $data['lokasi']  = $this->input->post('lokasi');
    $data['kelurahan']  = $this->input->post('kelurahan');
    $data['longitude']  = $this->input->post('longitude');
    $data['latitude']  = $this->input->post('latitude');
    $data['deskripsi']  = $this->input->post('deskripsi');
    $this->session->set_flashdata('add', 'Berhasil Tambah sungai ' . $data['nama_sungai']);

    // $log['log_id']      = "";
    // $log['log_time']    = date('Y-m-d H:i:s');
    // $log['log_message'] = "Menambah Data sungai ".$this->input->post('sungai_name');
    // $log['user_id']     = $this->session->userdata('user_id');
    // $this->m_setting->create_log($log);
    
    $this->m_sungai->input($data);
    redirect('sungai');
  }
  
  public function edit() {
    $data['id_sungai']    = $this->input->post('id_sungai');
    $data['nama_sungai']  = $this->input->post('nama_sungai');
    $data['lokasi']  = $this->input->post('lokasi');
    $data['kelurahan']  = $this->input->post('kelurahan');
    $data['longitude']  = $this->input->post('longitude');
    $data['latitude']  = $this->input->post('latitude');
    $data['deskripsi']  = $this->input->post('deskripsi');
    $this->session->set_flashdata('update', 'Berhasil Update sungai ' . $data['nama_sungai']);

    // $log['log_id']      = "";
    // $log['log_time']    = date('Y-m-d H:i:s');
    // $log['log_message'] = "Mengubah Data sungai ".$this->input->post('sungai_name');
    // $log['user_id']     = $this->session->userdata('user_id');
    // $this->m_setting->create_log($log);
    
    $this->m_sungai->edit($data);
    redirect('sungai');
      
  }
  
  public function delete() {
    $this->m_sungai->delete($this->input->post('id_sungai'));
    $this->session->set_flashdata('delete', 'sungai ' . $this->input->post('nama_sungai')." telah dihapus !");

    // $log['log_id']      = "";
    // $log['log_time']    = date('Y-m-d H:i:s');
    // $log['log_message'] = "Menghapus Data sungai ".$this->input->post('sungai_name');
    // $log['user_id']     = $this->session->userdata('user_id');
    // $this->m_setting->create_log($log);
    redirect('sungai');
  }
  
}
?>
