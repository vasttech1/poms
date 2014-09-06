<?php 
error_reporting(E_ALL ^E_NOTICE ^E_WARNING);
include('includes/session.php');
$user = new User();
// Checking for user logged in or not
if ($user->get_session())
{

}
$id = $_GET['id'];

$sql = "SELECT * FROM register WHERE registerid ='".$id."'";
$query = mysql_query($sql);
$array = mysql_fetch_assoc($query);

$sqlreligion = mysql_fetch_assoc(mysql_query("SELECT * FROM religionmaster WHERE religionid = '".$array['religion']."'"));
$sqlcaste = mysql_fetch_assoc(mysql_query("SELECT * FROM castemaster WHERE casteid = '".$array['caste']."'"));
$sqlmandal = mysql_fetch_assoc(mysql_query("SELECT * FROM mandalmaster WHERE mandalid = '".$array['mandal']."'"));
$sqlvillage = mysql_fetch_assoc(mysql_query("SELECT * FROM villagemaster WHERE villageid = '".$array['village']."'"));

if (isset($_POST['update']) )
{
		if($_FILES["image"]["name"] != '')
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
		}
		else
		{
			$userimage = $array['image'];
		}
		$register = $user->update($id,mysql_real_escape_string($_POST['name']),$_POST['gender'],mysql_real_escape_string($_POST['fhname']),$_POST['dob'],$_POST['age'],$_POST['education'],$_POST['religion'],$_POST['caste'],mysql_real_escape_string($_POST['hno']),mysql_real_escape_string($_POST['street']),$_POST['constituency'],$_POST['mandal'],$_POST['village'],mysql_real_escape_string($_POST['mobile']),mysql_real_escape_string($_POST['phone']),mysql_real_escape_string($_POST['email']),$_POST['generalcurrentpositionlevel'],$_POST['generalcurrentpositionname'],$_POST['partycurrentpositionlevel'],$_POST['partycurrentpositionname'],mysql_real_escape_string($_POST['pastpositions']),mysql_real_escape_string($_POST['otherdetails']),$userimage);
	
	if ($register)
	{
	// Success
		$msg = "Sucessfully Updated!";
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
        <input class="feoiled_box" name="name" type="text" id="name" value="<?php echo $array['name']; ?>" />
      </div>
    </div>
    <div class="form">
      <div class="text_form">Gender</div>
      <div class="text_feiled_" style="padding-top:5px;">
        <input name="gender" type="radio" value="male" <?php if($array['gender']=='male'){ ?> checked="checked"<?php }?> />
        Male
        <input name="gender" type="radio" value="female" <?php if($array['gender']=='female'){ ?> checked="checked"<?php }?>  />
        Female</div>
    </div>
    <div class="form">
      <div class="text_form">Father/Husband Name:</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="fhname" type="text" value="<?php echo $array['fhname']; ?>" />
      </div>
    </div>
    <div class="form">
      <div class="text_form">Date of Birth</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="dob" type="text" id="datepicker" readonly  value="<?php echo $array['dob']; ?>" />
      </div>
    </div>
    <div class="form">
      <div class="text_form">Age</div>
      <div class="text_feiled_">
        <select name="age" id="age" class="dropdown">
          <?php $age1 =  $array['birthyear'];
			$ageyear = date("Y");
	$age = $ageyear-$age1;
?>
          <option value="<?php echo $age; ?>"><?php echo $age; ?> </option>
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
          <option value="<?php  echo $array['education']; ?>">
          <?php  echo $array['education']; ?>
          </option>
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
          <option value="<?php echo $sqlreligion['religionid']; ?>"><?php echo $sqlreligion['religionname']; ?></option>
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
          <option value="<?php echo $sqlcaste['casteid']; ?>"><?php echo $sqlcaste['castename']; ?></option>
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
        <input class="feoiled_box" name="hno" type="text" id="hno" value="<?php echo $array['hno'];?>" />
      </div>
    </div>
    <div class="form">
      <div class="text_form">Street</div>
      <div class="text_feiled_" >
        <input class="feoiled_box" name="street" type="text" name="street"  value="<?php echo $array['street'];?>" />
      </div>
    </div>
    <div class="form">
      <div class="text_form">Constituency</div>
      <div class="text_feiled_">
        <select name="constituency" id="constituency"  class="dropdown" >
          <option value="<?php echo $array['constituency']; ?>"><?php echo $array['constituency']; ?></option>
          <option value="karimnagar">Karimnagar</option>
          <option value="manakondur">Manakondur</option>
          <option value="siricilla">Siricilla</option>
          <option value="husnabad">Husnabad</option>
          <option value="choppadandi">Choppadandi</option>
          <option value="huzurabad">Huzurabad</option>
          <option value="vemulawada">Vemulawada</option>
        </select>
      </div>
    </div>
    <div class="form">
      <div class="text_form">Mandal/Town</div>
      <div class="text_feiled_">
        <select class="dropdown" name="mandal" id="mandal">
          <option value="<?php echo $sqlmandal['mandalid']; ?>"><?php echo $sqlmandal['mandalname']; ?></option>
        </select>
      </div>
    </div>
    <div class="form">
      <div class="text_form">Village/Ward</div>
      <div class="text_feiled_">
        <select class="dropdown" name="village" id="village">
          <option value="<?php echo $sqlvillage['villageid']; ?>"><?php echo $sqlvillage['villagename']; ?></option>
        </select>
      </div>
    </div>
    <div class="form">
      <div class="text_form">Cell Number</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="mobile" type="text" id="mobile" maxlength="10" value="<?php echo $array['mobile']; ?>" />
      </div>
    </div>
    <div class="form">
      <div class="text_form">Phone Number</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="phone" type="text" id="phone" value="<?php echo $array['phone']; ?>"/>
      </div>
    </div>
    <div class="form">
      <div class="text_form">Email Id</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="email" type="text" id="email" value="<?php echo $array['email'];?>" />
      </div>
    </div>
    <div class="form">
      <div class="text_form">Current Genral Positions held</div>
      <div class="text_feiled">
        <select class="dropdown1" name="generalcurrentpositionlevel" id="generalcurrentpositionlevel">
          <option value="<?php echo $array['generalcurrentpositionlevel']; ?>"><?php echo $array['generalcurrentpositionlevel']; ?></option>
          <option value="constituency">Constituency</option>
          <option value="mandal">Mandal</option>
          <option value="village">Village</option>
        </select>
        <select class="dropdown1" name="generalcurrentpositionname" id="generalcurrentpositionname">
          <option value="<?php echo $array['generalcurrentpositionname']; ?>"><?php echo $array['generalcurrentpositionname']; ?></option>
        </select>
      </div>
    </div>
    <div class="form">
      <div class="text_form">Current&nbsp;Position&nbsp;held&nbsp;in&nbsp;Party</div>
      <div class="text_feiled">
        <select class="dropdown1" name="partycurrentpositionlevel" id="partycurrentpositionlevel">
          <option value="<?php echo $array['partycurrentpositionlevel']; ?>"><?php echo $array['partycurrentpositionlevel']; ?></option>
          <option value="constituency">Constituency</option>
          <option value="mandal">Mandal</option>
          <option value="village">Village</option>
        </select>
        <select class="dropdown1" name="partycurrentpositionname" id="partycurrentpositionname">
          <option value="<?php echo $array['partycurrentpositionname']; ?>"><?php echo $array['partycurrentpositionname']; ?></option>
        </select>
      </div>
    </div>
    <div class="form_add">
      <div class="text_form">Positions held in past</div>
      <div class="text_feiled_">
        <textarea  name="pastpositions" type="text" cols="40" rows="4" id="pastpositions"><?php echo $array['pastpositions'];?></textarea>
      </div>
    </div>
    <div class="form_add">
      <div class="text_form">Other Details</div>
      <div class="text_feiled_">
        <textarea  name="otherdetails" type="text" cols="40" rows="4" id="otherdetails"><?php echo $array['otherdetails'];?></textarea>
      </div>
    </div>
    <div class="form">
      <div class="text_form">Upload Photo</div>
      <div class="text_feiled_">
        <input style="padding-top:5px;" name="image" type="file" id="image"/>
      </div>
    </div>
    <div>
      <input class="sub" name="update" type="submit" value="Update" id="submit" style="margin-left:450px; margin-top:40px;" />
    </div>
    <br />
    <br />
  </form>
</div>
</div>
<?php include('includes/footer.php'); ?>
