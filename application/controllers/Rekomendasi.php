<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Rekomendasi extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_subkriteria');
    $this->load->model('m_kriteria');
    $this->load->model('m_dosen');
    $this->load->model("m_setting");
    #Check rekomendasi login or not
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }

  public function index()
  {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data["hasil_ranking_aras"]        = '';
    $data["hasil_ranking_topsis"]        = '';
    #Generate Template...
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/rekomendasi/rekomendasi", $data);
    $this->load->view("attribute/footer", $setting);
  }




  public function input()
  {
    //Tampilan Cek Waktu Start
    

    $data["keahlian"]            = $this->m_keahlian->fetch_data();
    $data["dosen"]               = $this->m_dosen->fetch_data();
    $metode             = $this->input->post('metode');
    $data['nim_mahasiswa']       = $this->input->post('nim_mahasiswa');
    $data['nama_mahasiswa']      = $this->input->post('nama_mahasiswa');
    $data['judul_skripsi']       = $this->input->post('judul_skripsi');
    $data['topik_skripsi']       = $this->input->post('topik_skripsi');
    $keahlian_detail        = $this->m_keahlian_detail->get($data['topik_skripsi']);

    // if ($metode == 'cpi') {
      $this->benchmark->mark('start');
      foreach ($keahlian_detail as $row) {
        $dosen  = $this->m_dosen->get_perhitungan($row->dosen_id);
        $data['hasil_ranking_cpi'][] = [($row->keahlian_detail_bobot / 2 * 100 * 5) + ($dosen[0]->jabatan_bobot / 1 * 100 * 3) + ($dosen[0]->pendidikan_bobot / 1 * 100 * 2) + ($dosen[0]->status_bobot / 1 * 100 * 3), $row->dosen_id];
      }
      array_multisort($data['hasil_ranking_cpi'], SORT_DESC);

      foreach ($data['hasil_ranking_cpi'] as $lapor => $value) {
        $data['total_ujian_cpi'][] = [$this->m_laporan->total_dosen_pembimbing1($value[1]), $this->m_laporan->total_dosen_pembimbing2($value[1]), $this->m_laporan->total_dosen_penguji1($value[1]), $this->m_laporan->total_dosen_penguji2($value[1]), $this->m_laporan->total_dosen_penguji3($value[1]), ($this->m_laporan->total_dosen_pembimbing1($value[1]) + $this->m_laporan->total_dosen_pembimbing2($value[1]) + $this->m_laporan->total_dosen_penguji1($value[1]) + $this->m_laporan->total_dosen_penguji2($value[1]) + $this->m_laporan->total_dosen_penguji3($value[1])), $value[1]];
      }
      $this->benchmark->mark('end');
      $data['waktu_perhitungan_cpi'] = $this->benchmark->elapsed_time('start', 'end');

    // } else if ($metode == 'topsis') {
      $this->benchmark->mark('start');
      foreach ($keahlian_detail as $row) {
        $dosen  = $this->m_dosen->get_perhitungan($row->dosen_id);
        $keahlian[] = $row->keahlian_detail_bobot;

        //langkah 1
        $data['matriks_d'][] = [$row->keahlian_detail_bobot, $dosen[0]->jabatan_bobot, $dosen[0]->pendidikan_bobot, $dosen[0]->status_bobot, $row->dosen_id];
      }
      foreach ($data['matriks_d'] as $a => $matriks_d) {
        $data['satu'][] = $matriks_d[0];
        $data['dua'][] = $matriks_d[1];
        $data['tiga'][] = $matriks_d[2];
        $data['empat'][] = $matriks_d[3];
        $data['lima'][] = $matriks_d[4];
      }

      $data['satu_a'] = 0;
      for ($i = 0; $i < count($data['satu']); $i++) {
        $data['satu_a'] += pow($data['satu'][$i], 2);
      }
      for ($i = 0; $i < count($data['satu']); $i++) {
        $data['satu_b'][] = $data['satu'][$i] / sqrt($data['satu_a']) * 5;
      }

      $data['dua_a'] = 0;
      for ($i = 0; $i < count($data['dua']); $i++) {
        $data['dua_a'] += pow($data['dua'][$i], 2);
      }
      for ($i = 0; $i < count($data['dua']); $i++) {
        $data['dua_b'][] = $data['dua'][$i] / sqrt($data['dua_a']) * 3;
      }

      $data['tiga_a'] = 0;
      for ($i = 0; $i < count($data['tiga']); $i++) {
        $data['tiga_a'] += pow($data['tiga'][$i], 2);
      }
      for ($i = 0; $i < count($data['tiga']); $i++) {
        $data['tiga_b'][] = $data['tiga'][$i] / sqrt($data['tiga_a']) * 2;
      }

      $data['empat_a'] = 0;
      for ($i = 0; $i < count($data['empat']); $i++) {
        $data['empat_a'] += pow($data['empat'][$i], 2);
      }
      for ($i = 0; $i < count($data['empat']); $i++) {
        $data['empat_b'][] = $data['empat'][$i] / sqrt($data['empat_a']) * 3;
      }

      $data['matriks_d_diputar'] = [$data['satu_b'], $data['dua_b'], $data['tiga_b'], $data['empat_b'], $data['lima']];
      $data['max'] = [max($data['satu_b']), max($data['dua_b']), max($data['tiga_b']), max($data['empat_b'])];
      $data['min'] = [min($data['satu_b']), min($data['dua_b']), min($data['tiga_b']), min($data['empat_b'])];

      for ($i = 0; $i < count($data['empat']); $i++) {
        $data['matriks_r'][] = [$data['matriks_d_diputar'][0][$i], $data['matriks_d_diputar'][1][$i], $data['matriks_d_diputar'][2][$i], $data['matriks_d_diputar'][3][$i], $data['matriks_d_diputar'][4][$i]];
      }

      foreach ($data['matriks_r'] as $maxx) {
        // $data['matriks_s+'][] = [sqrt(pow($data['max'][0] - $maxx[0], 2) + pow($data['max'][1] - $maxx[1], 2) + pow($data['max'][2] - $maxx[2], 2) + pow($data['max'][3] - $maxx[3], 2)), $maxx[4]];

        // $data['matriks_s-'][] = [sqrt(pow($maxx[0] - $data['min'][0], 2) + pow($maxx[1] - $data['min'][1], 2) + pow($maxx[2] - $data['min'][2], 2) + pow($maxx[3] - $data['min'][3], 2)), $maxx[4]];

        // $data['hasil_ranking'][] = [$data['matriks_s-'][0] / $data['matriks_s-'][0] + $data['matriks_s+'][0], $maxx[4]];
        $data['hasil_ranking_topsis'][] = [sqrt(pow($maxx[0] - $data['min'][0], 2) + pow($maxx[1] - $data['min'][1], 2) + pow($maxx[2] - $data['min'][2], 2) + pow($maxx[3] - $data['min'][3], 2)) / (sqrt(pow($maxx[0] - $data['min'][0], 2) + pow($maxx[1] - $data['min'][1], 2) + pow($maxx[2] - $data['min'][2], 2) + pow($maxx[3] - $data['min'][3], 2)) + sqrt(pow($data['max'][0] - $maxx[0], 2) + pow($data['max'][1] - $maxx[1], 2) + pow($data['max'][2] - $maxx[2], 2) + pow($data['max'][3] - $maxx[3], 2))), $maxx[4]];
      }

      array_multisort($data['hasil_ranking_topsis'], SORT_DESC);
      foreach ($data['hasil_ranking_topsis'] as $lapor => $value) {
        $data['total_ujian_topsis'][] = [$this->m_laporan->total_dosen_pembimbing1($value[1]), $this->m_laporan->total_dosen_pembimbing2($value[1]), $this->m_laporan->total_dosen_penguji1($value[1]), $this->m_laporan->total_dosen_penguji2($value[1]), $this->m_laporan->total_dosen_penguji3($value[1]), ($this->m_laporan->total_dosen_pembimbing1($value[1]) + $this->m_laporan->total_dosen_pembimbing2($value[1]) + $this->m_laporan->total_dosen_penguji1($value[1]) + $this->m_laporan->total_dosen_penguji2($value[1]) + $this->m_laporan->total_dosen_penguji3($value[1])), $value[1]];
      }
      $this->benchmark->mark('end');
      $data['waktu_perhitungan_topsis'] = $this->benchmark->elapsed_time('start', 'end');
    // }


    //Tampilan Cek Waktu Finish 
    
    
    // die;

    //Tampilan Score Hasil Ranking
    // echo "<pre>";
    // print_r($data['total_ujian_topsis']);
    // echo "</pre>";
    // die;


    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/rekomendasi/rekomendasi", $data);
    $this->load->view("attribute/footer", $setting);
  }

  public function delete()
  {
    $this->session->set_flashdata('delete', 'rekomendasi <b>' . $this->input->post('rekomendasi_id') . '</b> telah dihapus !');
    $this->m_rekomendasi->delete($this->input->post('rekomendasi_id'));

    $log['log_id']      = "";
    $log['log_time']    = date('Y-m-d H:i:s');
    $log['log_message'] = "Menghapus Data rekomendasi " . $this->input->post('rekomendasi_id');
    $this->m_setting->create_log($log);

    redirect('rekomendasi');
  }
}
