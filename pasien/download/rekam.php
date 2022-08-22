<?php
// Load file koneksi.php
include "../../config/config.php";


// Load file autoload.php
require '../../vendor/autoload.php';

// Include librari PhpSpreadsheet
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
$style_col = [
    'font' => ['bold' => true], // Set font nya jadi bold
    'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
    ],
    'borders' => [
        'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
        'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
        'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
        'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
    ]
];

// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
$style_row = [
    'alignment' => [
        'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
    ],
    'borders' => [
        'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
        'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
        'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
        'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
    ]
];

$sheet->setCellValue('A1', "DATA Rekam Medis"); // Set kolom A1 dengan tulisan "DATA SISWA"
$sheet->mergeCells('A1:F1'); // Set Merge Cell pada kolom A1 sampai F1
$sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
$sheet->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1

// Buat header tabel nya pada baris ke 3
$sheet->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
$sheet->setCellValue('B3', "Tanggal"); // Set kolom B3 dengan tulisan "NIS"
$sheet->setCellValue('C3', "Nama Pasien"); // Set kolom C3 dengan tulisan "NAMA"
$sheet->setCellValue('D3', "Nama Dokter"); // Set kolom C3 dengan tulisan "NAMA"
$sheet->setCellValue('E3', "Anamnesa"); // Set kolom C3 dengan tulisan "NAMA"
$sheet->setCellValue('F3', "Diagnosa"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"


// Apply style header yang telah kita buat tadi ke masing-masing kolom header
$sheet->getStyle('A3')->applyFromArray($style_col);
$sheet->getStyle('B3')->applyFromArray($style_col);
$sheet->getStyle('C3')->applyFromArray($style_col);
$sheet->getStyle('D3')->applyFromArray($style_col);
$sheet->getStyle('E3')->applyFromArray($style_col);
$sheet->getStyle('F3')->applyFromArray($style_col);

// Set height baris ke 1, 2 dan 3
$sheet->getRowDimension('1')->setRowHeight(20);
$sheet->getRowDimension('2')->setRowHeight(20);
$sheet->getRowDimension('3')->setRowHeight(20);

// Buat query untuk menampilkan semua data siswa

$dt = (isset($_GET['dt']))? $_GET['dt'] : null;

$pasienx = (isset($_GET['pasienx']))? $_GET['pasienx'] : null;

$sql = "SELECT a.id, a.nik,a.id_dokter, a.created_at, a.anamnesa, a.diagnosa , b.id as bid, b.nama as pasien, b.nik as nikb, b.email, b.jk,b.no_hp, b.tempat_lahir, b.tanggal_lahir, b.alamat, b.jenis_pasien, b.no_bpjs,  c.id_dokter as idok, c.nama as nama_dokter, c.poli_id, c.start, c.off
        FROM rekam_medis a 
        inner join pasien b on (a.nik = b.nik)
        inner join dokter c on (a.id_dokter = c.id_dokter) 
        where b.nama = '$pasienx' " ;



if(!empty($dt)){
    $date = explode(" to ",$dt);
    $start = $date[0]." 00:00:00" ;
    if (!empty($date[1])){
        $end = $date[1]." 23:59:59" ;
    } else {
        $end = $date[0]." 23:59:59" ;
    }
    
    $sql.=" and  a.created_at between '$start' and  '$end' ";
}

$sql.=" order by a.created_at ASC  ";

// echo "$sql";
$all  =  mysqli_num_rows(mysqli_query($conn, $sql));
$tampil = mysqli_query($conn, $sql);


$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$row = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
while (list($id, $nik,$id_dokter, $created_at, $anamnesa, $diagnosa , $bid, $pasien, $nikb, $email, $jk,$no_hp, $tempat_lahir, $tanggal_lahir, $alamat, $jenis_pasien, $no_bpjs,  $idok, $nama_dokter, $spesialis, $start, $off)=mysqli_fetch_array($tampil)) {

    $sheet->setCellValue('A' . $row, $no);
    $sheet->setCellValue('B' . $row, $created_at);
    $sheet->setCellValue('C' . $row, $pasien);
    $sheet->setCellValue('D' . $row, $nama_dokter);
    $sheet->setCellValue('E' . $row, $anamnesa);
    $sheet->setCellValue('F' . $row, $diagnosa);
    // Khusus untuk no telepon. kita set type kolom nya jadi STRING
   
    // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
    $sheet->getStyle('A' . $row)->applyFromArray($style_row);
    $sheet->getStyle('B' . $row)->applyFromArray($style_row);
    $sheet->getStyle('C' . $row)->applyFromArray($style_row);
    $sheet->getStyle('D' . $row)->applyFromArray($style_row);
    $sheet->getStyle('E' . $row)->applyFromArray($style_row);
    $sheet->getStyle('F' . $row)->applyFromArray($style_row);

    $sheet->getStyle('A' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom No
    $sheet->getStyle('B' . $row)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT); // Set text left untuk kolom NIS

    $sheet->getRowDimension($row)->setRowHeight(20); // Set height tiap row

    $no++; // Tambah 1 setiap kali looping
    $row++; // Tambah 1 setiap kali looping
}

// Set width kolom
$sheet->getColumnDimension('A')->setWidth(5); // Set width kolom A
$sheet->getColumnDimension('B')->setWidth(15); // Set width kolom B
$sheet->getColumnDimension('C')->setWidth(25); // Set width kolom C
$sheet->getColumnDimension('D')->setWidth(20); // Set width kolom D
$sheet->getColumnDimension('E')->setWidth(20); // Set width kolom D
$sheet->getColumnDimension('F')->setWidth(20); // Set width kolom D


// Set orientasi kertas jadi LANDSCAPE
$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

// Set judul file excel nya
$sheet->setTitle("Data Rekam Medis");

// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Data Rekam Medis.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
?>