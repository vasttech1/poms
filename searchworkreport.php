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
		$workname = mysql_real_escape_string($_POST['workname']);

		$locality = $_POST['locality'];
		$sqllocality =mysql_query("SELECT * FROM localitymaster WHERE localityid= '".$locality."'");
		$arraylocality = mysql_fetch_assoc($sqllocality);

		$typeofwork = $_POST['typeofwork'];
		$sqlworktype =mysql_query("SELECT * FROM worktypemaster WHERE worktypeid= '".$typeofwork."'");
		$arrayworktype = mysql_fetch_assoc($sqlworktype);

		$amountfrom = $_POST['amountfrom'];
		$amountto = $_POST['amountto'];

		$contractor = $_POST['contractor'];
		$sqlcontractor =mysql_query("SELECT * FROM contractormaster WHERE contractorid= '".$contractor."'");
		$arraycontractor = mysql_fetch_assoc($sqlcontractor);

		$constituency = $_POST['constituency'];

		$mandal = $_POST['mandal'];
		$sqlmandal =mysql_query("SELECT * FROM mandalmaster WHERE mandalid= '".$mandal."'");
		$arraymandal = mysql_fetch_assoc($sqlmandal);

		$village= $_POST['village'];
		$sqlvillage =mysql_query("SELECT * FROM villagemaster WHERE villageid= '".$village."'");
		$arrayvillage = mysql_fetch_assoc($sqlvillage);

		$scheme = mysql_real_escape_string($_POST['scheme']);
		$sqlscheme =mysql_query("SELECT * FROM schememaster WHERE schemeid= '".$scheme."'");
		$arrayscheme = mysql_fetch_assoc($sqlscheme);

		$status = mysql_real_escape_string($_POST['status']);
		$sqlstatus =mysql_query("SELECT * FROM statusmaster WHERE statusid= '".$status."'");
		$arraystatus = mysql_fetch_assoc($sqlstatus);

	
    if($workname!='' || $locality!='' || $typeofwork !='' || $amountfrom!='' ||$amountto!=''  || $contractor!='' ||$constituency !='' ||$mandal!=''|| $village!= ''||$scheme != '' || $status !='' )
        {
		$sqlquery = "SELECT * FROM workmanagement WHERE";
		
		$sqlcount = "SELECT COUNT(*) as num FROM workmanagement WHERE";
		$sql = " ";
		if($workname != '')
		{
			$sql.="nameofthework LIKE '%$workname%'";
			$sql.="AND ";
		}
		if($locality!='')
		{
			$sql.="locality = '".$locality."' ";
			$sql.="AND ";
		}
		if($typeofwork!='')
		{
			$sql.="typeofwork = '".$typeofwork."' ";
			$sql.="AND ";
		}
		if($contractor!='')
		{
			$sql.="contractor = '".$contractor."' ";
			$sql.="AND ";
		}
		if($constituency != '')
		{
			$sql.="constituency = '".$constituency."' ";
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
		if($scheme!='')
		{
			$sql.="scheme = '".$scheme."'";
			$sql.="AND ";
		}
		if($status!='')
		{
			$sql.="currentstatus ='".$status."' ";
			$sql.="AND ";
		}
		
        if($amountfrom !='' && $amountto !='')
        {
          $sql.=  "estimatecost BETWEEN ".$amountfrom." AND ".$amountto." ";
          $sql.="AND ";
        }
		
		$sql1 =  rtrim($sql, "AND ");
		
		$result1 = $sqlquery.' '.$sql1;  	
		$result2 = $sqlcount.' '.$sql1;  
		 
		$searchquery = "You searched keywords are ";
		if($workname!='')
		{
			$msg.="Work Name=".$workname;
			$msg.=", ";
		}
	
		if($locality!='')
		{
			$msg.="Type of Locality ='".$arraylocality['localityname']."'";
			$msg.=", ";
		}
		
		if($typeofwork!='')
		{
			$msg.="Type of Work ='".$arrayworktype['worktypename']."'";
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
		if($scheme!='')
		{
			$msg.="Scheme ='".$arrayscheme['schemename']."'";
			$msg.=", ";
		}
		if($status!='')
		{
			$msg.="Status ='".$arraystatus['statusname']."'";
			$msg.=", ";
		}
	
		if($amountfrom!='')
		{
			$msg.="Amount from=".$amountfrom." to =".$amountto;
			$msg.=", ";
		}
	
		$msg =  rtrim($msg, ", ");
		
		$message = $searchquery.''.$msg;
	 }
     else
     {
        $result1 = "SELECT * FROM workmanagement"; 
		$result2 = "SELECT COUNT(*) as num FROM workmanagement";
		
     }

$result3 = "SELECT * FROM workmanagement"; 

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

 $targetpage = "searchworkreport.php";
include('includes/header.php');
include('includes/menu.php');
  include('includes/pageignate.php');
?>
<script type="text/javascript">
  $(document).ready(function() {
        $('#pagination').change(function() {
            $('form#pageno').submit();
        });
		  });
function getID(theLink){

var detailsid = theLink.id;
$.post("workdetailsajax.php", {'detailsid' : detailsid},function(data){ 
	$('#addmessage').hide();
	$('#message').val('');
	$('#messageboxshow').hide();
	$('#messageboxhide').hide();
	$('#memberdetails').html(data)

	});
}
</script>

<div class="mastertitle" style="float:left; margin-left:50px; font-family:'Trebuchet MS'; font-size:15px; margin-top:20px;">Search Result</div>
<div style="clear:both"></div>
<div style=" color:#009; font-size:14px; font-weight:600">
  <center>
    <?php if(isset($message)){ echo $message;} ?>
  </center>
</div>
<div style="margin-top:25px; color:#006600; font-size:16px; font-weight:bold;">
  <center>
    <?php if(isset($sucessmsg)){ echo $sucessmsg;} ?>
  </center>
</div>
<div style="clear:both"></div>
<div>
  <div style="float:left; margin-top:0px;">
    <div style="width:400px; font-family:'Trebuchet MS'; font-size:15px; margin-bottom:10px; margin-left:50px; font-weight:bold; color:#009933;">Total Records: <?php echo $total_pages1;  ?>; </div>
  </div>
  <div style="float:right; margin-top:0px;">
    <div style="width:200px; font-family:'Trebuchet MS'; font-size:15px; margin-bottom:5px;"> <a href="searchwork.php">Modify Search</a> </div>
  </div>
  <div style="clear:both"></div>
  <div style="float:left; margin-top:0px;">
    <div style="width:400px; font-family:'Trebuchet MS'; font-size:15px;  margin-bottom:0px; margin-left:50px; font-weight:bold; color:#FF6600;"> Search Records: <?php echo $total_pages; ?>;</div>
  </div>
</div>
<div id="memberdetails"></div>
<div style="clear:both"></div>
<div style="max-height:auto; min-height:500px;">
  <div style="float:right; margin-right:40px; margin-bottom:20px; font-weight: bold;">
    <form name="form" method="GET" action="searchworkreport.php" id="pageno">
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
  
$i = 1;
  
  if($total_pages   >0)
  {
   ?>
  <form method="post">
    <div style="clear:both"></div>
    <div style="clear:both;height:10px;"></div>
    <table align="center" width="95%" border="1" cellspacing="0" cellpadding="0" style="font-family:'Trebuchet MS'; font-size:13px;">
      <tr style="background-color:#e2fcdb;">
        <th height="31" align="center" valign="middle" style="width:35px;">S.no</th>
        <th align="center" valign="middle" ><div style="width:100px; word-wrap:break-word;">Scheme</div></th>
        <th align="center" valign="middle"><div style="width:60px; word-wrap:break-word;">Name of the work</div></th>
        <th align="center" valign="middle" ><div style="width:100px; word-wrap:break-word;">Estimated Cost</div></th>
        <th align="center" valign="middle" ><div style="width:60px; word-wrap:break-word;">Type of locality</div></th>
        <th align="center" valign="middle" ><div style="width:90px; word-wrap:break-word;">Constituency</div></th>
        <th align="center" valign="middle" ><div style="width:70px; word-wrap:break-word;">Mandal</div></th>
        <th align="center" valign="middle" ><div style="width:70px; word-wrap:break-word;">Village</div></th>
        <th align="center" valign="middle" ><div style="width:70px; word-wrap:break-word;">Admin Sanction Date</div></th>
        <th align="center" valign="middle"><div style="width:70px; word-wrap:break-word;" >Admin Sanction No</div></th>
        <th align="center" valign="middle" ><div style="width:50px; word-wrap:break-word;">Current status</div></th>
        <th align="center" valign="middle" ><div style="width:60px; word-wrap:break-word;">Details</div></th>
      </tr>
      <?php 


while($result = mysql_fetch_array($resultquery))
{ 
$worktype = mysql_query("SELECT * FROM worktypemaster WHERE worktypeid = '".$result['typeofwork']."' ");
$worktypearray = mysql_fetch_assoc($worktype);

$scheme = mysql_query("SELECT * FROM schememaster WHERE schemeid = '".$result['scheme']."' ");
$schemearray = mysql_fetch_assoc($scheme);

$contractor = mysql_query("SELECT * FROM contractormaster WHERE contractorid = '".$result['contractor']."' ");
$contractorarray = mysql_fetch_assoc($contractor);


$locality = mysql_query("SELECT * FROM localitymaster WHERE localityid = '".$result['locality']."' ");
$localityarray = mysql_fetch_assoc($locality);

$mandal = mysql_query("SELECT * FROM mandalmaster WHERE mandalid = '".$result['mandal']."' ");
$mandalarray = mysql_fetch_assoc($mandal);

$village = mysql_query("SELECT * FROM villagemaster WHERE villageid = '".$result['village']."' ");
$villagearray = mysql_fetch_assoc($village);

$status = mysql_query("SELECT * FROM statusmaster WHERE statusid = '".$result['currentstatus']."' ");
$statusarray = mysql_fetch_assoc($status);
 ?>
      <tr>
        <td height="31" align="center" valign="middle"><div style="width:35px;"><?php echo $i ; ?></div></td>
        <td align="center" valign="middle"><div style="width:100px; word-wrap:break-word;"><?php echo ucfirst($schemearray['schemename']);?></div></td>
        <td align="center" valign="middle"><div style="width:60px; word-wrap:break-word;"><?php echo ucfirst($result['nameofthework']);?></div></td>
        <td align="center" valign="middle"><div style="width:60px; word-wrap:break-word;"><?php echo ucfirst($result['estimatecost']);?></div></td>
        <td align="center" valign="middle"><div style="width:60px; word-wrap:break-word;"><?php echo ucfirst($localityarray['localityname']); ?></div></td>
        <td align="center" valign="middle"><div style="width:90px; word-wrap:break-word;"><?php echo ucfirst($result['constituency']); ?></div></td>
        <td align="center" valign="middle"><div style="width:70px; word-wrap:break-word;"><?php echo ucfirst($mandalarray['mandalname']); ?></div></td>
        <td align="center" valign="middle"><div style="width:70px; word-wrap:break-word;"><?php echo ucfirst($villagearray['villagename']); ?></div></td>
        <td align="center" valign="middle"><div style="width:70px; word-wrap:break-word;"><?php echo ucfirst($result['adminsancationdate']);?></div></td>
        <td align="center" valign="middle"><div style="width:70px; word-wrap:break-word;"><?php echo ucfirst($result['adminsanctionno']);?></div></td>
        <td align="center" valign="middle"><div style="width:50px; word-wrap:break-word;"><?php echo ucfirst($statusarray['statusname']); ?></div></td>
        <td align="center" valign="middle"><div style="width:60px; word-wrap:break-word;"><a href="#" class="details" id="<?php  echo $result['workid'];?>" onClick="javascript:getID(this)">details</a></div></td>
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
