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
		$positionmaster = $user->updatepositionmaster($_POST['positiontype'],$_POST['positionlevel'],mysql_real_escape_string($_POST['positionname']),$_POST['positionid']);
	}
	else
	{
		$positionmaster = $user->positionmaster($_POST['positiontype'], $_POST['positionlevel'],mysql_real_escape_string($_POST['positionname']));
	}
	if ($positionmaster)
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
	$(".positionid").click(function(e){
	 var positionid = $("input[name='positionid']:checked").val();
		$.getJSON("getpositiondetails.php?positionid="+positionid,
	        function(data){ 
		$.each(data, function(i,item)
		  {
	  		switch(item.field)
	  		{
	  		  	case 'querytype':
		  		  $("#querytype").val(item.value);
		  		  break;
	  		  	case 'positionid':
		  		  $("#positionid").val(item.value);
		  		  break;
	  		  	case 'positionname':
		  		  $("#positionname").val(item.value);
		  		  break;
				case 'positiontype':
				  $('#positiontype').val(item.value);
		  		  break;
				case 'positionlevel':
				  $('#positionlevel').val(item.value);
		  		  break;
			}
          });
	      });
	});
	$('#reset').click(function(e){
		$("#querytype").val('');
		$("#positionid").val('');
		$("#positionname").val('');
		$('#positiontype').val('');
		$('#positionlevel').val('');
		return false;
	});
	$('#submit').click(function(e){
		var positionname = $('#positionname').val();
		var positiontype = $("#positiontype").val();
		var positionlevel = $('#positionlevel').val();

		if(positiontype == '')
		{
			alert('Please select positiontype');
			return false;
		}
		if(positionlevel == '')
		{
			alert('Please select positionlevel');
			return false;
		}
		if(positionname == '' )
		{
			alert('Please enter position name');
			return false;
		}
		
	});
	
 });
 </script>

<div style="clear:both"></div>
<div class="mastertitle">Village Master</div>
<div style="clear:both"></div>
<div style="max-height:auto; min-height:500px;">
  <form method="post">
    <input class="feoiled_box" name="positionid" id="positionid" type="text" hidden='hidden' />
    <input class="feoiled_box" name="querytype" id="querytype" type="text" hidden='hidden' />
    <div class="form">
      <div class="text_form">Position Type</div>
      <div class="text_feiled_">
        <select name="positiontype" id="positiontype" class="feoiled_box">
          <option value="">--Select Position Type--</option>
          <option value="general">General</option>
          <option value="party">Party</option>
        </select>
      </div>
    </div>
    <div class="form">
      <div class="text_form">Position Level</div>
      <div class="text_feiled_">
        <select name="positionlevel" id="positionlevel" class="feoiled_box">
          <option value="">--Select Position Level--</option>
          <option value="constituency">Constituency</option>
          <option value="mandal">Mandal</option>
          <option value="village">Village</option>
        </select>
      </div>
    </div>
    <div class="form">
      <div class="text_form">Position Name</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="positionname" id="positionname" type="text" />
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
  
  <table align="center" width="600" border="1" cellspacing="0" cellpadding="0" style="margin-top:20px; margin-bottom:20px;">
  <tr style="font-family:'Trebuchet MS'; font-size:14px; color:#333333; font-weight:bold; background:#fff0ac;">
    <td height="28" align="center" valign="middle">S.no</td>
    <td align="center" valign="middle">Type</td>
    <td align="center" valign="middle">Level</td>
    <td align="center" valign="middle">Position Name</td>
    <td align="center" valign="middle">Edit</td>
  </tr>
  
      <?php 

$selectpositionmaster = $user->selectpositionmaster();
$i =1;
while($result = mysql_fetch_array($selectpositionmaster))
{ 
 ?>
  
  <tr style="font-family:'Trebuchet MS'; font-size:14px; color:#333333;">
    <td height="28" align="center" valign="middle"><?php echo $i ; ?></td>
    <td align="center" valign="middle"><?php echo ucfirst($result['positiontype']);?></td>
    <td align="center" valign="middle"><?php echo ucfirst($result['positionlevel']);?></td>
    <td align="center" valign="middle"><?php echo ucfirst($result['positionname']);?></td>
     <td align="center" valign="middle"> <input type="radio" name="positionid" value="<?php echo $result['positionid']; ?> " class="positionid"  /></td>
  </tr>
  
      <?php
	 $i++;}
?>
  
</table>

  
  
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>
