<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Subkriteria extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_subkriteria");
    $this->load->model("m_kriteria");
    $this->load->model("m_setting");
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }

  public function id()
  {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['subkriteria'] = $this->m_subkriteria->get($this->uri->segment(3));
    $data['kriteria']    = $this->m_kriteria->get($this->uri->segment(3));
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/subkriteria/subkriteria", $data);
    $this->load->view("attribute/footer", $setting);
  }

  public function input()
  {
    $data['subkriteria_id']                = $this->input->post('subkriteria_id');
    $data['subkriteria_nama']            = $this->input->post('subkriteria_nama');
    $data['subkriteria_bobot']                = $this->input->post('subkriteria_bobot');
    $data['kriteria_id']                = $this->input->post('kriteria_id');

    $this->session->set_flashdata('add', 'Berhasil Tambah subkriteria <b>' . $data['subkriteria_nama'] . '</b>');
    $this->m_subkriteria->input($data);
    redirect('subkriteria/id/'.$this->input->post('kriteria_id'));
  }

  public function edit()
  {

    $data['subkriteria_id']                  = $this->input->post('subkriteria_id');
    $data['subkriteria_nama']                = $this->input->post('subkriteria_nama');
    $data['subkriteria_bobot']                = $this->input->post('subkriteria_bobot');
    $data['kriteria_id']                = $this->input->post('kriteria_id');

    $this->session->set_flashdata('update', 'Berhasil Update subkriteria <b>' . $data['subkriteria_nama'] . '</b>');
    $this->m_subkriteria->edit($data);
    redirect('subkriteria/id/'.$this->input->post('kriteria_id'));
  }

  public function delete()
  {
    $this->session->set_flashdata('delete', 'subkriteria <b>' . $this->input->post('subkriteria_nama') . '</b> telah dihapus !');
    $this->m_subkriteria->delete($this->input->post('subkriteria_id'));

    redirect('subkriteria/id/'.$this->input->post('kriteria_id'));
  }
}
