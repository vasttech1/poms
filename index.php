<?php
error_reporting(E_ALL ^E_NOTICE ^E_WARNING);
include_once 'includes/functions.php';
$user = new User();
session_start();
$userid = $_SESSION['userid'];
if($userid!=0)
{
	header("location:dashboard.php");
	exit;
}

if (isset($_POST['submit']))
{
	$login = $user->check_login($_POST['username'], $_POST['password'] );
	print_r($login);
    
    if ($login)
{
	// Login Success
}
else
{
	// Login Failed
	$msg= 'Username / password wrong';
}
}
 include('includes/header.php');?>
<script type="text/javascript" src="jquery/jquery-1.9.1.js"></script>
<script type="text/javascript">
$(document).ready(function(e){
	$('#submit').click(function(e){
		var username = $('#username').val();
		var password	=	$('#password').val();
		if(username	=='')
		{
			alert('Please enter username');
			return false;
		}
		if(password	=='')
		{
			alert('Please enter password');
			return false;
		}
	});
});
</script>

<div class="container">
  <div style="height:30px;"></div>
  <div style="height:30px; color:#FF0000; font-size:18px; font-weight:bold;">
    <center>
      <?php echo $msg; ?>
    </center>
  </div>
<form method="post">
<div style="height:300px;">
<div class="login_box">
<div style="height:30px;"></div>
<div style="height:35px;">
<div class="icon_div"><img src="images/user.png" /></div>
<div class="input_box"><input type="text" placeholder="User name" name="username" id="username"/></div>
</div>
<div style="height:35px; margin-top:20px;">
<div class="icon_div"><img src="images/login.png" width="32" height="32" /></div>
<div class="input_box"><input type="password" placeholder="Password" name="password" id="password"/></div>
</div>

<div style="margin-left:52px; margin-top:20px;">
<div style="float:left; width:100px;"><input name="submit" type="submit"  value="LOGIN" class="submit_btn1" /></div>
<div style="float:left; height:25px; font-family:'Trebuchet MS'; font-size:13px; color:#FFF; padding-top:5px; margin-left:20px;">
<a href="#" class="forgot">Forgot password?</a></div>

</div>


</div>
</div>
</form>
<?php include('includes/footer.php'); ?>
