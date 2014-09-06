<?php 
ob_start();
include('includes/session.php');


$id= $_POST['detailsid'];
$sql = mysql_query("SELECT * FROM petition WHERE petitionid=".$id."");
$result = mysql_fetch_array($sql);
$forwardresult = $result['forwarded'];

$mandal = mysql_query("SELECT * FROM mandalmaster WHERE mandalid ='".$result['mandal']."'");
$mandalarray = mysql_fetch_assoc($mandal);

$village = mysql_query("SELECT * FROM villagemaster WHERE villageid ='".$result['village']."'");
$villagearray = mysql_fetch_assoc($village);

$subjectrequest =mysql_query("SELECT * FROM petitionmaster WHERE petitionid ='".$result['subjectrequest']."'");
$subjectrequestarray = mysql_fetch_assoc($subjectrequest);
		
$forwarded =mysql_query("SELECT * FROM petitionforwardmaster WHERE petitionforwardid ='".$result['forwarded']."'");
$forwardedarray= mysql_fetch_assoc($forwarded);
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
.textaradetails{ width:320px; height:auto;  padding:0px; max-height:auto; overflow: auto; min-height:100px;border-radius:5px; background-color:#e2fcdb; margin-top:5px; }
.textareadetails1{ width:150px; height:auto; float:left;  font-family:"Trebuchet MS"; font-size:14px; color:#333333; padding-top:7px; text-align:left; padding-left:10px;}

.textareadetails2{ width:160px; height:auto; float:left; font-family:"Trebuchet MS"; font-size:14px; color:#333333; padding-top:7px; word-wrap:break-word;}


    </style>
  <div style="clear:both"></div>
  <div align="center" class="right_div">
<?php if($forwardresult == '') 
{
?>
<div style="color:#FF0000; font-weight:bold; font-size:16px" >This petition is not forwarded to any one Please forward it</div>
<div style="clear:both;"> </div>
<div> <a href="editpetitiondetails.php?id=<?php echo $id;?>">Update Details</a></div>
<?php } ?>
    <div style="height:auto; float:left;">
      <div class="left">
        <div class="formdetails">
          <div class="text_form"><strong>Full Name </strong></div>
          <div class="text_ans">:<?php echo ucfirst($result['name']); ?></div>
        </div>
        <div class="formdetails">
          <div class="text_form"><strong>Gender</strong></div>
          <div class="text_ans">:<?php echo ucfirst($result['gender']); ?></div>
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
          <div class="text_form"><strong>Father/Husband Name</strong></div>
          <div class="text_ans">:<?php echo ucfirst($result['fhname']); ?></div>
        </div>
      <div class="formdetails">
          <div class="text_form"><strong>Cell Number</strong></div>
          <div class="text_ans">:<?php echo ucfirst($result['mobile']); ?></div>
        </div>
        <div class="formdetails">
          <div class="text_form"><strong>Subject Requested for</strong></div>
          <div class="text_ans">:<?php echo ucfirst($subjectrequestarray['petitionname']); ?></div>
        </div>
        <div class="textaradetails">
          <div class="textareadetails1"><strong>Content</strong></div>
          <div class="textareadetails2">:<?php echo ucfirst($result['content']); ?></div>
        </div>
      </div>
    </div>
  </div>
  <div style="clear:both"></div>
  <?php if($forwardresult != '') 
{
?>
  <div style="width:670px; height:auto; float:left;">
  <div style="color: #FF6600;font-size: 18px;font-weight: bold;padding: 20px;">
  Petition Cycle:
  </div>
   <table width="100%" border="1" cellspacing="0" cellpadding="0" style="font-family:'Trebuchet MS'; font-size:13px;">
  <tr style="background-color:#e2fcdb;">
        <th height="31" align="center" valign="middle" style="width:35px;">S.no</th>
        <th align="center" valign="middle" ><div style="width:100px; word-wrap:break-word;">Type</div></th>
        <th align="center" valign="middle" ><div style="width:100px; word-wrap:break-word;">Forwarded</div></th>
        <th align="center" valign="middle" ><div style="width:70px; word-wrap:break-word;">Remarks</div></th>
        <th align="center" valign="middle" ><div style="width:70px; word-wrap:break-word;">Date of Followup</div></th>
        <th align="center" valign="middle" ><div style="width:90px; word-wrap:break-word;">Related Document</div></th>
      </tr>
    <?php $sqlcycle = mysql_query("SELECT *FROM petitioncycle WHERE petition_id='".$id."'");
	$i =1;
  		while($arraycycle = mysql_fetch_assoc($sqlcycle))
		{
		
$forwardedcycle =mysql_query("SELECT *FROM petitionforwardmaster WHERE petitionforwardid='".$arraycycle['forwarded']."'");
$forwardedcyclearray= mysql_fetch_assoc($forwardedcycle);
 ?>
      <tr>
        <td height="31" align="center" valign="middle"><div style="width:35px;"><?php echo $i ; ?></div></td>
        <td align="center" valign="middle"><div style="width:100px; word-wrap:break-word;"><?php echo ucfirst($arraycycle['type']);?></div></td>
        <td align="center" valign="middle"><div style="width:100px; word-wrap:break-word;"><?php echo ucfirst($forwardedcyclearray['petitionforwardname']);?></div></td>
        <td align="center" valign="middle"><div style="width:70px; word-wrap:break-word;"><?php echo ucfirst($arraycycle['remarks']); ?></div></td>
        <td align="center" valign="middle"><div style="width:70px; word-wrap:break-word;"><?php echo ucfirst($arraycycle['dateoffollowup']); ?></div></td>
        <td align="center" valign="middle"><div style="width:90px; word-wrap:break-word;">
		<?php 
		  $relateddoc = $arraycycle['relateddocument'];
		  $relateddoc = explode(',', $relateddoc);
		  foreach ($relateddoc as $val){
		  if($val !='')
		  {
		  ?>
    <a href="download.php?download_file=attachforms/<?php echo $val; ?>"><?php echo $val; ?></a>
    <?php }
	
?>
    <br>
    <?php
		  } ?>
		
		</div></td>
       
      </tr>
      <div style="clear:both"></div>
      <?php
	 $i++;}?>
    </table>
<?php }
$sql = mysql_query("SELECT * FROM petitioncycle WHERE petition_id ='".$id."' AND forwarded!='0'  ORDER BY cycleid DESC");
$cycle = mysql_fetch_assoc($sql);
?>
    <div >
    <script>
$(document).ready(function() {
	
	$("#forwarded option[value='<?php echo $cycle['forwarded'];?>']").remove();

	$('#sendmessage').click(function(){
		$('#messageboxshow').show();
	});
	$('#type').change(function(e) {
        var type = $('#type').val();
		if( type == 'Forwarded')
		{
			$('#forwardeddiv').show();
		}
		else
		{
			$('#forwardeddiv').hide();
			$('#forwarded').val('');
		}
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
$('#followupsubmit').click(function(e) {
    var type = $('#type').val();
	var forwarded = $('#forwarded').val();
	if(type == '')
	{
		alert('Please select type');
		return false;
	}
	if(type == 'Forwarded')
	{
		if(forwarded == 0)
		{
			alert('please select forwarded to');
			return false;
		}
	}
});

});
</script>
        <?php if($forwardresult != '') 
{
?>
          <div  id="addfollowup" style="float:left; margin-left:100px; padding-top:20px; color:#F63; font-weight:bold;">
        Add Follow Up
        </div> <br />

        <div style="clear:both"></div>
        <div id="followup" >
      <form method="post" enctype="multipart/form-data">
      <input type="text" name="petitionfollowid"  hidden="hidden" value="<?php echo $id; ?>">
      <div class="form_details">
      <div class="text_form">Type</div>
      <div class="text_feiled_">
        <select class="dropdown" name="type" id="type">
          <option value="">--Select Type--</option>
            <option value="Enquiry">Enquiry</option>
             <option value="Forwarded">Forwarded</option>
        </select>
      </div>
    </div>
    
    <div class="form_details" style="display:none;" id="forwardeddiv">
      <div class="text_form">Forwarded</div>
      <div class="text_feiled_">
        <select class="dropdown" name="forwarded" id="forwarded">
          <option value="0">--Select Forwarded--</option>
          <?php 
		  $selectpetitionforwardmaster = $user->selectpetitionforwardmaster(); 
		  while($petitionforward = mysql_fetch_assoc($selectpetitionforwardmaster))
		  {
		  ?>
          <option value="<?php echo $petitionforward['petitionforwardid'];?>"><?php echo $petitionforward['petitionforwardname']; ?></option>
          <?php
		}?>
        </select>
      </div>
    </div>
    <div class="form_details">
      <div class="text_form">Remarks</div>
      <div class="text_feiled_">
        <textarea  name="remarks" type="text" cols="40" rows="4" id="remarks"></textarea>
      </div>
    </div>
    <div class="form_details">
      <div class="text_form">Attach forms</div>
      <div class="text_feiled_">
        <input style="padding-top:5px;" name="file[]" type="file" id="file"  multiple="true"/>
      </div>
    </div>
    
          <input type="text" name="petitionfollowid"  hidden="hidden" value="<?php echo $id; ?>">
      <div class="form_details">
          <div class="text_form">Update Status</div>
          <div class="text_feiled_">
            <select name="status" id="status"  class="dropdown">
              <option value="">--Select Status --</option>
              <option value="No Action Taken">No Action Taken</option>
              <option value="Action Under Progress"> Action Under Progress</option>
              <option value="Completed">Completed</option>
              <option value="Action not Required">Action not Required</option>
            </select>
          </div>
        </div>
<center>
    <input class="sub" name="followupsubmit" type="submit" value="Submit" id="followupsubmit" style="margin-top:40px;" />
    </center>
      </form>
        </div>
        
        
<?php } ?>
<div id="sendmessage" style="float:left; margin-left:20px; font-family:'Trebuchet MS'; font-size:13px; font-weight:bold; border-bottom:1px #00CC00 dotted;">Send Message <img src="images/add_message.png" align="absmiddle"/> </div>
       
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
