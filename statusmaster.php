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
	$querytype = $_POST['querytype'];
	
	if($querytype == 'U')
	{
		$statusmaster = $user->updatestatusmaster($_POST['statusid'],mysql_real_escape_string($_POST['statusname']));
	}
	else
	{
		$statusmaster = $user->statusmaster(mysql_real_escape_string($_POST['statusname']));
	}
	if ($statusmaster)
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
<script type="text/javascript" src="jquery/jquery-1.9.1.js"></script>
<script type="text/javascript">
 $(document).ready(function(e){
	$(".statusid").click(function(e){
	 var statusid = $("input[name='statusid']:checked").val();
		$.getJSON("getstatusdetails.php?statusid="+statusid,
	        function(data){
		$.each(data, function(i,item)
		  {
	  		switch(item.field)
	  		{
	  		  	case 'querytype':
		  		  $("#querytype").val(item.value);
		  		  break;
	  		  	case 'statusid':
		  		  $("#statusid").val(item.value);
		  		  break;
	  		  	case 'statusname':
		  		  $("#statusname").val(item.value);
		  		  break;
			}
          });
	      });
	});
	$('#reset').click(function(e){
		$("#querytype").val('');
		$("#statusid").val('');
		$("#statusname").val('');
		$("input[name='statusid']").prop('checked', false);
		return false;
	});
	$('#submit').click(function(e){
		var statusname = $('#statusname').val();
		if(statusname == '' )
		{
			alert('Please enter status name');
			return false;
		}
	});
 });
 </script>

  <div style="clear:both"></div>
<div class="mastertitle" >status Master</div>
<div style="clear:both"></div>
<div style="max-height:auto; min-height:500px;">
  <form method="post">
   <input class="feoiled_box" name="statusid" id="statusid" type="text" hidden='hidden' />
   <input class="feoiled_box" name="querytype" id="querytype" type="text" hidden='hidden' />
    <div class="form">
      <div class="text_form">status Name</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="statusname" id="statusname" type="text" />
      </div>
    </div>
    <div class="form">
      <div class="text_form"></div>
      <div class="text_feiled_">
        <input class="sub" id="reset" name="reset" value="Reset" type="submit" />
         <input class="sub" id="submit" name="submit" value="Submit" type="submit" />
      </div>
    </div>
  </form>
  <div style="height:auto; width:auto;">
    <div class="main_sn">
      <div class="sn"><strong>S.no</strong></div>
      <div class="name"><strong>Name</strong></div>
      <div class="edit"><strong>Edit</strong></div>
    </div>
    <?php 

$selectstatusmaster = $user->selectstatusmaster();
$i =1;
while($result = mysql_fetch_array($selectstatusmaster))
{ 
 ?>
    <div class="main_sn1">
      <div class="sn"><strong><?php echo $i ; ?></strong></div>
      <div class="name"><strong><?php echo ucfirst($result['statusname']);?></strong></div>
      <div class="edit"><strong><input type="radio" name="statusid" value="<?php echo $result['statusid']; ?> " class="statusid"  /></strong></div>
    </div>
    <?php
	 $i++;}
?>
  </div>
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>
