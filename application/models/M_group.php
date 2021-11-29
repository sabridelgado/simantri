<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_group extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  
  public function fetch_data() {
    $this->db->select('*');
    $this->db->from('group_tbl');
    $this->db->order_by("group_id", "asc");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function get($id) {
    $this->db->select('*');
    $this->db->from('group_tbl');
    $this->db->where('group_id', $id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }
  
  public function input($data) {
    $this->db->insert('group_tbl', $data);
  }
  
  public function edit($data) {
    $this->db->update('group_tbl', $data, array(
      'group_id' => $data['group_id']
    ));
  }
  
  public function delete($id) {
    $this->db->delete('group_tbl', array('group_id' => $id));
  }  
}
?>
