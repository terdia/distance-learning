<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Embedded Cloud Based Distance Learning Portal For FTMS College | Administrator's Zone</title>

    <?php include_once("view/header.php");?>

    <div id="mainContent">
        
        <div class="spacer" style="clear: both;"></div>     
        
        <div class="topContent">   
         <div class="adminLogin">
        	<article>
            
            <header>
           		<h4><strong>Administrator's Zone</strong></h4>
            </header>
            
       			<footer><h5>Instant Login Form</h5> </footer>

            	<content >
                <div class="arrangeAdminLogin">
                    <p>
                    <div id="loading">
                    <p>Please provide your valid login information in the form below </p>
                    </div>
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
                    <p id="closepassword"> <a href="#" 
                    onClick="return false" onMouseDown="openForgot();">
                    Forgot Password?</a></p>
                    <div id="forgotPassword"> 
                    Please enter your email address in the field below.<br><br>
                    <p class="featured"></p>

                    <form class="instantform">
                    <label>Email:</label>
                        <input type="text" id="aemail" 
                        name="aemail" onKeyUp="retrivePassword()" />
                    </form>
                    </div>
                </content>
                </div>
            </article>
        </div>
        
        <div class="adminLoginSide">
        	<article>
            
            	<header>
             <h4><strong>Upcoming Events </strong></h4>
            </header>
            
            	<content>
                  <p><img src="images/important.jpg" height="170" alt="important"> </p>
                   
                    <p>
                    	Monthly management meeting with the General Manager,
                        for the month of may is scheduled to hold on the
                        17th May, 2014.
                     </p>
                     <p><strong>Attendance is compulsory</strong></p>
                    
  					<h5>Venue: Conference Room.</h5>
                    <h5>Time: 10am - 2pm:</h5>

                </content>
                
            </article>
        </div>
        
        
        </div>
        
        <div class="spacer" style="clear: both;"></div>

        <div class="mainFooter" style="width:99%; margin-left:5px;"> 	
        			
        <div class="topContent"> <?php include_once('view/footer.php'); ?> </div>
              
        <div class="spacer" style="clear: both;"></div>
           

        </div><!--Top Content end here-->     
    </div>

</div>
</body>

</html>