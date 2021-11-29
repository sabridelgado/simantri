<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_laporan extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }


  public function data_laporan()
  {
    $this->db->select("*");
    $this->db->from('laporan_tbl');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function create_laporan($data)
  {
    $this->db->insert('laporan_tbl', $data);
  }

  public function update_laporan($data)
  {
    $this->db->update('laporan_tbl', $data, array('laporan_id' => $data['laporan_id']));
  }

  public function delete_laporan($id)
  {
    $this->db->delete('laporan_tbl', array('laporan_id' => $id));
  }


  public function get($id)
  {
    $this->db->where('laporan_id', $id);
    $query = $this->db->get('laporan_tbl', $id);
    return $query->result();
  }

  // public function total_laporan($id_dosen)
  // {
  //   $this->db->select('*');

  //   $this->db->where('status_laporan', 1);
  //   $where = "dosen_pembimbing1='$id_dosen' OR dosen_pembimbing2='$id_dosen' OR dosen_penguji1='$id_dosen' OR dosen_penguji2='$id_dosen' OR dosen_penguji3='$id_dosen'";
  //   $this->db->where($where);
  //   // $this->db->where('dosen_pembimbing1', $id_dosen);
  //   // $this->db->or_where('dosen_pembimbing2', $id_dosen);
  //   // $this->db->or_where('dosen_penguji1', $id_dosen);
  //   // $this->db->or_where('dosen_penguji2', $id_dosen);
  //   // $this->db->or_where('dosen_penguji3', $id_dosen);
  //   $query = $this->db->get('laporan_tbl');
  //   return $query->num_rows();
  // }
  public function total_dosen_pembimbing1($id_dosen)
  {
    $this->db->select('*');
    $this->db->where('status_laporan', 0);
    $this->db->where('dosen_pembimbing1', $id_dosen);
    $query = $this->db->get('laporan_tbl');
    return $query->num_rows();
  }
  public function total_dosen_pembimbing2($id_dosen)
  {
    $this->db->select('*');
    $this->db->where('status_laporan', 0);
    $this->db->where('dosen_pembimbing2', $id_dosen);
    $query = $this->db->get('laporan_tbl');
    return $query->num_rows();
  }
  public function total_dosen_penguji1($id_dosen)
  {
    $this->db->select('*');
    $this->db->where('status_laporan', 0);
    $this->db->where('dosen_penguji1', $id_dosen);
    $query = $this->db->get('laporan_tbl');
    return $query->num_rows();
  }
  public function total_dosen_penguji2($id_dosen)
  {
    $this->db->select('*');
    $this->db->where('status_laporan', 0);
    $this->db->where('dosen_penguji2', $id_dosen);
    $query = $this->db->get('laporan_tbl');
    return $query->num_rows();
  }
  public function total_dosen_penguji3($id_dosen)
  {
    $this->db->select('*');
    $this->db->where('status_laporan', 0);
    $this->db->where('dosen_penguji3', $id_dosen);
    $query = $this->db->get('laporan_tbl');
    return $query->num_rows();
  }


  // public function total_laporan($id_dosen){
  //   $where = "name='Joe' AND status='boss' OR status='active'";

  //   $query = $this->db->query("SELECT * from laporan_tbl WHERE status_laporan='0' and  ");
  //   // $query  = $this->db->query("SELECT * FROM laporan_tbl where status_laporan="0" ");
  //   return $query->num_rows();
  // }



  public function fetch_data()
  {
    $this->db->select('*');
    $this->db->from('laporan_tbl  a');
    $this->db->join('dosen_tbl b', 'a.dosen_pembimbing1 = b.dosen_id', 'LEFT');
    $this->db->join('dosen_tbl c', 'a.dosen_pembimbing2 = c.dosen_id', 'LEFT');
    $this->db->join('dosen_tbl d', 'a.dosen_penguji1 = d.dosen_id', 'LEFT');
    $this->db->join('dosen_tbl e', 'a.dosen_penguji2 = e.dosen_id', 'LEFT');
    $this->db->join('dosen_tbl f', 'a.dosen_penguji3 = f.dosen_id', 'LEFT');

    //$this->db->limit($limit, $start);
    $query = $this->db->get();
    // var_dump($query->result());
    // die;

    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }
}
