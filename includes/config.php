<?php
/**Database Connection**/

define('DB_SERVER', 'localhost'); // Hosting  Server 
define('DB_USERNAME', 'astalaxm_mpmalla');	// Database User name
define('DB_PASSWORD', 'mallareddy');			//Database Password
define('DB_DATABASE', 'astalaxm_mpmalla');	// Database Name
class DB_Class
{
	function __construct()
{
	$connection = mysql_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or
	die('Oops connection error -> ' . mysql_error());
	mysql_select_db(DB_DATABASE, $connection)
	or die('Database error -> ' . mysql_error());
}
}

?>