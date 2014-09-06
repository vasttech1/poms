<?php 
ob_start();
include('includes/session.php');
$constituency= $_POST['constituency'];
$sql = mysql_query("SELECT * FROM mandalmaster WHERE constituency = '".$constituency."' ");
$row = mysql_num_rows($sql);
	if($row >0)
	{
	?>
    <option value="">--Select Mandal/Town--</option>
	<?php
		while($array = mysql_fetch_assoc($sql))
		{
		if($array['type'] == 'town')
			{
			$type = strtoupper($array['type'] );
			}
			else
			{
				$type = '';
			}
		  ?>
		  <option value="<?php echo $array['mandalid'];?>"><?php echo $array['mandalname'].' '.$type; ?></option>
		  <?php
		}
	
	}
	else
	{?>
		<option value="N/A">--N/     A--</option>
        <?php
	}
?>