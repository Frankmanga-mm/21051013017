<?php
    $conn = mysqli_connect("localhost", "root", "", "21051013017");

    require('fpdf/fpdf.php');

    class tz extends FPDF{
        function header(){
            // $this->Image('../picha/tochi.png',10,6,20);
            $this->SetDrawColor(0,80,180);
            $this->SetFillColor(230,230,0);
            $this->SetTextColor(220,50,50);
            $this->Setfont('Arial', 'B', 25);
            $this->Cell(210,10, 'PAST PAPER-USERS', 0, 1,'C');
            $this->Ln(10);
        }
        function footer(){
            $this->SetY(-12);
            $this->Setfont('Arial', 'I', 10);
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
            $this->Ln(10);
        }
        function ChapterTitle(){
        // Arial 12
        $this->SetFont('Arial','B',16);
        $this->SetDrawColor(0,80,180);
        $this->SetFillColor(200,220,255);
        // Title
        $this->Cell(100,10,  0,1, 'C');
        $this->SetFont('Arial','B',14);
        $this->Cell(100,10, 0,1, 'C');
        // Line break
        $this->Ln(4);
        }

        function printData(){
            //set font properties
            // $this->SetFont('Arial','','10');
            //set font color
            $conn = mysqli_connect("localhost","root","","21051013017");
    
            //print the text
            $this->SetFont('Arial','','12');
          //  $this->Cell(45);
            // $this->Cell(10,7,'Sno','1','0','C');
            // $this->Cell(25,7,'FirstName','1','0','C');
            // $this->Cell(25,7,'SecondName','1','0','C');
            // $this->Cell(25,7,'LastName','1','0','C');
            // $this->Cell(25,7,'Phone','1','0','C');
            // $this->Cell(23,7,'Address','1','0','C');
            // $this->Cell(18,7,'Gender','1','0','C');
            $this->Cell(45,7,'fileName','1','0','C');
           // $this->Cell(90,7,'picha','1','0','C');
            $this->ln();
            $this->SetFont('Arial','','10');
            $result = mysqli_query($conn,"SELECT * FROM `documents`");
            if(mysqli_num_rows($result)>0){
                $num = 0;
                while($row = mysqli_fetch_assoc($result)){
                    $num ++;

                    // $this->Cell(10,7,$num,'1','0','l');
                    // $this->Cell(25,7,$row['Fname'],'1','0','l');
                    // $this->Cell(25,7,$row['Sname'],'1','0','l');
                    // $this->Cell(25,7,$row['Lname'],'1','0','l');
                    // $this->Cell(25,7,$row['Phone'],'1','0','l');
                    // $this->Cell(23,7,$row['Address'],'1','0','l');
                    // $this->Cell(18,7,$row['Gender'],'1','0','l');
                    $this->Cell(45,7,$row['document'],'1','0','l');
                   // $this->Cell(90,7,$row['picha'],'1','0','l');
                    $this->Ln();
                    
                }
            }else{
                $this->Cell(60);
                $this->Cell(80,5,"No data found");
            }
        }
        
    }




    $tz = new tz();
    $tz -> Addpage();
    $tz-> AliasNbPages();
    $tz->SetAuthor('Manga');
    $tz ->SetCreator("Manga");
    $tz ->SetTitle('PAST PAPER-USERS');
    $tz -> printData();
    
    $tz -> Output("I", "past.pdf");
?>