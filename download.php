<?php
require_once('phpoffice_phpspreadsheet/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

$spreadsheet = new Spreadsheet();

//Specify the properties for this document
$spreadsheet->getProperties()
    ->setTitle('PHP Download Example')
    ->setSubject('A PHPExcel example')
    ->setDescription('A simple example for PhpSpreadsheet. This class replaces the PHPExcel class')
    ->setCreator('php-download.com')
    ->setLastModifiedBy('php-download.com');

$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'First_Name');
	$sheet->setCellValue('B1', 'Last_Name');
	$sheet->setCellValue('C1', 'Email');
	$sheet->setCellValue('D1', 'DOB');
	$sheet->setCellValue('E1', 'Contact_No');


//Adding data to the excel sheet
/*$spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A1', 'This')
    ->setCellValue('B1', 'is')
    ->setCellValue('c1', 'example');
	*/
$i=2;
$data = array("one","two","three","four","five");
//echo count($data);
if(count($data) > 0){
			$i=2;
for($k=0;$k<10;$k++) {
	//echo $data[$k];
//$spreadsheet->getActiveSheet()
    $sheet->setCellValue('A'.$i, $data[0]);
    $sheet->setCellValue('B'.$i, $data[1]);
    $sheet->setCellValue('C'.$i, $data[2]);
	$i++;	
}
}
/*
$spreadsheet->getActiveSheet()
    ->setCellValue('B1', "You")
    ->setCellValue('B2', "can")
    ->setCellValue('B3', "download")
    ->setCellValue('B4', "this")
    ->setCellValue('B5', "library")
    ->setCellValue('B6', "on")
    ->setCellValue('B7', "https://php-download.com/package/phpoffice/phpspreadsheet");


$spreadsheet->getActiveSheet()
    ->setCellValue('C1', 1)
    ->setCellValue('C2', 0.5)
    ->setCellValue('C3', 0.25)
    ->setCellValue('C4', 0.125)
    ->setCellValue('C5', 0.0625);


$spreadsheet->getActiveSheet()
    ->setCellValue('C6', '=SUM(C1:C5)');
$spreadsheet->getActiveSheet()
    ->getStyle("C6")->getFont()
    ->setBold(true);


 if($extension == 'csv'){          
      $writer = new \PhpOffice\PhpSpreadsheet\Writer\Csv($spreadsheet);
      $fileName = $fileName.'.csv';
    } elseif($extension == 'xlsx') {
      $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
      $fileName = $fileName.'.xlsx';
    } else {
      $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xls($spreadsheet);
      $fileName = $fileName.'.xls';
    }
*/
$writer = IOFactory::createWriter($spreadsheet, "Csv"); //Xls is also possible
$writer->save('export.csv');
//header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="export.csv"');
header("Content-type: application/csv");

$writer->save("php://output");
exit;
//$writer->save("my_excel_file.xlsx");
?>