<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelayanan extends CI_Controller
{
    protected $indexLoket = [];

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

        $query = $this->m_simulasi->get_kedatangan();

        if ($query == null) {
            $data['s_kedatangan'] = $query;
            $pesan = 'Tabel Kedatangan Is NULL';

            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">' . $pesan . '</div>'
            );
            redirect('kedatangan');
        }

        $data['s_layan'] = $this->m_simulasi->get_pelayanan();

        //=========================================
        $data['nama'] = $this->uri->segment(1);
        $setting['settings_app'] = $this->m_setting->fetch_setting();
        $data["user"]         = $this->m_user->fetch_data();
        $data["group"]        = $this->m_group->fetch_data();
        //----------------------------//

        $this->load->view("attribute/header", $setting);
        $this->load->view("attribute/menus", $setting);
        $this->load->view('admin/master_data/simulasi/simulasi_pelayanan', $data);
        $this->load->view("attribute/footer", $setting);
    }



    public function simulasi_pelayanan()

    {



        // $this->m_simulasi->reset_tbhasil();
        // $this->m_simulasi->reset_tbparameter();
        $this->m_simulasi->reset_tbpelayanan();

        $query = $this->m_simulasi->get_kedatangan();

        // echo '<pre>';
        // print_r($query);
        // echo '</pre>';
        // die;
        //validasi inputan
        if ($query != null) {

            //=============================
            //metode eksponensial
            $this->_h_pelayanan();
            $this->_kesimpulan();
            //=============================
            redirect('pelayanan');
        } else {
            $pesan = 'Tabel Kedatangan Is NULL';
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger" role="alert">' . $pesan . '</div>'
            );
            redirect('kedatangan');
        }
    }
    private function _h_pelayanan()
    {
        //validasi inputan
        $this->form_validation->set_rules('miu', 'miu', 'required|trim');
        $this->form_validation->set_rules('loket', 'loket', 'required|trim');

        $loket = $this->input->post('loket');
        $miu = $this->input->post('miu');

        //==============================================
        //Inisiasi Variabel
        $HtgSvr = 0;
        $MulaiLyn = 0;
        $nasabah = 0;
        $wq = 0;
        $lq = 0;
        $TWaktuTgu = 0;
        $TWaktuTguLyn = 0;
        $TWaktuTguSys = 0;
        $waktuselesai = [];
        $WaktuTgu = 0;
        $WaktuTguSys = 0;
        $all = [];
        //tutup inisiasi
        //===============================================

        $query = $this->m_simulasi->get_kedatangan();
        foreach ($query as $q) {
            // kondisi pertama
            if ($q->id_kedatangan > $nasabah) {
                // kondisi ke dua
                if ($nasabah < $loket) {
                    $HtgSvr = $nasabah;
                    $WaktuDtg = $q->w_kedatangan;
                    $MulaiLyn = $WaktuDtg + 0.0167;
                    $waktuselesai = $this->hitung_layan($MulaiLyn, $miu);
                    $loketKe = $this->pilihLoket($waktuselesai[0], $MulaiLyn, $loket);
                    $WaktuTgu = ($MulaiLyn - $WaktuDtg);
                    $WaktuTguSys = round($waktuselesai[0] - $WaktuDtg, 4);
                    $all[] = [$waktuselesai[0], $WaktuTgu, $WaktuTguSys, $WaktuDtg, $MulaiLyn, $loketKe];
                } else {
                    $WaktuDtg = $q->w_kedatangan;
                    $tampungkecil = [];
                    for ($i = 0; $i < count($all); $i++) {
                        $tampungkecil[] = $all[$i][0];
                    }
                    $fixkecil = [];
                    rsort($tampungkecil);
                    for ($i = 0; $i < $loket; $i++) {
                        $fixkecil[] = $tampungkecil[$i];
                    }
                    $kecil = min($fixkecil);
                    $datang = $WaktuDtg + 0.0167;
                    if ($datang > $kecil) {
                        $MulaiLyn = $WaktuDtg  + 0.0167;
                        $waktuselesai = $this->hitung_layan($MulaiLyn, $miu);
                        $WaktuTgu = $MulaiLyn - $WaktuDtg;
                        $loketKe = $this->pilihLoket($waktuselesai[0], $MulaiLyn, $loket);
                        $WaktuTguSys = round($waktuselesai[0] - $WaktuDtg, 4);
                        $all[] = [$waktuselesai[0], $WaktuTgu, $WaktuTguSys, $WaktuDtg, $MulaiLyn, $loketKe];
                    } else {
                        $MulaiLyn = $kecil;
                        $waktuselesai = $this->hitung_layan($MulaiLyn, $miu);
                        $WaktuTgu = $MulaiLyn - $WaktuDtg;
                        $loketKe = $this->pilihLoket($waktuselesai[0], $MulaiLyn, $loket);
                        $WaktuTguSys = round($waktuselesai[0] - $WaktuDtg, 4);
                        $all[] = [$waktuselesai[0], $WaktuTgu, $WaktuTguSys, $WaktuDtg, $MulaiLyn, $loketKe];
                    }
                }

                //=========================== 
                //perhitungan
                $waktu = $q->durasi * 3600;
                $mulai = $MulaiLyn * $waktu;
                $layanan = $waktuselesai[1] * $waktu;
                $s_layanan = $waktuselesai[0] * $waktu;
                $t_antrian = $WaktuTgu * $waktu;
                $t_sistem = $WaktuTguSys * $waktu;
                //==================================

                $resultt = [
                    'bil_acak' => $waktuselesai[2],
                    'w_mulai' => $mulai,
                    'w_layanan' => $layanan,
                    'loket' => $loketKe,
                    'w_selesai_layanan' => $s_layanan,
                    'w_tunggu_antrian' => $t_antrian,
                    'w_tunggu_sistem' => $t_sistem
                ];
            }





            // die;

            // $durasim = $q->durasi;
            // $wq = round($TWaktuTgu / $nasabah, 4);
            // $wl = round($TWaktuTguLyn / $nasabah, 4);
            // $lq = ceil($TWaktuTgu / $durasim);
            // $ls = round($TWaktuTguSys / $durasim, 4);
            // $probabilitas = round($TWaktuTguLyn / ($loket * $durasim), 5);
            // $totalwl = $TWaktuTguLyn / $loket;

            // echo '<pre>';
            // print_r($TWaktuTguLyn);
            // echo '</pre>';

            // echo '<pre>';
            // print_r($probabilitas);
            // echo '</pre>';

            // $uji = [
            //     'durasi' => $durasim,
            //     'total_w_tunggu' => $TWaktuTgu,
            //     'tw_sisitem' => $TWaktuTguSys,
            //     'total_nasabah' => $nasabah
            // ];




            $this->m_simulasi->input_pelayanan($resultt);

            //=====================================
            //hitung totol waktu tunggu
            $TWaktuTgu = $TWaktuTgu + $WaktuTgu;
            //hitung totol waktu layanan
            $TWaktuTguLyn = $TWaktuTguLyn + $waktuselesai[1];
            //hitung totol waktu tunggu sistem
            $TWaktuTguSys = $TWaktuTguSys + $WaktuTguSys;

            $nasabah++;
        }



        //==============================================================
        $durasim = $q->durasi;
        //rata-rata waktu tunggu antrian
        $wq = round($TWaktuTgu / $nasabah, 4);
        //rata-rata waktu tunggu sistem
        $wl = round($TWaktuTguLyn / $nasabah, 4);
        //rata-rata nasabah dalam antrian
        $lq = round($TWaktuTgu / $durasim);
        //rata-rata nasabah dalam sistem
        $ls = round($TWaktuTguSys / $durasim, 4);
        //probabilitas server sibuk
        $probabilitas = round($TWaktuTguLyn / ($loket * $durasim), 5);
        //total waktu layanan
        $totalwl = $TWaktuTguLyn / $loket;

        //memasukan data dalam database

        $result = [
            'r_tunggu_antrian' => $wq,
            'r_tunggu_layan' => $wl,
            'r_nasabah_antrian' => $lq,
            'r_nasabah_sistem' => $ls,
            'probabilitas_teler' => $probabilitas,
            'r_layan_total' => $totalwl,

        ];
        $this->m_simulasi->input_hasil($result);
        //=========================================

        $parameter = [
            'p_lamda' => $q->lamda,
            'p_miu' => $miu,
            'p_loket' => $loket

        ];


        $this->m_simulasi->input_parameter($parameter);
    }



    private function hitung_layan($Mlayan, $miu)
    {

        $query = $this->m_simulasi->get_kedatangan();


        $miu = $miu;

        //bangkitkan bilangan acak
        if ($query[0]->durasi == 1) {
            $AcakInter = rand(0.1 * 1000, 0.3 * 1000) / 1000;
        } else {
            $AcakInter = rand(0.2 * 1000, 0.5 * 1000) / 1000;
        }

        //hitung waktu pelayanan
        $Layan = round(abs((1 / $miu) * log10($AcakInter)), 4);

        //hitung waktu layanan
        $SelesaiLyn = round($Mlayan + $Layan, 4);

        $nilai = [
            $SelesaiLyn, $Layan, $AcakInter
        ];


        return $nilai;
    }

    private function _kesimpulan()
    {

        $hasil = $this->m_widget->get_hasil();
        $param = $this->m_widget->get_parameter();
        $waktu = $hasil[0]->r_tunggu_antrian * 3600;
        $exp = 1;

        if ($hasil[0]->probabilitas_teler > 1) {
            $exp = 2;
        } else {

            if ($waktu >= 300) {
                $exp = 2;
            } else if ($waktu <= 61) {
                $exp = 3;
            } else {
                $exp = 1;
            }
        }


        $data = [
            'id_hasil' => $hasil[0]->id_hasil,
            'id_parameter' => $param[0]->id,
            'id_saran' => $exp

        ];
        $this->m_simulasi->input_kesimpulan($data);
    }

    public function pilihLoket($waktuSelesai, $waktuMulai, $totalLoket)
    {
        for ($i = 0; $i < $totalLoket; $i++) {
            if (!isset($this->indexLoket[$i])) {
                $this->indexLoket[$i] = $waktuSelesai;
                $returnValue = $i + 1;
                $i = $totalLoket;
                return $returnValue;
            } else if ($this->indexLoket[$i] <= $waktuMulai) {
                $this->indexLoket[$i] = $waktuSelesai;
                $returnValue = $i + 1;
                $i = $totalLoket;
                return $returnValue;
                // return $this->indexLoket[$i] . '/' . $waktuSelesai;
            }
        }
    }

    public function coba()
    {


        $hasil = $this->m_widget->get_hasil();
        $param = $this->m_widget->get_parameter();
        $waktu = $hasil[0]->r_tunggu_antrian * 3600;
        $exp = 1;

        if ($waktu >= 300) {
            $exp = 2;
        } else if ($waktu <= 61) {
            $exp = 3;
        }
    }

    public function resetdata()
    {

        $this->db->truncate('tb_pelayanan');
        $this->db->truncate('tb_hasil');
        $this->db->truncate('tb_parameter');
        $this->db->truncate('tb_kesimpulan');

        redirect('pelayanan');
    }
}
    // echo '<pre>';
    // print_r($uji);
    // echo '</pre>';
