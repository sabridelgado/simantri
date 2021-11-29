<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_relasi_dosen_mk extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  public function fetch_data()
  {
    $this->db->select('*');
    $this->db->from('relasi_dosen_mk_tbl a');
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
    $this->db->from('relasi_dosen_mk_tbl a');
    $this->db->where('a.relasi_dosen_mk_id', $id);
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
    $this->db->insert('relasi_dosen_mk_tbl', $data);
  }

  public function edit($data)
  {
    $this->db->update('relasi_dosen_mk_tbl', $data, array(
      'relasi_dosen_mk_id' => $data['relasi_dosen_mk_id']
    ));
  }

  public function delete($id)
  {
    $this->db->delete('relasi_dosen_mk_tbl', array('relasi_dosen_mk_id' => $id));
  }
}
