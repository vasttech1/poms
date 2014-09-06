<?php 
	include('includes/session.php');
	$sql="SELECT * FROM divisionmaster WHERE id=".$_GET['divisonid'];
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)==1)
	{
		$row = mysql_fetch_assoc($rs);
		$data[]=array('field' => 'querytype','value' => 'U');
		$data[]=array('field' => 'divisonid','value' => $row['id']);
		$data[]=array('field' => 'village','value' => $row['villagename']);
		$data[]=array('field' => 'divisonname','value' => $row['divisonname']);
	}
	echo json_encode($data);
?> 