<?php
require_once('sendsms.php');
	
	function delevire_meesage($no,$message){
		$sendsms=new sendsms("http://alerts.sinfini.com/web2sms.php", "177504m2f7366sc9vju07", "GHARBA"); 
		$mid = $sendsms->send_sms($no, $message, "http://www.gharbaithepao.com/users/", "xml");
		$did = $sendsms->messagedelivery_status($mid);
		return $did;
	}
?>
