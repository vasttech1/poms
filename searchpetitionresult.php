<?php 
error_reporting(E_ALL ^E_NOTICE ^E_WARNING);
include('includes/session.php');
$msg = $_GET['msg'];
if($msg == 'msg')
{
	$sucessmsg = "Petition Updated Sucessfully! ";
}

$sucess = $_GET['id'];
if($sucess !=0)
{
	$sucessmsg = "Meaasage Sent Sucessfully for ".$sucess." members";
}
	
	
$user = new User();
// Checking for user logged in or not
if ($user->get_session())
{

}

if (isset($_POST['submit']) )
{
		$name = mysql_real_escape_string($_POST['name']);
		$gender = $_POST['gender'];
	
		$constituency = $_POST['constituency'];
		$mandal = $_POST['mandal'];
		
		$sqlmandal =mysql_query("SELECT * FROM mandalmaster WHERE mandalid= '".$mandal."'");
		$arraymandal = mysql_fetch_assoc($sqlmandal);
		
		$village= $_POST['village'];
		
		$sqlvillage =mysql_query("SELECT * FROM villagemaster WHERE villageid= '".$village."'");
		$arrayvillage = mysql_fetch_assoc($sqlvillage);
		
		$mobile = mysql_real_escape_string($_POST['mobile']);
		
		$subjectrequest = $_POST['subjectrequest'];
		$sqlsubjectrequest =mysql_query("SELECT * FROM petitionmaster WHERE petitionid= '".$subjectrequest."'");
		$arraysubjectrequest = mysql_fetch_assoc($sqlsubjectrequest);
		
        $status = $_POST['status'];
        $referencenumber = $_POST['referencenumber'];

		$forwarded = $_POST['forwarded'];
		$sqlforwarded =mysql_query("SELECT * FROM petitionforwardmaster WHERE petitionforwardid= '".$forwarded."'");
		$arrayforwarded = mysql_fetch_assoc($sqlforwarded);

        $registerdatefrom = $_POST['registerdatefrom'];
        $registerdateto =   $_POST['registerdateto'];
        
	
    if($name!='' || $gender!='' || $constituency !='' ||$mandal!=''|| $village!= ''||$mobile != '' || $subjectrequest !='' || $status!='' || $referencenumber !='' || $forwarded !='' || $registerdatefrom !='' || $registerdateto != '' )
        {
		$sqlquery = "SELECT * FROM petition LEFT JOIN mandalmaster ON petition.mandal=mandalmaster.mandalid LEFT JOIN petitioncycle  ON petition.petitionid=petitioncycle.petition_id WHERE ";
		
		$sqlcount = "SELECT COUNT(*) as num FROM petition LEFT JOIN mandalmaster ON petition.mandal=mandalmaster.mandalid  LEFT JOIN petitioncycle  ON petition.petitionid=petitioncycle.petition_id  WHERE ";
		$sql = " ";
		if($name != '')
		{
			$sql.="name LIKE '%$name%'";
			$sql.="AND ";
		}
		if($gender!='')
		{
			$sql.="gender = '".$gender."' ";
			$sql.="AND ";
		}
		if($constituency != '')
		{
			$sql.="mandalmaster.constituency = '".$constituency."' ";
			$sql.="AND ";
		}
		if($mandal!='')
		{
			$sql.="mandal = '".$mandal."' ";
			$sql.="AND ";
		}
		if($village!='')
		{
			$sql.="village ='".$village."' ";
			$sql.="AND ";
		}
		if($mobile!='')
		{
			$sql.="mobile = '".$mobile."'";
			$sql.="AND ";
		}
		if($subjectrequest!='')
		{
			$sql.="subjectrequest ='".$subjectrequest."' ";
			$sql.="AND ";
		}
		if($status!='')
		{
			$sql.="status = '".$status."' ";
			$sql.="AND ";
		}
		if($referencenumber!='')
		{
			$sql.="referencenumber = '".$referencenumber."' ";
			$sql.="AND ";
		}
		if($forwarded!='')
		{
			$sql.="petitioncycle.forwarded = '".$forwarded."' ";
			$sql.="AND ";
		}

        if($registerdatefrom !='' && $registerdateto !='')
        {
          $sql.=  "registerdate BETWEEN '".$registerdatefrom."' AND '".$registerdateto."' ";
          $sql.="AND ";
        }
		
		$sql1 =  rtrim($sql, "AND ");
		
		$result11 = $sqlquery.' '.$sql1;  	
		$result1 = $result11." GROUP BY petition_id";
		$result22 = $sqlcount.' '.$sql1;  
		$result2 = $result22." GROUP BY petition_id";
		$searchquery = "You searched keywords are ";
		if($name!='')
		{
			$msg.="Name=".$name;
			$msg.=", ";
		}
		if($gender!='')
		{
			$msg.="Gender=".$gender;
			$msg.=", ";
		}
		if($constituency!='')
		{
			$msg.="Constituency =".$constituency;
			$msg.=", ";
		}
		if($mandal!='')
		{
			$msg.="Mandal ='".$arraymandal['mandalname']."'";
			$msg.=", ";
		}
		if($village!='')
		{
			$msg.="Village ='".$arrayvillage['villagename']."'";
			$msg.=", ";
		}
		if($mobile!='')
		{
			$msg.="Mobile =".$mobile;
			$msg.=", ";
		}
		if($subjectrequest!='')
		{
			$msg.="Subject =".$arraysubjectrequest['petitionname'];
			$msg.=", ";
		}
		if($status!='')
		{
			$msg.="Status=".$status;
			$msg.=", ";
		}
		if($referencenumber!='')
		{
			$msg.="Reference Number=".$referencenumber;
			$msg.=", ";
		}
		if($forwarded!='')
		{
			$msg.="Currently held with ='".$arrayforwarded['petitionforwardname']."'";
			$msg.=", ";
		}
		
		if($registerdatefrom!='')
		{
			$msg.="Register Date from=".$registerdatefrom." to= ".$registerdateto;
			$msg.=", ";
		}
		
		$msg =  rtrim($msg, ", ");
		
		$message = $searchquery.''.$msg;
	 }
     else
     {
        $result1 = "SELECT * FROM petition LEFT JOIN mandalmaster ON petition.mandal=mandalmaster.mandalid "; 
		$result2 = "SELECT COUNT(*) as num FROM petition LEFT JOIN mandalmaster ON petition.mandal=mandalmaster.mandalid "; 
		
     }

$result3 = "SELECT * FROM petition"; 

	 $_SESSION['result1']=$result1;
	 $_SESSION['result2']=$result2;
	$_SESSION['result3']=$result3;
	if ($searchuser)
	{
	// Success
	} else
	{
	//  Failed
	}
}
if(isset($_POST['sendmessage']))
{
	$mobileno = implode(',',$_POST['mobile']);
	$message = urlencode($_POST['message']);
	$mobile1= explode(',',$mobileno);

	require_once('sms_conf.php');
	require_once('send_sms.php');
	

	$i=0;
	foreach($mobile1 as $value)
	{
		$mobile = $value;
		send_sms($message,$mobile);
		$i++;
	}
	header("location:searchpetitionresult.php?id=$i");
	exit;
}
 
if(isset($_POST['send']))
{
	$message = urlencode($_POST['textmessage']);
	$mobile	=$_POST['mobileno']; 
	$i=1;
	require_once('sms_conf.php');
	require_once('send_sms.php');
	send_sms($message,$mobile);
	header("location:searchpetitionresult.php?id=$i");
	exit;
}

 if(isset($_POST['followupsubmit'])){
		
		$type = $_POST['type'];
		$forwardedfollow = $_POST['forwarded'];
		$remarksfollow  =mysql_real_escape_string($_POST['remarks']);
		$file = array();		
foreach($_FILES['file']['tmp_name'] as $key => $tmp_name )
		{
			$file_name = $_FILES['file']['name'][$key];
			$file_size =$_FILES['file']['size'][$key];
			$file_tmp =$_FILES['file']['tmp_name'][$key];
			$file_type=$_FILES['file']['type'][$key];	
		
				$image=$file_name;
			if($image!= '')
			{
				$userimage=time().''.$image;
				move_uploaded_file($file_tmp,"attachforms/".$userimage);
				$file[]=$userimage;
			}
		}
		$file =  implode(',',$file);

		$petitionfollowid = $_POST['petitionfollowid'];
		  date_default_timezone_set('Asia/Kolkata');
       $followupdate	=	date("d/m/Y") ;

	   $sqlfollow = mysql_query("INSERT INTO petitioncycle(petition_id,type, forwarded, remarks, dateoffollowup, relateddocument) 
	   VALUES
	    ('".$petitionfollowid."','".$type."','".$forwardedfollow."','".$remarksfollow."','".$followupdate."','".$file."') ");
		
		if($sqlfollow)
		{
			$msg = "Added  follow up Sucessfully";
		}
	
	$status = $_POST['status'];
	$petitionfollowid = $_POST['petitionfollowid'];
	if($status !='')
	{
		$update = mysql_query("UPDATE petition SET status = '".$status."' WHERE petitionid = '".$petitionfollowid."' ");
	}
	}
$targetpage = "searchpetitionresult.php";
include('includes/header.php');
include('includes/menu.php');
  include('includes/pageignate.php');
?>
<script type="text/javascript">
function getID(theLink){

var detailsid = theLink.id;
$.post("detailspetitionajax.php", {'detailsid' : detailsid},function(data){ 
	$('#addmessage').hide();
	$('#message').val('');
	$('#messageboxshow').hide();
	$('#messageboxhide').hide();
	$('#memberdetails').html(data)

	});
}
</script>
<script>
    $(document).ready(function() {
	$('#messageboxshow').show();
        $('#pagination').change(function() {
            $('form#pageno').submit();
        });
		
		$('#messageboxshow').click(function(){
			$('#addmessage').show();
			$('#messageboxhide').show();
			$('#messageboxshow').hide();
		});
		
		$('#messageboxhide').click(function(){
			$('#addmessage').hide();
			$('#messageboxshow').show();
			$('#messageboxhide').hide();
			$('#message').val('');
		});

$('#sendmessage').click(function(){
var message = $('#message').val();
if(message == '')
{
	alert('Please enter message');
	return false;
}
var checklength = $("input[class='check']:checked").length;
if(checklength == 0)
{
	alert('Please Select Member for send message');
	return false;
}

var r = confirm("Are you sure to send message for "+checklength+" Members!");
if (r == true)
  {
  
  }
else
  {
 return false;
  }

});

    });
	$(function(){
    $(".allcheck").click(function () { 
          $('.check').attr('checked', this.checked);
    });
    $(".check").click(function(){
 
        if($(".check").length == $(".check:checked").length) {
            $(".allcheck").attr("checked", "checked");
        } else {
            $(".allcheck").removeAttr("checked");
        }
    });
	});

</script>

<div class="mastertitle" style="float:left; font-family:'Trebuchet MS'; margin-left:50px; margin-top:10px;">Search Result</div>
<div style="clear:both"></div>
<div style=" color:#009; font-size:14px; font-weight:600">
  <center>
    <?php if(isset($message)){ echo $message;} ?>
  </center>
</div>
<div style="margin-top:10px; color:#006600; font-size:16px; font-weight:bold;">
  <center>
    <?php if(isset($sucessmsg)){ echo $sucessmsg;} ?>
  </center>
</div>
<div style="clear:both"></div>
<div>
  <div style="float:left; margin-top:0px;">
    <div style="width:400px; margin-bottom:0px; margin-left:50px; font-family:'Trebuchet MS'; font-size:15px; font-weight:bold; color:#009933; ">Total Records: <?php echo $total_pages1;  ?>; </div>
  </div>
  <div style="clear:both"></div>
  <div style="float:left; margin-top:5px;">
    <div style="width:400px; margin-bottom:2px;  font-family:'Trebuchet MS'; font-size:15px;  margin-left:50px; font-weight:bold; color:#FF6600;"> Search Records: <?php echo $total_pages; ?>;</div>
  </div>
  <div style="float:right; margin-top:0px;">
    <div style="width:200px;  font-family:'Trebuchet MS'; font-size:15px;  margin-bottom:25px;"> <a href="petitionreports.php">Modify Search</a> </div>
  </div>
</div>
<div id="memberdetails"></div>
<div style="clear:both"></div>
<div style="max-height:auto; min-height:500px;">
  <div style="float:right; margin-right:40px; margin-bottom:20px; font-weight: bold;">
    <form name="form" method="GET" action="searchpetitionresult.php" id="pageno">
      Items Per Page:
      <select name="pagination" id="pagination">
        <option value="">Select</option>
        <option value="10">10</option>
        <option value="20">20</option>
        <option value="30">30</option>
        <option value="40">40</option>
        <option value="50">50</option>
        <option value="75">75</option>
      </select>
    </form>
  </div>
  <div style="clear:both"></div>
  <?php
  //$query =mysql_query($result1);

  
  if($total_pages   >0)
  {
   ?>
  <form method="post">
    <div id="messageboxshow" style="float:right; margin-right:20px;  font-family:'Trebuchet MS'; font-size:13px; font-weight:bold; border-bottom:1px #00CC00 dotted;">Add Message <img src="images/add_message.png" align="absmiddle"/> </div>
    <div style="clear:both"></div>
    <div id="messageboxhide" style="float:right; margin-right:20px;display:none; font-family:'Trebuchet MS'; font-size:13px; font-weight:bold; border-bottom:1px #00CC00 dotted;">Remove Message</div>
    <div style="float:right; margin-right:20px; display:none; font-family:'Trebuchet MS'; font-size:13px; font-weight:bold;" id="addmessage">
      <div style="float:left;  border-bottom:1px #00CC00 dotted;">Message</div>
      <textarea name="message" id="message" cols="40" rows="4"  maxlength="160"></textarea>
      <center>
        <input type="submit" name="sendmessage" value="Send Message" id="sendmessage" />
      </center>
    </div>
    <div style="clear:both;height:10px;"></div>
    <table align="center" width="95%" border="1" cellspacing="0" cellpadding="0" style="font-family:'Trebuchet MS'; font-size:13px;">
      <tr style="background-color:#e2fcdb;">
        <th height="31" align="center" valign="middle" style="width:35px;">S.no</th>
        <th align="center" valign="middle" ><div style="width:100px; word-wrap:break-word;">Name</div></th>
        <th align="center" valign="middle" ><div style="width:70px; word-wrap:break-word;">Village</div></th>
        <th align="center" valign="middle" ><div style="width:70px; word-wrap:break-word;">Mandal</div></th>
        <th align="center" valign="middle" ><div style="width:90px; word-wrap:break-word;">Constituency</div></th>
        <th align="center" valign="middle" ><div style="width:70px; word-wrap:break-word;">Subject</div></th>
        <th align="center" valign="middle"><div style="width:70px; word-wrap:break-word;" > Number of follow ups</div></th>
        <th align="center" valign="middle" ><div style="width:100px; word-wrap:break-word;">Currently held with</div></th>
        <th align="center" valign="middle" ><div style="width:100px; word-wrap:break-word;">Status</div></th>
        <th align="center" valign="middle" ><div style="width:60px; word-wrap:break-word;">Details</div></th>
        <th align="center" valign="middle" ><div style="width:40px;">
            <input type="checkbox"  class="allcheck" id="all" />
            All</div></th>
      </tr>
      <?php 

$i =1;

while($result = mysql_fetch_array($resultquery))
{ 

$mandal = mysql_query("SELECT * FROM mandalmaster WHERE mandalid = '".$result['mandal']."' ");
$mandalarray = mysql_fetch_assoc($mandal);

$village = mysql_query("SELECT * FROM villagemaster WHERE villageid = '".$result['village']."' ");
$villagearray = mysql_fetch_assoc($village);

$subjectrequest =mysql_query("SELECT * FROM petitionmaster WHERE petitionid = '".$result['subjectrequest']."'");
$subjectrequestarray = mysql_fetch_assoc($subjectrequest);
		
$forwarded =mysql_query("SELECT * FROM petitionforwardmaster WHERE petitionforwardid =  '".$result['forwarded']."'");
$forwardedarray= mysql_fetch_assoc($forwarded);

$followupssql = mysql_query("SELECT * FROM petitioncycle WHERE petition_id ='".$result['petitionid']."' ORDER BY cycleid DESC");
$countfollow = mysql_num_rows($followupssql);
$sub = 1;
if($countfollow >1)
{
	$countfollowup = $countfollow - $sub;
}
else
{
	$countfollowup = 0;
}
$followupssql1 = mysql_query("SELECT * FROM petitioncycle WHERE petition_id ='".$result['petitionid']."' AND forwarded!='0' ORDER BY cycleid DESC");
$arryfollow = mysql_fetch_assoc($followupssql1 ); 

$forwardedfollowupsql =mysql_query("SELECT * FROM petitionforwardmaster WHERE petitionforwardid =  '".$arryfollow['forwarded']."' ");
$forwardedfollowarray= mysql_fetch_assoc($forwardedfollowupsql);

 ?>
      <tr>
        <td height="31" align="center" valign="middle"><div style="width:35px;"><?php echo $i ; ?></div></td>
        <td align="center" valign="middle"><div style="width:100px; word-wrap:break-word;"><?php echo ucfirst($result['name']);?></div></td>
        <td align="center" valign="middle"><div style="width:70px; word-wrap:break-word;"><?php echo ucfirst($villagearray['villagename']); ?></div></td>
        <td align="center" valign="middle"><div style="width:70px; word-wrap:break-word;"><?php echo ucfirst($mandalarray['mandalname']); ?></div></td>
        <td align="center" valign="middle"><div style="width:90px; word-wrap:break-word;"><?php echo ucfirst($result['constituency']); ?></div></td>
        <td align="center" valign="middle"><div style="width:90px; word-wrap:break-word;"><?php echo ucfirst($subjectrequestarray['petitionname']); ?></div></td>
        <td align="center" valign="middle"><div style="width:90px; word-wrap:break-word;"><?php echo $countfollowup; ?> </div></td>
        <td align="center" valign="middle"><div style="width:90px; word-wrap:break-word;"><?php echo $forwardedfollowarray['petitionforwardname']; ?></div></td>
        <td align="center" valign="middle"><div style="width:90px; word-wrap:break-word;">
		<?php if($result['status'] != '') {echo $result['status']; } else { echo "Action Pending"; }?></div></td>
        <td align="center" valign="middle"><div style="width:60px; word-wrap:break-word;"><a href="#" class="details" id="<?php  echo $result['petitionid'];?>" onClick="javascript:getID(this)">details</a></div></td>
        <td align="center" valign="middle"><div style="width:40px;">
            <input type="checkbox" name="mobile[]" class="check" value="<?php echo $result['mobile']; ?>" />
          </div></td>
      </tr>
      <div style="clear:both"></div>
      <?php
	 $i++;}?>
    </table>
    <div style="height:25px;"></div>
  </form>
  <?php 
	 } 
?>
  <div style="clear:both"></div>
</div>
<div style="height:10px;"></div>
<center>
  <?php echo $pagination; ?>
</center>
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>
