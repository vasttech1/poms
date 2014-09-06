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

  <form method="post" action="searchworkreport.php">
    
    <div class="report_bg_color2">
      <div class="left_report">
        <div class="lable_box">
          <div class="name_div">Work Name </div>
          <div class="my_filed">:
            <input name="workname" id="workname" type="text" style="width:175px;"  />
          </div>
        </div>
        <div class="lable_box">
          <div class="name_div">Type of Locality</div>
          <div class="my_filed">:
            <select  name="locality" id="locality" style="width:175px;"  >
              <option value="">--Select Locality--</option>
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
        <div class="lable_box">
          <div class="name_div">Type of Work </div>
          <div class="my_filed">:
            <select  name="typeofwork" id="typeofwork" style="width:175px;"  >
              <option value="">--Select Type of Work--</option>
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
        <div class="lable_box">
          <div class="name_div">Amount range from</div>
          <div class="my_filed">:
            <input type="text" id="from" name="amountfrom" style="width:75px;"/>
            to
            <input type="text" id="to" name="amountto" style="width:75px;"/>
          </div>
        </div>
        <div class="lable_box">
          <div class="name_div">Contractor </div>
          <div class="my_filed">:
            <select  name="contractor" id="contractor" style="width:175px;"  >
              <option value="">--Select Contractor--</option>
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
      </div>
      <div class="right_report">
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
          <div class="name_div">Scheme</div>
          <div class="my_filed">:
            <select name="scheme" id="scheme" style="width:175px;">
              <option value="">--Select Scheme--</option>
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
        <div class="lable_box">
          <div class="name_div">Status</div>
          <div class="my_filed">:
            <select name="status" id="status" style="width:175px;">
              <option value="">--Select Current status--</option>
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
