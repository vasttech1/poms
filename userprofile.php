<?php 
error_reporting(E_ALL ^E_NOTICE ^E_WARNING);
include('includes/session.php');
$user = new User();
// Checking for user logged in or not
if ($user->get_session())
{

}
$id= $_GET['id'];

$sql = mysql_query("SELECT * FROM register WHERE registerid = ".$id."");
$result = mysql_fetch_array($sql);

$religion = mysql_query("SELECT * FROM religionmaster WHERE religionid = '".$result['religion']."' ");
$religionarray = mysql_fetch_assoc($religion);

$caste = mysql_query("SELECT * FROM castemaster WHERE casteid = '".$result['caste']."' ");
$castearray = mysql_fetch_assoc($caste);

$mandal = mysql_query("SELECT * FROM mandalmaster WHERE mandalid = '".$result['mandal']."' ");
$mandalarray = mysql_fetch_assoc($mandal);

$village = mysql_query("SELECT * FROM villagemaster WHERE villageid = '".$result['village']."' ");
$villagearray = mysql_fetch_assoc($village);

include('includes/header.php');
include('includes/menu.php');
?>

<div style="clear:both"></div>
<div class="mastertitle">Member Profile</div>
<div style="clear:both"></div>
<div class="left_div"><img src="uploads/<?php echo $result['image']; ?>" vspace="7" hspace="8" height="225" width="225" alt="ponnamprabhakar" border="0" /></div>
<div class="right_div">
  <div style="height:auto; float:right;">
    <div class="form_after_login">
      <div class="text_form"><strong>Full Name of Person</strong></div>
      <div class="text_ans"><?php echo ucfirst($result['name']); ?></div>
    </div>
    <div class="form_after_login">
      <div class="text_form"><strong>Gender</strong></div>
      <div class="text_feiled_" style="padding-top:5px;"><?php echo ucfirst($result['gender']); ?></div>
    </div>
    <div class="form_after_login">
      <div class="text_form"><strong>Father/Husband Name</strong></div>
      <div class="text_ans"><?php echo ucfirst($result['fhname']); ?></div>
    </div>
    <div class="form_after_login">
      <div class="text_form"><strong>Date of Birth</strong></div>
      <div class="text_ans"><?php echo ucfirst($result['dob']); ?></div>
    </div>
    <div class="form_after_login">
      <div class="text_form"><strong>Education Qualification</strong></div>
      <div class="text_ans"><?php echo ucfirst($result['education']); ?></div>
    </div>
    <div class="form_after_login">
      <div class="text_form"><strong>Religion</strong></div>
      <div class="text_ans"><?php echo ucfirst($religionarray['religionname']); ?></div>
    </div>
    <div class="form_after_login">
      <div class="text_form"><strong>Caste</strong></div>
      <div class="text_ans"><?php echo ucfirst($castearray['castename']); ?></div>
    </div>
    <div class="form_after_login">
      <div class="text_form"><strong>Address</strong></div>
      <div class="text_ans"></div>
    </div>
    <div class="form_after_login">
      <div class="text_form"><strong>H.No</strong></div>
      <div class="text_ans"><?php echo ucfirst($result['hno']); ?></div>
    </div>
    <div class="form_after_login">
      <div class="text_form"><strong>Street</strong></div>
      <div class="text_ans"><?php echo ucfirst($result['street']); ?></div>
    </div>
    <div class="form_after_login">
      <div class="text_form"><strong>Constituency</strong></div>
      <div class="text_ans"><?php echo ucfirst($result['constituency']); ?></div>
    </div>
    <div class="form_after_login">
      <div class="text_form"><strong>Mandal/Town</strong></div>
      <div class="text_ans"><?php echo ucfirst($mandalarray['mandalname']); ?></div>
    </div>
    <div class="form_after_login">
      <div class="text_form"><strong>Village</strong></div>
      <div class="text_ans"><?php echo ucfirst($villagearray['villagename']); ?> </div>
    </div>
    <div class="form_after_login">
      <div class="text_form"><strong>Cell Number</strong></div>
      <div class="text_ans"><?php echo ucfirst($result['mobile']); ?></div>
    </div>
    <div class="form_after_login">
      <div class="text_form"><strong>Phone Number</strong></div>
      <div class="text_ans"><?php echo ucfirst($result['phone']); ?></div>
    </div>
    <div class="form_after_login">
      <div class="text_form"><strong>Email Id</strong></div>
      <div class="text_ans"><?php echo ucfirst($result['email']); ?></div>
    </div>
    <div class="form_after_login">
      <div class="text_form"><strong>Current&nbsp;Genral&nbsp;Position&nbsp;</strong></div>
      <div class="text_ans"><?php echo ucfirst($result['generalcurrentpositionlevel']).' - '.ucfirst($result['generalcurrentpositionname']) ; ?></div>
    </div>
    <div class="form_after_login">
      <div class="text_form"><strong>Current&nbsp;Position&nbsp;held&nbsp;in&nbsp;</strong></div>
      <div class="text_ans"><?php echo ucfirst($result['partycurrentpositionlevel']).' - '.ucfirst($result['partycurrentpositionname']) ; ?></div>
    </div>
    <div class="form_after_login2" style="background-color:#e2fcdb; height:auto;">
      <div class="text_form2"><strong>Positions held in past</strong></div>
      <div class="text_ans2"><?php echo ucfirst($result['pastpositions']); ?></div>
    </div>
    <div class="form_after_login2">
      <div class="text_form2"><strong>Other Details</strong></div>
      <div class="text_ans2"><?php echo ucfirst($result['otherdetails']); ?></div>
    </div>
    <div class="form_sub">
      <div class="text_form">
        <input type="button" onclick="history.go(-1)" value="BACK TO SEARCH RESULTS">
      </div>
      <div class="text_feiled_"></div>
    </div>
  </div>
</div>
</div>
<?php include('includes/footer.php'); ?>
