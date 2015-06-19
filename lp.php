<?php

error_reporting(0);
require 'fungsi.php';
require_once 'tcpdf/tcpdf.php';
$ur = $_GET[data];
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setHeaderData('logo.png', 10, 'Perpustakaan Jurusan Teknik Informatika Universitas Palangkaraya', 'Jl. H Timang, Telp : 0536 666666 ; http://ti.upr.ac.id');
// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
// Informasi Laporan
$pdf->SetCreator('siputri-gerobakjen');
$pdf->SetAuthor('Van Ray Hosea');
$pdf->SetTitle('Daftar Buku - Generate by SIPUTRI');
$pdf->SetSubject('SIPUTRI');
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->SetFontSize(8);
if ($ur == 'all') {
    $pdf->AddPage();
    $html = '<h2 style="text-align:center;">Daftar Semua Buku</h2><hr>';
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->writeHTMLCell(10, '', '', '', "<b>No</b>", 1, 0, FALSE, TRUE, 'J', FALSE);
    $pdf->writeHTMLCell(110, '', '', '', '<b>Judul</b>', 1, 0, FALSE, TRUE, 'J', FALSE);
    $pdf->writeHTMLCell(40, '', '', '', '<b>Pengaranng</b>', 1, 0, FALSE, TRUE, 'J', FALSE);
    $pdf->writeHTMLCell(30, '', '', '', '<b>Kategori</b>', 1, 0, FALSE, TRUE, 'J', FALSE);
    $a = query("select a.pengarang as 'pengarang', a.idbuku as 'idbuku', a.nama as 'nama', b.nama as 'kategori' from buku a left join kategori b on a.idkategori=b.idkategori");
    $no = 1;
    while ($b = mysql_fetch_array($a)) {
        $pdf->ln();
        $pdf->writeHTMLCell(10, 12, '', '', "$no", 1, 0, FALSE, TRUE, 'L', FALSE);
        $pdf->writeHTMLCell(110, 12, '', '', "$b[nama]", 1, 0, FALSE, TRUE, 'L', FALSE);
        $pdf->writeHTMLCell(40, 12, '', '', "$b[pengarang]", 1, 0, FALSE, TRUE, 'L', FALSE);
        $pdf->writeHTMLCell(30, 12, '', '', "$b[kategori]", 1, 0, FALSE, TRUE, 'L', FALSE);
        $no++;
    }
    $pdf->lastPage();
    $pdf->Output('laporan-all.pdf', 'I');
} elseif ($ur == 'ta') {
    $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// Informasi Laporan
    $pdf->SetCreator('siputri-gerobakjen');
    $pdf->SetAuthor('Van Ray Hosea');
    $pdf->SetTitle('Daftar Buku - Generate by SIPUTRI');
    $pdf->SetSubject('SIPUTRI');
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $pdf->SetFontSize(8);
    $pdf->setHeaderData('logo.png', 10, 'Perpustakaan Jurusan Teknik Informatika Universitas Palangkaraya', 'Jl. H Timang, Telp : 0536 666666 ; http://ti.upr.ac.id');
// set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
// set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
// set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
// set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
// set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    $pdf->AddPage();
    $html = '<h2 style="text-align:center;">Daftar Judul Tugas Akhir</h2>';
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->writeHTMLCell(10, '', '', '', 'No', 1, 0, FALSE, TRUE, 'J', FALSE);
    $pdf->writeHTMLCell(110, '', '', '', 'Judul', 1, 0, FALSE, TRUE, 'J', FALSE);
    $pdf->writeHTMLCell(40, '', '', '', 'Pengaranng', 1, 0, FALSE, TRUE, 'J', FALSE);
    $pdf->writeHTMLCell(60, '', '', '', 'Pembimbing I', 1, 0, FALSE, TRUE, 'J', FALSE);
    $pdf->writeHTMLCell(50, '', '', '', 'Pembimbing II', 1, 0, FALSE, TRUE, 'J', FALSE);
    $a = query("select a.idbuku, a.nama, a.pengarang, c.nama as 'p1' ,d.nama as 'p2', b.jurnal from ta b left join buku a on a.idbuku=b.idbuku left join dosen c on b.pembimbnig1=c.iddosen left join dosen d on b.pembimbing2=d.iddosen where a.idkategori='2' order by a.idbuku DESC");
    $no = 1;
    while ($b = mysql_fetch_array($a)) {
        $pdf->ln();
        $pdf->writeHTMLCell(10, 12, '', '', "$no", 1, 0, FALSE, TRUE, 'L', FALSE);
        $pdf->writeHTMLCell(110, 12, '', '', "$b[nama]", 1, 0, FALSE, TRUE, 'L', FALSE);
        $pdf->writeHTMLCell(40, 12, '', '', "$b[pengarang]", 1, 0, FALSE, TRUE, 'L', FALSE);
        $pdf->writeHTMLCell(60, 12, '', '', "$b[p1]", 1, 0, FALSE, TRUE, 'L', FALSE);
        $pdf->writeHTMLCell(50, 12, '', '', "$b[p2]", 1, 0, FALSE, TRUE, 'L', FALSE);
        $no++;
    }
    $pdf->lastPage();
    $pdf->Output('laporan-ta.pdf', 'I');
} elseif ($ur == 'kp') {
    $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// Informasi Laporan
    $pdf->SetCreator('siputri-gerobakjen');
    $pdf->SetAuthor('Van Ray Hosea');
    $pdf->SetTitle('Daftar Buku - Generate by SIPUTRI');
    $pdf->SetSubject('SIPUTRI');
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $pdf->SetFontSize(8);
    $pdf->setHeaderData('logo.png', 10, 'Perpustakaan Jurusan Teknik Informatika Universitas Palangkaraya', 'Jl. H Timang, Telp : 0536 666666 ; http://ti.upr.ac.id');
// set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
// set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
// set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
// set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
// set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    $pdf->AddPage();
    $html = '<h2 style="text-align:center;">Daftar Kerja Prakek</h2><hr>';
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->writeHTMLCell(10, '', '', '', 'No', 1, 0, FALSE, TRUE, 'J', FALSE);
    $pdf->writeHTMLCell(110, '', '', '', 'Judul', 1, 0, FALSE, TRUE, 'J', FALSE);
    $pdf->writeHTMLCell(40, '', '', '', 'Penulis', 1, 0, FALSE, TRUE, 'J', FALSE);
    $pdf->writeHTMLCell(50, '', '', '', 'Pembimbing', 1, 0, FALSE, TRUE, 'J', FALSE);
    $pdf->writeHTMLCell(57, '', '', '', 'Tempat KP', 1, 0, FALSE, TRUE, 'J', FALSE);
    $a = query("select a.idbuku, a.nama, a.pengarang, c.nama as 'p1',b.tempat_KP as 'tempat' ,b.abstrak from kp b left join buku a on a.idbuku=b.idbuku left join dosen c on b.pembimbing=c.iddosen where a.idkategori='3' order by a.idbuku DESC");
    $no = 1;
    while ($b = mysql_fetch_array($a)) {
        $pdf->ln();
        $pdf->writeHTMLCell(10, 12, '', '', "$no", 1, 0, FALSE, TRUE, 'L', FALSE);
        $pdf->writeHTMLCell(110, 12, '', '', "$b[nama]", 1, 0, FALSE, TRUE, 'L', FALSE);
        $pdf->writeHTMLCell(40, 12, '', '', "$b[pengarang]", 1, 0, FALSE, TRUE, 'L', FALSE);
        $pdf->writeHTMLCell(50, 12, '', '', "$b[p1]", 1, 0, FALSE, TRUE, 'L', FALSE);
        $pdf->writeHTMLCell(57, 12, '', '', "$b[tempat]", 1, 0, FALSE, TRUE, 'L', FALSE);
        $no++;
    }
    $pdf->lastPage();
    $pdf->Output('laporan-kp.pdf', 'I');
} elseif ($ur == 'pp') {
    $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
// Informasi Laporan
    $pdf->SetCreator('siputri-gerobakjen');
    $pdf->SetAuthor('Van Ray Hosea');
    $pdf->SetTitle('Daftar Buku - Generate by SIPUTRI');
    $pdf->SetSubject('SIPUTRI');
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
    $pdf->SetFontSize(8);
    $pdf->setHeaderData('logo.png', 10, 'Perpustakaan Jurusan Teknik Informatika Universitas Palangkaraya', 'Jl. H Timang, Telp : 0536 666666 ; http://ti.upr.ac.id');
// set header and footer fonts
    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
// set default monospaced font
    $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
// set margins
    $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
// set auto page breaks
    $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
// set image scale factor
    $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

    $pdf->AddPage();
    $html = '<h2 style="text-align:center;">Daftar Judul Program Profesional</h2><hr>';
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->writeHTMLCell(10, '', '', '', 'No', 1, 0, FALSE, TRUE, 'J', FALSE);
    $pdf->writeHTMLCell(150, '', '', '', 'Judul', 1, 0, FALSE, TRUE, 'J', FALSE);
    $pdf->writeHTMLCell(50, '', '', '', 'Penulis', 1, 0, FALSE, TRUE, 'J', FALSE);
    $pdf->writeHTMLCell(60, '', '', '', 'Pembimbing', 1, 0, FALSE, TRUE, 'J', FALSE);
    $a = query("select a.idbuku, a.nama, a.pengarang, c.nama as 'p1',b.abstrak from pp b left join buku a on a.idbuku=b.idbuku left join dosen c on b.pembimbing=c.iddosen where a.idkategori='4' order by a.idbuku DESC");
    $no = 1;
    while ($b = mysql_fetch_array($a)) {
        $pdf->ln();
        $pdf->writeHTMLCell(10, 12, '', '', "$no", 1, 0, FALSE, TRUE, 'L', FALSE);
        $pdf->writeHTMLCell(150, 12, '', '', "$b[nama]", 1, 0, FALSE, TRUE, 'L', FALSE);
        $pdf->writeHTMLCell(50, 12, '', '', "$b[pengarang]", 1, 0, FALSE, TRUE, 'L', FALSE);
        $pdf->writeHTMLCell(60, 12, '', '', "$b[p1]", 1, 0, FALSE, TRUE, 'L', FALSE);
        $no++;
    }
    $pdf->lastPage();
    $pdf->Output('laporan-pp.pdf', 'I');
} elseif ($ur == 'buku') {
    $pdf->AddPage();
    $html = '<h2 style="text-align:center;">Daftar Judul Buku</h2>';
    $pdf->writeHTML($html, true, false, true, false, '');
    $pdf->writeHTMLCell(10, '', '', '', 'No', 1, 0, FALSE, TRUE, 'J', FALSE);
    $pdf->writeHTMLCell(110, '', '', '', 'Judul', 1, 0, FALSE, TRUE, 'J', FALSE);
    $pdf->writeHTMLCell(40, '', '', '', 'Pengaranng', 1, 0, FALSE, TRUE, 'J', FALSE);
    $pdf->writeHTMLCell(30, '', '', '', 'Penerbit', 1, 0, FALSE, TRUE, 'J', FALSE);
    $a = query("select a.idbuku, a.nama, a.pengarang, b.cover,b.tahun, b.sinapsis,b.kodebuku,b.status,b.penerbit from buku_detail b left join buku a on a.idbuku=b.idbuku where a.idkategori='1' order by a.idbuku DESC");
    $no = 1;
    while ($b = mysql_fetch_array($a)) {
        $pdf->ln();
        $pdf->writeHTMLCell(10, 12, '', '', "$no", 1, 0, FALSE, TRUE, 'L', FALSE);
        $pdf->writeHTMLCell(110, 12, '', '', "$b[nama]", 1, 0, FALSE, TRUE, 'L', FALSE);
        $pdf->writeHTMLCell(40, 12, '', '', "$b[pengarang]", 1, 0, FALSE, TRUE, 'L', FALSE);
        $pdf->writeHTMLCell(30, 12, '', '', "$b[penerbit]", 1, 0, FALSE, TRUE, 'L', FALSE);
        $no++;
    }
    $pdf->lastPage();
    $pdf->Output('laporan-buku.pdf', 'I');
} else {
    echo 'URL salah.. ';
}