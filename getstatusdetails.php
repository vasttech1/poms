<?php 
	include('includes/session.php');
	$sql="SELECT * FROM statusmaster WHERE statusid=".$_GET['statusid'];
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)==1)
	{
		$row = mysql_fetch_assoc($rs);
		$data[]=array('field' => 'querytype','value' => 'U');
		$data[]=array('field' => 'statusid','value' => $row['statusid']);
		$data[]=array('field' => 'statusname','value' => $row['statusname']);
	}
	echo json_encode($data);
?> 