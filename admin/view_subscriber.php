<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administrator's Zone | Subscriber List</title>

    <?php include_once("view/header.php");
		if(isset($_SESSION['adminName']) && isset($_SESSION['adminPass'])){
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
                <footer><h5>Newsletter Subscription List</h5></footer>

            <content>
                <div class="result"><?php echo $helper->loadSubscribers()?></div>
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