<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Asisten_praktikum extends CI_Controller {
  function __construct() {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_asisten_praktikum");
    $this->load->model("m_calon_aslab");
    $this->load->model('m_mahasiswa');
    $this->load->model('m_matakuliah');
    $this->load->model('m_tahun_ajaran');
    $this->load->model("m_setting");
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }
  
  public function index() {
    $tahun_ajaran = $this->m_tahun_ajaran->getTahunAjaranLast();
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    if ($this->session->userdata('group_id')==2) {
      $data['asisten_praktikum'] = $this->m_asisten_praktikum->fetch_data_perdosen($this->session->userdata('nomor_induk'),$tahun_ajaran[0]->tahun_ajaran_id);
    }else{
      $data['asisten_praktikum'] = $this->m_asisten_praktikum->fetch_data_pertahunajaran($tahun_ajaran[0]->tahun_ajaran_id);
    }
    
    $data["mahasiswa"]        = $this->m_mahasiswa->fetch_data();
    if ($this->session->userdata('group_id')==2) {
      $data["matakuliah"]        = $this->m_matakuliah->fetch_data_perdosen($this->session->userdata('nomor_induk'));
    }else{
      $data["matakuliah"]        = $this->m_matakuliah->fetch_data();
    }
    $data["tahun_ajaran"]        = $this->m_tahun_ajaran->fetch_data();
    $this->load->view("attribute/header",$setting);
    $this->load->view("attribute/menus",$setting);
    $this->load->view("admin/master_data/asisten_praktikum/asisten_praktikum", $data);
    $this->load->view("attribute/footer",$setting);
  }

  public function permatakuliah()
  {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    if ($this->session->userdata('group_id')==2) {
      if($this->input->post('tahun_ajaran_id')==null){
        $data["asisten_praktikum"]         = $this->m_asisten_praktikum->fetch_data_perdosen_permatakuliah($this->session->userdata('nomor_induk'),$this->input->post('matakuliah_id'));
      }else if($this->input->post('matakuliah_id')==null){
        $data["asisten_praktikum"]         = $this->m_asisten_praktikum->fetch_data_perdosen($this->session->userdata('nomor_induk'),$this->input->post('tahun_ajaran_id'));
      }else{
        $data["asisten_praktikum"]         = $this->m_asisten_praktikum->fetch_data_perdosen_permatakuliah_pertahunajaran($this->session->userdata('nomor_induk'),$this->input->post('matakuliah_id'),$this->input->post('tahun_ajaran_id'));
      }
    }else{
      if($this->input->post('tahun_ajaran_id')==null){
        $data["asisten_praktikum"]         = $this->m_asisten_praktikum->fetch_data_permatakuliah($this->input->post('matakuliah_id'));
      }else if($this->input->post('matakuliah_id')==null){
        $data["asisten_praktikum"]         = $this->m_asisten_praktikum->fetch_data_pertahunajaran($this->input->post('tahun_ajaran_id'));
      }else{
        $data["asisten_praktikum"]         = $this->m_asisten_praktikum->fetch_data_permatakuliah_pertahunajaran($this->input->post('matakuliah_id'),$this->input->post('tahun_ajaran_id'));
      }
    }
    if ($this->session->userdata('group_id')==2) {
      $data["matakuliah"]        = $this->m_matakuliah->fetch_data_perdosen($this->session->userdata('nomor_induk'));
    }else{
      $data["matakuliah"]        = $this->m_matakuliah->fetch_data();
    }
    $data["mahasiswa"]        = $this->m_mahasiswa->fetch_data();
    $data["tahun_ajaran"]        = $this->m_tahun_ajaran->fetch_data();
    $this->load->view("attribute/header",$setting);
    $this->load->view("attribute/menus",$setting);
    $this->load->view("admin/master_data/asisten_praktikum/asisten_praktikum", $data);
    $this->load->view("attribute/footer",$setting);
  }

  public function send($id,$matakuliah){
    /* Kirim Pesan */
    $msg = array
      (
      'body'  => 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah '.$matakuliah,
      'title' => 'PENGUMUMAN',
      );
      $datac['mahasiswa_nim']  = $id;
      $datac['notifikasi_content']  = 'Selamat Anda Terpilih Menjadi Asisten Praktikum Matakuliah '.$matakuliah;
      $this->m_calon_aslab->insert_notifikasi($datac);
      
      $server_key = 'AAAAaqiM5T4:APA91bFvDww2ExfsHatp32dlQiNWSHk0dQpn30asLOFXN_96aLnvTmLc1JWtKAF9Nqa3jBm0I5XktA7BEkevyKKEYgaVZDmBTyS7ObEAfSwrjPC_yKenBskFta8W5GdlAO7kJSJT5dcc';
  
                      $url            = 'https://fcm.googleapis.com/fcm/send';
              $fields['to']           = '/topics/'.$id;
              $fields['notification'] = $msg;
                      $headers        = array(
        'Content-Type:application/json',
        'Authorization:key=' . $server_key,
      );
      $ch = curl_init();
    
      curl_setopt($ch, CURLOPT_URL, $url);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
      $result = curl_exec($ch);
      curl_close($ch);
      // exit;
      
    }
  
  public function input() {
    $list_calon_aslab  = $this->m_calon_aslab->fetch_data_permatakuliah_tahun_ajaran($this->session->userdata('nomor_induk'),$this->input->post('matakuliah_id'),$this->input->post('tahun_ajaran_id'));
    if($this->input->post('tombol')=='aras'){
      $mahasiswa_nim  = $this->input->post('mahasiswa_nim');
      foreach ($list_calon_aslab as $ca) {
        $calon_aslab = false;
        foreach ($mahasiswa_nim as $key => $value){
          if($ca->nim_mahasiswa == $value){
            $calon_aslab = true;
          }
        }
        if($calon_aslab){
          $datac['nim_mahasiswa']  = $ca->nim_mahasiswa;
          $datac['status']  = 1;
          $this->m_calon_aslab->update_calon_aslab_pernim($datac);

          $matkul = $this->m_matakuliah->get($this->input->post('matakuliah_id'));
          $this->send($ca->nim_mahasiswa,$matkul[0]->matakuliah_nama);
        }else{
          $datac['nim_mahasiswa']  = $ca->nim_mahasiswa;
          $datac['status']  = 2;
          $this->m_calon_aslab->update_calon_aslab_pernim($datac);
        }
      }

      foreach ($mahasiswa_nim as $key => $value) {
        $data['mahasiswa_nim']  = $value;
        $data['matakuliah_id']  = $this->input->post('matakuliah_id');
        $data['tahun_ajaran_id']  = $this->input->post('tahun_ajaran_id');
        $this->m_asisten_praktikum->input($data);
      }
    }else{
      $mahasiswa_nim  = $this->input->post('mahasiswa_nim_topsis');
      foreach ($list_calon_aslab as $ca) {
        $calon_aslab = false;
        foreach ($mahasiswa_nim as $key => $value){
          if($ca->nim_mahasiswa == $value){
            $calon_aslab = true;
          }
        }
        if($calon_aslab){
          $datac['nim_mahasiswa']  = $ca->nim_mahasiswa;
          $datac['status']  = 1;
          $this->m_calon_aslab->update_calon_aslab_pernim($datac);

          $matkul = $this->m_matakuliah->get($this->input->post('matakuliah_id'));
          $this->send($ca->nim_mahasiswa,$matkul[0]->matakuliah_nama);
        }else{
          $datac['nim_mahasiswa']  = $ca->nim_mahasiswa;
          $datac['status']  = 2;
          $this->m_calon_aslab->update_calon_aslab_pernim($datac);
        }
      }
      foreach ($mahasiswa_nim as $key => $value) {
        $data['mahasiswa_nim']  = $value;
        $data['matakuliah_id']  = $this->input->post('matakuliah_id');
        $data['tahun_ajaran_id']  = $this->input->post('tahun_ajaran_id');
        $this->m_asisten_praktikum->input($data);
      }
    }
    $this->session->set_flashdata('add', 'Berhasil Tambah asisten_praktikum ');
    redirect('asisten_praktikum');
  }
  
  public function edit() {
    $data['asisten_praktikum_id']    = $this->input->post('asisten_praktikum_id');
    $data['mahasiswa_nim']  = $this->input->post('mahasiswa_nim');
    $data['matakuliah_id']  = $this->input->post('matakuliah_id');
    $data['tahun_ajaran_id']  = $this->input->post('tahun_ajaran_id');
    $this->session->set_flashdata('update', 'Berhasil Update asisten_praktikum ' . $data['mahasiswa_nim']);
    $this->m_asisten_praktikum->edit($data);
    redirect('asisten_praktikum');
      
  }
  
  public function delete() {
    $this->m_asisten_praktikum->delete($this->input->post('asisten_praktikum_id'));
    $this->session->set_flashdata('delete', 'asisten_praktikum ' . $this->input->post('mahasiswa_nim')." telah dihapus !");
    redirect('asisten_praktikum');
  }
  
}
?>
