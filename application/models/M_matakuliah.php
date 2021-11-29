<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_matakuliah extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  
  public function fetch_data() {
    $this->db->select('*');
    $this->db->from('matakuliah_tbl');
    // $this->db->order_by("matakuliah_id", "asc");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function fetch_data_perdosen($id)
  {
    $this->db->select('*');
    $this->db->from('matakuliah_tbl a');
    $this->db->join('relasi_dosen_mk_tbl b', 'a.matakuliah_id=b.matakuliah_id', 'LEFT');
    $this->db->join('dosen_tbl c', 'b.dosen_id=c.dosen_id', 'LEFT');
    $this->db->where('c.nip', $id);
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
    $this->db->from('matakuliah_tbl');
    $this->db->where('matakuliah_id', $id);
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
    $this->db->insert('matakuliah_tbl', $data);
  }

  public function input_batch($data) {
    $this->db->insert_batch('matakuliah_tbl', $data);
  }
  
  public function edit($data) {
    $this->db->update('matakuliah_tbl', $data, array(
      'matakuliah_id' => $data['matakuliah_id']
    ));
  }
  
  public function delete($id) {
    $this->db->delete('matakuliah_tbl', array('matakuliah_id' => $id));
  }  
}
?>
