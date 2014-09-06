<?php 
ob_start();
include('includes/session.php');
$mandal= $_POST['mandal'];
$sql = mysql_query("SELECT * FROM villagemaster WHERE mandalid = '".$mandal."'");
$row = mysql_num_rows($sql);
if($row >0)
{
?>
<option value="">--Select Village/Ward--</option>
<?php
	while($array = mysql_fetch_assoc($sql))
	{
		?>
		<option value="<?php echo $array['villageid']; ?>"><?php echo $array['villagename']; ?></option>
		<?php
	}
}
else
{?>
	<option value="N/A">--N/A--</option>
	<?php
}
?>