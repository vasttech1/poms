<?php 
	include('includes/session.php');
	$sql="SELECT * FROM castemaster WHERE casteid=".$_GET['casteid'];
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)==1)
	{
		$row = mysql_fetch_assoc($rs);
		$data[]=array('field' => 'querytype','value' => 'U');
		$data[]=array('field' => 'casteid','value' => $row['casteid']);
		$data[]=array('field' => 'castename','value' => $row['castename']);
		$data[]=array('field' => 'castecategory','value' => $row['castecategory']);
	}
	echo json_encode($data);
?> 