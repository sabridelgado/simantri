<?php
defined('BASEPATH') or exit('No direct script access allowed');
class calon_aslab extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_calon_aslab');
    $this->load->model('m_mahasiswa');
    $this->load->model('m_matakuliah');
    $this->load->model('m_kriteria');
    $this->load->model('m_subkriteria');
    $this->load->model('m_tahun_ajaran');
    $this->load->model("m_setting");
    $this->load->library('f_pdf');
    #Check calon_aslab login or not
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }

  public function index()
  {
    $data['ta'] = $this->m_tahun_ajaran->getTahunAjaranLast();
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    if ($this->session->userdata('group_id')==2) {
      $data["calon_aslab"]         = $this->m_calon_aslab->fetch_data_perdosen($this->session->userdata('nomor_induk'),$data['ta'][0]->tahun_ajaran_id);
    }else{
      $data["calon_aslab"]         = $this->m_calon_aslab->fetch_data_pertahunajaran($data['ta'][0]->tahun_ajaran_id);
    }
    if ($this->session->userdata('group_id')==2) {
      $data["matakuliah"]        = $this->m_matakuliah->fetch_data_perdosen($this->session->userdata('nomor_induk'));
    }else{
      $data["matakuliah"]        = $this->m_matakuliah->fetch_data();
    }
    $data["mahasiswa"]        = $this->m_mahasiswa->fetch_data();
    $data["kriteria"]        = $this->m_kriteria->fetch_data();
    $data["subkriteria"]        = $this->m_subkriteria->fetch_data();
    $data["tahun_ajaran"]        = $this->m_tahun_ajaran->fetch_data();
    #Generate Template...
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/calon_aslab/calon_aslab", $data);
    $this->load->view("attribute/footer", $setting);
  }

  public function permatakuliah()
  {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    if ($this->session->userdata('group_id')==2) {
      if($this->input->post('tahun_ajaran_id')==null){
        $data["calon_aslab"]         = $this->m_calon_aslab->fetch_data_perdosen_permatakuliah($this->session->userdata('nomor_induk'),$this->input->post('matakuliah_id'));
      }else if($this->input->post('matakuliah_id')==null){
        $data["calon_aslab"]         = $this->m_calon_aslab->fetch_data_perdosen_tahunajaran($this->session->userdata('nomor_induk'),$this->input->post('tahun_ajaran_id'));
      }else{
        $data["calon_aslab"]         = $this->m_calon_aslab->fetch_data_perdosen_permatakuliah_tahunajaran($this->session->userdata('nomor_induk'),$this->input->post('matakuliah_id'),$this->input->post('tahun_ajaran_id'));
      }
    }else{
      if($this->input->post('tahun_ajaran_id')==null){
        $data["calon_aslab"]         = $this->m_calon_aslab->fetch_data_permatakuliah($this->input->post('matakuliah_id'));
      }else if($this->input->post('matakuliah_id')==null){
        $data["calon_aslab"]         = $this->m_calon_aslab->fetch_data_pertahunajaran($this->input->post('tahun_ajaran_id'));
      }else{
        $data["calon_aslab"]         = $this->m_calon_aslab->fetch_data_permatakuliah_pertahunajaran($this->input->post('matakuliah_id'),$this->input->post('tahun_ajaran_id'));
      }
      
    }
    if ($this->session->userdata('group_id')==2) {
      $data["matakuliah"]        = $this->m_matakuliah->fetch_data_perdosen($this->session->userdata('nomor_induk'));
    }else{
      $data["matakuliah"]        = $this->m_matakuliah->fetch_data();
    }
    $data["mahasiswa"]        = $this->m_mahasiswa->fetch_data();
    $data["kriteria"]        = $this->m_kriteria->fetch_data();
    $data["subkriteria"]        = $this->m_subkriteria->fetch_data();
    $data["tahun_ajaran"]        = $this->m_tahun_ajaran->fetch_data();
    #Generate Template...
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/calon_aslab/calon_aslab", $data);
    $this->load->view("attribute/footer", $setting);
  }

  public function input()
  {
    $data['nim_mahasiswa']       = $this->input->post('nim_mahasiswa');
    $data['nilai_praktikum']      = $this->input->post('nilai_praktikum');
    $data['nilai_mk']       = $this->input->post('nilai_mk');
    $data['semester']   = $this->input->post('semester');
    $data['asisten_berapakali']   = $this->input->post('asisten_berapakali');
    $data['rekomendasi']      = $this->input->post('rekomendasi');
    $data['ipk']      = $this->input->post('ipk');
    $data['matakuliah_id']      = $this->input->post('matakuliah_id');
    $data['tahun_ajaran_id']      = $this->input->post('tahun_ajaran_id');
    $data['status']      = 0;

    $this->m_calon_aslab->create_calon_aslab($data);
    $this->session->set_flashdata('add', 'Berhasil Tambah calon_aslab <b>' . $data['nama_mahasiswa'] . '</b>');

    redirect('calon_aslab');
  }

  public function edit()
  {

    $data['calon_aslab_id']       = $this->input->post('calon_aslab_id');
    $data['nim_mahasiswa']       = $this->input->post('nim_mahasiswa');
    $data['nilai_praktikum']      = $this->input->post('nilai_praktikum');
    $data['nilai_mk']       = $this->input->post('nilai_mk');
    $data['semester']   = $this->input->post('semester');
    $data['asisten_berapakali']   = $this->input->post('asisten_berapakali');
    $data['rekomendasi']      = $this->input->post('rekomendasi');
    $data['ipk']      = $this->input->post('ipk');
    $data['matakuliah_id']      = $this->input->post('matakuliah_id');
    $data['tahun_ajaran_id']      = $this->input->post('tahun_ajaran_id');

    $this->session->set_flashdata('update', 'Berhasil Update calon_aslab <b>' . $data['calon_aslab_id'] . '</b>');
    $this->m_calon_aslab->update_calon_aslab($data);

    redirect('calon_aslab');
  }

  public function edit_rekomendasi()
  {

    $data['calon_aslab_id']       = $this->input->post('calon_aslab_id');
    $data['rekomendasi']      = $this->input->post('rekomendasi');

    $this->session->set_flashdata('update', 'Berhasil Update calon_aslab <b>' . $data['calon_aslab_id'] . '</b>');
    $this->m_calon_aslab->update_calon_aslab($data);

    redirect('calon_aslab');
  }

  public function delete()
  {
    $this->session->set_flashdata('delete', 'calon_aslab <b>' . $this->input->post('calon_aslab_id') . '</b> telah dihapus !');
    $this->m_calon_aslab->delete_calon_aslab($this->input->post('calon_aslab_id'));

    redirect('calon_aslab');
  }

  public function algoritma()
  {
    //Tampilan Cek Waktu Start
    $data["calon_aslab"]         = $this->m_calon_aslab->data_calon_aslab($this->session->userdata('nomor_induk'),$this->input->post('matakuliah_id'),$this->input->post('tahun_ajaran_id'));
    $data["mahasiswa"]        = $this->m_mahasiswa->fetch_data();
    $data["matakuliah"]        = $this->m_matakuliah->fetch_data();
    $data["kriteria"]        = $this->m_kriteria->fetch_data();
    $data["subkriteria"]        = $this->m_subkriteria->fetch_data();
    $data["tahun_ajaran"]        = $this->m_tahun_ajaran->fetch_data(); 
      
    if($data["calon_aslab"]){
      //START METODE ARAS
      //PEMBENTUKAN MATRIKS KEPUTUSAN 
      $start_time = microtime(true);
      foreach ($data["calon_aslab"] as $row) {
        //langkah 1
        $data['matriks_keputusan'][] = [$row->nilai_praktikum_bobot, $row->nilai_mk_bobot, $row->semester_bobot, $row->asisten_berapakali_bobot,$row->rekomendasi_bobot,$row->ipk_bobot, $row->nim_mahasiswa, $row->matakuliah_id, $row->tahun_ajaran_id, $row->mahasiswa_nama];
      }

      foreach ($data['matriks_keputusan'] as $a => $matriks_d) {
        $data['satu1'][] = $matriks_d[0];
        $data['dua1'][] = $matriks_d[1];
        $data['tiga1'][] = $matriks_d[2];
        $data['empat1'][] = $matriks_d[3];
        $data['lima1'][] = $matriks_d[4];
        $data['enam1'][] = $matriks_d[5];
        $data['tujuh1'][] = $matriks_d[6];
        $data['delapan1'][] = $matriks_d[7];
      }

      $data['max_matriks'] =  [max($data['satu1']),max($data['dua1']),max($data['tiga1']),max($data['empat1']),max($data['lima1']),max($data['enam1']),'',''];

      array_unshift($data['matriks_keputusan'],$data['max_matriks']);

      foreach ($data['matriks_keputusan'] as $a => $matriks_d) {
        $data['satuu'][] = $matriks_d[0];
        $data['duaa'][] = $matriks_d[1];
        $data['tigaa'][] = $matriks_d[2];
        $data['empatt'][] = $matriks_d[3];
        $data['limaa'][] = $matriks_d[4];
        $data['enamm'][] = $matriks_d[5];
        $data['tujuhh'][] = $matriks_d[6];
        $data['delapann'][] = $matriks_d[7];
      }

      foreach ($data['matriks_keputusan'] as $a => $normal) {
        $data['normalisasi'][] = [$normal[0]/array_sum($data['satuu']),$normal[1]/array_sum($data['duaa']),$normal[2]/array_sum($data['tigaa']),$normal[3]/array_sum($data['empatt']),$normal[4]/array_sum($data['limaa']),$normal[5]/array_sum($data['enamm']),$normal[6]];
      }

      foreach ($data['normalisasi'] as $a => $normal) {
        $data['bobot_normalisasi'][] = [$normal[0]*0.3,$normal[1]*0.1,$normal[2]*0.25,$normal[3]*0.1,$normal[4]*0.2,$normal[5]*0.05,$normal[6]];
      }

      for ($i=0; $i <count($data['bobot_normalisasi']) ; $i++) { 
        $data['fungsi_optimalisasi'][] = array_sum($data['bobot_normalisasi'][$i]);
      }

      for ($i=0; $i < count($data['fungsi_optimalisasi']) ; $i++) { 
        $data['ranking'][] = $data['fungsi_optimalisasi'][$i]/$data['fungsi_optimalisasi'][0];
      }

      for ($i=1; $i < count($data['ranking']) ; $i++) { 
        $data['hasil_ranking_aras'][] = [round($data['ranking'][$i],3),$data['matriks_keputusan'][$i][6],$data['matriks_keputusan'][$i][7],$data['matriks_keputusan'][$i][8],$data['matriks_keputusan'][$i][9]];
      }
      
      array_multisort($data['hasil_ranking_aras'], SORT_DESC);
      if(count($data['hasil_ranking_aras'])>=10){
        for ($i=0; $i <10 ; $i++) { 
          $data['hasil_ranking_aras_10'][] = $data['hasil_ranking_aras'][$i];
        }
      }else{
        $data['hasil_ranking_aras_10'] = $data['hasil_ranking_aras'];
      }
      // echo "<pre>";
      // print_r($data['hasil_ranking_aras']);
      // echo "</pre>";
      // die;

      $end_time = microtime(true);
      $data['execution_tim'] = ($end_time - $start_time);
      $data['waktu_perhitungan_aras'] = round($data['execution_tim'],5);
      //FINISH METODE ARAS


      //START METODE TOPSIS
      $start_time = microtime(true);
        foreach ($data["calon_aslab"] as $row) {
          //langkah 1
          $data['matriks_d'][] = [$row->nilai_praktikum_bobot, $row->nilai_mk_bobot, $row->semester_bobot, $row->asisten_berapakali_bobot,$row->rekomendasi_bobot,$row->ipk_bobot, $row->nim_mahasiswa];
        }
        
        foreach ($data['matriks_d'] as $a => $matriks_d) {
          $data['satu'][] = $matriks_d[0];
          $data['dua'][] = $matriks_d[1];
          $data['tiga'][] = $matriks_d[2];
          $data['empat'][] = $matriks_d[3];
          $data['lima'][] = $matriks_d[4];
          $data['enam'][] = $matriks_d[5];
          $data['tujuh'][] = $matriks_d[6];
        }

        $data['satu_a'] = 0;
        for ($i = 0; $i < count($data['satu']); $i++) {
          $data['satu_a'] += pow($data['satu'][$i], 2);
        }
        for ($i = 0; $i < count($data['satu']); $i++) {
          $data['satu_b'][] = $data['satu'][$i] / sqrt($data['satu_a']) * 0.3;
        }

        $data['dua_a'] = 0;
        for ($i = 0; $i < count($data['dua']); $i++) {
          $data['dua_a'] += pow($data['dua'][$i], 2);
        }
        for ($i = 0; $i < count($data['dua']); $i++) {
          $data['dua_b'][] = $data['dua'][$i] / sqrt($data['dua_a']) * 0.1;
        }

        $data['tiga_a'] = 0;
        for ($i = 0; $i < count($data['tiga']); $i++) {
          $data['tiga_a'] += pow($data['tiga'][$i], 2);
        }
        for ($i = 0; $i < count($data['tiga']); $i++) {
          $data['tiga_b'][] = $data['tiga'][$i] / sqrt($data['tiga_a']) * 0.25;
        }

        $data['empat_a'] = 0;
        for ($i = 0; $i < count($data['empat']); $i++) {
          $data['empat_a'] += pow($data['empat'][$i], 2);
        }
        for ($i = 0; $i < count($data['empat']); $i++) {
          $data['empat_b'][] = $data['empat'][$i] / sqrt($data['empat_a']) * 0.1;
        }

        $data['lima_a'] = 0;
        for ($i = 0; $i < count($data['lima']); $i++) {
          $data['lima_a'] += pow($data['lima'][$i], 2);
        }
        for ($i = 0; $i < count($data['lima']); $i++) {
          $data['lima_b'][] = $data['lima'][$i] / sqrt($data['lima_a']) * 0.2;
        }

        $data['enam_a'] = 0;
        for ($i = 0; $i < count($data['enam']); $i++) {
          $data['enam_a'] += pow($data['enam'][$i], 2);
        }
        for ($i = 0; $i < count($data['enam']); $i++) {
          $data['enam_b'][] = $data['enam'][$i] / sqrt($data['enam_a']) * 0.05;
        }

        $data['matriks_d_diputar'] = [$data['satu_b'], $data['dua_b'], $data['tiga_b'], $data['empat_b'],$data['lima_b'],$data['enam_b'], $data['tujuh']];
        $data['max'] = [max($data['satu_b']), max($data['dua_b']), max($data['tiga_b']), max($data['empat_b']), max($data['lima_b']), max($data['enam_b'])];
        $data['min'] = [min($data['satu_b']), min($data['dua_b']), min($data['tiga_b']), min($data['empat_b']), min($data['lima_b']), min($data['enam_b'])];

        
        for ($i = 0; $i < count($data['empat']); $i++) {
          $data['matriks_r'][] = [$data['matriks_d_diputar'][0][$i], $data['matriks_d_diputar'][1][$i], $data['matriks_d_diputar'][2][$i], $data['matriks_d_diputar'][3][$i], $data['matriks_d_diputar'][4][$i], $data['matriks_d_diputar'][5][$i], $data['matriks_d_diputar'][6][$i]];
        }

        foreach ($data['matriks_r'] as $maxx) {
          $data['hasil_ranking_topsis'][] = [sqrt(pow($maxx[0] - $data['min'][0], 2) + pow($maxx[1] - $data['min'][1], 2) + pow($maxx[2] - $data['min'][2], 2) + pow($maxx[3] - $data['min'][3], 2) + pow($maxx[4] - $data['min'][4], 2) + pow($maxx[5] - $data['min'][5], 2)) / (sqrt(pow($maxx[0] - $data['min'][0], 2) + pow($maxx[1] - $data['min'][1], 2) + pow($maxx[2] - $data['min'][2], 2) + pow($maxx[3] - $data['min'][3], 2)+ pow($maxx[4] - $data['min'][4], 2)+ pow($maxx[5] - $data['min'][5], 2)) + sqrt(pow($data['max'][0] - $maxx[0], 2) + pow($data['max'][1] - $maxx[1], 2) + pow($data['max'][2] - $maxx[2], 2) + pow($data['max'][3] - $maxx[3], 2) + pow($data['max'][4] - $maxx[4], 2) + pow($data['max'][5] - $maxx[5], 2))), $maxx[6]];
        }
        

        array_multisort($data['hasil_ranking_topsis'], SORT_DESC);
        if(count($data['hasil_ranking_topsis'])>=10){
          for ($i=0; $i <10 ; $i++) { 
            $data['hasil_ranking_topsis_10'][] = $data['hasil_ranking_topsis'][$i];
          }
        }else{
          $data['hasil_ranking_topsis_10'] = $data['hasil_ranking_topsis'];
        }
        
        
        $end_time = microtime(true);
        $data['execution_tim'] = ($end_time - $start_time);
        $data['waktu_perhitungan_topsis'] = round($data['execution_tim'],5);

      // Tampilan Score Hasil Ranking
      // echo "<pre>";
      // print_r($data['hasil_ranking_topsis']);
      // echo "</pre>";
      // die;
    }else{
      $data['hasil_ranking_aras'] = [];
      $data['hasil_ranking_topsis'] = [];
      $data['waktu_perhitungan_aras'] = 0;
      $data['waktu_perhitungan_topsis'] = 0;
    }

    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/rekomendasi/rekomendasi", $data);
    $this->load->view("attribute/footer", $setting);
  }
}
