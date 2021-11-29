<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_dosen extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  public function fetch_data()
  {
    $this->db->select('*');
    $this->db->from('dosen_tbl a');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }



  public function get($id)
  {
    $this->db->select('*');
    $this->db->from('dosen_tbl a');
    $this->db->where('a.nip', $id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function input($data)
  {
    $this->db->insert('dosen_tbl', $data);
  }

  public function edit($data)
  {
    $this->db->update('dosen_tbl', $data, array(
      'dosen_id' => $data['dosen_id']
    ));
  }

  public function delete($id)
  {
    $this->db->delete('dosen_tbl', array('nip' => $id));
  }
}
