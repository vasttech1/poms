<?php 
error_reporting(E_ALL ^E_NOTICE ^E_WARNING);
include('includes/session.php');
$user = new User();
// Checking for user logged in or not
if ($user->get_session())
{

}

?>
<style>
.main_sn_1{ width:965px; height:35px; margin:0px; padding:0px; border:1px solid #37991b;  background-color:#e2fcdb;}

.main_sn_2{ width:1250px; height:auto; margin:0px; padding:0px; border:1px solid #37991b; min-height:50px; overflow:auto; }

.main_sn_4{ width:965px; height:auto; margin:0px; padding:0px; border:1px solid #37991b; min-height:50px; overflow:auto; }

.main_sn_3{
	width:1250px;
	height:40px;
	margin:0px;
	padding:0px;
	border:1px solid #37991b;
	background-color:#e2fcdb; overflow:auto;
}
.main_sn_4{
	
	height:40px;
	margin:0px;
	padding:0px;
	
	
}
.main_sn_5{ width:1250px; height:auto; margin:0px; padding:0px; border:1px solid #37991b; min-height:50px; overflow:auto; }

.sno{ width:40px; float:left;   font-family:"Trebuchet MS"; font-size:13px; color:#333333; text-align:center; padding-top:5px; font-weight:bold;}



.name_1{ width:120px; float:left;  font-family:"Trebuchet MS"; font-size:13px; color:#333333; text-align:center; padding-top:5px; font-weight:bold; word-wrap:break-word;}
.sn_1{ width:60px; float:left; font-family:"Trebuchet MS"; font-size:13px; color:#333333; text-align:center; padding-top:5px; font-weight:bold;}
.sn_2{ width:80px; float:left;  font-family:"Trebuchet MS"; font-size:13px; color:#333333; text-align:center; padding-top:5px; font-weight:bold;word-wrap:break-word;}
.name_2{ width:100px;  float:left;  font-family:"Trebuchet MS"; font-size:13px; color:#333333; text-align:center; padding-top:5px; font-weight:bold; word-wrap:break-word;}
.edit_1{ width:50px; float:left; font-family:"Trebuchet MS"; font-size:13px; color:#333333; text-align:center; padding-top:5px;
 font-weight:bold;}
 .name_3{ width:90px;  float:left;  font-family:"Trebuchet MS"; font-size:13px; color:#333333; text-align:center; padding-top:5px; font-weight:bold; word-wrap:break-word;}
 
 .sn_3{ width:50px; float:left; font-family:"Trebuchet MS"; font-size:13px; color:#333333; text-align:center; padding-top:5px; font-weight:bold;}
 
 .sl_no{ width:40px; float:left;   font-family:"Trebuchet MS"; font-size:13px; color:#333333; text-align:center; padding-top:5px;
  font-weight:bold; height:auto; min-height:35px; border-right:1px dotted #37991b; }
 
 .Rece_fro{ width:120px; float:left;  font-family:"Trebuchet MS"; font-size:13px; color:#333333; text-align:center;
  font-weight:bold; word-wrap:break-word; height:auto; min-height:35px; word-wrap:break-word; overflow:auto; border-left:1px dotted #000; padding:5px 3px 0px 3px; border-right:1px dotted #37991b;}
 
 .sender{ width:120px; float:left; font-family:"Trebuchet MS"; font-size:13px; color:#333333; text-align:center;
 font-weight:bold; height:auto; min-height:35px; word-wrap:break-word; overflow:auto; border-left:1px dotted #37991b; 
  padding:5px 3px 0px 3px; border-right:1px dotted #37991b;}

 .description{ width:100px;  float:left;  font-family:"Trebuchet MS"; font-size:13px; color:#333333; text-align:center; font-weight:bold; word-wrap:break-word; height:auto; min-height:35px; word-wrap:break-word; overflow:auto; border-left:1px dotted #37991b;
 padding:5px 3px 0px 3px;
 }
 
 
  .sl_no2{ width:40px; float:left;   font-family:"Trebuchet MS"; font-size:13px; color:#333333; text-align:center; padding-top:5px;
  font-weight:bold; height:auto; min-height:55px; border-right:1px dotted #37991b; }
 
 .Rece_fro2{ width:120px; float:left;  font-family:"Trebuchet MS"; font-size:13px; color:#333333; text-align:center;
  font-weight:bold; word-wrap:break-word; height:auto; min-height:55px; word-wrap:break-word; overflow:auto; border-left:1px dotted #000; padding:5px 3px 0px 3px; border-right:1px dotted #37991b;}
 
 .sender2{ width:120px; float:left; font-family:"Trebuchet MS"; font-size:13px; color:#333333; text-align:center;
 font-weight:bold; height:auto; min-height:55px; word-wrap:break-word; overflow:auto; border-left:1px dotted #37991b; 
  padding:5px 3px 0px 3px; border-right:1px dotted #37991b;}

 .description2{ width:100px;  float:left;  font-family:"Trebuchet MS"; font-size:13px; color:#333333; text-align:center; font-weight:bold; word-wrap:break-word; height:auto; min-height:55px; word-wrap:break-word; overflow:auto; border-left:1px dotted #37991b; 
 padding:5px 3px 0px 3px;
 }
  
 
 .my_sn{ width:99px; height:auto;  float:left; border-right:1px dotted #37991b; min-height:25px;  font-family:"Trebuchet MS"; font-size:13px; color:#333333; text-align:center; padding-top:5px; font-weight:bold;}
 
</style>
<script type="text/javascript" src="jquery/jquery-1.9.1.js"></script>
<?php 
$morethanmonth = $user->morethanmonth();
$rows = mysql_num_rows($morethanmonth);
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

while($result = mysql_fetch_array($morethanmonth))
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
