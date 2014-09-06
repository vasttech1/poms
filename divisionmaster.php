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
		$divisonmaster = $user->updatedivisonmaster($_POST['divisonid'],mysql_real_escape_string($_POST['village']),mysql_real_escape_string($_POST['divisonname']));
	}
	else
	{
		$divisonmaster = $user->divisonmaster(mysql_real_escape_string($_POST['village']),mysql_real_escape_string($_POST['divisonname']));
	}
	if ($divisonmaster)
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
	$(".divisonid").click(function(e){
	 var divisonid = $("input[name='divisonid']:checked").val();
		$.getJSON("getdivisondetails.php?divisonid="+divisonid,
	        function(data){
		$.each(data, function(i,item)
		  {
	  		switch(item.field)
	  		{
	  		  	case 'querytype':
		  		  $("#querytype").val(item.value);
		  		  break;
	  		  	case 'divisonid':
		  		  $("#divisonid").val(item.value);
		  		  break;
	  		  	case 'village':
		  		  $("#village").val(item.value);
		  		  break;
				case 'divisonname':
		  		  $("#divisonname").val(item.value);
		  		  break;
			}
          });
	      });
	});
	$('#reset').click(function(e){
		$("#querytype").val('');
		$("#divisonid").val('');
		$('#village').val('');
		$("#divisonname").val('');
		$("input[name='divisonid']").prop('checked', false);
		return false;
	});
	$('#submit').click(function(e){
		var village = $('#village').val();
		var divisonname = $('#divisonname').val();
		
        if(village == '' )
		{
			alert('Please Select Village Name');
			return false;
		}
		if(divisonname == '' )
		{
			alert('Please Enter Divison Name');
			return false;
		}
	});
 });
 </script>

<div style="clear:both"></div>
<div class="mastertitle">Divison Master</div>
<div style="clear:both"></div>
<div style="max-height:auto; min-height:500px;">
  <form method="post">
    <input class="feoiled_box" name="divisonid" id="divisonid" type="text" hidden='hidden' />
    <input class="feoiled_box" name="querytype" id="querytype" type="text" hidden='hidden' />
    
     <div class="form">
      <div class="text_form">Constituency</div>
      <div class="text_feiled_">
        <select name="constituency" id="constituency"  class="dropdown" >
          <option value="">--Select constituency--</option>
          <?php
          $queryconstituency=mysql_query("select *from constituencymaster order by constituencyname asc");
          
          while($rowconstituency=mysql_fetch_assoc($queryconstituency))
          {
            echo "<option value='".$rowconstituency['constituencyname']."'>".$rowconstituency['constituencyname']."</option>";
            
          }
          
          ?>
        </select>
      </div>
    </div>
    
      <div class="form">
      <div class="text_form">Village/Ward</div>
      <div class="text_feiled_">
        <select name="village" id="village" style=" width: 350px; height:30px; margin: 2px;">
          <option value=""> --Village/Ward--</option>
          <?php
          $queryVillage=mysql_query("select *from villagemaster order by villagename asc");
          
          while($rowVillage=mysql_fetch_assoc($queryVillage))
          {
            echo "<option value='".$rowVillage['villagename']."'>".$rowVillage['villagename']."</option>";
          }
          
          ?>
          
          </select>
      </div>
    </div>
    
    <div class="form">
      <div class="text_form">Divison Name</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="divisonname" id="divisonname" type="text" />
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
    <td width="195" align="center" valign="middle" style="font-family:'Trebuchet MS'; font-size:14px; color:#333333; font-weight:bold; background:#fff0ac;">Village/Ward</td>
    <td width="185" align="center" valign="middle" style="font-family:'Trebuchet MS'; font-size:14px; color:#333333; font-weight:bold; background:#fff0ac;" >Divison Name</td>
    <td width="132" align="center" valign="middle" style="font-family:'Trebuchet MS'; font-size:14px; color:#333333; font-weight:bold; background:#fff0ac;">Edit</td>
  </tr>
  
   <?php 

$selectdivisonmaster = $user->selectdivisonmaster();
$i =1;
while($result = mysql_fetch_array($selectdivisonmaster))
{ 
 ?>
  <tr style="font-family:'Trebuchet MS'; font-size:14px; color:#333333;">
    <td height="27" align="center" valign="middle"><?php echo $i ; ?></td>
    <td align="center" valign="middle"><?php echo ucfirst($result['villagename']);?></td>
    <td align="center" valign="middle"><?php echo ucfirst($result['divisonname']);?></td>
    <td align="center" valign="middle"> <input type="radio" name="divisonid" value="<?php echo $result['id']; ?> " class="divisonid"  /></td>
  </tr>


  <?php
	 $i++;}
?></table>
  
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>
