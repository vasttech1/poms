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
	
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $_FILES["image"]["name"]);
		$extension = end($temp);
		if ((($_FILES["image"]["type"] == "image/gif")
		|| ($_FILES["image"]["type"] == "image/jpeg")
		|| ($_FILES["image"]["type"] == "image/jpg")
		|| ($_FILES["image"]["type"] == "image/pjpeg")
		|| ($_FILES["image"]["type"] == "image/x-png")
		|| ($_FILES["image"]["type"] == "image/png"))
		&& in_array($extension, $allowedExts))
	  {
				$image=$_FILES["image"]['name'];
				$userimage=time().''.$image;
				move_uploaded_file($_FILES["image"]["tmp_name"],"uploads/".$userimage);
		}
	
	
		$register = $user->register(mysql_real_escape_string($_POST['name']),$_POST['gender'],mysql_real_escape_string($_POST['fhname']),$_POST['dob'],$_POST['age'],$_POST['education'],$_POST['religion'],$_POST['caste'],mysql_real_escape_string($_POST['hno']),mysql_real_escape_string($_POST['street']),$_POST['constituency'],$_POST['mandal'],$_POST['village'],mysql_real_escape_string($_POST['mobile']),mysql_real_escape_string($_POST['phone']),mysql_real_escape_string($_POST['email']),$_POST['generalcurrentpositionlevel'],$_POST['generalcurrentpositionname'],$_POST['partycurrentpositionlevel'],$_POST['partycurrentpositionname'],mysql_real_escape_string($_POST['pastpositions']),mysql_real_escape_string($_POST['otherdetails']),$userimage);
	
	if ($register)
	{
	// Success
		$msg = "Sucessfully Registered!";
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
 
 
 	$('#constituency').change(function(e){
		var constituency = $('#constituency').val();
		$.post("constituencyajax.php", {'constituency' : constituency},function(data){ 
		$('#mandal').html(data)
	});
	});
	
	
 	$('#mandal').change(function(e){
		var mandal = $('#mandal').val();
		$.post("ajax.php", {'mandal' : mandal},function(data){ 
		$('#village').html(data)
	});
	});
	
		$('#generalcurrentpositionlevel').change(function(e){
		var generalcurrentpositionlevel = $('#generalcurrentpositionlevel').val();
		$.post("generalpositionajax.php", {'generalcurrentpositionlevel' : generalcurrentpositionlevel},function(data){ 
		$('#generalcurrentpositionname').html(data)
	});
	});
	
		$('#partycurrentpositionlevel').change(function(e){
		var partycurrentpositionlevel = $('#partycurrentpositionlevel').val();
		$.post("partypositionajax.php", {'partycurrentpositionlevel' : partycurrentpositionlevel},function(data){ 
		$('#partycurrentpositionname').html(data)
	});
	});
	$('#submit').click(function(e){
		var name	=	$('#name').val();
		var gender = $("input[name='gender']:checked").length;
	/*	var dob		=	$('#datepicker').val();
		var age		=	$('#age').val();
		var religion = $('#religion').val();
		var caste	=	$('#caste').val();   
		var constituency = $('#constituency').val();
		var mandal = $('#mandal').val();
		var village = $('#village').val();     
		var mobile	=	$('#mobile').val();
		var email = $('#email').val();
		var generalcurrentpositionlevel = $('#generalcurrentpositionlevel').val();
		var generalcurrentpositionname = $('#generalcurrentpositionname').val();
		var partycurrentpositionlevel = $('#partycurrentpositionlevel').val();
		var partycurrentpositionname = $('#partycurrentpositionname').val();*/

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
	/*	if(dob == '' && age == '')
		{
			alert('Please Select date of birth / Enter age');
			return false;
		}
		if(	religion == '')
		{
			alert('Please Select religion');
			return false;
		}
		if(	caste == '')
		{
			alert('Please Select caste');
			return false;
		}
		if(	constituency == '')
		{
			alert('Please Select constituency');
			return false;
		}
		if(	mandal == '')
		{
			alert('Please Select mandal');
			return false;
		}
		if(	village == '')
		{
			alert('Please Select village');
			return false;
		}
		var mobileexp = /^\d{10}$/;
		if(mobile == '')
		{
			alert('Please enter mobile number');
			return false;
		}
		if(mobile.search(mobileexp) == -1)
		{
			alert('Please enter valid mobile number');
			return false;
		}
		var emailexp = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
		if(email == '')
		{
			alert('Please enter email');
			return false;
		}
		if(email.search(emailexp) == -1)
		{
			alert('Please enter valid email');
			return false;
		}
		if(generalcurrentpositionlevel == '')
		{
			alert('Please Select general current position level');
			return false;
		}
		if(generalcurrentpositionname == '')
		{
			alert('Please Select general current position name');
			return false;
		}
		if(partycurrentpositionlevel == '')
		{
			alert('Please Select party current position level');
			return false;
		}
		if(partycurrentpositionname == '')
		{
			alert('Please Select party current position name');
			return false;
		}*/
	});
 });
 </script>

<div style="clear:both"></div>
<div class="mastertitle">Registration</div>
<div style="clear:both"></div>
<div style="color:#006600; font-size:18px; font-weight:bold; height:30px;">
  <center>
    <?php echo $msg; ?>
  </center>
</div>
<div style="height:auto;">
  <form method="post" enctype="multipart/form-data">
    <div class="form">
      <div class="text_form">Full Name of Person</div>
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
      <div class="text_form">Date of Birth</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="dob" type="text" id="datepicker" readonly="readonly" />
      </div>
    </div>
    <div class="form">
      <div class="text_form">Age</div>
      <div class="text_feiled_">
        <select name="age" id="age" class="dropdown">
          <option value="">--Select Age--</option>
          <?php 
for($i =18; $i<=100;$i++)
{?>
          <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
          <?php
}
?>
        </select>
      </div>
    </div>
    <div class="form">
      <div class="text_form">Education Qualification</div>
      <div class="text_feiled_">
        <select class="dropdown" name="education" id="education">
          <option value="">--Select Qualification--</option>
          <option value="Below SSC">Below S.S.C</option>
          <option value="SSC">S.S.C</option>
          <option value="Intermediate">Intermediate</option>
          <option value="Graduate">Graduate</option>
          <option value="Post Graduate">Post Graduate</option>
          <option value="P.hd">P.hd</option>
        </select>
      </div>
    </div>
    <div class="form">
      <div class="text_form">Religion</div>
      <div class="text_feiled_">
        <select class="dropdown" name="religion" id="religion">
          <option value="">--Select Religion--</option>
          <?php 
		  $selectreligionmaster = $user->selectreligionmaster(); 
		  while($religion = mysql_fetch_assoc($selectreligionmaster))
		  {
		  ?>
          <option value="<?php echo $religion['religionid'];?>"><?php echo $religion['religionname']; ?></option>
          <?php
		  }
		  ?>
        </select>
      </div>
    </div>
    <div class="form">
      <div class="text_form">Caste</div>
      <div class="text_feiled_">
        <select class="dropdown" name="caste" id="caste">
          <option value="">--Select Caste--</option>
          <?php 
		  $selectcastemaster = $user->selectcastemaster(); 
		  while($caste = mysql_fetch_assoc($selectcastemaster))
		  {
		  ?>
          <option value="<?php echo $caste['casteid'];?>"><?php echo $caste['castename']; ?></option>
          <?php
		  }
		  ?>
        </select>
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
      <div class="text_form">Constituency</div>
      <div class="text_feiled_">
        <select name="constituency" id="constituency"  class="dropdown" >
          <option value="">--Select constituency--</option>
          <?php
          $queryconstituency=mysql_query("select *from constituencymaster order by constituencyname asc");
          
          while($rowconstituency=mysql_fetch_assoc($queryconstituency))
          {
            echo "<option value='".$rowconstituency['constituencyname']."'>".$rowconstituency['constituencyname']."</option>";
            
          }
          
          ?>
        </select>
      </div>
    </div>
    <div class="form">
      <div class="text_form">Mandal/Town</div>
      <div class="text_feiled_">
        <select class="dropdown" name="mandal" id="mandal">
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
      <div class="text_form">Phone Number</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="phone" type="text" id="phone" />
      </div>
    </div>
    <div class="form">
      <div class="text_form">Email Id</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="email" type="text" id="email" />
      </div>
    </div>
    <div class="form">
      <div class="text_form">Current Genral Positions held</div>
      <div class="text_feiled">
        <select class="dropdown1" name="generalcurrentpositionlevel" id="generalcurrentpositionlevel">
          <option value="">--Select Position Level--</option>
          <option value="constituency">Constituency</option>
          <option value="mandal">Mandal</option>
          <option value="village">Village</option>
        </select>
        <select class="dropdown1" name="generalcurrentpositionname" id="generalcurrentpositionname">
          <option value="">--Select Position Name--</option>
        </select>
      </div>
    </div>
    <div class="form">
      <div class="text_form">Current&nbsp;Position&nbsp;held&nbsp;in&nbsp;Party</div>
      <div class="text_feiled">
        <select class="dropdown1" name="partycurrentpositionlevel" id="partycurrentpositionlevel">
          <option value="">--Select Position Level--</option>
          <option value="constituency">Constituency</option>
          <option value="mandal">Mandal</option>
          <option value="village">Village</option>
        </select>
        <select class="dropdown1" name="partycurrentpositionname" id="partycurrentpositionname">
          <option value="">--Select Position Name--</option>
        </select>
      </div>
    </div>
    <div class="form_add">
      <div class="text_form">Positions held in past</div>
      <div class="text_feiled_">
        <textarea  name="pastpositions" type="text" cols="40" rows="4" id="pastpositions"></textarea>
      </div>
    </div>
    <div class="form_add">
      <div class="text_form">Other Details</div>
      <div class="text_feiled_">
        <textarea  name="otherdetails" type="text" cols="40" rows="4" id="otherdetails"></textarea>
      </div>
    </div>
    <div class="form">
      <div class="text_form">Upload Photo</div>
      <div class="text_feiled_">
        <input style="padding-top:5px;" name="image" type="file" id="image"/>
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
