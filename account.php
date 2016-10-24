<?php ob_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Embedded Cloud Based Distance Learning Portal For FTMS College | Online Programmes</title>
    <?php include_once("view/header.php");
    if(isset($_SESSION['profile'])){
        $helper->redirect_to('profile');
    }
    ?>
    <div id="mainContent">
        <div class="spacer" style="clear: both;"></div>
        <div class="topContent">   
        <div class="contactDetails">
        	<article>
            <header>
           		<h4><strong>Returning Student</strong></h4>
            </header>
       			<footer><h5>Instant Login Form</h5> </footer>
            	<content>                 
                    <p>
                    <div id="loading"><p>Please enter your login details 
                    <img src="images/fbloader.gif" alt="loading…" /></p></div>
                    <form class="instantform">
                        <label>Username:</label>
                        <input type="text" onKeyUp="login()" id="username" name="username" />
                        <label>Password:</label>
                        <input type="password" id="pw" name="pw" 
                        onKeyUp="login()" /><br><br>
                        <input id="toggleBtn" type="button" 
                        style="float:right;" onclick="togglePassword()" class="btn"
                        value="Show Password Text">
                    </form>
                    </p>
                   <br>
                    <p id="closepassword"> <strong>If your username and password 
                    is correct 
                    you will be logged in automatically.</strong> <a href="#" 
                    onClick="return false" onMouseDown="openForgot();">
                    Forgot Password?</a></p>
                    <div id="forgotPassword"> 
                    Please enter your email address in the field below.<br><br>
                    <p class="featured"></p>

                    <form class="instantform">
                    <label>Email:</label>
                        <input type="text" id="uemail" name="uemail" />
                    </form>
                    </div>
                    
                </content>
                
            </article>
        </div>
        
        <div class="contactMap">
        	<article>
            
            	<header>
             <h4><strong>Location Map</strong></h4>
            </header>
            
            	<content>
               		<p> 
					<iframe width="100%" frameborder="0" class="mapHeight" 
                    scrolling="no" marginheight="0" marginwidth="0" 
                    src="https://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=FTMS+College+Technology+Park+Malaysia&amp;aq=&amp;sll=4.689292,100.897472&amp;sspn=6.959696,9.876709&amp;ie=UTF8&amp;hq=FTMS+College+Technology+Park+Malaysia&amp;hnear=&amp;ll=4.689292,100.897472&amp;spn=6.959696,9.876709&amp;t=m&amp;output=embed"></iframe> </p>
                </content>
                
            </article>
        </div>
        
        
        </div>
        
        <div class="spacer" style="clear: both;"></div>


			<div class="mainFooter">
 				
        <div class="topContent"> <?php include_once('view/footer.php'); ?> </div>
              
        <div class="spacer" style="clear: both;"></div>
           

        </div><!--Top Content end here-->     
    </div>

<?php if(!isset($_SESSION['profile'])){ include_once("view/requestform.php");}?>

</div>
</body>

</html>