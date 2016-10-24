<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administrator's Zone | Upload Result </title>
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
                <h5>Upload Result</h5>
            </footer>

            <content>
                <div id="success">
                    <img src="images/check.png" width="70" height="70">
                </div>
                <div class="featured"> </div>

             <form class="enrollform">
                <div id="personalInfo">
                    <fieldset>
                        <legend><strong>Select Subject</strong></legend>
                        <table width="100%" border="0" cellpadding="1">
                            <tr>
                                <td class="enrollNormal enrollfirstTd">Modules: *</td>
                                <td class="enrollsecondTd">
                                    <label class="enrollMobile">Modules: *</label>
                                    <select name="txtExamModules" id="txtExamModules" onchange="getExam()">
                                        <option value=""></option>
                                        <?php echo $helper->getExamlist(); ?>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </fieldset>
                </div>
                 <div id="examDiv">
                    <p><strong>Please select students from the drop down list above to upload Result.</strong></p>.
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