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
		$mandalmaster = $user->updatemandalmaster($_POST['mandalid'],mysql_real_escape_string($_POST['mandalname']),$_POST['type'],$_POST['constituency']);
	}
	else
	{
		$mandalmaster = $user->mandalmaster(mysql_real_escape_string($_POST['mandalname']),$_POST['type'],$_POST['constituency']);
	}
	if ($mandalmaster)
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
	$(".mandalid").click(function(e){
	 var mandalid = $("input[name='mandalid']:checked").val();
		$.getJSON("getmandaldetails.php?mandalid="+mandalid,
	        function(data){
		$.each(data, function(i,item)
		  {
	  		switch(item.field)
	  		{
	  		  	case 'querytype':
		  		  $("#querytype").val(item.value);
		  		  break;
	  		  	case 'mandalid':
		  		  $("#mandalid").val(item.value);
		  		  break;
	  		  	case 'mandalname':
		  		  $("#mandalname").val(item.value);
		  		  break;
				case 'type':
				if(item.value == 'mandal')
				 {
				 	$('#mandal').attr('checked', true);
				 }
				 if(item.value == 'town')
				 {
				 	$('#town').attr('checked', true);
				 }
		  		  break;
				  case 'constituency':
				  	$('#constituency').val(item.value);
					break;
			}
          });
	      });
	});
	$('#reset').click(function(e){
		$("#querytype").val('');
		$("#mandalid").val('');
		$("#mandalname").val('');
		$("#constituency").val('');
		$("input[name='type']").prop('checked', false);
		$("input[name='mandalid']").prop('checked', false);
		return false;
	});
	$('#submit').click(function(e){
		var constituency	=	$('#constituency').val();
		var mandalname = $('#mandalname').val();
		var type = $("input[name='type']:checked").length;
	
		if(constituency == '' )
		{
			alert('Please select constituency');
			return false;
		}
		if(mandalname == '' )
		{
			alert('Please enter mandal name');
			return false;
		}
		if(type == 0)
		{
			alert('Please select type');
			return false;
		}
	});
 });
 </script>

<div style="clear:both"></div>
<div class="mastertitle">Mandal Master</div>
<div style="clear:both"></div>
<div style="max-height:auto; min-height:500px; margin-top:20px;">
  <form method="post">
    <input class="feoiled_box" name="mandalid" id="mandalid" type="text" hidden='hidden' />
    <input class="feoiled_box" name="querytype" id="querytype" type="text" hidden='hidden' />
    <div class="form">
      <div class="text_form">Constituency</div>
      <div class="text_feiled_">
       <select name="constituency" id="constituency" >
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
      <div class="text_form">Mandal Name</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="mandalname" id="mandalname" type="text" />
      </div>
    </div>
    <div class="form">
      <div class="text_form">Type</div>
      <div class="text_feiled_">
        <input name="type"  type="radio" value="mandal" id="mandal"/>
        Mandal
        <input name="type"  type="radio" value="town" id="town"/>
        Town </div>
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
  <table width="650" height="72" border="1" align="center" cellpadding="0" cellspacing="0" style="font-family:'Trebuchet MS'; font-size:13px;">
    <tr  style="background-color:#ffe77a; font-weight:bold;" >
      <th height="33" align="center" valign="middle" scope="col"><div style="width:40px;">S.no</div></th>
      <th align="center" valign="middle" ><div style="width:200px; word-wrap:break-word;">Name</div></th>
      <th align="center" valign="middle" ><div style="width:100px;">Type</div></th>
      <th align="center" valign="middle" ><div style="width:200px; word-wrap:break-word;">Constituency</div></th>
      <!--    <th align="center" valign="middle" ><div style="width:50px;">Edit</div></th>-->
    </tr>
    <?php 

$selectmandalmaster = $user->selectmandalmaster();
$i =1;
while($result = mysql_fetch_array($selectmandalmaster))
{ 
 ?>
    <tr>
      <td align="center" valign="middle" height="30"><div style="width:40px;"><?php echo $i ; ?></div></td>
      <td align="center" valign="middle"><div style="width:200px; word-wrap:break-word;"><?php echo ucfirst($result['mandalname']);?></div></td>
      <td align="center" valign="middle"><div style="width:100px;"><?php echo ucfirst($result['type']);?></div></td>
      <td align="center" valign="middle"><div style="width:200px; word-wrap:break-word;"><?php echo ucfirst($result['constituency']);?></div></td>
      <!-- <td align="center" valign="middle"><div style="width:50px;"><input type="radio" name="mandalid" value="<?php /*echo $result['mandalid'];*/ ?> " class="mandalid"  /></div></td>-->
    </tr>
    <?php
	 $i++;}
?>
  </table>
  <br />
  <br />
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>
