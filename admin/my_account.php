<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administrator's Zone | Add Lecturer</title>
    <?php include_once("view/header.php");
		if(isset($_SESSION['adminName']) && isset($_SESSION['adminPass'])){
			$loggedinuser = $_SESSION['adminName'];
            $theID = $_SESSION['adminID'];
            $tablename = "staff";
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
            
            <footer><h5>My Account Settings</h5> </footer>

            <content>
            	<div id="success">
                <img src="images/check.png" width="70" height="70">
                </div>
                
                <div class="featured"> </div>
                
                <form action="" method="post" class="enrollform">
                <div id="personalInfo">
                <fieldset id="bio_data">
                <legend><strong>Personal Information</strong></legend>
                <table width="100%" border="0" cellpadding="1">
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Name:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Name:</label>
                    <input type="text" name="txtFirstname" style="border: 0;"
                    id="txtFirstname" value="<?php echo $load_data->getFirstname($theID, $tablename);
                    echo $load_data->getLastname($theID, $tablename) ?>"
                    size="50"></td>
                  </tr>
                    <tr>
                        <td class="enrollNormal enrollfirstTd">Passport / IC No.:</td>
                        <td class="enrollsecondTd">
                            <label class="enrollMobile">Passport No.:</label>
                            <input type="text" name="txtIC" id="txtIC" disabled="disabled" style="border: 0;"
                           size="50" value="<?php echo $load_data->getIC($theID, $tablename) ?>"></td>
                    </tr>

                  </table>
                   </fieldset>                   
                
                <fieldset>
                   <legend><strong>Login Username</strong></legend>
                  <table width="100%" border="0" cellpadding="1">

                  <tr>
                      <td class="enrollNormal enrollfirstTd">Email Address:</td>
                      <td class="enrollsecondTd">
                          <label class="enrollMobile">Email Address:</label>
                          <input type="text" name="txtEmail" id="txtEmail"
                                 value="<?php echo $load_data->getEmail($theID, $tablename) ?>"
                                 size="50"></td>
                  </tr>
                </table>

                    <p><input id="p_info" type="button" name="parseChangeEmail"
                              style="float:right;" onclick="changeEmail('<?php echo $theID ?>','<?php echo $tablename ?>','email')"
                              class="btn" value="Change"> </p>
                </fieldset>

                   <fieldset>
                   <legend><strong>Change Password</strong></legend>
                  <table width="100%" border="0" cellpadding="1">
                      <tr>
                          <td class="enrollNormal enrollfirstTd">Password:</td>
                          <td class="enrollsecondTd">
                              <label class="enrollMobile">Password:</label>
                              <input type="password" name="txtPassword" id="txtPassword" maxlength="16">
                          </td>
                      </tr>
                  <tr>
                    <td class="enrollNormal enrollfirstTd">Retype Password:</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Retype Password:</label>
                    <input type="password" name="txtRePassword" id="txtRePassword" maxlength="16">
                    </td>
                  </tr>
                </table>
                <p><input id="p_info" type="button" name="parseChangePassword"
                        style="float:right;" onclick="changePassword('<?php echo $theID ?>','<?php echo $tablename ?>','password')"
                        class="btn" value="Change Password"> </p>
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