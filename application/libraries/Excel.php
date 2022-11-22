<?php defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class Excel
{
    protected $_ci;
  
    public function __construct()
    {
        log_message('Debug', 'PHPSpreadSheet class is loaded.');
        $this->_ci = &get_instance();
        $this->_ci->load->database();
    }

    public function export($data = [])
    {
        // ej($data);
        $spreadsheet = new Spreadsheet;

        // Set default style
        $tableHeadTitle = [
            'font' => [
                'bold' => true,
                'color' => [
                    'rgb' => 'ffffff'
                ]
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => '44749f'
                ]
            ]
        ];

        // table head description
        $tableHeadDesc = [
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => [
                    'rgb' => '9cc2e5'
                ]
            ]
        ];

         //First sheet
        $spreadsheet->getActiveSheet();

        // MATRIX KEPUTUSAN
        $sheet = $spreadsheet->createSheet(0);

        // Make matrix keputusan header
        $sheet->setCellValue('B3', 'No')
            ->setCellValue('C3', 'Siswa')
            ->setCellValue('D3', 'Kriteria');
            
        $kolomKategori = 'C';
        foreach($data['kategori'] as $key => $val){
            $sheet->setCellValue(++$kolomKategori.'4', $val->kode);
        }
        
        // merge cell
        $sheet->mergeCells('B3:B4');
        $sheet->getStyle('B3:B4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->mergeCells('C3:C4');
        $sheet->getStyle('C3:C4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->mergeCells('D3:'.$kolomKategori.'3');
        
        // set style
        $sheet->getStyle('B3:'.$kolomKategori.'4')->applyFromArray($tableHeadTitle);
        
        // set auto column & text alignment
        $sheet->getStyle('B')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('D:'.$kolomKategori)->getAlignment()->setHorizontal('center');
        
        // Set title
        $sheet->setCellValue('B1', 'Matrix Keputusan (X)');
        $sheet->mergeCells('B1:'.$kolomKategori.'1');

        // make matrix keputusan data
        $no = 1;
        $row = 5;
        foreach ($data['matrix_keputusan'] as $key => $val) {
            $sheet->setCellValue('B'.$row, $no++);
            $sheet->setCellValue('C'.$row, $val->nama);
            if(!empty($data['kategori'])){
                $column = 'D';
                foreach ($data['kategori'] as $k => $v) {
                    $sheet->setCellValue($column++.$row, $val->kategori_siswa[$v->id]->nilai);
                }
            }

            $row++;
        }

        $sheet->getColumnDimension('C')->setAutoSize(true);

        // Rename sheet
        $sheet->setTitle("Matrix Keputusan (X)");

        // BOBOT KRITERIA
        $sheet = $spreadsheet->createSheet(1);

        // Make matrix keputusan header
        $sheet->setCellValue('B3', 'Kriteria');
            
        $kolomKategori = 'A';
        foreach($data['kategori'] as $key => $val){
            $jenis = $val->jenis == 1 ? 'benefit' : 'cost';
            $sheet->setCellValue(++$kolomKategori.'4', "{$val->kode} ({$jenis})");
            $sheet->getColumnDimension($kolomKategori)->setAutoSize(true);
        }
        
        // merge cell
        $sheet->mergeCells('B3:'.$kolomKategori.'3');
        
        // set style
        $sheet->getStyle('B3:'.$kolomKategori.'4')->applyFromArray($tableHeadTitle);
        
        // set auto column & text alignment
        $sheet->getStyle('B:'.$kolomKategori)->getAlignment()->setHorizontal('center');
        
        // Set title
        $sheet->setCellValue('B1', 'Bobot Kriteria (W)');
        $sheet->mergeCells('B1:'.$kolomKategori.'1');

        // make matrix keputusan data
        $row = 5;
        $column = 'B';
        foreach ($data['kategori'] as $k => $v) {
            $sheet->setCellValue($column++.$row, $data['bobot_kriteria'][$v->id]->bobot);
        }

        // Rename sheet
        $sheet->setTitle("Bobot Kriteria (W)");

        // NORMALISASI BOBOT KRITERIA
        $sheet = $spreadsheet->createSheet(2);

        // Make matrix keputusan header
        $sheet->setCellValue('B3', 'Kriteria');

        $kolomKategori = 'A';
        foreach ($data['kategori'] as $key => $val) {
            $jenis = $val->jenis == 1 ? 'benefit' : 'cost';
            $sheet->setCellValue(++$kolomKategori.'4', "{$val->kode} ({$jenis})");
            $sheet->getColumnDimension($kolomKategori)->setAutoSize(true);
        }

        // merge cell
        $sheet->mergeCells('B3:'.$kolomKategori.'3');

        // set style
        $sheet->getStyle('B3:'.$kolomKategori.'4')->applyFromArray($tableHeadTitle);

        // set auto column & text alignment
        $sheet->getStyle('B:'.$kolomKategori)->getAlignment()->setHorizontal('center');

        // Set title
        $sheet->setCellValue('B1', 'Normalisasi Bobot Kriteria (W)');
        $sheet->mergeCells('B1:'.$kolomKategori.'1');

        // make matrix keputusan data
        $row = 5;
        $column = 'B';
        foreach ($data['kategori'] as $k => $v) {
            $sheet->setCellValue($column++.$row, $data['normalisasi_bobot_kriteria'][$v->id]['normalisasi']);
        }

        // Rename sheet
        $sheet->setTitle("Normalisasi Bobot Kriteria (W)");

        // NILAI VEKTOR S
        $sheet = $spreadsheet->createSheet(3);

        // Make matrix keputusan header
        $sheet->setCellValue('B3', 'No')
            ->setCellValue('C3', 'Siswa')
            ->setCellValue('D3', 'Kriteria');
            
        $kolomKategori = 'C';
        foreach($data['kategori'] as $key => $val){
            $sheet->setCellValue(++$kolomKategori.'4', $val->kode);
        }
        
        // merge cell
        $sheet->mergeCells('B3:B4');
        $sheet->getStyle('B3:B4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->mergeCells('C3:C4');
        $sheet->getStyle('C3:C4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->mergeCells('D3:'.$kolomKategori.'3');

        $sheet->setCellValue(++$kolomKategori.'3', 'Vektor S');
        $sheet->mergeCells($kolomKategori.'3:'.$kolomKategori.'4');
        $sheet->getStyle($kolomKategori.'3:'.$kolomKategori.'4')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        // set style
        $sheet->getStyle('B3:'.$kolomKategori.'4')->applyFromArray($tableHeadTitle);
        
        // set auto column & text alignment
        $sheet->getStyle('B')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('D:'.$kolomKategori)->getAlignment()->setHorizontal('center');
        
        // Set title
        $sheet->setCellValue('B1', 'Nilai Vektor (S)');
        $sheet->mergeCells('B1:'.$kolomKategori.'1');

        // make matrix keputusan data
        $no = 1;
        $row = 5;
        $rowKategori = 5;
        $tampungRow = 1;
        $tampungColumn = 'D';
        foreach ($data['matrix_keputusan'] as $key => $val) {
            $sheet->setCellValue('B'.$row, $no++);
            $sheet->setCellValue('C'.$row, $val->nama);
            if(!empty($data['kategori'])){
                $column = 'D';
                $columnKategori = 'B';
                foreach ($data['kategori'] as $k => $v) {
                    // set formula
                    // check if benefit or cost
                    $jenis = $v->jenis == 1 ? +1 : -1; #times -1 if cost
                    $sheet->setCellValue($column.$row, "='Matrix Keputusan (X)'!".$column.$row."^('Normalisasi Bobot Kriteria (W)'!".$columnKategori.$rowKategori."*".$jenis.")");

                    $column++;
                    $columnKategori++;
                }
            }

            $sheet->setCellValue($column.$row, '=PRODUCT(D'.$row.':'.chr(ord($column) - 1).$row.')');
            $tampungColumn = $column;
            $row++;
            $tampungRow = $row-1;
        }

        $sheet->getColumnDimension('C')->setAutoSize(true);

        // Rename sheet
        $sheet->setTitle("Nilai Vektor (S)");

        // NILAI VEKTOR S
        $sheet = $spreadsheet->createSheet(4);

        // Make matrix keputusan header
        $sheet->setCellValue('B3', 'No')
            ->setCellValue('C3', 'Siswa')
            ->setCellValue('D3', 'Nilai (V)')
            ->setCellValue('E3', 'Peringkat (kelayakan)');
            
        // set style
        $sheet->getStyle('B3:E3')->applyFromArray($tableHeadTitle);
        
        // set auto column & text alignment
        $sheet->getStyle('B')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('D')->getAlignment()->setHorizontal('center');
        $sheet->getStyle('E')->getAlignment()->setHorizontal('center');
        
        // Set title
        $sheet->setCellValue('B1', 'Nilai Vektor (V)');
        $sheet->mergeCells('B1:E1');

        // make matrix keputusan data
        $no = 1;
        $row = 4;
        $rowRumus = 5;
        $column = 'D';
        foreach ($data['matrix_keputusan'] as $key => $val) {
            $sheet->setCellValue('B'.$row, $no++);
            $sheet->setCellValue('C'.$row, $val->nama);

            $sheet->setCellValue($column.$row, "='Nilai Vektor (S)'!".$tampungColumn.$rowRumus."/(SUM('Nilai Vektor (S)'!".$tampungColumn."5:".$tampungColumn.$tampungRow."))");
            // ej("='Nilai Vektor (S)'!".$tampungColumn.$rowRumus."/(SUM('Nilai Vektor (S)'!".$tampungColumn."5:".$tampungColumn.$tampungRow."))");
            $sheet->setCellValue('E'.$row, $data['nilai_vektor_v'][$val->id]->peringkat);
            $row++;
            $rowRumus++;
        }

        $sheet->getColumnDimension('B')->setAutoSize(true);
        $sheet->getColumnDimension('C')->setAutoSize(true);
        $sheet->getColumnDimension('D')->setAutoSize(true);
        $sheet->getColumnDimension('E')->setAutoSize(true);

        // set filter
        $autoFilter = $sheet->getAutoFilter('B4:D'.($row-1));
        // $columnFilter = $autoFilter->getColumn('D');

        // Rename sheet
        $sheet->setTitle("Nilai Vektor (V)");



        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Export excel '.date("dMY").'.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}
