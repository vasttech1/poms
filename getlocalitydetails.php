<?php 
	include('includes/session.php');
	$sql="SELECT * FROM localitymaster WHERE localityid=".$_GET['localityid'];
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)==1)
	{
		$row = mysql_fetch_assoc($rs);
		$data[]=array('field' => 'querytype','value' => 'U');
		$data[]=array('field' => 'localityid','value' => $row['localityid']);
		$data[]=array('field' => 'localityname','value' => $row['localityname']);
	}
	echo json_encode($data);
?> 