<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Embedded Cloud Based Distance Learning Portal For FTMS College | Online Programmes</title>

    <?php include_once("view/header.php");?>
    
    <div id="mainContent">
        
        <div class="spacer" style="clear: both;"></div>     
        
        <div class="topContent">   
        <div class="aboutDesc">
        	<article>
            
            <header>
             <h4><strong>FTMS College Online Programmes</strong></h4>
            </header>

            	<content>
               		<h5>MSc in Computer Security</h5>
                    <p>
						The 100% online MSc in Computer Security from FTMS COllege aims to equip students with the knowledge and skills to handle the challenges of this fast-expanding area. Students examine the global threats to electronically stored and transmitted information, and the countermeasures that can be used against them.
                    <br><br>
                    <a href="course?cname=MSc in Computer Security" class="readMore orange" title="Read More">Learn More</a>
                    </p>
                    

                    
                    <h5>MSc in Software Engineering</h5>
                    <p> 
                    The 100% online MSc in Software Engineering is designed to provide students with a complete understanding of every aspect of the development process, from concept and design to testing, QA and implementation. In addition, students can customise their degree by choosing from a variety of elective modules – XML, e-commerce, security engineering and more.
                    <br><br>
                    <a href="course?cname=MSc in Software Engineering" class="readMore orange" title="Read More">Learn More</a>
                    </p>
                    
                    <h5>MSc in Internet Systems</h5>
                    <p>
						The 100% online MSc in Internet Systems from FTMS COllege offers ambitious web developers the opportunity to amass high-level technical skills and knowledge that will enable them to master the most complex internet projects. It offers the theoretical and practical expertise needed to produce better functioning, scalable systems in a wide variety of commercial and other contexts.                    
                    <br><br>
                    <a href="course?cname=MSc in Internet Systems" class="readMore orange" title="Read More">Learn More</a>
                    </p>
                    
                </content>
                
            </article>
        </div>
        
        <div class="aboutDescSide">
        	<article>
            	<header>
             <h4><strong>Ouality Partners</strong></h4>
            </header>
            
            	<content>
               		<p> 
                    <img src="images/uel.jpg" height="120" width="100%" alt="uel">
                    </p>
                    
                    <p>
                    The strategic decision to collaborate with the University of East London (UEL) for the provision of two postgraduate degree programmes and three undergraduate degree programmes
                    </p>
                    
                    <p> 
                    <img src="images/ports.jpg" height="120" width="100%" alt="ports">
                    </p>
                                   
                    <p>
                   The University offer Distance Learning programmes for which FTMS College is a support centers.
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