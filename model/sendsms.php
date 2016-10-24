<?php

class sendsms{
	public function __construct(){}
	
	function gw_send_sms($user,$pass,$sms_from,$sms_to,$sms_msg)  
            {           
					$query_string = "api2.aspx?apiusername=".$user."&apipassword=".$pass;
					$query_string .= "&senderid=".rawurlencode($sms_from)."&mobileno=".rawurlencode($sms_to);
					$query_string .= "&message=".rawurlencode(stripslashes($sms_msg)) . "&languagetype=1";   
					$url = "http://gateway80.onewaysms.com.my/".$query_string; 
					$fd = @implode ('', file ($url));	  
            } 
}
?>