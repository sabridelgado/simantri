<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Keahlian_detail extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_keahlian_detail');
    $this->load->model('m_keahlian');
    $this->load->model("m_dosen");
    $this->load->model("m_setting");
    #Check keahlian_detail login or not
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }

  public function index()
  {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data["keahlian_detail"]         = $this->m_keahlian_detail->fetch_data();
    $data["keahlian"]        = $this->m_keahlian->fetch_data();
    $data["dosen"]        = $this->m_dosen->fetch_data();
    #Generate Template...
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/keahlian_detail/keahlian_detail", $data);
    $this->load->view("attribute/footer", $setting);
  }




  public function input()
  {
    $data['keahlian_detail_id']         = null;
    $data['keahlian_id']                = $this->input->post('keahlian_id');
    $data['dosen_id']                   = $this->input->post('dosen_id');
    $data['keahlian_detail_bobot']      = $this->input->post('keahlian_detail_bobot');
    $this->session->set_flashdata('add', 'Berhasil Tambah keahlian_detail <b>' . $data['keahlian_detail_id'] . '</b>');
    $this->m_keahlian_detail->create_keahlian_detail($data);

    $log['log_id']      = null;
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Menambah Data keahlian_detail " . $data['keahlian_detail_id'];
    $log['user_id']     = $this->session->userdata('user_id');
    $this->m_setting->create_log($log);
    redirect('keahlian_detail');
  }

  public function edit()
  {

    $data['keahlian_detail_id']         = $this->input->post('keahlian_detail_id');
    $data['keahlian_id']                = $this->input->post('keahlian_id');
    $data['dosen_id']                   = $this->input->post('dosen_id');
    $data['keahlian_detail_bobot']      = $this->input->post('keahlian_detail_bobot');
    $this->session->set_flashdata('update', 'Berhasil Update keahlian_detail <b>' . $data['keahlian_detail_id'] . '</b>');
    $this->m_keahlian_detail->update_keahlian_detail($data);

    $log['log_id']      = null;
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Mengedit Data keahlian_detail " . $data['keahlian_detail_id'];
    $log['user_id']     = $this->session->userdata('user_id');
    $this->m_setting->create_log($log);


    redirect('keahlian_detail');
  }

  public function delete()
  {
    $this->session->set_flashdata('delete', 'keahlian_detail <b>' . $this->input->post('keahlian_detail_id') . '</b> telah dihapus !');
    $this->m_keahlian_detail->delete_keahlian_detail($this->input->post('keahlian_detail_id'));

    $log['log_id']      = null;
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Menghapus Data keahlian_detail " . $this->input->post('keahlian_detail_id');
    $log['user_id']     = $this->session->userdata('user_id');
    $this->m_setting->create_log($log);

    redirect('keahlian_detail');
  }
}
