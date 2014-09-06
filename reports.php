<?php 
error_reporting(E_ALL ^E_NOTICE ^E_WARNING);
include('includes/session.php');
$user = new User();

$_SESSION['result1']='';
$_SESSION['result2']='';
// Checking for user logged in or not
if ($user->get_session())
{

}
include('includes/header.php');
include('includes/menu.php');
?>
<style>
.report_bg_color1{
/*background-color:#edfbe9;*/
border:#4b7e3d 1px dotted;
height:225px;
width:840px;
padding:20px 10px 10px 10px;
border-radius:5px;
margin:0 auto;
margin-top:20px;

}

.report_bg_color2{
/*background-color:#edfbe9;*/
border:#4b7e3d 1px dotted;
height:380px;
width:840px;
padding:20px 10px 10px 10px;
border-radius:5px;
margin:0 auto;
margin-top:25px;
margin-bottom:15px;
}


.left_report{
width:420px;
height:auto;
float:left;
margin:0px; padding:0px;

}

.right_report{
width:420px;
height:auto;

float:left;
margin:0px; padding:0px;

}

.lable_box{
width:420px;
height:30px;
margin-top:5px;
margin-left:20px;

}

.name_div{
font-family:"Trebuchet MS";
font-size:13px;
float:left;
width:150px;
padding-top:3px;
}
.my_filed{
float:left;
}
</style>
<script type="text/javascript">

 $(document).ready(function(e){

	/**
 * $('#submit').click(function(e){
 * 		var name	=	$('#name').val();
 * 		var gender = $("input[name='gender']:checked").length;
 * 		var religion = $('#religion').val();
 * 		var caste	=	$('#caste').val();   
 * 		var constituency = $('#constituency').val();
 * 		var mandal = $('#mandal').val();
 * 		var village = $('#village').val();     
 * 		var mobile	=	$('#mobile').val();
 * 		var email = $('#email').val();
 * 		var education = $('#education').val();
 * 		var generalcurrentpositionlevel = $('#generalcurrentpositionlevel').val();
 * 		var generalcurrentpositionname = $('#generalcurrentpositionname').val();
 * 		var partycurrentpositionlevel = $('#partycurrentpositionlevel').val();
 * 		var partycurrentpositionname = $('#partycurrentpositionname').val();
 * 		
 * 		if(var name	=	''|| gender = 0 || religion = '' || caste	=	'' || constituency = '' ||mandal = '' || village = '' || mobile	=	'' || email = '' || education = '' ||  generalcurrentpositionlevel = '' || generalcurrentpositionname = '' || partycurrentpositionlevel ='' || partycurrentpositionname = '')
 * 		{
 * 			alert('Please use atleast one keyword to search');
 * 			return false;
 * 		}
 * 	});
 */
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
	
	
 });
 </script>
<script>
$(function() {
$( "#from" ).datepicker({

changeMonth: true,
changeYear: true,
numberOfMonths: 1,
dateFormat: 'dd/mm/yy',
onClose: function( selectedDate ) {
$( "#to" ).datepicker( "option", "minDate", selectedDate );
}
});
$( "#to" ).datepicker({

changeMonth: true,
numberOfMonths: 1,
dateFormat: 'dd/mm/yy',
changeYear: true,
onClose: function( selectedDate ) {
$( "#from" ).datepicker( "option", "maxDate", selectedDate );
}
});
});
</script>
<div style="height:10px;"></div>
<div class="mastertitle">Search</div>
<div style="clear:both"></div>
<div style="height:30px; color:#FF0000; font-size:18px; font-weight:bold;">
  <center>
    <?php if(isset($msg)){echo $msg;}?>
  </center>
</div>
<div style="clear:both"></div>
<div style="max-height:auto; min-height:500px;">
  <form method="post" action="searchresult.php">
    <div class="report_bg_color2">
      <div class="left_report">
        <div class="lable_box">
          <div class="name_div">Name </div>
          <div class="my_filed">:
            <input name="name" id="name" type="text" style="width:175px;"  />
          </div>
        </div>
        <div class="lable_box">
          <div class="name_div">Email Id </div>
          <div class="my_filed">:
            <input name="email" id="email" type="text"  style="width:175px;" />
          </div>
        </div>
        <div class="lable_box">
          <div class="name_div">Age </div>
          <div class="my_filed">:
            <select name="agefrom" id="agefrom" style="width:75px;">
              <option value="">--From--</option>
              <?php
		  for($i =18;$i<=100; $i++)
		  {?>
              <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
              <?php
		  }
		  ?>
            </select>
            to
            <select name="ageto" id="ageto" style="width:75px;">
              <option value="">--To--</option>
              <?php
		  for($j =18;$j<=100; $j++)
		  {?>
              <option value="<?php echo $j; ?>"><?php echo $j; ?></option>
              <?php
		  }
		  ?>
            </select>
          </div>
        </div>
        <div class="lable_box">
          <div class="name_div">Register Date </div>
          <div class="my_filed">:
            <input type="text" id="from" name="registerdatefrom" style="width:75px;"/>
            to
            <input type="text" id="to" name="registerdateto" style="width:75px;"/>
          </div>
        </div>
        <div class="lable_box">
          <div class="name_div">Gender </div>
          <div class="my_filed">:
            <input name="gender" type="radio" value="male"  />
            Male
            <input name="gender" type="radio" value="female" />
            Female </div>
        </div>
        <div class="lable_box">
          <div class="name_div">Mobile Number </div>
          <div class="my_filed">:
            <input name="mobile" id="mobile" type="text"  style="width:175px;" maxlength="10" />
          </div>
        </div>
        <div class="lable_box">
          <div class="name_div">Caste Category </div>
          <div class="my_filed">:
            <select name="castecategory" id="castecategory" style="width:175px;">
              <option value="">--Select Caste Category--</option>
              <option value="SC">SC</option>
              <option value="ST">ST</option>
              <option value="BC-A">BC-A</option>
              <option value="BC-B">BC-B</option>
              <option value="BC-C">BC-C</option>
              <option value="BC-D">BC-D</option>
              <option value="OC">OC</option>
            </select>
          </div>
        </div>
        <div class="lable_box">
          <div class="name_div">Caste </div>
          <div class="my_filed">:
            <select name="caste" id="caste" style="width:175px;">
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
        <div class="lable_box">
          <div class="name_div">Religion </div>
          <div class="my_filed">:
            <select  name="religion" id="religion" style="width:175px;">
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
      </div>
      <div class="right_report">
        <div class="lable_box">
          <div class="name_div">Education</div>
          <div class="my_filed">:
            <select  name="education" id="education" style="width:175px;" >
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
        <div class="lable_box">
          <div class="name_div">Constituency </div>
          <div class="my_filed">:
            <select name="constituency" id="constituency"   style="width:175px;">
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
        <div class="lable_box">
          <div class="name_div">Mandal/Town </div>
          <div class="my_filed">:
            <select  name="mandal" id="mandal" style="width:175px;">
              <option value="">--Select Mandal/Town</option>
            </select>
          </div>
        </div>
        <div class="lable_box">
          <div class="name_div">Village/Ward </div>
          <div class="my_filed">:
            <select  name="village" id="village" style="width:175px;">
              <option value="">--Select Village/Ward</option>
            </select>
          </div>
        </div>
        <div class="lable_box">
          <div class="name_div">Genral Position Level</div>
          <div class="my_filed">:
            <select name="generalcurrentpositionlevel" id="generalcurrentpositionlevel" style="width:175px;">
              <option value="">--Select Position Level--</option>
              <option value="constituency">Constituency</option>
              <option value="mandal">Mandal</option>
              <option value="village">Village</option>
            </select>
          </div>
        </div>
        <div class="lable_box">
          <div class="name_div">Genral Position Name</div>
          <div class="my_filed">:
            <select name="generalcurrentpositionname" id="generalcurrentpositionname" style="width:175px;">
              <option value="">--Select Position Name--</option>
            </select>
          </div>
        </div>
        <div class="lable_box">
          <div class="name_div">Party Position Level</div>
          <div class="my_filed">:
            <select name="partycurrentpositionlevel" id="partycurrentpositionlevel"  style="width:175px;">
              <option value="">--Select Position Level--</option>
              <option value="constituency">Constituency</option>
              <option value="mandal">Mandal</option>
              <option value="village">Village</option>
            </select>
          </div>
        </div>
        <div class="lable_box">
          <div class="name_div">Party Position Name</div>
          <div class="my_filed">:
            <select name="partycurrentpositionname" id="partycurrentpositionname"  style="width:175px;">
              <option value="">--Select Position Name--</option>
            </select>
          </div>
        </div>
        <div class="lable_box">
          <div class="name_div">Photo</div>
          <div class="my_filed">:
            <input name="photo" type="radio" value="With Photo"  />
          <span style="font-family:'Trebuchet MS'; font-size:13px;">With Photo</span>
            <input name="photo" type="radio" value="With out Photo" />
          <span style="font-family:'Trebuchet MS'; font-size:13px;">  With out Photo</span> </div>
        </div>
      </div>
    </div>
    <div style="height:25px;"></div>
    
    <div>
      <center>
        <input class="sub" id="submit" name="submit" value="Search" type="submit" />
      </center>
    </div>

  </form>

</div>


</div>
</div>
<?php include('includes/footer.php'); ?>
