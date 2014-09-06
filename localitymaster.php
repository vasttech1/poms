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
		$localitymaster = $user->updatelocalitymaster($_POST['localityid'],mysql_real_escape_string($_POST['localityname']));
	}
	else
	{
		$localitymaster = $user->localitymaster(mysql_real_escape_string($_POST['localityname']));
	}
	if ($localitymaster)
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
	$(".localityid").click(function(e){
	 var localityid = $("input[name='localityid']:checked").val();
		$.getJSON("getlocalitydetails.php?localityid="+localityid,
	        function(data){
		$.each(data, function(i,item)
		  {
	  		switch(item.field)
	  		{
	  		  	case 'querytype':
		  		  $("#querytype").val(item.value);
		  		  break;
	  		  	case 'localityid':
		  		  $("#localityid").val(item.value);
		  		  break;
	  		  	case 'localityname':
		  		  $("#localityname").val(item.value);
		  		  break;
			}
          });
	      });
	});
	$('#reset').click(function(e){
		$("#querytype").val('');
		$("#localityid").val('');
		$("#localityname").val('');
		$("input[name='localityid']").prop('checked', false);
		return false;
	});
	$('#submit').click(function(e){
		var localityname = $('#localityname').val();
		if(localityname == '' )
		{
			alert('Please enter locality name');
			return false;
		}
	});
 });
 </script>
  <div style="clear:both"></div>
<div class="mastertitle" >locality Master</div>
<div style="clear:both"></div>
<div style="max-height:auto; min-height:500px;">
  <form method="post">
   <input class="feoiled_box" name="localityid" id="localityid" type="text" hidden='hidden' />
   <input class="feoiled_box" name="querytype" id="querytype" type="text" hidden='hidden' />
    <div class="form">
      <div class="text_form">locality Name</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="localityname" id="localityname" type="text" />
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

$selectlocalitymaster = $user->selectlocalitymaster();
$i =1;
while($result = mysql_fetch_array($selectlocalitymaster))
{ 
 ?>
    <div class="main_sn1">
      <div class="sn"><strong><?php echo $i ; ?></strong></div>
      <div class="name"><strong><?php echo ucfirst($result['localityname']);?></strong></div>
      <div class="edit"><strong><input type="radio" name="localityid" value="<?php echo $result['localityid']; ?> " class="localityid"  /></strong></div>
    </div>
    <?php
	 $i++;}
?>
  </div>
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>
