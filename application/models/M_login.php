<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_login extends CI_Model {
  function __construct() {
    parent::__construct();
    $this->load->database();
  }
  
  public function login($data) {
    $this->db->select('*');
    $this->db->where('user_name', $data['username']);
    $this->db->where('user_password', $data['password']);
    return $this->db->get('user_tbl')->row();
  }
  
  function __destruct() {
    $this->db->close();
  }
}
?>