<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dosen extends CI_Controller {
  function __construct() {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_dosen");
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
    $data['dosen'] = $this->m_dosen->fetch_data();
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/dosen/dosen", $data);
    $this->load->view("attribute/footer", $setting);
  }

  public function input() {
    // $data['nip']                  = "US".date('YmdHis');
    $data['nip']              = $this->input->post('nip');
    $data['dosen_nama']            = $this->input->post('dosen_nama');
    $this->m_dosen->input($data);

    $datas['user_name']           = $this->input->post('nip');
    $datas['user_password']       = md5($this->input->post('nip'));
    $datas['nomor_induk']         = $this->input->post('nip');
    $datas['user_fullname']       = $this->input->post('dosen_nama');
    $datas['user_photo']          = '';
    $datas['group_id']            = 2;
    $this->m_user->create_user($datas);

    $this->session->set_flashdata('add', 'Berhasil Tambah dosen <b>' . $data['dosen_nama'].'</b>');
    redirect('dosen');
  }
  
  public function edit() {
    
    $data['dosen_id']              = $this->input->post('dosen_id');
    $data['nip']              = $this->input->post('nip');
    $data['dosen_nama']            = $this->input->post('dosen_nama');
    $this->session->set_flashdata('update', 'Berhasil Update dosen <b>' . $data['dosen_nama'].'</b>');
    $this->m_dosen->edit($data);


    redirect('dosen');
  }
  
  public function delete() {
    $this->session->set_flashdata('delete', 'dosen <b>'.$this->input->post('dosen_nama').'</b> telah dihapus !');
    $this->m_dosen->delete($this->input->post('nip'));

    redirect('dosen');
  }

  
  
  

  
}
?>
