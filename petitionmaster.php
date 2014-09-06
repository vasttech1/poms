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
		$petitionmaster = $user->updatepetitionmaster($_POST['petitionid'],mysql_real_escape_string($_POST['petitionname']));
	}
	else
	{
		$petitionmaster = $user->petitionmaster(mysql_real_escape_string($_POST['petitionname']));
	}
	if ($petitionmaster)
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
	$(".petitionid").click(function(e){ 
	 var petitionid = $("input[name='petitionid']:checked").val();
		$.getJSON("getpetitiondetails.php?petitionid="+petitionid,
	        function(data){
		$.each(data, function(i,item)
		  {
	  		switch(item.field)
	  		{
	  		  	case 'querytype':
		  		  $("#querytype").val(item.value);
		  		  break;
	  		  	case 'petitionid':
		  		  $("#petitionid").val(item.value);
		  		  break;
	  		  	case 'petitionname':
		  		  $("#petitionname").val(item.value);
		  		  break;
			}
          });
	      });
	});
	$('#reset').click(function(e){
		$("#querytype").val('');
		$("#petitionid").val('');
		$("#petitionname").val('');
		$("input[name='petitionid']").prop('checked', false);
		return false;
	});
	$('#submit').click(function(e){
		var petitionname = $('#petitionname').val();
		if(petitionname == '' )
		{
			alert('Please enter petition name');
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
    <input class="feoiled_box" name="petitionid" id="petitionid" type="text" hidden='hidden' />
    <input class="feoiled_box" name="querytype" id="querytype" type="text" hidden='hidden' />
    <div class="form">
      <div class="text_form">Subject Requested For</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="petitionname" id="petitionname" type="text" />
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

$selectpetitionmaster = $user->selectpetitionmaster();
$i =1;
while($result = mysql_fetch_array($selectpetitionmaster))
{ 
 ?>
    <div class="main_sn1">
      <div class="sn"><strong><?php echo $i ; ?></strong></div>
      <div class="name"><strong><?php echo ucfirst($result['petitionname']);?></strong></div>
      <div class="edit"><strong>
        <input type="radio" name="petitionid" value="<?php echo $result['petitionid']; ?> " class="petitionid"  />
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
