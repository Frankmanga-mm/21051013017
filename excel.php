<?php
error_reporting(E_ALL); ini_set('display_errors', 'Off');
//connect to db
require_once('data.php');
//set filename
$title.$filename="excel.xls";
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

/** Include PHPExcel */
require_once dirname(__FILE__) . '../../Classes/PHPExcel.php';


// Create new PHPExcel object
echo date('H:i:s') , " Create new PHPExcel object" , EOL;
$objPHPExcel = new PHPExcel();

// Set document properties
echo date('H:i:s') , " Set document properties" , EOL;
$objPHPExcel->getProperties()->setCreator("REGISTERED-USERS")
                             ->setLastModifiedBy("ATC-SMS System")
                             ->setTitle("ATC-NACTE REPORT")
                             ->setSubject("ATC-NACTE REPORT")
                             ->setDescription("Test document for PHPExcel, generated using PHP classes.")
                             ->setKeywords("office PHPExcel php")
                             ->setCategory("Test result file");
//set font size for the whole document
//$objPHPExcel->getActiveSheet()->getStyle("F1:G1")->getFont()->setSize(16);//for some cells
$objPHPExcel->getDefaultStyle()->getFont()->setName('Arial')->setSize(10);
// Add some data
echo date('H:i:s') , " Add some data" , EOL;
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A1', $org)
->setCellValue('A2', 'PAST PAPER REGISTERED-USERS '.$coz_nm .'  '.$pz)
->setCellValue('A3','Sno')
->setCellValue('B3','First Name')
->setCellValue('C3','Second Name')
->setCellValue('D3','Last Name')
->setCellValue('E3','Phone Number')
->setCellValue('F3','Address')
->setCellValue('G3','Gender')
->setCellValue('H3','Email');
//->setCellValue('I3','Award Class Name')
//->setCellValue('J3','Date Issued');
//align right
 $style = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );
$objPHPExcel->getActiveSheet()->getStyle("A1:H3")->applyFromArray($style);
//align center
$stylecenter = array(
        'alignment' => array(
            'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        )
    );
$objPHPExcel->getActiveSheet()->getStyle("A2:H3")->applyFromArray($style);
//bold
$objPHPExcel->getActiveSheet()->getStyle('A3:H3')->getFont()->setBold(true);
$sent="SELECT * FROM user";

    $sql=mysqli_query($conn,$sent);
        $Sno=1;
    $row=4;
    while($rows=mysqli_fetch_array($sql)){
$k=$rows['id'];
$FirstName=$rows['Fname'];
$SecondName=$rows['Sname'];
$LastName=$rows['Lname'];
$Phone=$rows['Phone'];
$Address=$rows['Address'];
$Gender=$rows['Gender'];
$Email=$rows['Email'];
   
             //Data
            $coll="Arusha Technical College";
           $pz=ucwords(ucfirst(strtolower($pz)));
           $coz_nm=ucwords(ucfirst(strtolower($coz_nm)));
             //$dis=$ca.'-'.$final.'-'.$total.'-'.$level1;
           $objPHPExcel->getActiveSheet()->SetCellValue('A'.$row, $Sno);
          $objPHPExcel->getActiveSheet()->SetCellValue('B'.$row, $FirstName);
          $objPHPExcel->getActiveSheet()->SetCellValue('C'.$row, $SecondName);
             $objPHPExcel->getActiveSheet()->SetCellValue('D'.$row, $LastName);
           $objPHPExcel->getActiveSheet()->SetCellValue('E'.$row, $Phone);
          $objPHPExcel->getActiveSheet()->SetCellValue('F'.$row, $Address);
           $objPHPExcel->getActiveSheet()->SetCellValue('G'.$row, $Gender);
            $objPHPExcel->getActiveSheet()->SetCellValue('H'.$row, $Email);
//             $objPHPExcel->getActiveSheet()->SetCellValue('I'.$row, $class );
//             $objPHPExcel->getActiveSheet()->SetCellValue('J'.$row, '');
           $row++;
           $Sno++;
           }

    //set auto width in cells
    foreach(range('A','H') as $columnID) {
    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
        ->setAutoSize(true);
}
foreach(range('A3','H3') as $columnID) {
    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
        ->setAutoSize(true);
}
//applyborders
$applyborders = array(
  'borders' => array(
    'allborders' => array(
      'style' => PHPExcel_Style_Border::BORDER_THIN
    )
  )
);
$objPHPExcel->getActiveSheet()->getStyle('A3:H3')->applyFromArray($applyborders);
//$objPHPExcel->getActiveSheet()->getStyle('A7:J7')->applyFromArray($applyborders);
//$objPHPExcel->getActiveSheet()->getStyle('A8:J8')->applyFromArray($applyborders);//
//unset($styleArray);
$objPHPExcel->getActiveSheet()->getStyle(
    'A4:' . 
    $objPHPExcel->getActiveSheet()->getHighestColumn() . 
    $objPHPExcel->getActiveSheet()->getHighestRow()
)->applyFromArray($applyborders);

//merge cells
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:H1');
$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A2:H2');




// Rename worksheet
echo date('H:i:s') , " Rename worksheet" , EOL;
$objPHPExcel->getActiveSheet()->setTitle('Certificates');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

ob_end_clean();
// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename='.$filename);
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>
