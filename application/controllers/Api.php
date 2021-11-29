<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Api extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('m_api');
    $this->load->library('upload');
  }

  public function input_monitoring()
  {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    http_response_code(200);


    $data['id_sungai'] 			        			= $this->input->post('id_sungai');
 
		$data['intensitas_hujan'] 					 	= $this->input->post('rain_level');
		$data['waktu_hujan'] 			 		    		= date('Y-m-d H:i:s');
		$data['ketinggian_sungai']			 			= $this->input->post('water_level');
		$data['ketinggian_sungai_sebenarnya']	= $this->input->post('water_level');
		$data['waktu_sungai'] 			 			   	= date('Y-m-d H:i:s');
    
    $this->m_api->input_monitoring($data);
    
    $resultData = array(
      'respon_code' => 'RC200',
      'status'      => true,
      'message'     => 'Selamat, Anda berhasil mendaftar, Silahkan Login kembali !',
    );
    echo json_encode($resultData, JSON_PRETTY_PRINT);
  }

  public function login_account()
  {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    http_response_code(200);

    $username = $this->input->post('username');
    $password = md5($this->input->post('password'));
    $cek      = $this->m_api->check_account($username, $password);
    if ($cek) {
      $data_member = $this->m_api->check_account($username, $password);
      $resultData  = array(
        'respon_code' => 'RC200',
        'status'      => true,
        'message'     => 'Akun Valid',
        'data'        => $data_member[0],
      );
    } else {
      $resultData = array(
        'respon_code' => 'RC200',
        'status'      => false,
        'message'     => 'Akun Tidak ditemukan silahkan registrasi !',
      );
    }


    echo json_encode($resultData, JSON_PRETTY_PRINT);
  }

  public function get_mk()
  {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    http_response_code(200);

    $konselor    = $this->m_api->getMk();
    $resultData = $konselor;

    echo json_encode($resultData, JSON_PRETTY_PRINT);
  }

  public function daftar_aspra()
  {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    http_response_code(200);

    $tahun_ajaran = $this->m_api->getTahunAjaranLast();
    $data['nim_mahasiswa']        = $this->input->post('nim_mahasiswa');
    $data['nilai_praktikum']      = $this->input->post('nilai_praktikum');
    $data['nilai_mk']             = $this->input->post('nilai_mk');
    $data['semester']             = $this->input->post('semester');
    $data['asisten_berapakali']   = $this->input->post('asisten_berapakali');
    $data['rekomendasi']          = $this->input->post('rekomendasi');
    $data['ipk']                  = $this->input->post('ipk');
    $data['matakuliah_id']        = $this->input->post('matakuliah_id');
    $data['tahun_ajaran_id']      = $tahun_ajaran[0]->tahun_ajaran_id;
    $data['status']      = 0;
    $this->m_api->daftarAspra($data);

    $resultData = array(
      'respon_code' => 'RC200',
      'status'      => true,
      'message'     => 'Selamat, Anda berhasil mendaftar, Silahkan Menunggu pengumuman!',
    );
    echo json_encode($resultData, JSON_PRETTY_PRINT);
  }

  public function get_riwayat_pendaftaran()
  {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    http_response_code(200);

    $riwayat    = $this->m_api->get_riwayat_calon_aspra($this->input->get('mahasiswa_nim'));
    $resultData = array(
      'respon_code' => 'RC200',
      'status'      => true,
      'message'     => 'Data Riwayat Saya',
      'data'        => array(
        'riwayat' => $riwayat,
      ),
    );

    echo json_encode($resultData, JSON_PRETTY_PRINT);
  }

  public function get_profile()
  {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    http_response_code(200);

    $profile    = $this->m_api->getProfile($this->input->get('orangtua_id'));
    $resultData = array(
      'respon_code' => 'RC200',
      'status'      => true,
      'message'     => 'Data Profil Saya',
      'data'        => array(
        'profile' => $profile,
      ),
    );

    echo json_encode($resultData, JSON_PRETTY_PRINT);
  }

  public function get_notifikasi()
  {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    http_response_code(200);

    $notif    = $this->m_api->get_notifikasi($this->input->get('mahasiswa_nim'));
    $resultData = $notif;

    echo json_encode($resultData, JSON_PRETTY_PRINT);
  }

  
  public function send(){
	/* Kirim Pesan */
	$msg = array
		(
		'body'  => 'INFORMASI KELULUSAN CALON ASISTEN PRAKTIKUM FAKULTAS MIPA JURUSAN KIMIA, SILAHKAN BUKA APLIKASI UNTUK MELIHAT',
		'title' => 'PENGUMUMAN',
		);

    $server_key = 'AAAAaqiM5T4:APA91bFvDww2ExfsHatp32dlQiNWSHk0dQpn30asLOFXN_96aLnvTmLc1JWtKAF9Nqa3jBm0I5XktA7BEkevyKKEYgaVZDmBTyS7ObEAfSwrjPC_yKenBskFta8W5GdlAO7kJSJT5dcc';

                    $url            = 'https://fcm.googleapis.com/fcm/send';
            $fields['to']           = '/topics/'.$this->input->get('kartu_id');
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
    exit;
		
	}
}
