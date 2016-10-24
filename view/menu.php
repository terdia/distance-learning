<?php session_start();
$profile = "";
$menu = "";
$footermenu = "";
$sideBar = "";
if(isset($_SESSION['userEmail']) && isset($_SESSION['userPass']) && $_SESSION['profile'] === "Student"){
    $loggedinuser = $_SESSION['userMatricNo'];
if(isset($loggedinuser)) $profile = "<div id='uselog'>
                    Logged in as u".$loggedinuser."</div>";

$menu = '<div id="sections_btn_holder" style="margin-bottom:15px;">'.$profile.' <img title="Menu Options" onclick="toggleNavPanel(\'sections_panel\')" src="images/arrow.jpg" width="" height="43"> <span id="navarrow">&#9662;</span> </div>
	<div id="sections_panel">
	<div>
	<div class="menucontrol">
	        <h7>My Programme</h7>
		    <ul>
				<li><a href="content">Go To Class</a></li>
				<li><a href="submit">Submit Assignment</a></li>
			    <li><a href="download_assignment">Download Assignment</a></li>
            </ul>
      </div>

      	<div class="menucontrol">
	        <h7>My Setting</h7>
		    <ul>
			    <li><a href="profile">View Profile</a></li>
			    <li><a href="my_account">Update Login Details</a></li>
				<li><a href="updatenrollment">Update Enrollment Details</a></li>
            </ul>
      </div>

      <div class="menucontrol">
	        <h7>Other</h7>
		    <ul>
				<li><a href="exam">Take Exam</a></li>
				<li><a target="_blank" href="module_result">View Result</a></li>
				<li><a href="forum">Discussion Board</a></li>
            </ul>
      </div>

    <div class="menucontrol">
      	        <h7>Main</h7>
		    <ul>
			    <li><a href="semester">Semester Registration</a></li>
			    <li><a href="course?cname=Online Learning">Learning Online</a></li>
				<li><a href="logout">Logout</a></li>
            </ul>
      </div>

	</div>
	</div>';
}
else{
	$menu = '<div class="menu right">
            <ul>
                <div class="mobile"><li class="current"><a href="#">Menu</a></li>
                <li><a href="index">Home</a></li></div>
                <li class="current" id="home"><a href="index">Home</a></li>
                <li><a href="about">About US</a></li>
                <li><a href="programme">Programmes</a></li>
                <li><a href="enrollment">Enroll</a></li>
                <li><a href="account">Student Login</a></li>
                <li><a href="contact">Find Us</a></li>
                </ul>
            </div>';

}
?>