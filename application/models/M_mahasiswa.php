<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_mahasiswa extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  
  public function fetch_data() {
    $this->db->select('*');
    $this->db->from('mahasiswa_tbl');
    // $this->db->join('mahasiswa_angkatan_tbl b', 'a.mahasiswa_angkatan_id=b.mahasiswa_angkatan_id', 'LEFT');
    // $this->db->order_by("mahasiswa_id", "asc");
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
    $this->db->from('mahasiswa_tbl');
    // $this->db->join('mahasiswa_angkatan_tbl b', 'a.mahasiswa_angkatan_id=b.mahasiswa_angkatan_id', 'LEFT');
    $this->db->where('mahasiswa_id', $id);
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
    $this->db->insert('mahasiswa_tbl', $data);
  }

  public function input_batch($data) {
    $this->db->insert_batch('mahasiswa_tbl', $data);
  }
  
  public function edit($data) {
    $this->db->update('mahasiswa_tbl', $data, array(
      'mahasiswa_id' => $data['mahasiswa_id']
    ));
  }
  
  public function delete($id) {
    $this->db->delete('mahasiswa_tbl', array('mahasiswa_id' => $id));
  }
  
  public function fetch_data_peta() {
    $this->db->select('*');
    $this->db->from('mahasiswa_tbl');
    $this->db->where('mahasiswa_lokasi !=', '');
    $this->db->order_by("mahasiswa_id", "desc");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }
}
?>
