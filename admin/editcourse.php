<?php ob_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administrator's Zone | Manage Courses</title>

    <?php include_once("view/header.php");
		if(isset($_SESSION['adminName']) && isset($_SESSION['adminPass'])){
			$loggedinuser = $_SESSION['adminName'];
			//$_SESSION['non-index'] = true;
		}else{
			$helper->redirect_to("login");
		}

        if(isset($_GET['courseID'])){
            $theID = $_GET['courseID'];
        }else{
            $helper->redirect_to("view_course");
        }
	?>
    
    <div id="mainContent">      
        <div class="topContent">   
         <div class="adminLogin">
        	<article>
            
            <header>
           		<h4><strong>Administrator's Panel </strong></h4>
            </header>

                <footer><h5>Edit Course Form</h5></footer>

                <content>
            	<div id="success">
                <img src="images/check.png" width="70" height="70">
                </div>
                
                <div class="featured"> </div>
                
                <form action="" method="post" class="enrollform">
                <div id="personalInfo">
                <fieldset id="course_info">
                <legend><strong>Course Information</strong></legend>
                <table width="100%" border="0" cellpadding="1">
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Module Code:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Module Code:</label>
                    <input disabled="disabled" type="text" value="<?php echo $load_data->getModuleCode($theID) ?>" name="txtModuleCode" id="txtModuleCode"
                    size="50"></td>
                  </tr>

                  <tr>
                    <td class="enrollNormal enrollfirstTd">Semester:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Semester:</label>
                    <select name="txtSemester" id="txtSemester">
                    <option value="<?php echo $load_data->getSemester($theID); ?>"> <?php echo $load_data->getSemester($theID); ?> </option>
                    <option value="Semester A"> Semester A </option>
                    <option value="Semester B"> Semester B </option>
                    <option value="Semester C"> Semester C </option>
                    </select>
                    </td>
                  </tr>

                    <tr>
                        <td class="enrollNormal enrollfirstTd">School:</td>
                        <td class="enrollsecondTd">
                            <label class="enrollMobile">School:</label>
                            <select name="txtDepartment" id="txtDepartment">
                                <option value="<?php echo $load_data->getSchool($theID); ?>"> <?php echo $load_data->getSchool($theID); ?> </option>
                                <option value="Computer Science"> Computer Science </option>                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="enrollNormal enrollfirstTd">Programme:</td>
                        <td class="enrollsecondTd">
                            <label class="enrollMobile">Programme:</label>
                            <select name="txtProgramme" id="txtProgramme">
                                <option value="<?php echo $load_data->getProgramme($theID); ?>"> <?php echo $load_data->getProgramme($theID); ?> </option>
                                <option value="MSc in Internet Systems"> MSc in Internet Systems </option>
                                <option value="MSc in Software Engineering"> MSc in Software Engineering </option>
                                <option value="MSc in Computer Security"> MSc in Computer Security </option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td class="enrollNormal enrollfirstTd">Course Title:</td>
                        <td class="enrollsecondTd">
                            <label class="enrollMobile">Course Title:</label>
                            <input type="text" name="txtCourseTitle" id="txtCourseTitle"
                            size="50" value="<?php echo $load_data->getCourseTitle($theID); ?>"></td>
                    </tr>

                    <tr>
                        <td class="enrollNormal enrollfirstTd">Credit Load:</td>
                        <td class="enrollsecondTd">
                            <label class="enrollMobile">Credit Load:</label>
                            <select name="txtCreditLoad" id="txtCreditLoad">
                                <option value="20"> 20 </option>
                            </select>
                        </td>
                    </tr>
                  </table>

                <p><input id="c_info" name="parseCourseedit" type="button"
                        style="float:right;" onclick="parseCourseEdit()"
                        class="btn" value="Edit Course"> </p>
                                        
                </fieldset></div>
                </form>
            </content>
            </article>
             <p style="width:97%;"><a href="<?php if(isset($back)) echo $back; ?>" class="readMore orange" title="Back to previous Page">Back to previous Page</a></p>
         </div>

        <div class="adminLoginSide">
        	
            <?php echo $sideBar;?>
        </div>

        </div>
 
        <div id="fade"></div>
        	<div id="modal">
          <img id="loader" src="../images/loading.gif" />
       </div>
            
		<div class="mainFooter" style="width:99%; margin-left:5px;">
 				
        <div class="topContent" > <?php include_once('view/footer.php'); ?> </div>
              
        <div class="spacer" style="clear: both;"></div>
           
        </div><!--Top Content end here-->     

</div>
</body>

</html>