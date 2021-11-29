<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_sungai extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  
  public function fetch_data() {
    $this->db->select('*');
    $this->db->from('sungai');
    $this->db->order_by("id_sungai", "asc");
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
    $this->db->from('sungai');
    $this->db->where('id_sungai', $id);
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
    $this->db->insert('sungai', $data);
  }
  
  public function edit($data) {
    $this->db->update('sungai', $data, array(
      'id_sungai' => $data['id_sungai']
    ));
  }
  
  public function delete($id) {
    $this->db->delete('sungai', array('id_sungai' => $id));
  }  
}
?>
