<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_monitor extends CI_Model {
  function __construct() {
    parent::__construct();
  }
  
  public function fetch_data() {
    $this->db->select('*');
    $this->db->from('sungai a');
    $this->db->join('monitoring b','a.id_sungai=b.id_sungai','LEFT');
    //$this->db->order_by("a.waktu_hujan", "desc");
    //$this->db->group_by("a.id_sungai");
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
    $this->db->from('monitoring a');    
    $this->db->join('sungai b','a.id_sungai=b.id_sungai','LEFT');
    $this->db->where('a.id_sungai', $id);
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
    $this->db->insert('monitor_tbl', $data);
  }
  
  public function edit($data) {
    $this->db->update('monitor_tbl', $data, array(
      'monitor_id' => $data['monitor_id']
    ));
  }
  
  public function delete($id) {
    $this->db->delete('monitor_tbl', array('monitor_id' => $id));
  }  
}
?>
