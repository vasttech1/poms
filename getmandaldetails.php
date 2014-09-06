<?php 
	include('includes/session.php');
	$sql="SELECT * FROM mandalmaster WHERE mandalid=".$_GET['mandalid'];
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)==1)
	{
		$row = mysql_fetch_assoc($rs);
		$data[]=array('field' => 'querytype','value' => 'U');
		$data[]=array('field' => 'mandalid','value' => $row['mandalid']);
		$data[]=array('field' => 'mandalname','value' => $row['mandalname']);
		$data[]=array('field' => 'type','value' => $row['type']);
		$data[]=array('field' => 'constituency','value' => $row['constituency']);
	}
	echo json_encode($data);
?> 