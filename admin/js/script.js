
function parseExam(){
    var isValid = true;
    var question1 = document.getElementById("txtQuestion1").value;
    var semesterCode = document.getElementById("txtSemester").value;
    var question2 = document.getElementById("txtQuestion2").value;
    var course = document.getElementById("txtCourse").value;
    var question3 = document.getElementById("txtQuestion3").value;
    var module = document.getElementById("txtModules").value;
    var question5 = document.getElementById("txtQuestion5").value;
    var duration = document.getElementById("txtDuration").value;
    var day = document.getElementById("txtDay").value;
    var month = document.getElementById("txtMonth").value;
    var year = document.getElementById("txtYear").value;
    var numbers = /^[0-9]+$/;

    if(module == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please Select module");
        isValid = false;
    }
    else if(question1 == ""){
        $('.featured').css('display','block');
        $('.featured').html("Question 1 is required");
        isValid = false;
    }
    else if(question1.length < 15){
        $('.featured').css('display','block');
        $('.featured').html("Exam question cannot be less than 15 Characters");
        isValid = false;
    }
    else if(question2 == ""){
        $('.featured').css('display','block');
        $('.featured').html("Question 2 is required");
        isValid = false;
    }
    else if(question2.length < 15){
        $('.featured').css('display','block');
        $('.featured').html("Exam question cannot be less than 15 Characters");
        isValid = false;
    }
    else if(question3 == ""){
        $('.featured').css('display','block');
        $('.featured').html("Question 3 is required");
        isValid = false;
    }
    else if(question3.length < 15){
        $('.featured').css('display','block');
        $('.featured').html("Exam question cannot be less than 15 Characters");
        isValid = false;
    }
    else if(duration == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please set time limit for exam");
        isValid = false;
    }
    else if(!duration.match(numbers)){
        $('.featured').css('display','block');
        $('.featured').html("Exam duration must be specified as a number");
        isValid = false;
    }
    else if(day == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please select exam day");
        isValid = false;
    }
    else if(month == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please select exam month");
        isValid = false;
    }
    else if(isValid == true){
        openModal();
        var vars = "txtQuestion1="+question1+"&txtSemester="+semesterCode+"&txtQuestion2="+question2+"&txtQuestion3="+question3+"&txtQuestion5="+question5+"&txtCourse="+course+"&txtModules="+module+"&txtDuration="+duration+"&txtDay="+day+"&txtMonth="+month+"&txtYear="+year+"&parseScheduleExam=yes";
        var hr = ajaxObj("POST", "model/parser.php", true);
        setTimeout(function(){
            hr.onreadystatechange = function(){
                if(ajaxReturn(hr)== true){
                    closeModal();
                    var data = hr.responseText;
                    if(data == 'good'){
                        $('#personalInfo').slideUp("slow");
                        $('#success').css("display", "block");
                        $('.featured').css('display','block');
                        $('.featured').css("color","#83ba3c");
                        $('.featured').html("Exam  has been scheduled sucessfully. "+
                            "<a style='float: right;' href='exam'> Upload Next</a>");
                    }
                    else{
                        $('.featured').css('display','block');
                        $('.featured').css("color","#F00");
                        $('.featured').html(data);
                    }
                }
            }
            hr.send(vars);
        },2000);
    }
}

function focusSearch(){
    var searchF = document.getElementById('searchF');
    if(searchF.value == "Search by module code, semester or course title"){
        searchF.value = "";
    }
}

function getExam(){
    var modules = document.getElementById('txtExamModules').value;
    var exam = document.getElementById('examDiv');
    $.post('model/parser.php', {txtExamModules:modules}, function(data){
        exam.innerHTML = data;
    });
}


function parseResult(){
    var isValid = true;
    var examMark = $("#txtExamMark").val();
    var semesterCode = $("#txtSemester").val();
    var coursework = $("#txtCourseWork").val();
    var course = $("#txtCourse").val();
    var module = $("#txtModules").val();
    var studentID = $("#txtExamCode").val();

    if(examMark == "" && coursework == ""){
        $('.featured').css('display','block');
        $('.featured').html("Both coursework and exam score cannot be empty, enter one or both");
        isValid = false;
    }
    else if (isValid == true){
  if (confirm("Are you sure you have reviewed the marks correctly? this action cannot be undo")) {
    openModal();
    var vars = "txtExamCode="+studentID+"&txtExamMark="+examMark+"&txtSemester="+semesterCode+"&txtCourseWork="+coursework+"&txtCourse="+course+"&txtModules="+module+"&parseUploadResult=yes";
    var hr = ajaxObj("POST", "model/parser.php", true);
    setTimeout(function(){
        hr.onreadystatechange = function(){
            if(ajaxReturn(hr)== true){
                closeModal();
                var data = hr.responseText;
                if(data == 'good'){
                    $('#personalInfo').slideUp("slow");
                    $('#examDiv').slideUp("slow");
                    $('#success').css("display", "block");
                    $('.featured').css('display','block');
                    $('.featured').css("color","#83ba3c");
                    $('.featured').html("You have successfully upload result for student - " + studentID +
                        "<a style='float: right;' href='uploadResult'> Upload Next</a>");
                }
                else{
                    $('.featured').css('display','block');
                    $('.featured').css("color","#F00");
                    $('.featured').html(data);
                }
            }
        }
        hr.send(vars);
    },2000);
  }
  }
    return false;
}

function getModules(){
    var course = document.getElementById('txtCourse').value;
    var semester = document.getElementById('txtSemester').value;
    var modules = document.getElementById('txtModules');

    $.post('model/parser.php', {txtCourse:course, txtSemester:semester}, function(data){
        modules.innerHTML = data;
    });
}

function blurSearch(){
    var searchF = document.getElementById('searchF');
    if(searchF.value == ""){
        searchF.value = "Search by module code, semester or course title";
    }
}

function blurStudentData(){
    var student = document.getElementById('searchStudent');
    if(student.value == ""){
        student.value = "Search student using passport number";
    }
}

function focusStudentData(){
    var student = document.getElementById('searchStudent');
    if(student.value == "Search student using passport number"){
        student.value = "";
    }
}

function focusUser(){
    var searchU = document.getElementById('searchU');
    if(searchU.value == "Search by name, school, nationality, or Passport No."){
        searchU.value = "";
    }
}

function blurUser(){
    var searchU = document.getElementById('searchU');
    if(searchU.value == ""){
        searchU.value = "Search by name, school, nationality, or Passport No.";
    }
}

function deleteItem(theID, tablename) {
    var delete_id = theID
    var table = tablename;
    if (confirm("Are you sure you want to delete this item?")) {
        $.get('model/parser.php', {itemdelete:delete_id, tablenames:table}, function(data){
            $('.result').append(data);
        });
    }
    return false;
}

function toggleNavPanel(x){
    var panel = document.getElementById(x), navarrow = document.getElementById("navarrow"), maxH="auto";
    if(panel.style.height == maxH){
        panel.style.height = "0px"; navarrow.innerHTML = "&#9662;";
    } else {
        panel.style.height = maxH; navarrow.innerHTML = "&#9652;";
    }
}

window.addEventListener('mouseup', function(event){
    var box = document.getElementById('sections_panel');
    if (event.target != box && event.target.parentNode != box){
        box.style.height = "0px"; navarrow.innerHTML = "&#9662;";
    }
});

function loadCourse(name){
    var theData = name;
    $.get('model/parser.php', {cnames:theData}, function(data){
        $('.result').html(data);
    });
}

function loadUser(tablename){
    var theData = tablename;
    $.get('model/parser.php', {cuser:theData}, function(data){
        $('.result').html(data);
    });
}

function searchCourse(){
    var search_term = $('.searchField').attr('value');
    $.post('model/parser.php', {searchTerm:search_term}, function(data){
        $('.result').html(data);
    });
}

function searchStudentData(){
    var search_term = $('.searchCreteria').attr('value');
    $.post('model/parser.php', {searchDataPassport:search_term}, function(data){
        $('#contact_info').fadeIn("slow");
        $('#contact_info').html(data);
    });
}

function changeEmail(userID, tableName, rowName){
    var isValid = true;
    var tablename = tableName;
    var uID = userID;
    var rowToChange = rowName;
    var email = document.getElementById('txtEmail').value;

    var atpos=email.indexOf("@");
    var dotpos=email.lastIndexOf(".");
    $('.featured').css("color","#F00");

    if(email == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter student's email address");
        isValid = false;
    }
    else if(atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length){
        $('.featured').css('display','block');
        $('.featured').html(email + " is not a valid email address");
        isValid = false;
    }
    else if(isValid == true){
        openModal();
        var vars = "txtEmail="+email+"&txtUserId="+uID+"&txtTablename="+tablename+
            "&txtRowToChange="+rowToChange+"&parseChangeEmail=true";

        var hr = ajaxObj("POST", "model/parser.php", true);
        setTimeout(function(){
            hr.onreadystatechange = function(){
                if(ajaxReturn(hr)== true){
                    closeModal();
                    var data = hr.responseText;
                    if(data == 'good'){
                        $('#personalInfo').slideUp("slow");
                        $('#success').css("display", "block");
                        $('.featured').css('display','block');
                        $('.featured').css("color","#83ba3c");
                        $('.featured').html("You have sucessfully changed your login email"+
                            "<a style='float: right;' href='my_account'>View Account</a>");
                    }
                    else{
                        $('.featured').css('display','block');
                        $('.featured').css("color","#F00");
                        $('.featured').html(data);
                    }
                }
            }
            hr.send(vars);
        },1000);
    }
}

function changePassword(userID, tableName, rowName){
    var isValid = true;
    var tablename = tableName;
    var uID = userID;
    var rowToChange = rowName;
    var password = document.getElementById('txtPassword').value;
    var repassword = document.getElementById('txtRePassword').value;

    $('.featured').css("color","#F00");

    if(password == ""){
        $('.featured').css('display','block');
        $('.featured').html("Password field is required");
        isValid = false;
    }
    else if(repassword == ""){
        $('.featured').css('display','block');
        $('.featured').html("Repeat Password field is required");
        isValid = false;
    }
    else if(password.length < 6 ){
        $('.featured').css('display','block');
        $('.featured').html("Password is too short, minimum password length is 6");
        isValid = false;
    }
    else if(repassword !== password){
        $('.featured').css('display','block');
        $('.featured').html("Values in both fields do not match, please try again");
        isValid = false;
    }
    else if(isValid == true){
        openModal();
        var vars = "txtPassword="+password+"&txtUserId="+uID+"&txtTablename="+tablename+
            "&txtRowToChange="+rowToChange+"&parseChangePassword=true";

        var hr = ajaxObj("POST", "model/parser.php", true);
        setTimeout(function(){
            hr.onreadystatechange = function(){
                if(ajaxReturn(hr)== true){
                    closeModal();
                    var data = hr.responseText;
                    if(data == 'good'){
                        $('#personalInfo').slideUp("slow");
                        $('#success').css("display", "block");
                        $('.featured').css('display','block');
                        $('.featured').css("color","#83ba3c");
                        $('.featured').html("You have sucessfully changed your login password"+
                            "<a style='float: right;' href='my_account'>View Account</a>");
                    }
                    else{
                        $('.featured').css('display','block');
                        $('.featured').css("color","#F00");
                        $('.featured').html(data);
                    }
                }
            }
            hr.send(vars);
        },1000);
    }
}

function searchUser(){
    var search_term = $('.searchField').attr('value');
    $.post('model/parser.php', {searchPser:search_term}, function(data){
        $('.result').html(data);
    });
}

function getBalance(){
    var valid = true;
    var due = $('#txtAmountDue').attr('value');
    var paid = $('#txtAmountPaid').attr('value');
    if(due != "" && paid != ""){
        if(parseFloat(paid) > parseFloat(due)){
            $('.featured').css('display','block').html("Amount Paid is greater than the Amount Due");
            var result = document.getElementById('txtBalance');
            result.value = "";
            valid = false;
        }
        else if(parseFloat(due) >= parseFloat(paid)){
            $('.featured').css('display','none')
            var balance = due - paid;
            var result = document.getElementById('txtBalance');
            result.value = balance.toFixed(2);
        }
    }
}

//Forgot Password Mechanism OPEN THE DIV
	function openForgot(){
		var element = document.getElementById('forgotPassword');
		var closepassword = document.getElementById('closepassword');
		if(closepassword.style.display = "block"){
			closepassword.style.display = "none";
			element.style.display = "block";
		}
	}

function retrivePassword(){
	$("#aemail").keyup(function() {
		var aemail = $("#aemail").val();
		$.post('model/passwordParse.php', {aemail:aemail}, function(data){		
			$('.featured').css('display','block');
			$('.featured').html(data);
			$("#uemail").html('');		
		});			
	});
}

//show and hide password function
function togglePassword() {
	var upass = document.getElementById('pw');
	var toggleBtn = document.getElementById('toggleBtn');
	
	if(upass.type == "password"){
		upass.type = "text";
		toggleBtn.value = "Hide Password Text";
	} else {
		upass.type = "password";
		toggleBtn.value = "Show Password Text";
	}
}

//AJAX Call functions Sections
function openModal() {
        document.getElementById('modal').style.display = 'block';
        document.getElementById('fade').style.display = 'block';
}

function closeModal() {
    document.getElementById('modal').style.display = 'none';
    document.getElementById('fade').style.display = 'none';
}

//===========ADD COURSE PARSE============//
function parseCourseAdd(){
    var isValid = true;

    var moduleCode = document.getElementById("txtModuleCode").value;
    var semesterCode = document.getElementById("txtSemester").value;
    var creditLoad = document.getElementById("txtCreditLoad").value;
    var programme = document.getElementById("txtProgramme").value;
    var school = document.getElementById("txtDepartment").value;
    var courseTitle = document.getElementById("txtCourseTitle").value;

    var letters = /^[A-Z & a-z]+$/;

    if(moduleCode == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter module code");
        isValid = false;
    }
    else if(moduleCode.length < 6 || moduleCode.length > 6){
        $('.featured').css('display','block');
        $('.featured').html("Module Code cannot be less or more than 6 Alphanumeric Characters");
        isValid = false;
    }
    else if(semesterCode == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please Select Semester code");
        isValid = false;
    }
    else if(school == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please Select School");
        isValid = false;
    }
    else if(programme == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please Select Program");
        isValid = false;
    }
    else if(courseTitle == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please Select Course Title");
        isValid = false;
    }
    else if(!courseTitle.match(letters)){
        $('.featured').css('display','block');
        $('.featured').html("Course Title cannot contain number");
        isValid = false;
    }
    else if(courseTitle.length < 9){
        $('.featured').css('display','block');
        $('.featured').html("Course Title cannot be less than 9 characters");
        isValid = false;
    }
    else if(isValid == true){
        openModal();
        var vars = "txtModuleCode="+moduleCode+"&txtSemester="+semesterCode+"&txtCreditLoad="+creditLoad+"&txtProgramme="+programme+"&txtCourseTitle="+courseTitle+"&txtDepartment="+school+"&addCourseInfo=yes";
        var hr = ajaxObj("POST", "model/parser.php", true);

        setTimeout(function(){
            hr.onreadystatechange = function(){
                if(ajaxReturn(hr)== true){
                    closeModal();
                    var data = hr.responseText;
                    if(data == 'good'){
                        $('#personalInfo').slideUp("slow");
                        $('#success').css("display", "block");
                        $('.featured').css('display','block');
                        $('.featured').css("color","#83ba3c");
                        $('.featured').html("Course has been sucessfully added to the system. "+
                            "<a style='float: right;' href='manage_courses'> Add Next</a>");
                    }
                    else{
                        $('.featured').css('display','block');
                        $('.featured').css("color","#F00");
                        $('.featured').html(data);
                    }
                }
            }
            hr.send(vars);
        },2000);
    }
}


function parseCourseEdit(){
    var isValid = true;

    var moduleCode = document.getElementById("txtModuleCode").value;
    var semesterCode = document.getElementById("txtSemester").value;
    var creditLoad = document.getElementById("txtCreditLoad").value;
    var programme = document.getElementById("txtProgramme").value;
    var school = document.getElementById("txtDepartment").value;
    var courseTitle = document.getElementById("txtCourseTitle").value;

    var letters = /^[A-Z & a-z]+$/;

    if(moduleCode == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter module code");
        isValid = false;
    }
    else if(moduleCode.length < 6 || moduleCode.length > 6){
        $('.featured').css('display','block');
        $('.featured').html("Module Code cannot be less or more than 6 Alphanumeric Characters");
        isValid = false;
    }
    else if(semesterCode == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please Select Semester code");
        isValid = false;
    }
    else if(school == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please Select School");
        isValid = false;
    }
    else if(programme == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please Select Program");
        isValid = false;
    }
    else if(courseTitle == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please Select Course Title");
        isValid = false;
    }
    else if(!courseTitle.match(letters)){
        $('.featured').css('display','block');
        $('.featured').html("Course Title cannot contain number");
        isValid = false;
    }
    else if(courseTitle.length < 9){
        $('.featured').css('display','block');
        $('.featured').html("Course Title cannot be less than 9 characters");
        isValid = false;
    }
    else if(isValid == true){
        openModal();
        var vars = "txtModuleCode="+moduleCode+"&txtSemester="+semesterCode+"&txtCreditLoad="+creditLoad+"&txtProgramme="+programme+"&txtCourseTitle="+courseTitle+"&txtDepartment="+school+"&parseCourseedit=yes";
        var hr = ajaxObj("POST", "model/parser.php", true);

        setTimeout(function(){
            hr.onreadystatechange = function(){
                if(ajaxReturn(hr)== true){
                    closeModal();
                    var data = hr.responseText;
                    if(data == 'good'){
                        $('#personalInfo').slideUp("slow");
                        $('#success').css("display", "block");
                        $('.featured').css('display','block');
                        $('.featured').css("color","#83ba3c");
                        $('.featured').html("Course Information Update was sucessful. "+
                            "<a style='float: right;' href='view_course'> Edit Next</a>");
                    }
                    else{
                        $('.featured').css('display','block');
                        $('.featured').css("color","#F00");
                        $('.featured').html(data);
                    }
                }
            }
            hr.send(vars);
        },1000);
    }
}

//==========ENROLL STUDENT PARSE START=======//
function parsePersonalInfo(){
    var isValid = true;
	var ic = document.getElementById("txtIC").value;
	var firstname = document.getElementById("txtFirstname").value;
	var lastname = document.getElementById("txtOtherNames").value;
	var nationality = document.getElementById("txtNationailty").value;	
	var gender = document.getElementById("txtGender").value;
	var day = document.getElementById("txtDay").value;
	var month = document.getElementById("txtMonth").value;
	var year = document.getElementById("txtYear").value;
	var lastYearInSchool = document.getElementById("txtLastyear").value;
	var intake = document.getElementById("txtIntake").value;
	var department = document.getElementById("txtDepartment").value;
	var course = document.getElementById("txtCourse").value;
	
	var letters = /^[A-Z a-z]+$/; 
	var numbers = /^[0-9]+$/; 
	
	if(ic == ""){
		$('.featured').css('display','block');
		$('.featured').html("Please enter a valid passport number");
        isValid = false;
	}
	else if(ic.length < 9){
		$('.featured').css('display','block');
		$('.featured').html("Passport Number cannot be less than 9 alphanumeric characters");
        isValid = false;
	}
	else if(firstname == ""){
		$('.featured').css('display','block');
		$('.featured').html("Please enter Student's fistname");
        isValid = false;
	}
	else if(!firstname.match(letters)){
		$('.featured').css('display','block');
		$('.featured').html("Students firstname cannot contain number or special characters");
        isValid = false;
	}
	else if(firstname.length < 3){
		$('.featured').css('display','block');
		$('.featured').html("Students firstname cannot be less than 3 characters");
        isValid = false;
	}
	else if(lastname == ""){
		$('.featured').css('display','block');
		$('.featured').html("Please enter students other names");
        isValid = false;
	}
	else if(!lastname.match(letters)){
		$('.featured').css('display','block');
		$('.featured').html("Students other names cannot contain number or special characters");
        isValid = false;
	}
	else if(lastname.length < 3){
		$('.featured').css('display','block');
		$('.featured').html("Students other names cannot be less than 3 characters");
        isValid = false;
	}	
	else if(nationality == ""){
		$('.featured').css('display','block');
		$('.featured').html("Please enter student's nationality");
        isValid = false;
	}
	else if(!nationality.match(letters)){
		$('.featured').css('display','block');
		$('.featured').html("Nationality cannot contain number or special characters");
        isValid = false;
	}
	else if(nationality.length < 2){
		$('.featured').css('display','block');
		$('.featured').html("Nationality cannot be less than 2 characters");
        isValid = false;
	}	
	else if(gender == ""){
		$('.featured').css('display','block');
		$('.featured').html("Please select gender");
        isValid = false;
	}
	else if(day == ""){
		$('.featured').css('display','block');
		$('.featured').html("Please select day of birth");
        isValid = false;
	}
	else if(month == ""){
		$('.featured').css('display','block');
		$('.featured').html("Please select month of birth");
        isValid = false;
	}
	else if(year == ""){
		$('.featured').css('display','block');
		$('.featured').html("Please select year of birth");
        isValid = false;
	}	
	else if(lastYearInSchool == ""){
		$('.featured').css('display','block');
		$('.featured').html("Please enter student's last year in school");
        isValid = false;
	}
	else if(!lastYearInSchool.match(numbers)){
		$('.featured').css('display','block');
		$('.featured').html("Last year in school cannot contain letter or special characters");
        isValid = false;
	}
	else if(lastYearInSchool.length < 4 || lastYearInSchool.length > 4){
		$('.featured').css('display','block');
		$('.featured').html("Last year in school input must be 4 digits");
        isValid = false;
	}
	else if(lastYearInSchool < 1995){
        $('.featured').css('display','block');
        $('.featured').html("Last year in school is less than 1995 this is not accepted");
        isValid = false;
    }
    else if(lastYearInSchool > 2014){
        $('.featured').css('display','block');
        $('.featured').html("Last year in school cannot be greater than current year");
        isValid = false;
    }
	else if(intake == ""){
		$('.featured').css('display','block');
		$('.featured').html("Please enter student intake code");
        isValid = false;
	}
	else if(!intake.match(numbers)){
		$('.featured').css('display','block');
		$('.featured').html("Intake code cannot contain letter, Numbers Only");
        isValid = false;
	}
	else if(intake.length < 6 || intake.length > 6){
		$('.featured').css('display','block');
		$('.featured').html("Intake code must be 6 digits");
        isValid = false;
	}
	else if(department == ""){
		$('.featured').css('display','block');
		$('.featured').html("Please select department name");
        isValid = false;
	}
	else if(course == ""){
		$('.featured').css('display','block');
		$('.featured').html("Please select programme name");
        isValid = false;
	}
    else if(isValid == true){
	openModal();
	var vars = "txtIC="+ic+"&txtCourse="+course+"&txtFirstname="+firstname+"&txtOtherNames="+lastname+"&txtNationailty="+nationality+"&txtGender="+gender+"&txtDay="+day+"&txtMonth="+month+"&txtYear="+year+"&txtLastyear="+lastYearInSchool+"&txtIntake="+intake+"&txtDepartment="+department+"&parseStudentStepOne=one";
	var hr = ajaxObj("POST", "model/parser.php", true);
	
	setTimeout(function(){
		hr.onreadystatechange = function(){		
		if(ajaxReturn(hr)== true){
			closeModal();
			var data = hr.responseText;
				if(data == 'good'){
					$('#personalInfo').slideUp("slow");
					$('#success').css("display", "block");
					$('.featured').css('display','block');
					$('.featured').css("color","#83ba3c");
					$('.featured').html("Completed step 1 successfully, please continue with enrollment");
					$('#contact_info').css("display", "block");
					$('#success').fadeOut(5000);
					$('.featured').fadeOut(5000);
				}
				else{
                    $('.featured').css('display','block');
					$('.featured').css("color","#F00");
					$('.featured').html(data);
				}
		}
	}
	hr.send(vars);
	},2000);
    }
}

function parseContactInfo(){
    var isValid = true;
	var fullname = document.getElementById("txtFullname").value;
	var email = document.getElementById("txtEmail").value;
	var phone = document.getElementById("txtPhone").value;
	var address = document.getElementById("txtAddress").value;
	var occupation = document.getElementById("txtOccupation").value;
	var nphone = document.getElementById("txtNextofkinphone").value;
	
	var letters = /^[A-Z a-z]+$/; 
	var numbers = /^[0-9]+$/; 
	var atpos=email.indexOf("@");
	var dotpos=email.lastIndexOf(".");
	$('.featured').css("color","#F00");
	
	if(email == ""){
		$('.featured').css('display','block');
		$('.featured').html("Please enter student's email address");
        isValid = false;
	}
	else if(atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length){
		$('.featured').css('display','block');
		$('.featured').html(email + " is not a valid email address");
        isValid = false;
	}	
	else if(phone == ""){
		$('.featured').css('display','block');
		$('.featured').html("Please enter student's phone number");
        isValid = false;
	}
	else if(!phone.match(numbers)){
		$('.featured').css('display','block');
		$('.featured').html("Phone number cannot contain letters, Numbers Only");
        isValid = false;
	}
	else if(phone.length < 10){
		$('.featured').css('display','block');
		$('.featured').html("Phone number cannot be less than 3 letters");
        isValid = false;
	}
	else if(address.trim() == ""){
		$('.featured').css('display','block');
		$('.featured').html("Please enter student permanent house address");
        isValid = false;
	}
	else if(address.length < 10){
		$('.featured').css('display','block');
		$('.featured').html("Permanent house address is too short");
        isValid = false;
	}	
	else if(fullname == ""){
		$('.featured').css('display','block');
		$('.featured').html("Please enter next of kin fullname");
        isValid = false;
	}
	else if(!fullname.match(letters)){
		$('.featured').css('display','block');
		$('.featured').html("Next of kin name Field cannot contain numbers or special characters");
        isValid = false;
	}
	else if(fullname.length < 3){
		$('.featured').css('display','block');
		$('.featured').html("Next of kin name cannot be less than 3 letters");
        isValid = false;
	}
	else if(occupation == ""){
		$('.featured').css('display','block');
		$('.featured').html("Please enter next of kin ocuppation");
        isValid = false;
	}
	else if(!occupation.match(letters)){
		$('.featured').css('display','block');
		$('.featured').html("Next of kin ocuppation cannot contain numbers or special characters");
        isValid = false;
	}
	else if(occupation.length < 3){
		$('.featured').css('display','block');
		$('.featured').html("Next of kin occupation field, cannot contain less than 3 letters");
        isValid = false;
	}
	else if(nphone == ""){
		$('.featured').css('display','block');
		$('.featured').html("Please enter next of kin phone number");
        isValid = false;
	}
	else if(!nphone.match(numbers)){
		$('.featured').css('display','block');
		$('.featured').html("Next of kin phone number cannot contain letters, Numbers Only");
        isValid = false;
	}
	else if(nphone.length < 10){
		$('.featured').css('display','block');
		$('.featured').html("Next of kin phone number cannot be less than 10 numbers");
        isValid = false;
	}
    else if(isValid == true){
	openModal();
	var vars = "txtFullname="+fullname+"&txtEmail="+email+"&txtPhone="+phone+"&txtAddress="+address+"&txtOccupation="+occupation+"&txtNextofkinphone="+nphone+"&parseStudentStepTwo=two";
	
	var hr = ajaxObj("POST", "model/parser.php", true);
	
	setTimeout(function(){
		hr.onreadystatechange = function(){		
		if(ajaxReturn(hr)== true){
			closeModal();
			var data = hr.responseText;
			if(data == 'good'){
					$('#contact_info').slideUp("slow");
					$('#success').css("display", "block");
					$('.featured').css('display','block');
					$('.featured').css("color","#83ba3c");
					$('.featured').html("Operation was successful, student has been enrolled"+
                        "<a style='float: right;' href='enroll_student'> Enroll Next</a>");
				}
				else{
                    $('.featured').css('display','block');
					$('.featured').css("color","#F00");
					$('.featured').html(data);
				}
		}
	}
	hr.send(vars);	
		
		},3000);
    }
}

function updateStudent(){
    var isValid = true;
    var ic = document.getElementById("txtIC").value;
    var firstname = document.getElementById("txtFirstname").value;
    var lastname = document.getElementById("txtOtherNames").value;
    var nationality = document.getElementById("txtNationailty").value;
    var gender = document.getElementById("txtGender").value;
    var status = document.getElementById("txtStatus").value;
    var lastYearInSchool = document.getElementById("txtLastyear").value;
    var intake = document.getElementById("txtIntake").value;
    var department = document.getElementById("txtDepartment").value;
    var course = document.getElementById("txtCourse").value;
    var fullname = document.getElementById("txtFullname").value;
    var email = document.getElementById("txtEmail").value;
    var phone = document.getElementById("txtPhone").value;
    var address = document.getElementById("txtAddress").value;
    var occupation = document.getElementById("txtOccupation").value;
    var nphone = document.getElementById("txtNextofkinphone").value;

    var letters = /^[A-Z a-z]+$/;
    var numbers = /^[0-9]+$/;
    var atpos=email.indexOf("@");
    var dotpos=email.lastIndexOf(".");
    $('.featured').css("color","#F00");

    if(firstname == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter Student's fistname");
        isValid = false;
    }
    else if(!firstname.match(letters)){
        $('.featured').css('display','block');
        $('.featured').html("Students firstname cannot contain number or special characters");
        isValid = false;
    }
    else if(firstname.length < 3){
        $('.featured').css('display','block');
        $('.featured').html("Students firstname cannot be less than 3 characters");
        isValid = false;
    }
    else if(lastname == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter students other names");
        isValid = false;
    }
    else if(!lastname.match(letters)){
        $('.featured').css('display','block');
        $('.featured').html("Students other names cannot contain number or special characters");
        isValid = false;
    }
    else if(lastname.length < 3){
        $('.featured').css('display','block');
        $('.featured').html("Students other names cannot be less than 3 characters");
        isValid = false;
    }
    else if(nationality == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter student's nationality");
        isValid = false;
    }
    else if(!nationality.match(letters)){
        $('.featured').css('display','block');
        $('.featured').html("Nationality cannot contain number or special characters");
        isValid = false;
    }
    else if(nationality.length < 2){
        $('.featured').css('display','block');
        $('.featured').html("Nationality cannot be less than 2 characters");
        isValid = false;
    }
    else if(lastYearInSchool == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter student's last year in school");
        isValid = false;
    }
    else if(!lastYearInSchool.match(numbers)){
        $('.featured').css('display','block');
        $('.featured').html("Last year in school cannot contain letter or special characters");
        isValid = false;
    }
    else if(lastYearInSchool.length < 4 || lastYearInSchool.length > 4){
        $('.featured').css('display','block');
        $('.featured').html("Last year in school input must be 4 digits");
        isValid = false;
    }
    else if(lastYearInSchool < 1995){
        $('.featured').css('display','block');
        $('.featured').html("Last year in school is less than 1995 this is not accepted");
        isValid = false;
    }
    else if(lastYearInSchool > 2014){
        $('.featured').css('display','block');
        $('.featured').html("Last year in school cannot be greater than current year");
        isValid = false;
    }
    else if(intake == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter student intake code");
        isValid = false;
    }
    else if(!intake.match(numbers)){
        $('.featured').css('display','block');
        $('.featured').html("Intake code cannot contain letter, Numbers Only");
        isValid = false;
    }
    else if(intake.length < 6 || intake.length > 6){
        $('.featured').css('display','block');
        $('.featured').html("Intake code must be 6 digits");
        isValid = false;
    }
    if(email == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter student's email address");
        isValid = false;
    }
    else if(atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length){
        $('.featured').css('display','block');
        $('.featured').html(email + " is not a valid email address");
        isValid = false;
    }
    else if(phone == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter student's phone number");
        isValid = false;
    }
    else if(!phone.match(numbers)){
        $('.featured').css('display','block');
        $('.featured').html("Phone number cannot contain letters, Numbers Only");
        isValid = false;
    }
    else if(phone.length < 10){
        $('.featured').css('display','block');
        $('.featured').html("Phone number cannot be less than 3 letters");
        isValid = false;
    }
    else if(address.trim() == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter student permanent house address");
        isValid = false;
    }
    else if(address.length < 10){
        $('.featured').css('display','block');
        $('.featured').html("Permanent house address is too short");
        isValid = false;
    }
    else if(fullname == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter next of kin fullname");
        isValid = false;
    }
    else if(!fullname.match(letters)){
        $('.featured').css('display','block');
        $('.featured').html("Next of kin name Field cannot contain numbers or special characters");
        isValid = false;
    }
    else if(fullname.length < 3){
        $('.featured').css('display','block');
        $('.featured').html("Next of kin name cannot be less than 3 letters");
        isValid = false;
    }
    else if(occupation == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter next of kin ocuppation");
        isValid = false;
    }
    else if(!occupation.match(letters)){
        $('.featured').css('display','block');
        $('.featured').html("Next of kin ocuppation cannot contain numbers or special characters");
        isValid = false;
    }
    else if(occupation.length < 3){
        $('.featured').css('display','block');
        $('.featured').html("Next of kin occupation field, cannot contain less than 3 letters");
        isValid = false;
    }
    else if(nphone == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter next of kin phone number");
        isValid = false;
    }
    else if(!nphone.match(numbers)){
        $('.featured').css('display','block');
        $('.featured').html("Next of kin phone number cannot contain letters, Numbers Only");
        isValid = false;
    }
    else if(nphone.length < 10){
        $('.featured').css('display','block');
        $('.featured').html("Next of kin phone number cannot be less than 10 numbers");
        isValid = false;
    }
    else if(isValid == true){
        openModal();
        var vars = "txtIC="+ic+"&txtCourse="+course+"&txtFirstname="+firstname+
            "&txtOtherNames="+lastname+"&txtNationailty="+nationality+"&txtGender="+gender+
            "&txtStatus="+status+"&txtFullname="+fullname+"&txtEmail="+email+"&txtPhone="+phone+
            "&txtLastyear="+lastYearInSchool+"&txtIntake="+intake+
            "&txtDepartment="+department+
            "&txtAddress="+address+"&txtOccupation="+occupation+
            "&txtNextofkinphone="+nphone+"&parseStudentUpdate=final";

        var hr = ajaxObj("POST", "model/parser.php", true);

        setTimeout(function(){
            hr.onreadystatechange = function(){
                if(ajaxReturn(hr)== true){
                    closeModal();
                    var data = hr.responseText;
                    if(data == 'good'){
                        $('#personalInfo').slideUp("slow");
                        $('#success').css("display", "block");
                        $('.featured').css('display','block');
                        $('.featured').css("color","#83ba3c");
                        $('.featured').html("Operation was successful, Student Record has been updated"+
                            "<a style='float: right;' href='manage_user'> Manage User</a>");
                    }
                    else{
                        $('.featured').css('display','block');
                        $('.featured').css("color","#F00");
                        $('.featured').html(data);
                    }
                }
            }
            hr.send(vars);

        },1000);
    }
}

//==========ENROLL STUDENT PARSE END =======//

//===========ADD LECTURERE==================//
function parseLecturer(){
    var isValid = true;
    var ic = document.getElementById("txtIC").value;
    var firstname = document.getElementById("txtFirstname").value;
    var lastname = document.getElementById("txtOtherNames").value;
    var nationality = document.getElementById("txtNationailty").value;
    var gender = document.getElementById("txtGender").value;
    var designation = document.getElementById("txtDesignation").value;
    var qualification = document.getElementById("txtQualification").value;
    var department = document.getElementById("txtDepartment").value;
    var course = document.getElementById("txtCourse").value;

    var letters = /^[A-Z a-z]+$/;
    var numbers = /^[0-9]+$/;

    if(ic == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter a valid passport number");
        isValid = false;
    }
    else if(ic.length < 9){
        $('.featured').css('display','block');
        $('.featured').html("Passport Number cannot be less than 9 alphanumeric characters");
        isValid = false;
    }
    else if(firstname == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter Lecturer's fistname");
        isValid = false;
    }
    else if(!firstname.match(letters)){
        $('.featured').css('display','block');
        $('.featured').html("Lecturers firstname cannot contain number or special characters");
        isValid = false;
    }
    else if(firstname.length < 3){
        $('.featured').css('display','block');
        $('.featured').html("Lecturers firstname cannot be less than 3 characters");
        isValid = false;
    }
    else if(lastname == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter Lecturers other names");
        isValid = false;
    }
    else if(!lastname.match(letters)){
        $('.featured').css('display','block');
        $('.featured').html("Lecturers other names cannot contain number or special characters");
        isValid = false;
    }
    else if(lastname.length < 3){
        $('.featured').css('display','block');
        $('.featured').html("Lecturers other names cannot be less than 3 characters");
        isValid = false;
    }
    else if(nationality == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter Lecturer's nationality");
        isValid = false;
    }
    else if(!nationality.match(letters)){
        $('.featured').css('display','block');
        $('.featured').html("Nationality cannot contain number or special characters");
        isValid = false;
    }
    else if(nationality.length < 2){
        $('.featured').css('display','block');
        $('.featured').html("Nationality cannot be less than 2 characters");
         isValid = false;
    }
    else if(gender == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please select gender");
        isValid = false;
    }
    else if(qualification == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter Lecturer's qualification");
        isValid = false;
    }
    else if(!qualification.match(letters)){
        $('.featured').css('display','block');
        $('.featured').html("Lecturer's Qualification Field cannot contain numbers or special characters");
        isValid = false;
    }
    else if(qualification.length < 6 ){
        $('.featured').css('display','block');
        $('.featured').html("Input value is too short for Lecturer's Qualification, minimum is 6");
        isValid = false;
    }
    else if(designation == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter Lecturer's designation");
        isValid = false;
    }
    else if(!designation.match(letters)){
        $('.featured').css('display','block');
        $('.featured').html("Lecturer's Designation Field cannot contain numbers or special characters");
        isValid = false;
    }
    else if(designation.length < 6 ){
        $('.featured').css('display','block');
        $('.featured').html("Input value is too short for Lecturer's Designation, minimum is 6");
         isValid = false;
    }
    else if(department == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please select department name");
         isValid = false;
    }
    else if(course == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please select programme name");
        isValid = false;
    }else if(isValid == true){
        openModal();
        var vars = "txtIC="+ic+"&txtFirstname="+firstname+"&txtOtherNames="+lastname+"&txtNationailty="+nationality+"&txtGender="+gender+"&txtDesignation="+designation+"&txtQualification="+qualification+"&txtDepartment="+department+"&txtCourse="+course+"&parseLecturerStepOne=one";
        var hr = ajaxObj("POST", "model/parser.php", true);

        setTimeout(function(){
            hr.onreadystatechange = function(){
                if(ajaxReturn(hr)== true){
                    closeModal();
                    var data = hr.responseText;
                    if(data == 'good'){
                        $('#personalInfo').slideUp("slow");
                        $('#success').css("display", "block");
                        $('.featured').css('display','block');
                        $('.featured').css("color","#83ba3c");
                        $('.featured').html("Completed step 1 successfully, please continue");
                        $('#contact_info').css("display", "block");
                        $('#success').fadeOut(5000);
                        $('.featured').fadeOut(5000);
                    }
                    else{
                        $('.featured').css('display','block');
                        $('.featured').css("color","#F00");
                        $('.featured').html(data);
                    }
                }
            }
            hr.send(vars);
        },2000);
    }
}

function parseContact(){
    var isValid = true;
    var email = document.getElementById("txtEmail").value;
    var phone = document.getElementById("txtPhone").value;
    var address = document.getElementById("txtAddress").value;

    var letters = /^[A-Z a-z]+$/;
    var numbers = /^[0-9]+$/;
    var atpos=email.indexOf("@");
    var dotpos=email.lastIndexOf(".");
    $('.featured').css("color","#F00");

    if(email == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter lecturer's email address");
        isValid = false;
    }
    else if(atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length){
        $('.featured').css('display','block');
        $('.featured').html(email + " is not a valid email address");
        isValid = false;
    }
    else if(phone == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter lecturer's phone number");
        isValid = false;
    }
    else if(!phone.match(numbers)){
        $('.featured').css('display','block');
        $('.featured').html("Phone number cannot contain letters, Numbers Only");
        isValid = false;
    }
    else if(phone.length < 10){
        $('.featured').css('display','block');
        $('.featured').html("Phone number cannot be less than 10 digits");
        isValid = false;
    }
    else if(address.trim() == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter lecturer's permanent house address");
        isValid = false;
    }
    else if(address.length < 10){
        $('.featured').css('display','block');
        $('.featured').html("Permanent house address is too short");
        isValid = false;
    }else if(isValid == true){
    openModal();
    var vars = "txtEmail="+email+"&txtPhone="+phone+"&txtAddress="+address+"&parseLecturerStepTwo=two";
    var hr = ajaxObj("POST", "model/parser.php", true);

    setTimeout(function(){
        hr.onreadystatechange = function(){
            if(ajaxReturn(hr)== true){
                closeModal();
                var data = hr.responseText;
                if(data == 'good'){
                    $('#contact_info').slideUp("slow");
                    $('#success').css("display", "block");
                    $('.featured').css('display','block');
                    $('.featured').css("color","#83ba3c");
                    $('.featured').html("Operation was successful, lecturer has been enrolled in the system"+
                        "<a style='float: right;' href='add_lecturer'> Add Next</a>");
                }
                else{
                    $('.featured').css('display','block');
                    $('.featured').css("color","#F00");
                    $('.featured').html(data);
                }
            }
        }
        hr.send(vars);
    },3000);
   }
}
//=========== ADD LECTURERE END ==================//

//===========ADMIN UPDATE LECTURER START==================//
function updateLecturer(){
    var isValid = true;
    var ic = document.getElementById("txtIC").value;
    var firstname = document.getElementById("txtFirstname").value;
    var lastname = document.getElementById("txtOtherNames").value;
    var nationality = document.getElementById("txtNationailty").value;
    var gender = document.getElementById("txtGender").value;
    var status = document.getElementById("txtStatus").value;
    var designation = document.getElementById("txtDesignation").value;
    var qualification = document.getElementById("txtQualification").value;
    var department = document.getElementById("txtDepartment").value;
    var course = document.getElementById("txtCourse").value;
    var email = document.getElementById("txtEmail").value;
    var phone = document.getElementById("txtPhone").value;
    var address = document.getElementById("txtAddress").value;

    var letters = /^[A-Z a-z]+$/;
    var numbers = /^[0-9]+$/;
    var atpos=email.indexOf("@");
    var dotpos=email.lastIndexOf(".");
    $('.featured').css("color","#F00");

    if(firstname == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter Lecturer's fistname");
        isValid = false;
    }
    else if(!firstname.match(letters)){
        $('.featured').css('display','block');
        $('.featured').html("Lecturers firstname cannot contain number or special characters");
        isValid = false;
    }
    else if(firstname.length < 3){
        $('.featured').css('display','block');
        $('.featured').html("Lecturers firstname cannot be less than 3 characters");
        isValid = false;
    }
    else if(lastname == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter Lecturers other names");
        isValid = false;
    }
    else if(!lastname.match(letters)){
        $('.featured').css('display','block');
        $('.featured').html("Lecturers other names cannot contain number or special characters");
        isValid = false;
    }
    else if(lastname.length < 3){
        $('.featured').css('display','block');
        $('.featured').html("Lecturers other names cannot be less than 3 characters");
        isValid = false;
    }
    else if(nationality == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter Lecturer's nationality");
        isValid = false;
    }
    else if(!nationality.match(letters)){
        $('.featured').css('display','block');
        $('.featured').html("Nationality cannot contain number or special characters");
        isValid = false;
    }
    else if(nationality.length < 2){
        $('.featured').css('display','block');
        $('.featured').html("Nationality cannot be less than 2 characters");
        isValid = false;
    }
    else if(qualification == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter Lecturer's qualification");
        isValid = false;
    }
    else if(!qualification.match(letters)){
        $('.featured').css('display','block');
        $('.featured').html("Lecturer's Qualification Field cannot contain numbers or special characters");
        isValid = false;
    }
    else if(qualification.length < 6 ){
        $('.featured').css('display','block');
        $('.featured').html("Input value is too short for Lecturer's Qualification, minimum is 6");
        isValid = false;
    }
    else if(designation == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter Lecturer's designation");
        isValid = false;
    }
    else if(!designation.match(letters)){
        $('.featured').css('display','block');
        $('.featured').html("Lecturer's Designation Field cannot contain numbers or special characters");
        isValid = false;
    }
    else if(designation.length < 6 ){
        $('.featured').css('display','block');
        $('.featured').html("Input value is too short for Lecturer's Designation, minimum is 6");
        isValid = false;
    }
    else if(email == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter lecturer's email address");
        isValid = false;
    }
    else if(atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length){
        $('.featured').css('display','block');
        $('.featured').html(email + " is not a valid email address");
        isValid = false;
    }
    else if(phone == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter lecturer's phone number");
        isValid = false;
    }
    else if(!phone.match(numbers)){
        $('.featured').css('display','block');
        $('.featured').html("Phone number cannot contain letters, Numbers Only");
        isValid = false;
    }
    else if(phone.length < 10){
        $('.featured').css('display','block');
        $('.featured').html("Phone number cannot be less than 10 digits");
        isValid = false;
    }
    else if(address.trim() == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter lecturer's permanent house address");
        isValid = false;
    }
    else if(address.length < 10){
        $('.featured').css('display','block');
        $('.featured').html("Permanent house address is too short");
        isValid = false;
    }else if(isValid == true){
        openModal();
        var vars = "txtIC="+ic+"&txtFirstname="+firstname+"&txtOtherNames="+lastname+
          "&txtNationailty="+nationality+"&txtGender="+gender+"&txtDesignation="+designation+
            "&txtQualification="+qualification+"&txtDepartment="+department+
            "&txtCourse="+course+"&txtEmail="+email+"&txtPhone="+phone+"&txtAddress="
            +address+"&txtStatus="+status+"&parseLecturerUpdate=final";

        var hr = ajaxObj("POST", "model/parser.php", true);

        setTimeout(function(){
            hr.onreadystatechange = function(){
                if(ajaxReturn(hr)== true){
                    closeModal();
                    var data = hr.responseText;
                    if(data == 'good'){
                        $('#personalInfo').slideUp("slow");
                        $('#success').css("display", "block");
                        $('.featured').css('display','block');
                        $('.featured').css("color","#83ba3c");
                        $('.featured').html("Operation was successful, Lecturer Record has been updated"+
                            "<a style='float: right;' href='manage_user'> Manage User</a>");
                    }
                    else{
                        $('.featured').css('display','block');
                        $('.featured').css("color","#F00");
                        $('.featured').html(data);
                    }
                }
            }
            hr.send(vars);
        },1000);
    }
}
//===========ADMIN UPDATE LECTURER END==================//

function parseUpdateDue(){
    var isValid = true;
    var ic = document.getElementById("txtIC").value;
    var amountDue = document.getElementById("txtAmountDue").value;
    var amountPaid = document.getElementById("txtAmountPaid").value;
    var balance = document.getElementById("txtBalance").value;

    var numbers = /^[0-9.]+$/;
    $('.featured').css("color","#F00");

    if(ic == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter Students Passport Number");
        isValid = false;
    }
    else if(amountDue == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter Total Amount Due");
        isValid = false;
    }
    else if(!amountDue.match(numbers)){
        $('.featured').css('display','block');
        $('.featured').html("Amount due Field cannot contain letters, Numbers Only");
        isValid = false;
    }
    else if(amountDue.length < 5){
        $('.featured').css('display','block');
        $('.featured').html("Amount due cannot be less than 5 digits");
        isValid = false;
    }
    else if(amountDue <= 0){
        $('.featured').css('display','block');
        $('.featured').html("Invalid Amount, amount due cannot be 0");
        isValid = false;
    }
    else if(amountPaid == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter Total Amount Paid");
        isValid = false;
    }
    else if(!amountPaid.match(numbers)){
        $('.featured').css('display','block');
        $('.featured').html("Amount Paid Field cannot contain letters, Numbers Only");
        isValid = false;
    }
    else if(amountPaid.length < 4){
        $('.featured').css('display','block');
        $('.featured').html("Amount paid cannot be less than 4 digits");
        isValid = false;
    }
    else if(amountPaid <= 0){
        $('.featured').css('display','block');
        $('.featured').html("Invalid Amount, amount due cannot be 0");
        isValid = false;
    }
    else if(balance == ""){
        $('.featured').css('display','block');
        $('.featured').html("Operation cannot continue, please check amount paid field");
        isValid = false;
    }
    else if(balance < 0){
        $('.featured').css('display','block');
        $('.featured').html("Balance Amount cannot be less than 0");
        isValid = false;
    }
    else if(isValid == true){
        openModal();
        var vars = "txtIC="+ic+"&txtAmountDue="+amountDue+"&txtAmountPaid="+amountPaid+
            "&txtBalance="+balance+"&addDues=paid";

        var hr = ajaxObj("POST", "model/parser.php", true);
        setTimeout(function(){
            hr.onreadystatechange = function(){
                if(ajaxReturn(hr)== true){
                    closeModal();
                    var data = hr.responseText;
                    if(data == 'good'){
                        $('#personalInfo').slideUp("slow");
                        $('#success').css("display", "block");
                        $('.featured').css('display','block');
                        $('.featured').css("color","#83ba3c");
                        $('.featured').html("Student Financial Record has been updated"+
                            "<a style='float: right;' href='update_dues'> Update Next</a>");
                    }
                    else{
                        $('.featured').css('display','block');
                        $('.featured').css("color","#F00");
                        $('.featured').html(data);
                    }
                }
            }
            hr.send(vars);
        },1000);
    }
}

function parseSemesterRegistration(){
    var isValid = true;
    var ic = document.getElementById("txtIC").value;
    var firstname = document.getElementById("txtFirstname").value;
    var matric= document.getElementById("txtMatric").value;
    var osDues = document.getElementById("txtOustandingDue").value;
    var semester = document.getElementById("txtSemester").value;
    var academicYear = document.getElementById("txtAcademicYear").value;
    var course = document.getElementById("txtCourse").value;
    var selectedValues = [];
    $("#txtModules :selected").each(function(){
        selectedValues.push($(this).val());
    });

    if(semester == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please select semeter for which registration is been done.");
        isValid = false;
    }
    else if(selectedValues.length == 0){
        $('.featured').css('display','block');
        $('.featured').html("Please select modules from the drop down list.");
        isValid = false;
    }
    else if(academicYear == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please select academic year.");
        isValid = false;
    }
    else if(isValid == true){
        openModal();
        var vars = "txtIC="+ic+"&txtFirstname="+firstname+"&txtMatric="+matric+
            "&txtOustandingDue="+osDues+"&txtSemester="+semester+
            "&txtAcademicYear="+academicYear+"&txtCourse="+course+
            "&txtModules="+selectedValues+"&parseSemester=complete";

        var hr = ajaxObj("POST", "model/parser.php", true);
        setTimeout(function(){
            hr.onreadystatechange = function(){
                if(ajaxReturn(hr)== true){
                    closeModal();
                    var data = hr.responseText;
                    if(data == 'good'){
                        $('#contact_info').slideUp("slow");
                        $('#success').css("display", "block");
                        $('.featured').css('display','block');
                        $('.featured').css("color","#83ba3c");
                        $('.featured').html("Semester registration completed successfully"+
                            "<a style='float: right;' href='semester_registration'> Next</a>");
                    }
                    else{
                        $('.featured').css('display','block');
                        $('.featured').css("color","#F00");
                        $('.featured').html(data);
                    }
                }
            }
            hr.send(vars);
        },1000);
    }
}

function getExtension(filename) {
    var parts = filename.split('.');
    return parts[parts.length - 1];
}

function isImage(filename) {
    var ext = getExtension(filename);
    switch (ext.toLowerCase()) {
        case 'jpg':
        case 'gif':
        case 'bmp':
        case 'png':
        return true;
    }
    return false;
}

function isDoc(filename) {
    var ext = getExtension(filename);
    switch (ext.toLowerCase()) {
        case 'docx':
        case 'doc':
        case 'pdf':
        return true;
    }
    return false;
}

function isMp4(filename) {
    var ext = getExtension(filename);
    switch (ext.toLowerCase()) {
        case 'mp4':
        return true;
    }
    return false;
}

function isOgv(filename) {
    var ext = getExtension(filename);
    switch (ext.toLowerCase()) {
        case 'ogv':
            return true;
    }
    return false;
}


//==========LOGIN PARSE START=======//
function login(){		
		var passnum = $("#pw").val();
		var usernum = $("#username").val();
		
		if(passnum.length > 1 && usernum.length > 2) {
			var vars = "username="+usernum+"&pw="+passnum;
			var hr = ajaxObj("POST", "model/loginParse.php", true);
			
			hr.onreadystatechange = function(){		
				if(ajaxReturn(hr) == true){
					var data = hr.responseText;
						if(data != 'Invalid username or password'){
							window.location.href = "index"+data;
						}else{
							$('#loading').css("color","#F00");
							$('#loading').css("padding-left","5px");
							$('#loading').html(data);
						}
				}
			}
	   		hr.send(vars);
	   }	
}

//==========LOGIN PARSE END=======//
