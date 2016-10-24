<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administrator's Zone | Manager Users</title>

    <?php include_once("view/header.php");
        if(isset($_SESSION['profile']) && $_SESSION['profile'] === "Admin"){
            $test = "yes";
        }
        else if(isset($_SESSION['profile']) && $_SESSION['profile'] === "Lecturer"){
            $helper->redirect_to("upload_course_materials");
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

                <footer><h5>
                        <div class="enrollform" style="width: 90%"> <form method="post">
                                <input type="text" id="searchU" class="searchField" name="searchPser" onkeyup="searchUser()" onfocus="focusUser()" onblur="blurUser()"
                                       value="Search by name, school, nationality, or Passport No."> </form></div>
                </h5></footer>

            <content>
                <div class="displayCourses orange"><a class="loaduser" title="Click to view existing students" onclick="loadUser('users')">Manage Existing Students Account</a></div>
                <div class="displayCourses blue"><a class="loaduser" title="Click to view lecturers" onclick="loadUser('staff')">Manage Existing Lecturers Account</a></div>
                <div class="result"></div>
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