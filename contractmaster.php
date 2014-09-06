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
		$contractmaster = $user->updatecontractormaster($_POST['contractorid'],mysql_real_escape_string($_POST['name']),mysql_real_escape_string($_POST['concernedperson']),mysql_real_escape_string($_POST['mobile']),mysql_real_escape_string($_POST['email']),mysql_real_escape_string($_POST['adress']));
	}
	else
	{
		$contractmaster = $user->contractormaster(mysql_real_escape_string($_POST['name']),mysql_real_escape_string($_POST['concernedperson']),mysql_real_escape_string($_POST['mobile']),mysql_real_escape_string($_POST['email']),mysql_real_escape_string($_POST['adress']));
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
	$(".contractorid").click(function(e){ 
	 var contractorid = $("input[name='contractorid']:checked").val(); 
		$.getJSON("getcontractordetails.php?contractorid="+contractorid,
	        function(data){ 
		$.each(data, function(i,item)
		  {
	  		switch(item.field)
	  		{
	  		  	case 'querytype':
		  		  $("#querytype").val(item.value);
		  		  break;
	  		  	case 'contractorid':
		  		  $("#contractorid").val(item.value);
		  		  break;
	  		  	case 'name':
		  		  $("#name").val(item.value);
		  		  break;
				  case 'concernedperson':
		  		  $("#concernedperson").val(item.value);
		  		  break;
				  case 'mobile':
		  		  $("#mobile").val(item.value);
		  		  break;
				   case 'email':
		  		  $("#email").val(item.value);
		  		  break;
				   case 'adress':
		  		  $("#adress").val(item.value);
		  		  break;
			}
          });
	      });
	});
	$('#reset').click(function(e){
		$("#querytype").val('');
		$("#contractorid").val('');
		$("#name").val('');
		 $("#concernedperson").val('');
		 $("#mobile").val('');
		  $("#email").val('');
		   $("#adress").val('');
		$("input[name='schemeid']").prop('checked', false);
		return false;
	});
	$('#submit').click(function(e){
		var name = $('#name').val();
		var concernedperson = $('#concernedperson').val();
		var mobile = $('#mobile').val();
		if(name == '' )
		{
			alert('Please enter name');
			return false;
		}
		if(concernedperson == '' )
		{
			alert('Please enter concerned person');
			return false;
		}
		if(mobile == '' )
		{
			alert('Please enter mobile');
			return false;
		}
		
	});
 });
 </script>

<div style="clear:both"></div>
<div class="mastertitle">Contractor Master</div>
<div style="clear:both"></div>
<div style="max-height:auto; min-height:500px;">
  <form method="post">
    <input class="feoiled_box" name="contractorid" id="contractorid" type="text" hidden='hidden' />
    <input class="feoiled_box" name="querytype" id="querytype" type="text" hidden='hidden' />
    <div class="form">
      <div class="text_form">Name</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="name" id="name" type="text" />
      </div>
    </div>
    <div class="form">
      <div class="text_form">Concerned person </div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="concernedperson" id="concernedperson" type="text" />
      </div>
    </div>
    <div class="form">
      <div class="text_form">Phone Number </div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="mobile" id="mobile" type="text" />
      </div>
    </div>
    <div class="form">
      <div class="text_form">Email</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="email" id="email" type="text" />
      </div>
    </div>
    <div class="form_text">
      <div class="text_form">Adress</div>
      <div class="text_feiled_">
        <textarea name="adress" id="adress" cols="40" rows="4"> </textarea>
      </div>
    </div>
    <div style="clear:both;"></div>
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
  <table width="800" height="40" border="1" align="center" cellpadding="0" cellspacing="0" style="font-family:'Trebuchet MS'; font-size:13px;">
    <tr  style="background-color:#fff0ac; font-weight:bold;" >
      <th height="33" align="center" valign="middle" scope="col"><div style="width:40px;">S.no</div></th>
      <th align="center" valign="middle" ><div style="width:150px; word-wrap:break-word;">Name</div></th>
      <th align="center" valign="middle" ><div style="width:150px;">Concerned person</div></th>
      <th align="center" valign="middle" ><div style="width:100px; word-wrap:break-word;">Phone Number </div></th>
      <th align="center" valign="middle" ><div style="width:150px; word-wrap:break-word;">Email</div></th>
      <th align="center" valign="middle" ><div style="width:150px; word-wrap:break-word;">Adress</div></th>
      <th align="center" valign="middle" ><div style="width:50px;">Edit</div></th>
    </tr>
    <?php 

$selectcontractormaster = $user->selectcontractormaster();
$i =1;
while($result = mysql_fetch_array($selectcontractormaster))
{ 
 ?>
    <tr>
      <td align="center" valign="middle" height="40"><div style="width:40px;"><?php echo $i ; ?></div></td>
      <td align="center" valign="middle"><div style="width:150px; word-wrap:break-word;"><?php echo ucfirst($result['name']);?></div></td>
      <td align="center" valign="middle"><div style="width:150px;"><?php echo ucfirst($result['concernedperson']);?></div></td>
      <td align="center" valign="middle"><div style="width:100px; word-wrap:break-word;"><?php echo $result['mobile'];?></div></td>
      <td align="center" valign="middle"><div style="width:150px; word-wrap:break-word;"><?php echo ucfirst($result['email']);?></div></td>
      <td align="center" valign="middle"><div style="width:150px;"><?php echo ucfirst($result['adress']);?></div></td>
      <td align="center" valign="middle"><div style="width:50px;">
          <input type="radio" name="contractorid" value="<?php echo $result['contractorid']; ?> " class="contractorid"  />
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
