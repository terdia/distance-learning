<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administrator's Zone | View Submitted Assignment </title>
    <?php include_once("view/header.php");
		if(isset($_SESSION['adminName']) && isset($_SESSION['adminPass'])){
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
                <footer><h5>View Submitted Assignment</h5></footer>

            <content>
                <div class="result"><?php echo $helper->loadAssignment()?></div>
                <p><a href="<?php if(isset($back)) echo $back; ?>" class="readMore orange" title="Back to previous Page">Back to previous Page</a></p>
            </content>
            </article>
        </div>
            <div class="adminLoginSide">
                <?php echo $sideBar;?>
            </div>
        </div>
		<div class="mainFooter" style="width:99%; margin-left:5px;">
 				
        <div class="topContent" > <?php include_once('view/footer.php'); ?> </div>
        <div class="spacer" style="clear: both;"></div>
        </div><!--Top Content end here-->     

</div>
</body>

</html>