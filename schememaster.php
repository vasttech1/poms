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
		$schememaster = $user->updateschememaster($_POST['schemeid'],mysql_real_escape_string($_POST['schemename']),mysql_real_escape_string($_POST['funds']),$_POST['fundtype']);
	}
	else
	{
		$schememaster = $user->schememaster(mysql_real_escape_string($_POST['schemename']),mysql_real_escape_string($_POST['funds']),$_POST['fundtype']);
	}
	if ($schememaster)
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
	$(".schemeid").click(function(e){ 
	 var schemeid = $("input[name='schemeid']:checked").val();
		$.getJSON("getschemedetails.php?schemeid="+schemeid,
	        function(data){ 
		$.each(data, function(i,item)
		  {
	  		switch(item.field)
	  		{
	  		  	case 'querytype':
		  		  $("#querytype").val(item.value);
		  		  break;
	  		  	case 'schemeid':
		  		  $("#schemeid").val(item.value);
		  		  break;
	  		  	case 'schemename':
		  		  $("#schemename").val(item.value);
		  		  break;
				  case 'funds':
		  		  $("#funds").val(item.value);
		  		  break;
				  case 'fundtype':
		  		  $("#fundtype").val(item.value);
		  		  break;
			}
          });
	      });
	});
	$('#reset').click(function(e){
		$("#querytype").val('');
		$("#schemeid").val('');
		$("#schemename").val('');
		 $("#funds").val('');
		 $("#fundtype").val('');
		$("input[name='schemeid']").prop('checked', false);
		return false;
	});
	$('#submit').click(function(e){
		var schemename = $('#schemename').val();
		var funds = $('#funds').val();
		var fundtype = $('#fundtype').val();
		if(schemename == '' )
		{
			alert('Please enter scheme name');
			return false;
		}
		if(funds == '' )
		{
			alert('Please enter fund Value');
			return false;
		}
		if(fundtype == '' )
		{
			alert('Please select fundtype');
			return false;
		}
	});
 });
 </script>

<div style="clear:both"></div>
<div class="mastertitle">scheme Master</div>
<div style="clear:both"></div>
<div style="max-height:auto; min-height:500px;">
  <form method="post">
    <input class="feoiled_box" name="schemeid" id="schemeid" type="text" hidden='hidden' />
    <input class="feoiled_box" name="querytype" id="querytype" type="text" hidden='hidden' />
    <div class="form">
      <div class="text_form">Scheme Name</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="schemename" id="schemename" type="text" />
      </div>
    </div>
    <div class="form">
      <div class="text_form">Funds Allocation</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="funds" id="funds" type="text" />
      </div>
    </div>
    <div class="form">
      <div class="text_form">Type</div>
      <div class="text_feiled_">
        <select name="fundtype" id="fundtype" style=" width: 350px; height:30px; margin: 2px;">
          <option value=""> --Fund Type--</option>
          <option value="One time">One time</option>
          <option value="Yearly">Yearly</option>
          <option value="Half yearly">Half yearly</option>
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
  <br />
  <br />
  <table width="650" height="40" border="1" align="center" cellpadding="0" cellspacing="0" style="font-family:'Trebuchet MS'; font-size:13px;">
    <tr  style="background-color:#ffe77a; font-weight:bold;" >
      <th height="33" align="center" valign="middle" scope="col"><div style="width:40px;">S.no</div></th>
      <th align="center" valign="middle" ><div style="width:200px; word-wrap:break-word;">Scheme Name</div></th>
      <th align="center" valign="middle" ><div style="width:200px;">Funds Allocation</div></th>
      <th align="center" valign="middle" ><div style="width:150px; word-wrap:break-word;">Type</div></th>
      <th align="center" valign="middle" ><div style="width:50px;">Edit</div></th>
    </tr>
    <?php 

$selectschememaster = $user->selectschememaster();
$i =1;
while($result = mysql_fetch_array($selectschememaster))
{ 
 ?>
    <tr>
      <td align="center" valign="middle" height="40"><div style="width:40px;"><?php echo $i ; ?></div></td>
      <td align="center" valign="middle"><div style="width:200px; word-wrap:break-word;"><?php echo ucfirst($result['schemename']);?></div></td>
      <td align="center" valign="middle"><div style="width:200px;"><?php echo ucfirst($result['funds']);?></div></td>
      <td align="center" valign="middle"><div style="width:150px; word-wrap:break-word;"><?php echo ucfirst($result['fundtype']);?></div></td>
      <td align="center" valign="middle"><div style="width:50px;">
          <input type="radio" name="schemeid" value="<?php echo $result['schemeid']; ?> " class="schemeid"  />
        </div></td>
    </tr>
    <?php
	 $i++;}
?>
  </table>
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>
