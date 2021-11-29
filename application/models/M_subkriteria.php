<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_subkriteria extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  
  public function fetch_data() {
    $this->db->select('*');
    $this->db->from('subkriteria_tbl a');
    $this->db->join('kriteria_tbl b','a.kriteria_id=b.kriteria_id','LEFT');
    $this->db->order_by("a.kriteria_id", "asc");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function fetch_data_last() {
    $this->db->select('*');
    $this->db->from('subkriteria_tbl a');
    $this->db->join('kriteria_tbl b','a.kriteria_id=b.kriteria_id','LEFT');
    $this->db->order_by("a.kriteria_id", "asc");
    $this->db->limit(4);
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
    $this->db->from('subkriteria_tbl a');
    $this->db->join('kriteria_tbl b','a.kriteria_id=b.kriteria_id','LEFT');
    $this->db->where('a.kriteria_id', $id);
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
    $this->db->insert('subkriteria_tbl', $data);
  }
  
  public function edit($data) {
    $this->db->update('subkriteria_tbl', $data, array(
      'subkriteria_id' => $data['subkriteria_id']
    ));
  }
  
  public function delete($id) {
    $this->db->delete('subkriteria_tbl', array('subkriteria_id' => $id));
  }  
}
?>
