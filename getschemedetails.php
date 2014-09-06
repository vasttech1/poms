<?php 
	include('includes/session.php');
	$sql="SELECT * FROM schememaster WHERE schemeid=".$_GET['schemeid'];
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)==1)
	{
		$row = mysql_fetch_assoc($rs);
		$data[]=array('field' => 'querytype','value' => 'U');
		$data[]=array('field' => 'schemeid','value' => $row['schemeid']);
		$data[]=array('field' => 'schemename','value' => $row['schemename']);
		$data[]=array('field' => 'funds','value' => $row['funds']);
		$data[]=array('field' => 'fundtype','value' => $row['fundtype']);
	}
	echo json_encode($data);
?> 