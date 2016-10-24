
function initAll(){
	document.getElementById("close").onclick = function(){
		var target = document.getElementById("request");
		target.style.transition = "right 0.7s ease-in-out 0s";
		target.style.right = "-452px";
	}
	//call image rotator function
	rotate();
	//call retrieve password function
	retrivePassword();
}

function deleteItem(theID, tablename) {
    var delete_id = theID
    var table = tablename;
    if (confirm("Are you sure you want to delete this item?")) {
        $.get('model/parser.php', {itemdelete:delete_id, tablenames:table}, function(data){
            $('.success').html(data);
            $('.success').fadeOut(8000);
        });
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

function getExam(){
    var modules = document.getElementById('txtExamModules').value;
    var exam = document.getElementById('examDiv');
    $.post('model/parser.php', {txtExamModules:modules}, function(data){
        exam.innerHTML = data;
    });
}

function displayRequestForm(){
	var main = document.getElementById("mainContent");
	var target = document.getElementById("request");
	var width = window.innerWidth;
	
	if(width <= 600){
		target.style.transition = "right 0.7s ease-in-out 0s";
		target.style.right = "-452px";
	}
	else if((window.pageYOffset + window.innerHeight) >= main.offsetHeight){
		target.style.transition = "right 0.7s ease-in-out 0s";
		target.style.right = "0px";
	}else{
		target.style.transition = "right 0.7s ease-in-out 0s";
		target.style.right = "-452px";	
	}
}

function parseAnswer(){
    var question1 = $("#question1Answer").val();
    var semesterCode = $("#txtSemester").val();
    var question2 = $("#question2Answer").val();
    var question3 = $("#question3Answer").val();
    var question5 = $("#question5Answer").val();
    var course = $("#txtCourse").val();
    var module = $("#txtModules").val();
    var examCode = $("#txtExamCode").val();

    openModal();
    var vars = "txtExamCode="+examCode+"&question1Answer="+question1+"&txtSemester="+semesterCode+"&question2Answer="+question2+"&question3Answer="+question3+"&question5Answer="+question5+"&txtCourse="+course+"&txtModules="+module+"&parseSumit=yes";
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
                    $('.featured').html("You have successfully completed the " +module + " exam." +
                        "<a style='float: right;' href='content'> Go to Class</a>");
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

//Forgot Password Mechanism
function openForgot(){
	element = document.getElementById('forgotPassword');
	closepassword = document.getElementById('closepassword');
	if(closepassword.style.display = "block"){
		closepassword.style.display = "none";
		element.style.display = "block";
	}
}

function retrivePassword(){
	$("#uemail").keyup(function() {
		var uemail = $("#uemail").val();
		$.post('model/passwordParse.php', {uemail:uemail}, function(data){		
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

function _(x){
    return document.getElementById(x);
}
function toggleElement(x){
    var x = _(x);
    if(x.style.display == 'block'){
        x.style.display = 'none';
    }else{
        x.style.display = 'block';
    }
}

function toggleElements(x, opt){
    var x = _(x);
    var opt = opt;
    if(x.style.display == 'block'){
        x.style.display = 'none';
        if(opt == "twitter"){
            var option = document.getElementById('statcloses');
            option.innerHTML = "Load Twitter Widget";
        }else if(opt == "stats"){
            var option = document.getElementById('statclose');
            option.innerHTML = "View Site Statistics";
        }
    }else{
        x.style.display = 'block';
        if(opt == "twitter"){
            var option = document.getElementById('statcloses');
            option.innerHTML = "Hide Load Widget Form";
        }else if(opt == "stats"){
            var option = document.getElementById('statclose');
            option.innerHTML = "Hide Site Statistics";
        }
    }
}

//Image rotator function
function rotate(){	
	//get the image and description box
	var imageshow = document.getElementById('staff_desc');
	var descshow = document.getElementById('desc');
	
	var imageArray = ["images/zahinade.jpg", "images/riyaza.jpg"];
	var desc = ["Mr. Zainudin Johari, Head School of Engineering & Computing Sciences", "Riyaz Ahmed, Programme Leader, Engineering & Computing Sciences "];
	//set the index of the array to zero			  
	var imageIndex = 0;
	var descIndex = 0;
	
	function rotateImage(){
		imageshow.setAttribute("src", imageArray[imageIndex]);
		descshow.innerHTML = desc[descIndex];
		imageIndex++;
		descIndex++;

		
		if(imageIndex >= imageArray.length && descIndex >= desc.length){
			imageIndex = 0;
			descIndex = 0;	
		}
	}
	intervar = setInterval(rotateImage, 5000);
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

function request(){
	var firstname = document.getElementById("firstname").value;
	var email = document.getElementById("email").value;
	var course = document.getElementById("course").value;
	var lastname = document.getElementById("lastname").value;
	var phone = document.getElementById("phone").value;
	var town = document.getElementById("town").value;
	var country = document.getElementById("country").value;
	var work = document.getElementById("work").value;
	var age = document.getElementById("age").value;
	
	var letters = /^[A-Z a-z]+$/;
	var numbers = /^[0-9]+$/; 
	var atpos=email.indexOf("@");
	var dotpos=email.lastIndexOf(".");
	
	if(course == ""){
		document.getElementById("results").style.display = "block";
		$('#results').html("Please select course of interest");
		return false;
	}
	else if(firstname == ""){
		document.getElementById("results").style.display = "block";
		$('#results').html("Please Enter Firstname");
		return false;
	}
	else if(!firstname.match(letters)){
		document.getElementById("results").style.display = "block";
		$('#results').html("Firstname Field cannot contain numbers, Letters Only");
		return false;
	}
	else if(firstname.length < 3){
		document.getElementById("results").style.display = "block";
		$('#results').html("Firstname cannot be less than 3 letters");
		return false;
	}
	else if(lastname == ""){
		document.getElementById("results").style.display = "block";
		$('#results').html("Please Enter Lastname");
		return false;
	}
	else if(!lastname.match(letters)){
		document.getElementById("results").style.display = "block";
		$('#results').html("Lastname Field cannot contain numbers, Letters Only");
		return false;
	}
	else if(lastname.length < 3){
		document.getElementById("results").style.display = "block";
		$('#results').html("Lastname cannot be less than 3 letters");
		return false;
	}
	else if(email == ""){
		document.getElementById("results").style.display = "block";
		$('#results').html("Please Enter Email Address");
		return false;
	}
	else if(atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length){
		document.getElementById("results").style.display = "block";
		$('#results').html("Email Address is not valid");
		return false;
	}
	
	else if(phone == ""){
		document.getElementById("results").style.display = "block";
		$('#results').html("Please Enter Phone Number");
		return false;
	}
	else if(!phone.match(numbers)){
		document.getElementById("results").style.display = "block";
		$('#results').html("Phone number cannot contain letters, Numbers Only");
		return false;
	}
	else if(phone.length < 10){
		document.getElementById("results").style.display = "block";
		$('#results').html("Phone Number cannot be less than 3 letters");
		return false;
	}
	else if(town == ""){
		document.getElementById("results").style.display = "block";
		$('#results').html("Please Enter Your City");
		return false;
	}
	else if(!town.match(letters)){
		document.getElementById("results").style.display = "block";
		$('#results').html("Town Field cannot contain numbers, Letters Only");
		return false;
	}
	if(country == ""){
		document.getElementById("results").style.display = "block";
		$('#results').html("Please select country");
		return false;
	}
	if(work == ""){
		document.getElementById("results").style.display = "block";
		$('#results').html("Please select years of work experience");
		return false;
	}
	if(age == ""){
		document.getElementById("results").style.display = "block";
		$('#results').html("Please select age range");
		return false;
	}
	
	openModal();
	var vars = "course="+course+"&firstname="+firstname+"&lastname="+lastname+"&email="+email+"&phone="+phone+"&town="+town+"&country="+country+"&work="+work+"&age="+age;
	
	var hr = ajaxObj("POST", "model/parser.php", true);
	
	setTimeout(function(){
		hr.onreadystatechange = function(){		
		if(ajaxReturn(hr)== true){
			closeModal();
			var data = hr.responseText;
			document.getElementById("results").style.display = "block";
			document.getElementById("results").style.color = "green";
			document.getElementById("results").innerHTML = data;
			$('#results').fadeOut(11000);
            clearAll();
		}
	}
	
	hr.send(vars);	
		
		},1000);
}

function clearAll(){
    var firstname = document.getElementById("firstname").value;
    $('#firstname').val("");
    $('#email').val("");
    $('#course').val("");
    $('#lastname').val("");
    $('#phone').val("");
    $('#town').val("");
    $('#work').val("");
    $('#country').val("");
    $('#age').val("");
}

function subscribe(){
	var email = document.getElementById("Cemail").value;
	var atpos=email.indexOf("@");
	var dotpos=email.lastIndexOf(".");
	
	if(email == ""){
		document.getElementById("SubScriberesponse").style.display = "block";
		document.getElementById("SubScriberesponse").innerHTML = "*Please enter email address";
		return false;
	}

	else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
	  {
	   document.getElementById("SubScriberesponse").style.display = "block";
	   document.getElementById("SubScriberesponse").innerHTML = email + " is not a valid email address"
	  return false;
	}
	
	openModal();
	var vars = "Cemail="+email;
	
	var hr = ajaxObj("POST", "model/parser.php", true);
	
	hr.onreadystatechange = function(){		
		if(ajaxReturn(hr)== true){
			closeModal();
			var data = hr.responseText;
			document.getElementById("SubScriberesponse").style.display = "block";
			document.getElementById("SubScriberesponse").style.color = "green";
			document.getElementById("SubScriberesponse").innerHTML = data;
			$('#SubScriberesponse').fadeOut(11000);
		}
	}
	
	hr.send(vars);	
}

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
							window.location.href = "profile"+data;
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
        $('.featured').html("Please enter your fistname");
        isValid = false;
    }
    else if(!firstname.match(letters)){
        $('.featured').css('display','block');
        $('.featured').html("Firstname cannot contain number or special characters");
        isValid = false;
    }
    else if(firstname.length < 3){
        $('.featured').css('display','block');
        $('.featured').html("Firstname cannot be less than 3 characters");
        isValid = false;
    }
    else if(lastname == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter your other names");
        isValid = false;
    }
    else if(!lastname.match(letters)){
        $('.featured').css('display','block');
        $('.featured').html("Othernames cannot contain number or special characters");
        isValid = false;
    }
    else if(lastname.length < 3){
        $('.featured').css('display','block');
        $('.featured').html("Othernames cannot be less than 3 characters");
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
        $('.featured').html("Please enter your last year in school");
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
        $('.featured').html("Intake code cannot contain characters, Numbers Only");
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
        $('.featured').html("Please enter your email address");
        isValid = false;
    }
    else if(atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length){
        $('.featured').css('display','block');
        $('.featured').html(email + " is not a valid email address");
        isValid = false;
    }
    else if(phone == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter your phone number");
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
        $('.featured').html("Please enter your permanent house address");
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
                        $('.featured').html("Operation was successful, You have been enrolled, you will recieve SMS notification shortly");
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
        $('.featured').html("Please enter your Firstname");
        isValid = false;
    }
    else if(!firstname.match(letters)){
        $('.featured').css('display','block');
        $('.featured').html("Firstname cannot contain number or special characters");
        isValid = false;
    }
    else if(firstname.length < 3){
        $('.featured').css('display','block');
        $('.featured').html("Firstname cannot be less than 3 characters");
        isValid = false;
    }
    else if(lastname == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter your other names");
        isValid = false;
    }
    else if(!lastname.match(letters)){
        $('.featured').css('display','block');
        $('.featured').html("Other names cannot contain number or special characters");
        isValid = false;
    }
    else if(lastname.length < 3){
        $('.featured').css('display','block');
        $('.featured').html("Students other names cannot be less than 3 characters");
        isValid = false;
    }
    else if(nationality == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter your nationality");
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
        $('.featured').html("Intake code cannot contain characters, Numbers Only");
        isValid = false;
    }
    else if(intake.length < 6 || intake.length > 6){
        $('.featured').css('display','block');
        $('.featured').html("Intake code must be 6 digits");
        isValid = false;
    }
    if(email == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter your email address");
        isValid = false;
    }
    else if(atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length){
        $('.featured').css('display','block');
        $('.featured').html(email + " is not a valid email address");
        isValid = false;
    }
    else if(phone == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter valid phone number");
        isValid = false;
    }
    else if(!phone.match(numbers)){
        $('.featured').css('display','block');
        $('.featured').html("Phone number cannot contain characters, Numbers Only");
        isValid = false;
    }
    else if(phone.length < 10){
        $('.featured').css('display','block');
        $('.featured').html("Phone number cannot be less than 10 Numbers");
        isValid = false;
    }
    else if(address.trim() == ""){
        $('.featured').css('display','block');
        $('.featured').html("Please enter permanent house address");
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
                        $('.featured').html("Operation was successful, Your Record has been updated"+
                            "<a style='float: right;' href='profile'> View Record</a>");
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

function blurStudentData(){
    var student = document.getElementById('searchStudent');
    if(student.value == ""){
        student.value = "Please enter you passport number";
    }
}

function focusStudentData(){
    var student = document.getElementById('searchStudent');
    if(student.value == "Please enter you passport number"){
        student.value = "";
    }
}

function searchStudentData(){
    var search_term = $('.searchCreteria').attr('value');
    $.post('model/parser.php', {searchDataPassport:search_term}, function(data){
        $('#contact_info').fadeIn("slow");
        $('#contact_info').html(data);
    });
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
                            "<a style='float: right;' href='content'> Go To Class</a>");
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

//Initialize all JavaScript and Ajax Functions
window.onload = initAll;
window.onscroll = displayRequestForm;