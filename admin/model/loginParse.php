<?php
function __autoload($classname){
	$folders = array(
            'model/',
            '../connection/'
            );

            foreach($folders as $folder){
            	if(file_exists($folder.$classname. '.php')){
            		require_once($folder.$classname. '.php');
            		return;
            	}
            }
}

if(isset($_REQUEST['username']) && isset($_REQUEST['pw'])) {
	$u = $_REQUEST['username'];
	$p = $_REQUEST['pw'];
	
	try{
        $con = new data();
        $sql = "select * from staff WHERE email= :email AND password = :pass";
		$statement = $con->prepare($sql);
        $statement->bindParam(':email', $u);
        $statement->bindParam(':pass', $p);
        $statement->execute();
        if($statement->rowCount() === 1){
            while ($row = $statement->fetch()){
                $email = $row['email'];
                $password = $row['password'];
                $profile = $row['profile'];
                $id = $row['staff_id'];
                $course = $row['course'];
                session_start();

                $_SESSION['adminName'] = $email;
                $_SESSION['profile'] = $profile;
                $_SESSION['adminPass'] = $password;
                $_SESSION['adminID'] = $id;
                $_SESSION['course'] = $course;
                // GET USER IP ADDRESS
                $ipaddress = getenv('REMOTE_ADDR');

                $sql = "UPDATE staff SET last_login=now(), last_login_ip=:ip
                WHERE staff_id=:id";
                $statement = $con->prepare($sql);
                $statement->execute(array(':ip'=> $ipaddress, ':id'=>$id));
                if($statement->rowCount() == 1){
                    echo "?email=".md5($email)."&password=".md5($password);
                }
            }
        }else{
            echo "Invalid username or password";
        }
	}
    catch(PDOException $e){
        echo "A database problem has occurred: " . $e->getMessage();
    }
}
