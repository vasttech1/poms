<?php 
	include('includes/session.php');
	$sql="SELECT * FROM villagemaster WHERE villageid=".$_GET['villageid'];
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)==1)
	{
		$row = mysql_fetch_assoc($rs);
		$data[]=array('field' => 'querytype','value' => 'U');
		$data[]=array('field' => 'villageid','value' => $row['villageid']);
		$data[]=array('field' => 'villagename','value' => $row['villagename']);
		$data[]=array('field' => 'mandalid','value' => $row['mandalid']);
	}
	echo json_encode($data);
?> 