<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Administrator's Zone | View Courses</title>

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
            <br />
            <footer> <div class="enrollform" style="width: 90%"> <form method="post">
                        <input type="text" id="searchF" class="searchField" name="searchTerm" onkeyup="searchCourse()" onfocus="focusSearch()" onblur="blurSearch()"
                          value="Search by module code, semester or course title"> </form></div>
            </footer>

            <content>
                <div class="displayCourses orange" title="Click to view MSc in Internet Systems courses"><a class="loadcourse" name="MSc in Internet Systems" onclick="loadCourse('MSc in Internet Systems')">MSc in Internet Systems</a></div>
                <div class="displayCourses blue" title="Click to view MSc in Software Engineering courses"><a class="loadcourse" name="MSc in Software Engineering" onclick="loadCourse('MSc in Software Engineering')"> MSc in Software Engineering</a></div>
                <div class="displayCourses green" title="Click to view MSc in Computer Security courses"><a class="loadcourse" name="MSc in Computer Security" onclick="loadCourse('MSc in Computer Security')">MSc in Computer Security</a></div>
                <div class="result"> </div>
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