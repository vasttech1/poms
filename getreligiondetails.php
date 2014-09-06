<?php 
	include('includes/session.php');
	$sql="SELECT * FROM religionmaster WHERE religionid=".$_GET['religionid'];
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)==1)
	{
		$row = mysql_fetch_assoc($rs);
		$data[]=array('field' => 'querytype','value' => 'U');
		$data[]=array('field' => 'religionid','value' => $row['religionid']);
		$data[]=array('field' => 'religionname','value' => $row['religionname']);
	}
	echo json_encode($data);
?> 