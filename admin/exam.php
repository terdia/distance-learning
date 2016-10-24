<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administrator's Zone | Schedule Exams </title>
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
                <h4><strong>
                        <?php echo $load_data->getFirstname($theID, $tablename)." ". $load_data->getLastname($theID, $tablename) ?>
                    </strong>
                </h4>
            </header>
            
            <footer>
                <h5>Schedule Exam</h5>
            </footer>

            <content>
                <div id="success">
                    <img src="images/check.png" width="70" height="70">
                </div>
                <div class="featured"> </div>

             <form class="enrollform">
                <div id="personalInfo">
                <fieldset>
                <legend><strong>Programme Information</strong></legend>
                <table width="100%" border="0" cellpadding="1">
                <tr>
                    <td class="enrollNormal enrollfirstTd">Programme: *</td>
                    <td class="enrollsecondTd">
                        <label class="enrollMobile">Programme: *</label>
                        <select name="txtCourse" id="txtCourse" onchange="getModules()">
                            <?php echo $helper->getProgramme(); ?>
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
                        <legend><strong>Exam Questions</strong></legend>
                        <table width="100%" border="0" cellpadding="1">
                        <tr>
                        <td class="enrollNormal enrollfirstTd">Question 1: *</td>
                        <td class="enrollsecondTd">
                        <label class="enrollMobile">Question 1: *</label>
                         <textarea name="txtQuestion1" id="txtQuestion1"></textarea></td>
                        </tr>

                        <tr>
                            <td class="enrollNormal enrollfirstTd">Question 2: *</td>
                            <td class="enrollsecondTd">
                                <label class="enrollMobile">Question 2: *</label>
                                <textarea name="txtQuestion2" id="txtQuestion2"></textarea></td>
                        </tr>

                        <tr>
                            <td class="enrollNormal enrollfirstTd">Question 3: *</td>
                            <td class="enrollsecondTd">
                                <label class="enrollMobile">Question 3: *</label>
                                <textarea name="txtQuestion3" id="txtQuestion3"></textarea></td>
                        </tr>

                        <tr>
                            <td class="enrollNormal enrollfirstTd">Question 4: </td>
                            <td class="enrollsecondTd">
                                <label class="enrollMobile">Question 4: </label>
                                <textarea name="txtQuestion5" id="txtQuestion5"></textarea></td>
                        </tr>
                    </table>
                </fieldset>

                    <fieldset>
                        <legend><strong>Exam Preference</strong></legend>
                        <table width="100%" border="0" cellpadding="1">
                            <tr>
                                <td class="enrollNormal enrollfirstTd">Duration: *</td>
                                <td class="enrollsecondTd">
                                    <label class="enrollMobile">Duration: *</label>
                                    <input style="width: 10%;" type="text" name="txtDuration" maxlength="2" id="txtDuration"> (eg. 90 = 1 Hour 30 Mins)
                                </td>
                            </tr>

                            <tr>
                                <td class="enrollNormal enrollfirstTd">Exam Date: *</td>
                                <td class="enrollsecondTd">
                                    <label class="enrollMobile">Exam Date: *</label>
                                    <select name="txtDay" style="width:22%;" id="txtDay">
                                        <option value=""> Day </option>
                                        <?php $helper->getDay();?>
                                    </select>

                                    <select name="txtMonth" style="width:46.4%;" id="txtMonth">
                                        <option value=""> Month </option>
                                        <?php $helper->getMonth();?>
                                    </select>

                                    <select name="txtYear" style="width:26%;" id="txtYear">
                                        <option value="2014"> 2014 </option>
                                        <option value="2015"> 2015 </option>
                                        <option value="2016"> 2016 </option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <p><input id="p_info" type="submit" name="parseScheduleExam"
                                  style="float:right;" class="btn" value="Upload Questions" onclick="return false" onmousedown="parseExam()"> </p>
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