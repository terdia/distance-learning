<?php session_start();
$profile = "";
$menu = "";
$footermenu = "";
$sideBar = "";
if(isset($_SESSION['adminName']) && isset($_SESSION['adminPass']) && $_SESSION['profile'] === "Admin"){
    $loggedinuser = $_SESSION['profile'];
if(isset($loggedinuser)) $profile = "<div id='uselog'>
                    Logged in as ".$loggedinuser."</div>";

$menu = '<div id="sections_btn_holder">'.$profile.' <img title="Menu Options" onclick="toggleNavPanel(\'sections_panel\')" src="../images/arrow.jpg" width="" height="43"> <span id="navarrow">&#9662;</span> </div>
	<div id="sections_panel">
	<div>
	<div class="menucontrol">
	        <h7>Enrollment</h7>
		    <ul>
				<li><a href="enroll_student">Enroll Student</a></li>
				<li><a href="update_dues">Update Student Dues</a></li>
			    <li><a href="semester_registration">Semester Registration</a></li>
            </ul>
      </div>

      	<div class="menucontrol">
	        <h7>Course Management</h7>
		    <ul>
			    <li><a href="manage_courses">Add Course</a></li>
			    <li><a href="view_course">View Existing Courses</a></li>
				<li><a href="editcourse">Edit Course</a></li>
            </ul>
      </div>

      <div class="menucontrol">
	        <h7>Account</h7>
		    <ul>
				<li><a href="add_lecturer">Add Lecturer</a></li>
			    <li><a href="manage_user">Manage Account</a></li>
			    <li><a href="my_account">My Account</a></li>
            </ul>
      </div>

    <div class="menucontrol">
      	        <h7>Feedback Management</h7>
		    <ul>
			    <li><a href="course_info_request">View Request</a></li>
				<li><a href="view_subscriber">View Subscriber</a></li>
				<li><a href="logout">Logout</a></li>
            </ul>
      </div>

	</div>
	</div>';

	$footermenu = '<a href="index"> Home</a>&nbsp;|&nbsp;
				   <a href="enroll_student">Enroll Student</a>&nbsp;|&nbsp;
				   <a href="semester_registration">Semester Registration</a>&nbsp;|&nbsp;
				   <a href="add_lecturer">Add Lecturer</a>';

		$sideBar = '<article>
           <header>
            <h4><strong>Upcoming Events </strong></h4>
            </header>
            
            	<content> 
                    <p><img src="images/important.jpg" height="170" alt="important"> </p>
                    
                    <p>
                    	Monthly management meeting with the General Manager,
                        for the month of may is scheduled to hold on the
                        17th May, 2014.
                     </p>
                     <p><strong>Attendance is compulsory</strong></p>
                    
  					<h5>Venue: Conference Room.</h5>
                    <h5>Time: 10am - 2pm:</h5>
                </content>
                
            </article>';	

}
else if(isset($_SESSION['adminName']) && isset($_SESSION['adminPass']) && $_SESSION['profile'] === "Lecturer"){
    $loggedinuser = $_SESSION['profile'];
    if(isset($loggedinuser)) $profile = "<div id='uselog'>
                    Logged in as ".$loggedinuser."</div>";

    $menu = '<div id="sections_btn_holder">'.$profile.' <img title="Menu Options" onclick="toggleNavPanel(\'sections_panel\')" src="../images/arrow.jpg" width="" height="43"> <span id="navarrow">&#9662;</span> </div>
	<div id="sections_panel">
	<div>
	<div class="menucontrol">
	        <h7>Enrollment</h7>
		    <ul>
				<li><a href="upload_course_materials">Upload Course Materials</a></li>
				<li><a href="upload_result">Upload Module Result</a></li>
			    <li><a href="exam">Schedule Exam</a></li>
            </ul>
      </div>
    <div class="menucontrol">
	        <h7>Account</h7>
		    <ul>
				<li><a href="view_lecturer">My Profile</a></li>
			    <li><a href="my_account">Login Details</a></li>
			    <li><a href="edit_lecturer">Update Profile</a></li>
            </ul>
      </div>

        <div class="menucontrol">
	        <h7>Assignments</h7>
		    <ul>
				<li><a href="upload_assignment">Upload Assignment</a></li>
			    <li><a href="view_submission">View Submission</a></li>
			    <li><a href="logout">Logout</a></li>
            </ul>
      </div>


    </div>
    </div>';

    $sideBar = '<article>
           <header>
            <h4><strong>Upcoming Events </strong></h4>
            </header>

            	<content>
                    <p><img src="images/important.jpg" height="170" alt="important"> </p>

                    <p>
                    	Monthly management meeting with the General Manager,
                        for the month of may is scheduled to hold on the
                        17th May, 2014.
                     </p>
                     <p><strong>Attendance is compulsory</strong></p>

  					<h5>Venue: Conference Room.</h5>
                    <h5>Time: 10am - 2pm:</h5>

                    <p><a href="anouncement.php">Post Announcement</a> </p>
                </content>

            </article>';

    $footermenu = '<a href="index"> Home</a>&nbsp;|&nbsp;
				   <a href="upload_course_materials">Upload Course Materials</a>&nbsp;|&nbsp;
				   <a href="upload_result">Upload Module Result</a>&nbsp;|&nbsp;
				   <a href="my_account">My Account</a>';
}
else{
	$menu = '<div class="menu right">
            <ul>
				<div class="mobile"><li class="current"><a href="#">Menu</a></li>
				<li><a href="index">Home</a></li></div>
				<li class="current" id="home"><a href="index">Home</a></li>
				<li><a href="../about">About US</a></li>
				<li><a href="../programme">Programmes</a></li>
				<li><a href="../course?cname=Online Learning">Learning Online</a></li>
				<li><a href="login">Login</a></li>
				<li><a href="../contact">Find Us</a></li>
        	</ul></div>';

	$footermenu = '<a href="index"> Home</a>&nbsp;|&nbsp;
                   <a href="../course?cname=Admission and Financing">
				   Admission</a>&nbsp;|&nbsp;
                   <a href="../course?cname=Privacy Policy">
				   Privacy Policy</a>&nbsp;|&nbsp;
                   <a href="login">Admin Login</a>';

	$sideBar = '<article>
           <header>
            <h4><strong>Upcoming Events </strong></h4>
            </header>

            	<content>
                    <p><img src="images/important.jpg" height="170"
					alt="important"> </p>

                    <p>
                    	Monthly management meeting with the General Manager,
                        for the month of may is scheduled to hold on the
                        17th May, 2014.
                     </p>
                     <p><strong>Attendance is compulsory</strong></p>

  					<h5>Venue: Conference Room.</h5>
                    <h5>Time: 10am - 2pm:</h5>
                </content>

            </article>';
}
?>