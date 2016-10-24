<?php ob_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Embedded Cloud Based Distance Learning Portal For FTMS College | Administrator's Zone</title>
    <?php include_once("view/header.php");
		if(isset($_SESSION['profile']) && $_SESSION['profile'] === "Admin"){
            $test = "yes";
        }
        else if(isset($_SESSION['profile']) && $_SESSION['profile'] === "Lecturer"){
            $helper->redirect_to("upload_course_materials");
        }else{
            $helper->redirect_to("login");
        }
	?>
    <div id="mainContent">
        <div class="topContent">   
         <div class="adminLogin">
        	<article>
            
            <header>
           		<h4><strong>Administrator's Panel </strong></h4>
            </header>
            
       			<footer><h5>Please select a task below <?php echo $_SESSION['profile']; ?>
                </h5> </footer>

            	<content>
                <div class="pageInner">
                <a href="../index" title="Main Website">
                <table><tr><td><img src="images/hom.png" alt="Main Website" width="130" height="90" />
                <p style="text-align:center; color:#069">Main Website</p>
                </td></tr></table></a>
                </div>
                
                <div class="pageInner">
                <a href="add_lecturer" title="Add Lecturer">
                <table><tr><td><img src="images/staff.png" alt="Add Lecturer" width="130" height="90" />
                <p style="text-align:center; color:#069">Add Lecturer</p>
                </td></tr></table></a>
                </div>
                
                <div class="pageInner">
                <a href="enroll_student" title="Enroll Student">
                <table><tr><td><img src="images/add_student.png" alt="Enroll Student" width="130" height="90" />
                <p style="text-align:center; color:#069">Enroll Student</p>
                </td></tr></table></a>
                </div>
                
                <div class="pageInner">
                <a href="semester_registration" title="Review Semester Registration">
                <table><tr><td><img src="images/semester-reg.png" alt="Review Semester Registration" width="130" height="90" />
                <p style="text-align:center; color:#069">Semester Registration</p>
                </td></tr></table></a>
                </div>
                
                <div class="pageInner">
                <a href="manage_courses" title="Manage Courses">
                <table><tr><td><img src="images/Courses-icon.png" alt="Manage Courses" width="130" height="90" />
                <p style="text-align:center; color:#069">Add Courses</p>
                </td></tr></table></a>
                </div>
                
                <div class="pageInner">
                <a href="manage_user" title="Manage Users">
                <table><tr><td><img src="images/manage-user.png" alt="Manage Users" width="130" height="90" />
                <p style="text-align:center; color:#069">Manage Accounts</p>
                </td></tr></table></a>
                </div>
                
                <div class="pageInner">
                <a href="update_dues" title="Update Dues">
                <table><tr><td><img src="images/Cash-register-icon.png" alt="Update Dues" width="130" height="90" />
                <p style="text-align:center; color:#069">Update Dues</p>
                </td></tr></table></a>
                </div>
                
                <div class="pageInner">
                <a href="course_info_request" title="View Request">
                <table><tr><td><img src="images/feedback-icon.png" alt="Update Dues" width="130" height="90" />
                <p style="text-align:center; color:#069">Course Info Request</p>
                </td></tr></table></a>
                </div>
                    
                </content>
                
             
            </article>
        </div>
        
        <div class="adminLoginSide">
        	
            <?php echo $sideBar;?>
        </div>
        
        
        </div>
        


		<div class="mainFooter" style="width:99%; margin-left:5px;">
 				
        <div class="topContent" > <?php include_once('view/footer.php'); ?> </div>
              
        <div class="spacer" style="clear: both;"></div>
           
        </div><!--Top Content end here-->     


</div>
</body>

</html>