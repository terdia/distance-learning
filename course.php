<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Embedded Cloud Based Distance Learning Portal For FTMS College | Online Programmes</title>
    <?php include_once("view/header.php");?>
    
    <?php include_once("model/parser.php");?>

    
    <div id="mainContent">
        
        <div class="spacer" style="clear: both;"></div>     
        
        <div class="topContent">   
        <div class="aboutDesc">
        	<article>
            
            <header>
             <h4><strong><?php if(isset($coursename)) echo $coursename; ?></strong></h4>
            </header>

            	<content> <?php if(isset($desc)) echo $desc; ?> 
                
                </content>
                
            </article>
            <footer>
             <p><a href="<?php if(isset($back)) echo $back; ?>" class="readMore orange" title="Back to previous Page">Back to previous Page</a></p>
			</footer>
            
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