<?php 
	function get_sms_conf()
	{
		ini_set('display_errors',1);
		ini_set('include_path',ini_get('include_path').':/home/vtplc276/php');	
		require_once 'HTTP/Request2.php';
		
		$r = new HTTP_Request2('http://trans.smssolutions.in/SendSms.aspx',HTTP_Request2::METHOD_GET, array('use_brackets' => true)); 
		$url = $r->getUrl();
		$url->setQueryVariable('username','ponnam');
$url->setQueryVariable('password','ponnam999');
		$url->setQueryVariable('from','PONNAM');
		return $r;
	}
?> 