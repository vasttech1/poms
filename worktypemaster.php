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
		$worktypemaster = $user->updateworktypemaster($_POST['worktypeid'],mysql_real_escape_string($_POST['worktypename']));
	}
	else
	{
		$worktypemaster = $user->worktypemaster(mysql_real_escape_string($_POST['worktypename']));
	}
	if ($worktypemaster)
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
	$(".worktypeid").click(function(e){ 
	 var worktypeid = $("input[name='worktypeid']:checked").val();
		$.getJSON("getworktypedetails.php?worktypeid="+worktypeid,
	        function(data){
		$.each(data, function(i,item)
		  {
	  		switch(item.field)
	  		{
	  		  	case 'querytype':
		  		  $("#querytype").val(item.value);
		  		  break;
	  		  	case 'worktypeid':
		  		  $("#worktypeid").val(item.value);
		  		  break;
	  		  	case 'worktypename':
		  		  $("#worktypename").val(item.value);
		  		  break;
			}
          });
	      });
	});
	$('#reset').click(function(e){
		$("#querytype").val('');
		$("#worktypeid").val('');
		$("#worktypename").val('');
		$("input[name='worktypeid']").prop('checked', false);
		return false;
	});
	$('#submit').click(function(e){
		var worktypename = $('#worktypename').val();
		if(worktypename == '' )
		{
			alert('Please enter worktype name');
			return false;
		}
	});
 });
 </script>

<div style="clear:both"></div>
<div class="mastertitle">worktype Master</div>
<div style="clear:both"></div>
<div style="max-height:auto; min-height:500px;">
  <form method="post">
    <input class="feoiled_box" name="worktypeid" id="worktypeid" type="text" hidden='hidden' />
    <input class="feoiled_box" name="querytype" id="querytype" type="text" hidden='hidden' />
    <div class="form">
      <div class="text_form">worktype Name</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="worktypename" id="worktypename" type="text" />
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

$selectworktypemaster = $user->selectworktypemaster();
$i =1;
while($result = mysql_fetch_array($selectworktypemaster))
{ 
 ?>
    <div class="main_sn1">
      <div class="sn"><strong><?php echo $i ; ?></strong></div>
      <div class="name"><strong><?php echo ucfirst($result['worktypename']);?></strong></div>
      <div class="edit"><strong>
        <input type="radio" name="worktypeid" value="<?php echo $result['worktypeid']; ?> " class="worktypeid"  />
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
