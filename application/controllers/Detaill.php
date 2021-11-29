<?php
defined('BASEPATH') or exit('No direct script access allowed');
class detaill extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_detaill");
    $this->load->model("m_monitor");
    $this->load->model("m_setting");
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }

  public function id()
  {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['detaill'] = $this->m_detaill->get($this->uri->segment(3));
    $data['monitor']    = $this->m_monitor->get($this->uri->segment(3));
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/detaill/detaill", $data);
    $this->load->view("attribute/footer", $setting);
  }

  public function input()
  {
    $data['detaill_id']                = $this->input->post('detaill_id');
    $data['detaill_nama']            = $this->input->post('detaill_nama');
    $data['detaill_bobot']                = $this->input->post('detaill_bobot');
    $data['monitor_id']                = $this->input->post('monitor_id');

    $this->session->set_flashdata('add', 'Berhasil Tambah detaill <b>' . $data['detaill_nama'] . '</b>');
    $this->m_detaill->input($data);
    redirect('detaill/id/'.$this->input->post('monitor_id'));
  }

  public function edit()
  {

    $data['detaill_id']                  = $this->input->post('detaill_id');
    $data['detaill_nama']                = $this->input->post('detaill_nama');
    $data['detaill_bobot']                = $this->input->post('detaill_bobot');
    $data['monitor_id']                = $this->input->post('monitor_id');

    $this->session->set_flashdata('update', 'Berhasil Update detaill <b>' . $data['detaill_nama'] . '</b>');
    $this->m_detaill->edit($data);
    redirect('detaill/id/'.$this->input->post('monitor_id'));
  }

  public function delete()
  {
    $this->session->set_flashdata('delete', 'detaill <b>' . $this->input->post('detaill_nama') . '</b> telah dihapus !');
    $this->m_detaill->delete($this->input->post('detaill_id'));

    redirect('detaill/id/'.$this->input->post('monitor_id'));
  }
}
