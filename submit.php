<!doctype html>
<html>
<head>
<meta charset="utf-8">

    <?php include_once("view/header.php");
        if(isset($_SESSION['profile']) && $_SESSION['profile'] === "Student"){
           $theID = $_SESSION['userMatricNo'];
            $tablename = "users";
            echo $title = "<title> Assignment Submission: ". $load_data->getFirstname($theID, $tablename)." ". $load_data->getLastname($theID, $tablename)." (u".$theID .")</title>";
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
             <h4><strong><?php echo "Submit Assignment: ". $load_data->getFirstname($theID, $tablename)." ". $load_data->getLastname($theID, $tablename)." (u".$theID .")"?></strong></h4>
            </header>

        <content><br/>
            <div class="featured" <?php if(isset($style)) echo $style; ?>> <?php if(isset($results)) echo $results; ?></div>
            <form class="enrollform" enctype="multipart/form-data" method="post">
                <div id="personalInfo">
                    <fieldset>
                        <legend><strong>Programme Information</strong></legend>
                        <table width="100%" border="0" cellpadding="1">
                <tr>
                    <td class="enrollNormal enrollfirstTd">Programme: *</td>
                    <td class="enrollsecondTd">
                        <label class="enrollMobile">Programme: *</label>
                             <select name="txtCourse" id="txtCourse" onchange="getModules()">
                            <option value="<?php echo $load_data->getCourse($theID, $tablename)?>"><?php echo $load_data->getCourse($theID, $tablename)?></option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td class="enrollNormal enrollfirstTd">Semester: *</td>
                    <td class="enrollsecondTd">
                        <label class="enrollMobile">Semester: *</label>
                        <select name="txtSemester" id="txtSemester" onchange="getModules()">
                            <option value=""> Select Semester </option>
                            <option value="Semester A"> Semester A </option>
                            <option value="Semester B"> Semester B </option>
                            <option value="Semester C"> Semester C </option>
                        </select>
                    </td>
                </tr>

            <tr>
                <td class="enrollNormal enrollfirstTd">Modules: *</td>
                <td class="enrollsecondTd">
                    <label class="enrollMobile">Modules: *</label>
                    <select name="txtModules" id="txtModules">
                    </select>
                </td>
            </tr>

                    </table>
            </fieldset>

            <fieldset>
                <legend><strong>Course Work</strong></legend>
                <table width="100%" border="0" cellpadding="1">
                    <tr>
                        <td class="enrollNormal enrollfirstTd">Assignment: *</td>
                        <td class="enrollsecondTd">
                            <label class="enrollMobile">Assignment:</label>
                            <input type="file" name="txtAssignment" id="txtAssignment"></td>
                    </tr>
                </table>
                <p>
                    <input type="hidden" name="submitID" value="<?php echo $theID; ?>">
                    <input id="p_info" type="submit" name="parseUploadAssignment"
                          style="float:right;" class="btn" value="Submit Assignment"> </p>
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