<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class PDF extends FPDF
{
    // Page header
    function Header()
    {
        if ($this->PageNo() == 1) {
            $this->setFont('Arial', 'I', 9);
            $this->setFillColor(255, 255, 255);
            $this->cell(90, 6, '', 0, 0, 'L', 1);
            $this->cell(100, 6, "(A4 - Portrait) - Printed date : " . date('d-M-Y'), 0, 1, 'R', 1);
            $this->Image('http://dummyprojectts.000webhostapp.com/upload/pdf.png', 3, 25, '200', '30', 'png');
            $this->Ln(38);
        } else {
            $this->setFont('Arial', 'I', 9);
            $this->setFillColor(255, 255, 255);
            $this->cell(90, 6, "ERROR DATA", 0, 0, 'L', 1);
        }
    }

    function Content($laporan, $dosen)
    {
        $ya = 46;
        $rw = 6;
        $no = 1;
        // foreach ($sSQL as $key) {
        $this->setFont('Arial', '', 9);
        $this->setFillColor(255, 255, 255);
        $this->cell(10, 8, '', 0, 0, 'L');
        $this->cell(130, 8, '  Nomor    : ' . $laporan[0]->nomor_surat, 0, 0, 'L');
        // $this->cell(130,8,'  Nomor    : 160/UN29.8.1.1/TD.06 / 2020'.$no,0,0,'L');
        $this->cell(100, 6, "Kendari , " . date('d - M - Y'), 0, 1, 'L', 1);
        $this->Ln(2);
        $this->cell(10, 8, '', 0, 0, 'L');
        $this->cell(130, 8, '  Hal          : Ujian Tugas Akhir', 0, 0, 'L');
        $this->Ln(7);
        $this->cell(10, 8, '', 0, 0, 'L');
        $this->cell(130, 8, '  Kepada   : Yth. Bapak / Ibu' . $no, 0, 0, 'L');
        $this->Ln(5);
        $this->cell(25, 8, '', 0, 0, 'L');
        $this->cell(130, 8, '   Di-', 0, 0, 'L');
        $this->Ln(5);
        $this->cell(25, 8, '', 0, 0, 'L');
        $this->cell(130, 8, '        T e m p a t', 0, 0, 'L');

        $this->Ln(15);
        $this->cell(10, 8, '', 0, 0, 'L');
        $this->cell(130, 8, 'Dengan Hormat,', 0, 0, 'L');
        $this->Ln(5);
        $this->cell(10, 8, '', 0, 0, 'L');
        $this->cell(130, 8, 'Kami Mengundang Bapak/Ibu untuk menghadiri Ujian '.$laporan[0]->ket.' Mahasiswa tersebut di bawah ini :', 0, 0, 'L');

        $this->Ln(15);
        $this->cell(10, 8, '', 0, 0, 'L');
        $this->cell(130, 8, 'Nama                            : ' . $laporan[0]->nama_mahasiswa, 0, 0, 'L');
        $this->Ln(5);
        $this->cell(10, 8, '', 0, 0, 'L');
        $this->cell(130, 8, 'NIM                               : ' . $laporan[0]->nim_mahasiswa, 0, 0, 'L');
        $this->Ln(5);
        $this->cell(10, 8, '', 0, 0, 'L');
        $this->cell(130, 8, 'Judul Tugas Akhir     : ', 0, 0, 'L');
        $this->Ln(1);
        $this->cell(37, 1, '', 0, 0, 'L');
        $this->MultiCell(130, 4, ': ' . $laporan[0]->judul_skripsi, 0, 0, 'L');

        $this->Ln(2);
        $this->cell(10, 8, '', 0, 0, 'L');
        $this->cell(130, 8, 'Yang dilaksanakan pada  : ', 0, 0, 'L');

        $this->Ln(5);
        $this->cell(10, 8, '', 0, 0, 'L');
        $this->cell(130, 8, 'Hari                              : ' . $laporan[0]->hari, 0, 0, 'L');
        $this->Ln(5);
        $this->cell(10, 8, '', 0, 0, 'L');
        $this->cell(130, 8, 'Jam                              : ' . $laporan[0]->jam, 0, 0, 'L');
        $this->Ln(5);
        $this->cell(10, 8, '', 0, 0, 'L');
        $this->cell(130, 8, 'Tempat                         : ' . $laporan[0]->tempat, 0, 0, 'L');

        $this->Ln(10);
        $this->cell(10, 8, '', 0, 0, 'L');
        $this->cell(130, 8, 'Dengan susunan panitia penguji sebagai berikut : ', 0, 0, 'L');
        $this->Ln(5);
        $this->cell(10, 8, '', 0, 0, 'L');
        foreach ($dosen as $keys) {
            if ($laporan[0]->dosen_penguji1 == $keys->dosen_id) {
                $this->cell(130, 8, 'Ketua Sidang               : ' . $keys->dosen_nama, 0, 0, 'L');
            }
        }

        $this->Ln(5);
        $this->cell(10, 8, '', 0, 0, 'L');
        foreach ($dosen as $keys) {
            if ($laporan[0]->dosen_pembimbing2 == $keys->dosen_id) {
                $this->cell(130, 8, 'Sekretaris                     : ' . $keys->dosen_nama, 0, 0, 'L');
            }
        }
        $this->Ln(10);
        $this->cell(10, 8, '', 0, 0, 'L');
        foreach ($dosen as $keys) {
            if ($laporan[0]->dosen_penguji1 == $keys->dosen_id) {
                $this->cell(130, 8, 'Penguji1 I                     : '. $keys->dosen_nama, 0, 0, 'L');
            }
        }
        
        $this->Ln(5);
        $this->cell(10, 8, '', 0, 0, 'L');
        foreach ($dosen as $keys) {
            if ($laporan[0]->dosen_penguji2 == $keys->dosen_id) {
                $this->cell(130, 8, 'Penguji II                      : ' . $keys->dosen_nama, 0, 0, 'L');
            }
        }
        
        $this->Ln(5);
        $this->cell(10, 8, '', 0, 0, 'L');
        foreach ($dosen as $keys) {
            if ($laporan[0]->dosen_penguji3 == $keys->dosen_id) {
                $this->cell(130, 8, 'Penguji III                     : ' . $keys->dosen_nama, 0, 0, 'L');
            }
        }
        

        $this->Ln(10);
        $this->cell(10, 8, '', 0, 0, 'L');
        foreach ($dosen as $keys) {
            if ($laporan[0]->dosen_pembimbing1 == $keys->dosen_id) {
                $this->cell(130, 8, 'Pembimbing I               : ' . $keys->dosen_nama, 0, 0, 'L');
            }
        }
        
        $this->Ln(5);
        $this->cell(10, 8, '', 0, 0, 'L');
        foreach ($dosen as $keys) {
            if ($laporan[0]->dosen_pembimbing2 == $keys->dosen_id) {
                $this->cell(130, 8, 'Pembimbing II              : ' . $keys->dosen_nama, 0, 0, 'L');
            }
        }
        

        $this->Ln(5);
        $this->cell(10, 8, '', 0, 0, 'L');
        $this->cell(130, 8, 'Demikian Undangan ini kami sampaikan kepada Bapak/Ibu, atas kerjasama yang baik diucapkan terimakasih.', 0, 0, 'L');

        $this->Ln(15);
        $this->cell(130, 6, '', 0, 0, 'L', 1);
        $this->cell(100, 6, "Kendari , " . date('d - M - Y'), 0, 1, 'L', 1);
        $this->cell(130, 6, '', 0, 0, 'L', 1);
        $this->cell(100, 6, "Ketua Jurusan Teknik Informatika", 0, 1, 'L', 1);
        $this->Ln(15);
        $this->setFont('Arial', 'U', 9);
        $this->setFillColor(255, 255, 255);
        $this->cell(130, 6, '', 0, 0, 'L', 1);
        $this->cell(150, 6, "Sutardi,S.Kom.,M,T", 0, 1, 'L', 1);
        $this->setFont('Arial', '', 9);
        $this->cell(130, 6, '', 0, 0, 'L', 1);
        $this->cell(100, 6, "NIP.19760222 201012 1 001", 0, 1, 'L', 1);

        $ya = $ya + $rw;
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        //buat garis horizontal
        $this->Line(10, $this->GetY(), 200, $this->GetY());
        //Arial italic 9
        $this->SetFont('Arial', 'I', 9);
        $this->Cell(0, 10, 'Copyright@' . date('Y') . ' Teknik Informatika', 0, 0, 'L');
        //nomor halaman
        $this->Cell(0, 10, 'Page ' . $this->PageNo() . '/{nb}', 0, 0, 'R');
    }
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
//$pdf->SetFont('Times','',12);
//for($i=1;$i<=40;$i++)
//    $pdf->Cell(0,10,'Printing line number '.$i,0,1);
$pdf->Content($laporan, $dosen);
$pdf->Output();
