<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_user extends CI_Model {
  
  function __construct() {
    parent::__construct();
  }
  

  public function data_user() {
    $this->db->select("user_id, user_name");
    $this->db->from('user_tbl');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function create_user($data) {
    $this->db->insert('user_tbl', $data);
  }

  public function update_user($data) {
    $this->db->update('user_tbl', $data, array('user_id' => $data['user_id']));
  }
  
  public function delete_user($id) {
    $this->db->delete('user_tbl', array('user_id' => $id));
  }


  public function get_user($id) {
    $this->db->where('user_id', $id);
    $query = $this->db->get('user_tbl', 1);
    return $query->result();
  }
  
  
  
  public function fetch_data() {
    $this->db->select('a.user_id, a.user_name, a.user_fullname, a.group_id, b.group_name');
    $this->db->from('user_tbl a');
    $this->db->join('group_tbl b','a.group_id=b.group_id','LEFT');
    //$this->db->limit($limit, $start);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }
  
  

  /*Profile*/
  public function profile($id) {
    $this->db->select('*');
    $this->db->from('user_tbl a');
    $this->db->join('group_tbl b', 'a.group_id=b.group_id','LEFT');
    $this->db->where('a.user_id',$id);
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