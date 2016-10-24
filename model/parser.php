<?php
function __autoload($classname){
    $folders = array(
        '../model/',
        '../connection/'
    );

    foreach($folders as $folder){
        if(file_exists($folder.$classname. '.php')){
            require_once($folder.$classname. '.php');
            return;
        }
    }
}

// INSTATIATE ALL CLASSES
$con = new data();
$helper = new studentHelper();
$load = new loadstudentData();


if(isset($_REQUEST['firstname']) && $_REQUEST['firstname'] != "" ){
	$firstname = $_REQUEST['firstname'];
	$lastname = $_REQUEST['lastname'];
	$course = $_REQUEST['course'];
	$email = $_REQUEST['email'];
	$phone = $_REQUEST['phone'];
	$town = $_REQUEST['town'];
	$country = $_REQUEST['country'];
	$work = $_REQUEST['work'];
	$age = $_REQUEST['age'];
	
	$sql = "INSERT INTO course_request (programme, firstname, lastname, email,
										phone, city, country, work_experience,
										age_group) values(:programme, :firstname,
										:lastname, :email, :phone, :city, :country,
										:work_experience, :age_group)";
	$statement = $con->prepare($sql);
	
	if($statement){
		$statement->execute(array(':programme' => $course, ':firstname' => $firstname, 
								  ':lastname' => $lastname,':email' => $email,
								  ':phone' => $phone, ':city' => $town, ':country' => $country,
								   ':work_experience' => $work, ':age_group' => $age));	
								   
			if($statement->rowCount() > 0){
				echo "Your request for course information has been sent";
			}else{
					echo "Operation Failed, try again ";
			}
	}
}

//Load course informationss
	if(isset($_GET['cname'])){
		$cname = $_GET['cname'];
		$sql = $con->prepare("Select * from programmes WHERE coursename=:coursename");
			$sql->execute(array(':coursename'=> $cname));
			while($rs = $sql->fetch()){
				$coursename = $rs['coursename'];
				$desc = $rs['description'];	
			}
		}

if(isset($_REQUEST['Cemail']) && $_REQUEST['Cemail'] != "" ){
		$email = $_REQUEST['Cemail'];
        $ipaddress = getenv('REMOTE_ADDR');
		$sql = "INSERT INTO subscribe (email, ip) Values(:email, :ip)";
		$statement = $con->prepare($sql);
		if($statement){
			$statement->execute(array(':email' => $email, ':ip'=> $ipaddress));
			echo "Your subscrition request has been sent";
		}else{
			$error = $statement->errorInfo();
					echo "Operation failed with message: " . $error[2];
		}
}
//CHANGE PASSWORD AND EMAIL SITEWIDE FUNCTION
else if(isset($_REQUEST['parseChangeEmail']) and empty($_REQUEST['parseChangeEmail']) == false){
    $email = $_REQUEST['txtEmail'];
    $id = $_REQUEST['txtUserId'];
    $tablename = $_REQUEST['txtTablename'];
    $rowToChange = $_REQUEST['txtRowToChange'];

    if($helper->CheckDuplicateEmailUpdate($email,$id,$tablename)){
        echo "Sorry a user with this email address already exist inside our system";
    }
    else{
        $helper->changeAccountInfo($tablename,$rowToChange,$id,$email);
    }
}
else if(isset($_REQUEST['parseChangePassword']) and empty($_REQUEST['parseChangePassword']) == false){
    $password = $_REQUEST['txtPassword'];
    $id = $_REQUEST['txtUserId'];
    $tablename = $_REQUEST['txtTablename'];
    $rowToChange = $_REQUEST['txtRowToChange'];
    $helper->changeAccountInfo($tablename,$rowToChange,$id,$password);
}
//CALL THE DELETE FUNCTION BASED ON PARAMETER PASSED DELETE FROM THE TABLE
else if(isset($_REQUEST['itemdelete']) and empty($_REQUEST['itemdelete']) == false){
    $itemToDeleteID = $_REQUEST['itemdelete'];
    $tablename = $_REQUEST['tablenames'];
    echo $load->deleteCourse($itemToDeleteID, $tablename);
}
//LOAD VALUES INTO THE MODULE FIELD BASED ON STUDENT COURSE AND SEMESTER SELESTED
else if(isset($_REQUEST['txtCourse']) and empty($_REQUEST['txtSemester']) == false and !isset($_REQUEST['parseSemester'])
    and !isset($_REQUEST['parseUploadCourseContent']) and empty($_REQUEST['parseSumit'])){
    $modulename = $_REQUEST['txtCourse'];
    $semester = $_REQUEST['txtSemester'];
    echo $helper->loadModules($modulename, $semester);
}
else if(isset($_REQUEST['txtExamModules'])){
    $theExam = $_REQUEST['txtExamModules'];
    echo $helper->loadExam($theExam);
}
else if(isset($_REQUEST['parseSumit'])){
    $question1 = $_REQUEST['question1Answer'];
    $question2 = $_REQUEST['question2Answer'];
    $question3 = $_REQUEST['question3Answer'];
    $question5 = $_REQUEST['question5Answer'];
    $semester = $_REQUEST['txtSemester'];
    $programme = $_REQUEST['txtCourse'];
    $module = $_REQUEST['txtModules'];
    $examCode = $_REQUEST['txtExamCode'];
    session_start();
    if(isset($_SESSION['profile']) && $_SESSION['profile'] === "Student"){
        $stuID = $_SESSION['userMatricNo'];
    }

    $sql = "SELECT * FROM answer
                    WHERE semester = :semester AND
                    programme = :programme AND modules = :modules
                    AND studentID = :studentID";
    $result = $con->prepare($sql);
    $result->execute(array('semester'=>$semester,
        'programme'=> $programme, 'modules'=> $module, 'studentID'=> $stuID));
    if($rs = $result->fetch()){
        echo "Sorry request cancelled because, you have already submited exam answers for this module";
    }
    else{
        $sql = "INSERT INTO answer (examCode, programme, modules, semester, question1Answer,
                        question2Answer, question3Answer, question5Answer, studentID)
                        VALUES(:examCode, :programme, :modules, :semester, :question1, :question2,
                        :question3,:question5, :studentID)";

        $statement = $con->prepare($sql);
        if($statement){
            $statement->execute(array(':examCode'=> $examCode,
                ':programme'=> $programme, ':modules'=> $module,
                ':semester'=> $semester,':question1'=> $question1, ':question2'=> $question2,
                ':question3'=> $question3,
                ':question5'=> $question5, ':studentID'=> $stuID));

            if($statement->rowCount() == 1){
                echo "good";
            }else{
                $error = $statement->errorInfo();
                echo "Query failed with message: " . $error[2];
            }
        }
    }
}// PARSE STUDENT STEP 1
else if(isset($_REQUEST['parseStudentStepOne'])){
        $firstname = $_REQUEST['txtFirstname'];
        $day = $_REQUEST['txtDay'];
        $year = $_REQUEST['txtYear'];
        $month = $_REQUEST['txtMonth'];
        $course = $_REQUEST['txtCourse'];
        $lastYearInSchool = $_REQUEST['txtLastyear'];
        $intake = $_REQUEST['txtIntake'];
        $department = $_REQUEST['txtDepartment'];
        $gender = $_REQUEST['txtGender'];
        $nationality = $_REQUEST['txtNationailty'];
        $othernames = $_REQUEST['txtOtherNames'];
        $ic = $_REQUEST['txtIC'];

        $dob = $day."-".$month."-".$year;
        $password = $dob;
        $profile = "Student";

        if(!$helper->validateIC($ic)){
            echo "Passport number must be alpha-numeric characters,
		starting with a letter [A-Za-z] and then numbers [0-9]
		please enter valid passport number.";
        }else if($helper->checkDuplicateIC($ic, "users")){
            echo "The Passport/IC number you entered is already enrolled in our system";
        }else if($helper->checkDuplicateIntakeCode($intake)){
            echo "The Intake Code you entered has been assigned to another student";
        }
        else{
            try{
                $sql = "INSERT INTO users (ic, firstname, lastname, password, dob, gender,
				nationality, department, course, intake, last_school_year, profile)

				values(:ic, :firstname, :lastname, :password, :dob, :gender,
				:nationality, :department, :course, :intake,
				:last_school_year, :profile)";

                $statement = $con->prepare($sql);

                if($statement){
                    $statement->execute(array(':ic'=> $ic,':firstname'=> $firstname,
                        ':lastname'=> $othernames,
                        ':password'=>$password,
                        ':dob'=> $dob,':gender'=> $gender,
                        ':nationality'=> $nationality,
                        ':department'=> $department,
                        ':course'=> $course,
                        ':intake'=> $intake,
                        ':last_school_year'=> $lastYearInSchool,
                        ':profile'=> $profile));
                    if($statement->rowCount() == 1){
                        $id = $con->lastInsertId();
                        session_start();
                        $_SESSION['matric'] = $id;
                        mkdir("../students/$id", 0777, true);
                        chmod("../students/$id", 0777);
                        echo "good";
                    }else{
                        $error = $statement->errorInfo();
                        echo "Query failed with message: " . $error[2];
                    }
                }
            }
            catch (PDOException $e) {
                echo "A database problem has occurred: " . $e->getMessage();
            }
        }
    }
// PARSE STUDENT STEP 2
    else if(isset($_REQUEST['parseStudentStepTwo'])){
        $email = $_REQUEST['txtEmail'];
        $phone = $_REQUEST['txtPhone'];
        $address = $_REQUEST['txtAddress'];
        $fullname = $_REQUEST['txtFullname'];
        $occupation = $_REQUEST['txtOccupation'];
        $nphone = $_REQUEST['txtNextofkinphone'];
        // GET USER IP ADDRESS
        $ipaddress = getenv('REMOTE_ADDR');

        if($helper->checkDuplicateEmail($email, "users")){
            echo "The Email address you entered is already existing in our system";
        }else{
            try{
                $sql = 'UPDATE users SET email=:email, phone=:phone,
						address=:address, next_kin_name=:next_kin_name,
						next_kin_phone=:next_kin_phone, registered_from=:ip,
						next_kin_occupation=:next_kin_occupation, enroll_date=now()
						WHERE matric_no = :matric_no';

                $statement = $con->prepare($sql);
                if($statement){
                    session_start();
                    if(isset($_SESSION['matric'])){
                        $id = $_SESSION['matric'];
                    }
                    $statement->execute(array(':matric_no'=>$id,
                        ':email'=>$email,':phone'=>$phone,
                        ':address'=>$address,
                        ':next_kin_name'=>$fullname,
                        ':next_kin_phone'=>$nphone,
                        ':next_kin_occupation'=>$occupation,
                        ':ip'=> $ipaddress
                    ));

                    if($statement->rowCount() == 1){
                        $sms = new sendsms();
                        unset($_SESSION['matric']);
                        $message_string = "Your enrollment was successful, please login with your email and DOB (format 2-April-1987)";
                        $sms->gw_send_sms("API0Y6K7OXTEH", "API0Y6K7OXTEH0Y6K7",
                            "Terdia", $phone, $message_string);
                        echo "good";
                    }
                    else{
                        $error = $statement->errorInfo();
                        echo "Query failed with message: " . $error[2];
                    }
                }
            }catch(PDOException $e){
                echo "A database problem has occurred: " . $e->getMessage();
            }
        }
    }
    else if(isset($_REQUEST['parseStudentUpdate'])){
        $firstname = $_REQUEST['txtFirstname'];
        $status = $_REQUEST['txtStatus'];
        $course = $_REQUEST['txtCourse'];
        $lastYearInSchool = $_REQUEST['txtLastyear'];
        $intake = $_REQUEST['txtIntake'];
        $department = $_REQUEST['txtDepartment'];
        $gender = $_REQUEST['txtGender'];
        $nationality = $_REQUEST['txtNationailty'];
        $othernames = $_REQUEST['txtOtherNames'];
        $ic = $_REQUEST['txtIC'];
        $email = $_REQUEST['txtEmail'];
        $phone = $_REQUEST['txtPhone'];
        $address = $_REQUEST['txtAddress'];
        $fullname = $_REQUEST['txtFullname'];
        $occupation = $_REQUEST['txtOccupation'];
        $nphone = $_REQUEST['txtNextofkinphone'];

        try{
            $sql = 'UPDATE users SET firstname=:firstname,lastname=:lastname,
                        gender=:gender,nationality=:nationality,department=:department,
                        course=:course,intake=:intake,last_school_year=:last_school_year,
                        status=:status,email=:email, phone=:phone,address=:address,
						next_kin_name=:next_kin_name,next_kin_phone=:next_kin_phone,
						next_kin_occupation=:next_kin_occupation
						WHERE ic = :ic';

            $statement = $con->prepare($sql);
            if($statement){
                $statement->execute(array(':ic'=> $ic,':firstname'=> $firstname,
                    ':lastname'=> $othernames,
                    ':gender'=> $gender,
                    ':nationality'=> $nationality,
                    ':department'=> $department,
                    ':course'=> $course,
                    ':intake'=> $intake,
                    ':last_school_year'=> $lastYearInSchool,
                    ':status'=> $status,
                    ':email'=>$email,':phone'=>$phone,
                    ':address'=>$address,
                    ':next_kin_name'=>$fullname,
                    ':next_kin_phone'=>$nphone,
                    ':next_kin_occupation'=>$occupation
                ));

                if($statement->rowCount() == 1){
                    echo "good";
                }
                else{
                    $error = $statement->errorInfo();
                    echo "You have not made any changes ";
                }
            }
        }catch(PDOException $e){
            echo "A database problem has occurred: " . $e->getMessage();
        }
    }
    else if(isset($_REQUEST['searchDataPassport']) and empty($_REQUEST['searchDataPassport']) == false){
        $search_term = $_REQUEST['searchDataPassport'];
        echo $helper->loadUserDataForSemesterRegistration($search_term);
    }
    else if(isset($_REQUEST['parseSemester']) and empty($_REQUEST['parseSemester']) == false){
        $ic = $_REQUEST['txtIC'];
        $fullname = $_REQUEST['txtFirstname'];
        $matric = $_REQUEST['txtMatric'];
        $osDue = $_REQUEST['txtOustandingDue'];
        $semester = $_REQUEST['txtSemester'];
        $academicYear = $_REQUEST['txtAcademicYear'];
        $modules = $_REQUEST['txtModules'];
        $course = $_REQUEST['txtCourse'];

        //CHECK FOR OUSTANDING DUES
        if($osDue != "RM 0"){
            echo "Sorry operation failed, we are unable to register this student at the moment please contact finance
        department for clearance.";
        }
        //CHECK FOR DUPLICATE REGISTRATION FOR SAME SEMESTER
        else if($helper->semesterRegistrationControl($matric, $course, $semester, $modules, $ic)){
            echo "This student with Passport number " .$ic . " is already registered for the current semester
        inside our system";
        }
        //CHECK FOR DUPLICATE REGISTRATION FOR SAME SEMESTER
        else if($helper->semesterRegistrationControlForIC($matric, $academicYear, $ic)){
            echo "This student with Passport number " .$ic . " is already registered for the academic year " .$academicYear;
        }
        //ALL GOOD PROCESS DATA
        else{
            $sql = "INSERT INTO semester_registration (matric_no, ic, fullname,outstanding_due,
                        programme,semester, modules, academic_year, registeration_date)
                        VALUES(:matric_no, :ic, :fullname, :outstanding_due, :programme,
                        :semester, :modules, :academic_year, now())";

            $statement = $con->prepare($sql);
            if($statement){
                $statement->execute(array(':matric_no'=> $matric, ':ic'=> $ic, ':fullname'=> $fullname,
                    ':outstanding_due'=> $osDue, ':programme'=> $course,
                    ':semester'=> $semester, ':modules'=> $modules,
                    ':academic_year'=> $academicYear));

                if($statement->rowCount() == 1){
                    echo "good";
                }else{
                    $error = $statement->errorInfo();
                    echo "Query failed with message: " . $error[2];
                }
            }
        }
    }
