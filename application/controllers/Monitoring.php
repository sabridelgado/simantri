<?php
defined('BASEPATH') or exit('No direct script access allowed');
class monitoring extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_monitoring");
    $this->load->model("m_setting");
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }




  public function index()
  {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['monitoring'] = $this->m_monitoring->fetch_data();
    $data['datasungai'] = $this->m_monitoring->get_last();
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/monitoring/monitoring", $data);
    $this->load->view("attribute/footer", $setting);
  }

  public function input()
  {

    $data['id_sungai']                     = $this->input->post('id_sungai');

    $data['intensitas_hujan']              = $this->input->post('rain_level');
    $data['waktu_hujan']                    = date('Y-m-d H:i:s');
    $data['ketinggian_sungai']             = $this->input->post('water_level');
    $data['ketinggian_sungai_sebenarnya']  = $this->input->post('water_level');
    $data['waktu_sungai']                   = date('Y-m-d H:i:s');
    $this->session->set_flashdata('add', 'Berhasil Tambah monitoring <b>' . $data['nama_sungai'] . '</b>');
    $this->m_monitoring->input($data);



    redirect('monitoring');
  }

  public function edit()
  {



    $data['id_sungai']                     = $this->input->post('id_sungai');

    $data['intensitas_hujan']              = $this->input->post('rain_level');
    $data['waktu_hujan']                    = date('Y-m-d H:i:s');
    $data['ketinggian_sungai']             = $this->input->get()('sensor1');
    $data['ketinggian_sungai_sebenarnya']  = $this->input->get('sensor1');
    $data['waktu_sungai']                   = date('Y-m-d H:i:s');


    $this->session->set_flashdata('add', 'Berhasil Tambah monitoring <b>' . $data['nama_sungai'] . '</b>');
    $this->m_monitoring->edit($data);


    redirect('monitoring');
  }

  public function delete()
  {
    $this->session->set_flashdata('delete', 'monitoring <b>' . $this->input->post('nama_sungai') . '</b> telah dihapus !');
    $this->m_monitoring->delete($this->input->post('id_sungai'));


    redirect('monitoring');
  }
}
