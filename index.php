<?php ob_start(); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Embedded Cloud Based Distance Learning Portal For FTMS College | Home</title>

    <?php include_once("view/header.php");?>
    <div id="mainContent">
    	
        <div id="centerTopContent">
        
        <div class="topContent">
        	<article>
            	<content>
                <img src="images/slide.jpg" alt="slide" width="100%">
                </content>
            </article>
        </div>
        
        <div class="topContent">
        
        <div class="courseList orange">
        	<article>
            
            <header>
             <h3>MSc in Internet Systems</h3>
            </header>
            
            	<content>
               		<p> The 100% online MSc in Internet Systems from FTMS College
                     offers ambitious web developers 
                    the opportunity to amass high-level technical skills 
                    ... <br><br>
                    <a href="course?cname=MSc in Computer Security" class="clearLink" title="Read More">Read More</a></p>
                </content>
                
            </article>
        </div>
        
        <div class="courseList2 blue">
        	<article>
            
            	<header>
             <h3>MSc in Software Engineering</h3>
            </header>
            
            	<content>
               		<p> 
                    The 100% online MSc in Software Engineering is designed
                    to provide students with a complete understanding 
                    of every aspect of the ...<br><br>
                    <a href="course?cname=MSc in Software Engineering" class="clearLink" title="Read More">Read More</a>
                    </p>
                </content>
                
            </article>
        </div>
        
        <div class="courseList3 green">
        	<article>
            
            	<header>
             <h3>MSc in Computer Security</h3>
            </header>
            
            	<content>
               		<p> 
                    The 100% online MSc in Computer Security
                    from FTMS College aims to equip students with the 
                    knowledge and skills to handle the challenges of 
                    this ... <br><br>
                    <a href="course?cname=MSc in Computer Security" class="clearLink" title="Read More">Read More</a>
                    </p>
                </content>
                
            </article>
        </div>
        </div>
        
        <div class="spacer" style="clear: both;"></div>     
        
        <div class="topContent">   
        <div class="about">
        	<article>
            
            <header>
             <h4><strong>About Us</strong></h4>
            </header>

            	<content>
               		<p> 
                    FTMS College is one of the great centres of research, knowledge and innovation.  
                    </p>
                    
                    <p>
                    Its pioneering reputation attracts students, experts and partners from 
                    around the world.
                    Through its research, teaching and collaborations the college seeks 
                    to. <br><br>
                    <a href="about" class="readMore orange">Read More</a>
                    </p>
                </content>
                
            </article>
        </div>
        
        <div class="online">
        	<article>
            
            	<header>
             <h4><strong>Online Learning</strong></h4>
            </header>
            
            	<content>
               		<p> 
                    These demands are way beyond the capabilities of traditional classroom and 
                    distance learning methods.  
                    </p>
                    
                    <p> 
                    By bringing like minded professionals together 
                    in our unique 100% online learning environment, we enable them to share the 
                    latest thinking from the real world.<br><br>
                    <a href="course?cname=Online Learning" class="readMore orange">Read More</a>
                    </p>
                </content>
                
            </article>
        </div>
        
        <div class="admission">
        	<article>
            
            <header>
             <h4><strong>Admission</strong></h4>
            </header>
            
            	<content>
               		<p> 
                    These demands are way beyond the capabilities of traditional classroom and 
                    distance learning methods.  
                    </p>
                    
                    <p> 
                    By bringing like minded professionals together 
                    in our unique 100% online learning environment, we enable them to share the 
                    latest thinking from the real world.<br><br>
                    <a href="course?cname=Admission and Financing" class="readMore orange">Read More</a>
                    </p>
                </content>
                
            </article>
        </div>
        </div>
        
        <div class="spacer" style="clear: both;"></div>


		<div class="topContent">   
        <div class="about dottedLine">
        	<article>
            
            <header>
             <h4><strong>Our Staff</strong></h4>
            </header>

            	<content>
               		<p> 
                    <img src="images/zahinade.jpg" id="staff_desc" width="100%" height="220" alt="staff">
                    </p>
                    
                    <p id="desc">
                 		Mr. Zainudin Johari, Head School of Engineering & Computing Sciences
                    </p>
                </content>
                
            </article>
        </div>
        
        <div class="online dottedLine">
        	<article>
            
            	<header>
             <h4><strong>You'll benefit from:</strong></h4>
            </header>
            
            	<content>
               		<p> 
                    <ul>
                    <li>A flexible and progressive online learning format</li>
                    <li>A collaborative learning environment</li>
                    <li>Immediate, real-world application</li>
                    <li>A variety of specialization options</li></ul>  
                    </p>
                    
                    <p> 
                    Join over 3,500 graduates From more than 140 countries.
                    </p>
                </content>
                
            </article>
        </div>
        
        <div class="admission dottedLine">
        	<article>
            
            <header>
             <h4><strong>Why study online with FTMS</strong></h4>
            </header>
            
            	<content>
               		<p> 
                    <iframe width="100%" height="278"
                    src="//www.youtube.com/embed/ZlvoU03H4Eo?list=UUEFb8Xj7wvJr-Uxe5FZN3tg"
                     frameborder="0" allowfullscreen></iframe>
                    </p>
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