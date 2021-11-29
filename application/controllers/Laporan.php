<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Laporan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_laporan');
    $this->load->model('m_dosen');
    $this->load->model("m_setting");
    $this->load->library('f_pdf');
    #Check laporan login or not
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }

  public function index()
  {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data["laporan"]         = $this->m_laporan->fetch_data();
    $data["dosen"]        = $this->m_dosen->fetch_data();
    #Generate Template...
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/laporan/laporan", $data);
    $this->load->view("attribute/footer", $setting);
  }




  public function input()
  {
    $tombol                      = $this->input->post('tombol');

    if ($tombol == 'cpi') {
      $data['laporan_id']      = null;
      $data['nim_mahasiswa']       = $this->input->post('nim_mahasiswa');
      $data['nama_mahasiswa']      = $this->input->post('nama_mahasiswa');
      $data['judul_skripsi']       = $this->input->post('judul_skripsi');
      $data['dosen_pembimbing1']   = $this->input->post('dosen_pembimbing1_cpi');
      $data['dosen_pembimbing2']   = $this->input->post('dosen_pembimbing2_cpi');
      $data['dosen_penguji1']      = $this->input->post('dosen_penguji1_cpi');
      $data['dosen_penguji2']      = $this->input->post('dosen_penguji2_cpi');
      $data['dosen_penguji3']      = $this->input->post('dosen_penguji3_cpi');
      $data['status_laporan']      = $this->input->post('status_laporan');
      // print_r($this->input->post('dosen_pembimbing1_cpi'));
      // print_r($this->input->post('dosen_pembimbing2_cpi'));
      // print_r($this->input->post('dosen_penguji1_cpi'));
      // print_r($this->input->post('dosen_penguji2_cpi'));
      // print_r($this->input->post('dosen_penguji3_cpi'));
      // die;
    } else if ($tombol == 'topsis') {
      $data['laporan_id']      = null;
      $data['nim_mahasiswa']       = $this->input->post('nim_mahasiswa');
      $data['nama_mahasiswa']      = $this->input->post('nama_mahasiswa');
      $data['judul_skripsi']       = $this->input->post('judul_skripsi');
      $data['dosen_pembimbing1']   = $this->input->post('dosen_pembimbing1_topsis');
      $data['dosen_pembimbing2']   = $this->input->post('dosen_pembimbing2_topsis');
      $data['dosen_penguji1']      = $this->input->post('dosen_penguji1_topsis');
      $data['dosen_penguji2']      = $this->input->post('dosen_penguji2_topsis');
      $data['dosen_penguji3']      = $this->input->post('dosen_penguji3_topsis');
      $data['status_laporan']      = $this->input->post('status_laporan');
    } else {
      $data['laporan_id']      = null;
      $data['nim_mahasiswa']       = $this->input->post('nim_mahasiswa');
      $data['nama_mahasiswa']      = $this->input->post('nama_mahasiswa');
      $data['judul_skripsi']       = $this->input->post('judul_skripsi');
      $data['dosen_pembimbing1']   = $this->input->post('dosen_pembimbing1');
      $data['dosen_pembimbing2']   = $this->input->post('dosen_pembimbing2');
      $data['dosen_penguji1']      = $this->input->post('dosen_penguji1');
      $data['dosen_penguji2']      = $this->input->post('dosen_penguji2');
      $data['dosen_penguji3']      = $this->input->post('dosen_penguji3');
      $data['status_laporan']      = $this->input->post('status_laporan');
    }


    $this->session->set_flashdata('add', 'Berhasil Tambah laporan <b>' . $data['nama_mahasiswa'] . '</b>');
    $this->m_laporan->create_laporan($data);

    $log['log_id']      = null;
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Menambah Data laporan " . $data['nama_mahasiswa'];
    $log['user_id']     = $this->session->userdata('user_id');
    $this->m_setting->create_log($log);
    redirect('laporan');
  }

  public function edit()
  {

    if ($this->session->userdata('group_id') == 3) {
      $data['laporan_id']          = $this->input->post('laporan_id');
      $data['nim_mahasiswa']       = $this->input->post('nim_mahasiswa');
      $data['nama_mahasiswa']      = $this->input->post('nama_mahasiswa');
      $data['judul_skripsi']       = $this->input->post('judul_skripsi');
      $data['dosen_pembimbing1']   = $this->input->post('dosen_pembimbing1');
      $data['dosen_pembimbing2']   = $this->input->post('dosen_pembimbing2');
      $data['dosen_penguji1']      = $this->input->post('dosen_penguji1');
      $data['dosen_penguji2']      = $this->input->post('dosen_penguji2');
      $data['dosen_penguji3']      = $this->input->post('dosen_penguji3');
      $data['status_laporan']      = $this->input->post('status_laporan');
      $data['nomor_surat']         = $this->input->post('nomor_surat');
      $data['hari']                = $this->input->post('hari');
      $data['jam']                 = $this->input->post('jam');
      $data['tempat']              = $this->input->post('tempat');
      $data['ket']              = $this->input->post('ket');
    } else {
      $data['laporan_id']          = $this->input->post('laporan_id');
      $data['nim_mahasiswa']       = $this->input->post('nim_mahasiswa');
      $data['nama_mahasiswa']      = $this->input->post('nama_mahasiswa');
      $data['judul_skripsi']       = $this->input->post('judul_skripsi');
      $data['dosen_pembimbing1']   = $this->input->post('dosen_pembimbing1');
      $data['dosen_pembimbing2']   = $this->input->post('dosen_pembimbing2');
      $data['dosen_penguji1']      = $this->input->post('dosen_penguji1');
      $data['dosen_penguji2']      = $this->input->post('dosen_penguji2');
      $data['dosen_penguji3']      = $this->input->post('dosen_penguji3');
      $data['status_laporan']      = $this->input->post('status_laporan');
    }


    $this->session->set_flashdata('update', 'Berhasil Update laporan <b>' . $data['laporan_id'] . '</b>');
    $this->m_laporan->update_laporan($data);

    $log['log_id']      = null;
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Mengedit Data laporan " . $data['laporan_id'];
    $log['user_id']     = $this->session->userdata('user_id');
    $this->m_setting->create_log($log);


    redirect('laporan');
  }

  public function delete()
  {
    $this->session->set_flashdata('delete', 'laporan <b>' . $this->input->post('laporan_id') . '</b> telah dihapus !');
    $this->m_laporan->delete_laporan($this->input->post('laporan_id'));

    $log['log_id']      = null;
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Menghapus Data laporan " . $this->input->post('laporan_id');
    $log['user_id']     = $this->session->userdata('user_id');
    $this->m_setting->create_log($log);

    redirect('laporan');
  }

  public function pdf()
  {

    $data["laporan"]         = $this->m_laporan->get($this->uri->segment(3));
    $data["dosen"]        = $this->m_dosen->fetch_data();
    $this->load->view('admin/master_data/laporan/export_pdf', $data); //memanggil view 
  }
}
