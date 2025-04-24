<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

function demo_basic() {
    $spreadsheet = new Spreadsheet();
    $thefile = 'PlaySheet.xlsx';
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'Hello World !');

    $writer = new Xlsx($spreadsheet);
    $writer->save($thefile);

    echo "$thefile has been created\n";
}

demo_basic();
