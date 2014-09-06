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
		$letter = $user->letter($_POST['receivedfrom'],mysql_real_escape_string($_POST['sendername']),mysql_real_escape_string($_POST['senderaddress']),$_POST['receiveddate'],$_POST['receivedthrough'],mysql_real_escape_string($_POST['lrno']),$_POST['lrdate'],mysql_real_escape_string($_POST['description']),mysql_real_escape_string($_POST['enclosures']),mysql_real_escape_string($_POST['mpcomments']),$_POST['actiontaken'],$_POST['status']);
	
	if ($letter)
	{
	// Success
		$msg = "Sucessfully Added!";
	} else
	{
	//  Failed
	}
}


include('includes/header.php');
include('includes/menu.php');
?>
<script>
  $(function() {
    $( "#datepicker" ).datepicker({yearRange: '1900:-0',  dateFormat: 'dd/mm/yy', maxDate:-0,changeMonth: true,changeYear: true} );
  });
    $(function() {
    $( "#datepicker1" ).datepicker({yearRange: '1900:-0',  dateFormat: 'dd/mm/yy', maxDate:-0,changeMonth: true,changeYear: true} );
  });
  </script>
<script type="text/javascript">
 $(document).ready(function(e){
	$('#submit').click(function(e){
		var receivedfrom	=	$('#receivedfrom').val();
		var sendername		=	$('#sendername').val();
		var receiveddate	=	$('#receiveddate').val();   
		var receivedthrough = $('#receivedthrough').val();
		var lrno = $('#lrno').val();
		var lrdate = $('#lrdate').val();     
		var enclosures = $('#enclosures').val();
		var actiontaken = $('#actiontaken').val();
		var status = $('#status').val();
		
		if(receivedfrom == '')
		{
			alert('Please Select received from');
			return false;
		}
		if(sendername == '')
		{
			alert('Please enter sender name');
			return false;
		}
		if(receiveddate == '')
		{
			alert('Please Select received date');
			return false;
		}
		if(	receivedthrough == '')
		{
			alert('Please Select received through');
			return false;
		}
		if(lrno == '')
		{
			alert('Please enter lr no');
			return false;
		}
		if(lrdate == '')
		{
			alert('Please select lr date');
			return false;
		}
		if(enclosures == '')
		{
			alert('Please enter enclosures');
			return false;
		}
		if(actiontaken == '')
		{
			alert('Please enter action taken');
			return false;
		}
		if(status == '')
		{
			alert('Please Select status');
			return false;
		}
	});
 });
 </script>

<div style="clear:both"></div>
<div class="mastertitle">Letter</div>
<div style="clear:both"></div>
<div style="color:#006600; font-size:18px; font-weight:bold; height:30px;">
  <center>
    <?php echo $msg; ?>
  </center>
</div>
<div style="height:auto;">
<form method="post" enctype="multipart/form-data">
  <div class="form">
    <div class="text_form">Received From</div>
    <div class="text_feiled_">
      <select class="dropdown" name="receivedfrom" id="receivedfrom">
        <option value="">--Select--</option>
        <?php 
		  $selectrecievermaster = $user->selectrecievermaster(); 
		  while($reciever = mysql_fetch_assoc($selectrecievermaster))
		  {
		  ?>
        <option value="<?php echo $reciever['recievername'];?>"><?php echo $reciever['recievername']; ?></option>
        <?php
		  }
		  ?>
      </select>
    </div>
  </div>
  <div class="form">
    <div class="text_form">Sender Name:</div>
    <div class="text_feiled_">
      <input class="feoiled_box" name="sendername" type="text" id="sendername" />
    </div>
  </div>
  <div class="form_add">
    <div class="text_form">Sender address</div>
    <div class="text_feiled_">
      <textarea  name="senderaddress" type="text" cols="40" rows="4" id="senderaddress"></textarea>
    </div>
  </div>
  <div class="form">
    <div class="text_form">Received Date</div>
    <div class="text_feiled_">
      <input class="feoiled_box" name="receiveddate" type="text" id="datepicker" readonly="readonly" />
    </div>
  </div>
  <div class="form">
    <div class="text_form">Received through</div>
    <div class="text_feiled_">
      <select class="dropdown" name="receivedthrough" id="receivedthrough">
        <option value="">--Select --</option>
        <option value="Post">Post</option>
        <option value="Speed Post">Speed Post</option>
        <option value="Regd Post">Regd Post</option>
        <option value="Courier">Courier</option>
        <option value="Fax">Fax</option>
        <option value="Person">Person</option>
      </select>
    </div>
  </div>
  <div class="form">
    <div class="text_form">Lr. Number</div>
    <div class="text_feiled_">
      <input class="feoiled_box" name="lrno" type="text" id="lrno" />
    </div>
  </div>
  <div class="form">
    <div class="text_form">Lr. Date</div>
    <div class="text_feiled_">
      <input class="feoiled_box" name="lrdate" type="text" id="datepicker1"  />
    </div>
  </div>
  <div class="form_add">
    <div class="text_form">Description</div>
    <div class="text_feiled_">
      <textarea  name="description" type="text" cols="40" rows="4" id="description"></textarea>
    </div>
  </div>
  <div class="form">
    <div class="text_form">Enclosures</div>
    <div class="text_feiled_">
      <input class="feoiled_box" name="enclosures" type="text" id="enclosures"  />
    </div>
  </div>
  <div class="form_add">
    <div class="text_form">M.P Comments</div>
    <div class="text_feiled_">
      <textarea  name="mpcomments" type="text" cols="40" rows="4" id="mpcomments"></textarea>
    </div>
  </div>
  <div class="form">
    <div class="text_form">Action Taken</div>
    <div class="text_feiled_">
      <input class="feoiled_box" name="actiontaken" type="text" id="actiontaken" />
    </div>
  </div>
  <div class="form">
    <div class="text_form">Status</div>
    <div class="text_feiled">
      <select class="dropdown1" name="status" id="status">
        <option value="">--Select--</option>
        <option value="No Action Taken">No Action Taken</option>
        <option value="Action Under Progress"> Action Under Progress</option>
        <option value="Completed">Completed</option>
        <option value="Action not Required">Action not Required</option>
      </select>
    </div>
  </div>
  <div>
    <input class="sub" name="submit" type="submit" value="Submit" id="submit" style="margin-left:450px; margin-top:40px;" />
  </div>
  </div>
  <br />
  <br />
</form>
</div>
</div>
<?php include('includes/footer.php'); ?>
