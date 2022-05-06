<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();

$spreadsheet = $reader->load("resources\data\DatosTarea1.xls");

if (isset($_POST['formulary'])) {
    if ($_POST['formulary'] == 0) {
        $data = $_POST['userData'];
        $ignore = [0, 5, 6, 7];
        euclides(0, $data, $ignore, 1,7);
    }
    else if ($_POST['formulary'] == 1) {
        $data = $_POST['userData'];
        $ignore = [1,3,4,5,6,7,8];
        euclides(1, $data, $ignore, 0 ,1);
    }
    else if ($_POST['formulary'] == 2) {
        $data = $_POST['userData'];
        $ignore = [0,3,4,5,6,7,8];
        euclides(1, $data, $ignore, 0 ,0);
    }
    else if ($_POST['formulary'] == 3) {
        $data = $_POST['userData'];
        $ignore = [3,4,5,6,7,8,9];
        euclides(1, $data, $ignore, 0 ,9);
    }
    else if ($_POST['formulary'] == 4) {
        $data = $_POST['userData'];
        $ignore = [8];
        euclides(2, $data, $ignore, 0 ,8);
    }
    else if ($_POST['formulary'] == 5) {
        $data = $_POST['userData'];
        $ignore = [0,5];
        euclides(3, $data, $ignore, 0 ,5);
    } 
    else {
        echo "Error";
    }
}

function euclides($sheetNumber, $formData, $columIgnore, $columReduce , $objColum)
{
    global $spreadsheet;
    $sheet = $spreadsheet->getSheet($sheetNumber)->toArray();
    $euclidesDistances = array();
    $rowDistance = 0;
    //Euclidian distance
    for ($row = 1; $row < count($sheet); $row++) {
        $rowDistance = 0;
        for ($colum = 0; $colum < (count($sheet[0]) - $columReduce); $colum++) {
            if (in_array($colum, $columIgnore) == false) {
                if(is_numeric($sheet[$row][$colum])){
                    $rowDistance += pow($sheet[$row][$colum] - $formData[$colum], 2);
                }
                else{
                    if($sheet[$row][$colum] != $formData[$colum]){
                        $rowDistance += 1;
                    }
                }
            }
        }
        $rowDistance = sqrt($rowDistance);
        array_push($euclidesDistances, $rowDistance);
    }
    //find the smallest value
    $minDistance = min($euclidesDistances);
    //find the index of the small value;
    $minIndex = 0;
    for ($row = 0; $row < count($euclidesDistances); $row++) {
        if ($euclidesDistances[$row] == $minDistance) {
            $minIndex = $row + 1;
            break;
        }
    }
    echo $sheet[$minIndex][$objColum];
}
