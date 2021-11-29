<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_setting extends CI_Model {
  
  function __construct() {
    parent::__construct();
  }

  /*For Dashboard*/

  public function total_user() {
    $this->db->select('*');
    $this->db->from('user_tbl');
    $this->db->where('user_group',2);
    return $this->db->count_all_results();
  }


  public function fetch_setting() {
    $this->db->select("*");
    $this->db->from('setting_tbl');
    $this->db->where('setting_id', 1);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function update_setting($data) {
    $this->db->update('setting_tbl', $data, array('setting_id' => $data['setting_id']));
  }

  


}
?>