<?php 
ob_start();
include('includes/session.php');

$id= $_POST['detailsid'];

$sql = mysql_query("SELECT * FROM workmanagement WHERE workid = ".$id."");
$result = mysql_fetch_array($sql);

$worktype = mysql_query("SELECT * FROM worktypemaster WHERE worktypeid = '".$result['typeofwork']."' ");
$worktypearray = mysql_fetch_assoc($worktype);

$scheme = mysql_query("SELECT * FROM schememaster WHERE schemeid = '".$result['scheme']."' ");
$schemearray = mysql_fetch_assoc($scheme);

$locality = mysql_query("SELECT * FROM localitymaster WHERE localityid = '".$result['locality']."' ");
$localityarray = mysql_fetch_assoc($locality);

$mandal = mysql_query("SELECT * FROM mandalmaster WHERE mandalid = '".$result['mandal']."' ");
$mandalarray = mysql_fetch_assoc($mandal);

$village = mysql_query("SELECT * FROM villagemaster WHERE villageid = '".$result['village']."' ");
$villagearray = mysql_fetch_assoc($village);

$status = mysql_query("SELECT * FROM statusmaster WHERE statusid = '".$result['currentstatus']."' ");
$statusarray = mysql_fetch_assoc($status);

$contractor = mysql_query("SELECT * FROM contractormaster WHERE contractorid = '".$result['contractor']."' ");
$contractorarray = mysql_fetch_assoc($contractor);

?>

<div style="height:auto; width:630px; margin:0 auto;">
  <style >
    .imagediv
	{
		 width:190px; overflow:hidden; height:190px;  float:left; -webkit-box-shadow: 1px 5px 24px -7px rgba(0,0,0,0.33);
-moz-box-shadow: 1px 5px 24px -7px rgba(0,0,0,0.33);
box-shadow: 1px 5px 24px -7px rgba(0,0,0,0.33);
	}
	.text_form{ width:180px; height:25px; float:left;  font-family:"Trebuchet MS"; font-size:13px; color:#333333; padding-top:5px; text-align:left; padding-left:5px; background-color:#e2fcdb;}
	.text_ans{ width:130px; height:25px; float:left; font-family:"Trebuchet MS"; font-size:13px; color:#333333; padding-top:5px; background-color:#e2fcdb; text-align:left; }
.right_div{ width:674px; height:auto; margin:0 auto; padding:0px; float:left;}
.left{ width:320px; height:auto; margin:0px; padding:0px; float:left;}
.right{ width:320px; height:auto; margin:0px; padding:0px; float:left;}
.formdetails{ width:350px; height:30px;  padding-top:5px; border-radius:5px; }
.textaradetails{ width:320px; height:auto;  padding:0px; max-height:auto; overflow: auto; min-height:100px;border-radius:5px; background-color:#eefcea; margin-top:5px; }
.textareadetails1{ width:150px; height:auto; float:left;  font-family:"Trebuchet MS"; font-size:14px; color:#333333; padding-top:7px; text-align:left; padding-left:10px;}

.textareadetails2{ width:160px; height:auto; float:left; font-family:"Trebuchet MS"; font-size:14px; color:#333333; padding-top:7px; word-wrap:break-word;}


    </style>
  <div style="clear:both"></div>
  
  <div align="center" class="right_div">
    <div style="height:auto; float:left;">
      <div class="left">
        <div class="formdetails">
          <div class="text_form"><strong>Scheme</strong></div>
          <div class="text_ans">:<?php echo ucfirst($schemearray['schemename']); ?></div>
        </div>
        <div class="formdetails">
          <div class="text_form"><strong>Assembly Constituency</strong></div>
          <div class="text_ans">:<?php echo ucfirst($result['constituency']); ?></div>
        </div>
        <div class="formdetails">
          <div class="text_form"><strong>Mandal/Town</strong></div>
          <div class="text_ans">:<?php echo ucfirst($mandalarray['mandalname']); ?></div>
        </div>
        <div class="formdetails">
          <div class="text_form"><strong>Village</strong></div>
          <div class="text_ans">:<?php echo ucfirst($villagearray['villagename']); ?> </div>
        </div>
        <div class="formdetails">
          <div class="text_form"><strong>Name of the work</strong></div>
          <div class="text_ans">:<?php echo ucfirst($result['nameofthework']); ?></div>
        </div>
        <div class="formdetails">
          <div class="text_form"><strong>Type of locality</strong></div>
          <div class="text_ans">:<?php echo ucfirst($localityarray['localityname']); ?></div>
        </div>
        <div class="formdetails">
          <div class="text_form"><strong>Type of Work</strong></div>
          <div class="text_ans">:<?php echo ucfirst($worktypearray['worktypename']); ?></div>
        </div>
        <div class="formdetails">
          <div class="text_form"><strong>Estimate Cost</strong></div>
          <div class="text_ans">:<?php echo ucfirst($result['estimatecost']); ?></div>
        </div>
      </div>
      <div class="right">
        <div class="formdetails">
          <div class="text_form"><strong>Admin Sanction Date</strong></div>
          <div class="text_ans">:<?php echo ucfirst($result['adminsancationdate']); ?></div>
        </div>
        <div class="formdetails">
          <div class="text_form"><strong>Admin Sanction No</strong></div>
          <div class="text_ans">:<?php echo ucfirst($result['adminsanctionno']); ?></div>
        </div>
        <div class="formdetails">
          <div class="text_form"><strong>Contractor</strong></div>
          <div class="text_ans">:<?php echo ucfirst($contractorarray['name']); ?></div>
        </div>
        <div class="formdetails">
          <div class="text_form"><strong>Date&nbsp;of&nbsp;Foundation&nbsp;Stone&nbsp;Layed</strong></div>
          <div class="text_ans">:<?php echo ucfirst($result['dateoffoundationstonelayed']) ; ?></div>
        </div>
        <div class="formdetails">
          <div class="text_form"><strong>Current status</strong></div>
          <div class="text_ans">:<?php echo ucfirst($statusarray['statusname']) ; ?></div>
        </div>
        <div class="formdetails" >
          <div class="text_form"><strong>Date of completion</strong></div>
          <div class="text_ans">:<?php echo ucfirst($result['dateofcompletion']); ?></div>
        </div>
        <div class="textaradetails">
          <div class="textareadetails1"><strong>Remarks</strong></div>
          <div class="textareadetails2">:<?php echo ucfirst($result['remarks']); ?></div>
        </div>
      </div>
    </div>
  </div>
  <div style="clear:both"></div>
  
  <div style="width:630px; height:auto; float:left;">
  
  <div style="border:1px solid #6bb756; font-family:'Trebuchet MS'; font-size:14px; float:left; background:#eefcea; width:303px; margin:5px; height:auto;"><strong>Copy of the Letter :</strong>
    <?php 
		  $copyofletter = $result['uploadcopyoftheletter'];
		  $copyofletter = explode(',', $copyofletter);
		  foreach ($copyofletter as $val){
		  if($val !='')
		  {
		  ?>
    <a href="download.php?download_file=uploadcopyoftheletter/<?php echo $val; ?>"><?php echo $val; ?></a>
    <?php }
?>
    <br>
    <?php
		  } ?>
  </div>
  <div style="border:1px solid #6bb756; float:left;  margin:5px; background:#eefcea; width:303px; height:auto; font-family:'Trebuchet MS'; font-size:14px;"><strong>Site photos before work started :</strong>
    <?php 
		  $sitephotos = $result['sitephotosbeforeworkstarted'];
		  $sitephotos = explode(',', $sitephotos);
		  foreach ($sitephotos as $val){
		  if($val !='')
		  {
		  ?>
    <a href="download.php?download_file=sitephotosbeforeworkstarted/<?php echo $val; ?>"><?php echo $val; ?></a>
    <?php }
?>
    <br>
    <?php
		  } ?>
  </div>

  <div style="border:1px solid #6bb756;  margin:5px; float:left; background:#eefcea; width:303px; height:auto; font-family:'Trebuchet MS'; font-size:14px;"><strong>Photos on Completion:</strong>
    <?php 
		  $photosoncompletion = $result['photosoncompletion'];
		  $photosoncompletion = explode(',', $photosoncompletion);
		  foreach ($photosoncompletion as $val){
		  if($val !='')
		  {
		  ?>
    <a href="download.php?download_file=photosoncompletion/<?php echo $val; ?>"><?php echo $val; ?></a>
    <?php }
?>
    <br>
    <?php
		  } ?>
  </div>
  <div >
    <div style="width:100px; text-align:center; float:right; border-radius:10px; height:auto; margin-top:80px; background-color:#e2fcdb;"><strong><a href="editworkreport.php?id=<?php echo $result['workid'];?>">Edit Details</a></strong></div>
  </div>
  </div>
</div>
