<?php 
function __autoload($classname){
        $folders = array(
            '../model/',
            '../connection/'
        );

            foreach($folders as $folder){
                if(file_exists($folder.$classname. '.php')){
                    require_once($folder.$classname. '.php');
                    return;
                }
        }
    }

	$con = new data();
	$sms = new sendsms();
 	if(isset($_REQUEST['aemail']) && $_REQUEST['aemail'] != "") {
		$aemail = $_REQUEST['aemail'];
		$upass = $con->query("SELECT * FROM staff
							  WHERE email='$aemail' LIMIT 1");	
							  		
			if($rs = $upass->fetch()){
				$password = $rs['password'];
				$email = $rs['email'];
				$phone = $rs['phone'];
				
				$message_string = "Your login password for FTMS Online Learning is ".$password;

				$sms->gw_send_sms("API0Y6K7OXTEH", "API0Y6K7OXTEH0Y6K7", 
				"Terdia", $phone, $message_string);
				
				echo "Your password has been sent to your mobile phone";
			}
			else{
				echo "This email is not resgistered in our system";
			}
}


