<?php
    require_once('../connection/data.php');
	$con = new data();

//PARSE UPLOAD COURSE MATERIALS
if(isset($_FILES['txtAssignment']) && isset($_REQUEST['txtModules'])){
    $style = 'style="display: block;"';
    $programme = $_REQUEST['txtCourse'];
    $semester = $_REQUEST['txtSemester'];
    $courseTitle = $_REQUEST['txtModules'];
    $topic = $_REQUEST['txtModuleTopic'];
    $assignment = $_FILES['txtAssignment']['tmp_name'];
    if($semester == "" || $courseTitle == "" || $topic == ""
        || $assignment == ""){
        $result = "All fields marked with * are required";
    }
    else if(!preg_match('/^([ aA-zZ]*)$/', $topic)){
        $result = "Assignment title cannot contain numebr or special charaters";
    }
    else if(!$helper->isZip($_FILES['txtAssignment']['name'])){
        $result = "Assignment is not in the accepted format, Valid format are .zip and .rar";
    }
    else{
        $path = "../assignments/".$programme."/".$semester."/".$courseTitle."/";
        if(!file_exists($path)){
            mkdir($path,0777,true);
            chmod($path, 0777);
        }
        $note = $topic.".".$helper->getExtension($_FILES['txtAssignment']['name']);
        if(move_uploaded_file($assignment, $path."/".$note)){
            $con = new data();
            $sql = "INSERT INTO assignments (programme, modulename, semester, topic)
            VALUES (:programme, :modulename, :semester, :topic)";

            $statement = $con->prepare($sql);
            $statement->execute(array(':programme'=> $programme, ':modulename'=> $courseTitle,
                ':semester'=>$semester, ':topic'=>$topic));
            if($statement->rowCount() == 1){
                $result = '<p style="color: green; font-size: 19px; font-weight: bold;">Assignment uploaded successfully</p>';
            }else{
                $error = $statement->errorInfo();
                $result = "Query failed with message: " . $error[2];
            }
        }else{
            $result = "Failed to complete operation please try again";
        }
    }
}