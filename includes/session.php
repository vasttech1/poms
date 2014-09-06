<?php 
ob_start();
error_reporting(E_ALL ^E_NOTICE ^E_WARNING);
session_start();
include_once 'includes/functions.php';
$user = new User();

$userid = $_SESSION['userid'];

if (!$user->get_session())
{
   header("location:index.php");
}

if ($_GET['q'] == 'logout') 
{
    $user->user_logout();
    header("location:index.php");
}
?>