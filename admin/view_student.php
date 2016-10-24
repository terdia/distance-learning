<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administrator's Zone | Enroll Student</title>

    <?php include_once("view/header.php");
		if(isset($_SESSION['adminName']) && isset($_SESSION['adminPass'])){
			$loggedinuser = $_SESSION['adminName'];
			//$_SESSION['non-index'] = true;
		}else{
			$helper->redirect_to("login");
		}

        if(isset($_GET['userID'])){
            $theID = $_GET['userID'];
            $tablename = "users";
        }else{
            $helper->redirect_to("manage_user");
        }
	?>
    
    <div id="mainContent">      
        <div class="topContent">   
         <div class="adminLogin">
        	<article>
            
            <header>
           		<h4><strong>Administrator's Panel </strong></h4>
            </header>
            
            <footer><h5>Student Details</h5></footer>

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
                    <input type="text" name="txtIC" id="txtIC" disabled="disabled" style="border: 0;"
                    size="50" value="<?php echo $load_data->getIC($theID, $tablename) ?>"></td>
                  </tr>
                  
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Firstname:</td>					
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Firstname:</label>
                    <input type="text" name="txtFirstname"
                     value="<?php echo $load_data->getFirstname($theID, $tablename) ?>"
                    id="txtFirstname" 
                    size="50" disabled="disabled" style="border: 0;"></td>
                  </tr>
                  <tr>
                   <td class="enrollNormal enrollfirstTd">Other Names:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Other Names:</label>
    				<input type="text" name="txtOtherNames"
                    value="<?php echo $load_data->getLastname($theID, $tablename) ?>"
                    id="txtOtherNames" size="50" disabled="disabled" style="border: 0;">
                    </td>
                  </tr>
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Nationality:</td>
                    <td class="enrollsecondTd">
                     <label class="enrollMobile">Nationality:</label>
                    <input type="text" name="txtNationailty"
                    value="<?php echo $load_data->getNationality($theID, $tablename) ?>"
                    id="txtNationailty" size="50" disabled="disabled" style="border: 0;">
                    </td>
                  </tr>                
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Gender:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Gender:</label>
                    <input type="text" name="txtGender" id="txtGender" disabled="disabled" style="border: 0;"
                    value="<?php echo $load_data->getGender($theID, $tablename) ?>">
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
                    <input type="text" name="txtLastyear" id="txtLastyear" size="50"
                    disabled="disabled" style="border: 0;"
                    value="<?php echo $load_data->getLastSchoolYear($theID) ?>">
                    </td>
                  </tr>
                  
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Intake:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Intake:</label>
                    <input type="text" name="txtIntake" 
                    id="txtIntake" size="50" disabled="disabled" style="border: 0;"
                    value="<?php echo $load_data->getIntake($theID) ?>">
                    </td>
                  </tr>
                  
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Department:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Department:</label>
                    <input type="text" name="txtDepartment" id="txtDepartment"
                           disabled="disabled" style="border: 0;"
                    value="<?php echo $load_data->getDepartment($theID, $tablename) ?>">
                    </td>
                  </tr>
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Programme:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Programme:</label>
                    <input type="text" name="txtCourse" id="txtCourse"
                           disabled="disabled" style="border: 0;"
                    value="<?php echo $load_data->getCourse($theID, $tablename) ?>">
                    </td>
                  </tr>

                  <tr>
                      <td class="enrollNormal enrollfirstTd">Status:</td>
                      <td class="enrollsecondTd">
                          <label class="enrollMobile">Status:</label>
                          <input type="text" name="txtStatus" id="txtStatus"
                                 disabled="disabled" style="border: 0;"
                            value="<?php echo $load_data->getStatus($theID, $tablename) ?>">
                      </td>
                  </tr>

                </table>
                </fieldset>

                   <fieldset>
                   <legend><strong>Contact Information</strong></legend>
                  <table width="100%" border="0" cellpadding="1">
                  
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Email Address:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Email Address:</label>
                    <input type="text" name="txtEmail" id="txtEmail"
                    value="<?php echo $load_data->getEmail($theID, $tablename) ?>"
                    size="50" disabled="disabled" style="border: 0;"></td>
                  </tr>
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Phone Number:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Phone Number:</label>
                    <input type="text" name="txtPhone" id="txtPhone"
                     value="<?php echo $load_data->getPhone($theID, $tablename) ?>"
                    maxlength="16" disabled="disabled" style="border: 0;">
                    </td>
                  </tr>
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Permanent Address:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Permanent Address</label>
                    <textarea name="txtAddress" id="txtAddress"
                    disabled="disabled" style="border: 0; height: auto;"><?php echo trim($load_data->getAddress($theID, $tablename))?></textarea>
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
                           value="<?php echo $load_data->getNextKinName($theID) ?>"
                    size="50" disabled="disabled" style="border: 0;">
                    </td>
                  </tr>
                  
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Occupation:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Occupation:</label>
                    <input type="text" name="txtOccupation"
                     value="<?php echo $load_data->getNextKinOccupation($theID) ?>"
                    id="txtOccupation" 
                    size="50" disabled="disabled" style="border: 0;"></td>
                  </tr>
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Contact Number:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Contact Number:</label>
                    <input type="text" name="txtNextofkinphone"
                    value="<?php echo $load_data->getNextKinPhone($theID) ?>"
                    id="txtNextofkinphone" maxlength="16" disabled="disabled" style="border: 0;">
                    </td>
                  </tr>
                </table>
                </fieldset>

                <fieldset>
                    <legend><strong>Other Information</strong></legend>
                    <table width="100%" border="0" cellpadding="1">
                        <tr>
                            <td class="enrollNormal enrollfirstTd">Date Created:</td>
                            <td class="enrollsecondTd">
                                <label class="enrollMobile">Date Created:</label>
                                <input type="text" name="txtDate" id="txtDate"
                                       value="<?php echo $load_data->getDateRegistered($theID, $tablename) ?>"
                                       size="50" disabled="disabled" style="border: 0;"></td>
                        </tr>
                        <tr>
                            <td class="enrollNormal enrollfirstTd">Last Login Date:</td>
                            <td class="enrollsecondTd">
                                <label class="enrollMobile">Last Login Date:</label>
                                <input type="text" name="txtLastLoginDate" id="txtLastLoginDate"
                                       value="<?php echo $load_data->getLastLoginDate($theID, $tablename) ?>"
                                       maxlength="16" disabled="disabled" style="border: 0;">
                            </td>
                        </tr>
                        <tr>
                            <td class="enrollNormal enrollfirstTd">Registered from IP:</td>
                            <td class="enrollsecondTd">
                                <label class="enrollMobile">Registered from IP:</label>
                                <input type="text" name="txtRegisteredFromIP" id="txtRegisteredFromIP" disabled="disabled" style="border: 0; height: auto;"
                                       value="<?php echo $load_data->getRegistrationIP($theID, $tablename) ?>">
                            </td>
                        </tr>

                        <tr>
                            <td class="enrollNormal enrollfirstTd">Last Logged IP:</td>
                            <td class="enrollsecondTd">
                                <label class="enrollMobile">Last Logged IP:</label>
                                <input type="text" name="txtLastLogIP" id="txtLastLogIP" disabled="disabled" style="border: 0; height: auto;"
                                       value="<?php echo $load_data->getLastLoginIP($theID, $tablename) ?>">
                            </td>
                        </tr>
                    </table>
                </fieldset>

                </div>
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