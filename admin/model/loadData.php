<?php
class loadData {
    public function getSemester($id){
        $semester = "";
        $con = new data();
        $sql = "SELECT semester FROM courses WHERE course_id = '$id'";
        $statement = $con->query($sql);
        if($statement){
            if($rs = $statement->fetch()){
                $semester = $rs['semester'];
            }
        }
        return $semester;
    }

    public function getSchool($id){
        $con = new data();
        $school = "";
        $sql = "SELECT school FROM courses WHERE course_id = '$id'";
        $statement = $con->query($sql);
        if($statement){
            if($rs = $statement->fetch()){
                $school = $rs['school'];
            }
        }
        return $school;
    }

    public function getModuleCode($id){
        $con = new data();
        $module_code = "";
        $sql = "SELECT module_code FROM courses WHERE course_id = '$id'";
        $statement = $con->query($sql);
        if($statement){
            if($rs = $statement->fetch()){
                $module_code = $rs['module_code'];
            }
        }
        return $module_code;
    }

    public function getProgramme($id){
        $con = new data();
        $programme = "";
        $sql = "SELECT programme FROM courses WHERE course_id = '$id'";
        $statement = $con->query($sql);
        if($statement){
            if($rs = $statement->fetch()){
                $programme = $rs['programme'];
            }
        }
        return $programme;
    }

    public function getCourseTitle($id){
        $con = new data();
        $course_title = "";
        $sql = "SELECT course_title FROM courses WHERE course_id = '$id'";
        $statement = $con->query($sql);
        if($statement){
            if($rs = $statement->fetch()){
                $course_title = $rs['course_title'];
            }
        }
        return $course_title;
    }

//FUNCTIONS TO GET USER INFORMATION FROM THE DATABASE
    public function getIC($id, $tablename){
        if($tablename == "users"){
            $queryString = "matric_no";
        }
        else if($tablename == "staff"){
            $queryString = "staff_id";
        }
        $con = new data();
        $sql = "SELECT ic FROM " .$tablename. " WHERE " .$queryString. "= '$id'";
        $statement = $con->query($sql);
        if($statement){
            if($rs = $statement->fetch()){
                $ic = $rs['ic'];
            }
        }
        return $ic;
    }

    public function getFirstname($id, $tablename){
        if($tablename == "users"){
            $queryString = "matric_no";
        }
        else if($tablename == "staff"){
            $queryString = "staff_id";
        }
        $con = new data();
        $sql = "SELECT firstname FROM " .$tablename. " WHERE " .$queryString. "= '$id'";
        $statement = $con->query($sql);
        if($statement){
            if($rs = $statement->fetch()){
                $firstname = $rs['firstname'];
            }
        }
        return $firstname;
    }

    public function getLastname($id, $tablename){
        if($tablename == "users"){
            $queryString = "matric_no";
        }
        else if($tablename == "staff"){
            $queryString = "staff_id";
        }
        $con = new data();
        $sql = "SELECT lastname FROM " .$tablename. " WHERE " .$queryString. "= '$id'";
        $statement = $con->query($sql);
        if($statement){
            if($rs = $statement->fetch()){
                $lastname = $rs['lastname'];
            }
        }
        return $lastname;
    }

    public function getEmail($id, $tablename){
        if($tablename == "users"){
            $queryString = "matric_no";
        }
        else if($tablename == "staff"){
            $queryString = "staff_id";
        }
        $con = new data();
        $sql = "SELECT email FROM " .$tablename. " WHERE " .$queryString. "= '$id'";
        $statement = $con->query($sql);
        if($statement){
            if($rs = $statement->fetch()){
                $email = $rs['email'];
            }
        }
        return $email;
    }

    public function getPassword($id, $tablename){
        if($tablename == "users"){
            $queryString = "matric_no";
        }
        else if($tablename == "staff"){
            $queryString = "staff_id";
        }
        $con = new data();
        $sql = "SELECT password FROM " .$tablename. " WHERE " .$queryString. "= '$id'";
        $statement = $con->query($sql);
        if($statement){
            if($rs = $statement->fetch()){
                $password = $rs['password'];
            }
        }
        return $password;
    }

    public function getPhone($id, $tablename){
        if($tablename == "users"){
            $queryString = "matric_no";
        }
        else if($tablename == "staff"){
            $queryString = "staff_id";
        }
        $con = new data();
        $sql = "SELECT phone FROM " .$tablename. " WHERE " .$queryString. "= '$id'";
        $statement = $con->query($sql);
        if($statement){
            if($rs = $statement->fetch()){
                $phone = $rs['phone'];
            }
        }
        return $phone;
    }

    public function getAddress($id, $tablename){
        if($tablename == "users"){
            $queryString = "matric_no";
        }
        else if($tablename == "staff"){
            $queryString = "staff_id";
        }
        $con = new data();
        $sql = "SELECT address FROM " .$tablename. " WHERE " .$queryString. "= '$id'";
        $statement = $con->query($sql);
        if($statement){
            if($rs = $statement->fetch()){
                $address = $rs['address'];
            }
        }
        return $address;
    }

    public function getGender($id, $tablename){
        if($tablename == "users"){
            $queryString = "matric_no";
        }
        else if($tablename == "staff"){
            $queryString = "staff_id";
        }
        $con = new data();
        $sql = "SELECT gender FROM " .$tablename. " WHERE " .$queryString. "= '$id'";
        $statement = $con->query($sql);
        if($statement){
            if($rs = $statement->fetch()){
                $gender = $rs['gender'];
            }
        }
        return $gender;
    }

    public function getNationality($id, $tablename){
        if($tablename == "users"){
            $queryString = "matric_no";
        }
        else if($tablename == "staff"){
            $queryString = "staff_id";
        }
        $con = new data();
        $sql = "SELECT nationality FROM " .$tablename. " WHERE " .$queryString. "= '$id'";
        $statement = $con->query($sql);
        if($statement){
            if($rs = $statement->fetch()){
                $nationality = $rs['nationality'];
            }
        }
        return $nationality;
    }

    public function getDepartment($id, $tablename){
        if($tablename == "users"){
            $queryString = "matric_no";
        }
        else if($tablename == "staff"){
            $queryString = "staff_id";
        }
        $con = new data();
        $sql = "SELECT department FROM " .$tablename. " WHERE " .$queryString. "= '$id'";
        $statement = $con->query($sql);
        if($statement){
            if($rs = $statement->fetch()){
                $department = $rs['department'];
            }
        }
        return $department;
    }

    public function getCourse($id, $tablename){
        if($tablename == "users"){
            $queryString = "matric_no";
        }
        else if($tablename == "staff"){
            $queryString = "staff_id";
        }
        $con = new data();
        $sql = "SELECT course FROM " .$tablename. " WHERE " .$queryString. "= '$id'";
        $statement = $con->query($sql);
        if($statement){
            if($rs = $statement->fetch()){
                $course = $rs['course'];
            }
        }
        return $course;
    }

    public function getProfile($id, $tablename){
        if($tablename == "users"){
            $queryString = "matric_no";
        }
        else if($tablename == "staff"){
            $queryString = "staff_id";
        }
        $con = new data();
        $sql = "SELECT profile FROM " .$tablename. " WHERE " .$queryString. "= '$id'";
        $statement = $con->query($sql);
        if($statement){
            if($rs = $statement->fetch()){
                $profile = $rs['profile'];
            }
        }
        return $profile;
    }

    public function getStatus($id, $tablename){
        if($tablename == "users"){
            $queryString = "matric_no";
        }
        else if($tablename == "staff"){
            $queryString = "staff_id";
        }
        $con = new data();
        $sql = "SELECT status FROM " .$tablename. " WHERE " .$queryString. "= '$id'";
        $statement = $con->query($sql);
        if($statement){
            if($rs = $statement->fetch()){
                $status = $rs['status'];
            }
        }
        return $status;
    }

    public function getDateRegistered($id, $tablename){
        if($tablename == "users"){
            $queryString = "matric_no";
            $searchValue = "enroll_date";
        }
        else if($tablename == "staff"){
            $queryString = "staff_id";
            $searchValue = "employ_date";
        }
        $con = new data();
        $sql = "SELECT " .$searchValue. " FROM " .$tablename. "
        WHERE " .$queryString. "= '$id'";
        $statement = $con->query($sql);
        if($statement){
            if($rs = $statement->fetch()){
                $theDate = $rs[$searchValue];
            }
        }
        $theDate = strftime("%B %d, %Y %I:%M %p", strtotime($theDate));
        return $theDate;
    }

    public function getRegistrationIP($id, $tablename){
        if($tablename == "users"){
            $queryString = "matric_no";
        }
        else if($tablename == "staff"){
            $queryString = "staff_id";
        }
        $searchValue = "registered_from";
        $con = new data();
        $sql = "SELECT " .$searchValue. " FROM " .$tablename. "
        WHERE " .$queryString. "= '$id'";
        $statement = $con->query($sql);
        if($statement){
            if($rs = $statement->fetch()){
                $registered_from_ip = $rs[$searchValue];
            }
        }
        return $registered_from_ip;
    }

    public function getLastLoginDate($id, $tablename){
        if($tablename == "users"){
            $queryString = "matric_no";
        }
        else if($tablename == "staff"){
            $queryString = "staff_id";
        }
        $searchValue = "last_login";
        $con = new data();
        $sql = "SELECT " .$searchValue. " FROM " .$tablename. "
        WHERE " .$queryString. "= '$id'";
        $statement = $con->query($sql);
        if($statement){
            if($rs = $statement->fetch()){
                $last_login_date = $rs[$searchValue];
            }
        }
        $last_login_date = strftime("%B %d, %Y %I:%M %p", strtotime($last_login_date));
        return $last_login_date;
    }
    public function getLastLoginIP($id, $tablename){
        if($tablename == "users"){
            $queryString = "matric_no";
        }
        else if($tablename == "staff"){
            $queryString = "staff_id";
        }
        $searchValue = "last_login_ip";
        $con = new data();
        $sql = "SELECT " .$searchValue. " FROM " .$tablename. "
        WHERE " .$queryString. "= '$id'";
        $statement = $con->query($sql);
        if($statement){
            if($rs = $statement->fetch()){
                $last_login_IP = $rs[$searchValue];
            }
        }
        return $last_login_IP;
    }



    //FUNCTION TO DELETE ANY RECORD FROM THE DATABASE
    public function deleteCourse($id, $tablename){
        if($tablename == "users"){
            $queryString = "matric_no";
        }
        else if($tablename == "courses"){
            $queryString = "course_id";
        }
        else if($tablename == "staff"){
            $queryString = "staff_id";
        }
        else if($tablename == "subscribe"){
            $queryString = "subscriber_id";
        }

        $con = new data();
        $sql = "DELETE FROM " .$tablename. " WHERE ".$queryString ." =:id";
        $statement = $con->prepare($sql);
        if($statement){
            $statement->execute(array(':id' => $id));
            if($statement->rowCount() == 1){
                echo "<br><p style='color: green;'>".$statement->rowCount()." Record Deleted Successfully</p>";
            }else{
                $error = $statement->errorInfo();
                echo "<br><p style='color: red;'>Query failed with message: " . $error[2]."</p>";
            }
        }
    }

//FUNCTIONS THAT ARE SPECIFIC TO STAFF TABLE
    public function getQualification($id){
        $con = new data();
        $sql = "SELECT qualification FROM staff WHERE staff_id = '$id'";
        $statement = $con->query($sql);
        if($statement){
            if($rs = $statement->fetch()){
                $qualification = $rs['qualification'];
            }
        }
        return $qualification;
    }

    public function getDesignation($id){
        $con = new data();
        $sql = "SELECT designation FROM staff WHERE staff_id = '$id'";
        $statement = $con->query($sql);
        if($statement){
            if($rs = $statement->fetch()){
                $designation = $rs['designation'];
            }
        }
        return $designation;
    }

//FUNCTIONS THAT ARE SPECIFIC TO STUDENT TABLE
    public function getDob($id){
        $con = new data();
        $sql = "SELECT dob FROM users WHERE matric_no = '$id'";
        $statement = $con->query($sql);
        if($statement){
            if($rs = $statement->fetch()){
                $dob = $rs['dob'];
            }
        }
        return $dob;
    }

    public function getIntake($id){
        $con = new data();
        $sql = "SELECT intake FROM users WHERE matric_no = '$id'";
        $statement = $con->query($sql);
        if($statement){
            if($rs = $statement->fetch()){
                $intake = $rs['intake'];
            }
        }
        return $intake;
    }

    public function getLastSchoolYear($id){
        $con = new data();
        $sql = "SELECT last_school_year FROM users WHERE matric_no = '$id'";
        $statement = $con->query($sql);
        if($statement){
            if($rs = $statement->fetch()){
                $last_school_year = $rs['last_school_year'];
            }
        }
        return $last_school_year;
    }

    public function getNextKinName($id){
        $con = new data();
        $sql = "SELECT next_kin_name FROM users WHERE matric_no = '$id'";
        $statement = $con->query($sql);
        if($statement){
            if($rs = $statement->fetch()){
                $next_kin_name = $rs['next_kin_name'];
            }
        }
        return $next_kin_name;
    }

    public function getNextKinPhone($id){
        $con = new data();
        $sql = "SELECT next_kin_phone FROM users WHERE matric_no = '$id'";
        $statement = $con->query($sql);
        if($statement){
            if($rs = $statement->fetch()){
                $next_kin_phone = $rs['next_kin_phone'];
            }
        }
        return $next_kin_phone;
    }

    public function getNextKinOccupation($id){
        $con = new data();
        $sql = "SELECT next_kin_occupation FROM users WHERE matric_no = '$id'";
        $statement = $con->query($sql);
        if($statement){
            if($rs = $statement->fetch()){
                $next_kin_occupation = $rs['next_kin_occupation'];
            }
        }
        return $next_kin_occupation;
    }

    function getComment(){
        $commentOutput = "";
        $con = new data();
        $agoObj = new convertToAgo();

        $load = "SELECT * FROM forum ORDER BY post_id DESC";
        $stat = $con->prepare($load);
        $stat->execute();

        $rows = $stat->rowCount();
        $page_rows = 4;
        // This tells us the page number of our last page
        $last = ceil($rows/$page_rows);
        // This makes sure $last cannot be less than 1
        if($last < 1){
            $last = 1;
        }
        $pagenum = 1;
        if(isset($_GET['pn'])){
            $pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
        }
        // This makes sure the page number isn't below 1, or more than our $last page
        if ($pagenum < 1){
            $pagenum = 1;
        }
        else if ($pagenum > $last){
            $pagenum = $last;
        }

        $limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;

        $sql2 = "SELECT * FROM forum ORDER BY post_id DESC $limit";
        $statement = $con->prepare($sql2);
        $statement->execute();

        $textline2 = "Page <b>$pagenum</b> of <b>$last</b>";;

        $paginationCtrls = '';
        if($last != 1){
            if ($pagenum > 1) {
                $previous = $pagenum - 1;
                $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">Previous</a> &nbsp; &nbsp; ';
                for($i = $pagenum-4; $i < $pagenum; $i++){ if($i > 0){ $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; '; } } }
            $paginationCtrls .= ''.$pagenum.' &nbsp; ';

            for($i = $pagenum+1; $i <= $last; $i++){
                $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
                if($i >= $pagenum+4){
                    break;
                }
            }
        }
        if ($pagenum != $last) {
            $next = $pagenum + 1;
            $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Next</a> ';
        }
        if($statement->rowCount() > 0){
            $commentOutput = '<div style="width:97%; margin:0 auto;">'. $textline2.'</div>';
            while($row = $statement->fetch()){
                $username = $row['post_username'];
                $postID = $row['post_id'];
                $postUserid = $row['post_userid'];
                $postTime = $row['post_time'];
                $post = $row['the_post'];
                $convertedTime = $agoObj->convert_datetime($postTime);
                $whenPost = $agoObj->makeAgo($convertedTime);

                if($postUserid == $_SESSION['adminID']){
                    $replyP = 'Follow Thread';
                }else{
                    $replyP = 'Reply Post';
                }

                $sql = "SELECT avatar FROM users WHERE matric_no=:matric_no LIMIT 1";
                $statements = $con->prepare($sql);
                $statements->execute(array('matric_no'=> $postUserid));
                if($row = $statements->fetch());{
                    $avatar = $row['avatar'];
                }
                $check_pic = "../students/$postUserid/$avatar";
                $default_pic = "../students/default-no-profile-pic.jpg";

                if($avatar != ""){
                    if(file_exists($check_pic)){
                        $profile_pic = "<img src=".$check_pic." width='50' height='50' />";
                    }
                }else{
                    $profile_pic = "<img src=".$default_pic." width='50' height='50' />";
                }

                $commentOutput .= '<table border="0" id="postTextarea" cellpadding="6" style="width:97%; margin:0 auto;">
                <tr>
                <td width="10%" valign="top">'.$profile_pic.'</td>
                <td width="90%" valign="top" style="line-height:1.5em;">
                <span class="liteGreyColor textsize9"><a href="#?idP='. $postUserid.'&postID='.$postID.'"><strong>'.$username.'</strong></a> '.$whenPost.'</span><br />
                '.$post.'<br />
                <a class="orangeColor textsize9" style="float:right;" href="reply?idP='. $postUserid.'&postID='.$postID.'"><strong>'.$replyP.'</strong></a>
                </td>
                </tr>
                </table>';
            }
            $commentOutput .='<br/><div id="pagination_controls" style="width:97%; margin:0 auto;">'. $paginationCtrls.'</div>';
        }
        return $commentOutput;
    }

} 