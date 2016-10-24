<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administrator's Zone | Manage Courses</title>

    <?php include_once("view/header.php");
		if(isset($_SESSION['adminName']) && isset($_SESSION['adminPass'])){
			$loggedinuser = $_SESSION['adminName'];
			//$_SESSION['non-index'] = true;
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
            <footer><h5>Update Finacial Record</h5></footer>
            <content>
            	<div id="success">
                <img src="images/check.png" width="70" height="70">
                </div>
                
                <div class="featured"> </div>
                
                <form action="" method="post" class="enrollform">
                <div id="personalInfo">
                <fieldset id="course_info">
                <legend><strong>Payment Breakdown</strong></legend>
                <table width="100%" border="0" cellpadding="1">
                    <tr>
                        <td class="enrollNormal enrollfirstTd">Passport / IC No.:</td>
                        <td class="enrollsecondTd">
                            <label class="enrollMobile">Passport No.:</label>
                            <input type="text" name="txtIC" id="txtIC"
                                   size="50"></td>
                    </tr>

                    <tr>
                    <td class="enrollNormal enrollfirstTd">Amount Due (RM):</td>
                    <td class="enrollsecondTd">
                    <label class="enrollMobile">Amount Due (RM):</label>
                    <input type="text" name="txtAmountDue" id="txtAmountDue"
                    size="50" onchange="getBalance()"></td>
                  </tr>

                    <tr>
                        <td class="enrollNormal enrollfirstTd">Amount Paid (RM):</td>
                        <td class="enrollsecondTd">
                            <label class="enrollMobile">Amount Paid (RM):</label>
                            <input type="text" name="txtAmountPaid" id="txtAmountPaid"
                             size="50" onchange="getBalance()"></td>
                    </tr>

                    <tr>
                        <td class="enrollNormal enrollfirstTd">Balance (RM):</td>
                        <td class="enrollsecondTd">
                            <label class="enrollMobile">Balance (RM):</label>
                            <input type="text" name="txtBalance" id="txtBalance"
                             size="50" disabled="disabled"></td>
                    </tr>

                </table>

                <p><input id="c_info" name="addDues" type="button"
                        style="float:right;" onclick="parseUpdateDue()"
                        class="btn" value="Update Due"> </p>
                                        
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