<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_keahlian_detail extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }


  public function data_keahlian_detail()
  {
    $this->db->select("keahlian_detail_id, keahlian_detail_name");
    $this->db->from('keahlian_detail_tbl');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function create_keahlian_detail($data)
  {
    $this->db->insert('keahlian_detail_tbl', $data);
  }

  public function update_keahlian_detail($data)
  {
    $this->db->update('keahlian_detail_tbl', $data, array('keahlian_detail_id' => $data['keahlian_detail_id']));
  }

  public function delete_keahlian_detail($id)
  {
    $this->db->delete('keahlian_detail_tbl', array('keahlian_detail_id' => $id));
  }


  public function get($id)
  {
    $this->db->select('keahlian_detail_bobot, dosen_id');
    $this->db->from('keahlian_detail_tbl');
    $this->db->where('keahlian_id', $id);
    // $this->db->where('keahlian_detail_bobot >',2);
    $this->db->order_by('keahlian_detail_bobot', "DESC");
    // $this->db->limit(5);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }



  public function fetch_data()
  {
    $this->db->select('a.keahlian_detail_id, a.dosen_id, a.keahlian_id, a.keahlian_detail_bobot, b.dosen_nama, c.keahlian_nama');
    $this->db->from('keahlian_detail_tbl a');
    $this->db->join('dosen_tbl b', 'a.dosen_id=b.dosen_id', 'LEFT');
    $this->db->join('keahlian_tbl c', 'a.keahlian_id=c.keahlian_id', 'LEFT');
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
