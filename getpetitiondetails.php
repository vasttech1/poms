<?php 
	include('includes/session.php');
	$sql="SELECT * FROM petitionmaster WHERE petitionid=".$_GET['petitionid'];
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)==1)
	{
		$row = mysql_fetch_assoc($rs);
		$data[]=array('field' => 'querytype','value' => 'U');
		$data[]=array('field' => 'petitionid','value' => $row['petitionid']);
		$data[]=array('field' => 'petitionname','value' => $row['petitionname']);
	}
	echo json_encode($data);
?> 