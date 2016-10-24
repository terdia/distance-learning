# PHP Distance learning System by Terry Osayawe - 2014 

#Installation Guide
In other to run the successfully run the system on your local machine the following steps must be followed carefully:

Step 1: Download and Install Wamp Server – you may refer to this link for the required steps to download and install Wamp server http://www.slideshare.net/triniwiz/wamp-20949805 

Step 2: Open the folder name “System” inside the “project – u1061882” folder, you will see a zip file name “distance_learning.zip” copy it to your desktop.

Step 3: Extract the zip file “distance_learning.zip” a new folder name “distance_learning” will be created copy it and navigate to “Wamp” folder inside C: drive

Step 4: Open “Wamp” folder you will see a folder name “www” paste the “distance_learning” folder inside.

Step 5: Start Wamp server (if you created shortcut menu during installation the icon for Wamp server will be on your desktop, double click to start Wamp server). You can also start Wamp server from by navigating to start menu -> All programs -> Wamp Server -> Start Wamp Server

Step 6: The next step is to install the database, to do that Open your web browser and enter the URL - http://localhost/phpmyadmin/ when the phpmyadmin open perform the following steps
    
    1)	Click on import  
    
    2)	Click on browse and navigate to the folder named “project – u1061882”, open it you will see another folder name “Database” open it and select the file “project.sql”  
    
    Click Go  

Step 7: Configure database connection string – navigate to the folder “distance_learning” which was copied to “www” folder inside “Wamp” folder in your C: drive. 
C:\wamp\www\distance_learning\connection
Open the connection folder you will see a file name “Data.php” open it with any text editor and change the following information as shown below:

Username – username is the username for your MySQL Database the default is root
Password – password for you MySQL Database the default is empty string “”
See the diagram below:

Navigate to C:\wamp\www\distance_learning\admin\ connection
You will also see a file name “Data.php” open it with any text editor and repeat the step above (change username and password, it must be same with the one above)

Step 8: Viewing the system – type http://localhost/distance_learning/ in your web browser, you should see the home page

You many use the following data to access existing accounts

#STUDENT ACCOUNT:
For student click on “Student Login” and enter the following:
 
Username: joy@yahoo.com	
Password: testing

For admin and Lecturer account click on “staff login” in the footer of the page
 
#ADMIN ACCOUNT:
Username – terrymarcy2000@yahoo.com
Password – 17-May-1983

LECTURER ACCOUNT:
Username – riyaz@ftms.edu.my 
Password - testing

If you encounter any difficulties please email terrymarcy20002yahoo.com 



