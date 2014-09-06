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
		$castemaster = $user->updatecastemaster($_POST['casteid'],mysql_real_escape_string($_POST['castename']),mysql_real_escape_string($_POST['castecategory']));
	}
	else
	{
		$castemaster = $user->castemaster(mysql_real_escape_string($_POST['castename']),mysql_real_escape_string($_POST['castecategory']));
	}
	if ($castemaster)
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
	$(".casteid").click(function(e){
	 var casteid = $("input[name='casteid']:checked").val();
		$.getJSON("getcastedetails.php?casteid="+casteid,
	        function(data){
		$.each(data, function(i,item)
		  {
	  		switch(item.field)
	  		{
	  		  	case 'querytype':
		  		  $("#querytype").val(item.value);
		  		  break;
	  		  	case 'casteid':
		  		  $("#casteid").val(item.value);
		  		  break;
	  		  	case 'castename':
		  		  $("#castename").val(item.value);
		  		  break;
				case 'castecategory':
		  		  $("#castecategory").val(item.value);
		  		  break;
			}
          });
	      });
	});
	$('#reset').click(function(e){
		$("#querytype").val('');
		$("#casteid").val('');
		$("#castename").val('');
		$('#castecategory').val('');
		$("input[name='casteid']").prop('checked', false);
		return false;
	});
	$('#submit').click(function(e){
		var castename = $('#castename').val();
		var castecategory = $('#castecategory').val();
		if(castename == '' )
		{
			alert('Please enter caste name');
			return false;
		}
		if(castecategory == '' )
		{
			alert('Please Select caste category');
			return false;
		}
	});
 });
 </script>

<div style="clear:both"></div>
<div class="mastertitle">Caste Master</div>
<div style="clear:both"></div>
<div style="max-height:auto; min-height:500px;">
  <form method="post">
    <input class="feoiled_box" name="casteid" id="casteid" type="text" hidden='hidden' />
    <input class="feoiled_box" name="querytype" id="querytype" type="text" hidden='hidden' />
    <div class="form">
      <div class="text_form">Caste Name</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="castename" id="castename" type="text" />
      </div>
    </div>
    <div class="form">
      <div class="text_form">Caste Category</div>
      <div class="text_feiled_">
        <select name="castecategory" id="castecategory" style=" width: 350px; height:30px; margin: 2px;">
          <option value=""> --Caste Category--</option>
          <option value="SC">SC</option>
          <option value="ST">ST</option>
          <option value="BC-A">BC-A</option>
          <option value="BC-B">BC-B</option>
          <option value="BC-C">BC-C</option>
          <option value="BC-D">BC-D</option>
          <option value="OC">OC</option>
        </select>
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
  <tr>
    <td width="78" height="34" align="center" valign="middle" style="font-family:'Trebuchet MS'; font-size:14px; color:#333333; font-weight:bold; background:#fff0ac;">S.no</td>
    <td width="195" align="center" valign="middle" style="font-family:'Trebuchet MS'; font-size:14px; color:#333333; font-weight:bold; background:#fff0ac;">Name</td>
    <td width="185" align="center" valign="middle" style="font-family:'Trebuchet MS'; font-size:14px; color:#333333; font-weight:bold; background:#fff0ac;" >Caste Category</td>
    <td width="132" align="center" valign="middle" style="font-family:'Trebuchet MS'; font-size:14px; color:#333333; font-weight:bold; background:#fff0ac;">Edit</td>
  </tr>
  
   <?php 

$selectcastemaster = $user->selectcastemaster();
$i =1;
while($result = mysql_fetch_array($selectcastemaster))
{ 
 ?>
  <tr style="font-family:'Trebuchet MS'; font-size:14px; color:#333333;">
    <td height="27" align="center" valign="middle"><?php echo $i ; ?></td>
    <td align="center" valign="middle"><?php echo ucfirst($result['castename']);?></td>
    <td align="center" valign="middle"><?php echo ucfirst($result['castecategory']);?></td>
    <td align="center" valign="middle"> <input type="radio" name="casteid" value="<?php echo $result['casteid']; ?> " class="casteid"  /></td>
  </tr>


  <?php
	 $i++;}
?></table>
  
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>
