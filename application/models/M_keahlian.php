<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_keahlian extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  
  public function fetch_data() {
    $this->db->select('*');
    $this->db->from('keahlian_tbl');
    // $this->db->order_by("keahlian_id", "asc");
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
    $this->db->from('keahlian_tbl');
    $this->db->where('keahlian_id', $id);
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
    $this->db->insert('keahlian_tbl', $data);
  }
  
  public function edit($data) {
    $this->db->update('keahlian_tbl', $data, array(
      'keahlian_id' => $data['keahlian_id']
    ));
  }
  
  public function delete($id) {
    $this->db->delete('keahlian_tbl', array('keahlian_id' => $id));
  }  
}
?>
