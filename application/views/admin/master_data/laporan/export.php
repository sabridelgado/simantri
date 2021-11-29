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
            // $this->Line(10,$this->GetY(),200,$this->GetY());
            // Logo
            $this->Image('http://dummyprojectts.000webhostapp.com/upload/pdf.png', 3, 25, '200', '30', 'png');
            $this->Ln(49);
            $this->setFont('Arial', '', 14);
            $this->setFillColor(255, 255, 255);
            // $this->cell(25,6,'',0,0,'C',0); 
            $this->cell(0, 0, 'PENGAJUAN JUDUL TUGAS AKHIR', 0, 0, 'C');
            // $this->Cell(10,0,'Center text:',0,0,'C');
            // $this->cell(25,6,'',0,0,'C',0); 
            // $this->cell(100,6,"",0,1,'L',1); 
            // $this->cell(25,6,'',0,0,'C',0); 
            // $this->cell(100,6,'',0,1,'L',1); 
            // Line break
            $this->Ln(9);
            $this->setFont('Arial', 'B', 9);
            $this->setFillColor(230, 230, 200);
            // $this->cell(10,10,'No.',1,0,'L',1);
            // $this->cell(25,10,'NIP',1,0,'L',1);
            // $this->cell(50,10,'',1,0,'L',1);
            // $this->cell(105,10,'ALAMAT',1,1,'C',1);
        } else {
            $this->setFont('Arial', 'I', 9);
            $this->setFillColor(255, 255, 255);
            $this->cell(90, 6, '', 0, 0, 'L', 1);
            $this->cell(100, 6, "(A4 - Portrait) - Printed date : " . date('d-M-Y'), 0, 1, 'R', 1);
            // $this->Line(10,$this->GetY(),200,$this->GetY());
            // Logo
            $this->Image('http://dummyprojectts.000webhostapp.com/upload/pdf.png', 3, 25, '200', '30', 'png');
            $this->Ln(49);
            $this->setFont('Arial', '', 14);
            $this->setFillColor(255, 255, 255);
            // $this->cell(25,6,'',0,0,'C',0); 
            $this->cell(0, 0, 'PENGAJUAN JUDUL TUGAS AKHIR', 0, 0, 'C');
            // $this->Cell(10,0,'Center text:',0,0,'C');
            // $this->cell(25,6,'',0,0,'C',0); 
            // $this->cell(100,6,"",0,1,'L',1); 
            // $this->cell(25,6,'',0,0,'C',0); 
            // $this->cell(100,6,'',0,1,'L',1); 
            // Line break
            $this->Ln(9);
            $this->setFont('Arial', 'B', 9);
            $this->setFillColor(230, 230, 200);
            // $this->cell(10,10,'No.',1,0,'L',1);
            // $this->cell(25,10,'NIP',1,0,'L',1);
            // $this->cell(50,10,'',1,0,'L',1);
            // $this->cell(105,10,'ALAMAT',1,1,'C',1);
        }
    }

    function Content($laporan, $dosen)
    {
        $ya = 46;
        $rw = 6;
        $no = 1;
        // foreach ($sSQL as $key) {
        $this->setFont('Arial', '', 12);
        $this->setFillColor(255, 255, 255);
        $this->cell(14, 8, '', 0, 0, 'L');
        $this->cell(165, 8, '  Nama : ' . $laporan[0]->nama_mahasiswa, 1, 0, 'L');
        $this->Ln(8);
        $this->cell(14, 8, '', 0, 0, 'L');
        $this->cell(165, 8, '  Nim    : ' . $laporan[0]->nim_mahasiswa, 1, 0, 'L');
        $this->Ln(8);
        $this->cell(14, 8, '', 0, 0, 'L');
        $this->cell(165, 8, 'JUDUL', 1, 0, 'C');
        $this->Ln(8);
        $this->cell(14, 0, '', 0, 0, 'L');
        // $this->cell(0.1, 90, '', 1);
        $this->MultiCell(160, 10, $laporan[0]->judul_skripsi, 0);
        // $this->cell(0.1, 90, '', 1);
        $this->Ln(50);
        $this->cell(14, 8, '', 0, 0, 'L');
        $this->cell(165, 8, 'Dosen Pendamping', 1, 0, 'C');
        $this->Ln(8);
        $this->cell(14, 8, '', 0, 0, 'L');
        $this->cell(10, 8, '1', 1, 0, 'C');
        foreach ($dosen as $keys) {
            if ($laporan[0]->dosen_pembimbing1 == $keys->dosen_id) {
                $this->cell(155, 8, $keys->dosen_nama, 1, 0, 'L');
            }
        }

        $this->Ln(8);
        $this->cell(14, 8, '', 0, 0, 'L');
        $this->cell(10, 8, '2', 1, 0, 'C');
        foreach ($dosen as $keys) {
            if ($laporan[0]->dosen_pembimbing2 == $keys->dosen_id) {
                $this->cell(155, 8, $keys->dosen_nama, 1, 0, 'L');
            }
        }
        $this->Ln(20);
        $this->setFont('Arial', '', 9);
        $this->setFillColor(255, 255, 255);
        $this->cell(130, 6, '', 0, 0, 'L', 1);
        $this->cell(100, 6, "Kendari , " . date('d - M - Y'), 0, 1, 'L', 1);
        // $this->Ln(10);
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




        // $this->cell(14,0,$no,0,0,'L');
        // $this->cell(25,6,$key->nip,1,0,'L',1);
        // $this->cell(50,6,$key->nama_pegawai,1,0,'L',1);
        // $this->cell(105,6,$key->alamat,1,1,'L',1);
        $ya = $ya + $rw;
        // $no++;
        // }            
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
