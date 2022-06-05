<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simulasi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("m_simulasi");
        $this->load->model('m_user');
        $this->load->model('m_group');
        $this->load->model("m_setting");
        $this->load->model("m_widget");
        #Check user login or not
        if (!($this->session->userdata('user_id'))) {
            $this->session->set_flashdata('login', 'Maaf Anda Tidak Mempunyai Hak Akses Untuk Menu User!');
            redirect('home');
        }
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    public function index()
    {
        //simulasi kedatangan

        $query = $this->m_simulasi->get_kedatangan();
        $query1 = $this->m_simulasi->get_pelayanan();
        if ($query == null) {
            $data['s_kedatangan'] = $query;
            $pesan = 'Tabel Kedatangan Is NULL';

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">' . $pesan . '</div>'
            );
            redirect('kedatangan');
        } else if ($query1 == null) {
            $pesan = 'Tabel Pelayanan Is NULL';
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">' . $pesan . '</div>'
            );
            redirect('pelayanan');
        } else {


            $data['s_layan'] = $this->m_simulasi->get_simulasi();


            //=========================================
            $data['nama'] = $this->uri->segment(1);
            $setting['settings_app'] = $this->m_setting->fetch_setting();
            $data["user"]         = $this->m_user->fetch_data();
            $data["group"]        = $this->m_group->fetch_data();
            //----------------------------//

            $this->load->view("attribute/header", $setting);
            $this->load->view("attribute/menus", $setting);
            $this->load->view('admin/master_data/simulasi/simulasi_proses', $data);
            $this->load->view("attribute/footer", $setting);
            # code...
        }
    }

    public function animasi()
    {
        $query = $this->m_simulasi->get_kedatangan();
        $query1 = $this->m_simulasi->get_pelayanan();

        if ($query == null) {
            $data['s_kedatangan'] = $query;
            $pesan = 'Tabel Kedatangan Is NULL';

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">' . $pesan . '</div>'
            );
            redirect('kedatangan');
        } else if ($query1 == null) {
            $pesan = 'Tabel Pelayanan Is NULL';
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">' . $pesan . '</div>'
            );
            redirect('pelayanan');
        }

        $data['s_layan'] = $this->m_simulasi->get_simulasi();
        $data['parameter'] = $this->m_widget->get_parameter();

        //=========================================
        $data['nama'] = $this->uri->segment(1);
        $setting['settings_app'] = $this->m_setting->fetch_setting();
        $data["user"]         = $this->m_user->fetch_data();
        $data["group"]        = $this->m_group->fetch_data();
        //----------------------------//

        $this->load->view("attribute/header", $setting);
        $this->load->view("attribute/menus", $setting);
        $this->load->view('admin/master_data/simulasi/simulasi_animasi', $data);
        $this->load->view("attribute/footer", $setting);
    }
    public function hasil()
    {


        $data['hasil'] = $this->m_simulasi->get_kesimpulan();


        //=========================================
        $data['nama'] = $this->uri->segment(1);
        $setting['settings_app'] = $this->m_setting->fetch_setting();
        $data["user"]         = $this->m_user->fetch_data();
        $data["group"]        = $this->m_group->fetch_data();
        //----------------------------//

        $this->load->view("attribute/header", $setting);
        $this->load->view("attribute/menus", $setting);
        $this->load->view('admin/master_data/simulasi/simulasi_hasil', $data);
        $this->load->view("attribute/footer", $setting);
    }
}
