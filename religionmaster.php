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
		$religionmaster = $user->updatereligionmaster($_POST['religionid'],mysql_real_escape_string($_POST['religionname']));
	}
	else
	{
		$religionmaster = $user->religionmaster(mysql_real_escape_string($_POST['religionname']));
	}
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
<script type="text/javascript" src="jquery/jquery-1.9.1.js"></script>
<script type="text/javascript">
 $(document).ready(function(e){
	$(".religionid").click(function(e){
	 var religionid = $("input[name='religionid']:checked").val();
		$.getJSON("getreligiondetails.php?religionid="+religionid,
	        function(data){
		$.each(data, function(i,item)
		  {
	  		switch(item.field)
	  		{
	  		  	case 'querytype':
		  		  $("#querytype").val(item.value);
		  		  break;
	  		  	case 'religionid':
		  		  $("#religionid").val(item.value);
		  		  break;
	  		  	case 'religionname':
		  		  $("#religionname").val(item.value);
		  		  break;
			}
          });
	      });
	});
	$('#reset').click(function(e){
		$("#querytype").val('');
		$("#religionid").val('');
		$("#religionname").val('');
		$("input[name='religionid']").prop('checked', false);
		return false;
	});
	$('#submit').click(function(e){
		var religionname = $('#religionname').val();
		if(religionname == '' )
		{
			alert('Please enter religion name');
			return false;
		}
	});
 });
 </script>

<div style="clear:both"></div>
<div class="mastertitle" >Religion Master</div>
<div style="clear:both"></div>
<div style="max-height:auto; min-height:500px;">
  <form method="post">
    <input class="feoiled_box" name="religionid" id="religionid" type="text" hidden='hidden' />
    <input class="feoiled_box" name="querytype" id="querytype" type="text" hidden='hidden' />
    <div class="form">
      <div class="text_form">Religion Name</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="religionname" id="religionname" type="text" />
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
      <div class="edit"><strong>Name</strong></div>
      <!--<div class="edit"><strong>Edit</strong></div>-->
    </div>
    <?php 

$selectreligionmaster = $user->selectreligionmaster();
$i =1;
while($result = mysql_fetch_array($selectreligionmaster))
{ 
 ?>
    <div class="main_sn1">
      <div class="sn"><strong><?php echo $i ; ?></strong></div>
      <div class="edit"><strong><?php echo ucfirst($result['religionname']);?></strong></div>
      <!--<div class="edit"><strong><input type="radio" name="religionid" value="<?php /*echo $result['religionid']; */?> " class="religionid"  /></strong></div>-->
    </div>
    <?php
	 $i++;}
?>
  </div>
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>
