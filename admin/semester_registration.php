<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administrator's Zone | Module Registration</title>

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
            
            <footer>
                <h5>New Semester Registration</h5>
                <div class="enrollform" style="width: 90%"> <form method="post">
                        <input type="text" id="searchStudent" class="searchCreteria"
                               name="searchDataPassport" onkeyup="searchStudentData()"
                               onfocus="focusStudentData()" onblur="blurStudentData()"
                               value="Search student using passport number"> </form></div>
            </footer>

            <content>
            	<div id="success">
                <img src="images/check.png" width="70" height="70">
                </div>
                
                <div class="featured"> </div>
                
             <form action="" method="post" class="enrollform">
                <div id="contact_info">

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