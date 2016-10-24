<?php
$result = "";
$results = "";
if (isset($_FILES["avatar"]["name"]) && $_FILES["avatar"]["tmp_name"] != ""){
    $fileName = $_FILES["avatar"]["name"];
    $matric = $_POST["matric_no"];
    $fileTmpLoc = $_FILES["avatar"]["tmp_name"];
    $fileType = $_FILES["avatar"]["type"];
    $fileSize = $_FILES["avatar"]["size"];
    $fileErrorMsg = $_FILES["avatar"]["error"];
    $kaboom = explode(".", $fileName);
    $fileExt = end($kaboom);
    list($width, $height) = getimagesize($fileTmpLoc);

    $score = $filter->GetScore($fileTmpLoc);

    if($width < 10 || $height < 10){
        $result = "That image has no dimension";
    }
    else if($fileSize > 1048576) {
        $result = "Your image file was larger than 1mb";
    } else if (!$helper->isImage($fileName)) {
        $result = "Your image file was not jpg, gif or png type";
    } else if ($fileErrorMsg == 1) {
        $result = "An unknown error occurred";
    }
    else if($score >= 40){
            $result = "Image scored ".$score."%, It seems that you are uploading a nude picture";
    }
    else{
        $con = new data();
        $db_file_name = rand(100000000000,999999999999).".".$fileExt;
        $sql = "SELECT avatar FROM users WHERE matric_no=:matric_no LIMIT 1";
        $statement = $con->prepare($sql);
        $statement->execute(array('matric_no'=> $matric));
        if($row = $statement->fetch());{
        $avatar = $row['avatar'];
        }
        if($avatar != ""){
            $picurl = "students/$matric/$avatar";
            if (file_exists($picurl)) { unlink($picurl); }
        }
        $moveResult = move_uploaded_file($fileTmpLoc, "students/$matric/$db_file_name");
        if ($moveResult != true) {
            $result = "File upload failed";
        }
        $target_file = "students/$matric/$db_file_name";
        $resized_file = "students/$matric/$db_file_name";
        $wmax = 200;
        $hmax = 200;
        $helper->img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt);
        $sql = "UPDATE users SET avatar='$db_file_name' WHERE matric_no=:matric_no LIMIT 1";
        $statement = $con->prepare($sql);
        $statement->execute(array(':matric_no'=> $matric));
        $helper->redirect_to("profile?u=$db_file_name");
    }
}else if(isset($_FILES['txtAssignment']) && isset($_REQUEST['txtModules'])){
    $style = 'style="display: block;"';
    $programme = $_REQUEST['txtCourse'];
    $semester = $_REQUEST['txtSemester'];
    $courseTitle = $_REQUEST['txtModules'];
    $submitID = $_REQUEST['submitID'];
    $assignment = $_FILES['txtAssignment']['tmp_name'];
    if($semester == "" || $courseTitle == ""
        || $assignment == ""){
        $results = "All fields marked with * are required";
    }
    else if(!$helper->isZip($_FILES['txtAssignment']['name'])){
        $results = "Assignment is not in the accepted format, Valid format are .zip and .rar";
    }
    else{
        $path = "submission/".$programme."/".$semester."/".$courseTitle."/";
        if(!file_exists($path)){
            mkdir($path,0777,true);
            chmod($path, 0777);
        }
        $note = $submitID.".".$helper->getExtension($_FILES['txtAssignment']['name']);
        if(move_uploaded_file($assignment, $path."/".$note)){
            $con = new data();
            $sql = "INSERT INTO submission (programme, modulename, semester, submitID,submit_date)
            VALUES (:programme, :modulename, :semester, :submitID, now())";

            $statement = $con->prepare($sql);
            $statement->execute(array(':programme'=> $programme, ':modulename'=> $courseTitle,
                ':semester'=>$semester, ':submitID'=>$submitID));
            if($statement->rowCount() == 1){
                $results = '<p style="color: green; font-size: 19px; font-weight: bold;">Assignment Submitted successfully</p>';
            }else{
                $error = $statement->errorInfo();
                $results = "Query failed with message: " . $error[2];
            }
        }else{
            $results = "Failed to complete operation please try again";
        }
    }
}