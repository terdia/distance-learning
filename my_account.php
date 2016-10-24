<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administrator's Zone | My Account</title>
    <?php include_once("view/header.php");
    if(isset($_SESSION['profile']) && $_SESSION['profile'] === "Student"){
            $theID = $_SESSION['userMatricNo'];
            $tablename = "users";
            include_once("model/uploadParse.php");
		}else{
			$helper->redirect_to("account");
		}
	?>
    
    <div id="mainContent">
    <div class="topContent">

        <div class="aboutDescSide">
            <article>

                <header>
                    <h4><strong><?php echo $load_data->getFirstname($theID, $tablename) ?></strong></h4><br/>
                </header>

                <content>

                    <div id="profile">
                        <?php echo $load_data->profileBtn()?>
                        <?php echo $load_data->changeProfileForm($theID) ?>
                        <?php echo $load_data->getProfilePic($theID) ?>
                    </div>
                    <p style="color: #ff0000;"> <?php if(isset($result)) echo $result; ?></p>
                    <div class="displayCourses blue" style="width: 84%;"><a class="loaduser" id="statclose" title="Site Statistics" onclick="toggleElements('stat', 'stats')">View Site Statistics</a></div>
                    <div id="stat">
                        <table width="97%" border="0" cellpadding="1" style="overflow: hidden;">
                            <tr>
                                <td>
                                    <label>Registered On:</label>
                                    <?php echo $load_data->getDateRegistered($theID, $tablename) ?>
                            </tr>
                            <tr>
                                <td >
                                    <label>Last Login Date:</label>
                                    <?php echo $load_data->getLastLoginDate($theID, $tablename) ?>
                                </td>
                            </tr>
                            <tr>
                                <td >
                                    <label>Registered from IP:</label>
                                    <?php echo $load_data->getRegistrationIP($theID, $tablename) ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label >Last Logged IP:</label>
                                    <?php echo $load_data->getLastLoginIP($theID, $tablename) ?>
                                </td>
                            </tr>
                        </table>
                    </div>
                </content>

            </article>
        </div>


        <div class="aboutDesc">
         <article>
        <header>
            <h4><strong><?php if(isset($theID)) echo "Matric Number: u".$theID ?></strong></h4>
        </header>
            
            <footer><h5>Manage Login Details</h5> </footer>

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
                    id="txtFirstname" value="<?php echo $load_data->getFirstname($theID, $tablename)." ".
                    $load_data->getLastname($theID, $tablename) ?>"
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
        </div>
 
        <div id="fade"></div>
        	<div id="modal">
          <img id="loader" src="images/loading.gif" />
       </div>
            
		<div class="mainFooter" style="width:99%; margin-left:5px;">
 				
        <div class="topContent" > <?php include_once('view/footer.php'); ?> </div>
              
        <div class="spacer" style="clear: both;"></div>
           
        </div><!--Top Content end here-->     


</div>
</body>

</html>