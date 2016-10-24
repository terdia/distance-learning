<!doctype html>
<html>
<head>
<meta charset="utf-8">

    <?php include_once("view/header.php");
        if(isset($_SESSION['profile']) && $_SESSION['profile'] === "Student"){
           $theID = $_SESSION['userMatricNo'];
            $tablename = "users";
            echo $title = "<title> Site Profile for: ". $load_data->getFirstname($theID, $tablename)." ". $load_data->getLastname($theID, $tablename)." (u".$theID .")</title>";
            include_once("model/uploadParse.php");
        }
        else{
            $helper->redirect_to("account");
        }

    ?>
    
    <div id="mainContent">
        <div class="spacer" style="clear: both;"></div>
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

                        <div class="displayCourses green" style="width: 84%;"><a href="my_account" title="Update Login Details">Update Login Details</a></div><br/>
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
             <h4><strong><?php echo "Profile for: ". $load_data->getFirstname($theID, $tablename)." ". $load_data->getLastname($theID, $tablename)." (u".$theID .")"?></strong></h4>
            </header>

            	<content><br/>
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
                        <td class="enrollNormal enrollfirstTd">Name:</td>
                        <td class="enrollsecondTd">
                            <label class="enrollMobile">Name:</label>
                            <input type="text"  disabled="disabled" style="border: 0;"
                                    value="<?php echo $load_data->getFirstname($theID, $tablename)." "
                                        .$load_data->getLastname($theID, $tablename)." (".
                                        $load_data->getGender($theID, $tablename).")"?>"
                                   size="50"></td>
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
                            <textarea name="txtAddress" id="txtAddress" disabled="disabled" style="border: 0; height: auto;"><?php echo trim($load_data->getAddress($theID, $tablename))?></textarea>
                        </td>
                    </tr>
                </table>
            </fieldset>

            <fieldset>
                <legend><strong>Programme Information</strong></legend>
                <table width="100%" border="0" cellpadding="1">
                    <tr>
                        <td class="enrollNormal enrollfirstTd">Department:</td>
                        <td class="enrollsecondTd">
                            <label class="enrollMobile">Department:</label>
                            <input type="text" name="txtDepartment" id="txtDepartment" disabled="disabled" style="border: 0;"
                                   value="<?php echo $load_data->getDepartment($theID, $tablename) ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="enrollNormal enrollfirstTd">Programme:</td>
                        <td class="enrollsecondTd">
                            <label class="enrollMobile">Programme:</label>
                            <input type="text" name="txtCourse" id="txtCourse" disabled="disabled" style="border: 0;"
                                   value="<?php echo $load_data->getCourse($theID, $tablename) ?>">
                        </td>
                    </tr>

                    <tr>
                        <td class="enrollNormal enrollfirstTd">Status:</td>
                        <td class="enrollsecondTd">
                            <label class="enrollMobile">Status:</label>
                            <input type="text" name="txtStatus" id="txtStatus" disabled="disabled" style="border: 0;"
                                   value="<?php echo $load_data->getStatus($theID, $tablename) ?>">
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

        </div>
        
        <div class="spacer" style="clear: both;"></div>
			<div class="mainFooter">
 				
        <div class="topContent"> <?php include_once('view/footer.php'); ?> </div>
              
        <div class="spacer" style="clear: both;"></div>
           

        </div><!--Top Content end here-->     
    </div>
</div>
</body>

</html>