<?php 
ob_start();
include('includes/session.php');

$id= $_POST['detailsid'];
$sql = mysql_query("SELECT * FROM register WHERE registerid=".$id."");
$result = mysql_fetch_array($sql);

$religion = mysql_query("SELECT * FROM religionmaster WHERE religionid = '".$result['religion']."' ");
$religionarray = mysql_fetch_assoc($religion);

$caste = mysql_query("SELECT * FROM castemaster WHERE casteid = '".$result['caste']."' ");
$castearray = mysql_fetch_assoc($caste);

$mandal = mysql_query("SELECT * FROM mandalmaster WHERE mandalid = '".$result['mandal']."' ");
$mandalarray = mysql_fetch_assoc($mandal);

$village = mysql_query("SELECT * FROM villagemaster WHERE villageid = '".$result['village']."' ");
$villagearray = mysql_fetch_assoc($village);
?>
<div>
    <style >
    .imagediv
	{
		 width:190px; overflow:hidden; height:190px;  float:left; -webkit-box-shadow: 1px 5px 24px -7px rgba(0,0,0,0.33);
-moz-box-shadow: 1px 5px 24px -7px rgba(0,0,0,0.33);
box-shadow: 1px 5px 24px -7px rgba(0,0,0,0.33);
	}
	.text_form{ width:150px; height:25px; float:left;  font-family:"Trebuchet MS"; font-size:13px; color:#333333; padding-top:5px; text-align:left; padding-left:5px;}
	.text_ans{ width:160px; height:23px; float:left; font-family:"Trebuchet MS"; font-size:13px; color:#333333; padding-top:5px;}
.right_div{ width:674px; height:auto; margin:0px; padding:0px; float:left;}
.left{ width:320px; height:auto; margin:0px; padding:0px; float:left;}
.right{ width:320px; height:auto; margin:0px; padding:0px; float:left;}
.formdetails{ width:320px; height:30px;  padding:0px; border-radius:5px; }
.textaradetails{ width:320px; height:auto;  padding:0px; max-height:auto; overflow: auto; min-height:100px;border-radius:5px; }
.textareadetails1{ width:150px; height:auto; float:left;  font-family:"Trebuchet MS"; font-size:14px; color:#333333; padding-top:7px; text-align:left; padding-left:10px;}

.textareadetails2{ width:160px; height:auto; float:left; font-family:"Trebuchet MS"; font-size:14px; color:#333333; padding-top:7px; word-wrap:break-word;}


    </style>
    <div style="clear:both"></div>
<?php if($result['image'] !=''){ ?>
    <div class="imagediv"><img src="uploads/<?php echo $result['image']; ?>" vspace="7" hspace="8" height="180" width="180" alt="ponnamprabhakar" border="0" /></div>
<?php } ?>
    <div class="right_div">
   
      <div style="height:auto; float:left;">
       <div class="left">
        <div class="formdetails">
          <div class="text_form"><strong>Full Name of Person</strong></div>
          <div class="text_ans">:<?php echo ucfirst($result['name']); ?></div>
        </div>
        <div class="formdetails">
          <div class="text_form"><strong>Gender</strong></div>
          <div class="text_ans">:<?php echo ucfirst($result['gender']); ?></div>
        </div>
        <div class="formdetails">
          <div class="text_form"><strong>Father/Husband Name</strong></div>
          <div class="text_ans">:<?php echo ucfirst($result['fhname']); ?></div>
        </div>
        <div class="formdetails">
          <div class="text_form"><strong>Date of Birth</strong></div>
          <div class="text_ans">:<?php echo ucfirst($result['dob']); ?></div>
        </div>
        <div class="formdetails">
          <div class="text_form"><strong>Education Qualification</strong></div>
          <div class="text_ans">:<?php echo ucfirst($result['education']); ?></div>
        </div>
        <div class="formdetails">
          <div class="text_form"><strong>Religion</strong></div>
          <div class="text_ans">:<?php echo ucfirst($religionarray['religionname']); ?></div>
        </div>
        <div class="formdetails">
          <div class="text_form"><strong>Caste</strong></div>
          <div class="text_ans">:<?php echo ucfirst($castearray['castename']); ?></div>
        </div>
        <div class="formdetails">
          <div class="text_form"><strong>Address</strong></div>
          <div class="text_ans"></div>
        </div>
        <div class="formdetails">
          <div class="text_form"><strong>H.No</strong></div>
          <div class="text_ans">:<?php echo ucfirst($result['hno']); ?></div>
        </div>
        <div class="formdetails">
          <div class="text_form"><strong>Street</strong></div>
          <div class="text_ans">:<?php echo ucfirst($result['street']); ?></div>
        </div>
        <div class="formdetails">
          <div class="text_form"><strong>Constituency</strong></div>
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
        </div>
        <div class="right">
        <div class="formdetails">
          <div class="text_form"><strong>Cell Number</strong></div>
          <div class="text_ans">:<?php echo ucfirst($result['mobile']); ?></div>
        </div>
        <div class="formdetails">
          <div class="text_form"><strong>Phone Number</strong></div>
          <div class="text_ans">:<?php echo ucfirst($result['phone']); ?></div>
        </div>
        <div class="formdetails">
          <div class="text_form"><strong>Email Id</strong></div>
          <div class="text_ans">:<?php echo ucfirst($result['email']); ?></div>
        </div>
        <div class="formdetails">
          <div class="text_form"><strong>Current Genral Position </strong></div>
          <div class="text_ans">:<?php echo ucfirst($result['generalcurrentpositionlevel']).' - '.ucfirst($result['generalcurrentpositionname']) ; ?></div>
        </div>
        <div class="formdetails">
          <div class="text_form"><strong>Current Party Position</strong></div>
          <div class="text_ans">:<?php echo ucfirst($result['partycurrentpositionlevel']).' - '.ucfirst($result['partycurrentpositionname']) ; ?></div>
        </div>
        <div class="textaradetails" >
          <div class="textareadetails1"><strong>Positions held in past</strong></div>
          <div class="textareadetails2">:<?php echo ucfirst($result['pastpositions']); ?></div>
        </div>
        <div class="textaradetails">
          <div class="textareadetails1"><strong>Other Details</strong></div>
          <div class="textareadetails2">:<?php echo ucfirst($result['otherdetails']); ?></div>
        </div>
<div class="textaradetails">
          <div class="textareadetails1"><strong><a style="font-family:'Trebuchet MS'; color:#333333;" href="editmember.php?id=<?php echo $result['registerid'];?>">Edit Details</a></strong></div>
     
        </div>
<script>
$(document).ready(function() {
	$('#sendmessage').click(function(){
		$('#messageboxshow').show();
	});

$('#submit').click(function(){
var message1 = $('#message1').val();
if(message1 == '')
{
	alert('Please enter message');
	return false;
}
var r = confirm("Are you sure to send message for this person!");
if (r == true)
  {
  
  }
else
  {
 return false;
  }
});

});
</script>
        <div id="sendmessage">Send Message</div>
       
      <div style="display:none;" id="messageboxshow">
         <form method="post">   Message
         <input type="text" name="mobileno" value="<?php echo $result['mobile']; ?>" hidden="hidden" />
 <textarea name="textmessage" id="message1" cols="40" rows="4"  maxlength="160"></textarea>
 <input type="submit" name="send" value="Send Message" id="submit" />
 </form>
  </div>      
      </div>
      </div>
    </div>
  </div>