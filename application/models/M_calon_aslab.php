<?php
defined('BASEPATH') or exit('No direct script access allowed');
class M_calon_aslab extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function create_calon_aslab($data)
  {
    $this->db->insert('calon_aslab_tbl', $data);
  }

  public function update_calon_aslab($data)
  {
    $this->db->update('calon_aslab_tbl', $data, array('calon_aslab_id' => $data['calon_aslab_id']));
  }

  public function update_calon_aslab_pernim($data)
  {
    $this->db->update('calon_aslab_tbl', $data, array('nim_mahasiswa' => $data['nim_mahasiswa']));
  }

  public function delete_calon_aslab($id)
  {
    $this->db->delete('calon_aslab_tbl', array('calon_aslab_id' => $id));
  }

  public function insert_notifikasi($data)
  {
    #insert data
    $this->db->insert('notifikasi_tbl', $data);
  }


  public function get($id)
  {
    $this->db->where('calon_aslab_id', $id);
    $query = $this->db->get('calon_aslab_tbl', $id);
    return $query->result();
  }
  public function fetch_data()
  {
    $this->db->select('*');
    $this->db->from('calon_aslab_tbl a');
    $this->db->join('tahun_ajaran_tbl b', 'a.tahun_ajaran_id=b.tahun_ajaran_id', 'LEFT');
    $this->db->join('subkriteria_tbl c', 'a.nilai_praktikum=c.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl d', 'a.nilai_mk=d.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl e', 'a.semester=e.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl f', 'a.asisten_berapakali=f.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl g', 'a.rekomendasi=g.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl h', 'a.ipk=h.subkriteria_id', 'LEFT');
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

  public function fetch_data_pertahunajaran($tahun_ajaran)
  {
    $this->db->select('*');
    $this->db->from('calon_aslab_tbl a');
    $this->db->join('tahun_ajaran_tbl b', 'a.tahun_ajaran_id=b.tahun_ajaran_id', 'LEFT');
    $this->db->join('subkriteria_tbl c', 'a.nilai_praktikum=c.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl d', 'a.nilai_mk=d.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl e', 'a.semester=e.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl f', 'a.asisten_berapakali=f.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl g', 'a.rekomendasi=g.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl h', 'a.ipk=h.subkriteria_id', 'LEFT');
    $this->db->where('b.tahun_ajaran_id', $tahun_ajaran);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function fetch_data_perdosen($id,$tahun_ajaran)
  {
    $this->db->select('*');
    $this->db->from('calon_aslab_tbl a');
    $this->db->join('tahun_ajaran_tbl b', 'a.tahun_ajaran_id=b.tahun_ajaran_id', 'LEFT');
    $this->db->join('subkriteria_tbl c', 'a.nilai_praktikum=c.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl d', 'a.nilai_mk=d.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl e', 'a.semester=e.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl f', 'a.asisten_berapakali=f.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl g', 'a.rekomendasi=g.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl h', 'a.ipk=h.subkriteria_id', 'LEFT');
    $this->db->join('relasi_dosen_mk_tbl i', 'a.matakuliah_id=i.matakuliah_id', 'LEFT');
    $this->db->join('dosen_tbl j', 'i.dosen_id=j.dosen_id', 'LEFT');
    $this->db->where('j.nip', $id);
    $this->db->where('b.tahun_ajaran_id', $tahun_ajaran);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function fetch_data_perdosen_permatakuliah($id,$matakuliah_id)
  {
    $this->db->select('*');
    $this->db->from('calon_aslab_tbl a');
    $this->db->join('tahun_ajaran_tbl b', 'a.tahun_ajaran_id=b.tahun_ajaran_id', 'LEFT');
    $this->db->join('subkriteria_tbl c', 'a.nilai_praktikum=c.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl d', 'a.nilai_mk=d.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl e', 'a.semester=e.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl f', 'a.asisten_berapakali=f.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl g', 'a.rekomendasi=g.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl h', 'a.ipk=h.subkriteria_id', 'LEFT');
    $this->db->join('relasi_dosen_mk_tbl i', 'a.matakuliah_id=i.matakuliah_id', 'LEFT');
    $this->db->join('dosen_tbl j', 'i.dosen_id=j.dosen_id', 'LEFT');
    $this->db->where('j.nip', $id);
    $this->db->where('i.matakuliah_id', $matakuliah_id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function fetch_data_perdosen_permatakuliah_tahunajaran($id,$matakuliah_id,$tahun_ajaran)
  {
    $this->db->select('*');
    $this->db->from('calon_aslab_tbl a');
    $this->db->join('tahun_ajaran_tbl b', 'a.tahun_ajaran_id=b.tahun_ajaran_id', 'LEFT');
    $this->db->join('subkriteria_tbl c', 'a.nilai_praktikum=c.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl d', 'a.nilai_mk=d.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl e', 'a.semester=e.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl f', 'a.asisten_berapakali=f.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl g', 'a.rekomendasi=g.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl h', 'a.ipk=h.subkriteria_id', 'LEFT');
    $this->db->join('relasi_dosen_mk_tbl i', 'a.matakuliah_id=i.matakuliah_id', 'LEFT');
    $this->db->join('dosen_tbl j', 'i.dosen_id=j.dosen_id', 'LEFT');
    $this->db->where('j.nip', $id);
    $this->db->where('i.matakuliah_id', $matakuliah_id);
    $this->db->where('b.tahun_ajaran_id', $tahun_ajaran);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function fetch_data_perdosen_tahunajaran($id,$tahun_ajaran)
  {
    $this->db->select('*');
    $this->db->from('calon_aslab_tbl a');
    $this->db->join('tahun_ajaran_tbl b', 'a.tahun_ajaran_id=b.tahun_ajaran_id', 'LEFT');
    $this->db->join('subkriteria_tbl c', 'a.nilai_praktikum=c.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl d', 'a.nilai_mk=d.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl e', 'a.semester=e.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl f', 'a.asisten_berapakali=f.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl g', 'a.rekomendasi=g.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl h', 'a.ipk=h.subkriteria_id', 'LEFT');
    $this->db->join('relasi_dosen_mk_tbl i', 'a.matakuliah_id=i.matakuliah_id', 'LEFT');
    $this->db->join('dosen_tbl j', 'i.dosen_id=j.dosen_id', 'LEFT');
    $this->db->where('j.nip', $id);
    $this->db->where('b.tahun_ajaran_id', $tahun_ajaran);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function fetch_data_permatakuliah($matakuliah_id)
  {
    $this->db->select('*');
    $this->db->from('calon_aslab_tbl a');
    $this->db->join('tahun_ajaran_tbl b', 'a.tahun_ajaran_id=b.tahun_ajaran_id', 'LEFT');
    $this->db->join('subkriteria_tbl c', 'a.nilai_praktikum=c.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl d', 'a.nilai_mk=d.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl e', 'a.semester=e.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl f', 'a.asisten_berapakali=f.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl g', 'a.rekomendasi=g.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl h', 'a.ipk=h.subkriteria_id', 'LEFT');
    $this->db->join('relasi_dosen_mk_tbl i', 'a.matakuliah_id=i.matakuliah_id', 'LEFT');
    $this->db->join('dosen_tbl j', 'i.dosen_id=j.dosen_id', 'LEFT');
    $this->db->where('i.matakuliah_id', $matakuliah_id);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function fetch_data_permatakuliah_pertahunajaran($matakuliah_id,$tahun_ajaran)
  {
    $this->db->select('*');
    $this->db->from('calon_aslab_tbl a');
    $this->db->join('tahun_ajaran_tbl b', 'a.tahun_ajaran_id=b.tahun_ajaran_id', 'LEFT');
    $this->db->join('subkriteria_tbl c', 'a.nilai_praktikum=c.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl d', 'a.nilai_mk=d.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl e', 'a.semester=e.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl f', 'a.asisten_berapakali=f.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl g', 'a.rekomendasi=g.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl h', 'a.ipk=h.subkriteria_id', 'LEFT');
    $this->db->join('relasi_dosen_mk_tbl i', 'a.matakuliah_id=i.matakuliah_id', 'LEFT');
    $this->db->join('dosen_tbl j', 'i.dosen_id=j.dosen_id', 'LEFT');
    $this->db->where('i.matakuliah_id', $matakuliah_id);
    $this->db->where('b.tahun_ajaran_id', $tahun_ajaran);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function fetch_data_permatakuliah_tahun_ajaran($id,$matakuliah_id,$tahun_ajaran)
  {
    $this->db->select('*');
    $this->db->from('calon_aslab_tbl a');
    $this->db->join('tahun_ajaran_tbl b', 'a.tahun_ajaran_id=b.tahun_ajaran_id', 'LEFT');
    $this->db->join('subkriteria_tbl c', 'a.nilai_praktikum=c.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl d', 'a.nilai_mk=d.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl e', 'a.semester=e.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl f', 'a.asisten_berapakali=f.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl g', 'a.rekomendasi=g.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl h', 'a.ipk=h.subkriteria_id', 'LEFT');
    $this->db->join('relasi_dosen_mk_tbl i', 'a.matakuliah_id=i.matakuliah_id', 'LEFT');
    $this->db->join('dosen_tbl j', 'i.dosen_id=j.dosen_id', 'LEFT');
    // $this->db->join('mahasiswa_tbl k', 'a.nim_mahasiswa=k.mahasiswa_nim', 'LEFT');
    $this->db->where('j.nip', $id);
    $this->db->where('b.tahun_ajaran_id', $tahun_ajaran);
    $this->db->where('i.matakuliah_id', $matakuliah_id);
    // $this->db->where('k.mahasiswa_nim', $nim);
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
      foreach ($query->result() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function data_calon_aslab($id,$matakuliah_id,$tahun_ajaran_id)
  {
    $this->db->select('a.*,b.*,c.subkriteria_nama as nilai_praktikum,c.subkriteria_bobot as nilai_praktikum_bobot,d.subkriteria_nama as nilai_mk,d.subkriteria_bobot as nilai_mk_bobot,e.subkriteria_nama as semester,e.subkriteria_bobot as semester_bobot,f.subkriteria_nama as asisten_berapakali,f.subkriteria_bobot as asisten_berapakali_bobot,g.subkriteria_nama as rekomendasi,g.subkriteria_bobot as rekomendasi_bobot,h.subkriteria_nama as ipk,h.subkriteria_bobot as ipk_bobot, k.*');
    $this->db->from('calon_aslab_tbl a');
    $this->db->join('tahun_ajaran_tbl b', 'a.tahun_ajaran_id=b.tahun_ajaran_id', 'LEFT');
    $this->db->join('subkriteria_tbl c', 'a.nilai_praktikum=c.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl d', 'a.nilai_mk=d.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl e', 'a.semester=e.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl f', 'a.asisten_berapakali=f.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl g', 'a.rekomendasi=g.subkriteria_id', 'LEFT');
    $this->db->join('subkriteria_tbl h', 'a.ipk=h.subkriteria_id', 'LEFT');
    $this->db->join('relasi_dosen_mk_tbl i', 'a.matakuliah_id=i.matakuliah_id', 'LEFT');
    $this->db->join('dosen_tbl j', 'i.dosen_id=j.dosen_id', 'LEFT');
    $this->db->join('mahasiswa_tbl k', 'a.nim_mahasiswa=k.mahasiswa_nim', 'LEFT');
    $this->db->where('j.nip', $id);
    $this->db->where('i.matakuliah_id', $matakuliah_id);
    $this->db->where('b.tahun_ajaran_id', $tahun_ajaran_id);
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
}
