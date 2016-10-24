<?php
    require_once('../connection/data.php');
	$con = new data();
//PARSE UPLOAD COURSE MATERIALS
if(isset($_FILES['txtCourseNote']) && isset($_REQUEST['txtModules'])){
    $style = 'style="display: block;"';
    $programme = $_REQUEST['txtCourse'];
    $semester = $_REQUEST['txtSemester'];
    $courseTitle = $_REQUEST['txtModules'];
    $topic = $_REQUEST['txtModuleTopic'];
    $week = $_REQUEST['txtWeek'];
    $tmpMp4 = $_FILES['txtCourseVideo']['tmp_name'];
    $tmpOgv = $_FILES['txtCourseVideoOgv']['tmp_name'];
    $tmpNote = $_FILES['txtCourseNote']['tmp_name'];
    $tmpCover = $_FILES['txtCourseVideoCover']['tmp_name'];

    if($semester == "" || $courseTitle == "" || $week == "" || $topic == ""
        || $tmpNote == ""){
        $result = "All fields marked with * are required";
    }
    else if(!preg_match('/^([ aA-zZ]*)$/', $topic)){
        $result = "Topic cannot contain numebr or special charaters";
    }
    else if(!$helper->isDoc($_FILES['txtCourseNote']['name'])){
        $result = "Course note is not in the accepted format, Valid format is .pdf";
    }
    else if($tmpMp4 !== "" && !$helper->isMp4($_FILES['txtCourseVideo']['name'])){
        $result = "Not a valid .Mp4 Video format please try again";
    }
    else if($tmpOgv !== "" && !$helper->isOgv($_FILES['txtCourseVideoOgv']['name'])){
        $result = "Not a valid .Ogv Video format please try again";
    }
    else if($tmpCover !== "" && !$helper->isImage($_FILES['txtCourseVideoCover']['name'])){
        $result = "Invalid file format, Valid video cover format are .jpg,.png,.gif,.bmp";
    }
    else if($helper->uploadCourseContent($programme,$semester,$courseTitle,$week,$topic)){
        $result = "You are trying to upload material that is already existing in our system";
    }
    else{
        $path = "../materials/".$programme."/".$semester."/".$courseTitle."/".$week;
        if(!file_exists($path)){
            mkdir($path,0777,true);
        }
        $mp4 = $topic.".mp4";
        $ogv = $topic.".ogv";
        $note = $topic.".".$helper->getExtension($_FILES['txtCourseNote']['name']);
        $cover = $topic.".jpg";
        move_uploaded_file($tmpOgv, $path."/".$ogv);
        move_uploaded_file($tmpCover, $path."/".$cover);
        move_uploaded_file($tmpMp4, $path."/".$mp4);
        if(move_uploaded_file($tmpNote, $path."/".$note)){
            $con = new data();
            $sql = "INSERT INTO coursematerial (programme, modulename, semester, week, topic)
            VALUES (:programme, :modulename, :semester, :week, :topic)";
            $statement = $con->prepare($sql);
            $statement->execute(array(':programme'=> $programme, ':modulename'=> $courseTitle,
                ':semester'=>$semester,':week'=>$week, ':topic'=>$topic));
            if($statement->rowCount() == 1){
                $result = '<strong style="color: green; font-size: 17px;">Module material uploaded successfully</strong>';
            }else{
                $error = $statement->errorInfo();
                $result = "Query failed with message: " . $error[2];
            }
        }else{
            $result = "Failed to complete operation please try again";
        }
    }
}
