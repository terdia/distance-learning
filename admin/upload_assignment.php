<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administrator's Zone | Upload Assignment </title>
    <?php include_once("view/header.php");
    if(isset($_SESSION['adminName']) && isset($_SESSION['adminPass'])){
			$loggedinuser = $_SESSION['adminName'];
            $theID = $_SESSION['adminID'];
            $tablename = "staff";
		}else{
			$helper->redirect_to("login");
		}
    include_once("model/parseAssignment.php");
?>
    
    <div id="mainContent">      
        <div class="topContent">   
         <div class="adminLogin">
        	<article>
            
            <header>
           		<h4><strong>
                        <?php echo $load_data->getFirstname($theID, $tablename)." ". $load_data->getLastname($theID, $tablename) ?>
                    </strong></h4>
            </header>
            
            <footer>
                <h5>Upload Assignments</h5>
            </footer>

            <content>
            	<div id="success">
                <img src="images/check.png" width="70" height="70">
                </div>
             <div class="featured" <?php if(isset($style)) echo $style; ?>> <?php if(isset($result)) echo $result; ?></div>
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

                            <tr>
                                <td class="enrollNormal enrollfirstTd">Assignment Title: *</td>
                                <td class="enrollsecondTd">
                                    <label class="enrollMobile">Assignment Title: *</label>
                                    <input type="text" name="txtModuleTopic" id="txtModuleTopic">
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
                    <p><input id="p_info" type="submit" name="parseUploadAssignment"
                     style="float:right;" class="btn" value="Upload Assignment"> </p>
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