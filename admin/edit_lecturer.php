<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administrator's Zone | Add Lecturer</title>

    <?php include_once("view/header.php");
		if(isset($_SESSION['adminName']) && isset($_SESSION['adminPass'])){
			$loggedinuser = $_SESSION['adminName'];
			//$_SESSION['non-index'] = true;
		}else{
			$helper->redirect_to("login");
		}

        if(isset($_GET['userID'])){
            $theID = $_GET['userID'];
            $tablename = "staff";
        }
        else if(isset($_SESSION['adminID']) && $_SESSION['profile'] === "Lecturer"){
            $theID = $_SESSION['adminID'];
            $tablename = "staff";
        }
        else{
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
            
            <footer><h5>Update Lecturer Record </h5> </footer>

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
                    id="txtFirstname" value="<?php echo $load_data->getFirstname($theID, $tablename) ?>"
                    size="50"></td>
                  </tr>
                  <tr>
                   <td class="enrollNormal enrollfirstTd">Other Names:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Other Names:</label>
    				<input type="text" name="txtOtherNames"
                           value="<?php echo $load_data->getLastname($theID, $tablename) ?>"
                    id="txtOtherNames" size="50"> 
                    </td>
                  </tr>
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Nationality:</td>
                    <td class="enrollsecondTd">
                     <label class="enrollMobile">Nationality:</label>
                    <input type="text" name="txtNationailty"
                           value="<?php echo $load_data->getNationality($theID, $tablename) ?>"
                    id="txtNationailty" size="50"> 
                    </td>
                  </tr>                
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Gender:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Gender:</label>
                    <select name="txtGender" id="txtGender">
                    <option value="<?php echo $load_data->getGender($theID, $tablename) ?>">
                        <?php echo $load_data->getGender($theID, $tablename) ?> </option>
                    <option value="Male"> Male </option>
                    <option value="Female"> Female </option>
                    </select>
                    </td>
                  </tr>
                  </table>
                   </fieldset>                   
                
                <fieldset>
                   <legend><strong>Programme Information</strong></legend>
                  <table width="100%" border="0" cellpadding="1">
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Qualification:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Qualification:</label>
                    <input type="text" name="txtQualification" id="txtQualification"
                    value="<?php echo $load_data->getQualification($theID) ?>"
                    size="50">
                    </td>
                  </tr>

                  <tr>
                    <td class="enrollNormal enrollfirstTd">Designation:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Designation:</label>
                    <input type="text" name="txtDesignation"
                    value="<?php echo $load_data->getDesignation($theID) ?>"
                    id="txtDesignation"
                    size="50"></td>
                  </tr>

                  <tr>
                    <td class="enrollNormal enrollfirstTd">Department:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Department:</label>
                    <select name="txtDepartment" id="txtDepartment">
                    <option value="<?php echo $load_data->getDepartment($theID, $tablename) ?>">
                        <?php echo $load_data->getDepartment($theID, $tablename) ?> </option>
                    	<?php echo $helper->getDepartment();?>
                    </select>
                    </td>
                  </tr>
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Programme:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Programme:</label>
                    <select name="txtCourse" id="txtCourse">
                    <option value="<?php echo $load_data->getCourse($theID, $tablename) ?>">
                        <?php echo $load_data->getCourse($theID, $tablename) ?> </option>
                    	<?php echo $helper->getProgramme();?>
                    </select>
                    </td>
                  </tr>

                      <tr>
                          <td class="enrollNormal enrollfirstTd">Status:</td>
                          <td class="enrollsecondTd">
                              <label class="enrollMobile">Status:</label>
                              <select name="txtStatus" id="txtStatus">
                                  <option value="<?php echo $load_data->getStatus($theID, $tablename) ?>">
                                      <?php echo $load_data->getStatus($theID, $tablename) ?> </option>
                                  <option value="Inactive"> Inactive</option>
                                  <option value="Active"> Active </option>
                              </select>
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
                    size="50"></td>
                  </tr>
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Phone Number:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Phone Number:</label>
                    <input type="text" name="txtPhone" id="txtPhone"
                     value="<?php echo $load_data->getPhone($theID, $tablename) ?>"
                    maxlength="16"> 
                    </td>
                  </tr>
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Permanent Address:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Permanent Address</label>
                    <textarea name="txtAddress" id="txtAddress"><?php echo trim($load_data->getAddress($theID, $tablename))?></textarea>
                    </td>
                  </tr>
                </table>
                <p><input id="p_info" type="button" name="parseLecturerUpdate"
                        style="float:right;" onclick="updateLecturer()"
                        class="btn" value="Update Record"> </p>
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