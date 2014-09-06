<?php 
ob_start();
include('includes/session.php');
$partycurrentpositionlevel= $_POST['partycurrentpositionlevel'];
$sql = mysql_query("SELECT * FROM positionmaster WHERE positionlevel = '".$partycurrentpositionlevel."' AND positiontype =  'party'");
$row = mysql_num_rows($sql);
	if($row >0)
	{
	?>
    <option value="">--Select Position Name--</option>
	<?php
		while($array = mysql_fetch_assoc($sql))
		{
			?>
            <option value="<?php echo $array['positionname']; ?>"><?php echo $array['positionname']; ?></option>
            <?php
		}
	
	}
	else
	{?>
		<option value="N/A">--N/     A--</option>
        <?php
	}
?>