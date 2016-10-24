<div class="about mainFooterColor">
        	<article>
            
            <header>
             <h3><strong>Menu</strong></h3>
            </header>

                <?php
                if(isset($_SESSION['userEmail']) && isset($_SESSION['userPass']) && $_SESSION['profile'] === "Student"){
                    $footerMen = '<a href="index">
                    <a href="content"> Go To Class</a>&nbsp;|&nbsp;
                   	 <a href="download_assignment">Download Assignment</a>&nbsp;|&nbsp;
                    <a href="profile">View Profile</a>&nbsp;|&nbsp;
                     <a href="forum">Forum</a>&nbsp;|&nbsp; <a href="logout">Logout</a>';
                }else{
                    $footerMen = '<a href="index"> Home</a>&nbsp;|&nbsp;
                    <a href="course?cname=Admission and Financing"> Admission</a>&nbsp;|&nbsp;
                   	 <a href="course?cname=Privacy Policy"> Privacy Policy</a>&nbsp;|&nbsp;
                    <a href="course?cname=Online Learning">Learning Online</a>&nbsp;|&nbsp;
                     <a href="account">Returning Student</a>&nbsp;|&nbsp; <a href="admin">Staff Login</a>';
                }
                ?>

            	<content>
               		<p style="color:#fff;"> 
                        <?php echo $footerMen ?>
                         <br>&copy;2014 FTMS College
                    </p>
                    <p>Site Designed By: <a href"#"> Osayawe Ogbemudia Terry (u1061882)</a></p>

                </content>
                
            </article>
        </div>
        
        <div class="online mainFooterColor">
        	<article>
            
            	<header>
             <h3><strong>STAY UPDATED</strong></h3>
            </header>
            
            	<content>
                <p>Please provide your email address in the field below if you wish to
                recieve email updates from FTMS College.  </p>
               	<p>
                
               <div id="SubScriberesponse"> </div>              
               <form>
                  <table width="100%" cellspacing="1">
                  <tr><td>
                  <input type="text" class="formField" style="height:25px;" 
                  name="Cemail" id="Cemail" placeholder="Your Email"> </td>
                  <td><input type="submit" id="client" value="Add Me"
                  class="readMore orange" 
                  onClick="return false" onMouseDown="subscribe();"> </td> </tr>
                  </table>
              </form>
                </content>
                
            </article>
        </div>
        
        <div class="admission mainFooterColor">
        	<article>
            
            <header>
             <h3><strong>FTMS College </strong></h3>
            </header>
            
            	<content>
               		<p> 
                    Address: Technology Park Malaysia, Bukit Jalil, 57000 Kuala Lumpur, Federal Territory of Kuala Lumpur, Malaysia
                    </p>
                    
                    <p>Hours: Monday 9:00 am – 6:00 pm</p>
                </content>
                <?php ob_end_flush(); ?>
            </article>
        </div>
        </div>  