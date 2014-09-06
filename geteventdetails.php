<?php 
	include('includes/session.php');
	$sql="SELECT * FROM eventmaster WHERE eventid=".$_GET['eventid'];
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)==1)
	{
		$row = mysql_fetch_assoc($rs);
		$data[]=array('field' => 'querytype','value' => 'U');
		$data[]=array('field' => 'eventid','value' => $row['eventid']);
		$data[]=array('field' => 'event_type','value' => $row['event_type']);
	}
	echo json_encode($data);
?> 