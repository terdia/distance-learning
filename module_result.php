<?php ob_start();session_start();
if(isset($_SESSION['profile']) && $_SESSION['profile'] === "Student"){
    $theID = $_SESSION['userMatricNo'];
    $tablename = "users";
    include_once("model/fpdf.php");
    include_once("connection/data.php");
    $pdf = new FPDF();
    $con = new data();
    $data = "";

    $sqlInfo = "SELECT * FROM users WHERE matric_no =:matric_no";
    $statement = $con->prepare($sqlInfo);
    $statement->execute(array('matric_no'=>$theID));

    $sqlAnswer = "SELECT * FROM answer WHERE studentID =:matric_no";
    $statAnswer = $con->prepare($sqlAnswer);
    $statAnswer->execute(array('matric_no'=>$theID));

    if($statement->rowCount() == 1){
        while($rs = $statement->fetch()){
            $firstname = $rs['firstname'];
            $ic = $rs['ic'];
            $lastname = $rs['lastname'];
            $course = $rs['course'];
            $intake = $rs['intake'];

            $data =  $pdf->AddPage();
            $data .= $pdf->SetFont("Arial","B","18");
            $data .= $pdf->Cell(0, 20, "FTMS College Online Programmes", 1, 1, "C");
            $data .= $pdf->SetFont("Arial","B","18");
            $data .= $pdf->Cell(0, 10, "Module Result For u".$theID, 1, 1, "C");
            $data .= $pdf->Cell(0, 4, "", 1, 1);
            $data .= $pdf->SetFont("Arial","B","15");
            $data .= $pdf->Cell(0, 8, "Personal Information", 1, 1);

            $data .= $pdf->SetFont("Arial","","12");
            $data .= $pdf->Cell(50, 6, "Fullname", 1);
            $data .= $pdf->Cell(70, 6, $firstname, 1);
            $data .= $pdf->Cell(70, 6, $lastname, 1, 1);

            $data .= $pdf->Cell(50, 6, "Passport No", 1);
            $data .= $pdf->Cell(45, 6, $ic, 1);
            $data .= $pdf->Cell(50, 6, "Student ID", 1);
            $data .= $pdf->Cell(45, 6, "u".$theID, 1, 1);

            $data .= $pdf->Cell(50, 6, "Programme", 1);
            $data .= $pdf->Cell(70, 6, $course, 1);
            $data .= $pdf->Cell(40, 6, "Intake Code", 1);
            $data .= $pdf->Cell(30, 6, $intake, 1, 1);
            $data .= $pdf->Cell(0, 4, "", 1, 1);
        }
    }

    if($statAnswer->rowCount() > 0){
        $data .= $pdf->SetFont("Arial","B","15");
        $data .= $pdf->Cell(97, 8, "Module Title", 1);
        $data .= $pdf->Cell(73, 8, "Grade:", 1);
        $data .= $pdf->Cell(20, 8, "Total", 1,1);

        while($row = $statAnswer->fetch()){
            $module = $row['modules'];
            $cw = $row['courseworkmark'];
            $ex = $row['exammark'];
            $total = ($cw + $ex) / 2;

            $data .= $pdf->SetFont("Arial","","12");
            $data .= $pdf->Cell(97, 6, $module, 1);
            $data .= $pdf->Cell(30, 6, "Coursework", 1);
            $data .= $pdf->Cell(13, 6, $cw, 1);
            $data .= $pdf->Cell(17, 6, "Exam", 1);
            $data .= $pdf->Cell(13, 6, $ex, 1);
            $data .= $pdf->Cell(20, 6, $total, 1, 1);
        }
        $data .= $pdf->Output();
    }else{
        $data .= $pdf->SetFont("Arial","B","18");
        $data .= $pdf->Cell(0, 8, "No Record Found", 1);
        $data .= $pdf->Output();
    }

    echo $data;
}
else{
    header("Location: login.php");
}

?>
