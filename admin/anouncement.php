<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administrator's Zone | Post Announcement</title>

    <?php include_once("view/header.php");

    if(isset($_SESSION['adminName']) && isset($_SESSION['adminPass'])){
			$loggedinuser = $_SESSION['adminName'];
        $theID = $_SESSION['adminID'];
        $tablename = "staff";
        include_once("model/parseComment.php");
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
                <h5>Post Announcement</h5>
            </footer>

            <content>
            	<div id="success">
                <img src="images/check.png" width="70" height="70">
                </div>

                <div id="post">
                    <form class="instantform" method="post">
                        <input type="hidden" name="txtPostID" id="txtPostID" value="<?php echo $theID ?>">
                        <input type="hidden" name="txtPostUsername" id="txtPostUsername" value="<?php echo $load_data->getFirstname($theID, $tablename) ?>">
                        <textarea id="postTextarea" name="postTextarea" title="Announcement"></textarea>
                        <input type="submit" value="Share" class="btn"  style="width: auto; float: right;">
                    </form><br>
                    <?php echo $load_data->getComment(); ?>
                </div>

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