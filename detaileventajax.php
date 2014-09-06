<?php 
ob_start();
include('includes/session.php');


$id= $_POST['detailsid'];
$sql = mysql_query("SELECT * FROM events WHERE id=".$id."");
$result = mysql_fetch_assoc($sql);
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
<div style="color:#FF0000; font-weight:bold; font-size:16px" ></div>
<div style="clear:both;"> </div>
<div> <a href="editeventdetails.php?id=<?php echo $id;?>">Update Details</a></div>
<?php } ?>
    <div style="height:auto; float:left;">
      <div class="left">
        <div class="formdetails">
          <div class="text_form"><strong>Name</strong></div>
          <div class="text_ans">:<?php echo ucfirst($result['event_name']); ?></div>
        </div>
        <div class="formdetails">
          <div class="text_form"><strong>Mandal</strong></div>
          <div class="text_ans">:<?php echo ucfirst($result['mandal']); ?></div>
        </div>
        
       
        <div class="formdetails">
          <div class="text_form"><strong>Contact 1</strong></div>
          <div class="text_ans">:<?php echo ucfirst($result['phone']); ?></div>
        </div>
        <div class="formdetails">
          <div class="text_form"><strong>Date</strong></div>
          <div class="text_ans">:<?php echo ucfirst($result['date']); ?></div>
        </div>
       
      
      </div>
      <div class="right">
      <div class="formdetails">
          <div class="text_form"><strong>Event Type</strong></div>
          <div class="text_ans">:<?php echo ucfirst($result['event_type']); ?></div>
        </div>
      <div class="formdetails">
          <div class="text_form"><strong>Village</strong></div>
          <div class="text_ans">:<?php echo ucfirst($result['village']); ?></div>
        </div>
        <div class="formdetails">
          <div class="text_form"><strong>Conatct 2</strong></div>
          <div class="text_ans">:<?php echo ucfirst($result['phone2']); ?></div>
        </div>
        <div class="formdetails">
          <div class="text_form"><strong>Time</strong></div>
          <div class="text_ans">:<?php echo ucfirst($result['time']); ?></div>
        </div>
      </div>
    </div>
  </div>
  <div style="clear:both"></div>

    <div >
    <script>
$(document).ready(function() {
	
	$("#forwarded option[value='<?php echo $result['forwarded'];?>']").remove();

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
     <?php
     if($result['sms_content'] == '')
     {
     ?>   
<div id="sendmessage" style="float:left; margin-left:20px; font-family:'Trebuchet MS'; font-size:13px; font-weight:bold; border-bottom:1px #00CC00 dotted;">Send Message <img src="images/add_message.png" align="absmiddle"/> </div>
       
      <div style="display:none;" id="messageboxshow">
         <form method="post">   Message
         <input type="text" name="mobileno" value="<?php echo $result['phone']; ?>" hidden="hidden" />
 <textarea name="textmessage" id="message1" cols="40" rows="4"  maxlength="160"></textarea>
 <input type="submit" name="send" value="Send Message" id="submit" />
 </form>
  </div>     
    </div>
    <?php
    }
    ?>
    
  </div>
</div>
