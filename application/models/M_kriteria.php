<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_kriteria extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  
  public function fetch_data() {
    $this->db->select('*');
    $this->db->from('kriteria_tbl');
    // $this->db->order_by("kriteria_id", "asc");
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
    $this->db->from('kriteria_tbl');
    $this->db->where('kriteria_id', $id);
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
    $this->db->insert('kriteria_tbl', $data);
  }
  
  public function edit($data) {
    $this->db->update('kriteria_tbl', $data, array(
      'kriteria_id' => $data['kriteria_id']
    ));
  }
  
  public function delete($id) {
    $this->db->delete('kriteria_tbl', array('kriteria_id' => $id));
  }  
}
?>
