<?php 
error_reporting(E_ALL ^E_NOTICE ^E_WARNING);
include('includes/session.php');
$user = new User();
// Checking for user logged in or not
if ($user->get_session())
{

}

if (isset($_POST['submit']) )
{
	
	$religionmaster = $user->religionmaster(mysql_real_escape_string($_POST['religionname']));
	if ($religionmaster)
	{
	// Success
	} else
	{
	//  Failed
	}
}

include('includes/header.php');
include('includes/menu.php');
?>

  <div style="clear:both"></div>
<div class="mastertitle">Dash Board</div>
<div style="clear:both"></div>
<div style="max-height:auto; min-height:500px;">
  
  
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>
