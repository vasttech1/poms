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
		$recievermaster = $user->updaterecievermaster($_POST['recieverid'],mysql_real_escape_string($_POST['recievername']));
	}
	else
	{
		$recievermaster = $user->recievermaster(mysql_real_escape_string($_POST['recievername']));
	}
	if ($recievermaster)
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
	$(".recieverid").click(function(e){ 
	 var recieverid = $("input[name='recieverid']:checked").val();
		$.getJSON("getrecieverdetails.php?recieverid="+recieverid,
	        function(data){
		$.each(data, function(i,item)
		  {
	  		switch(item.field)
	  		{
	  		  	case 'querytype':
		  		  $("#querytype").val(item.value);
		  		  break;
	  		  	case 'recieverid':
		  		  $("#recieverid").val(item.value);
		  		  break;
	  		  	case 'recievername':
		  		  $("#recievername").val(item.value);
		  		  break;
			}
          });
	      });
	});
	$('#reset').click(function(e){
		$("#querytype").val('');
		$("#recieverid").val('');
		$("#recievername").val('');
		$("input[name='recieverid']").prop('checked', false);
		return false;
	});
	$('#submit').click(function(e){
		var recievername = $('#recievername').val();
		if(recievername == '' )
		{
			alert('Please enter reciever name');
			return false;
		}
	});
 });
 </script>

<div style="clear:both"></div>
<div class="mastertitle">reciever Master</div>
<div style="clear:both"></div>
<div style="max-height:auto; min-height:500px; margin-bottom:20px;">
  <form method="post">
    <input class="feoiled_box" name="recieverid" id="recieverid" type="text" hidden='hidden' />
    <input class="feoiled_box" name="querytype" id="querytype" type="text" hidden='hidden' />
    <div class="form">
      <div class="text_form">reciever Name</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="recievername" id="recievername" type="text" />
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

$selectrecievermaster = $user->selectrecievermaster();
$i =1;
while($result = mysql_fetch_array($selectrecievermaster))
{ 
 ?>
    <div class="main_sn1">
      <div class="sn"><strong><?php echo $i ; ?></strong></div>
      <div class="name"><strong><?php echo ucfirst($result['recievername']);?></strong></div>
      <div class="edit"><strong>
        <input type="radio" name="recieverid" value="<?php echo $result['recieverid']; ?> " class="recieverid"  />
        </strong></div>
    </div>
    <?php
	 $i++;}
?>
  </div>
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>
