<?php 
error_reporting(E_ALL ^E_NOTICE ^E_WARNING);
include('includes/session.php');
$user = new User();
// Checking for user logged in or not
if ($user->get_session())
{

}
$id = $_GET['id'];

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

if (isset($_POST['submit']) )
{
		//uploadcopyoftheletter 
			$uploadcopyoftheletter = array();	
			foreach($_FILES['uploadcopyoftheletter']['tmp_name'] as $key => $tmp_name )
			{
				$file_name = $_FILES['uploadcopyoftheletter']['name'][$key];
				$file_size =$_FILES['uploadcopyoftheletter']['size'][$key];
				$file_tmp =$_FILES['uploadcopyoftheletter']['tmp_name'][$key];
				$file_type=$_FILES['uploadcopyoftheletter']['type'][$key];	
			
					$image=$file_name;
					if($image != '')
					{ 
						$userimage=time().''.$image;
						move_uploaded_file($file_tmp,"uploadcopyoftheletter/".$userimage);
						$uploadcopyoftheletter[]=$userimage;
					}
			else
				{ 
						$uploadcopyoftheletter[] = $result['uploadcopyoftheletter'];
				}
			}
			$uploadcopyoftheletter =  implode(',',$uploadcopyoftheletter);
	

		//sitephotosbeforeworkstarted 
			$sitephotosbeforeworkstarted = array();		
			foreach($_FILES['sitephotosbeforeworkstarted']['tmp_name'] as $key => $tmp_name )
			{
				$file_name1 = $_FILES['sitephotosbeforeworkstarted']['name'][$key];
				$file_size1 =$_FILES['sitephotosbeforeworkstarted']['size'][$key];
				$file_tmp1 =$_FILES['sitephotosbeforeworkstarted']['tmp_name'][$key];
				$file_type1=$_FILES['sitephotosbeforeworkstarted']['type'][$key];	
				$image1=$file_name1;
				
			if($image1!='')
			{ 				
				$userimage1=time().''.$image1;
				move_uploaded_file($file_tmp1,"sitephotosbeforeworkstarted/".$userimage1);
				$sitephotosbeforeworkstarted[]=$userimage1;
			}
			else
				{ 
						$sitephotosbeforeworkstarted[] = $result['sitephotosbeforeworkstarted'];
				}
		}
		$sitephotosbeforeworkstarted =  implode(',',$sitephotosbeforeworkstarted);
	

		
		//photosoncompletion
		$photosoncompletion = array();	
		foreach($_FILES['photosoncompletion']['tmp_name'] as $key => $tmp_name )
		{
			$file_name2 =$_FILES['photosoncompletion']['name'][$key];
			$file_size2 =$_FILES['photosoncompletion']['size'][$key];
			$file_tmp2 =$_FILES['photosoncompletion']['tmp_name'][$key];
			$file_type2=$_FILES['photosoncompletion']['type'][$key];	
		
				$image2=$file_name2;
			if($image2 != '')
			{ 		
				$userimage2=time().''.$image2;
				move_uploaded_file($file_tmp2,"photosoncompletion/".$userimage2);
				$photosoncompletion[]=$userimage2;
			}
			else
			{ 
					$photosoncompletion[] = $result['photosoncompletion'];
			}
		}
		$photosoncompletion =  implode(',',$photosoncompletion);


		$workmanagementupdate = $user->workmanagementupdate($id,$_POST['scheme'],$_POST['constituency'],$_POST['mandal'],$_POST['village'],mysql_real_escape_string($_POST['nameofthework']),$_POST['locality'],mysql_real_escape_string($_POST['typeofwork']),mysql_real_escape_string($_POST['estimatecost']),mysql_real_escape_string($_POST['adminsancationdate']),mysql_real_escape_string($_POST['adminsanctionno']),$uploadcopyoftheletter,mysql_real_escape_string($_POST['contractor']),mysql_real_escape_string($_POST['dateoffoundationstonelayed']),$sitephotosbeforeworkstarted,$_POST['currentstatus'],mysql_real_escape_string($_POST['dateofcompletion']),$photosoncompletion,mysql_real_escape_string($_POST['remarks']));
	
	if ($workmanagementupdate)
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
    $( "#datepicker" ).datepicker({yearRange: '1950:-0',  dateFormat: 'dd/mm/yy', maxDate:0,changeMonth: true,changeYear: true} );
  });
  $(function() {
    $( "#datepicker1" ).datepicker({yearRange: '1950:-0',  dateFormat: 'dd/mm/yy', maxDate:0,changeMonth: true,changeYear: true} );
  });
  $(function() {
    $( "#datepicker2" ).datepicker({yearRange: '1950:-0',  dateFormat: 'dd/mm/yy', maxDate:0,changeMonth: true,changeYear: true} );
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

	$('#submit').click(function(e){});
 });
 </script>

<div style="clear:both"></div>
<div class="mastertitle">Edit Work Management</div>
<div style="clear:both"></div>
<div style="color:#006600; font-size:18px; font-weight:bold; height:30px;">
  <center>
    <?php echo $msg; ?>
  </center>
</div>
<div style="height:auto;">
  <form method="post" enctype="multipart/form-data">
    <div class="form">
      <div class="text_form">Scheme</div>
      <div class="text_feiled_">
        <select class="dropdown" name="scheme" id="scheme">
          <option value="<?php echo $schemearray['schemeid'] ;?>"><?php echo $schemearray['schemename'] ;?></option>
          <?php $selectschememaster = $user->selectschememaster();
   while($scheme = mysql_fetch_assoc($selectschememaster))
		  {
		  ?>
          <option value="<?php echo $scheme['schemeid'];?>"><?php echo $scheme['schemename']; ?></option>
          <?php
		  }
  ?>
        </select>
      </div>
    </div>
    <div class="form">
      <div class="text_form">Assembly Constituency</div>
      <div class="text_feiled_">
        <select name="constituency" id="constituency"  class="dropdown" >
          <option value="<?php echo $result['constituency']; ?>"><?php echo $result['constituency']; ?></option>
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
          <option value="<?php echo $mandalarray['mandalid']; ?>"><?php echo $mandalarray['mandalname']; ?></option>
        </select>
      </div>
    </div>
    <div class="form">
      <div class="text_form">Village/Ward</div>
      <div class="text_feiled_">
        <select class="dropdown" name="village" id="village">
          <option value="<?php echo $villagearray['villageid']; ?>"><?php echo $villagearray['villagename']; ?></option>
        </select>
      </div>
    </div>
    <div class="form">
      <div class="text_form">Name of the work</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="nameofthework" type="text" id="nameofthework" value="<?php echo $result['nameofthework'];?>" />
      </div>
    </div>
    <div class="form">
      <div class="text_form">Type of locality</div>
      <div class="text_feiled_">
        <select class="dropdown" name="locality" id="locality">
          <option value="<?php echo $localityarray['localityid']; ?>"><?php echo $localityarray['localityname']; ?></option>
          <?php $selectlocalitymaster = $user->selectlocalitymaster();
   while($locality = mysql_fetch_assoc($selectlocalitymaster))
		  {
		  ?>
          <option value="<?php echo $locality['localityid'];?>"><?php echo $locality['localityname']; ?></option>
          <?php
		  }
  ?>
        </select>
      </div>
    </div>
    <div class="form">
      <div class="text_form">Type of Work</div>
      <div class="text_feiled_">
        <select class="dropdown" name="typeofwork" id="typeofwork">
          <option value="<?php echo $worktypearray['worktypeid']; ?>"><?php echo $worktypearray['worktypename']; ?></option>
          <?php $selectworktypemaster = $user->selectworktypemaster();
   while($worktype = mysql_fetch_assoc($selectworktypemaster))
		  {
		  ?>
          <option value="<?php echo $worktype['worktypeid'];?>"><?php echo $worktype['worktypename']; ?></option>
          <?php
		  }
  ?>
        </select>
      </div>
    </div>
    <div class="form">
      <div class="text_form">Estimate Cost</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="estimatecost" type="text" id="estimatecost" value="<?php echo $result['estimatecost']; ?>" />
      </div>
    </div>
    <div class="form">
      <div class="text_form">Admin Sanction Date</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="adminsancationdate" type="text" id="datepicker" readonly value="<?php echo $result['adminsancationdate']; ?>" />
      </div>
    </div>
    <div class="form">
      <div class="text_form">Admin Sanction No</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="adminsanctionno" type="text" id="adminsanctionno" value="<?php echo $result['adminsanctionno']; ?>"/>
      </div>
    </div>
    <div class="form">
      <div class="text_form">Upload Copy of the Letter</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="uploadcopyoftheletter[]" multiple="true" type="file" id="uploadcopyoftheletter" />
      </div>
    </div>
    <div class="form">
      <div class="text_form">Contractor</div>
      <div class="text_feiled">
        <select class="dropdown" name="contractor" id="contractor">
          <option value="<?php echo $contractorarray['contractorid']; ?>"><?php echo $contractorarray['name']; ?></option>
          <?php $selectcontractormaster = $user->selectcontractormaster();
   while($contractor = mysql_fetch_assoc($selectcontractormaster))
		  {
		  ?>
          <option value="<?php echo $contractor['contractorid'];?>"><?php echo $contractor['name']; ?></option>
          <?php
		  }
  ?>
        </select>
      </div>
    </div>
    <div class="form">
      <div class="text_form">Date of Foundation Stone Layed</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="dateoffoundationstonelayed" type="text" id="datepicker1" readonly   value="<?php echo $result['dateoffoundationstonelayed']; ?>"/>
      </div>
    </div>
    <div class="form">
      <div class="text_form">Site photos before work started</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="sitephotosbeforeworkstarted[]" multiple="true" type="file" id="sitephotosbeforeworkstarted"  />
      </div>
    </div>
    <div class="form">
      <div class="text_form">Current status</div>
      <div class="text_feiled">
        <select class="dropdown" name="currentstatus" id="currentstatus">
          <option value="<?php echo $statusarray['statusid']; ?>"><?php echo $statusarray['statusname']; ?></option>
          <?php $selectstatusmaster = $user->selectstatusmaster();
   while($status = mysql_fetch_assoc($selectstatusmaster))
		  {
		  ?>
          <option value="<?php echo $status['statusid'];?>"><?php echo $status['statusname']; ?></option>
          <?php
		  }
  ?>
        </select>
      </div>
    </div>
    <div class="form">
      <div class="text_form">Date of completion</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="dateofcompletion" type="text" id="datepicker2" readonly   value="<?php echo $result['dateofcompletion']; ?>" />
      </div>
    </div>
    <div class="form">
      <div class="text_form">Photos on Completion</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="photosoncompletion[]" multiple="true" type="file" id="photosoncompletion" />
      </div>
    </div>
    <div class="form_add">
      <div class="text_form">Remarks</div>
      <div class="text_feiled_">
        <textarea  name="remarks" type="text" cols="40" rows="4" id="remarks"><?php echo $result['remarks']; ?></textarea>
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
