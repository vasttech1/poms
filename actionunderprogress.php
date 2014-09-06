<?php 
error_reporting(E_ALL ^E_NOTICE ^E_WARNING);
include('includes/session.php');
$user = new User();
// Checking for user logged in or not
if ($user->get_session())
{

}

?>
<script type="text/javascript" src="jquery/jquery-1.9.1.js"></script>
<?php 
$actionunderprogress = $user->actionunderprogress();
$rows = mysql_num_rows($actionunderprogress);
if($rows >0)
{
?>
<link href="style.css" rel="stylesheet" type="text/css" />
<table width="100%" border="1" cellspacing="0" cellpadding="0" style="font-family:'Trebuchet MS'; font-size:13px;">
  <tr style="background-color:#e2fcdb;">
    <th align="center" valign="middle" ><div style="word-wrap:break-word;">S.no</div></th>
    <th align="center" valign="middle" ><div style="word-wrap:break-word; width:120px;">Received From</div></th>
    <th align="center" valign="middle"  ><div style="word-wrap:break-word; width:120px;">Sender name & address</div></th>
    <th align="center" valign="middle" ><div style="word-wrap:break-word; width:120px;">Received Through & date</div></th>
    <th align="center" valign="middle"  ><div style="word-wrap:break-word; width:120px;">Lr no & Date</div></th>
    <th align="center" valign="middle"  ><div style="word-wrap:break-word; width:150px;">Description</div></th>
    <th align="center" valign="middle" ><div style="word-wrap:break-word;">Enclosures</div></th>
    <th align="center" valign="middle"><div style="width:200px; word-wrap:break-word;">MP comments</div></th>
    <th align="center" valign="middle"  ><div style="word-wrap:break-word; width:120px;">Actiontaken</div></th>
    <th align="center" valign="middle"  ><div style="word-wrap:break-word; width:120px;">Status</div></th>
    <th align="center" valign="middle"  ><div style="word-wrap:break-word;width:120px;">Submited Date</div></th>
  </tr>

    <?php 

$i =1;

while($result = mysql_fetch_array($actionunderprogress))
{ 
 ?>
 
 <div>
  <tr  >
    <td align="center" valign="middle" ><div><?php echo $i ; ?></div></td>
    <td align="center" valign="middle" ><div style="word-wrap:break-word; width:120px;"><?php echo ucfirst($result['receivedfrom']);?></div></td>
    <td align="center" valign="middle" ><div style="word-wrap:break-word; width:120px;"><?php echo " Name : ".ucfirst($result['sendername']); echo  '<br>'; echo "Address : ".$result['senderaddress']; ?></div></td>
    <td align="center" valign="middle" ><div style="word-wrap:break-word; width:120px;"><?php echo "Through:".ucfirst($result['receivedthrough']);  echo  '<br>'; echo "Date : ".$result['receiveddate'];  ?></div></td>
    <td align="center" valign="middle" ><div style="word-wrap:break-word; width:120px;"><?php echo "LR No.:".ucfirst($result['lrno']);  echo  '<br>'; echo "LR Date : ".$result['lrdate'];  ?></div></td>
    <td align="center" valign="middle" ><div style="word-wrap:break-word; width:150px;"><?php echo ucfirst($result['description']); ?></div></td>
    <td align="center" valign="middle" ><div style="word-wrap:break-word; width:120px;"><?php echo ucfirst($result['enclosures']); ?></div></td>
    <td align="center" valign="middle" ><div style="word-wrap:break-word; width:200px;"><?php echo ucfirst($result['mpcomments']); ?></div></td>
    <td align="center" valign="middle" ><div style="word-wrap:break-word; width:120px;"><?php echo ucfirst($result['actiontaken']);?></div></td>
    <td align="center" valign="middle" ><div style="word-wrap:break-word; width:120px;"><?php echo ucfirst($result['status']);?></div></td>
    <td align="center" valign="middle" ><div style="word-wrap:break-word; width:120px;"><?php echo ucfirst($result['letterdate']);?></div></td>
  </tr>
  </div>
  
   <?php
	 $i++;}
	 } 
?>
<div style="clear:both"></div>
  
</table>
