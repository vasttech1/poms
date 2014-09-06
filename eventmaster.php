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
		$eventmaster = $user->updateeventmaster($_POST['eventid'],mysql_real_escape_string($_POST['event_type']));
	}
	else
	{
		$eventmaster = $user->eventmaster(mysql_real_escape_string($_POST['event_type']));
	}
	if ($eventmaster)
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
	$(".eventid").click(function(e){
	 var eventid = $("input[name='eventid']:checked").val();
		$.getJSON("geteventdetails.php?eventid="+eventid,
	        function(data){
		$.each(data, function(i,item)
		  {
	  		switch(item.field)
	  		{
	  		  	case 'querytype':
		  		  $("#querytype").val(item.value);
		  		  break;
	  		  	case 'eventid':
		  		  $("#eventid").val(item.value);
		  		  break;
	  		  	case 'event_type':
		  		  $("#event_type").val(item.value);
		  		  break;
			}
          });
	      });
	});
	$('#reset').click(function(e){
		$("#querytype").val('');
		$("#eventid").val('');
		$("#event_type").val('');
		$("input[name='eventid']").prop('checked', false);
		return false;
	});
	$('#submit').click(function(e){
		var event_type = $('#event_type').val();
		if(event_type == '' )
		{
			alert('Please enter Event type');
			return false;
		}
	});
 });
 </script>
  <div style="clear:both"></div>
<div class="mastertitle" >Event Master</div>
<div style="clear:both"></div>
<div style="max-height:auto; min-height:500px;">
  <form method="post">
   <input class="feoiled_box" name="eventid" id="eventid" type="text" hidden='hidden' />
   <input class="feoiled_box" name="querytype" id="querytype" type="text" hidden='hidden' />
    <div class="form">
      <div class="text_form">locality Name</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="event_type" id="event_type" type="text" />
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

$selecteventmaster = $user->selecteventmaster();
$i =1;
while($result = mysql_fetch_array($selecteventmaster))
{ 
 ?>
    <div class="main_sn1">
      <div class="sn"><strong><?php echo $i ; ?></strong></div>
      <div class="name"><strong><?php echo ucfirst($result['event_type']);?></strong></div>
      <div class="edit"><strong><input type="radio" name="eventid" value="<?php echo $result['eventid']; ?> " class="eventid"  /></strong></div>
    </div>
    <?php
	 $i++;}
?>
  </div>
</div>
</div>
</div>
</div>

<?php include('includes/footer.php'); ?>
