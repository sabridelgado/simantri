<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_tahun_ajaran extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  
  public function fetch_data() {
    $this->db->select('*');
    $this->db->from('tahun_ajaran_tbl');
    // $this->db->order_by("tahun_ajaran_id", "asc");
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function getTahunAjaranLast()
  {
    $this->db->select('*');
    $this->db->from('tahun_ajaran_tbl');
    $this->db->order_by("tahun_ajaran_id", "desc");
    $query = $this->db->get();
    return $query->result();
  }
 

  public function get($id) {
    $this->db->select('*');
    $this->db->from('tahun_ajaran_tbl');
    $this->db->where('tahun_ajaran_id', $id);
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
    $this->db->insert('tahun_ajaran_tbl', $data);
  }
  
  public function edit($data) {
    $this->db->update('tahun_ajaran_tbl', $data, array(
      'tahun_ajaran_id' => $data['tahun_ajaran_id']
    ));
  }
  
  public function delete($id) {
    $this->db->delete('tahun_ajaran_tbl', array('tahun_ajaran_id' => $id));
  }  
}
?>
