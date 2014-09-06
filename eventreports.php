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
<script>
  $(function() {
    
    $( "#fromDate" ).datepicker({ minDate: 0, maxDate: "+1M +10D",dateFormat: 'yy-mm-dd'});
    $( "#toDate" ).datepicker({ minDate: 0, maxDate: "+1M +10D",dateFormat: 'yy-mm-dd'});
  });
  </script>
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
  <form method="post" action="searcheventreport.php">
    <div class="report_bg_color1">
      <div class="left_report">
        <div class="lable_box">
          <div class="name_div">Event Name </div>
          <div class="my_filed">:
            <input name="workname" id="workname" type="text" style="width:175px;"  />
          </div>
        </div>
        
        <div class="lable_box">
          <div class="name_div">From Date </div>
          <div class="my_filed">:
            <input name="fromDate" id="fromDate" type="text" style="width:175px;"  />
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
        
        
        
      
      </div>
      <div class="right_report">
        <div class="lable_box">
          <div class="name_div">Type of Event</div>
          <div class="my_filed">:
            <select  name="event_type" id="event_type" style="width:175px;"  >
              <option value="">--Select Event Type--</option>
              <?php $selecteventmaster = $user->selecteventmaster();
   while($event = mysql_fetch_assoc($selecteventmaster))
		  {
		  ?>
              <option value="<?php echo $event['event_type'];?>"><?php echo $event['event_type']; ?></option>
              <?php
		  }
  ?>
            </select>
          </div>
        </div>
        
        
        
         <div class="lable_box">
          <div class="name_div">To Date </div>
          <div class="my_filed">:
            <input name="toDate" id="toDate" type="text" style="width:175px;"  />
          </div>
        </div>
        

   
    
   
    
    </div>
    
       </div>
      
                         <div align="center" style="padding:0px;" >
     
        <input class="sub" id="submit" name="submit" value="Search" type="submit" />
     
    </div>
  </form>
</div>
</div>
</div>
<?php include('includes/footer.php'); ?>
