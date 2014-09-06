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
height:190px;
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

<div class="mastertitle">Petition Search</div>
<div style="clear:both"></div>
<div style="height:30px; color:#FF0000; font-size:18px; font-weight:bold;">
  <center>
    <?php if(isset($msg)){echo $msg;}?>
  </center>
</div>
<div style="clear:both"></div>
<div style="max-height:auto; min-height:500px;">
  <form method="post" action="searchpetitionresult.php">
    <div class="report_bg_color1">
      <div class="left_report">
        <div class="lable_box">
          <div class="name_div">Name </div>
          <div class="my_filed">:
            <input name="name" id="name" type="text" style="width:175px;"  />
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
      </div>
      <div class="right_report">
        <div class="lable_box">
          <div class="name_div">Subject</div>
          <div class="my_filed">:
            <select name="subjectrequest" id="subjectrequest"  style="width:175px;">
              <option value="">--Select Subject --</option>
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
        <div class="lable_box">
          <div class="name_div">Status</div>
          <div class="my_filed">:
            <select name="status" id="status"  style="width:175px;">
              <option value="">--Select Status --</option>
              <option value="Action Pending">Action Pending</option>
              <option value="Action Under Progress"> Action Under Progress</option>
              <option value="Completed">Completed</option>
              <option value="Action not Required">Action not Required</option>
            </select>
          </div>
        </div>

<div class="lable_box">
          <div class="name_div">Reference number </div>
          <div class="my_filed">:
            <input type="text" id="referencenumber" name="referencenumber" style="width:175px;"/>
          </div>
        </div>

<div class="lable_box">
          <div class="name_div">Currently held with</div>
          <div class="my_filed">:
<select   name="forwarded" id="forwarded" style="width:175px;">
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

        <div class="lable_box">
          <div class="name_div">Register Date </div>
          <div class="my_filed">:
            <input type="text" id="from" name="registerdatefrom" style="width:75px;"/>
            to
            <input type="text" id="to" name="registerdateto" style="width:75px;"/>
          </div>
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
