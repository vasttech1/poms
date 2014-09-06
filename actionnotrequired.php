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
$actionnotrequired = $user->actionnotrequired();
$rows = mysql_num_rows($actionnotrequired);
if($rows >0)
{
?>
<link href="style.css" rel="stylesheet" type="text/css" />
<div style="min-height:500px;">
  <div style="height:auto; width:auto;">
    <div class="main_sn_3">
      <div class="sno"><strong>S.no</strong></div>
      <div class="name_1"><strong>Received From</strong></div>
      <div class="sn_1"><strong>Sender name & address</strong></div>
      <div class="sn_2"><strong>Received Through & date</strong></div>
      <div class="sn_1"><strong>Lr no & Date</strong></div>
      <div class="name_2"><strong>Description</strong></div>
      <div class="name_1"><strong>Enclosures</strong></div>
      <div class="name_1"><strong>MP comments</strong></div>
      <div class="name_2"><strong>Actiontaken</strong></div>
      <div class="name_2"><strong>Status</strong></div>
      <div class="edit_1"><strong>Submited Date</strong></div>
    </div>
    <?php 

$i =1;

while($result = mysql_fetch_array($actionnotrequired))
{ 
 ?>
    <div style="clear:both"></div>
    <div class="main_sn_2">
      <div class="sno"><strong><?php echo $i ; ?></strong></div>
      <div class="name_1"><strong><?php echo ucfirst($result['receivedfrom']);?></strong></div>
      <div class="sn_1"><strong><?php echo " Name : ".ucfirst($result['sendername']); echo  '<br>'; echo "Address : ".$result['senderaddress']; ?></strong></div>
      <div class="sn_2"><strong><?php echo "Through:".ucfirst($result['receivedthrough']);  echo  '<br>'; echo "Date : ".$result['receiveddate'];  ?></strong></div>
      <div class="sn_1"><strong><?php echo "LR No.:".ucfirst($result['lrno']);  echo  '<br>'; echo "LR Date : ".$result['lrdate'];  ?></strong></div>
      <div class="name_2"><strong><?php echo ucfirst($result['description']); ?></strong></div>
      <div class="name_1"><strong><?php echo ucfirst($result['enclosures']); ?></strong></div>
      <div class="name_1"><strong><?php echo ucfirst($result['mpcomments']); ?></strong></div>
      <div class="name_2"><strong><?php echo ucfirst($result['actiontaken']);?></strong></div>
      <div class="name_2"><strong><?php echo ucfirst($result['status']);?></strong></div>
      <div class="edit_1"><strong><?php echo ucfirst($result['letterdate']);?></strong></div>
    </div>
    <?php
	 $i++;}
	 } 
?>
    <div style="clear:both"></div>
    <div class="main_sn_2"></div>
  </div>
</div>
