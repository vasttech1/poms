<?php 
ob_start();
include('includes/session.php');
$generalcurrentpositionlevel= $_POST['generalcurrentpositionlevel'];
$sql = mysql_query("SELECT * FROM positionmaster WHERE positionlevel = '".$generalcurrentpositionlevel."' AND positiontype =  'general'");
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