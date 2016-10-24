<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administrator's Zone | Enroll Student</title>

    <?php include_once("view/header.php");
		if(isset($_SESSION['adminName']) && isset($_SESSION['adminPass'])){
			$loggedinuser = $_SESSION['adminName'];
		}else{
			$helper->redirect_to("login");
		}
    $intake = substr(floor(mt_rand(100000, 999999) * (time() / 100)), -6);
	?>
    
    <div id="mainContent">      
        <div class="topContent">   
         <div class="adminLogin">
        	<article>
            
            <header>
           		<h4><strong>Administrator's Panel </strong></h4>
            </header>
            
            <footer><h5>Enroll New Student Form</h5></footer>

            <content>
            	<div id="success">
                <img src="images/check.png" width="70" height="70">
                </div>
                
                <div class="featured"> </div>
                
                <form action="" method="post" class="enrollform">
                <div id="personalInfo">
                <fieldset id="bio_data">
                <legend><strong>Bio Data</strong></legend>
                <table width="100%" border="0" cellpadding="1">
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Passport / IC No.:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Passport No.:</label>
                    <input type="text" name="txtIC" id="txtIC" 
                    size="50"></td>
                  </tr>
                  
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Firstname:</td>					
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Firstname:</label>
                    <input type="text" name="txtFirstname" 
                    id="txtFirstname" 
                    size="50"></td>
                  </tr>
                  <tr>
                   <td class="enrollNormal enrollfirstTd">Other Names:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Other Names:</label>
    				<input type="text" name="txtOtherNames" 
                    id="txtOtherNames" size="50"> 
                    </td>
                  </tr>
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Nationality:</td>
                    <td class="enrollsecondTd">
                     <label class="enrollMobile">Nationality:</label>
                    <input type="text" name="txtNationailty" 
                    id="txtNationailty" size="50"> 
                    </td>
                  </tr>                
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Gender:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Gender:</label>
                    <select name="txtGender" id="txtGender">
                    <option value=""> Select Gender </option>
                    <option value="Male"> Male </option>
                    <option value="Female"> Female </option>
                    </select>
                    </td>
                  </tr>
                  
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Date of Birth:</td>
                    <td class="enrollsecondTd">
                 	<label class="enrollMobile">Date of Birth</label>
                    <select name="txtDay" style="width:22%;" id="txtDay">
                    <option value=""> Day </option>
                    	<?php $helper->getDay();?>
                    </select>
                    
                    <select name="txtMonth" style="width:46.4%;" id="txtMonth">
                    <option value=""> Month </option>
                    	<?php $helper->getMonth();?>
                    </select>
                    
                    <select name="txtYear" style="width:26%;" id="txtYear">
                    <option value=""> Year </option>
                    	<?php $helper->getYear();?>
                    </select>
                    </td>
                  </tr>
                  
                  </table>
                   </fieldset>                   
                
                <fieldset>
                   <legend><strong>Programme Information</strong></legend>
                  <table width="100%" border="0" cellpadding="1">
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Last Year In School:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Last Year In School:</label>
                    <input type="text" name="txtLastyear" id="txtLastyear" 
                    size="50"> 
                    </td>
                  </tr>
                  
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Intake:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Intake:</label>
                    <input type="text" readonly maxlength="6" name="txtIntake"
                    id="txtIntake" value="<?php echo $intake ?>"></td>
                  </tr>
                  
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Department:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Department:</label>
                    <select name="txtDepartment" id="txtDepartment">
                    <option value=""> Select Department </option>
                    	<?php echo $helper->getDepartment();?>
                    </select>
                    </td>
                  </tr>
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Programme:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Programme:</label>
                    <select name="txtCourse" id="txtCourse">
                    <option value=""> Select Programme </option>
                    	<?php echo $helper->getProgramme();?>
                    </select>
                    </td>
                  </tr>
                </table>
                <p><input id="p_info" name="parseStudentStepOne" type="button"
                        style="float:right;" onclick="parsePersonalInfo()" 
                        class="btn" value="Continue"> </p>
                                        
                </fieldset></div>
                   
                   
                   <div id="contact_info">
                   <fieldset>
                   <legend><strong>Contact Information</strong></legend>
                  <table width="100%" border="0" cellpadding="1">
                  
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Email Address:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Email Address:</label>
                    <input type="text" name="txtEmail" id="txtEmail" 
                    size="50"></td>
                  </tr>
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Phone Number:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Phone Number:</label>
                    <input type="text" name="txtPhone" id="txtPhone" 
                    maxlength="16"> 
                    </td>
                  </tr>
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Permanent Address:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Permanent Address</label>
                    <textarea name="txtAddress" id="txtAddress"></textarea>
                    </td>
                  </tr>
                </table>
                </fieldset>
                
                <fieldset>
                   <legend><strong>Next of Kin</strong></legend>
                  <table width="100%" border="0" cellpadding="1">
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Fullname:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Fullname:</label>
                    <input type="text" name="txtFullname" id="txtFullname" 
                    size="50"> 
                    </td>
                  </tr>
                  
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Occupation:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Occupation:</label>
                    <input type="text" name="txtOccupation" 
                    id="txtOccupation" 
                    size="50"></td>
                  </tr>
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Contact Number:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Contact Number:</label>
                    <input type="text" name="txtNextofkinphone" 
                    id="txtNextofkinphone" maxlength="16"> 
                    </td>
                  </tr>
                </table>
                
                <p><input id="p_info" type="button" name="parseStudentStepTwo"
                        style="float:right;" onclick="parseContactInfo()" 
                        class="btn" value="Complete Enrollment"> </p>
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