<?php
    // memanggil library FPDF
    require('../assets/lib/fpdf181/fpdf.php');
    // intance object dan memberikan pengaturan halaman PDF
    $pdf = new FPDF('l','mm','A3');
    // membuat halaman baru
    $pdf->AddPage();
    // setting jenis font yang akan digunakan
    $pdf->SetFont('Arial','B',16);
    // mencetak string 
    $pdf->Cell(400,7,'LAPORAN DATA KELUHAN',0,1,'C');
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(400,7,'MAHASIWA D3 TEKNIK INFORMATIKA',0,1,'C');
    
    // Memberikan space kebawah agar tidak terlalu rapat
    $pdf->Cell(10,7,'',0,1);
    
    $pdf->SetFont('Arial','B',11);
    $pdf->Cell(25,6,'NIM',1,0);
    $pdf->Cell(35,6,'KATEGORI',1,0);
    $pdf->Cell(70,6,'SASARAN',1,0);
    $pdf->Cell(105,6,'KELUHAN',1,0);
    $pdf->Cell(105,6,'SARAN',1,0);
    $pdf->Cell(30,6,'TANGGAL',1,0);
    $pdf->Cell(25,6,'STATUS',1,1);
    
    $pdf->SetFont('Arial','',11);
    
    include '../config/connect.php';
    $keluhan = mysqli_query($con, "select *from keluhan order by id desc");
    $kel = mysqli_fetch_array($members);
    $nim = $mem['nim'];
    $query = mysqli_query($con, "select *from mahasiswa where nim='$nim'");
    $mhs = mysqli_fetch_array($query);

    while ($row = mysqli_fetch_array($keluhan)){
        $pdf->Cell(25,6,$row['nim'],1,0);
        $pdf->Cell(35,6,$row['kategori'],1,0);
        $pdf->Cell(70,6,$row['sasaran'],1,0);
        $pdf->Cell(105,6,$row['keluhan'],1,0);
        $pdf->Cell(105,6,$row['saran'],1,0);
        $pdf->Cell(30,6,$row['tanggal'],1,0);
        $pdf->Cell(25,6,$row['status'],1,1); 
    }
    
    $pdf->Output();
?>