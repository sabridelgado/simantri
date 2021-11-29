<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Detail extends CI_Controller {
  function __construct() {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_detail");
    $this->load->model("m_user");
    $this->load->model("m_setting");
    $this->load->model("m_laporan");
    $this->load->library('upload');
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }
  
  public function id() {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['detail'] = $this->m_detail->get($this->uri->segment(3));
    $data['monitoring'] = $this->m_monitoring->get($this->uri->segment(3));
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/detail/detail", $data);
    $this->load->view("attribute/footer", $setting);
  }

  public function input() {
    // $data['nip']                  = "US".date('YmdHis');
    $data['nip']              = $this->input->post('nip');
    $data['detail_nama']            = $this->input->post('detail_nama');
    $this->m_detail->input($data);

    $datas['user_name']           = $this->input->post('nip');
    $datas['user_password']       = md5($this->input->post('nip'));
    $datas['nomor_induk']         = $this->input->post('nip');
    $datas['user_fullname']       = $this->input->post('detail_nama');
    $datas['user_photo']          = '';
    $datas['group_id']            = 2;
    $this->m_user->create_user($datas);

    $this->session->set_flashdata('add', 'Berhasil Tambah detail <b>' . $data['detail_nama'].'</b>');
    redirect('detail');
  }
  
  public function edit() {
    
    $data['detail_id']              = $this->input->post('detail_id');
    $data['nip']              = $this->input->post('nip');
    $data['detail_nama']            = $this->input->post('detail_nama');
    $this->session->set_flashdata('update', 'Berhasil Update detail <b>' . $data['detail_nama'].'</b>');
    $this->m_detail->edit($data);


    redirect('detail');
  }
  
  public function delete() {
    $this->session->set_flashdata('delete', 'detail <b>'.$this->input->post('detail_nama').'</b> telah dihapus !');
    $this->m_detail->delete($this->input->post('nip'));

    redirect('detail');
  }

  
  
  

  
}
?>
