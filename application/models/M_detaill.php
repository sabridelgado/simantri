<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_detaill extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  
  public function fetch_data() {
    $this->db->select('*');
    $this->db->from('sungai a');
    $this->db->join('monitoring b','a.id_sungai=b.id_sungai','LEFT');
    $this->db->join('detail c','b.id_sungai=c.id_sungai','LEFT');
    $this->db->order_by("a.id_sungai", "asc");
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
    $this->db->from('detaill_tbl a');
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
    $this->db->from('sungai a');
    $this->db->join('monitoring b','a.id_sungai=b.id_sungai','LEFT');
    $this->db->join('detail c','b.id_sungai=c.id_sungai','LEFT');
    $this->db->order_by("a.id_sungai", "asc");
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
    $this->db->insert('detaill_tbl', $data);
  }
  
  public function edit($data) {
    $this->db->update('detaill_tbl', $data, array(
      'detaill_id' => $data['detaill_id']
    ));
  }
  
  public function delete($id) {
    $this->db->delete('detaill_tbl', array('detaill_id' => $id));
  }  
}
?>
