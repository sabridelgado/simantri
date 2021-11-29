<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class m_widget extends CI_Model{
  function __construct() {
    parent::__construct();
    $this->load->database();  
  }
  public function total_dosen(){
    $query  = $this->db->query("SELECT * FROM relasi_dosen_mk_tbl");
    return $query->num_rows();
  }
  public function total_keahlian(){
    $query  = $this->db->query("SELECT * FROM asisten_praktikum_tbl");
    return $query->num_rows();
  }public function total_keahlian_detail(){
    $query  = $this->db->query("SELECT * FROM calon_aslab_tbl");
    return $query->num_rows();
  }public function total_laporan(){
    $query  = $this->db->query("SELECT * FROM sungai");
    return $query->num_rows();
  }

  public function total_group(){
    $query  = $this->db->query("SELECT * FROM group_tbl");
    return $query->num_rows();
  }
  public function total_user(){
    $query  = $this->db->query("SELECT * FROM user_tbl");
    return $query->num_rows();
  }
  

  
  
  function __destruct() {
    $this->db->close();
  }
}
