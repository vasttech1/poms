<?php 
	function send_sms($message,$mobile)
	{
		require_once('sms_conf.php');
		$r = get_sms_conf(); 
		$url = $r->getUrl();
		$url->setQueryVariable('message',$message);
		$url->setQueryVariable('to',$mobile);
		try
		{ 
			$response = $r->send();
			return $response;
		}
		catch (HTTP_Request2_Exception $ex)
		{ 
			echo $ex; 
		} 
	}
?> 