<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_api extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }
  public function input_monitoring($data) {
    $this->db->insert('monitoring', $data);
  }
  /* LOGIN SECTION */
  public function check_account($username, $password)
  {
    $this->db->select('*');
    $this->db->from('user_tbl a');
    $this->db->join('group_tbl b', 'a.group_id=b.group_id', 'LEFT');
    $this->db->join('mahasiswa_tbl c', 'a.nomor_induk=c.mahasiswa_nim', 'LEFT');
    $this->db->where('a.user_name', $username);
    $this->db->where('a.user_password', $password);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  /* Daftar SECTION */
  public function daftarAkun($datas)
  {
    #insert data
    $this->db->insert('user_tbl', $datas);
  }

  public function daftarMahasiswa($datas)
  {
    #insert data
    $this->db->insert('mahasiswa_tbl', $datas);
  }

  public function daftarAspra($datas)
  {
    #insert data
    $this->db->insert('calon_aslab_tbl', $datas);
  }

  public function insert_notifikasi($data)
  {
    #insert data
    $this->db->insert('notifikasi_tbl', $data);
  }

  public function getMk()
  {
    $this->db->select('*');
    $this->db->from('matakuliah_tbl');
    $query = $this->db->get();
    return $query->result();
  }

  public function getTahunAjaranLast()
  {
    $this->db->select('*');
    $this->db->from('tahun_ajaran_tbl');
    $this->db->order_by("tahun_ajaran_id", "desc");
    $query = $this->db->get();
    return $query->result();
  }

  public function get_riwayat_calon_aspra($nim)
  {
    $this->db->select('*');
    $this->db->from('calon_aslab_tbl a');
    $this->db->join('mahasiswa_tbl b', 'a.nim_mahasiswa=b.mahasiswa_nim', 'LEFT');
    $this->db->join('relasi_dosen_mk_tbl i', 'a.matakuliah_id=i.matakuliah_id', 'LEFT');
    $this->db->join('dosen_tbl j', 'i.dosen_id=j.dosen_id', 'LEFT');
    $this->db->join('matakuliah_tbl c', 'a.matakuliah_id=c.matakuliah_id', 'LEFT');
    $this->db->where('b.mahasiswa_nim', $nim);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function get_notifikasi($nim)
  {
    $this->db->select('*');
    $this->db->from('notifikasi_tbl');
    $this->db->where('mahasiswa_nim', $nim);
    $query = $this->db->get();
    return $query->result();
  }

















  public function check_account_2($username, $password)
  {
    $this->db->select('c.orangtua_id as id, c.orangtua_email as email, c.orangtua_nama as parent_name, c.orangtua_phone as parent_phone, c.orangtua_alamat as parent_address, c.kartu_id');
    $this->db->from('user_tbl a');
    $this->db->join('group_tbl b', 'a.group_id=b.group_id', 'LEFT');
    $this->db->join('orangtua_tbl c', 'a.user_name=c.orangtua_email', 'LEFT');
    $this->db->where('a.user_name', $username);
    $this->db->where('a.user_password', $password);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function getProfile($orangtua_id)
  {
    $this->db->select('*');
    $this->db->from('anak_tbl a');
    $this->db->join('orangtua_tbl b', 'a.orangtua_id=b.orangtua_id', 'LEFT');
    $this->db->where('a.orangtua_id', $orangtua_id);
    $query = $this->db->get();
    return $query->result();
  }

  public function getVideo()
  {
    $this->db->select('*');
    $this->db->from('video_tbl');
    $query = $this->db->get();
    return $query->result();
  }


  
  public function getVideoPerVideo($id)
  {
    $this->db->select('*');
    $this->db->from('video_tbl');
    // $this->db->join('orangtua_tbl b', 'a.orangtua_id=b.orangtua_id', 'LEFT');
    $this->db->where('video_id', $id);
    $query = $this->db->get();
    return $query->result();
  }

  public function getObservasi($orangtua_id)
  {
    $this->db->select('i.*,a.*,b.*,c.*,e.video_nama as video_nama2, e.video_judul as video_judul2, e.video_deskripsi as video_deskripsi2, e.video_tgl_upload as video_tgl_upload2,f.video_nama as video_nama3, f.video_judul as video_judul3, f.video_deskripsi as video_deskripsi3, f.video_tgl_upload as video_tgl_upload3,g.video_nama as video_nama4, g.video_judul as video_judul4, g.video_deskripsi as video_deskripsi4, g.video_tgl_upload as video_tgl_upload4,d.video_nama as video_nama, d.video_judul as video_judul, d.video_deskripsi as video_deskripsi, d.video_tgl_upload as video_tgl_upload,h.video_nama as video_nama5, h.video_judul as video_judul5, h.video_deskripsi as video_deskripsi5, h.video_tgl_upload as video_tgl_upload5');
    $this->db->from('observasi_tbl a');
    $this->db->join('anak_tbl b', 'a.anak_id=b.anak_id', 'LEFT');
    $this->db->join('orangtua_tbl c', 'c.orangtua_id=b.orangtua_id', 'LEFT');
    $this->db->join('video_tbl d', 'a.video_id=d.video_id', 'LEFT');
    $this->db->join('video_tbl e', 'a.video_id2=e.video_id', 'LEFT');
    $this->db->join('video_tbl f', 'a.video_id3=f.video_id', 'LEFT');
    $this->db->join('video_tbl g', 'a.video_id4=g.video_id', 'LEFT');
    $this->db->join('video_tbl h', 'a.video_id5=h.video_id', 'LEFT');
    $this->db->join('terapis_tbl i', 'i.terapis_id=a.terapis_id', 'LEFT');
    $this->db->where('c.orangtua_id', $orangtua_id);
    $query = $this->db->get();
    return $query->result();
  }
  
  public function addBookmark($datas)
  {
    #insert data
    $this->db->insert('bookmark_tbl', $datas);
  }
  
  public function getBookmark($orangtua_id)
  {
    $this->db->select('*');
    $this->db->from('bookmark_tbl a');
    $this->db->join('orangtua_tbl c', 'c.orangtua_id=a.orangtua_id', 'LEFT');
    $this->db->join('video_tbl d', 'a.video_id=d.video_id', 'LEFT');
    $this->db->where('c.orangtua_id', $orangtua_id);
    $query = $this->db->get();
    return $query->result();
  }
  
  public function cekBookmark($orangtua_id,$video_id)
  {
    $this->db->select('*');
    $this->db->from('bookmark_tbl a');
    $this->db->join('orangtua_tbl c', 'c.orangtua_id=a.orangtua_id', 'LEFT');
    $this->db->join('video_tbl d', 'a.video_id=d.video_id', 'LEFT');
    $this->db->where('c.orangtua_id', $orangtua_id);
    $this->db->where('d.video_id', $video_id);
    $query = $this->db->get();
    return $query->result();
  }
  
  public function editVideo($data) {
    $this->db->update('video_tbl', $data, array(
      'video_id' => $data['video_id']
    ));
  }

































  

  /* Konselor SECTION */
  public function getKonselor()
  {
    $query = $this->db->query("SELECT * from konselor_tbl");
    return $query->result();
  }

  /* modul SECTION */
  public function getModul($modul_jenis_id)
  {
    $this->db->select('*');
    $this->db->from('modul_tbl a');
    $this->db->join('modul_jenis_tbl b', 'a.modul_jenis_id=b.modul_jenis_id', 'LEFT');
    $this->db->where('a.modul_jenis_id', $modul_jenis_id);
    $query = $this->db->get();
    return $query->result();
  }

  /* Data PIK SECTION */
  public function getDataPik()
  {
    $query = $this->db->query("SELECT * from data_pik_tbl");
    return $query->result();
  }

  /* Genre SECTION */
  public function getGenre()
  {
    $this->db->select('*');
    $this->db->from('genre_tbl a');
    $this->db->join('genre_jenis_tbl b', 'a.genre_jenis_id=b.genre_jenis_id', 'LEFT');
    $query = $this->db->get();
    return $query->result();
  }

  /* Genre Profile SECTION */
  public function getProfilGenre()
  {
    $query = $this->db->query("SELECT * from profil_genre_tbl");
    return $query->result();
  }

  /* PROFILE SECTION */
 

  public function getEvent()
  {
    $query = $this->db->query("SELECT * from event_tbl");
    return $query->result();
  }

  public function getGemaSeputarGenre($level)
  {
    $query = $this->db->query("SELECT * from gema_seputar_genre_tbl WHERE gema_seputar_genre_level='$level'");
    return $query->result();
  }

  /* Gema SECTION */
  public function getGemaTesKepribadian($start, $limit)
  {
    $this->db->select('a.gema_tes_kepribadian_id,a.gema_tes_kepribadian_soal,b.gema_tes_kepribadian_subtipe_nama as setuju, c.gema_tes_kepribadian_subtipe_nama as tidak_setuju');
    $this->db->from('gema_tes_kepribadian_tbl a');
    $this->db->join('gema_tes_kepribadian_subtipe_tbl b', 'a.setuju=b.gema_tes_kepribadian_subtipe_id', 'LEFT');
    $this->db->join('gema_tes_kepribadian_subtipe_tbl c', 'a.tidak_setuju=c.gema_tes_kepribadian_subtipe_id', 'LEFT');
    $this->db->order_by("a.gema_tes_kepribadian_id", "asc");
    $this->db->limit($limit, $start);
    $query = $this->db->get();
    return $query->result();
  }
  public function getGemaTesKepribadianSubtipe($status)
  {
    // $this->db->select('*');
    // $this->db->from('gema_tes_kepribadian_tipe_tbl');
    // $this->db->where('gema_tes_kepribadian_tipe_nama', $status);
    $query = $this->db->query("SELECT * from gema_tes_kepribadian_tipe_tbl WHERE gema_tes_kepribadian_tipe_nama='$status' ");
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    } else {
      $query = $this->db->query("SELECT * from gema_tes_kepribadian_tipe_tbl");
      return $query->result();
    }
    return false;
    // return $query->result();
  }
  public function getGemaTesKepribadianSubBagian()
  {
    $query = $this->db->query("SELECT * from gema_tes_kepribadian_subtipe_tbl");
    return $query->result();
  }

  /* Gema Toxic SECTION */
  public function getGemaToxicSoal()
  {
    $this->db->select('*');
    $this->db->from('gema_toxic_soal_tbl a');
    $this->db->join('gema_toxic_narasi_tbl b', 'a.gema_toxic_narasi_id=b.gema_toxic_narasi_id', 'LEFT');
    $query = $this->db->get();
    return $query->result();
  }

  /* Gema Toxic SECTION */
  public function getGemaToxicJawaban()
  {
    $this->db->select('*');
    $this->db->from('gema_toxic_jawaban_tbl a');
    $this->db->join('gema_toxic_soal_tbl b', 'a.gema_toxic_soal_id=b.gema_toxic_soal_id', 'LEFT');
    $query = $this->db->get();
    return $query->result();
  }


























  public function getAccountPassword($id)
  {
    $query = $this->db->query("SELECT password_member from table_member WHERE member_id='$id'");
    return $query->result();
  }




















  /* GENERATION & REFERRAL SECTION */
  public function getReferal($id)
  {
    $this->db->select('m.member_name, m.member_phone,m.member_address');
    $this->db->from('table_member m');
    $this->db->join('table_generation g', 'g.user_down=m.member_id', 'LEFT');
    $this->db->where('g.user_up', $id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function cek_down_member($id)
  {
    $query = $this->db->query("SELECT count(*) as nilai FROM table_generation WHERE user_up='$id'");
    return $query->result();
  }

  public function cekRegistrationCode($code)
  {
    $query  = $this->db->query("select * from table_register where register_code='$code'");
    return $query->result();
  }

  public function update_member($data)
  {
    #Update data
    $this->db->update('table_member', $data, array('member_id' => $data['member_id']));
  }

  public function create_generation($datas)
  {
    #insert data
    $this->db->insert('table_generation', $datas);
  }




  public function count_g1($id)
  {
    $query = $this->db->query("SELECT COUNT(*) AS total_g1 FROM table_generation g LEFT JOIN table_member m ON m.member_id = g.user_down WHERE g.user_up = '$id'");
    return $query->result();
  }

  public function count_g2($id)
  {
    $query = $this->db->query("SELECT COUNT(*) AS total_g2 FROM table_generation g LEFT JOIN table_member m ON m.member_id = g.user_down WHERE g.user_up IN (SELECT user_down FROM table_generation WHERE user_up = '$id')");
    return $query->result();
  }

  public function count_g3($id)
  {
    $query = $this->db->query("SELECT COUNT(*) AS total_g3 FROM table_generation g LEFT JOIN table_member m ON m.member_id = g.user_down WHERE g.user_up IN (SELECT user_down FROM table_generation WHERE user_up IN (SELECT user_down FROM table_generation WHERE user_up = '$id'))");
    return $query->result();
  }

  public function g1($id)
  {
    $query = $this->db->query("SELECT g.user_down as G1, m.member_name, m.member_address,m.member_phone,m.member_registrationdate FROM table_generation g LEFT JOIN table_member m ON m.member_id = g.user_down WHERE g.user_up = '$id'");
    return $query->result();
  }

  public function g2($id)
  {
    $query = $this->db->query("SELECT g.user_down as G2, m.member_name, m.member_address,m.member_phone,m.member_registrationdate FROM table_generation g LEFT JOIN table_member m ON m.member_id = g.user_down WHERE g.user_up IN (SELECT user_down FROM table_generation WHERE user_up = '$id')");
    return $query->result();
  }

  public function g3($id)
  {
    $query = $this->db->query("SELECT g.user_down as G3, m.member_name, m.member_address,m.member_phone,m.member_registrationdate FROM table_generation g LEFT JOIN table_member m ON m.member_id = g.user_down WHERE g.user_up IN (SELECT user_down FROM table_generation WHERE user_up IN (SELECT user_down FROM table_generation WHERE user_up = '$id'))");
    return $query->result();
  }


  /* TRANSACTION SECTION */
  public function getTransactionHistory($id)
  {
    $this->db->select('t.transaction_id, t.transaction_status, t.transaction_paymethod, t.transaction_totalprice, t.transaction_date, t.transaction_shipping_address, t.transaction_shipping_time, t.transaction_shipping_detail');
    $this->db->from('table_transaction t');
    $this->db->join('table_member m', 'm.member_id=t.member_id', 'LEFT');
    $this->db->join('table_outlet s', 's.outlet_id=t.outlet_id', 'LEFT');
    $this->db->where('t.member_id', $id);
    $this->db->order_by("t.transaction_date", "desc");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function getTransactionHistoryProses($id)
  {
    $this->db->select('t.transaction_id, t.transaction_status, t.transaction_paymethod, t.transaction_totalprice, t.transaction_date, t.transaction_shipping_address, t.transaction_shipping_time, t.transaction_shipping_detail');
    $this->db->from('table_transaction t');
    $this->db->join('table_member m', 'm.member_id=t.member_id', 'LEFT');
    $this->db->join('table_outlet s', 's.outlet_id=t.outlet_id', 'LEFT');
    $this->db->where('m.member_id', $id);
    $this->db->where('t.transaction_status', 'Proses');
    $this->db->order_by("t.transaction_date", "desc");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function getTransactionHistoryDetail($id)
  {
    $this->db->select('tp.transaction_id, tp.product_id, p.product_name, tp.product_amount, tp.product_price, tp.product_totalprice');
    $this->db->from('table_transactiondetail tp');
    $this->db->join('table_product p', 'tp.product_id=p.product_id', 'LEFT');
    $this->db->where('tp.transaction_id', $id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return null;
  }



  /* PRODUCT SECTION */
  public function getProductCategory()
  {
    $this->db->select('*');
    $this->db->from('table_productcategory');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return null;
  }


  public function getProduct($search)
  {
    $this->db->select('a.product_id, a.product_name, a.product_price, a.product_picture, b.productcategory_id, b.productcategory_name');
    $this->db->from('table_product a');
    $this->db->join('table_productcategory b', 'a.productcategory_id=b.productcategory_id', 'LEFT');
    if ($search != "") {
      $this->db->like("a.product_name", $search);
    }
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return null;
  }

  public function getProductDetail($id)
  {
    $this->db->select('a.product_id, a.product_name, a.product_price, a.product_picture, b.productcategory_id, b.productcategory_name');
    $this->db->from('table_product a');
    $this->db->join('table_productcategory b', 'a.productcategory_id=b.productcategory_id', 'LEFT');
    $this->db->where('a.product_id', $id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return null;
  }


  public function getProductbyCategory($id)
  {
    $this->db->select('a.product_id, a.product_name, a.product_price, a.product_picture, b.productcategory_id, b.productcategory_name');
    $this->db->from('table_product a');
    $this->db->join('table_productcategory b', 'a.productcategory_id=b.productcategory_id', 'LEFT');
    $this->db->where('a.productcategory_id', $id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return null;
  }

  public function searchProduct($search)
  {
    $this->db->select('a.product_id, a.product_name, a.product_price, a.product_picture, b.productcategory_id, b.productcategory_name');
    $this->db->from('table_product a');
    $this->db->join('table_productcategory b', 'a.productcategory_id=b.productcategory_id', 'LEFT');
    $this->db->like("a.product_name", $search);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return null;
  }


  /* TRANSACTION SECTION */
  public function getProductByID($barcode)
  {
    $this->db->select('product_id');
    $this->db->from('table_product');
    $this->db->where('product_barcode', $barcode);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function getCartItemByProduct($product, $outlet, $user)
  {
    $this->db->select('*');
    $this->db->from('table_cart_online');
    $this->db->where('product_id', $product);
    $this->db->where('outlet_id', $outlet);
    $this->db->where('member_id', $user);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }


  public function create_cart($data)
  {
    $this->db->insert('table_cart_online', $data);
  }

  public function update_cart($data)
  {
    $this->db->update('table_cart_online', $data, array('cart_online_id' => $data['cart_online_id']));
  }

  public function delete_cart($id)
  {
    $this->db->delete('table_cart_online', array('cart_online_id' => $id));
  }

  public function getCart($user, $outlet)
  {
    $this->db->select('a.cart_online_id, a.product_id, b.product_name, b.product_price, b.product_picture, a.quantity');
    $this->db->from('table_cart_online a');
    $this->db->join('table_product b', 'a.product_id=b.product_id', 'LEFT');
    $this->db->where('a.outlet_id', $outlet);
    $this->db->where('a.member_id', $user);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function create_detail_transaction($data)
  {
    $this->db->insert('table_transactiondetail', $data);
  }

  public function cek_productoutlet($product, $outlet)
  {
    $query  = $this->db->query("select * from table_productoutlet where product_id='$product' and outlet_id='$outlet'");
    return $query->result();
  }

  public function update_productoutlet($data)
  {
    $this->db->update('table_productoutlet', $data, array('productoutlet_id' => $data['productoutlet_id']));
  }

  public function create_transaction($data)
  {
    #Insert data
    $this->db->insert('table_transaction', $data);
  }


  public function s1($id)
  {
    $query = $this->db->query("SELECT g.user_up as s1, m.* FROM table_generation g LEFT JOIN table_member m ON m.member_id = g.user_up WHERE g.user_down = '$id'");
    return $query->result();
  }

  public function s2($id)
  {
    $query = $this->db->query("SELECT g.user_up as s2, m.* FROM table_generation g LEFT JOIN table_member m ON m.member_id = g.user_up WHERE g.user_down IN (SELECT user_up FROM table_generation WHERE user_down = '$id')");
    return $query->result();
  }

  public function s3($id)
  {
    $query = $this->db->query("SELECT g.user_up as s3, m.* FROM table_generation g LEFT JOIN table_member m ON m.member_id = g.user_up WHERE g.user_down IN (SELECT user_up FROM table_generation WHERE user_down IN (SELECT user_up FROM table_generation WHERE user_down = '$id'))");
    return $query->result();
  }


  public function savePoin($datass)
  {
    $this->db->insert('table_poin', $datass);
  }

  public function create_jurnalumumoutlet($data)
  {
    $this->db->insert('table_jurnalumumoutlet', $data);
  }

  public function removeCart($outlet, $id)
  {
    $this->db->delete('table_cart_online', array('outlet_id' => $outlet, 'member_id' => $id));
  }


  public function reportNilaiTransaksiByDay($id)
  {
    $today = date('Y-m-d');
    $query  = $this->db->query("select sum(transaction_totalprice) as nilaitransaksiharian from table_transaction t WHERE DATE(t.transaction_date)='$today' AND t.member_id='$id'");
    return $query->result();
  }

  public function reportNilaiTransaksiByMonth($id)
  {
    $query  = $this->db->query("select sum(transaction_totalprice) as nilaitransaksibulanan from table_transaction t WHERE MONTH(t.transaction_date) = (SELECT MONTH(CURDATE())) AND YEAR(t.transaction_date) = (SELECT YEAR(CURDATE())) AND t.member_id='$id'");
    return $query->result();
  }

  public function reportTotalTransaksiAll($id)
  {
    $query  = $this->db->query("select sum(transaction_totalprice) as totaltransaksi from table_transaction WHERE member_id='$id'");
    return $query->result();
  }

  // SECTION WISHLIST

  public function getWishlist($user, $outlet)
  {
    $this->db->select('a.wishlist_id, a.product_id, b.product_name, b.product_price, b.product_picture');
    $this->db->from('table_wishlist a');
    $this->db->join('table_product b', 'a.product_id=b.product_id', 'LEFT');
    $this->db->where('a.outlet_id', $outlet);
    $this->db->where('a.member_id', $user);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }


  public function getWishlistItemByProduct($product, $outlet, $user)
  {
    $this->db->select('*');
    $this->db->from('table_wishlist');
    $this->db->where('product_id', $product);
    $this->db->where('outlet_id', $outlet);
    $this->db->where('member_id', $user);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }


  public function create_wishlist($data)
  {
    $this->db->insert('table_wishlist', $data);
  }

  public function delete_wishlist($id)
  {
    $this->db->delete('table_wishlist', array('wishlist_id' => $id));
  }
}
