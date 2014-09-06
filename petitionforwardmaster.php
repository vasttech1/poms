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
		$petitionforwardmaster = $user->updatepetitionforwardmaster($_POST['petitionforwardid'],mysql_real_escape_string($_POST['petitionforwardname']));
	}
	else
	{
		$petitionforwardmaster = $user->petitionforwardmaster(mysql_real_escape_string($_POST['petitionforwardname']));
	}
	if ($petitionforwardmaster)
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
	$(".petitionforwardid").click(function(e){ 
	 var petitionforwardid = $("input[name='petitionforwardid']:checked").val();
		$.getJSON("getpetitionforwarddetails.php?petitionforwardid="+petitionforwardid,
	        function(data){
		$.each(data, function(i,item)
		  {
	  		switch(item.field)
	  		{
	  		  	case 'querytype':
		  		  $("#querytype").val(item.value);
		  		  break;
	  		  	case 'petitionforwardid':
		  		  $("#petitionforwardid").val(item.value);
		  		  break;
	  		  	case 'petitionforwardname':
		  		  $("#petitionforwardname").val(item.value);
		  		  break;
			}
          });
	      });
	});
	$('#reset').click(function(e){
		$("#querytype").val('');
		$("#petitionforwardid").val('');
		$("#petitionforwardname").val('');
		$("input[name='petitionforwardid']").prop('checked', false);
		return false;
	});
	$('#submit').click(function(e){
		var petitionforwardname = $('#petitionforwardname').val();
		if(petitionforwardname == '' )
		{
			alert('Please enter petitionforward name');
			return false;
		}
	});
 });
 </script>

  <div style="clear:both"></div>
<div class="mastertitle">Subject Request Master</div>
<div style="clear:both"></div>
<div style="max-height:auto; min-height:500px;">
  <form method="post">
   <input class="feoiled_box" name="petitionforwardid" id="petitionforwardid" type="text" hidden='hidden' />
   <input class="feoiled_box" name="querytype" id="querytype" type="text" hidden='hidden' />
    <div class="form">
      <div class="text_form">Subject Requested For</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="petitionforwardname" id="petitionforwardname" type="text" />
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
  <div style="height:auto; width:auto; margin-bottom:25px;">
    <div class="main_sn">
      <div class="sn"><strong>S.no</strong></div>
      <div class="name"><strong>Subject Requested For</strong></div>
      <div class="edit"><strong>Edit</strong></div>
    </div>
    <?php 

$selectpetitionforwardmaster = $user->selectpetitionforwardmaster();
$i =1;
while($result = mysql_fetch_array($selectpetitionforwardmaster))
{ 
 ?>
    <div class="main_sn1">
      <div class="sn"><strong><?php echo $i ; ?></strong></div>
      <div class="name"><strong><?php echo ucfirst($result['petitionforwardname']);?></strong></div>
      <div class="edit"><strong><input type="radio" name="petitionforwardid" value="<?php echo $result['petitionforwardid']; ?> " class="petitionforwardid"  /></strong></div>
    </div>
    <?php
	 $i++;}
?>
  </div>
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>
