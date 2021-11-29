<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Front extends CI_Controller {
  function __construct() {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_employee");
    $this->load->model("m_rules");
    $this->load->model("m_news");
    $this->load->model("m_plot");
    $this->load->model("m_rules_category");
    $this->load->model("m_rules");
    $this->load->model("m_aduan");
    $this->load->model("m_widget");
    $this->load->model("m_proper");
    $this->load->model("m_user");
    $this->load->model("m_setting");
  }
  
  public function index() {

    $visit['visit_id']      ="";
    $visit['visit_date']    =date('Y-m-d H:i:s');
    $this->m_setting->create_visit($visit);

    $data['employee'] = $this->m_employee->fetch_data();
    $data['rules']    = $this->m_rules->fetch_data_last();
    $data['news']     = $this->m_news->fetch_data_last();
    $data['total_aduan']      = $this->m_widget->total_aduan();
    $data['total_alur']       = $this->m_widget->total_alur();
    $data['total_rules']      = $this->m_widget->total_rules();
    $data['total_proper']     = $this->m_widget->total_proper_terdaftar();
    $this->load->view("attribute/front/index",$data);
  }
  /*Profil*/
  public function visi_misi() {
    $this->load->view("attribute/front/header");
    $this->load->view("attribute/front/profil/visi_misi");
    $this->load->view("attribute/front/footer");
  }
  public function struktur_organisasi() {
    $this->load->view("attribute/front/header");
    $this->load->view("attribute/front/profil/struktur_organisasi");
    $this->load->view("attribute/front/footer");
  }
  public function profil_pejabat() {
    $data['employee'] = $this->m_employee->fetch_data();
    $this->load->view("attribute/front/header");
    $this->load->view("attribute/front/profil/profil_pejabat",$data);
    $this->load->view("attribute/front/footer");
  }
  /*Alur*/
  public function alur() {
    $data['alur'] = $this->m_plot->fetch_data();
    $this->load->view("attribute/front/header");
    $this->load->view("attribute/front/alur/alur",$data);
    $this->load->view("attribute/front/footer");
  }
  /*Regulasi*/
  public function regulasi() {
    $data['regulasi'] = $this->m_rules_category->fetch_data();
    $this->load->view("attribute/front/header");
    $this->load->view("attribute/front/regulasi/regulasi",$data);
    $this->load->view("attribute/front/footer");
  }
  public function regulasi_detail() {
    $data['regulasi'] = $this->m_rules->getAll($this->uri->segment(3));
    $this->load->view("attribute/front/header");
    $this->load->view("attribute/front/regulasi/regulasi_detail",$data);
    $this->load->view("attribute/front/footer");
  }
  /*Berita*/
  public function berita() {
    $data['berita'] = $this->m_news->fetch_data();
    $this->load->view("attribute/front/header");
    $this->load->view("attribute/front/berita/berita",$data);
    $this->load->view("attribute/front/footer");
  }
  public function berita_detail() {
    $data['berita'] = $this->m_news->get($this->uri->segment(3));
    $this->load->view("attribute/front/header");
    $this->load->view("attribute/front/berita/berita_detail",$data);
    $this->load->view("attribute/front/footer");
  }
  /*Pengaduan*/
  public function create_pengaduan() {
  
    $this->load->view("attribute/front/header");
    $this->load->view("attribute/front/pengaduan/create_pengaduan");
    $this->load->view("attribute/front/footer");
  }
  public function input_pengaduan() {
  
    $data['aduan_id']                 = "";
    $data['aduan_tanggal']            = date('Y-m-d');
    $data['aduan_waktu']              = date('H:i:s');
    $data['aduan_nama']               = $this->input->post('aduan_nama');
    $data['aduan_alamat']             = $this->input->post('aduan_alamat');
    $data['aduan_nohp']               = $this->input->post('aduan_nohp');
    $data['aduan_alamat_kejadian']    = $this->input->post('aduan_alamat_kejadian');
    $data['aduan_jeniskegiatan']      = $this->input->post('aduan_jeniskegiatan');
    $data['aduan_namakegiatan']       = $this->input->post('aduan_namakegiatan');
    $data['aduan_waktudiketahui']     = $this->input->post('aduan_waktudiketahui');
    $data['aduan_uraiankejadian']     = $this->input->post('aduan_uraiankejadian');
    $data['aduan_dampakdirasakan']    = $this->input->post('aduan_dampakdirasakan');
    $data['aduan_penyelesaian']       = $this->input->post('aduan_penyelesaian');
    $this->session->set_flashdata('add', 'Berhasil Kirim Aduan ke DLHK. Aduan akan segera di proses. Terimakasih !');
    $this->m_aduan->input($data);
    redirect('front/create_pengaduan');
  }
  public function list_pengaduan() {
    $data['aduan'] = $this->m_aduan->fetch_data();
    $this->load->view("attribute/front/header");
    $this->load->view("attribute/front/pengaduan/list_pengaduan",$data);
    $this->load->view("attribute/front/footer");
  }
  public function detail_pengaduan() {
    $data['aduan'] = $this->m_aduan->get($this->uri->segment(3));
    $this->load->view("attribute/front/header");
    $this->load->view("attribute/front/pengaduan/detail_pengaduan",$data);
    $this->load->view("attribute/front/footer");
  }
  /*Proper*/
  public function create_proper() {
  
    $this->load->view("attribute/front/header");
    $this->load->view("attribute/front/seniman/create_proper");
    $this->load->view("attribute/front/footer");
  }
  public function input_proper() {
  
    /*$data['proper_id']                 = "";
    $data['proper_nama_kegiatan']      = $this->input->post('proper_nama_kegiatan');
    $data['proper_nama_pemrakarsa']    = $this->input->post('proper_nama_pemrakarsa');
    $data['proper_nomor_izin']         = $this->input->post('proper_nomor_izin');
    $data['proper_tanggal_izin']       = $this->input->post('proper_tanggal_izin');
    $data['proper_alamat']             = $this->input->post('proper_alamat');
    $data['proper_sektor']             = $this->input->post('proper_sektor');
    $data['proper_jenis_dokling']      = $this->input->post('proper_jenis_dokling');
    $this->session->set_flashdata('add', 'Berhasil Kirim Data Seniman Proper ke DLHK. Data akan segera di proses dan dilakukan pemeriksaan. Terimakasih !');
    $this->m_proper->input($data);
    redirect('front/create_proper');*/


    $data['user_id']                   = "";
    $data['user_bussiness']            = $this->input->post('proper_nama_kegiatan');
    $data['user_fullname']             = $this->input->post('proper_nama_pemrakarsa');
    $data['user_address']              = $this->input->post('proper_alamat');
    $data['user_sector']               = $this->input->post('proper_sektor');
    $data['group_id']                  = 3;

    /*Akun*/
    $data['user_name']                 = $this->input->post('username');
    $data['user_password']             = md5($this->input->post('password'));

    $this->session->set_flashdata('add', 'Akun <b>'.$data['user_name'].'</b> untuk kegiatan/usaha <b>'.$data['user_bussiness'].'</b> Berhasil Mendaftar Sebagai Seniman Proper di DLHK. Silahkan melakukan pengajuan pemeriksaan dokumen lingkungan untuk kegiatan/usaha anda. Untuk melakukan pengajuan silahkan login sesuai dengan akun yang telah anda buat. Terimakasih !');
    $this->m_user->create_user($data);
    redirect('front/create_proper');
  }
  public function list_proper() {
    $data['proper'] = $this->m_proper->fetch_data(2);
    $this->load->view("attribute/front/header");
    $this->load->view("attribute/front/seniman/list_proper",$data);
    $this->load->view("attribute/front/footer");
  }
  /*Peta*/


  public function peta() {
    $data['proper'] = $this->m_proper->fetch_data_peta(2);
    $this->load->view("attribute/front/header");
    $this->load->view("attribute/front/peta/peta", $data);
    $this->load->view("attribute/front/footer");
  }
  
  
  
  
}
?>