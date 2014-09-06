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
 $('#submit').click(function(e){ 
		var from = $('#from').val();
		var to = $('#to').val();
		var status = $('#status').val();
		var receivedfrom = $('#receivedfrom').val();
		$.post("lettersearchreport.php", {'from' : from,'to' : to, 'status' : status ,'receivedfrom' : receivedfrom},function(data){
		$('#searchresult').html(data)
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
  <form method="post">
  <div class="report_bg_color2">
    <div class="lable_box">
      <div class="name_div">Date </div>
      <div class="my_filed">:
        <input type="text" id="from" name="from" style="width:75px;"/>
        to
        <input type="text" id="to" name="to" style="width:75px;"/>
      </div>
    </div>
<div class="lable_box">
      <div class="name_div">Received From </div>
      <div class="my_filed">:
        <select name="receivedfrom" id="receivedfrom" style="width:175px;">
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
    <div class="lable_box">
      <div class="name_div">Status</div>
      <div class="my_filed">:
        <select  name="status" id="status" style="width:175px;" >
          <option value="0">--Select--</option>
          <option value="No Action Taken">No Action Taken</option>
          <option value="Action Under Progress"> Action Under Progress</option>
          <option value="Completed">Completed</option>
          <option value="Action not Required">Action not Required</option>
        </select>
      </div>
    </div>
    </div>
    <div>
      <center>
        <input class="sub" id="submit" name="submit" value="Search" type="button" />
      </center>
    </div>
  </form>
  <div id="searchresult"></div>
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>
