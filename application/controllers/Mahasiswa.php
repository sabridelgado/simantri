<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mahasiswa extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    error_reporting(0);
    $this->load->model("m_mahasiswa");
    $this->load->model("m_setting");
    $this->load->model("m_user");
    $this->load->library('upload');
    if (!($this->session->userdata('user_id'))) {
      redirect('home');
    }
  }

  public function index()
  {
    $setting['settings_app'] = $this->m_setting->fetch_setting();
    $data['mahasiswa'] = $this->m_mahasiswa->fetch_data();
    $this->load->view("attribute/header", $setting);
    $this->load->view("attribute/menus", $setting);
    $this->load->view("admin/master_data/mahasiswa/mahasiswa", $data);
    $this->load->view("attribute/footer", $setting);
  }

  public function input()
  {
    if ($_FILES['userfile']['name'] == '') {
      $data['mahasiswa_nim']                = $this->input->post('mahasiswa_nim');
      $data['mahasiswa_nama']            = $this->input->post('mahasiswa_nama');
      $data['mahasiswa_photo']              = '';
      $data['mahasiswa_angkatan']            = $this->input->post('mahasiswa_angkatan');
      $data['mahasiswa_jk']            = $this->input->post('mahasiswa_jk');
      $this->session->set_flashdata('add', 'Berhasil Tambah mahasiswa <b>' . $data['mahasiswa_nama'] . '</b>');
      $this->m_mahasiswa->input($data);

      $datas['user_name']           = $this->input->post('mahasiswa_nim');
      $datas['user_password']       = md5($this->input->post('mahasiswa_nim'));
      $datas['nomor_induk']         = $this->input->post('mahasiswa_nim');
      $datas['user_fullname']       = $this->input->post('mahasiswa_nama');
      $datas['user_photo']          = '';
      $datas['group_id']            = 3;
      $this->m_user->create_user($datas);

    } else {
      $filename                = date('YmdHis') . rand(1000, 99999);
      $config['upload_path']   = './upload/mahasiswa/';
      $config['allowed_types'] = "png|jpg|jpeg";
      $config['overwrite']     = "true";
      $config['max_size']      = "20000000000";
      $config['max_width']     = "10000";
      $config['max_height']    = "10000";
      $config['file_name']     = 'mahasiswa-' . $this->input->post('mahasiswa_nim') . '-' . $filename;

      $this->upload->initialize($config);

      if (!$this->upload->do_upload()) {
        echo $this->upload->display_errors();
      } else {
        $dat                               = $this->upload->data();
        $data['mahasiswa_nim']                = $this->input->post('mahasiswa_nim');
        $data['mahasiswa_nama']            = $this->input->post('mahasiswa_nama');
        $data['mahasiswa_photo']              = $dat['file_name'];
        $data['mahasiswa_angkatan']            = $this->input->post('mahasiswa_angkatan');
        $data['mahasiswa_jk']            = $this->input->post('mahasiswa_jk');
        $this->session->set_flashdata('add', 'Berhasil Tambah mahasiswa <b>' . $data['mahasiswa_nama'] . '</b>');
        $this->m_mahasiswa->input($data);

        $datas['user_name']           = $this->input->post('mahasiswa_nim');
        $datas['user_password']       = md5($this->input->post('mahasiswa_nim'));
        $datas['nomor_induk']         = $this->input->post('mahasiswa_nim');
        $datas['user_fullname']       = $this->input->post('mahasiswa_nama');
        $datas['user_photo']          = $dat['file_name'];
        $datas['group_id']            = 3;
        $this->m_user->create_user($datas);

      }
    }
    redirect('mahasiswa');
  }

  public function edit()
  {
    if ($_FILES['userfile']['name'] == '') {
      $data['mahasiswa_id']                = $this->input->post('mahasiswa_id');
      $data['mahasiswa_nim']                = $this->input->post('mahasiswa_nim');
      $data['mahasiswa_nama']            = $this->input->post('mahasiswa_nama');
      $data['mahasiswa_photo']              = $this->input->post('mahasiswa_photo');
      $data['mahasiswa_angkatan']            = $this->input->post('mahasiswa_angkatan');
      $data['mahasiswa_jk']            = $this->input->post('mahasiswa_jk');
      $this->session->set_flashdata('add', 'Berhasil Tambah mahasiswa <b>' . $data['mahasiswa_nama'] . '</b>');
      $this->m_mahasiswa->edit($data);

    } else {
      $filename                = date('YmdHis') . rand(1000, 99999);
      $config['upload_path']   = './upload/mahasiswa/';
      $config['allowed_types'] = "png|jpg|jpeg";
      $config['overwrite']     = "true";
      $config['max_size']      = "20000000000";
      $config['max_width']     = "10000";
      $config['max_height']    = "10000";
      $config['file_name']     = 'mahasiswa-' . $this->input->post('mahasiswa_nim') . '-' . $filename;

      $this->upload->initialize($config);

      if (!$this->upload->do_upload()) {
        echo $this->upload->display_errors();
      } else {
        unlink("./upload/mahasiswa/" . $this->input->post('mahasiswa_nim'));
        $dat                               = $this->upload->data();
        $data['mahasiswa_id']                = $this->input->post('mahasiswa_id');
        $data['mahasiswa_nim']                = $this->input->post('mahasiswa_nim');
        $data['mahasiswa_nama']            = $this->input->post('mahasiswa_nama');
        $data['mahasiswa_photo']              = $dat['file_name'];
        $data['mahasiswa_angkatan']            = $this->input->post('mahasiswa_angkatan');
        $data['mahasiswa_jk']            = $this->input->post('mahasiswa_jk');
        $data['mahasiswa_lokasi']            = $this->input->post('mahasiswa_lokasi');
        $this->session->set_flashdata('add', 'Berhasil Tambah mahasiswa <b>' . $data['mahasiswa_nama'] . '</b>');
        $this->m_mahasiswa->edit($data);

      }
    }
    redirect('mahasiswa');
  }

  public function delete()
  {
    $this->session->set_flashdata('delete', 'mahasiswa <b>' . $this->input->post('mahasiswa_nama') . '</b> telah dihapus !');
    $this->m_mahasiswa->delete($this->input->post('mahasiswa_id'));
    redirect('mahasiswa');
  }

  // public function fetch()
	// {
	// 	$data = $this->m_mahasiswa->fetch_data();
	// 	$output = '
	// 	<h3 align="center">Total Data - '.$data.'</h3>
	// 	<table class="table table-striped table-bordered">
	// 		<tr>
	// 			<th>Mahasiswa Nim</th>
	// 			<th>Mahasiswa Nama</th>
	// 			<th>Mahasiswa Foto</th>
	// 			<th>Mahasiswa Angkatan</th>
	// 			<th>Mahasiswa Jenis Kelamin</th>
	// 			<th>Mahasiswa Lokasi</th>
	// 		</tr>
	// 	';
	// 	foreach($data->result() as $row)
	// 	{
	// 		$output .= '
	// 		<tr>
	// 			<td>'.$row->mahasiswa_nim.'</td>
	// 			<td>'.$row->mahasiswa_nama.'</td>
	// 			<td>'.$row->mahasiswa_photo.'</td>
	// 			<td>'.$row->mahasiswa_angkatan_id.'</td>
	// 			<td>'.$row->mahasiswa_jk.'</td>
	// 			<td>'.$row->mahasiswa_lokasi.'</td>
	// 		</tr>
	// 		';
	// 	}
	// 	$output .= '</table>';
	// 	echo $output;
	// }

	
}
