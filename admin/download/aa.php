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

$sheet->setCellValue('A1', "DATA JADWAL DOKTER"); // Set kolom A1 dengan tulisan "DATA SISWA"
$sheet->mergeCells('A1:F1'); // Set Merge Cell pada kolom A1 sampai F1
$sheet->getStyle('A1')->getFont()->setBold(true); // Set bold kolom A1
$sheet->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1

// Buat header tabel nya pada baris ke 3
$sheet->setCellValue('A3', "NO"); // Set kolom A3 dengan tulisan "NO"
$sheet->setCellValue('B3', "Nama Dokter"); // Set kolom B3 dengan tulisan "NIS"
$sheet->setCellValue('C3', "Poli"); // Set kolom C3 dengan tulisan "NAMA"
$sheet->setCellValue('D3', "Jadwal Praktik"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"
$sheet->setCellValue('E3', "Hari"); // Set kolom D3 dengan tulisan "JENIS KELAMIN"


// Apply style header yang telah kita buat tadi ke masing-masing kolom header
$sheet->getStyle('A3')->applyFromArray($style_col);
$sheet->getStyle('B3')->applyFromArray($style_col);
$sheet->getStyle('C3')->applyFromArray($style_col);
$sheet->getStyle('D3')->applyFromArray($style_col);
$sheet->getStyle('E3')->applyFromArray($style_col);

// Set height baris ke 1, 2 dan 3
$sheet->getRowDimension('1')->setRowHeight(20);
$sheet->getRowDimension('2')->setRowHeight(20);
$sheet->getRowDimension('3')->setRowHeight(20);

// Buat query untuk menampilkan semua data siswa


$sql = "SELECT a.id_dokter, a.nama,a.poli_id, a.start, a.off,a.mulai, a.selesai, b.id, b.nama as poli FROM dokter a inner join poli b on (a.poli_id = b.id) " ;


$sql.=" order by id_dokter ASC  ";

$all  =  mysqli_num_rows(mysqli_query($conn, $sql));
$tampil = mysqli_query($conn, $sql);

$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$row = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
while (list($id_dokter, $nama,$poli_id, $start, $off,$mulai,$selesai, $id, $poli)=mysqli_fetch_array($tampil)) {
    $sheet->setCellValue('A' . $row, $no);
    $sheet->setCellValue('B' . $row, $nama);
    $sheet->setCellValue('C' . $row, $poli);
    $sheet->setCellValue('D' . $row, $start." - ".$off);
    $sheet->setCellValue('E' . $row, $mulai." s/d ".$selesai);
    // Khusus untuk no telepon. kita set type kolom nya jadi STRING
   
    // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
    $sheet->getStyle('A' . $row)->applyFromArray($style_row);
    $sheet->getStyle('B' . $row)->applyFromArray($style_row);
    $sheet->getStyle('C' . $row)->applyFromArray($style_row);
    $sheet->getStyle('D' . $row)->applyFromArray($style_row);
    $sheet->getStyle('E' . $row)->applyFromArray($style_row);

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


// Set orientasi kertas jadi LANDSCAPE
$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

// Set judul file excel nya
$sheet->setTitle("Jadwal Praktik Dokter");

// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Jadwal Praktik Dokter.xlsx"'); // Set nama file excel nya
header('Cache-Control: max-age=0');

$writer = new Xlsx($spreadsheet);
$writer->save('php://output');
?>