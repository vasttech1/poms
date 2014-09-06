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
        
$time= "".$_POST['hours'].":".$_POST['min']."";
$event = $user->event(mysql_real_escape_string($_POST['event_type']),mysql_real_escape_string($_POST['name']),mysql_real_escape_string($_POST['description']),$_POST['datepicker'],$time, mysql_real_escape_string($_POST['mandal']),mysql_real_escape_string($_POST['village']),$_POST['mobile'], $_POST['mobile2'], $_POST['content'], $_POST['status'], $_POST['constituency']);
	//print_r($event);
	if ($event)
	{
		$msg = "Event Added Sucessfully...!";
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
    $( "#datepicker" ).datepicker({ minDate: 0, maxDate: "+1M +10D",dateFormat: 'yy-mm-dd'});
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
		var event_type	=	$('#event_type').val();
		var name	=	$('#name').val();
        var description	=	$('#description').val();
        var datepicker	=	$('#datepicker').val();
        var hours	=	$('#hours').val();
        var min	=	$('#min').val();
        var type	=	$('#type').val();
        var mandal	=	$('#mandal').val();
        var village	=	$('#village').val();
        var mobile	=	$('#mobile').val();
		var mobileexp = /^[7-9][0-9]{9}$/;
		var status = $("input[name='status']:checked").length;
		if(event_type == '')
		{
			alert('Please Select the Event Type');
			return false;
		}
        if(name == '')
		{
			alert('Please enter name');
			return false;
		}
        if(description == '')
		{
			alert('Please enter description of the Event');
			return false;
		}
        if(datepicker == '')
		{
			alert('Please Select the Date');
			return false;
		}
        if(hours == '')
		{
			alert('Please Select time Correctly');
			return false;
		}
	   if(min == '')
		{
			alert('Please Select time Correctly');
			return false;
		}
	   if(type == '')
		{
			alert('Please Select time Correctly');
			return false;
		}
	   if(mandal == '')
		{
			alert('Please Select mandal');
			return false;
		}
        if(village == '')
		{
			alert('Please Select village');
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
		
		if(status == 0)
		{
			alert('Please Select gender');
			return false;
		}
	});
 });
 </script>

<div style="clear:both"></div>
<div class="mastertitle">Event Manager</div>
<div style="clear:both"></div>
<div style="color:#006600; font-size:18px; font-weight:bold; height:30px;">
  <center>
    <?php echo $msg; ?>
  </center>
</div>
<div style="height:auto;">
  <form method="post" enctype="multipart/form-data">
    
    <div class="form">
      <div class="text_form">Event Type</div>
     <div class="text_feiled_">
        <select class="dropdown" name="event_type" id="event_type">
          <option value="">--Select Event type--</option>
          <?php 
		  $selecteventmaster = $user->selecteventmaster(); 
		  while($event = mysql_fetch_assoc($selecteventmaster))
		  {
		  ?>
          <option value="<?php echo $event['event_type'];?>"><?php echo $event['event_type'].' '.$type; ?></option>
          <?php
		}?>
        </select>
      </div>
    </div>
    
    <div class="form">
      <div class="text_form">Name</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="name" type="text" id="name" />
      </div>
    </div>
    
    <div class="form_add">
      <div class="text_form">Event Description</div>
      <div class="text_feiled_">
        <textarea  name="description" cols="41" rows="4" id="description"></textarea>
      </div>
    </div>
    
    <div class="form">
      <div class="text_form">Date</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="datepicker" type="text" id="datepicker" style="width: 170px;"/>
      </div>
    </div>
    
     <div class="form">
      <div class="text_form">Time</div>
      <div class="text_feiled_" style="width: 240px;;">
         <select class="dropdown" name="hours" id="hours" style="width: 60px;">
          <option value="">HH</option>
          <option value="00">00</option>
          <option value="01">01</option>
          <option value="02">02</option>
          <option value="03">03</option>
          <option value="04">04</option>
          <option value="05">05</option>
          <option value="06">06</option>
          <option value="07">07</option>
          <option value="08">08</option>
          <option value="09">09</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          </select> - 
          
          <select class="dropdown" name="min" id="min" style="width: 60px;">
          <option value="">MM</option>
          <option value="00">00</option>
          <option value="01">01</option>
          <option value="02">02</option>
          <option value="03">03</option>
          <option value="04">04</option>
          <option value="05">05</option>
          <option value="06">06</option>
          <option value="07">07</option>
          <option value="08">08</option>
          <option value="09">09</option>
          <option value="10">10</option>
          <option value="11">11</option>
          <option value="12">12</option>
          <option value="13">13</option>
          <option value="14">14</option>
          <option value="15">15</option>
          <option value="16">16</option>
          <option value="17">17</option>
          <option value="18">18</option>
          <option value="19">19</option>
          <option value="20">20</option>
          <option value="21">21</option>
          <option value="22">22</option>
          <option value="23">23</option>
          <option value="24">24</option>
          <option value="25">25</option>
          <option value="26">26</option>
          <option value="27">27</option>
          <option value="28">28</option>
          <option value="29">29</option>
          <option value="30">30</option>
          <option value="31">31</option>
          <option value="32">32</option>
          <option value="33">33</option>
          <option value="34">34</option>
          <option value="35">35</option>
          <option value="36">36</option>
          <option value="37">37</option>
          <option value="38">38</option>
          <option value="39">39</option>
          <option value="40">40</option>
          <option value="41">41</option>
          <option value="42">42</option>
          <option value="43">43</option>
          <option value="44">44</option>
          <option value="45">45</option>
          <option value="46">46</option>
          <option value="47">47</option>
          <option value="48">48</option>
          <option value="49">49</option>
          <option value="50">50</option>
          <option value="51">51</option>
          <option value="52">52</option>
          <option value="53">53</option>
          <option value="54">54</option>
          <option value="55">55</option>
          <option value="56">56</option>
          <option value="57">57</option>
          <option value="58">58</option>
          <option value="59">59</option>
          </select>
          
      </div>
    </div>
    
    <div class="form">
      <div class="text_form"><strong>Address</strong></div>
      <div class="text_feiled_"> </div>
    </div>
    
    
    <div class="form">
      <div class="text_form">Constituency</div>
     <div class="text_feiled_">
        <select class="dropdown" name="constituency" id="constituency">
          <option value="">--Select Event type--</option>
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
      <div class="text_form">Cell Number 1</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="mobile" type="text" id="mobile" maxlength="10" />
      </div>
    </div>
    <div class="form">
      <div class="text_form">Cell Number 2</div>
      <div class="text_feiled_">
        <input class="feoiled_box" name="mobile2" type="text" id="mobile2" maxlength="10" />
      </div>
    </div>
    
    <div class="form_add">
      <div class="text_form">SMS Content</div>
      <div class="text_feiled_">
        <textarea  name="content" type="text" cols="41" rows="4" id="content"></textarea>
      </div>
    </div>
    
     <div class="form">
      <div class="text_form">Attend</div>
      <div class="text_feiled_" style="padding-top:5px;">
        <input name="status" type="radio" value="yes" />
        Yes
        <input name="status" type="radio" value="no" />
        No</div>
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
