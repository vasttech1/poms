 <?php 
ob_start();
include('includes/session.php');
$from= $_POST['from'];
$to = $_POST['to'];
$status =$_POST['status'];
$receivedfrom = $_POST['receivedfrom'];

if($from!='' || $to!='' || $status !='0' || $receivedfrom != '')
{
	$sql = "SELECT * FROM letters WHERE ";
	
	if($from!='' && $to!='' )
	{
		$sql.=" letterdate BETWEEN '".$from."' AND  '".$to."' ";
		$sql.= "AND ";
	}
	if($status != '0')
	{
		$sql.= " status = '".$status."' ";
		$sql.= "AND ";
	}
	if($receivedfrom !='')
	{
		$sql.=" receivedfrom='".$receivedfrom."' ";
		$sql.="AND ";
	}
		$sql =  rtrim($sql, "AND ");
	}
	
		if($from=='' && $to=='' && $status =='0' && $receivedfrom == '')
		{
			 $sql = "SELECT * FROM letters"; 
		}
		$qry = mysql_query($sql);
		$rows = mysql_num_rows($qry );

  if($rows >0)
{
?>
<link href="style.css" rel="stylesheet" type="text/css" />
<div style="height:10px;"></div>
<div style=" height:500px; overflow:scroll;">
  <div style="height:auto; width:auto;"><br />
<br />

  
    <table align="center" width="95%" border="1" cellspacing="0" cellpadding="0" style="font-family:'Trebuchet MS'; font-size:13px;">
  <tr style="background-color:#e2fcdb;">
    <th align="center" valign="middle" ><div>S.no</div></th>
    <th align="center" valign="middle" ><div>Received From</div></th>
    <th align="center" valign="middle" ><div style="width:100px; word-wrap:break-word;">Sender name & address</div></th>
    <th align="center" valign="middle" ><div style="width:80px; word-wrap:break-word;">Received Through & date</div></th>
    <th align="center" valign="middle" ><div>Lr no & Date</div></th>
    <th align="center" valign="middle" ><div style="width:100px; word-wrap:break-word;">Description</div></th>
    <th align="center" valign="middle" ><div style="word-wrap:break-word; width:80px;">Enclosures</div></th>
    <th align="center" valign="middle" ><div style="width:100px; word-wrap:break-word;">MP comments</div></th>
    <th align="center" valign="middle" ><div style="width:80px; word-wrap:break-word;">Actiontaken</div></th>
    <th align="center" valign="middle" ><div>Status</div></th>
    <th align="center" valign="middle" ><div>Submited Date</div></th>
  </tr>
  
     <?php 
$i =1;
while($result = mysql_fetch_assoc($qry ))
{ 
 ?>
  
  <tr>
    <td align="center" valign="middle"><div><?php echo $i ; ?></div></td>
    <td align="center" valign="middle"><div><?php echo ucfirst($result['receivedfrom']);?></div></td>
    <td align="center" valign="middle"><div style="width:100px; word-wrap:break-word;"><?php echo " Name : ".ucfirst($result['sendername']); echo  '<br>'; echo "Address : ".$result['senderaddress']; ?></div></td>
    <td align="center" valign="middle"><div style="width:80px; word-wrap:break-word;"><?php echo "Through:".ucfirst($result['receivedthrough']);  echo  '<br>'; echo "Date : ".$result['receiveddate'];  ?></div></td>
    <td align="center" valign="middle"><div><?php echo "LR No.:".ucfirst($result['lrno']);  echo  '<br>'; echo "LR Date : ".$result['lrdate'];  ?></div></td>
    <td align="center" valign="middle"><div style="width:100px; word-wrap:break-word;"><?php echo ucfirst($result['description']); ?></div></td>
    <td align="center" valign="middle"><div style="word-wrap:break-word; width:80px;"><?php echo ucfirst($result['enclosures']); ?></div></td>
    <td align="center" valign="middle"><div style="width:100px; word-wrap:break-word;"><?php echo ucfirst($result['mpcomments']); ?></div></td>
    <td align="center" valign="middle"><div style="width:80px; word-wrap:break-word;"><?php echo ucfirst($result['actiontaken']);?></div></td>
    <td align="center" valign="middle"><div><?php echo ucfirst($result['status']);?></div></td>
    <td align="center" valign="middle"><div><?php echo ucfirst($result['letterdate']);?></div></td>
  </tr>


    
     <div style="clear:both"></div>
    
    <?php
	 $i++;}
	 } else
	 {
	 
	 ?>
</table>
<div style="color:#FF0000;"><center>No Result Found</center></div>
     <?php
	 }
?>