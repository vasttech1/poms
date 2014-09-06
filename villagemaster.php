<?php 
error_reporting(E_ALL ^E_NOTICE ^E_WARNING);
include('includes/session.php');
$user = new User();
// Checking for user logged in or not
if ($user->get_session())
{

}
//Getting mandal names
$selectmandalmaster = $user->selectmandalmaster();

if (isset($_POST['submit']) )
{
	$querytype = $_POST['querytype'];
	
	if($querytype == 'U')
	{
		$villagemaster = $user->updatevillagemaster($_POST['mandal'],$_POST['villageid'],mysql_real_escape_string($_POST['villagename']));
	}
	else
	{
		$villagemaster = $user->villagemaster($_POST['mandal'],mysql_real_escape_string($_POST['villagename']));
	}
	if ($villagemaster)
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
	$(".villageid").click(function(e){
	 var villageid = $("input[name='villageid']:checked").val();
		$.getJSON("getvillagedetails.php?villageid="+villageid,
	        function(data){
		$.each(data, function(i,item)
		  {
	  		switch(item.field)
	  		{
	  		  	case 'querytype':
		  		  $("#querytype").val(item.value);
		  		  break;
	  		  	case 'villageid':
		  		  $("#villageid").val(item.value);
		  		  break;
	  		  	case 'villagename':
		  		  $("#villagename").val(item.value);
		  		  break;
				case 'mandalid':
				  $('#mandal').val(item.value);
		  		  break;
			}
          });
	      });
	});
	$('#reset').click(function(e){
		$("#querytype").val('');
		$("#villageid").val('');
		$("#villagename").val('');
		$('#mandal').val('');
		return false;
	});
	$('#submit').click(function(e){
		var villagename = $('#villagename').val();
		var mandal = $("#mandal").val();

		if(mandal == '')
		{
			alert('Please select mandal');
			return false;
		}
		if(villagename == '' )
		{
			alert('Please enter village name');
			return false;
		}
		
	});
	
 });
 </script>

<div style="clear:both"></div>
<div class="mastertitle">Village Master</div>
<div style="clear:both"></div>
<div style="max-height:auto; min-height:500px; margin-top:20px;">
  <form method="post">
    <input class="feoiled_box" name="villageid" id="villageid" type="text" hidden='hidden' />
    <input class="feoiled_box" name="querytype" id="querytype" type="text" hidden='hidden' />
    <div class="form">
      <div class="text_form">Mandal Name</div>
      <div class="text_feiled_">
        <select name="mandal" id="mandal" class="feoiled_box">
          <option value="">--Select Mandal--</option>
          <?php
		while($result = mysql_fetch_array($selectmandalmaster))
		{ 
			if($result['type'] == 'town')
				{
				$type = strtoupper($result['type'] );
				}
				else
				{
					$type = '';
				}
		?>
          <option value="<?php echo $result['mandalid']; ?>"><?php echo $result['mandalname'].' '.$type;; ?> </option>
          <?php }?>
        </select>
      </div>
    </div>
    <div class="form">
      <div class="text_form">Village Name</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="villagename" id="villagename" type="text" />
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
  <table width="650" border="1" align="center" cellpadding="0" cellspacing="0" style="font-family:'Trebuchet MS'; font-size:13px;  margin-bottom:20px;  ">
    <tr style="background-color:#ffe77a; font-weight:bold; ">
      <td height="34" align="center" valign="middle" style="border-left:#009966 1px dotted;"><div>S.no</div></td>
      <td align="center" valign="middle" style="border-right:#009966 1px dotted;"><div style="width:200px; word-wrap:break-word;">Village/Ward Name</div></td>
      <td align="center" valign="middle" style="border-right:#009966 1px dotted;"><div style="width:150px; word-wrap:break-word;">Mandal/Town</div></td>
      <!-- <td align="center" valign="middle" ><div>Edit</div></td>-->
    </tr>
    <?php 

$selectvillagemaster = $user->selectvillagemaster();
$i =1;
while($result = mysql_fetch_array($selectvillagemaster))
{ 
	if($result['type'] == 'town')
			{
			$type = ucfirst($result['type'] );
			}
			else
			{
				$type = '';
			}
 ?>
    <tr>
      <td height="30" align="center" valign="middle" style="border-left:#009966 1px dotted;"><div><?php echo $i ; ?></div></td>
      <td align="center" valign="middle"style="border-right:#009966 1px dotted;"><div style="width:200px; word-wrap:break-word;"><?php echo ucfirst($result['villagename']);?></div></td>
      <td align="center" valign="middle"style="border-right:#009966 1px dotted;"><div style="width:150px; word-wrap:break-word;"><?php echo ucfirst($result['mandalname']).' '.$type;?></div></td>
      <!--<td align="center" valign="middle"><div><input type="radio" name="villageid" value="<?php /*echo $result['villageid']; */?> " class="villageid"  /></div></td>-->
    </tr>
    <?php
	 $i++;}
?>
  </table>
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>
