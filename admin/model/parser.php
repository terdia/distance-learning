<?php
//AUTOLOAD CLASSES FOR EASY REFERENCES
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
	$helper = new helper();
    $load = new loadData();
    $sms = new sendsms();

// PARSE STUDENT STEP 1
if(isset($_REQUEST['parseStudentStepOne'])){
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
					mkdir("../../students/$id", 0777, true);
                    chmod("../../students/$id", 0777);
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
						unset($_SESSION['matric']);
                        $message_string = "Your enrollment was successful, please login with your email and DOB (format 2-April-1987)";
                        $sms->gw_send_sms("API0Y6K7OXTEH", "API0Y6K7OXTEH0Y6K7",
                            "Terdia", $phone, $message_string);
						echo "good";
					}
					else{
						echo "You have not made any changes";
					}
				}							
			}catch(PDOException $e){
				echo "A database problem has occurred: " . $e->getMessage();
			}
		}
}
// PARSE LECTURER STEP 1
else if(isset($_REQUEST['parseLecturerStepOne'])){
    $firstname = $_REQUEST['txtFirstname'];
    $course = $_REQUEST['txtCourse'];
    $designation = $_REQUEST['txtDesignation'];
    $qualification = $_REQUEST['txtQualification'];
    $department = $_REQUEST['txtDepartment'];
    $gender = $_REQUEST['txtGender'];
    $nationality = $_REQUEST['txtNationailty'];
    $othernames = $_REQUEST['txtOtherNames'];
    $ic = $_REQUEST['txtIC'];

    $password = $ic;
    $profile = "Lecturer";

    if(!$helper->validateIC($ic)){
        echo "Passport number must be alpha-numeric characters,
		starting with a letter [A-Za-z] and then numbers [0-9]
		please enter valid passport number.";
    }else if($helper->checkDuplicateIC($ic, "staff")){
        echo "The Passport/IC number you entered is already enrolled in our system";
    }
    else{
        try{
            $sql = "INSERT INTO staff (ic, firstname, lastname, password, gender,
				nationality, department, course, qualification, designation, profile)

				values(:ic, :firstname, :lastname, :password, :gender,
				:nationality, :department, :course, :qualification,
				:designation, :profile)";

            $statement = $con->prepare($sql);

            if($statement){
                $statement->execute(array(':ic'=> $ic,':firstname'=> $firstname,
                    ':lastname'=> $othernames,
                    ':password'=>$password,
                    ':gender'=> $gender,
                    ':nationality'=> $nationality,
                    ':department'=> $department,
                    ':course'=> $course,
                    ':qualification'=> $qualification,
                    ':designation'=> $designation,
                    ':profile'=> $profile));
                if($statement->rowCount() == 1){
                    $id = $con->lastInsertId();
                    session_start();
                    $_SESSION['staff_id'] = $id;
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
// PARSE LECTURER STEP 2
else if(isset($_REQUEST['parseLecturerStepTwo'])){
    $email = $_REQUEST['txtEmail'];
    $phone = $_REQUEST['txtPhone'];
    $address = $_REQUEST['txtAddress'];
    // GET USER IP ADDRESS
    $ipaddress = getenv('REMOTE_ADDR');

    if($helper->checkDuplicateEmail($email, "staff")){
        echo "The Email address you entered is already existing in our system";
    }else{
        try{
            $sql = 'UPDATE staff SET email=:email, phone=:phone,
						address=:address, registered_from=:ip, employ_date=now()
						WHERE staff_id = :staff_id';

            $statement = $con->prepare($sql);
            if($statement){
                session_start();
                if(isset($_SESSION['staff_id'])){
                    $id = $_SESSION['staff_id'];
                }
                $statement->execute(array(':staff_id'=>$id,
                    ':email'=>$email,':phone'=>$phone,
                    ':address'=>$address,
                    ':ip' => $ipaddress
                ));

                if($statement->rowCount() == 1){
                    unset($_SESSION['staff_id']);
                    $message_string = "FTMS PORTAL LOGIN DETAILS, Username: ".$email.", Password is your Passport No";
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
//ADD NEW COURSE PARSE
else if(isset($_REQUEST['addCourseInfo'])){
    $moduleCode = $_REQUEST['txtModuleCode'];
    $semesterCode = $_REQUEST['txtSemester'];
    $creditLoad = $_REQUEST['txtCreditLoad'];
    $programme = $_REQUEST['txtProgramme'];
    $school = $_REQUEST['txtDepartment'];
    $courseTitle = $_REQUEST['txtCourseTitle'];

    if(!$helper->validateModuleCode($moduleCode)){
        echo "Module Code must be alpha-numeric characters,
		starting with 2 letters [A-Za-z] and 4 numbers [0-9].";
    }
    else if($helper->checkModuleCode($moduleCode)){
        echo "Duplicate Module code Please use another one";
    }
    else if($helper->checkDuplicateCourseEntry($semesterCode, $programme, $courseTitle)){
        echo "Sorry a matching course entry already exist, please try again";
    }
    else{
        try{
            $sql = "INSERT INTO courses (module_code, semester, school,
                    programme, course_title, credit)
                    values(:module_code, :semester, :school, :programme,
                    :coursetitle, :credit)";

            $statement = $con->prepare($sql);

            if($statement){
                $statement->execute(array(':module_code'=> $moduleCode,
                    ':semester'=> $semesterCode,
                    ':school'=> $school,
                    ':programme'=>$programme,
                    ':coursetitle'=> $courseTitle,
                    ':credit'=> $creditLoad));
                if($statement->rowCount() == 1){
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
 //GET COURSE INFORMATION
}else if(isset($_REQUEST['cnames'])){
   $theData = $_REQUEST['cnames'];
    echo $helper->viewCourses($theData);
}
//GET USER INFORMATION
else if(isset($_REQUEST['cuser'])){
    $theData = $_REQUEST['cuser'];
    echo $helper->viewUser($theData);
}
//SEARCH MECHANISM FOR COURSES
else if(isset($_REQUEST['searchTerm']) and empty($_REQUEST['searchTerm']) == false){
    $search_term = $_REQUEST['searchTerm'];
    echo $helper->SearchCourse($search_term);
}
//SEARCH MECHANISM FOR REGISTERED USER
else if(isset($_REQUEST['searchPser']) and empty($_REQUEST['searchPser']) == false){
    $search_term = $_REQUEST['searchPser'];
    echo $helper->SearchUser($search_term);
}
//PARSE COURSE UPDATE
else if(isset($_REQUEST['parseCourseedit']) and empty($_REQUEST['parseCourseedit']) == false){
    $module_code = $_REQUEST['txtModuleCode'];
    $semester = $_REQUEST['txtSemester'];
    $school = $_REQUEST['txtDepartment'];
    $programme = $_REQUEST['txtProgramme'];
    $title = $_REQUEST['txtCourseTitle'];

    if($helper->checkDuplicateCourseEntry($semester, $programme, $title)){
        echo "You have not made any changes, please try again if you want to edit this course";
    }else{
    try{
        $sql = 'UPDATE courses SET module_code=:module_code, semester=:semester,
						school=:school, programme= :programme,course_title=:title
						WHERE module_code = :module_code';

        $statement = $con->prepare($sql);
        if($statement){
            $statement->execute(array(':module_code'=>$module_code,
                ':semester'=>$semester,':school'=>$school,
                ':programme'=>$programme, ':title'=> $title
            ));

                if($statement->rowCount() == 1){
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
//UPDATE LECTURER RECORD
else if(isset($_REQUEST['parseLecturerUpdate'])){
    $firstname = $_REQUEST['txtFirstname'];
    $course = $_REQUEST['txtCourse'];
    $designation = $_REQUEST['txtDesignation'];
    $qualification = $_REQUEST['txtQualification'];
    $department = $_REQUEST['txtDepartment'];
    $gender = $_REQUEST['txtGender'];
    $nationality = $_REQUEST['txtNationailty'];
    $othernames = $_REQUEST['txtOtherNames'];
    $ic = $_REQUEST['txtIC'];
    $email = $_REQUEST['txtEmail'];
    $phone = $_REQUEST['txtPhone'];
    $address = $_REQUEST['txtAddress'];
    $status = $_REQUEST['txtStatus'];

        try{
            $sql = 'UPDATE staff SET lastname =:lastname, firstname=:firstname,
                        gender=:gender, nationality=:nationality,
                        department=:department,course=:course,
                        qualification=:qualification,email=:email,
                        designation=:designation,phone=:phone,
						status=:status,address=:address
						WHERE ic = :ic';

            $statement = $con->prepare($sql);
            if($statement){
                $statement->execute(array(':ic'=>$ic,
                    ':lastname'=> $othernames,
                    ':firstname'=>$firstname,
                    ':gender'=> $gender,
                    ':nationality'=> $nationality,
                    ':department'=> $department,
                    ':course'=> $course,
                    ':qualification'=> $qualification,
                    ':designation'=> $designation,
                    ':status'=> $status,
                    ':email'=>$email,':phone'=>$phone,
                    ':address'=>$address
                ));

                if($statement->rowCount() == 1){
                    echo "good";
                }
                else{
                    echo "You have not made any changes";
                }
            }
        }catch(PDOException $e){
            echo "A database problem has occurred: " . $e->getMessage();
        }
    //UPDATE STUDENT RECORD
}else if(isset($_REQUEST['parseStudentUpdate'])){
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
                    echo "You have not made any changes";
                }
            }
        }catch(PDOException $e){
            echo "A database problem has occurred: " . $e->getMessage();
        }
}
//CALL THE DELETE FUNCTION BASED ON PARAMETER PASSED DELETE FROM THE TABLE
else if(isset($_REQUEST['itemdelete']) and empty($_REQUEST['itemdelete']) == false){
        $itemToDeleteID = $_REQUEST['itemdelete'];
        $tablename = $_REQUEST['tablenames'];
            echo $load->deleteCourse($itemToDeleteID, $tablename);
}
//LOAD VALUES INTO THE MODULE FIELD BASED ON STUDENT COURSE AND SEMESTER SELESTED
else if(isset($_REQUEST['txtCourse']) and empty($_REQUEST['txtSemester']) == false and !isset($_REQUEST['parseSemester'])
    and !isset($_REQUEST['parseUploadCourseContent']) and !isset($_REQUEST['parseScheduleExam']) and !isset($_REQUEST['parseUploadResult'])){
    $modulename = $_REQUEST['txtCourse'];
    $semester = $_REQUEST['txtSemester'];
    echo $helper->loadModules($modulename, $semester);
}
//DOSPLAY FORM FOR THE SELECTED STUDDENT BASED ON PASSPORT NUMBER DURING SEMESTER REG
else if(isset($_REQUEST['searchDataPassport']) and empty($_REQUEST['searchDataPassport']) == false){
    $search_term = $_REQUEST['searchDataPassport'];
    echo $helper->loadUserDataForSemesterRegistration($search_term);
}
//PARSE STUDENT DUE INFORMATION
else if(isset($_REQUEST['addDues'])){
    $amountDue = $_REQUEST['txtAmountDue'];
    $ic = $_REQUEST['txtIC'];
    $balance = $_REQUEST['txtBalance'];
    $amountPaid = $_REQUEST['txtAmountPaid'];

    if(!$helper->checkDuplicateIC($ic, "users")){
        echo "Sorry user with this Passport number doesn't exist inside our system";
    }
    else{
        try{
            $sql = "INSERT INTO payment (ic, amount_due, amount_paid,
                    balance, pay_date)
                    values(:ic, :amount_due, :amount_paid, :balance,
                    now())";

            $statement = $con->prepare($sql);

            if($statement){
                $statement->execute(array(':ic'=> $ic,
                    ':amount_due'=> $amountDue,
                    ':amount_paid'=> $amountPaid,
                    ':balance'=>$balance
                ));
                if($statement->rowCount() == 1){
                    echo "good";
                }else{
                    $error = $statement->errorInfo();
                    echo "Query failed with message: " . $error[2].
                        " Payment details already enter for this student";
                }
            }
        }
        catch (PDOException $e) {
            echo "A database problem has occurred: " . $e->getMessage();
        }
    }

}
//PARSE SEMESTER REGISTRATION DATA AND SAVE RECORD IN DATABASE
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
else if(isset($_REQUEST['parseScheduleExam']) and empty($_REQUEST['txtQuestion1']) == false){
    $question1 = $_REQUEST['txtQuestion1'];
    $question2 = $_REQUEST['txtQuestion2'];
    $question3 = $_REQUEST['txtQuestion3'];
    $question5 = $_REQUEST['txtQuestion5'];
    $day = $_REQUEST['txtDay'];
    $month = $_REQUEST['txtMonth'];
    $year = $_REQUEST['txtYear'];
    $duration = $_REQUEST['txtDuration'];
    $semester = $_REQUEST['txtSemester'];
    $course = $_REQUEST['txtCourse'];
    $module = $_REQUEST['txtModules'];
    $examDate = $day."-".$month."-".$year;

    $sql = "SELECT * FROM exam
                    WHERE semester = :semester AND
                    programme = :programme AND modules = :modules";
    $result = $con->prepare($sql);

    $result->execute(array('semester'=>$semester,
        'programme'=> $course, 'modules'=> $module));
    if($rs = $result->fetch()){
        echo "You have already schedule exam for the selected module";
    }
    else{
        $sql = "INSERT INTO exam (programme, modules, semester, question1,
                        question2, question3, question5, duration, examDate)
                        VALUES(:programme, :modules, :semester, :question1, :question2,
                        :question3, :question5, :duration, :examDate)";

        $statement = $con->prepare($sql);
        if($statement){
            $statement->execute(array(':programme'=> $course, ':modules'=> $module,
                ':semester'=> $semester,':question1'=> $question1, ':question2'=> $question2,
                ':question3'=> $question3,
                ':question5'=> $question5, ':duration'=> $duration, ':examDate'=> $examDate));

            if($statement->rowCount() == 1){
                echo "good";
            }else{
                $error = $statement->errorInfo();
                echo "Query failed with message: " . $error[2];
            }
        }
    }
}
else if(isset($_REQUEST['txtExamModules'])){
    $theExam = $_REQUEST['txtExamModules'];
    $dataArray = explode('-', $theExam);
    $thCourse = $dataArray[0];
    $theStudentID = $dataArray[1];
    echo $helper->loadExam($thCourse, $theStudentID);
}
else if(isset($_REQUEST['parseUploadResult'])){
    $examMark = $_REQUEST['txtExamMark'];
    $courseworkMark = $_REQUEST['txtCourseWork'];
    $semester = $_REQUEST['txtSemester'];
    $programme = $_REQUEST['txtCourse'];
    $module = $_REQUEST['txtModules'];
    $stuID = $_REQUEST['txtExamCode'];

    $sql = "SELECT courseworkmark, exammark FROM answer
                    WHERE semester = :semester AND
                    programme = :programme AND modules = :modules
                    AND studentID = :studentID";
    $result = $con->prepare($sql);
    $result->execute(array('semester'=>$semester,
        'programme'=> $programme, 'modules'=> $module, 'studentID'=> $stuID));

    if($rs = $result->fetch()){
        $exixtingcourseworkmark = $rs['courseworkmark'];
        $existingExamMark =$rs['exammark'];
    }
    if($exixtingcourseworkmark > 0 && $existingExamMark > 0){
        echo "You have already entered result for this module";
    }
    else{
        $sql = "UPDATE answer SET courseworkmark ='$courseworkMark',
                exammark = '$examMark'
                WHERE semester = :semester AND
                    programme = :programme AND modules = :modules
                    AND studentID = :studentID";

        $statement = $con->prepare($sql);
        if($statement){
            $statement->execute(array(
                ':programme'=> $programme, ':modules'=> $module,
                ':semester'=> $semester, ':studentID'=> $stuID));

            if($statement->rowCount() == 1){
                echo "good";
            }else{
                $error = $statement->errorInfo();
                echo "Query failed with message: " . $error[2];
            }
        }
    }
}

