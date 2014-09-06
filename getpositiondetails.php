<?php 
	include('includes/session.php');
	$sql="SELECT * FROM positionmaster WHERE positionid=".$_GET['positionid'];
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)==1)
	{
		$row = mysql_fetch_assoc($rs);
		$data[]=array('field' => 'querytype','value' => 'U');
		$data[]=array('field' => 'positionid','value' => $row['positionid']);
		$data[]=array('field' => 'positionname','value' => $row['positionname']);
		$data[]=array('field' => 'positiontype','value' => $row['positiontype']);
		$data[]=array('field' => 'positionlevel','value' => $row['positionlevel']);
	}
	echo json_encode($data);
?> 