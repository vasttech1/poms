<?php 
error_reporting(E_ALL ^E_NOTICE ^E_WARNING);
include('includes/session.php');

$sucess = $_GET['id'];
if($sucess !=0)
{
	$sucessmsg = "Message Sent Sucessfully for ".$sucess." members";
}
	
	
$user = new User();
// Checking for user logged in or not
if ($user->get_session())
{

}

if (isset($_POST['submit']) )
{
		$name = mysql_real_escape_string($_POST['name']);
		$event_type = $_POST['event_type'];
		$fromDate = mysql_real_escape_string($_POST['fromDate']);
		$toDate = mysql_real_escape_string($_POST['toDate']);
	
        
    if($name!='' || $event_type!='' || $fromDate !='' || $toDate!='')
        {
		$sqlquery = "SELECT * FROM events WHERE ";
		
		$sqlcount = "SELECT COUNT(*) as num FROM events WHERE ";
		$sql = " ";
		if($name != '')
		{
			$sql.="event_name LIKE '%$name%'";
			$sql.="AND ";
		}
		if($event_type!='')
		{
			$sql.="event_type = '".$event_type."' ";
			$sql.="AND ";
		}
		if($fromDate != '' and $toDate != '')
		{
			$sql.="(date BETWEEN '$fromDate' AND '$toDate') ";
			$sql.="AND ";
		}
		
		
		$sql1 =  rtrim($sql, "AND ");
		
		$result11 = $sqlquery.' '.$sql1;  	
		$result1 = $result11." order by id desc";
		$result22 = $sqlcount.' '.$sql1;  
		$result2 = $result22." order BY id desc";
		$searchquery = "You searched keywords are ";
		if($name!='')
		{
			$msg.="Name=".$name;
			$msg.=", ";
		}
		if($event_type!='')
		{
			$msg.="Event Type=".$event_type;
			$msg.=", ";
		}
		if($fromDate!='')
		{
			$msg.="From Date =".$fromDate;
			$msg.=", ";
		}
		if($toDate!='')
		{
			$msg.="To Date =".$toDate;
			$msg.=", ";
		}
		$msg =  rtrim($msg, ", ");
		
		$message = $searchquery.''.$msg;
	 }
     else
     {
        $result1 = "SELECT * FROM events"; 
		$result2 = "SELECT COUNT(*) as num FROM events"; 
		
     }

$result3 = "SELECT * FROM events"; 

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
	header("location:searcheventreport.php?id=$i");
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
	header("location:searcheventreport.php?id=$i");
	exit;
}
$targetpage = "searcheventreport.php";
include('includes/header.php');
include('includes/menu.php');
include('includes/pageignate.php');
?>

<script type="text/javascript">
function getID(theLink){

var detailsid = theLink.id;
$.post("detaileventajax.php", {'detailsid' : detailsid},function(data){ 
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

<div class="mastertitle" style="float:left; font-family:'Trebuchet MS'; margin-left:50px; margin-top:10px;">Event Search Result</div>
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
    <div style="width:200px;  font-family:'Trebuchet MS'; font-size:15px;  margin-bottom:25px;"> <a href="eventreports.php">Modify Search</a> </div>
  </div>
</div>
<div id="memberdetails"></div>
<div style="clear:both"></div>
<div style="max-height:auto; min-height:500px;">
  <div style="float:right; margin-right:40px; margin-bottom:20px; font-weight: bold;">
    <form name="form" method="GET" action="searchresult.php" id="pageno">
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
    
    <div style="clear:both;height:10px;"></div>
    <table align="center" width="95%" border="1" cellspacing="0" cellpadding="0" style="font-family:'Trebuchet MS'; font-size:13px;">
      <tr style="background-color:#e2fcdb;">
        <th height="31" align="center" valign="middle" style="width:35px;">S.no</th>
        <th align="center" valign="middle" ><div style="width:100px; word-wrap:break-word;">Name</div></th>
        <th align="center" valign="middle"><div style="width:60px; word-wrap:break-word;">Type</div></th>
        <th align="center" valign="middle" ><div style="width:60px; word-wrap:break-word;">Mandal</div></th>
        <th align="center" valign="middle" ><div style="width:50px; word-wrap:break-word;">Village</div></th>
        <th align="center" valign="middle" ><div style="width:90px; word-wrap:break-word;">Phone</div></th>
        <th align="center" valign="middle" ><div style="width:70px; word-wrap:break-word;">Date</div></th>
        <th align="center" valign="middle" ><div style="width:70px; word-wrap:break-word;">Time</div></th>
        <th align="center" valign="middle" ><div style="width:70px; word-wrap:break-word;">Attend</div></th>
        <th align="center" valign="middle" ><div style="width:60px; word-wrap:break-word;">Details</div></th>
        <th align="center" valign="middle" ><div style="width:40px;">
            <input type="checkbox"  class="allcheck" id="all" />
            All</div></th>
      </tr>
      <?php 

$i =1;

while($result = mysql_fetch_array($resultquery))
{ 
 ?>
      <tr>
        <td height="31" align="center" valign="middle"><div style="width:35px;"><?php echo $i ; ?></div></td>
        <td align="center" valign="middle"><div style="width:100px; word-wrap:break-word;"><?php echo ucfirst($result['event_name']);?></div></td>
        <td align="center" valign="middle"><div style="width:60px; word-wrap:break-word;"><?php echo ucfirst($result['event_type']);?></div></td>
        <td align="center" valign="middle"><div style="width:60px; word-wrap:break-word;"><?php echo ucfirst($result['mandal']); ?></div></td>
        <td align="center" valign="middle"><div style="width:50px; word-wrap:break-word;"><?php echo ucfirst($result['village']); ?></div></td>
        <td align="center" valign="middle"><div style="width:90px; word-wrap:break-word;"><?php echo ucfirst($result['phone']); ?></div></td>
        <td align="center" valign="middle"><div style="width:70px; word-wrap:break-word;"><?php echo ucfirst($result['date']); ?></div></td>
        <td align="center" valign="middle"><div style="width:70px; word-wrap:break-word;"><?php echo ucfirst($result['time']); ?></div></td>
        <td align="center" valign="middle"><div style="width:70px; word-wrap:break-word;"><?php echo ucfirst($result['status']);?></div></td>
        <td align="center" valign="middle"><div style="width:60px; word-wrap:break-word;"><a href="#" class="details" id="<?php  echo $result['id'];?>" onclick="javascript:getID(this)">details</a></div></td>
        <td align="center" valign="middle"><div style="width:40px;">
            <input type="checkbox" name="mobile[]" class="check" value="<?php echo $result['phone']; ?>" />
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
<center>
  <?php echo $pagination; ?>
</center>
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>
