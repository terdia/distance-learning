<?php
class studentHelper{
         function redirect_to($location = NULL){
            if($location != NULL){
			header("location: {$location}");
			exit();
			}
	 	 }
		 
		 function getMonth(){
			 $maxVal = "12";
			 for($i = 1; $i <= $maxVal; $i++){
				 $monthName = date("F", mktime(0, 0, 0, $i, 10)); 
				 echo "<option value=".$monthName.">".$monthName."</option>";
			 }
		 }
		 
		 function getDay(){
			 $maxVal = "31";
			 for($day = 1; $day <= $maxVal; $day++){
				 echo "<option value=".$day.">".$day."</option>";
			 }
		 }
		 
		 function getYear(){			 
			 for($year = 1995; $year >= 1978; $year--){ 
			 echo '<option value="'.$year.'">'.$year.'</option>';
			 }
		 }

    function getExtension($filename){
        $parts = explode('.',$filename);
        return end($parts);
    }

    function isImage($filename) {
        $parts = explode('.',$filename);
        $ext = end($parts);
        switch (strtolower($ext)) {
            case 'jpg':
            case 'gif':
            case 'bmp':
            case 'png':
                return true;
        }
        return false;
    }

    function isDoc($filename) {
        $parts = explode('.',$filename);
        $ext = end($parts);
        switch (strtolower($ext)) {
            case 'docx':
            case 'doc':
            case 'pdf':
                return true;
        }
        return false;
    }

    function isZip($filename) {
        $parts = explode('.',$filename);
        $ext = end($parts);
        switch (strtolower($ext)) {
            case 'rar':
            case 'zip':
                return true;
        }
        return false;
    }

    function isMp4($filename) {
        $parts = explode('.',$filename);
        $ext = end($parts);
        switch (strtolower($ext)) {
            case 'mp4':
                return true;
        }
        return false;
    }

    function isOgv($filename) {
        $parts = explode('.',$filename);
        $ext = end($parts);
        switch (strtolower($ext)) {
            case 'ogv':
                return true;
        }
        return false;
    }
        function loadModules($programmeName, $semester){
            $con = new data();
            $output = "";
            $sql = "SELECT course_title FROM courses
                    WHERE programme='$programmeName'
                    AND semester='$semester'";

            $statement = $con->query($sql);
            if($statement){
                while($rs = $statement->fetch()){
                    $output .= '<option value="'.$rs['course_title'].'">'
                        .$rs['course_title'].'</option>';
                }
            }
            return $output;
        }

    function getExamlist($studentCourse){
        $con = new data();
        $output = "";
        $sql = "SELECT * FROM exam WHERE programme = '$studentCourse'";

        $statement = $con->query($sql);
        if($statement){
            while($rs = $statement->fetch()){
                $output .= '<option value="'.$rs['modules'].'">'
                    .$rs['modules'].'</option>';
            }
        }
        return $output;
    }

		 function getDepartment(){
			 $con = new data();
			 $output = "";	
		 	 $sql = "SELECT DISTINCT school FROM courses";
			 $statement = $con->query($sql);
			 if($statement){
				while($rs = $statement->fetch()){
					$output .= '<option value="'.$rs['school'].'">'
					.$rs['school'].'</option>';
				}
			 }
			 return $output;
		 }
		 
		 function getProgramme(){			 
			 $con = new data();
			 $output = "";	
		 	 $sql = "SELECT DISTINCT programme FROM courses";
			 $statement = $con->query($sql);
			 if($statement){
				while($rs = $statement->fetch()){
					$output .= '<option value="'.$rs['programme'].'">'
					.$rs['programme'].'</option>';
				}
			 }
			 return $output;
		 }
		 
		 function checkDuplicateIC($ic, $tablename){
			 $con = new data();
			 $sql = "SELECT ic FROM ".$tablename." WHERE ic = :ic";
			 $statement = $con->prepare($sql);
			 if($statement){			
				$statement->execute(array('ic' => $ic)); 
				 if($rs = $statement->fetch()){
					 return true;
				 }else{
					 return false;
				 }
			 }
		 }
		 
		 function checkDuplicateIntakeCode($intake){
			 $con = new data();
			 $sql = "SELECT intake FROM users WHERE intake = :intake";
			 $statement = $con->prepare($sql);
			 if($statement){			
				$statement->execute(array('intake' => $intake)); 
				 if($rs = $statement->fetch()){
					 return true;
				 }else{
					 return false;
				 }
			 }
		 }
		 		 
		 function checkDuplicateEmail($email, $tablename){
			 $con = new data();
			 $sql = "SELECT email FROM ".$tablename." WHERE email = :email";
			 $statement = $con->prepare($sql);
			 if($statement){		
				$statement->execute(array('email' => $email)); 
				 if($rs = $statement->fetch()){
					 return true;
				 }else{
					 return false;
				 }
			 }
		 }
		 
		 function validateIC($ic){
			 $regex_passport = '/^([A-Za-z]{1}+[0-9]*)$/';
			 if(preg_match($regex_passport, $ic)) {
				 return true;
			 }else{
				 return false;
			 }
		 }

         function validateModuleCode($moduleCode){
            $regex_moduleCode = '/^([A-Za-z]{2}+[0-9]*)$/';
            if(preg_match($regex_moduleCode, $moduleCode)) {
                return true;
            }else{
                return false;
            }
         }

         function checkDuplicateCourseEntry($semesterCode, $programme, $courseTitle){
            $con = new data();
            $sql = "SELECT * FROM courses
                    WHERE semester = :semester AND
                    programme = :programme AND course_title = :coursetitle";
            $statement = $con->prepare($sql);
            if($statement){
                $statement->execute(array('semester'=>$semesterCode,
                'programme'=> $programme, 'coursetitle'=> $courseTitle));
                if($rs = $statement->fetch()){
                    return true;
                }else{
                    return false;
                }
            }
         }

    function checkModuleCode($moduleCode){
        $con = new data();
        $sql = "SELECT module_code FROM courses
                    WHERE module_code = :modulecode";
        $statement = $con->prepare($sql);
        if($statement){
            $statement->execute(array('modulecode' => $moduleCode));
            if($rs = $statement->fetch()){
                return true;
            }else{
                return false;
            }
        }
    }
    function uploadCourseContent($programme, $semester, $modulename, $week, $topic){
        $con = new data();
        $sql = "SELECT * FROM coursematerial
                    WHERE programme = :programme
                    AND modulename = :modulename AND
                    semester = :semester AND week = :week AND
                    topic = :topic";
        $statement = $con->prepare($sql);
        if($statement){
            $statement->execute(array('programme'=> $programme, 'modulename'=> $modulename,
                'semester'=>$semester,'week'=>$week, 'topic'=>$topic));
            if($rs = $statement->fetch()){
                return true;
            }else{
                return false;
            }
        }
    }

    function semesterRegistrationControl($matric, $programme, $semester, $modules, $ic){
        $con = new data();
        $sql = "SELECT * FROM semester_registration
                    WHERE ic = :ic AND matric_no = :matric_no
                    AND programme = :programme AND semester = :semester
                    AND modules = :modules";
        $statement = $con->prepare($sql);
        if($statement){
            $statement->execute(array('ic' => $ic, 'matric_no'=> $matric,
                                'programme' => $programme, 'semester' => $semester,
                                'modules' => $modules));
            if($rs = $statement->fetch()){
                return true;
            }else{
                return false;
            }
        }
    }

    function semesterRegistrationControlForIC($matric, $academic_year, $ic){
        $con = new data();
        $sql = "SELECT * FROM semester_registration
                    WHERE ic = :ic AND matric_no = :matric_no
                    AND academic_year = :academic_year";
        $statement = $con->prepare($sql);
        if($statement){
            $statement->execute(array('ic' => $ic, 'matric_no'=> $matric,
                'academic_year' => $academic_year));
            if($rs = $statement->fetch()){
                return true;
            }else{
                return false;
            }
        }
    }
    function viewCourses($coursename){
        $con = new data();
        $sql = "SELECT * FROM courses WHERE programme=:coursename";
        $statement = $con->prepare($sql);
        $output = '<table width="100%" id="viewCourse" border="0" cellspacing="2" cellpadding="2">';
        if(count($statement)){
            $statement->execute(array(':coursename' => $coursename));
            while($rs = $statement->fetch()){
                $moduleCode = $rs['module_code'];
                $semester = $rs['semester'];
                $programme = $rs['programme'];
                $course_title = $rs['course_title'];
                $id = $rs['course_id'];

                $output .= '<tr><td width="10%">'.$moduleCode.'</td>
                <td width="17%">'.$semester.'</td>
                <td width="57%" >'.$course_title.'</td>
                <td width="8%">
                <a href="editcourse?courseID='.$id.'">
                <img src="images/edit-icon.png" width="100%" alt="Edit Course" title="Edit Course"
                height="50"></a></td><td width="8%">
                <a href="#?courseID='.$id.'" onclick="return false" onmousedown="deleteItem('.$id.',\'courses\')"><img src="images/bin.png"
                alt="Remove Course" title="Remove Course" width="100%"
                height="50"></a></td>
                </tr>';
            }
            $output .= '</table>';
        }
        else{
            $output .= "No Record Found for the course entered";
        }

        return $output;
    }

    function viewUser($tablename){
        $con = new data();
        $output = '<table width="100%" id="viewCourse" border="0" cellspacing="2" cellpadding="2">';
          if($tablename === "users"){
          $sql = "SELECT * FROM users";
            $statement = $con->query($sql);
            while($rs = $statement->fetch()){
                $matric = $rs['matric_no'];
                $ic = $rs['ic'];
                $course = $rs['course'];
                $firstname = $rs['firstname'];
                $lastname = $rs['lastname'];

                $output .= '<tr><td width="10%" title="Passport Number">'.$ic.'</td>
                <td width="38%" title="Student Fullname">'.$firstname. " ".$lastname.'</td>
                <td width="30%" title="Program of study">'.$course.'</td>
                <td width="11%">
                <a href="view_student?userID='.$matric.'">
                <img src="images/search-b-icon.png" width="100%" alt="View Record" title="View Record"
                height="50"></a></td>
                <td width="11%">
                <a href="edit_student?userID='.$matric.'">
                <img src="images/edit-icon.png" width="100%" alt="Edit User Account" title="Edit Students Information"
                height="50"></a></td>
                </tr>';
            }
              $output .= '</table>';
          }
          else if($tablename === "staff"){
              $sql = "SELECT * FROM staff WHERE profile = 'Lecturer'";
              $statement = $con->query($sql);
              while($rs = $statement->fetch()){
                  $staff_id = $rs['staff_id'];
                  $ic = $rs['ic'];
                  $qualification = $rs['qualification'];
                  $firstname = $rs['firstname'];
                  $lastname = $rs['lastname'];

                $output .= '<tr><td width="10%" title="Passport Number">'.$ic.'</td>
                <td width="38%" title="Lecturers Fullname">'.$firstname. " ".$lastname.'</td>
                <td width="25%" title="Lecturers Qualification">'.$qualification.'</td>
                <td width="11%">
                <a href="view_lecturer?userID='.$staff_id.'">
                <img src="images/search-b-icon.png" width="100%" alt="View Record" title="View Record"
                height="50"></a></td>
                <td width="11%">
                <a href="edit_lecturer?userID='.$staff_id.'">
                <img src="images/edit-icon.png" width="100%" alt="Edit User Account" title="Edit Lecturer Information"
                height="50"></a></td>
                </tr>';
              }
              $output .= '</table>';
          }
        return $output;
    }

    function searchUser($searchterm){
        $con = new data();
        $output = '<table width="100%" id="viewCourse" border="0" cellspacing="2" cellpadding="2">';

        $sql = "SELECT * FROM users WHERE matric_no LIKE '$searchterm%'
           OR firstname LIKE '$searchterm%' OR nationality LIKE '$searchterm%'
           OR ic LIKE '$searchterm%' OR lastname LIKE '$searchterm%'";

        $statement = $con->query($sql);

            while($rs = $statement->fetch()){
                $matric = $rs['matric_no'];
                $ic = $rs['ic'];
                $course = $rs['course'];
                $status = $rs['status'];
                $firstname = $rs['firstname'];
                $lastname = $rs['lastname'];

                $output .= '<tr><td width="10%" title="Passport Number">'.$ic.'</td>
                <td width="38%" title="Student Fullname">'.$firstname. " ".$lastname.'</td>
                <td width="30%" title="Program of study">'.$course.'</td>
                <td width="11%">
                <a href="view_student?userID='.$matric.'">
                <img src="images/search-b-icon.png" width="100%" alt="View Record" title="View Record"
                height="50"></a></td>
                <td width="11%">
                <a href="edit_student?userID='.$matric.'">
                <img src="images/edit-icon.png" width="100%" alt="Edit User Account" title="Edit Students Information"
                height="50"></a></td>
                </tr>';
            }
            $sql2 = "SELECT * FROM staff WHERE staff_id LIKE '$searchterm%'
                    OR firstname LIKE '$searchterm%' OR nationality LIKE '$searchterm%'
                    OR ic LIKE '$searchterm%' OR lastname LIKE '$searchterm%'
                    AND profile = 'Lecturer'";

            $statement2 = $con->query($sql2);
            while($rs = $statement2->fetch()){
                $staff_id = $rs['staff_id'];
                $ic = $rs['ic'];
                $qualification = $rs['qualification'];
                $firstname = $rs['firstname'];
                $lastname = $rs['lastname'];

                $output .= '<tr><td width="10%" title="Passport Number">'.$ic.'</td>
                <td width="38%" title="Lecturers Fullname">'.$firstname. " ".$lastname.'</td>
                <td width="25%" title="Lecturers Qualification">'.$qualification.'</td>
                <td width="11%">
                <a href="view_lecturer?userID='.$staff_id.'">
                <img src="images/search-b-icon.png" width="100%" alt="View Record" title="View Record"
                height="50"></a></td>
                <td width="11%">
                <a href="edit_lecturer?userID='.$staff_id.'">
                <img src="images/edit-icon.png" width="100%" alt="Edit User Account" title="Edit Lecturer Information"
                height="50"></a></td>
                </tr>';
            }
            $output .= '</table>';

        return $output;
    }

    function SearchCourse($searchterm){
        $con = new data();
        $output = '<table width="100%" id="viewCourse" border="0" cellspacing="2" cellpadding="2">';
        $sql = "SELECT * FROM courses WHERE module_code LIKE '$searchterm%'
           OR semester LIKE '$searchterm%' OR course_title LIKE '$searchterm%'";
        $statement = $con->query($sql);
        if($statement){
            while($rs = $statement->fetch()){
                $moduleCode = $rs['module_code'];
                $semester = $rs['semester'];
                $programme = $rs['programme'];
                $course_title = $rs['course_title'];
                $id = $rs['course_id'];

                $output .= '<tr><td width="10%">'.$moduleCode.'</td>
                <td width="17%">'.$semester.'</td>
                <td width="57%" >'.$course_title.'</td>
                <td width="8%">
                <a href="editcourse?courseID='.$id.'">
                <img src="images/edit-icon.png" width="100%" alt="Edit Course" title="Edit Course"
                height="50"></a></td><td width="8%">
                <a href="#?courseID='.$id.'" onclick="return false" onmousedown="deleteItem('.$id.',\'courses\')"><img src="images/bin.png"
                alt="Remove Course" title="Remove Course" width="100%"
                height="50"></a></td>
                </tr>';
            }
            $output .= '</table>';
        }
        return $output;
    }

    function loadUserDataForSemesterRegistration($searh_term){
        $con = new data();
        $output = '';
        $balance = "";
        $sql = "SELECT lastname, firstname, matric_no, ic,
                  course FROM users WHERE ic='$searh_term'";

        $sql2 = "SELECT balance FROM payment WHERE ic='$searh_term'";

        $statement = $con->query($sql);
        $statement2 = $con->query($sql2);
        if($statement){
            if($rs = $statement->fetch()){
                $firstname = $rs['firstname'];
                $matric_no = $rs['matric_no'];
                $ic = $rs['ic'];
                $course = $rs['course'];
                $lastname= $rs['lastname'];
                $name = $firstname ." ".$lastname;

                if($rv = $statement2->fetch()){
                    $balance = $rv['balance'];
                }

                if($balance != ""){
                    $output .= '<fieldset id="bio_data">
                    <legend><strong>Bio Data</strong></legend>
                    <table width="100%" border="0" cellpadding="1"><tr>
                    <td class="enrollNormal enrollfirstTd">Matric No:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Matric No:</label>
                    <input type="text" name="txtMatric" id="txtMatric"
                     size="50" value="'.$matric_no.'" disabled="disabled" style="border: 0;"></td>
                    </tr>
                    <tr>
                    <td class="enrollNormal enrollfirstTd">Passport / IC No.:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Passport No.:</label>
                    <input type="text" name="txtIC" id="txtIC"
                    size="50" value="'.$ic.'" disabled="disabled" style="border: 0;"></td>
                  </tr>

                  <tr>
                    <td class="enrollNormal enrollfirstTd">Firstname:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Firstname:</label>
                    <input type="text" disabled="disabled" name="txtFirstname"
                    id="txtFirstname" style="border: 0;"
                    size="50" value="'.$name.'"></td>
                  </tr>
                  <tr>
                   <td class="enrollNormal enrollfirstTd">Oustanding Dues:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Oustanding Dues:</label>
    				<input type="text" disabled="disabled" name="txtOustandingDue" style="border: 0;"
                    id="txtOustandingDue" size="50" value="RM '.$balance.'">
                    </td>
                  </tr>
                  </table>
                   </fieldset>

                   <fieldset>
                       <legend><strong>Programme Information</strong></legend>
                       <table width="100%" border="0" cellpadding="1">
                           <tr>
                               <td class="enrollNormal enrollfirstTd">Programme:</td>
                               <td class="enrollsecondTd">
                                   <label class="enrollMobile">Programme:</label>
                                   <select name="txtCourse" id="txtCourse" onchange="getModules()">
                                    <option value="'.$course.'">'.$course.' </option>
                                   </select>
                               </td>
                           </tr>

                           <tr>
                               <td class="enrollNormal enrollfirstTd">Semester:</td>
                               <td class="enrollsecondTd">
                                   <label class="enrollMobile">Semester:</label>
                                   <select name="txtSemester" id="txtSemester" onchange="getModules()">
                                       <option value=""> Select Semester </option>
                                       <option value="Semester A"> Semester A </option>
                                       <option value="Semester B"> Semester B </option>
                                       <option value="Semester C"> Semester C </option>
                                   </select>
                               </td>
                           </tr>

                           <tr>
                               <td class="enrollNormal enrollfirstTd">Modules:<br>
                                   <i style="font-size: 10px; font-weight: bold;">
                                       Hold Ctrl + click to
                                       select multiple options</i></td>
                               <td class="enrollsecondTd">
                                   <label class="enrollMobile">Modules:</label>
                                   <select name="txtModules[]" multiple="multiple"
                                           style="height: auto;" id="txtModules">
                                   </select>
                               </td>
                           </tr>

                 <tr>
                   <td class="enrollNormal enrollfirstTd">Academic Year:</td>
                   <td class="enrollsecondTd">
                       <label class="enrollMobile">Academic Year:</label>
                       <select name="txtAcademicYear" id="txtAcademicYear">
                           <option value=""> Select Academic Year </option>
                           <option value="2014/15"> 2014/15 </option>
                           <option value="2015/16"> 2015/16 </option>
                           <option value="2016/17"> 2016/17 </option>
                       </select>
                   </td>
                 </tr>

                       </table>

                 <p><input id="p_info" type="button" name="parseSemester"
                        style="float:right;" onclick="parseSemesterRegistration()"
                        class="btn" value="Complete Registration"> </p>
                </fieldset>';
               }else {
                    $output = "<p style='font-size: 18px; color: red;'>
                    Please contact finance department for clearance, your financial details cannot be verified</p>";
                }
          }
        }
        return $output;
    }

    public function loadSubscribers(){
        $con = new data();
        $sql = "SELECT * FROM subscribe";
        $statement = $con->prepare($sql);
        $statement->execute();

        $rows = $statement->rowCount();
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
        $sql = "SELECT * FROM subscribe $limit";
        $statement = $con->prepare($sql);
        $statement->execute();

        $textline2 = "Page <b>$pagenum</b> of <b>$last</b>";

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
            $output = '<p>'. $textline2.'</p>';

            $output .= '<table width="100%" id="viewCourse" border="0"
            cellspacing="2" cellpadding="2">';
            $output .='<tr style="color: #ffffff; font-weight: bold;" class="blue">
                <td class="fourty">Email</td>
                <td class="fourty hide" >IP Address</td>
                <td class="ten" >Action</td>
                </tr>';

            while($rs = $statement->fetch()){
                $ip = $rs['ip'];
                $email = $rs['email'];
                $subscriber_id = $rs['subscriber_id'];

                $output .= '<tr><td class="fourEight">'.$email.'</td>
                <td class="fourty hide">'.$ip.'</td>
                <td class="ten">
                <a href="#?subscriberID='.$subscriber_id.'" onclick="return false" onmousedown="deleteItem('.$subscriber_id.',\'subscribe\')"><img src="images/bin.png"
                alt="Remove Subscriber" title="Remove Subscriber" width="100%"
                height="45"></a></td>
                </tr>';
            }
            $output .= '</table><br />
            <div id="pagination_controls">'. $paginationCtrls.'</div>';
        }
        else{
            $output = "No Record Found";
        }
        return $output;
    }

    public function loadCourseRequest(){
        $con = new data();
        $sql = "SELECT * FROM course_request";
        $statement = $con->prepare($sql);
        $statement->execute();

        $rows = $statement->rowCount();
        $page_rows = 2;
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
        $sql = "SELECT * FROM course_request $limit";
        $statement = $con->prepare($sql);
        $statement->execute();

        $textline1 = "Request (<b>$rows</b>)";
        $textline2 = "Page <b>$pagenum</b> of <b>$last</b>";

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
            $output = '<p>'. $textline2.'</p>';

            $output .= '<table width="100%" id="viewCourse" border="0"
            cellspacing="2" cellpadding="2">';
            $output .='<tr style="color: #ffffff; font-weight: bold;" class="blue"><td width="20%">Name</td>
                <td width="20%">Email</td>
                <td class="fourEight hide" >Programme of Interest</td>
                <td width="12%">Action</td>
                </tr>';

            while($rs = $statement->fetch()){
                $programme = $rs['programme'];
                $firstname = $rs['firstname'];
                $email = $rs['email'];

                $output .= '<tr><td width="20%">'.$firstname.'</td>
                <td width="20%">'.$email.'</td>
                <td class="fourEight hide" >'.$programme.'</td>
                <td width="12%">
                <a href="#?requestID='.$email.'">
                <img src="images/Mail-reply-icon.png" width="100%" alt="Reply Request" title="Reply Request"
                height="50" onclick="return false" onmousedown="alert(\'Request Replied successfully\')"></a></td>
                </tr>';
            }
            $output .= '</table><br />
            <div id="pagination_controls">'. $paginationCtrls.'</div>';
        }
        else{
            $output = "No Record Found";
        }
        return $output;
    }


    function CheckDuplicateEmailUpdate($email, $theID, $tablename){
        $con = new data();
        if($tablename == "users"){
            $queryString = "matric_no";
        }
        else if($tablename == "staff"){
            $queryString = "staff_id";
        }
        $sql = "SELECT email FROM " .$tablename. "
                    WHERE " .$queryString." != :id AND email = :email";
        $statement = $con->prepare($sql);
        if($statement){
            $statement->execute(array('id'=> $theID, 'email'=> $email));
            if($rs = $statement->fetch()){
                return true;
            }else{
                return false;
            }
        }
    }

    function changeAccountInfo($tablename, $rowToChange, $rowID, $value){
        $con = new data();
        if($tablename == "users"){
            $queryString = "matric_no";
        }
        else if($tablename == "staff"){
            $queryString = "staff_id";
        }

        $sql = "UPDATE " .$tablename." SET ".$rowToChange." = '$value' WHERE ".$queryString." = ".$rowID;

        $statement = $con->prepare($sql);
        $statement->execute();
        if($statement->rowCount() === 1){
           echo "good";
        }else{
            $error = $statement->errorInfo();
            echo "<b style='color: red;'>You have not made any changes to your record</b>";
        }
    }

    function img_resize($target, $newcopy, $w, $h, $ext) {
        list($w_orig, $h_orig) = getimagesize($target);
        $scale_ratio = $w_orig / $h_orig;
        if (($w / $h) > $scale_ratio) {
            $w = $h * $scale_ratio;
        } else {
            $h = $w / $scale_ratio;
        }
        $img = "";
        $ext = strtolower($ext);
        if ($ext == "gif"){
            $img = imagecreatefromgif($target);
        } else if($ext =="png"){
            $img = imagecreatefrompng($target);
        } else {
            $img = imagecreatefromjpeg($target);
        }
        $tci = imagecreatetruecolor($w, $h);
        imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
        imagejpeg($tci, $newcopy, 84);
    }

function loadExam($moduleName){
    $con = new data();
    $stuID = "";

    $output = "";
    $sql = "SELECT * FROM exam
                WHERE modules='$moduleName'";
    $statement = $con->query($sql);
    if($statement){
        while($rs = $statement->fetch()){
            $duration = $rs['duration'];
            $question1 = $rs['question1'];
            $question2 = $rs['question2'];
            $question3 = $rs['question3'];
            $question5 = $rs['question5'];
            $thedate = $rs['examDate'];
            $semester = $rs['semester'];
            $course = $rs['programme'];
            $modules = $rs['modules'];
            $examCode = $rs['examCode'];

            $newDate = mktime(0,0,0, date('m'), date('d'), date('Y'));
            $currentDay = date('d-F-Y ', $newDate);
            $examDate = $thedate;
            $today = new DateTime($currentDay);
            $return = new DateTime($examDate);

           if($today == $return){
               $output .= '<p style="color:green;">Examination duration is '.$duration.'Mins.<p>';
                $output .= '
                    <fieldset>
                    <legend><strong>Exam Questions</strong></legend>
                    <table width="100%" border="0" cellpadding="1">
                    <tr>
                    <td class="enrollNormal enrollfirstTd">Question 1: *</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Question 1: *</label>
                     <textarea name="txtQuestion1" style="border:0; height:auto;" id="txtQuestion1" disabled="disabled">'.$question1.'</textarea></td>
                    </tr>
                    <tr>
                    <td class="enrollNormal enrollfirstTd">Answer for Question 1  </td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Answer for Question 1</label>
                     <textarea name="question1Answer" id="question1Answer"></textarea></td>
                    </tr>
                    <tr>
                        <td class="enrollNormal enrollfirstTd">Question 2: *</td>
                        <td class="enrollsecondTd">
                            <label class="enrollMobile">Question 2: *</label>
                            <textarea name="txtQuestion2" style="border:0; height:auto;" id="txtQuestion2" disabled="disabled">'.$question2.'</textarea></td>
                    </tr>
                    <tr>
                    <td class="enrollNormal enrollfirstTd">Answer for Question 2  </td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Answer for Question 2</label>
                     <textarea name="question2Answer" id="question2Answer"></textarea></td>
                    </tr>
                    <tr>
                        <td class="enrollNormal enrollfirstTd">Question 3: *</td>
                        <td class="enrollsecondTd">
                            <label class="enrollMobile">Question 3: *</label>
                            <textarea name="txtQuestion3" style="border:0; height:auto;" id="txtQuestion3" disabled="disabled">'.$question3.'</textarea></td>
                    </tr>
                    <tr>
                    <td class="enrollNormal enrollfirstTd">Answer for Question 3  </td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Answer for Question 3</label>
                     <textarea name="question3Answer" id="question3Answer"></textarea></td>
                    </tr>';}

                    if($question5 && $today == $return){
                        $output .= '<tr>
                                <td class="enrollNormal enrollfirstTd">Question 4: </td>
                            <td class="enrollsecondTd">
                                <label class="enrollMobile">Question 4: </label>
                                <textarea name="txtQuestion5" style="border:0; height:auto;" id="txtQuestion5" disabled="disabled">'.$question5.'</textarea></td>
                        </tr>
                        <tr>
                        <td class="enrollNormal enrollfirstTd">Answer for Question 4  </td>
                        <td class="enrollsecondTd">
                        <label class="enrollMobile">Answer for Question 4</label>
                         <textarea name="question5Answer" id="question5Answer"></textarea></td>
                        </tr>';
                }else{
                $output .= ' <input name="question5Answer" id="question5Answer"
                 type="hidden" value="" >';
                }
        }
            if($output != "" && $today == $return){
                    $output .= '</table>
                    <p>
                     <input name="txtExamCode" id="txtExamCode" type="hidden" value="'.$examCode.'" >
                    <input name="txtCourse" id="txtCourse" type="hidden" value="'.$course.'" >
                    <input name="txtSemester" id="txtSemester" type="hidden" value="'.$semester.'" >
                    <input name="txtModules" id="txtModules" type="hidden" value="'.$modules.'" >
                    <input id="p_info" type="button" name="parseSumit"
                        style="float:right;" class="btn" value="Submit" onclick="parseAnswer()">
                    </p>
                </fieldset>';
          }
            else if($today > $return){
                $output = "<h5><strong>Sorry you cannot take this exam anymore, it was scheduled for ".$thedate."</strong></h5>.";
            }
        else if($today < $return){
            $output = "<h5><strong>Sorry you cannot take this exam until ".$thedate."</strong></h5>.";
        }
    }
    return $output;
}
}
