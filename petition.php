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
$refnumber = rand(9999, 999999);
date_default_timezone_set('Asia/Kolkata');
 $currentyear	=	date("Y") ;	
$referencenumber = $currentyear.'/'.$refnumber;
$file = array();		
foreach($_FILES['file']['tmp_name'] as $key => $tmp_name )
		{
			$file_name = $_FILES['file']['name'][$key];
			$file_size =$_FILES['file']['size'][$key];
			$file_tmp =$_FILES['file']['tmp_name'][$key];
			$file_type=$_FILES['file']['type'][$key];	
		
				$image=$file_name;
			if($image!= '')
			{
				$userimage=time().''.$image;
				move_uploaded_file($file_tmp,"attachforms/".$userimage);
				$file[]=$userimage;
			}
		}
		$file =  implode(',',$file);

	
		$petition = $user->petition(mysql_real_escape_string($_POST['name']),$_POST['gender'],mysql_real_escape_string($_POST['fhname']),mysql_real_escape_string($_POST['hno']),mysql_real_escape_string($_POST['street']),$_POST['mandal'],$_POST['village'],mysql_real_escape_string($_POST['mobile']),$_POST['subjectrequest'],mysql_real_escape_string($_POST['content']),$file,$_POST['forwarded'],mysql_real_escape_string($_POST['remarks']),$referencenumber);
	
	if ($petition)
	{
	$id = mysql_insert_id();
	// Success
		$msg = "Petition Added Sucessfully! And Petition Reference number = $referencenumber";
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
    $( "#datepicker" ).datepicker({yearRange: '1900:-18',  dateFormat: 'dd/mm/yy', maxDate:-6570,changeMonth: true,changeYear: true} );
  });
  </script>
<script type="text/javascript">
 $(document).ready(function(e){

 	$('#mandal').change(function(e){
		var mandal = $('#mandal').val();
		$.post("ajax.php", {'mandal' : mandal},function(data){ 
		$('#village').html(data)
	});
	});

	$('#submit').click(function(e){
		var name	=	$('#name').val();
		var gender = $("input[name='gender']:checked").length;
		var mobile	=	$('#mobile').val();
		var subject=	$('#subjectrequest').val();
		var mobileexp = /^[7-9][0-9]{9}$/;
		if(name == '')
		{
			alert('Please enter name');
			return false;
		}
		if(gender == 0)
		{
			alert('Please Select gender');
			return false;
		}
		if(mobile != '')
		{
			if(mobile.search(mobileexp) == -1)
			{
				alert('Please enter valid mobile number');
				return false;
			}
		}
		if(subject == '')
		{
			alert('Please select subject');
			return false;
		}
	});
 });
 </script>

<div style="clear:both"></div>
<div class="mastertitle">Petition</div>
<div style="clear:both"></div>
<div style="color:#006600; font-size:18px; font-weight:bold; height:30px;">
  <center>
    <?php echo $msg; ?>
  </center>
</div>
<div style="height:auto;">
  <form method="post" enctype="multipart/form-data">
    <div class="form">
      <div class="text_form">Full Name</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="name" type="text" id="name" />
      </div>
    </div>
    <div class="form">
      <div class="text_form">Gender</div>
      <div class="text_feiled_" style="padding-top:5px;">
        <input name="gender" type="radio" value="male" i />
        Male
        <input name="gender" type="radio" value="female" />
        Female</div>
    </div>
    <div class="form">
      <div class="text_form">Father/Husband Name:</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="fhname" type="text" />
      </div>
    </div>
    <div class="form">
      <div class="text_form"><strong>Address</strong></div>
      <div class="text_feiled_"> </div>
    </div>
    <div class="form">
      <div class="text_form">H.No</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="hno" type="text" id="hno" />
      </div>
    </div>
    <div class="form">
      <div class="text_form">Street</div>
      <div class="text_feiled_" >
        <input class="feoiled_box" name="street" type="text" name="street" />
      </div>
    </div>
    <div class="form">
      <div class="text_form">Mandal/Town</div>
      <div class="text_feiled_">
        <select class="dropdown" name="mandal" id="mandal">
          <option value="">--Select Mandal/Town--</option>
          <?php 
		  $selectmandalmaster = $user->selectmandalmaster(); 
		  while($mandal = mysql_fetch_assoc($selectmandalmaster))
		  {
		 
		if($mandal['type'] == 'town')
			{
			$type = strtoupper($mandal['type'] );
			}
			else
			{
				$type = '';
			}
		  ?>
          <option value="<?php echo $mandal['mandalid'];?>"><?php echo $mandal['mandalname'].' '.$type; ?></option>
          <?php
		}?>
        </select>
      </div>
    </div>
    <div class="form">
      <div class="text_form">Village/Ward</div>
      <div class="text_feiled_">
        <select class="dropdown" name="village" id="village">
        </select>
      </div>
    </div>
    <div class="form">
      <div class="text_form">Cell Number</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="mobile" type="text" id="mobile" maxlength="10" />
      </div>
    </div>
    <div class="form">
      <div class="text_form">Subject Requested for</div>
      <div class="text_feiled_">
        <select class="dropdown" name="subjectrequest" id="subjectrequest">
          <option value="">--Select Subject Requested for--</option>
          <?php 
		  $selectpetitionmaster = $user->selectpetitionmaster(); 
		  while($petition = mysql_fetch_assoc($selectpetitionmaster))
		  {
		  ?>
          <option value="<?php echo $petition['petitionid'];?>"><?php echo $petition['petitionname']; ?></option>
          <?php
		}?>
        </select>
      </div>
    </div>
    <div class="form_add">
      <div class="text_form">Content</div>
      <div class="text_feiled_">
        <textarea  name="content" type="text" cols="40" rows="4" id="content"></textarea>
      </div>
    </div>
    <div class="form">
      <div class="text_form">Attach forms</div>
      <div class="text_feiled_">
        <input style="padding-top:5px;" name="file[]" type="file" id="file"  multiple="true"/>
      </div>
    </div>
    <div class="form">
      <div class="text_form">Forwarded</div>
      <div class="text_feiled_">
        <select class="dropdown" name="forwarded" id="forwarded">
          <option value="">--Select Forwarded--</option>
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
    <div class="form_add">
      <div class="text_form">Remarks</div>
      <div class="text_feiled_">
        <textarea  name="remarks" type="text" cols="40" rows="4" id="remarks"></textarea>
      </div>
    </div>
    <div>
      <input class="sub" name="submit" type="submit" value="Submit" id="submit" style="margin-left:450px; margin-top:40px;" />
    </div>
    <br />
    <br />
  </form>
</div>
</div>
<?php include('includes/footer.php'); ?>
